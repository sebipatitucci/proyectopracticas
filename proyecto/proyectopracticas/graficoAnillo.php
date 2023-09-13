<?php

require_once("conex.php");

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
                $sql = "SELECT l.descripcion as descripcion,count(l.Descripcion) as cantidad FROM eventos e, localidades l WHERE e.idLocalidad = l.idLocalidad and estado = 1 GROUP BY l.Descripcion";
                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['descripcion']."', ".$i['cantidad']."],";
                }
                ?>
        ]);

        var options = {
          title: 'Localidades con mas denuncias',
          pieHole: 0.4,
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>