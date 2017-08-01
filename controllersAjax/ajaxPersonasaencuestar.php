<?php 
require_once "../Excel/PHPExcel.php";
require_once '../models/crudEncuestado.php';
require_once '../controllers/controllerEncuestado.php';
if(isset($_POST['op'])){
	
	if($_POST['op']==1){
		if (isset($_FILES)) {
			$ruta="/Excel/";
    		$target_file = $ruta.$_FILES["file"]["name"];
		    move_uploaded_file($_FILES["file"]["tmp_name"], $_POST['SITE_ROOT'].$target_file);

			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(true);
			$convertido=strtr($target_file, "\\", "/");
			$objPHPExcel = $objReader->load("../".$convertido);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$lastRow = $objWorksheet->getHighestRow();

			
			$res="";
			
			for ($row = 2; $row <= $lastRow; $row++) {
			    $nombre = $objWorksheet->getCell("A".$row);
			    $correo = $objWorksheet->getCell("B".$row);
			    if($nombre!=""){
			    	$obj=new controllerEncuestado();
			    	$resp=$obj->registrarEncuestadoController($nombre,$correo,$_POST['tipoencuestado'],$_POST['carrera']);
			    	if($resp[1]==1062){
			    		$res="duplicado";
			    	}
			    	$obj=null;	
			    }
			}
			
			echo $res;

		    unlink($_POST['SITE_ROOT'].$target_file);
		}
	}
	if($_POST['op']==2){
		$obj = new controllerEncuestado();
		$res = $obj->visualizarEncuestadoControllerTable();
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==3){
		$obj = new controllerEncuestado();
		$res = $obj->eliminarEncuestadoController($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==4){
		$obj = new controllerEncuestado();
		$res = $obj->visualizarEncuestadoController1($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==5){
		$obj = new controllerEncuestado();
		$res = $obj->modificarEncuestadoController($_POST["id"],$_POST["nom"],$_POST["correo"],$_POST["sel"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==6){
		$obj = new controllerEncuestado();
		$obj->eliminarTodosLosEncuestadosController();
		$obj=null;
	}
}
?>