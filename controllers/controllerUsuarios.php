<?php
class controllerUsuarios{
	
	#registrar Usuarios---------------------------
	public function registrarUsuariosController($nombreUsuarios,$ap,$am,$correo,$pass,$tipo){
		$datosController = array( "nombre"=>$nombreUsuarios,"ape_pat"=>$ap,"ape_mat"=>$am,"correo"=>$correo,"pass"=>$pass,"tipo"=>$tipo);
		return(Datos::registroUsuarioModel($datosController, "usuarios"));
	}

	public function visualizarUsuariosControllerTable(){
		$respuesta = array();
		$respuesta = Datos::mostrarUsuariosModel("usuarios");
		return $respuesta;
	}

	public function eliminarUsuarioController($nombreUsuarios){
		$datosController = array( "id"=>$nombreUsuarios);
		$resp = Datos::borrarUsuariosModel($datosController, "usuarios");
		return $resp;
	}

	public function modificarUsuarioController($id,$nombre,$ap,$am,$correo,$pass,$tipo){
		$datosController = array( "id"=>$id, "nombre" =>$nombre, "ape_pat"=>$ap, "ape_mat"=>$am, "correo"=>$correo, "pass"=>$pass, "tipo"=>$tipo);
		$resp = Datos::actualizarUsuariosModel($datosController, "usuarios");
		return $resp;
	}

	public function mostrarUsuariosController($nombreUsuarios){
		$datosController = array( "id"=>$nombreUsuarios);
		$resp = Datos::mostrarUsuariosModel1($datosController, "usuarios");
		return $resp;
	}

}

?>