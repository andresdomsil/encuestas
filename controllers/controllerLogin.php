<?php
class controllerLogin{
	
	#registrar Carrera---------------------------
	public function login_1Controller($correo){
		

			$datosController = array( "usuario"=>$correo);
								   
			
			$respuesta = Login::login_1Model($datosController, "Encuestado");

			if($respuesta["correo"] == $correo){

				$_SESSION["idTipo_encuestado"] = $respuesta["idTipo_encuestado"];
				$_SESSION["id_Carrera"] = $respuesta["id_Carrera"];
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["correo"] = $respuesta["correo"];

				//echo $_SESSION["correo"];
				//echo $_SESSION["nombre"];
				echo "true";

			}

			else{

				echo "false";

			}

		
	}

	public function login_2Controller($correo2, $pass){
	

			$datosController = array( "usuario"=>$correo2, 
								      "password"=>$pass);
			
			
								     

			$respuesta = Login::login_2Model($datosController, "usuarios");
	

			if($respuesta["correo"] == $correo2 && $respuesta["pass"] == $pass){

				$_SESSION["tipo_user"] = $respuesta["id_tipo_user"];
				$_SESSION["nombre"] = $respuesta["nombre"].' '.$respuesta["ape_pat"].' '.$respuesta["ape_mat"];
				$_SESSION["correoadmin"] = $respuesta["correo"];

				echo "true";

			}

			else{

				echo "false";

			}

			
	}
}

?>