<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (correo, pass, nombre, ape_pat, ape_mat, id_tipo_user) VALUES (:correo,:pass,:nombre,:ape_pat,:ape_mat,:id_tipo_user)");	
		$stmt->bindParam(":id_tipo_user", $datosModel["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_pat", $datosModel["ape_pat"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_mat", $datosModel["ape_mat"], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->errorInfo();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE correo = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute(); 
		return $stmt->fetch();

	}

	public function mostrarUsuariosModel1($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id");	
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		$stmt->execute(); 
		return $stmt->fetch();

	}

	#VISTA USUARIOS
	#-------------------------------------

	public function mostrarUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuarios.*, tipo_user.nombre nombretipo FROM usuarios INNER JOIN tipo_user ON usuarios.id_tipo_user = tipo_user.id_tipo_user;");	
		$stmt->execute(); 
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, ape_pat=:ape_pat, ape_mat=:ape_mat, correo=:correo, pass=:pass, id_tipo_user=:id_tipo_user WHERE id_usuario=".$datosModel["id"]);

		$stmt->bindParam(":id_tipo_user", $datosModel["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_pat", $datosModel["ape_pat"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_mat", $datosModel["ape_mat"], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->errorInfo();

	}


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id");
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->errorInfo();

	}

}

?>