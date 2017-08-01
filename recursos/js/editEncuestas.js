function deleteEncuesta(){
	if($('#selEcnuestas1').val()!=""){
		swal({
		  title: "¿Esta seguro de querer eliminar esta encuesta?",
		  text: "Se eliminará la encuesta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, Eliminarla",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#delete1').serialize()+'&op=1',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
		        	var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Eliminacion exitosa','Se ha eliminado la encuesta.',"success");
		        	}else{
		        		swal('Eliminacion fallida','No se pudo eliminar la encuesta.',"error");
		        	}
		        	actualizarEncuestas('selEcnuestas1');
		        	actualizarEncuestas('selEcnuestas2');
		        	actualizarEncuestas('selEcnuestas3');
		        	actualizarEncuestas('selEcnuestas4');
		        	actualizarEncuestas('selEcnuestas5');
		        	actualizarEncuestas('selEcnuestas6');
		        	actualizarEncuestas('id_3');
		        			        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado alguna encuesta');
	}
}
function deletepregunta(){
	if($('#selEcnuestas2').val()!="" && $('#selpreguntas2').val()!=""){
		swal({
		  title: "¿Esta seguro de querer eliminar esta pregunta?",
		  text: "Se eliminará una pregunta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, Eliminarla",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#delete2').serialize()+'&op=2',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
		        	var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Eliminacion exitosa','Se ha eliminado la pregunta.',"success");
		        	}else{
		        		swal('Eliminacion fallida','No se pudo eliminar la pregunta.',"error");
		        	}
		        	
		        	$("#selEcnuestas2").val("").change();
		        	$("#selPreguntas2").val("").change();
		        	$("#selPreguntas2").attr('disabled','disabled');
		        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado algunos campos');
	}
}

function deleteRespuesta(){
	if($('#selEcnuestas3').val()!="" && $('#selpreguntas3').val()!="" && $('#selRespuestas2').val()!=""){
		swal({
		  title: "¿Esta seguro de querer eliminar esta respuesta?",
		  text: "Se eliminará una respuesta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, Eliminarla",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#delete3').serialize()+'&op=3',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
		        	var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Eliminacion exitosa','Se ha eliminado la respuesta.',"success");
		        	}else{
		        		swal('Eliminacion fallida','No se pudo eliminar la respuesta.',"error");
		        	}
		        	$("#selEcnuestas3").val("").change();
		        	$("#selPreguntas3").val("").change();
					$("#selPreguntas3").attr('disabled','disabled');
					$("#selRespuestas2").val("").change();
		        	$("#selRespuestas2").attr('disabled','disabled');
		        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado algunos campos');
	}
}

function llenarpreguntas(id,num){
	$("#selPreguntas"+num).removeAttr("disabled");
	$('#selPreguntas'+num).html("");
	$("#selRespuestas2").attr('disabled','disabled');
	$('#selRespuestas2').html("");
	$("#selRespuestas1").attr('disabled','disabled');
	$('#selRespuestas1').html("");
	$.ajax({
        type    :'POST',
        data    :'op=5&idEncuesta='+id,
       	url		:'controllersAjax/ajaxEditEncuesta.php',
        success : function(valor){
        	var myObj = $.parseJSON(valor);
        	var opciones="<option></option>";
        	for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		opciones+='<option value="'+counter.id_pregunta+'" id="p'+counter.id_pregunta+'">'+counter.pregunta+'</option>';
            }
            $('#selPreguntas'+num).html(opciones);
        }
	});
}

function llenarRespuestas(id,num){
	$("#selRespuestas"+num).removeAttr("disabled");
	$('#selRespuestas'+num).html("");
	$.ajax({
        type    :'POST',
        data    :'op=6&idpregunta='+id,
       	url		:'controllersAjax/ajaxEditEncuesta.php',
        success : function(valor){
        	var myObj = $.parseJSON(valor);
        	var opciones="<option></option>";
        	for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		opciones+='<option value="'+counter.id_respuesta+'" id="r'+counter.id_respuesta+'">'+counter.respuesta+'</option>';
            }
            $('#selRespuestas'+num).html(opciones);
        }
	});
}

function actualizarEncuestas(sel){
	$.ajax({
        type    :'POST',
        data    :'op=4',
       	url		:'controllersAjax/ajaxEditEncuesta.php',
        success: function(resp){
        	var opciones="<option></option>";
            $('#'+sel).html(opciones+resp);
        }
    });
}

function llenarEncuesta(val){
	$("#nombreEncuesta").val($("#"+val).html());
	$("#nombreEncuesta").removeAttr("disabled");
}
function llenarPregunta(val){
	$("#nombrePregunta").val($("#p"+val).html());
	$("#nombrePregunta").removeAttr("disabled");
}
function llenarRespuesta(val){
	$("#nombreResp").val($("#r"+val).html());
	$("#nombreResp").removeAttr("disabled");
}

function modificarEncuesta(){
	if($('#nombreEncuesta').val()!=""){
		swal({
		  title: "¿Esta seguro de querer cambiar el nombre de la encuesta?",
		  text: "Se cambiara el nombre de la encuesta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, Cambiar",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#modificar1').serialize()+'&op=7',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
					var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Cambio exitoso','Se ha cambiado el nombre de la encuesta.',"success");
		        	}else{
		        		swal('Cambio fallido','No se pudo cambiar el nombre de la encuesta.',"error");
		        	}
		        	actualizarEncuestas('selEcnuestas1');
		        	actualizarEncuestas('selEcnuestas2');
		        	actualizarEncuestas('selEcnuestas3');
		        	actualizarEncuestas('selEcnuestas4');
		        	actualizarEncuestas('selEcnuestas5');
		        	actualizarEncuestas('selEcnuestas6');
					actualizarEncuestas('id_3');
					$("#nombreEncuesta").attr('disabled','disabled');
					$('#nombreEncuesta').val('');		
		        			        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha llenado el nuevo nombre de la encuesta');
	}
}
function modificarpregunta(){
	if($('#selEcnuestas5').val()!="" && $('#selpreguntas5').val()!="" && $('#nombrePregunta').val()!=""){
		swal({
		  title: "¿Esta seguro de querer modificar esta pregunta?",
		  text: "Se modificará una pregunta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, modificarla",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#modificar2').serialize()+'&op=8',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
		        	var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Eliminacion exitosa','Se ha modificado la pregunta.',"success");
		        	}else{
		        		swal('Eliminacion fallida','No se pudo modificar la pregunta.',"error");
		        	}
		        	
		        	$("#selEcnuestas5").val("").change();
		        	$("#selPreguntas5").val("").change();
					$("#selPreguntas5").attr('disabled','disabled');
					$("#nombrePregunta").attr('disabled','disabled');
					$('#nombrePregunta').val('');
		        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado algunos campos');
	}
}

function modificarRespuesta(){
	if($('#selEcnuestas6').val()!="" && $('#selpreguntas4').val()!="" && $('#selRespuestas1').val()!="" && $('#nombreResp').val()!=""){
		swal({
		  title: "¿Esta seguro de querer modificar esta respuesta?",
		  text: "Se modificará una respuesta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, modificarla",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		        type    :'POST',
		        data    :$('#modificar3').serialize()+'&op=9',
		       	url		:'controllersAjax/ajaxEditEncuesta.php',
		        success : function(valor){
		        	var myObj = $.parseJSON(valor);
		        	if(myObj[1]==null){
		        		swal('Eliminacion exitosa','Se ha modificado la respuesta.',"success");
		        	}else{
		        		swal('Eliminacion fallida','No se pudo modificar la respuesta.',"error");
		        	}
		        	$("#selEcnuestas6").val("").change();
		        	$("#selPreguntas4").val("").change();
					$("#selPreguntas4").attr('disabled','disabled');
					$("#selRespuestas1").val("").change();
		        	$("#selRespuestas1").attr('disabled','disabled');
		        }
			});
		});
	}else{
		swal('Faltan datos por llenar','No se ha seleccionado algunos campos');
	}
}