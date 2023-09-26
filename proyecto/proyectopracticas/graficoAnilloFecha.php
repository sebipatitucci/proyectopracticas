<?php

require_once("conex.php");

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartAnillo);
      function drawChartAnillo() {
        var data3 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
                $sql = " SELECT date_format(fecha,'%d-%m-%Y') as fecha, COUNT(fecha) as cantidad fROM eventos WHERE estado = 1 GROUP BY fecha ORDER BY cantidad desc LIMIT 10";

                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['fecha']."', ".$i['cantidad']."],";
                }
                ?>
        ]);

        var options = {
          title: 'Días con mas denuncias',
          pieHole: 0.4,
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartAnillo'));
        chart.draw(data3, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchartAnillo" style="width: 700px; height: 500px;"></div>
  </body>
</html>