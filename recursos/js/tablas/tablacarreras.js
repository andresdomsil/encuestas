var tabla=null;
$(function(){
	tabla=$('#tabla_Carreras').DataTable();
	llenartabla();
});

function llenartabla(){
	tabla.clear();
	$.ajax({
        type    :'POST',
        data    :'op=1',
        url     :'controllersAjax/ajaxCarreras.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);	
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nombre,
                    '<button onclick="modificarCarrera('+counter.id_Carrera+',\''+counter.nombre+'\')" class="btn btn-info btn-xs"><i class="icon-pencil"></i></button>'+
                    '<button onclick="deleteCarrera('+counter.id_Carrera+',\''+counter.nombre+'\')" class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>'
                ] ).draw();
            }
        }
	});
}

function newCarrera(){
	if($("#newcarrera").val()!=""){
		$.ajax({
	        type    :'POST',
	        data    :$("#formcarrera").serialize(),
	        url     :'controllersAjax/ajaxCarreras.php',
	        success : function(){
	            llenartabla();
	            swal("Añadido correctamente!", "Se ha añadido correctamente la carrera "+$("#newcarrera").val(), "success");
	            $("#newcarrera").val("");
	        }
		});
	}
}

function deleteCarrera(id,nombre){
	swal({
	  title: "¿Esta seguro de querer eliminar esta carrera?",
	  text: "Se eliminará la carrera "+nombre,
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
	        url     :'controllersAjax/ajaxCarreras.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==1451) {
	        		swal('Error al eliminar carrera','La carrera tiene asociadas una o varias encuestas',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Eliminado!", "Se ha eliminado correctamente la carrera "+nombre, "success");
	        		llenartabla();
	        	}
	        }
		});
	});
}

function modificarCarrera(id,nombre){
	swal({
	  title: "Modificar carrera!",
	  text: "Escriba el nombre de la carrera:",
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
	        url     :'controllersAjax/ajaxCarreras.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==null) {
	        		swal("Modificado con exito!", "Se ha modificado correctamente el nombre de la carrera a \""+inputValue+"\"", "success");
	        		llenartabla();
	        	}else{
	        		swal("Error", myObj[2], "error");
	        	}
	        }
		});
	});
}