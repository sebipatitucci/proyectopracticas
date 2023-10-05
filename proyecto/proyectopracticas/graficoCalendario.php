<?php

require_once("conex.php");

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'string', id: 'Date' });
       dataTable.addColumn({ type: 'string', id: 'Won/Loss' });
       dataTable.addRows([
          [ new Date(2012, 3, 13), 37032 ],
          <?php
                $sql = "SELECT fecha, nombre fROM eventos e, usuarios u WHERE estado = 1 AND e.idUsuario = u.idUsuario                 ";

                $resultado = mysqli_query($conex, $sql);
                
                foreach($resultado as $i){
                    echo "['" .$i['fecha']."', ".$i['nombre']."],";
                }
                ?>  
        ]);

       var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

       var options = {
         title: "Red Sox Attendance",
         height: 350,
       };

       chart.draw(dataTable, options);
   }
    </script>
  </head>
  <body>
    <div id="calendar_basic" style="width: 100%; height: 350px;"></div>
  </body>
</html>