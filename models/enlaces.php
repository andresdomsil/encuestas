<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if( $enlaces == "ingresar" 				|| 
			$enlaces == "usuarios" 				|| 
			$enlaces == "editar" 				|| 
			$enlaces == "salir" 				|| 
			$enlaces == "inicio" 				|| 
			$enlaces == "carreras" 				|| 
			$enlaces == "tipoencuestado" 		|| 
			$enlaces == "personasaencuestar" 	|| 
			$enlaces == "crearencuesta2" 		||
			$enlaces == "usuarios"		 		||
			$enlaces == "realizar_encuesta"		||
			$enlaces == "verEncuestas"			||
			$enlaces == "respuestasTablas"		||
			$enlaces == "respuestasGraficas"	||
			$enlaces == "prueba"				||
			$enlaces == "detalles_encuestados"	||
			$enlaces == "editencuesta"	

		){

			$module =  "views/modules/".$enlaces.".php";
		
		}
		else{

			$module =  "views/modules/login.php";

		}
		
		return $module;

	}

}

?>