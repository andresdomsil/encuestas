function actualizacion(id){
	var op=0;
	if(id=="EncuestasContestadas"){
		op=1;
	}else if(id=="EncuestasCreadas"){
		op=2;
	}else if(id=="TotalDeEncuestados"){
		op=3;
	}
	$.ajax({
        type    :'POST',
        data    :'op='+op,
       	url		:'controllersAjax/ajaxActualizadores.php',
        success : function(valor){
        	$("#"+id).html(valor);
        }
	});
}