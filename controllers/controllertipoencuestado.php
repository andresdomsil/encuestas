<?php 
class controllerTipoEncuestado{
	
	#registrar TipoEncuestado---------------------------
	public function registrarTipoEncuestadoController($nombreTipoEncuestado){
		$datosController = array( "nombre"=>$nombreTipoEncuestado);
		TipoEncuestado::registroTipoEncuestadoModel($datosController, "Tipo_encuestado");
	}

	public function visualizarTipoEncuestadoControllerSelect(){
		$respuesta = TipoEncuestado::mostrarTipoEncuestadoModel("Tipo_encuestado");
		if($respuesta!=""){
			foreach ($respuesta as $key ) {
				echo '<option value="'.$key["idTipo_encuestado"].'">'.$key["nombre"].'</option>';
			}
			
		}
		else{
			echo "error";
		}
	}

	public function visualizarTipoEncuestadoControllerTable(){
		$respuesta = array();
		$respuesta = TipoEncuestado::mostrarTipoEncuestadoModel("Tipo_encuestado");
		if($respuesta!=""){
			return ($respuesta);
		}
		else{
			echo "error";
		}
	}

	public function eliminarTipoEncuestadoController($nombreTipoEncuestado){
		$datosController = array( "id"=>$nombreTipoEncuestado);
		$resp = TipoEncuestado::borrarTipoEncuestadoModel($datosController, "Tipo_encuestado");
		return $resp;
	}

	public function modificarTipoEncuestadoController($nombreTipoEncuestado,$nombre){
		$datosController = array( "id"=>$nombreTipoEncuestado, "nombre" =>$nombre);
		$resp = TipoEncuestado::actualizarTipoEncuestadoModel($datosController, "Tipo_encuestado");
		return $resp;
	}
}

?>