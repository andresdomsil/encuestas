var tabla=null;
$(function(){
	tabla=$('#tabla_detalle_ecneustado').DataTable();				        
	llenartabla();
});

function llenartabla(){
	tabla.clear();
	$.ajax({
        type    :'POST',
        data    :'op=9',
        url     :'controllersAjax/ajaxEncuestas.php',
        success : function(valores){
            var myObj = jQuery.parseJSON(valores);	
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
           		tabla.row.add([
                    counter.nombre,
                    counter.nom_tipo,
                    counter.nom_carr,
                    counter.fecha_ini,
                    counter.fecha_fin
                ] ).draw();
            }
        }
	});
}