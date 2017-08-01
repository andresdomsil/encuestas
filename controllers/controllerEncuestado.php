<?php
class controllerEncuestado{
	
	#registrar encuesta---------------------------
	public function registrarEncuestadoController($nombreEncuestado, $correoEncuestado, $tipoEncuestado, $carrera){
		$datosController = array("nombre"=>$nombreEncuestado, "correo"=>$correoEncuestado, "tipoencuestado"=>$tipoEncuestado, "carrera"=>$carrera);
		return(Encuestado::registroEncuestadoModel($datosController, "Encuestado"));
	}

	public function visualizarEncuestadoControllerTable(){
		$respuesta = array();
		$respuesta = Encuestado::mostrarEncuestadoModel();
		if($respuesta!=""){
			return ($respuesta);
		}
		else{
			echo "error";
		}
	}

	public function visualizarEncuestadoControllerCorreo(){
		$respuesta = array();
		$respuesta = Encuestado::mostrarEncuestadoCorreoModel();
		return ($respuesta);
	}

	public function visualizarEncuestadoController1($id){
		$respuesta = array();
		$datosController = array( "id"=>$id);
		$respuesta = Encuestado::mostrarEncuestadoModel1($datosController);
		if($respuesta!=""){
			return ($respuesta);
		}
		else{
			echo "error";
		}
	}

	public function eliminarEncuestadoController($id){
		$datosController = array( "id"=>$id);
		$resp = Encuestado::borrarEncuestadoModel($datosController, "Encuestado");
		return $resp;
	}

	public function eliminarTodosLosEncuestadosController(){
		Encuestado::borrarTodosEncuestadoModel("Encuestado");
	}

	public function modificarEncuestadoController($id,$nom,$correo,$tipo){
		$datosController = array( "id"=>$id, "nombre"=>$nom, "correo"=>$correo, "tipo"=>$tipo);
		$resp = Encuestado::modificarEncuestadoModel($datosController, "Encuestado");
		return $resp;
	}

	public function totalEncuestadosController(){
		$resp=Encuestado::totalEncuestadosModel();
		echo $resp["total"];
	}

	public function visualizarIdEncuestasRealizadasController(){
		$resp=Encuestado::visualizarIdEncuestasRealizadasModel();
		return $resp;
	}

	public function datosEncuestadoController($id){
		$resp=Encuestado::datosEncuestadoModel($id);
		return $resp;
	}
}