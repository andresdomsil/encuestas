<?php 
require_once '../models/crudEncuestado.php';
require_once '../controllers/controllerEncuestado.php';
require_once '../models/crudEncuestas.php';
require_once '../controllers/controllerEncuestas.php';

$obj = new controllerEncuestado();
$obj2 = new controllerEncuestas();
$resp=$obj->visualizarEncuestadoControllerCorreo();
foreach ($resp as $key) {
    $a=$obj2->verificarEncuestaContestadaController($key['idEncuestado']);
    if($a!=null){
        $mail = "Buenas tardes ".$key['nombre'].". Mediante este correo te pide tu apoyo el departamento de E2M del ITSLP.\r\n\r\n\r\n";
        $mail .= "Te pedimos que entres a nuestra pagina web para realizar una encuesta que creamos para ti.\r\n\r\n";
        $mail .= "Accede a:\r\n\r\n http://encuestas.e2m.com.mx \r\n\r\n\r\n";
        $mail .= "Para entrar a la encuesta solo pon tu correo electronico: \r\n ".$key['correo']." \r\n\r\n";
        $mail .= "Algun otro texto............. ";

        //Titulo
        $titulo = "Departamento E2M del TECNM-ITSLP te pide tu ayuda";
        $bool = mail($key['correo'],$titulo,$mail);
        echo $key['correo'];
    }
}
$obj=null;
$obj2=null;


?>