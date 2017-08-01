$(function(){
	if(typeof encuestarealizada!='undefined'){
		swal({
			title: "Encuesta ya realizada",
			text: "Usted con anterioridad ya habia realizado esta encuesta.",
			type: "success",
			confirmButtonColor: "#04B404",
			confirmButtonText: "OK",
			closeOnConfirm: false
			},
			function(){
			location.href = "index.php?action=salir";
		});
	}
});

function registrar(encuesta,correo){
	for (var i = 0; i < pregResp.length; i++) {
		if(pregResp[i][1]==1){
			pregResp[i][2].push($('input[name=respuestaspreg'+pregResp[i][0]+']:checked', '#formencuesta').val());
		}else if(pregResp[i][1]==2){
			var j=1;
			while($("#resp"+j+"idpreg"+pregResp[i][0]).length>0){
				if ($('#resp'+j+'idpreg'+pregResp[i][0]).is(":checked")){
				pregResp[i][2].push($('#resp'+j+'idpreg'+pregResp[i][0]).val());
				}
				j++;
			}
			pregResp[i][2].push();
		}else if(pregResp[i][1]==3){
			pregResp[i][2].push($('#respAbiertapreg'+pregResp[i][0]).val());
		}
	}
	var preguntas_respuestasJSON = JSON.stringify(pregResp);
		$.ajax({
	        type    :'POST',
	        data    :{preguntas_respuestas: preguntas_respuestasJSON, idencuesta:idEncuesta, encuesta:encuesta, correo:correo, op: 4},
    		dataType:"json",
	       	url		:'controllersAjax/ajaxEncuestas.php',
	        success : function(data){
	        	if(data==1){
	        		swal({
						title: "Encuesta Guardada!",
						text: "Gracias por realizar esta encuesta Dep. E2M",
						type: "success",
						confirmButtonColor: "#04B404",
						confirmButtonText: "OK",
						closeOnConfirm: false
						},
						function(){
						location.href = "index.php?action=salir";
					});
				}	        	
	        }
		});
}