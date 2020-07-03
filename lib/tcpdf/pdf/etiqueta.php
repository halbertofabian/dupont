<?php
session_start();




class ImprimirEtiqueta
{


	public $pdt_sku;

	public function traerImpresionEtiqueta()
	{



		$tipo_impresion = '80mm';

		$impresion = $tipo_impresion == '58mm' ? 135  : 160;
		$formato = $tipo_impresion == '58mm' ? 'A4' : 'A7';




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
			array($valorVenta, 'C39+', '', '', 0, 0, 0.5, array(
				'position' => 'S',
				'border' => false, 'padding' => 0,
				'fgcolor' => array(0, 0, 0),
				'bgcolor' => array(255, 255, 255),
				'text' => true, 'font' => 'helvetica',
				'fontsize' => 7, 'stretchtext' => 6
			), 'N')
		);

		$bloque1 = <<<EOF
			Hola
		EOF;

		$pdf->writeHTML($bloque1, false, false, false, false, '');


		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO 

		$pdf->Output('etiqueta.pdf');
		//$pdf->Output('Etiqueta-' . $valorVenta . 'etiquta.pdf');
	}
}
$etiqueta = new ImprimirEtiqueta();
$etiqueta ->pdt_sku = $_GET['pdt_sku'];
$etiqueta-> traerImpresionEtiqueta();
