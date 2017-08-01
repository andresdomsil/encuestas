<?php 
require_once '../models/crudEditEncuestas.php';
require_once '../controllers/controllerEditEncuesta.php';
require_once "../controllers/controllerEncuestas.php";
require_once "../models/crudEncuestas.php";
if(isset($_POST['op'])){
	$obj = new controllerEditEncuestas();
	if($_POST['op']==1){
		$resp=$obj->eliminarEncuestaController($_POST['selEcnuestas1']);
		echo json_encode($resp);
	}
	if($_POST['op']==2){
		$resp=$obj->eliminarPreguntaController($_POST['selEcnuestas2'],$_POST['selPreguntas2']);
		echo json_encode($resp);
	}
	if($_POST['op']==3){
		$resp=$obj->eliminarRespuestaController($_POST['selPreguntas3'],$_POST['selRespuestas2']);
		echo json_encode($resp);
	}
	if($_POST['op']==4){
		$obj1 = new controllerEncuestas();
		$obj1->visualizarEncuestasControllerSelect();
		$obj1=null;
	}
	if($_POST['op']==5){
		$resp=$obj->visualizarPreguntasControllerSelect($_POST["idEncuesta"]);
		echo json_encode($resp);
	}
	if($_POST['op']==6){
		$resp=$obj->visualizarRespuestasControllerSelect($_POST["idpregunta"]);
		echo json_encode($resp);
	}
	if($_POST['op']==7){
		$resp=$obj->modificarNombreEncuestaController($_POST["selEcnuestas4"],$_POST['nombreEncuesta']);
		echo json_encode($resp);
	}
	if($_POST['op']==8){
		$resp=$obj->modificarNombrePreguntaController($_POST["selPreguntas5"],$_POST['nombrePregunta']);
		echo json_encode($resp);
	}
	if($_POST['op']==9){
		$resp=$obj->modificarNombreRespuestaController($_POST["selRespuestas1"],$_POST['nombreResp']);
		echo json_encode($resp);
	}
	$obj=null;
	
}


?>