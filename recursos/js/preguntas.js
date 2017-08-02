var pregunta=1;
var lista= new Array();
function mostrarlista() {
	if($("#id_3").val().length!=0){
		$("#gif").addClass('Visible');
	 	var encuesta_select = $("#id_3").val();
 		var todo = new Array();
 		for (var i = 1; i <= lista.length; i++) {
			todo.push(new Array());
			todo[i-1].push($("#namequestion"+i).val());
			if($('input[name=type-answer-question'+i+']:checked').val()==4){
				todo[i-1].push(1);
				todo[i-1].push(new Array());
				todo[i-1][2].push('PÉSIMO','MALO','REGULAR','BUENO','EXCELENTE');
			}else{
				todo[i-1].push($('input[name=type-answer-question'+i+']:checked').val());
				todo[i-1].push(new Array());
					for (var j = 1; j <= lista[i-1]; j++) {
						todo[i-1][2].push($("#respuesta"+j+"preg"+i).val());
					}
			}
		}
		var preguntas_respuestasJSON = JSON.stringify(todo);
		$.ajax({
	        type    :'POST',
	        data    :{preguntas_respuestas: preguntas_respuestasJSON, encuesta: encuesta_select, op: 3},
    		dataType:"json",
	       	url		:'controllersAjax/ajaxEncuestas.php',
	        success : function(data){
	        	if(data==1){
	        		swal({
						title: "preguntas Guardadas!",
						text: "Se ha añadido correctamente las preguntas",
						type: "success",
						confirmButtonColor: "#04B404",
						confirmButtonText: "OK",
						closeOnConfirm: false
						},
						function(){
						location.reload();
					});
				}	 
	        	
	        }
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado alguna encuesta');
	}
 }


 function mostrarlista2() {
 		$("#gif").addClass('Visible');
 		var nombre = $("#nombre").val();
 		var carrera_select = $("#id_1").val();
 		var tipo_select = $("#id_2").val();
 		var todo = new Array();
 		for (var i = 1; i <= lista.length; i++) {
			todo.push(new Array());
			todo[i-1].push($("#namequestion"+i).val());
			if($('input[name=type-answer-question'+i+']:checked').val()==4){
				todo[i-1].push(1);
				todo[i-1].push(new Array());
				todo[i-1][2].push('PÉSIMO','MALO','REGULAR','BUENO','EXCELENTE');
			}else{
				todo[i-1].push($('input[name=type-answer-question'+i+']:checked').val());
				todo[i-1].push(new Array());
					for (var j = 1; j <= lista[i-1]; j++) {
						todo[i-1][2].push($("#respuesta"+j+"preg"+i).val());
					}
			}
		}
		var preguntas_respuestasJSON = JSON.stringify(todo);
		$.ajax({
	        type    :'POST',
	        data    :{preguntas_respuestas: preguntas_respuestasJSON, nombre: nombre, carrera_select: carrera_select, tipo_select: tipo_select, op: 1},
    		dataType:"json",
	       	url		:'controllersAjax/ajaxEncuestas.php',
	        success : function(data){
	        	if(data==1){
	        		swal({
						title: "Encuesta Guardada!",
						text: "Se ha añadido correctamente la encuesta",
						type: "success",
						confirmButtonColor: "#04B404",
						confirmButtonText: "OK",
						closeOnConfirm: false
						},
						function(){
						location.reload();
					});
				}	        	
	        }
		});
	
 }

function newquestion(){
	$("#removequestion").removeClass('noVisible');
	$("#removequestion").removeClass("disabled");
	lista.push(0);
	var agregar='<div id="question'+pregunta+'"><div class="clearfix"></div>'+'<hr style="border-color:black;"><div class="form-group">'+
		'<label class="col-lg-3 control-label text-bold">Pregunta #'+pregunta+'</label>'+
		'<div class="col-lg-9">'+
			'<input type="text" name="namequestion'+pregunta+'" id="namequestion'+pregunta+'" class="form-control" placeholder="¿Cual es ....?">'+
		'</div>'+
	'</div>'+
	'<div class="clearfix"></div>'+
	'<div class="form-group">'+
		'<label class="display-block text-semibold">Tipo de respuesta</label>'+
		'<label class="radio-inline">'+
			'<input type="radio" id="radio1'+pregunta+'" value="1" onclick="butonanswer('+pregunta+')" name="type-answer-question'+pregunta+'" class="styled">'+
			'Opción multiple'+
		'</label>'+
		'<label class="radio-inline">'+
			'<input type="radio" id="radio2'+pregunta+'" value="2" onclick="butonanswer('+pregunta+')" name="type-answer-question'+pregunta+'" class="styled">'+
			'Varias opciones'+
		'</label>'+
		'<label class="radio-inline">'+
			'<input type="radio" id="radio3'+pregunta+'" value="3" onclick="butonanswerocultar('+pregunta+')" name="type-answer-question'+pregunta+'" class="styled">'+
			'Respuesta abierta'+
		'</label>'+
		'<label class="radio-inline">'+
			'<input type="radio" id="radio4'+pregunta+'" value="4" onclick="butonanswerocultar('+pregunta+')" name="type-answer-question'+pregunta+'" class="styled">'+
			'Rango Pésimo a Excelente'+
		'</label>'+
	'</div>'+
	'<div id="panelanswer'+pregunta+'" class="panel panel-white noVisible">'+
		'<div class="panel-heading">'+
			'<h5 class="panel-title"><i class="icon-pencil position-left"></i> Respuestas</h5>'+
		'</div>'+
		'<div id="Respuestaspreg'+pregunta+'">'+
		'</div><br>'+
		'<input type="button" id="btnanswer'+pregunta+'" class="btn btn-info btn-xs noVisible" onclick="newanswer('+pregunta+');" value="Nueva respuesta"/>'+
		'<input type="button" id="btnremoveanswer'+pregunta+'" class="btn btn-danger btn-xs noVisible disabled col-lg-offset-1 col-md-offset-1 col-sm-offset-1" onclick="removeanswer('+pregunta+');" value="Eliminar ultima respuesta"/>'+
	'</div></div>';
	
	$("#preguntas").append(agregar);
	pregunta++;
	$("#btnanswer"+pregunta).removeClass('noVisible');
	window.scrollTo(0, $("#footer1").offset().top);
}

function butonanswer(pregunta){
	$("#btnanswer"+pregunta).removeClass('noVisible');
	$("#panelanswer"+pregunta).removeClass('noVisible');
	$("#btnremoveanswer"+pregunta).removeClass('noVisible');
}

function butonanswerocultar(pregunta){
	$("#btnanswer"+pregunta).addClass('noVisible');
	$("#panelanswer"+pregunta).addClass('noVisible');
	$("#btnremoveanswer"+pregunta).addClass('noVisible');
}

function newanswer(pregunta){
	lista[pregunta-1]+=1;
	var agregar='<div class="form-group" id="answer'+lista[pregunta-1]+'preg'+pregunta+'">'+
		'<label class="col-lg-3 control-label text-bold">Respuesta #'+lista[pregunta-1]+'</label>'+
		'<div class="col-lg-8">'+
			'<input type="text" id="respuesta'+lista[pregunta-1]+'preg'+pregunta+'" name="respuesta'+lista[pregunta-1]+'preg'+pregunta+'" class="form-control" placeholder="Respuesta X">'+
		'</div>'+
	'</div>';
	$("#Respuestaspreg"+pregunta).append(agregar);
	$("#btnremoveanswer"+pregunta).removeClass("disabled");	
	window.scrollTo(0, $("#footer1").offset().top);
}
 function removeanswer(pregunta) {
 	if(lista[pregunta-1]>=1){
	 	$("#answer"+lista[pregunta-1]+"preg"+pregunta).remove();
	 	lista[pregunta-1]-=1;
	 	if(lista[pregunta-1]==0){
	 		$("#btnremoveanswer"+pregunta).addClass("disabled");
	 	}
	 }
 }

 function deletequestion() {
 	if(lista.length>0){
 		$("#question"+lista.length).remove();
 		lista.pop();
 		pregunta--;
 		if(pregunta==1){
 			$("#removequestion").addClass("disabled");
 		}
 	} 
 }

function vistaPrevia(){
	var nombre = $("#nombre").val();
	var todo = new Array();
	for (var i = 1; i <= lista.length; i++) {
		todo.push(new Array());
		todo[i-1].push($("#namequestion"+i).val());
		if($('input[name=type-answer-question'+i+']:checked').val()==4){
			todo[i-1].push(1);
			todo[i-1].push(new Array());
			todo[i-1][2].push('PÉSIMO','MALO','REGULAR','BUENO','EXCELENTE');
		}else{
			todo[i-1].push($('input[name=type-answer-question'+i+']:checked').val());
			todo[i-1].push(new Array());
				for (var j = 1; j <= lista[i-1]; j++) {
					todo[i-1][2].push($("#respuesta"+j+"preg"+i).val());
				}
		}
	}
	var preguntas_respuestasJSON = JSON.stringify(todo);
	$.ajax({
		type    :'POST',
		data    :{preguntas_respuestas: preguntas_respuestasJSON, nombre: nombre, op: 8},
		dataType:"json",
		url		:'controllersAjax/ajaxEncuestas.php',
		success : function(data){
			if(data==1){
				window.open('index.php?action=prueba','_blank');
			}	        	
		}
	});
}