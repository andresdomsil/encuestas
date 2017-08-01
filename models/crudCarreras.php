<?php
require_once "conexion.php";
class Carreras extends Conexion{

	#REGISTRO DE CARRERA
	#-------------------------------------
	public function registroCarreraModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");
		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->execute();
	}

	#MOSTRAR CARRERA
	#-------------------------------------

	public function mostrarCarreraModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		$carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $carreras;
	}

	#ACTUALIZAR CARRERA
	#-------------------------------------

	public function actualizarCarreraModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_Carrera = :id");
		
		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");
		
		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}


	#BORRAR CARRERA
	#------------------------------------
	public function borrarCarreraModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_Carrera = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

}

?>