<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mapa con Puntos Cardinales</title>
  <style>
    #map {
      height: 400px;
      width: 80%;
      margin-right: auto;
      margin-left: auto;
      border: solid 1px black;
      margin-top: 50px;
      margin-bottom: 50px;
      box-shadow: 5px 5px 5px 2px #abadb1;;
    }
  </style>
</head>

<body>
  <?php include("conex.php");

  $query = "SELECT latitud, longitud, descripcion, u.nombre as nombre, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha from eventos e, usuarios u
            where e.idUsuario = u.idUsuario and fecha between (now() - INTERVAL 5 DAY) AND now() and estado = '1'";

  $resultadoMapa = mysqli_query($conex, $query);

  ?>
   <div id="map"></div>

  <script>
   
    function initMap() {
      // Coordenadas del centro del mapa
      const mapOptions = {
          center: { lat: -34.61, lng: -58.38 }, // Coordenadas de Buenos Aires
          zoom: 13,
        };

        const map = new google.maps.Map(
          document.getElementById("map"),
          mapOptions
        );


        const heatMapData = [
          <?php
          foreach ($resultadoMapa as $datos) {
          ?>
          ,{ location: new google.maps.LatLng(<?php echo $datos['latitud']; ?>, <?php echo $datos['longitud'];?>), weight: 0.5 },
          <?php
      }
      ?>   
          // Agrega más puntos de muestra aquí
        ]; 
      // Marcadores para los puntos cardinales
  
      

      const heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatMapData,
          map: map,
        });
        
      heatmap.set("radius", 20);

    }
    
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkgT0RFUq4nueCZBxig7rpOjoQoPM1XY&libraries=visualization&callback=initMap"></script>


</body>

</html>