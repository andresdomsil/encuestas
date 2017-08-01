var tabla=null;
$(function(){
	tabla=$('#tabla_TipoEncuestado').DataTable();
	llenartabla();
});

function llenartabla(){
	tabla.clear();
	$.ajax({
        type    :'POST',
        data    :'op=1',
        url     :'controllersAjax/ajaxTipoEncuestado.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nombre,
                    '<button onclick="modificarTipoEncuestado('+counter.idTipo_encuestado+',\''+counter.nombre+'\')" class="btn btn-info btn-xs"><i class="icon-pencil"></i></button>'+
                    '<button onclick="deleteTipoEncuestado('+counter.idTipo_encuestado+',\''+counter.nombre+'\')" class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>'
                ] ).draw();
            }
           
        }
	});
}

function newTipo_Encuestado(){

	if($("#newTipoEncuestado").val()!=""){
		$.ajax({
	        type    :'POST',
	        data    :$("#formTipoEncuestado").serialize(),
	        url     :'controllersAjax/ajaxTipoEncuestado.php',
	        success : function(){
	            llenartabla();
	            swal("Añadido correctamente!", "Se ha añadido correctamente el tipo de encuestado \""+$("#newTipoEncuestado").val()+"\"", "success");
	            $("#newTipoEncuestado").val("");
	        }
		});
	}
}

function deleteTipoEncuestado(id,nombre){
	swal({
	  title: "¿Esta seguro de querer eliminar este Tipo Encuestado?",
	  text: "Se eliminará la Tipo Encuestado "+nombre,
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#59DF55",
	  confirmButtonText: "Si, Eliminarlo",
	  cancelButtonText: "No, Cancelar!",
	  closeOnConfirm: false
	},
	function(){
	    $.ajax({
	        type    :'POST',
	        data    :'op=3&id='+id,
	        url     :'controllersAjax/ajaxTipoEncuestado.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==1451) {
	        		swal('Error al eliminar Tipo Encuestado','El Tipo Encuestado tiene asociadas una o varias encuestas',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Eliminado!", "Se ha eliminado correctamente la Tipo Encuestado "+nombre, "success");
	        		llenartabla();
	        	}
	        }
		});
	});
}

function modificarTipoEncuestado(id,nombre){
	swal({
	  title: "Modificar Tipo Encuestado!",
	  text: "Escriba el nombre de el Tipo Encuestado:",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  animation: "slide-from-top",
	  inputValue: nombre
	},
	function(inputValue){
	  if (inputValue === false) return false;
	  
	  if (inputValue === "") {
	    swal.showInputError("Por favor, llene el campo");
	    return false;
	  }
	  $.ajax({
	        type    :'POST',
	        data    :'op=4&id='+id+'&nombre='+inputValue,
	        url     :'controllersAjax/ajaxTipoEncuestado.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==null) {
	        		swal("Modificado con exito!", "Se ha modificado correctamente el nombre de el Tipo Encuestado a \""+inputValue+"\"", "success");
	        		llenartabla();
	        	}else{
	        		swal("Error", myObj[2], "error");
	        	}
	        }
		});
	});
}