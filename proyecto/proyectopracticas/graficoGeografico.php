<?php

require_once("conex.php");

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Denuncias'],
          
          <?php
                $sql = "SELECT p.descripcion as nombre ,count(p.Descripcion) as cantidad FROM eventos e, localidades l, paises p, provincias pro 
                WHERE e.idLocalidad = l.idLocalidad AND p.idPais = pro.IDPais AND pro.IDProvincia = l.IDProvincia and estado = 1 GROUP BY p.Descripcion";

                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['nombre']."', ".$i['cantidad']."],";
                }
                ?>
        ]);

        var options = {
         colorAxis: {colors: ['green','cyan', 'blue']},
          backgroundColor: '#ffffff',
          datalessRegionColor: '#BBBBBB',
         
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 100%; height:400px;"></div>
  </body>
</html>
