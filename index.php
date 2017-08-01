<?php
session_start();
#EL INDEX: En él mostraremos la salida de las vistas al usuario y también a traves de él enviaremos las distintas acciones que el usuario envíe al controlador.

#require() establece que el código del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.

#La versión require_once() funcionan de la misma forma que sus respectivo, salvo que, al utilizar la versión _once, se impide la carga de un mismo archivo más de una vez.

#Si requerimos el mismo código más de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases. 
require_once "controllers/controllerUsuarios.php";
require_once "controllers/controller.php";
require_once "models/crudusuarios.php";

require_once "controllers/controllerCarreras.php";
require_once "models/crudCarreras.php";

require_once "controllers/controllertipoencuestado.php";
require_once "models/crudTipoEncuestado.php";

require_once "controllers/controllerEncuestas.php";
require_once "models/crudEncuestas.php";

require_once "controllers/controllerEncuestado.php";
require_once "models/crudEncuestado.php";

require_once "models/enlaces.php";
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$mvc = new MvcController();
$mvc -> pagina();
?>