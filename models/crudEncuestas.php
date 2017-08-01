<?php
require_once "conexion.php";
class Encuestas extends Conexion{

	#REGISTRO DE ENCUESTA
	#-------------------------------------
	public function registroEncuestasModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_Carrera, idTipo_encuestado, nombre) VALUES (:id_Carrera, :idTipo_encuestado, :nombre)");
		$datosModel["id_Carrera"]=strtoupper($datosModel["id_Carrera"]);
		$datosModel["idTipo_encuestado"]=strtoupper($datosModel["idTipo_encuestado"]);
		$datosModel["nombre"]=strtoupper($datosModel["nombre"]);
		$addr = strtr($datosModel["nombre"], "ñáéíóú", "ÑÁÉÍÓÚ");
		$stmt->bindParam(":id_Carrera", $datosModel["id_Carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":idTipo_encuestado", $datosModel["idTipo_encuestado"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $addr, PDO::PARAM_STR);
		$stmt->execute();
	}

	#finalizacion DE ENCUESTA
	#-------------------------------------
	public function finalizarEncuestaModel($datosModel){
		if($datosModel["respuesta"]!=""){
			if($datosModel['idTipo_respuesta']==1 || $datosModel['idTipo_respuesta']==2){
				$stmt = Conexion::conectar()->prepare("UPDATE Respuestas SET total = total + 1 WHERE id_respuesta = :id_respuesta");
				$stmt->bindParam(":id_respuesta", $datosModel["respuesta"], PDO::PARAM_INT);
			}else if($datosModel['idTipo_respuesta']==3){
				$stmt = Conexion::conectar()->prepare("INSERT INTO Respuestas (id_pregunta, respuesta) VALUES (:id_pregunta, :respuesta)");
				$stmt->bindParam(":id_pregunta", $datosModel["id_pregunta"], PDO::PARAM_STR);
				$stmt->bindParam(":respuesta", $datosModel["respuesta"], PDO::PARAM_STR);
			}
			$stmt->execute();
		}
	}


	#MOSTRAR ENCUESTAS
	#-------------------------------------

	public function mostrarEncuestasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_encuesta DESC");	
		$stmt->execute();
		$encuestas_a = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $encuestas_a;
	}


	#verificar ENCUESTAS
	#-------------------------------------

	public function verificarEncuestaEncuestadoModel($datosModel){
		$stmt1 = Conexion::conectar()->prepare("SELECT * FROM Encuestado WHERE correo=:correo");
		$stmt1->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt1->execute();
		$resp1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM Encuestas WHERE nombre=:nombre");
		$stmt2->bindParam(":nombre", $datosModel["encuesta"], PDO::PARAM_STR);
		$stmt2->execute();
		$resp2 = $stmt2->fetch(PDO::FETCH_ASSOC);


		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestas_realizadas WHERE idEncuestado=:idEncuestado AND id_encuesta=:id_encuesta");	
		$stmt->bindParam(":idEncuestado", $resp1["idEncuestado"], PDO::PARAM_INT);
		$stmt->bindParam(":id_encuesta", $resp2["id_encuesta"], PDO::PARAM_INT);
		$stmt->execute();
		$encuestaRealizada= $stmt->fetch(PDO::FETCH_ASSOC);
        if($encuestaRealizada==null){
        	$stmt3 = Conexion::conectar()->prepare("INSERT INTO Encuestas_realizadas (idEncuestado, id_encuesta, fecha_ini) VALUES (:idEncuestado, :id_encuesta, now())");
        	$stmt3->bindParam(":idEncuestado", $resp1["idEncuestado"], PDO::PARAM_INT);
			$stmt3->bindParam(":id_encuesta", $resp2["id_encuesta"], PDO::PARAM_INT);
			$stmt3->execute();
        }else if ($encuestaRealizada["fecha_fin"]==null) {
        	$stmt3 = Conexion::conectar()->prepare("UPDATE Encuestas_realizadas SET fecha_ini = now() WHERE idEncuestado=:idEncuestado  AND id_encuesta =:id_encuesta");
        	$stmt3->bindParam(":idEncuestado", $resp1["idEncuestado"], PDO::PARAM_INT);
			$stmt3->bindParam(":id_encuesta", $resp2["id_encuesta"], PDO::PARAM_INT);
			$stmt3->execute();
        }else if ($encuestaRealizada["fecha_fin"]!=null) {
        	echo '<script>var encuestarealizada=true;</script>';
        }
	}


	#REGISTRO DE ENCUESTA
	#-------------------------------------
	public function registroPreguntaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_encuesta, idTipo_respuesta, pregunta) VALUES (:id_encuesta, :idTipo_respuesta, :pregunta)");
		$datosModel["id_encuesta"]=strtoupper($datosModel["id_encuesta"]);
		$datosModel["idTipo_respuesta"]=strtoupper($datosModel["idTipo_respuesta"]);
		$datosModel["pregunta"]=strtoupper($datosModel["pregunta"]);
		$addr = strtr($datosModel["pregunta"], "ñáéíóú", "ÑÁÉÍÓÚ");
		$stmt->bindParam(":id_encuesta", $datosModel["id_encuesta"], PDO::PARAM_INT);
		$stmt->bindParam(":idTipo_respuesta", $datosModel["idTipo_respuesta"], PDO::PARAM_INT);
		$stmt->bindParam(":pregunta", $addr, PDO::PARAM_STR);
		$stmt->execute();
	}


	#REGISTRO DE ENCUESTA
	#-------------------------------------
	public function registroRespuestaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_pregunta, respuesta) VALUES (:id_pregunta, :respuesta)");
		$datosModel["id_pregunta"]=strtoupper($datosModel["id_pregunta"]);
		$datosModel["respuesta"]=strtoupper($datosModel["respuesta"]);
		$addr = strtr($datosModel["respuesta"], "ñáéíóú", "ÑÁÉÍÓÚ");
		$stmt->bindParam(":id_pregunta", $datosModel["id_pregunta"], PDO::PARAM_INT);
		$stmt->bindParam(":respuesta", $addr, PDO::PARAM_STR);
		$stmt->execute();
	}

	#ACTUALIZAR FECHA DE ENCUESTA
	#-------------------------------------
	public function actualizarFechaFinModel($datosModel){
		$stmt1 = Conexion::conectar()->prepare("SELECT * FROM Encuestado WHERE correo=:correo");
		$stmt1->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt1->execute();
		$resp1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM Encuestas WHERE nombre=:nombre");
		$stmt2->bindParam(":nombre", $datosModel["encuesta"], PDO::PARAM_STR);
		$stmt2->execute();
		$resp2 = $stmt2->fetch(PDO::FETCH_ASSOC);


		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestas_realizadas WHERE idEncuestado=:idEncuestado AND id_encuesta=:id_encuesta");	
		$stmt->bindParam(":idEncuestado", $resp1["idEncuestado"], PDO::PARAM_INT);
		$stmt->bindParam(":id_encuesta", $resp2["id_encuesta"], PDO::PARAM_INT);
		$stmt->execute();
		$stmt3 = Conexion::conectar()->prepare("UPDATE Encuestas_realizadas SET fecha_fin = now() WHERE idEncuestado=:idEncuestado  AND id_encuesta =:id_encuesta");
		$stmt3->bindParam(":idEncuestado", $resp1["idEncuestado"], PDO::PARAM_INT);
		$stmt3->bindParam(":id_encuesta", $resp2["id_encuesta"], PDO::PARAM_INT);
		$stmt3->execute();
	}


	#CONSULTAR ULTIMO ID ENCUESTA
	#-------------------------------------
	public function EncuestasIDModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_encuesta) as id_encuesta FROM $tabla");
		$stmt->execute();
		$id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id;
	}


	#CONSULTAR ULTIMO ID PREGUNTA
	#-------------------------------------
	public function PreguntaIDModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_pregunta) as id_pregunta FROM $tabla");
		$stmt->execute();
		$id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id;
	}

	#CONSULTAR ULTIMO ID RESPUESTA
	#-------------------------------------
	public function RespuestaIDModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_respuesta) as id_respuesta FROM $tabla");
		$stmt->execute();
		$id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $id;
	}

	#MOSTRAR ENCUESTA CON PREGUNTAS Y RESPUESTAS
	#-------------------------------------
	public function mostrarEncuestaEncuestadoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("SELECT Encuestas.nombre, Preguntas.id_pregunta, Preguntas.pregunta, Respuestas.id_respuesta, Respuestas.respuesta FROM Encuestas, Preguntas, Respuestas WHERE (Encuestas.id_encuesta = Preguntas.id_encuesta AND Preguntas.id_pregunta = Respuestas.id_pregunta) AND (Encuestas.id_Carrera = :id_Carrera AND Encuestas.idTipo_encuestado = :idTipo_encuestado)");	
		$stmt->bindParam(":id_Carrera", $datosModel['id_Carrera'], PDO::PARAM_INT);	
		$stmt->bindParam(":idTipo_encuestado", $datosModel['idTipo_encuestado'], PDO::PARAM_INT);	
		$stmt->execute();
		$EncuestaEncuestado = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $EncuestaEncuestado;
	}

	#Nombre encuesta
	#-------------------------------------
	public function nombreEncuestaModel($datosModel){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestas WHERE id_Carrera = :id_Carrera AND idTipo_encuestado = :idTipo_encuestado ORDER BY id_encuesta DESC");	
		$stmt->bindParam(":id_Carrera", $datosModel['id_Carrera'], PDO::PARAM_INT);	
		$stmt->bindParam(":idTipo_encuestado", $datosModel['idTipo_encuestado'], PDO::PARAM_INT);	
		$stmt->execute();
		$EncuestaEncuestado = $stmt->fetch(PDO::FETCH_BOTH);
        return $EncuestaEncuestado;
	}

	#MOSTRTAR PREGUNTAS
	#-------------------------------------
	public function preguntasModel($datosModel){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Preguntas WHERE id_encuesta = :id_encuesta");	
		$stmt->bindParam(":id_encuesta", $datosModel['id_encuesta'], PDO::PARAM_INT);	
		$stmt->execute();
		$EncuestaEncuestado = $stmt->fetchALL(PDO::FETCH_BOTH);
        return $EncuestaEncuestado;
	}

	#MOSTRAR RESPUESTAS
	#-------------------------------------
	public function respuestasModel($id_pregunta){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Respuestas WHERE id_pregunta = :id_pregunta");	
		$stmt->bindParam(":id_pregunta", $id_pregunta, PDO::PARAM_INT);	
		$stmt->execute();
		$EncuestaEncuestado = $stmt->fetchALL(PDO::FETCH_BOTH);
        return $EncuestaEncuestado;
	}

	#MOSTRAR RESPUESTAS
	#-------------------------------------
	public function respuestasOrdenModel($id_pregunta){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM Respuestas WHERE id_pregunta = :id_pregunta ORDER BY total DESC");	
		$stmt->bindParam(":id_pregunta", $id_pregunta, PDO::PARAM_INT);	
		$stmt->execute();
		$EncuestaEncuestado = $stmt->fetchALL(PDO::FETCH_BOTH);
        return $EncuestaEncuestado;
	}

	#CONTADOR DE ENCUESTAS REALIZADAS
	#-------------------------------------
	public function encuestasRealizadasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) total FROM Encuestas_realizadas WHERE fecha_fin IS NOT NULL;");	
		$stmt->execute();
		$resp = $stmt->fetch(PDO::FETCH_BOTH);
        return $resp;
	}

	#CONTADOR DE ENCUESTAS CREADAS
	#-------------------------------------
	public function encuestasCreadasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) total FROM Encuestas;");	
		$stmt->execute();
		$resp = $stmt->fetch(PDO::FETCH_BOTH);
        return $resp;
	}

	#CONTADOR DE ENCUESTAS CREADAS
	#-------------------------------------
	public function datosEncuestasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT Encuestas.nombre nom_encuesta, Carreras.nombre nom_carrera, Tipo_encuestado.nombre, (SELECT COUNT(*) FROM Encuestado WHERE Encuestado.idTipo_encuestado=Encuestas.idTipo_encuestado AND Encuestado.id_Carrera=Encuestas.id_Carrera) total_para_encuestar, (SELECT COUNT(*) FROM Encuestas_realizadas WHERE Encuestas_realizadas.fecha_fin IS NOT NULL AND Encuestas_realizadas.id_encuesta=Encuestas.id_encuesta) total_Encuestas_realizadas FROM Encuestas INNER JOIN Carreras ON Encuestas.id_Carrera  = Carreras.id_Carrera INNER JOIN Tipo_encuestado ON Tipo_encuestado.idTipo_encuestado = Encuestas.idTipo_encuestado;");	
		$stmt->execute();
		$resp = $stmt->fetchALL(PDO::FETCH_BOTH);
        return $resp;
	}
	

	#Verifica si el usuario ya contestó la encuesta
	#-------------------------------------
	public function verificarEncuestadContestadaModel($idEncuestado){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM Encuestas_realizadas WHERE idEncuestado=:idEncuestado");
		$stmt->bindParam(":idEncuestado", $idEncuestado, PDO::PARAM_INT);	
		$stmt->execute();
		$resp = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $resp;
	}


}

?>