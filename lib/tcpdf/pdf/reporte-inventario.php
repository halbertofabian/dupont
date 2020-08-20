<?php
session_start();

require_once '../../../modelo/productos.modelo.php';




// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

class ImprimirReporte
{
    public $numeroP;
    public $tipo;
    public $formato;

    public function generarReporte()
    {


        $productos =  ProductosModelos::mdlConsultarTotalInv();
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



        // Set font
        $pdf->SetFont('helvetica', '', 8, '', true);

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
                    Estante
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

        $total = 0;
        foreach ($productos as $key => $value) {



            $totalProducto = $value['pdt_cantidad'] *  $value['pdt_costo'];

            $total += $value['pdt_cantidad'] *  $value['pdt_costo'];

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
                       $value[pdt_estante]
                    </td>
                    <td>
                        $value[pdt_cantidad]
                    </td>
                    <td>
                        $value[pdt_costo]
                    </td>
                    <td>
                        $totalProducto
                    </td>
                    
                </tr>
            </table>
            
EOD;

            $pdf->writeHTMLCell(0, 0, '', '', $cuerpo, 0, 1, 0, true, '', true);
        }

        $total = number_format($total, 2);

        $totales = <<<EOD
        <table>
            <tr>
                <td>
                   
                </td>
                <td>
                   
                
                </td>
                <td>
                Total:   <strong> $ $total </strong>
                </td>
            </tr>
           
        </table>
        
		
EOD;
        $pdf->writeHTMLCell(0, 0, '', '', $totales, 0, 1, 0, true, '', true);



        $pdf->Output('reporte-pedido.pdf');

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.


        //============================================================+
        // END OF FILE

    }
}

$orden = new ImprimirReporte();
$orden->generarReporte();
