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
      google.charts.setOnLoadCallback(drawRegionsMap2);

      function drawRegionsMap2() {
        var data = google.visualization.arrayToDataTable([
          ['Localidad', 'Denuncias'],
          
          <?php
                $sql = "  SELECT pro.descripcion as nombre, count(pro.Descripcion) as cantidad FROM eventos e, localidades l, paises p, provincias pro 
                WHERE p.idPais = pro.IDPais AND pro.IDProvincia = l.IDProvincia and e.idLocalidad = l.idLocalidad and estado = 1 AND p.descripcion = 'Argentina' GROUP BY pro.Descripcion";
                 

                //  SELECT p.descripcion as nombre ,count(p.Descripcion) as cantidad FROM eventos e, localidades l, paises p, provincias pro 
                //  WHERE e.idLocalidad = l.idLocalidad AND p.idPais = pro.IDPais AND pro.IDProvincia = l.IDProvincia and estado = 1 GROUP BY p.Descripcion

                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['nombre']."', ".$i['cantidad']."],";
                }
                ?>
        ]);

        var options = {
        region: 'BR',
        resolution: 'provinces',
         colorAxis: {colors: ['green','cyan', 'blue']},
          backgroundColor: '#ffffff',
          datalessRegionColor: '#BBBBBB',
          defaultColor: '#ffffff',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div2" style="width: 100%; height: 500px;"></div>
  </body>
</html>
