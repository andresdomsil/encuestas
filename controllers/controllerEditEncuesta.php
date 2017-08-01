<?php
class controllerEditEncuestas{
	
	function eliminarEncuestaController($id){
		$datosController = array( "id"=>$id);
		return EditEncuestas::eliminarEncuestaModel($datosController, "Encuestas");
	}

	function eliminarPreguntaController($id_encuesta,$id_pregunta){
		$datosController = array( "id_encuesta"=>$id_encuesta, "id_pregunta"=>$id_pregunta);
		return EditEncuestas::eliminarPreguntaModel($datosController, "Preguntas");
	}

	function eliminarRespuestaController($id_pregunta,$id_respuesta){
		$datosController = array( "id_pregunta"=>$id_pregunta, "id_respuesta"=>$id_respuesta);
		return EditEncuestas::eliminarRespuestaModel($datosController, "Respuestas");
	}

	function visualizarPreguntasControllerSelect($id){
		$datosController = array( "id"=>$id);
		return EditEncuestas::visualizarPreguntasModel($datosController, "Preguntas");
	}

	function visualizarRespuestasControllerSelect($id){
		$datosController = array( "id"=>$id);
		return EditEncuestas::visualizarRespuestasModel($datosController, "Respuestas");
	}
	
	function modificarNombreEncuestaController($id,$text){
		$datosController = array( "id"=>$id,'text'=>$text);
		return EditEncuestas::modificarNombreEncuestaModel($datosController, "Encuestas");
	}
	
	function modificarNombrePreguntaController($id,$text){
		$datosController = array( "id"=>$id,'text'=>$text);
		return EditEncuestas::modificarNombrePreguntaModel($datosController, "Preguntas");
	}
	
	function modificarNombreRespuestaController($id,$text){
		$datosController = array( "id"=>$id,'text'=>$text);
		return EditEncuestas::modificarNombreRespuestaModel($datosController, "Respuestas");
	}

}

?>