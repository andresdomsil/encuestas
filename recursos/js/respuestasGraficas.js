function llenargraficas(id_Encuesta){
    $.ajax({
        type    :'POST',
        data    :'op=7&id_Encuesta='+id_Encuesta,
        url     :'controllersAjax/ajaxEncuestas.php',
        success : function(valor){
            var myObj = jQuery.parseJSON(valor);
            console.log(myObj);
            var cont=0;
            var datalabels=new Array();
            var datatotal=new Array();
            var datacolor=new Array();
            $("#panelesGraficas").html("");
            for (var i = 0; i < myObj.length; i++) {
                var counter = myObj[i];
                if(counter[1]!=3){
                    for (var j = 0; j < counter[2].length; j+=2) {
                        datalabels.push(counter[2][j]);
                        datatotal.push(counter[2][j+1]);
                        datacolor.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
                    }
                    $("#panelesGraficas").append('<canvas id="grafica'+cont+'" height="80"></canvas>');
                    var ctx =$("#grafica"+cont);
                    var myPieChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: datalabels,
                            datasets: [
                            {
                                label: counter[0],
                                data: datatotal,
                                backgroundColor: datacolor,
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                    cont++;
                    datalabels=[];
                    datatotal=[];
                    datacolor=[];
                    $("#panelesGraficas").append('<br><br>');
                }else{
                    $("#panelesGraficas").append('<h2>"'+counter[0]+'" TIENE RESPUESTAS ABIERTAS</h2><br><br>');
                }
            }
        }
    });
}

