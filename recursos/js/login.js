function login_1(){
	if($("#correo").val()!=""){
		$.ajax({
	        type    :'POST',
	        data    :$("#login_1").serialize(),
	        url     :'controllersAjax/ajaxLogin.php',
	        cache: false,
	        success : function(response){
	            if(response == "true"){
	            	 window.location= ("index.php?action=realizar_encuesta");
	            	 
	            }
	            else if(response == "false"){
	            	swal('Error al iniciar sesión','El correo no es correcto o no se encuentra registrado',"error");
	            }
	        }
	        
		});
	} else {
		swal('Error al iniciar sesión','Escriba su correo',"error");
	            
	}
}
function login_2(){
	if($("#correo2").val()!="" || $("#pass").val()!=""){
		$.ajax({
	        type    :'POST',
	        data    :$("#login_2").serialize(),
	        url     :'controllersAjax/ajaxLogin.php',
	        success : function(response){
	          if(response == "true"){
	            	 window.location.href = "index.php?action=inicio";
	            	 
	            }
	            else if(response == "false"){
	            	swal('Error al iniciar sesión','El correo o contraseña no son correctos o no se encuentra registrado',"error");
	            }
	        }
		});
	} else {
		swal('Error al iniciar sesión','Escriba su correo y contraseña',"error");
	}
}