var tabla=null;
$(function(){
	tabla=$('#tabla_Usuarios').DataTable();				        
	llenartabla();
});

function llenartabla(){
	tabla.clear();
	$.ajax({
        type    :'POST',
        data    :'op=1',
        url     :'controllersAjax/ajaxUsuarios.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);	
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nombre+" "+counter.ape_pat+" "+counter.ape_mat,
                    counter.correo,
                    counter.pass,
                    counter.nombretipo,
                    '<button onclick="llenarModalUsuario('+counter.id_usuario+',\''+counter.nombre+' '+counter.ape_pat+' '+counter.ape_mat+'\')" class="btn btn-info btn-xs"><i class="icon-pencil"></i></button>'+
                    '<button onclick="deleteUsuario('+counter.id_usuario+',\''+counter.nombre+' '+counter.ape_pat+' '+counter.ape_mat+'\')" class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>'
                ] ).draw();
            }
        }
	});
}

function newUsuario(){
	if($("#nombre").val()!="" && $("#ape_pat").val()!="" && $("#ape_mat").val()!="" && $("#correo").val()!="" && $("#pass").val()!="" && $("#tipo").val()!=""){
		$.ajax({
	        type    :'POST',
	        data    :$("#formUsuario").serialize()+'&op=2',
	        url     :'controllersAjax/ajaxUsuarios.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]==1062) {
	        		swal('Error al registrar usuario','Este correo ya esta registrado',"error");
	        		limpiar();
	        	}else if (myObj[1]==null) {
	        		swal("Añadidos correctamente!", "Se han añadido correctamente el usuario", "success");
	        		limpiar();
	        		llenartabla();
	        	}
			}
		});
	}else{
		swal("Faltan datos por llenar!", "Aun falta completar algunos campos para el registro del nuevo usuario");
	}
}

function limpiar(){
	$("#nombre").val("");
	$("#ape_pat").val("");
	$("#ape_mat").val("");
	$("#correo").val("");
	$("#pass").val("");
	$("#tipo").val("").change();
}

function deleteUsuario(id,nombre){
	swal({
	  title: "¿Esta seguro de querer eliminar este usuario?",
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
	        url     :'controllersAjax/ajaxUsuarios.php',
	        success : function(valor){
	        	var myObj = jQuery.parseJSON(valor);
	        	if (myObj[1]!=null) {
	        		swal('Error al eliminar el usaurio','No se pudo eliminar el usuraio',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Eliminado!", "Se ha eliminado correctamente al usuario "+nombre, "success");
	        		llenartabla();
	        	}
	        }
		});
	});
}

function llenarModalUsuario(id,nombre){
    $.ajax({
        type    :'POST',
        data    :'op=4&id='+id,
        url     :'controllersAjax/ajaxUsuarios.php',
        success : function(valor){
        	var myObj = jQuery.parseJSON(valor);
        	$('#nombrem').val(myObj.nombre);
        	$('#ape_patm').val(myObj.ape_pat);
        	$('#ape_matm').val(myObj.ape_mat);
            $('#idm').val(myObj.id_usuario);
            $('#correom').val(myObj.correo);
            $('#passm').val(myObj.pass);
            $('#tipom').val(myObj.id_tipo_user).change();
            $('#editaruser').modal({
                show:true,
                backdrop:'static'
            });
        }
	});
}

function modificarUsuario(){
    $.ajax({
        type    :'POST',
        data    :$("#formactualizarusuario").serialize()+'&op=5',
        url     :'controllersAjax/ajaxUsuarios.php',
        success : function(valor){
        	var myObj = jQuery.parseJSON(valor);
        	if (myObj[1]==1062) {
	        		swal('Error al modificar al usuario','Ya existe un registro con este correo.',"error");
	        	}else if (myObj[1]==null) {
	        		swal("Modificado!", "Se ha modificado correctamente al usuario", "success");
	        		llenartabla();
	        		$('#editaruser').modal('toggle'); 
	        	}
        }
	});
}