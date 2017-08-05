<?php
class controllerEncuestas{
	
	#registrar encuesta---------------------------
	public function registrarEncuestasController($nombreEncuesta, $carreraEncuesta, $tipoEncuesta){
		$datosController = array("id_Carrera"=>$carreraEncuesta, "idTipo_encuestado"=>$tipoEncuesta, "nombre"=>$nombreEncuesta);
		Encuestas::registroEncuestasModel($datosController, "Encuestas");
	}


	public function visualizarEncuestasControllerSelect(){
		$respuesta = Encuestas::mostrarEncuestasModel("Encuestas");
		if($respuesta!=""){
			foreach ($respuesta as $key ) {
				echo '<option value="'.$key["id_encuesta"].'" id="'.$key["id_encuesta"].'">'.$key["nombre"].'</option>';
			}
			
		}
		else{
			echo "error";
		}
	}



	#registrar pregunta---------------------------
	public function registrarPreguntaController($id_encuesta, $idTipo_respuesta, $pregunta){
		$datosController = array("id_encuesta"=>$id_encuesta, "idTipo_respuesta"=>$idTipo_respuesta, "pregunta"=>$pregunta);
		Encuestas::registroPreguntaModel($datosController, "Preguntas");
	}

	#registrar respuesta---------------------------
	public function registrarRespuestaController($id_pregunta, $respuesta){
		$datosController = array("id_pregunta"=>$id_pregunta, "respuesta"=>$respuesta);
		Encuestas::registroRespuestaModel($datosController, "Respuestas");
	}

	#devolver id encuesta-------------------------
	public function returnIDEncuestaController(){
		$encuestas = Encuestas::EncuestasIDModel("Encuestas");
		return $encuestas;
	}

	#devolver id pregunta-------------------------
	public function returnIDPreguntaController(){
		$pregunta = Encuestas::PreguntaIDModel("Preguntas");
		return $pregunta;
	}	

	#devolver id respuesta-------------------------
	public function returnIDRespuestaController(){
		$respuesta = Encuestas::RespuestaIDModel("Respuestas");
		return $respuesta;
	}

	#Nombre de la encuesta-------------------------
	public function nombreEncuestaController($id_Carrera, $idTipo_encuestado){
		$datosController = array( "id_Carrera"=>$id_Carrera, "idTipo_encuestado"=>$idTipo_encuestado);
		$respuesta = Encuestas::nombreEncuestaModel($datosController);
		return $respuesta;
	}


	#devolver -------------------------
	public function visualizarEncuestaEncuestadoController($res){
		$datosController = array( "id_encuesta"=>$res["id_encuesta"]);
		$respuesta = Encuestas::preguntasModel($datosController);
		$j=1;
		$script='<script>var pregResp=new Array(); var idEncuesta='.$res["id_encuesta"].';';
		foreach ($respuesta as $a){
			$script.='pregResp.push(new Array());pregResp['.($j-1).'].push('.$a["id_pregunta"].');pregResp['.($j-1).'].push('.$a["idTipo_respuesta"].');pregResp['.($j-1).'].push(new Array());';
			$html='<div class="form-group"><label class="text-bold h5 display-block">'.$j.'.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$a["pregunta"].' <span class="text-danger">*</span></label>';
		  	if($a["idTipo_respuesta"]==1){
		  		$resp = Encuestas::respuestasModel($a["id_pregunta"]);
		  		foreach ($resp as $r){
		  			$html.='<div class="radio-inline"><label>'.
								'<input type="radio" value="'.$r["id_respuesta"].'" name="respuestaspreg'.$a["id_pregunta"].'" class="styled">'.
								$r["respuesta"].
							'</label></div>';
					
		  		}
		  	}else if($a["idTipo_respuesta"]==2){
		  		$resp = Encuestas::respuestasModel($a["id_pregunta"]);
		  		$i=1;
		  		foreach ($resp as $r){
		  			$html.='<div class="checkbox"><label>'.
								'<input type="checkbox" value="'.$r["id_respuesta"].'" id="resp'.$i.'idpreg'.$a["id_pregunta"].'" name="resp'.$i.'idpreg'.$a["id_pregunta"].'" class="styled">'.
								$r["respuesta"].
							'</label></div>';
					$i++;
		  		}
		  	}else if($a["idTipo_respuesta"]==3){
		  		$html.='<input type="text" class="form-control maxlength-threshold" id="respAbiertapreg'.$a["id_pregunta"].'" maxlength="100" placeholder="Respuesta....">';
		  	}
		  	$html.='</div>';
		  	$j++;
		  	echo $html;
		}
		$script.='</script>';
		echo $script;

	}

	public function verificarEncuestaEncuestadoController($nomEncuesta,$correo){
		$datosController = array( "encuesta"=>$nomEncuesta, "correo"=>$correo);
		Encuestas::verificarEncuestaEncuestadoModel($datosController);
	}

	public function actualizarFechaFinController($nomEncuesta,$correo){
		$datosController = array( "encuesta"=>$nomEncuesta, "correo"=>$correo);
		Encuestas::actualizarFechaFinModel($datosController);
	}

	public function finalizarEncuestaController($idEncuesta,$id_pregunta,$idTipo_respuesta,$respuesta){
		$datosController = array( "idEncuesta"=>$idEncuesta, "id_pregunta"=>$id_pregunta, "idTipo_respuesta"=>$idTipo_respuesta, "respuesta"=>$respuesta);
		Encuestas::finalizarEncuestaModel($datosController);
	}

	public function encuestasRealizadasController(){
		$resp=Encuestas::encuestasRealizadasModel();
		echo $resp["total"];
	}

	public function encuestasCreadasController(){
		$resp=Encuestas::encuestasCreadasModel();
		echo $resp["total"];
	}

	public function datosEncuestasController(){
		$resp=Encuestas::datosEncuestasModel();
		return $resp;
	}

	public function mostrarPreguntasController($id_encuesta){
		$datosController = array( "id_encuesta"=>$id_encuesta);
		$resp=Encuestas::preguntasModel($datosController);
		return $resp;
	}

	public function mostrarRespuestasController($id_pregunta){
		$resp=Encuestas::respuestasOrdenModel($id_pregunta);
		return $resp;
	}

	public function verificarEncuestaContestadaController($idEncuestado){
		$resp=Encuestas::verificarEncuestadContestadaModel($idEncuestado);
		return $resp;
	}

	public function datosDetallesEncuestasController(){
		$resp=Encuestas::datosDetallesEncuestasModel();
		return $resp;
	}

}