<?php
require_once "conexion.php";
class Login extends Conexion{

	#REGISTRO DE ENCUESTA
	#-------------------------------------
	public function login_1Model($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE correo = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute(); 
		return $stmt->fetch();
	}


	#MOSTRAR ENCUESTAS
	#-------------------------------------

	public function login_2Model($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE correo = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute(); 
		return $stmt->fetch();
	}
}

?>