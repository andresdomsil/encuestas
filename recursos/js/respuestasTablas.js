function llenartablas(id_Encuesta){
	$.ajax({
        type    :'POST',
        data    :'op=6&id_Encuesta='+id_Encuesta,
       	url		:'controllersAjax/ajaxEncuestas.php',
        success : function(valor){
        	$("#panelesTablas").html(valor);
        }
	});
}
function exportar(){
	var id = $("#id_3").val();
	window.open('Excel/tablas.php?id='+id,'_blank');
}