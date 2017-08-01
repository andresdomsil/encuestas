<?php
require_once "conexion.php";
class EditEncuestas extends Conexion{

	public function eliminarEncuestaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_encuesta = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	public function eliminarPreguntaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_encuesta = :id AND id_pregunta= :idpreg");
		$stmt->bindParam(":id", $datosModel["id_encuesta"], PDO::PARAM_INT);
		$stmt->bindParam(":idpreg", $datosModel["id_pregunta"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	public function eliminarRespuestaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pregunta = :id AND id_respuesta= :id_respuesta");
		$stmt->bindParam(":id", $datosModel["id_pregunta"], PDO::PARAM_INT);
		$stmt->bindParam(":id_respuesta", $datosModel["id_respuesta"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();
	}

	public function visualizarPreguntasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_encuesta = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		$preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $preguntas;
	}

	public function visualizarRespuestasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_pregunta = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		$preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $preguntas;
	}

	public function modificarNombreEncuestaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:texto WHERE id_encuesta=:id");

		$datosModel["text"]=strtoupper($datosModel["text"]);
		$addr = strtr($datosModel["text"], "ñáéíóú", "ÑÁÉÍÓÚ");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":texto", $addr, PDO::PARAM_STR);
		$stmt->execute();
		$encuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $encuestas;
	}

	public function modificarNombrePreguntaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pregunta=:texto WHERE id_pregunta=:id");

		$datosModel["text"]=strtoupper($datosModel["text"]);
		$addr = strtr($datosModel["text"], "ñáéíóú", "ÑÁÉÍÓÚ");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":texto", $addr, PDO::PARAM_STR);
		$stmt->execute();
		$encuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $encuestas;
	}

	public function modificarNombreRespuestaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET respuesta=:texto WHERE id_respuesta=:id");

		$datosModel["text"]=strtoupper($datosModel["text"]);
		$addr = strtr($datosModel["text"], "ñáéíóú", "ÑÁÉÍÓÚ");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":texto", $addr, PDO::PARAM_STR);
		$stmt->execute();
		$encuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $encuestas;
	}

}

?>