<?php 
require_once '../models/crudEncuestas.php';
require_once '../controllers/controllerEncuestas.php';
if(isset($_POST['op'])){

	if($_POST['op']==1){
		$nombre = $_POST['nombre'];
		$carrera_select = $_POST['carrera_select'];
		$tipo_select = $_POST['tipo_select'];
		$preguntas_respuestas = json_decode($_POST['preguntas_respuestas'], true);

		$obj4 = new controllerEncuestas();
		$obj4->registrarEncuestasController($nombre, $carrera_select, $tipo_select);
		$obj4=null;

		$obj5 = new controllerEncuestas();
		$b = $obj5->returnIDEncuestaController();
		foreach($preguntas_respuestas as $clave){
			$obj = new controllerEncuestas();
			$obj->registrarPreguntaController($b['id_encuesta'], $clave[1], $clave[0]);
			$obj=null;
			foreach ($clave[2] as $key) {
				$obj2 = new controllerEncuestas();
				$a = $obj2->returnIDPreguntaController();
				$obj3 = new controllerEncuestas();
				$obj3->registrarRespuestaController($a['id_pregunta'], $key);
				$obj3=null;	
			}
			$obj2=null;  
		}
		$obj5=null;
		echo 1;
	}

	
	if($_POST['op']==2){
		$obj = new controllerEncuestas();
		$obj->registrarEncuestasController($_POST["nombre"], $_POST["id_1"], $_POST["id_2"]);
		$obj=null;
	}

	if($_POST['op']==3){
		$encuesta = $_POST['encuesta'];
		$preguntas_respuestas = json_decode($_POST['preguntas_respuestas'], true);
		foreach($preguntas_respuestas as $clave){
			$obj = new controllerEncuestas();
			$obj->registrarPreguntaController($encuesta, $clave[1], $clave[0]);
			$obj=null;
			foreach ($clave[2] as $key) {
				$obj2 = new controllerEncuestas();
				$a = $obj2->returnIDPreguntaController();
				$obj3 = new controllerEncuestas();
				$obj3->registrarRespuestaController($a['id_pregunta'], $key);
				$obj3=null;	
			}
			$obj2=null;  
		}
		echo 1;
	}
	if($_POST['op']==4){
		$preguntas_respuestas = json_decode($_POST['preguntas_respuestas'], true);
		$id_encuesta=$_POST['idencuesta'];
		$obj = new controllerEncuestas();
		foreach($preguntas_respuestas as $clave){
			if($clave[1]==1 || $clave[1]==3){
				$respuestaPregunta=$clave[2][0];
				$obj->finalizarEncuestaController($id_encuesta,$clave[0],$clave[1],$respuestaPregunta);
			}else if($clave[1]==2){
				foreach ($clave[2] as $key) {
					$respuestaPregunta=$key;
					$obj->finalizarEncuestaController($id_encuesta,$clave[0],$clave[1],$respuestaPregunta);
				} 
			} 			
		}
		$obj->actualizarFechaFinController($_POST['encuesta'],$_POST['correo']);
		$obj=null;
		echo 1;
	}
	if($_POST['op']==5){
		$obj = new controllerEncuestas();
		$resp=$obj->datosEncuestasController();
		echo json_encode($resp);
		$obj=null;
	}
	if($_POST['op']==6){
		$obj = new controllerEncuestas();
		$resp=$obj->mostrarPreguntasController($_POST['id_Encuesta']);
		$html='';
		$cont=0;
		foreach ($resp as $key) {
			if(($cont%2)==0){
				$html.='<div class="row">';
			}
			$html.='<div class="col-lg-6" >';
			$resp1=$obj->mostrarRespuestasController($key['id_pregunta']);
			$html.='<h3>'.$key['pregunta'].'</h3>';
			if($key['idTipo_respuesta']!=3){
				$html.='<table id="tabla_'.$cont.'" class="table table-hover table-framed table-bordered">'.
					'<thead>'.
						'<tr>'.
							'<th width="70%">RESPUESTA</th>'.
							'<th width="30%">TOTAL</th>'.
						'</tr>'.
					'</thead>'.
					'<tbody>';
						foreach ($resp1 as $key1) {
							$html.='<tr>';
							$html.='<td>'.$key1['respuesta'].'</td>';
							$html.='<td>'.$key1['total'].'</td>';
							$html.='</tr>';
						}
					$html.='</tbody>'.
				'</table>';
			}else{
				$html.='<table id="tabla_" class="table table-framed">'.
					'<thead>'.
						'<tr>'.
							'<th>RESPUESTA</th>'.
						'</tr>'.
					'</thead>'.
					'<tbody>';
						foreach ($resp1 as $key1) {
							$html.='<tr>';
							$html.='<td>'.$key1['respuesta'].'</td>';
							$html.='</tr>';
						}
					$html.='</tbody>'.
				'</table>';
			}
			$html.='</div>';
			if(($cont%2)==1){
				$html.='</div>';
			}
			$cont++;
		}
		echo ($html);
		$obj=null;
	}
	if($_POST['op']==7){
		$obj = new controllerEncuestas();
		$resp=$obj->mostrarPreguntasController($_POST['id_Encuesta']);
		$html=array();
		$cont=0;
		foreach ($resp as $key) {
			$resp1=$obj->mostrarRespuestasController($key['id_pregunta']);
			array_push($html,array());
			array_push($html[$cont],$key["pregunta"],$key["idTipo_respuesta"],array());
			if($key['idTipo_respuesta']!=3){
				foreach ($resp1 as $key1) {
					array_push($html[$cont][2],$key1["respuesta"],$key1["total"]);
				}
			}else{
				foreach ($resp1 as $key1) {
					array_push($html[$cont][2],$key1["respuesta"]);
				}
			}
			$cont++;
		}
		echo json_encode($html);
		$obj=null;
	}
	if($_POST['op']==8){
		session_start();
		$_SESSION['nombre_vp'] = $_POST['nombre'];
		$_SESSION['preguntas_vp'] = json_decode($_POST['preguntas_respuestas'], true);
		echo 1;
	}
	
}


?>