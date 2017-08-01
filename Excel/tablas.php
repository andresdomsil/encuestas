<?php 
require_once 'PHPExcel.php';
require_once '../models/crudEncuestas.php';
require_once '../controllers/controllerEncuestas.php';
session_start();
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Sistema de encuestas E2M") // Nombre del autor
    ->setLastModifiedBy($_SESSION["nombre"]) //Ultimo usuario que lo modificó
    ->setTitle("Resultados tablas encuesta"); // Titulo
$estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>10,
        'color'     => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array(
            'rgb' => 'FFFFFF')
  ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM 
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);
 
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM 
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);
 
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
  ),
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN 
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )        ,
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    )
));





$cont=1;
$obj = new controllerEncuestas();
$resp=$obj->mostrarPreguntasController($_GET['id']);
foreach ($resp as $key) {
	$resp1=$obj->mostrarRespuestasController($key['id_pregunta']);
	if($key['idTipo_respuesta']!=3){
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A'.$cont.':B'.$cont);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,$key["pregunta"]);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($estiloTituloReporte);
		$cont++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,"Respuestas");
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$cont,"Total");
		$objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($estiloTituloColumnas);
		$primero=$cont+1;
		foreach ($resp1 as $key1) {
			$cont++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,$key1["respuesta"]);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$cont,$key1["total"]);
		}
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A".$primero.":B".$cont);
	}else{
    	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,$key["pregunta"]);
    	$objPHPExcel->getActiveSheet()->getStyle('A'.$cont)->applyFromArray($estiloTituloReporte);
    	$cont++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,"Respuestas");
		$objPHPExcel->getActiveSheet()->getStyle('A'.$cont)->applyFromArray($estiloTituloColumnas);
		$primero=$cont+1;
		foreach ($resp1 as $key1) {
			$cont++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cont,$key1["respuesta"]);
		}
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A".$primero.":A".$cont);
	}
	$cont++;
	$cont++;
}

for($i = 'A'; $i <= 'B'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Estadisiticas');
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
setlocale(LC_TIME,"es_MX");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Estadisiticas '.date("d-m-y").'.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>