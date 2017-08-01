function enviarCorreso(){
    swal({
		  title: "Confirmacion de envio de correos",
		  text: "Se enviaran correos a cada encuestado que no haya realizado la encuesta",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#59DF55",
		  confirmButtonText: "Si, Enviar correos",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false
		},
		function(){
		    $.ajax({
		       	url		:'controllersAjax/ajaxCorreos.php',
		        success : function(valor){
                    swal('Envio exitoso','Se han enviado los correos a las personas a encuestar.',"success");
                }
		        	
			});
		});
}