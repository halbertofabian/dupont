<?php
session_start();
require_once '../../../controlador/productos.controlador.php';
require_once '../../../controlador/pedidos.controlador.php';
require_once '../../../modelo/productos.modelo.php';
require_once '../../../modelo/pedidos.modelo.php';



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

class ImprimirReporte
{
    public $numeroP;
    public $tipo;
    public $formato;

    public function generarReporte()
    {


        $pedido = PedidosModelo::mdlConsultarPedidoId($this->numeroP);


        $detalle = PedidosModelo::mdlConsultarPedidoDetalle($pedido['pdo_id']);

        //var_dump($detalle);

        //var_dump($orden);
        // create new PDF document

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);


        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hector Alberto López Fabián');
        $pdf->SetTitle('Reporte de calderas');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $bardcode = $pdf->serializeTCPDFtagParameters(
            array($this->numeroP, 'C128', '', '', 0, 0, 0.5, array(
                'position' => 'S',
                'border' => false, 'padding' => 0,
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => array(255, 255, 255),
                'text' => true, 'font' => 'helvetica',
                'fontsize' => 9, 'stretchtext' => 6
            ), 'N')
        );

        // Set font
        $pdf->SetFont('helvetica', '', 9, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();



        //$pdf->Image('image_demo.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);


        // Set some content to print
        $encabezado = <<<EOD
        <table>
            <tr>
                <td>
                    <img src="../../../vista/assets/images/dupont-logo.jpg" width="170px">
                </td>
                <td>
                    
                </td>
                <td>
                <br><br><br>
                <tcpdf style="width:20px; text-align:center;" method="write1DBarcode" params="$bardcode" />
                </td>
            </tr>
            <tr>
                <td>
                    <h5>Nombre del solicitante:</h5>
                    <p>$pedido[pdo_usuario]</p>
                </td>
                <td>
                    <h5>Fecha:</h5>
                    <p>$pedido[pdo_fecha]</p>
                </td>
                <td>
                    <h5>Número de salida:</h5>
                    <p>$pedido[pdo_numero]</p>
                </td>
            </tr>
        </table>
        <br>
        <br>
		
EOD;
        $pdf->writeHTMLCell(0, 0, '', '', $encabezado, 0, 1, 0, true, '', true);


        # code...
        $cuerpo = <<<EOD
        <table>
            <tr>
                <td>
                   SKU
                </td>
                <td>
                   Descripcion
                </td>
                <td>
                   Piezas
                </td>
                <td>
                   Costo unit.
                </td>
                <td>
                   Total
                </td>
            </tr>
        </table>
        
		
EOD;

        $pdf->writeHTMLCell(0, 0, '', '', $cuerpo, 0, 1, 0, true, '', true);

        foreach ($detalle as $key => $value) {

            $descripcion =  str_replace('"', '', $value['pdt_descripcion']);

            # code...
            $cuerpo = <<<EOD
            <hr>
            <table>
                <tr>
                    <td>
                       $value[pdt_sku]
                    </td>
                    <td>
                       $descripcion
                    </td>
                    <td>
                        $value[dpdo_cantidad]
                    </td>
                    <td>
                        $value[dpdo_precio]
                    </td>
                    <td>
                    $value[dpdo_total]
                    </td>
                </tr>
            </table>
            
EOD;

            $pdf->writeHTMLCell(0, 0, '', '', $cuerpo, 0, 1, 0, true, '', true);
        }


        $totales = <<<EOD
        <table>
            <tr>
                <td>
                   
                </td>
                <td>
                    <p style="text-align:center">Firma de autorización</p>
                    <br><br><br> <hr>
                
                </td>
                <td>
                Total:  $ <strong> $pedido[pdo_total] </strong>
                </td>
            </tr>
           
        </table>
        
		
EOD;
        $pdf->writeHTMLCell(0, 0, '', '', $totales, 0, 1, 0, true, '', true);



        $pdf->Output('pedido-' . $this->numeroP . '.pdf');

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.


        //============================================================+
        // END OF FILE

    }
}

if (isset($_GET['pdo_numero'])) {
    $orden = new ImprimirReporte();
    $orden->numeroP = $_GET['pdo_numero'];
    $orden->generarReporte();
}
