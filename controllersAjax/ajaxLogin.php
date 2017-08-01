<?php 
require_once '../models/crudLogin.php';
require_once '../controllers/controllerLogin.php';

if(isset($_POST['op'])){
	if($_POST['op']==1){
		$correo = $_POST["correo"];
		session_start();
		$obj = new controllerlogin();
		$obj->login_1Controller($correo);
		$obj=null;
	}
	if($_POST['op']==2){
		$correo2 = $_POST["correo2"];
		$pass = $_POST["pass"];
		session_start();
		$obj = new controllerlogin();
		$obj->login_2Controller($correo2, $pass);
		$obj=null;
	}
}


?>