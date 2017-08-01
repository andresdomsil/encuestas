<?php 
require_once '../models/crudTipoEncuestado.php';
require_once '../controllers/controllertipoencuestado.php';
if(isset($_POST['op'])){
	if($_POST['op']==1){
		$obj = new controllerTipoEncuestado();
		$res = $obj->visualizarTipoEncuestadoControllerTable();
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==2){
		$obj = new controllerTipoEncuestado();
		$obj->registrarTipoEncuestadoController($_POST["newTipoEncuestado"]);
		$obj=null;
	}
	if($_POST['op']==3){
		$obj = new controllerTipoEncuestado();
		$res = $obj->eliminarTipoEncuestadoController($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==4){
		$obj = new controllerTipoEncuestado();
		$res = $obj->modificarTipoEncuestadoController($_POST["id"],$_POST["nombre"]);
		echo json_encode($res);
		$obj=null;
	}
}


?>