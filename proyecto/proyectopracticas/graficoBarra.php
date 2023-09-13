<?php

require_once("conex.php");

?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
       google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Robos', 'Cantidad de robos',],
        <?php
                $sql = "SELECT a.descripcion as descripcion, COUNT(e.idAccidente) as cantidad FROM eventos e, accidentes a WHERE e.idAccidente = a.idAccidente and estado = 1 GROUP BY e.idAccidente";
                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['descripcion']."', ".$i['cantidad']."],";
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

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>

</html>