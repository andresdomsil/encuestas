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
    if($a==null){
        $mail = $key['nombre']."\r\nBuenos tardes.\r\n\r\nPor medio del presente y a nombre del departamento de Eléctrica, Electrónica y Mecatrónica les solicitamos de la manera más atenta su participación en una encuesta.\r\nPedimos su apoyo para  contestar una encuesta de seguimiento con el fin de revisar y actualizar el Plan de Estudios correspondiente a su carrera. Esto con la finalidad de complementar la información de acreditación por el Organismo CACEI que se realizará en el ITSLP, de antemano agradecemos su atención a la presente. La información recopilada será de gran interés para el Diseño y enriquecimiento  del Nuevo Módulo de Especialidad de las carreras de este departamento.\r\nAgradeciendo su atención a la presente y esperando contar con su apoyo quedamos a sus órdenes.\r\n\r\nAtentamente:\r\nM.C. Oscar Muñoz Cruz Jefe del Departamento Eléctrica, Electrónica y Mecatrónica\r\nM.I. Elizabeth Rivera BravoDocente del Departamento Eléctrica, Electrónica y Mecatrónica\r\nM.P.S. Patricia Méndez Ortiz Docente del Departamento Eléctrica, Electrónica y Mecatrónica";
        $mail .= "\r\n\r\nAccede a:\r\n http://encuestas.e2m.com.mx \r\n\r\n\r\n";
        $mail .= "Para entrar a la encuesta solo pon tu correo electronico: \r\n ".$key['correo']." \r\n\r\n";

        //Titulo
        $titulo = "Encuestas del departamento E2M del TECNM-ITSLP";
        mail($key['correo'],$titulo,$mail);
        
    }
}
$obj=null;
$obj2=null;


?>