<?php

class Conexion{

	public function conectar(){

		//$link = new PDO("mysql:host=localhost;dbname=emcommx_sistema","emcommx_admin","@@@@Hola",array('charset'=>'utf8'));
		$link = new PDO("mysql:host=localhost;dbname=encuestas","root","",array('charset'=>'utf8'));
		$link->query("SET CHARACTER SET utf8");
		return $link;

	}

}

?>