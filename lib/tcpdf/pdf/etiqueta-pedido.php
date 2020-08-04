<?php
session_start();
require_once '../../../lib/phpqrcode/qrlib.php';
require_once '../../../controlador/productos.controlador.php';
require_once '../../../controlador/pedidos.controlador.php';
require_once '../../../modelo/productos.modelo.php';
require_once '../../../modelo/pedidos.modelo.php';

class ImprimirEtiqueta
{


    public $pdo_id;

    public function traerImpresionEtiqueta()
    {



        $tipo_impresion = '80mm';

        $impresion = $tipo_impresion == '58mm' ? 135  : 160;
        $formato = $tipo_impresion == '58mm' ? 'A4' : 'A7';


        $pedido = PedidosModelo::mdlConsultarPedidoId($this->pdo_id);


        $detalle = PedidosModelo::mdlConsultarPedidoDetalle($pedido['pdo_id']);


        //REQUERIMOS LA CLASE TCPDF

        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        if ($impresion == '58') {
            $pdf->SetMargins(2, 4, 4);
        }
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage('P', $formato);

        $bardcode = $pdf->serializeTCPDFtagParameters(
            array('', 'C39+', '', '', 0, 0, 0.5, array(
                'position' => 'S',
                'border' => false, 'padding' => 0,
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => array(255, 255, 255),
                'text' => true, 'font' => 'helvetica',
                'fontsize' => 7, 'stretchtext' => 6
            ), 'N')
        );


        $dir = '../../../vista/assets/images/qr_generator/' . $this->pdo_id;
        //Si no existe la carpeta la creamos
        if (!file_exists($dir))
            mkdir($dir, 0777, true);

        //Declaramos la ruta y nombre del archivo a generar

        $filename = $dir . "/pedidos" . $this->pdo_id .  '.jpg';

        $tamaño = 10; //Tamaño de Pixel
        $level = 'H'; //Precisión Máxima
        $framSize = 3; //Tamaño en blanco
        $contenido = $this->pdo_id; //Texto

        //Enviamos los parametros a la Función para generar código QR 
        QRcode::png($contenido, $filename, $level, $tamaño, $framSize);

        $qr = '<img src="../../../vista/assets/images/qr_generator/' . $this->pdo_id . '/pedidos' . $this->pdo_id . '.jpg" width="150px"></img>';


        $bloque1 = <<<EOF
           
            $qr
          <table>
            <tr>
                <td style="text-align:center;"><strong>$pedido[pdo_numero]</strong></td>
            </tr>
            <tr>
                <td style="text-align:center;"><strong>$pedido[pdo_fecha]</strong></td>
            </tr>
            <tr>
                <td style="text-align:center;"><strong>$pedido[pdo_usuario]</strong></td>
            </tr>
          </table>
            
EOF;

        $pdf->writeHTML($bloque1, false, false, false, false, '');


        // ---------------------------------------------------------
        //SALIDA DEL ARCHIVO 

        $pdf->Output('etiqueta-QRproducto.pdf');
        //$pdf->Output('Etiqueta-' . $valorVenta . 'etiquta.pdf');
    }
}

$etiqueta = new ImprimirEtiqueta();
$etiqueta->pdo_id = $_GET['pdo_numero'];
$etiqueta->traerImpresionEtiqueta();
