<?php

require_once("conex.php");

?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasicY);

function drawBasicY() {

      var data2 = google.visualization.arrayToDataTable([
        ['Robos', 'Cantidad de robos',],
        <?php
                $sql = "SELECT nombre, COUNT(nombre) as cantidad FROM usuarios u, eventos e WHERE u.idUsuario = e.idUsuario AND e.estado = 1 and idPerfil = 2 and uEstado = 1 GROUP BY nombre order by cantidad desc limit 7";
                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['nombre']."', ".$i['cantidad']."],";
                }
                ?>
      ]);

      var options = {
        title: 'Accidentes mas denunciados',
        chartArea: {width: '50%'},
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));

      chart.draw(data2, options);
    }
    </script>
</head>

<body>
    <div id="chart_div2" style="width: 700px; height: 400px;"></div>
</body>

</html>