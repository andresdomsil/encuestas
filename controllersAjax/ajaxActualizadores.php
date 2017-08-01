<?php 
require_once '../models/crudEncuestas.php';
require_once '../controllers/controllerEncuestas.php';
require_once '../models/crudEncuestado.php';
require_once '../controllers/controllerEncuestado.php';
if(isset($_POST['op'])){
	$obj = new controllerEncuestas();
	$obj1 = new controllerEncuestado();
	if($_POST['op']==1){
		$obj->encuestasRealizadasController();
	}
	if($_POST['op']==2){
		$obj->encuestasCreadasController();
	}
	if($_POST['op']==3){
		$obj1->totalEncuestadosController();
	}
	if($_POST['op']==4){
		
	}
	$obj=null;
	$obj1=null;
}


?>