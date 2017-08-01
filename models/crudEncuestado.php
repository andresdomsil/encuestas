<?php
require_once "conexion.php";
class Encuestado extends Conexion{

	#REGISTRO DE Encuestado
	#-------------------------------------
	public function registroEncuestadoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,correo,idTipo_encuestado,id_Carrera) VALUES (:nombre,:correo,:tipoencuestado,:carrera)");

		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");

		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoencuestado", $datosModel["tipoencuestado"], PDO::PARAM_INT);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	#modificar DE Encuestado
	#-------------------------------------
	public function modificarEncuestadoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, correo=:correo, idTipo_encuestado=:tipo WHERE idEncuestado=:id");

		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");

		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel['id'], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	#MOSTRAR Encuestado
	#-------------------------------------

	public function mostrarEncuestadoModel(){
		$stmt = Conexion::conectar()->prepare("SELECT Encuestado.*, Tipo_encuestado.nombre nombretipo, Carreras.nombre nomcarrera FROM Encuestado INNER JOIN Tipo_encuestado ON Encuestado.idTipo_encuestado = Tipo_encuestado.idTipo_encuestado INNER join Carreras on Encuestado.id_Carrera=Carreras.id_Carrera");	
		$stmt->execute();
		$Encuestado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $Encuestado;
	}

	public function mostrarEncuestadoCorreoModel(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestado");	
		$stmt->execute();
		$Encuestado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $Encuestado;
	}

	public function mostrarEncuestadoModel1($datosModel){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestado WHERE idEncuestado=:id");
		$stmt->bindParam(":id", $datosModel['id'], PDO::PARAM_INT);	
		$stmt->execute();
		$Encuestado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $Encuestado;
	}

	#BORRAR Encuestado
	#------------------------------------
	public function borrarEncuestadoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEncuestado = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	public function borrarTodosEncuestadoModel($tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla");
		$stmt->execute();
	}

	#CONTADOR DE Encuestados
	#-------------------------------------
	public function totalEncuestadosModel(){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) total FROM Encuestado;");	
		$stmt->execute();
		$resp = $stmt->fetch(PDO::FETCH_BOTH);
        return $resp;
	}

	public function visualizarIdEncuestasRealizadasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT idEncuestado id FROM Encuestas_realizadas;");	
		$stmt->execute();
		$resp = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $resp;
	}

	public function datosEncuestadoModel($id){
		$stmt = Conexion::conectar()->prepare("SELECT Encuestado.*, Tipo_encuestado.nombre nombretipo, Carreras.nombre nomcarrera FROM Encuestado INNER JOIN Tipo_encuestado ON Encuestado.idTipo_encuestado = Tipo_encuestado.idTipo_encuestado INNER join Carreras on Encuestado.id_Carrera=Carreras.id_Carrera WHERE encuestado.idEncuestado=:id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);	
		$stmt->execute();
		$resp = $stmt->fetch(PDO::FETCH_BOTH);
        return $resp;
	}

}

?>