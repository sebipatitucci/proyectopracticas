<?php

require_once("conex.php");

?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Accidente', 'Cantidad'],
          <?php
                $sql = "SELECT a.descripcion as descripcion, COUNT(e.idAccidente) as cantidad FROM eventos e, accidentes a WHERE e.idAccidente = a.idAccidente and estado = 1 GROUP BY e.idAccidente";
                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['descripcion']."', ".$i['cantidad']."],";
                }
                ?>
        ]);

        var options = {
          title: 'Cantidad de denuncias por tipo de accidente',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 100%; height: 500px; margin-bottom: 50px;"></div>
  </body>
</html>

