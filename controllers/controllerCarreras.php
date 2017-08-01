<?php
class controllerCarreras{
	
	#registrar Carrera---------------------------
	public function registrarCarreraController($nombreCarrera){
		$datosController = array( "nombre"=>$nombreCarrera);
		Carreras::registroCarreraModel($datosController, "Carreras");
	}

	public function visualizarCarreraControllerSelect(){
		$respuesta = Carreras::mostrarCarreraModel("Carreras");
		if($respuesta!=""){
			foreach ($respuesta as $key ) {
				echo '<option value="'.$key["id_Carrera"].'">'.$key["nombre"].'</option>';
			}
			
		}
		else{
			echo "error";
		}
	}

	public function visualizarCarreraControllerTable(){
		$respuesta = array();
		$respuesta = Carreras::mostrarCarreraModel("Carreras");
		if($respuesta!=""){
			return ($respuesta);
		}
		else{
			echo "error";
		}
	}

	public function eliminarCarreraController($nombreCarrera){
		$datosController = array( "id"=>$nombreCarrera);
		$resp = Carreras::borrarCarreraModel($datosController, "Carreras");
		return $resp;
	}

	public function modificarCarreraController($nombreCarrera,$nombre){
		$datosController = array( "id"=>$nombreCarrera, "nombre" =>$nombre);
		$resp = Carreras::actualizarCarreraModel($datosController, "Carreras");
		return $resp;
	}

}

?>