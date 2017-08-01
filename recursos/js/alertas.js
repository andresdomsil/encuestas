var titulo="";
$(function() {
	$.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
    var b=$.get('action');
    if(b=='fallo'){
    	swal('Error al iniciar sesión','El usuario o contraseña no es correcta',"error");
    }
    $(document).attr("title", titulo);
});


