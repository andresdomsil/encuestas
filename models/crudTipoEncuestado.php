<?php
require_once "conexion.php";
class TipoEncuestado extends Conexion{

	#REGISTRO DE TipoEncuestado
	#-------------------------------------
	public function registroTipoEncuestadoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
		
		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");
		
		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->execute();
	}

	#MOSTRAR TipoEncuestado
	#-------------------------------------

	public function mostrarTipoEncuestadoModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		$TipoEncuestado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $TipoEncuestado;
	}

	#ACTUALIZAR TipoEncuestado
	#-------------------------------------

	public function actualizarTipoEncuestadoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE idTipo_encuestado = :id");
		
		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");
		
		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}


	#BORRAR TipoEncuestado
	#------------------------------------
	public function borrarTipoEncuestadoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipo_encuestado = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

}

?>