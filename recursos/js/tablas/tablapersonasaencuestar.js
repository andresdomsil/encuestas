var tabla=null;
$(function(){
	tabla=$('#tabla_Personasaencuestar').DataTable();				        
	llenartabla();

});

function llenartabla(){
	tabla.clear().draw();
	$.ajax({
        type    :'POST',
        data    :'op=2',
        url     :'controllersAjax/ajaxPersonasaencuestar.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);	
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nombre,
                    counter.correo,
                    counter.nomcarrera,
                    counter.nombretipo,
                    '<button onclick="llenarModalEncuestado('+counter.idEncuestado+',\''+counter.nombre+'\')" class="btn btn-info btn-xs"><i class="icon-pencil"></i></button>'+
                    '<button onclick="deleteEncuestado('+counter.idEncuestado+',\''+counter.nombre+'\')" class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>'
                ] ).draw();
            }
        }
	});
}

function newPersonasAEncuestar(){
	if($("#newperosnasaencuestar").val()!="" && $("#id_1").val()!="" && archivo==1){
		formData.append('op',1);
		formData.append('tipoencuestado',$("#newperosnasaencuestar").val());
		formData.append('carrera',$("#id_1").val());
		formData.append('SITE_ROOT',$("#siteroot").val());
		$.ajax({
	        type    :'POST',
	        data    :formData,
	        contentType: false,
	        processData: false,
	        url     :'controllersAjax/ajaxPersonasaencuestar.php',
	        success : function(valor){
	        	if (valor=="duplicado") {
	        		swal('Error al insertar algunas personas','Algunas personas ya se encontraban registradas en la base de datos ',"error");
	        	}else if (valor=="") {
	        		swal("Añadidos correctamente!", "Se han añadido correctamente las personas a encuestar", "success");
	        	}
	        	llenartabla();
        		mydz.removeAllFiles();
	        	$("#newperosnasaencuestar").val('').change();
	        	$("#id_1").val('').change();
	        	archivo=0;
			}
		});
	}else {
		swal('Faltan elementos por llenar','Alguno de los campos esta vacio');
	}
}

function deleteEncuestado(id,nombre){
	swal({
	  title: "¿Esta seguro de querer eliminar esta perosna?",
	  text: "Se eliminará a "+nombre,
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
	        url     :'controllersAjax/ajaxPersonasaencuestar.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==1451) {
	        		swal('Error al eliminar a la persona','La perosna ha realizado una encuesta',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Eliminado!", "Se ha eliminado correctamente a la persona "+nombre, "success");
	        		llenartabla();
	        	}
	        }
		});
	});
}

function borrarTabla(){
	swal({
	  title: "¿Esta seguro de querer eliminar todas las personas a encuestar?",
	  text: "Se eliminará para que pueda registrar a las nuevas personas con datos mas actualizados.",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#59DF55",
	  confirmButtonText: "Si, Eliminarlos",
	  cancelButtonText: "No, Cancelar!",
	  closeOnConfirm: false
	},
	function(){
		$.ajax({
			type    :'POST',
			data    :'op=6',
			url     :'controllersAjax/ajaxPersonasaencuestar.php',
			success : function(valor){
				swal("Eliminados!", "Se ha eliminado correctamente a todos las personas a encuestar.", "success");
				llenartabla();
			}
		});
	});
}

function llenarModalEncuestado(id,nombre){
    $.ajax({
        type    :'POST',
        data    :'op=4&id='+id,
        url     :'controllersAjax/ajaxPersonasaencuestar.php',
        success : function(valor){
        	var myObj = jQuery.parseJSON(valor);
        	$('#nom').val(myObj.nombre);
            $('#id').val(myObj.idEncuestado);
            $('#correo').val(myObj.correo);
            $('#sel').val(myObj.idTipo_encuestado).change();
            $('#editpersona').modal({
                show:true,
                backdrop:'static'
            });
        }
	});
}

function modificarEncuestado(){
    $.ajax({
        type    :'POST',
        data    :$("#formactualizar").serialize()+'&op=5',
        url     :'controllersAjax/ajaxPersonasaencuestar.php',
        success : function(valor){
        	var myObj = jQuery.parseJSON(valor);
        	if (myObj[1]==1062) {
	        		swal('Error al modificar a la persona','Ya existe un registro con este nombre.',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Modificado!", "Se ha modificado correctamente a la persona", "success");
	        		llenartabla();
	        		$('#editpersona').modal('toggle'); 
	        	}
        }
	});
}