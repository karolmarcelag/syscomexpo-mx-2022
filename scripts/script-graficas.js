function graficar() 
{
    $.post("funciones/mostrarRegistros.php", 
    {

    },

    function(respuesta)
    {
        var tabla = JSON.parse(respuesta)
        var options = 
        {
            title: 'Asistentes SYSCOM EXPO 2022 - Ciudad de México',
            hAxis: {title: 'Hora',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Hora');
        data.addColumn('number', '24 de Mayo');
        data.addColumn('number', '25 de Mayo');

        for (var x=0; x<12; x++)
        {
            var hora = tabla["datos"][x]["hora"]
            var dia1 = tabla["datos"][x]["dia1"]
            var dia2 = tabla["datos"][x]["dia2"]
            data.addRows([
                [hora, dia1, dia2]
            ])
        }

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'))
        chart.draw(data, options)
        
        $("#registros").val(tabla["cantidad"][0]["registros"])
        $("#asistentesUno").val(tabla["cantidad"][0]["asistentesUno"])
        $("#asistentesDos").val(tabla["cantidad"][0]["asistentesDos"])
    })
}

function iniciar()
{
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(graficar);
    console.log("update")
}

function cargar()
{
    iniciar()
    setInterval(iniciar, 20000)
}