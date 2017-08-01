var tabla=null;
$(function(){
	tabla=$('#tabla_Encuestas').DataTable();				        
	llenartabla();
});

function llenartabla(){
	tabla.clear();
	$.ajax({
        type    :'POST',
        data    :'op=5',
        url     :'controllersAjax/ajaxEncuestas.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);	
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nom_encuesta,
                    counter.nom_carrera,
                    counter.nombre,
                    counter.total_para_encuestar,
                    counter.total_Encuestas_realizadas
                ] ).draw();
            }
        }
	});
}