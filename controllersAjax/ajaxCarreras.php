<?php 
require_once '../models/crudCarreras.php';
require_once '../controllers/controllerCarreras.php';
if(isset($_POST['op'])){
	if($_POST['op']==1){
		$obj = new controllerCarreras();
		$res = $obj->visualizarCarreraControllerTable();
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==2){
		$obj = new controllerCarreras();
		$obj->registrarCarreraController($_POST["newcarrera"]);
		$obj=null;
	}
	if($_POST['op']==3){
		$obj = new controllerCarreras();
		$res = $obj->eliminarCarreraController($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==4){
		$obj = new controllerCarreras();
		$res = $obj->modificarCarreraController($_POST["id"],$_POST["nombre"]);
		echo json_encode($res);
		$obj=null;
	}
}


?>