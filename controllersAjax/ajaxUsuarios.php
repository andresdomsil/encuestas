<?php 
require_once '../models/crudusuarios.php';
require_once '../controllers/controllerUsuarios.php';
if(isset($_POST['op'])){
	if($_POST['op']==1){
		$obj = new controllerUsuarios();
		$res = $obj->visualizarUsuariosControllerTable();
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==2){
		$obj = new controllerUsuarios();
		$resp=$obj->registrarUsuariosController($_POST["nombre"],$_POST["ape_pat"],$_POST["ape_mat"],$_POST["correo"],$_POST["pass"],$_POST["tipo"]);
		echo json_encode($resp);
		$obj=null;
	}
	if($_POST['op']==3){
		$obj = new controllerUsuarios();
		$res = $obj->eliminarUsuarioController($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==4){
		$obj = new controllerUsuarios();
		$res = $obj->mostrarUsuariosController($_POST["id"]);
		echo json_encode($res);
		$obj=null;
	}
	if($_POST['op']==5){
		$obj = new controllerUsuarios();
		$res = $obj->modificarUsuarioController($_POST["idm"],$_POST["nombrem"],$_POST["ape_patm"],$_POST["ape_matm"],$_POST["correom"],$_POST["passm"],$_POST["tipom"]);
		echo json_encode($res);
		$obj=null;
	}
}


?>