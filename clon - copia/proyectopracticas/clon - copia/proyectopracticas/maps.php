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
    }
  </style>
</head>

<body>
  <?php include("conex.php");

  $query = "SELECT latitud, longitud, descripcion, u.nombre as nombre, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha from eventos e, usuarios u
            where e.idUsuario = u.idUsuario and fecha between (now() - INTERVAL 5 DAY) AND now()";

  $resultadoMapa = mysqli_query($conex, $query);

  ?>
   <div id="map"></div>

  <script>
   
    function initMap() {
      // Coordenadas del centro del mapa
      const center = {
        lat: -34.6625,
        lng: -58.35

      };

      // Crear el mapa
      const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: center
      });

      // Marcadores para los puntos cardinales
      var markers = [
        <?php
      foreach ($resultadoMapa as $datos) {
      ?>
        ,{
          position: {
            lat: <?php echo $datos['latitud']; ?>,
            lng: <?php echo $datos['longitud']; ?>
          },
          title: '<?php echo $datos['descripcion']; ?>, denuncia realizada por <?php echo $datos['nombre']; ?>, el dia <?php echo $datos['fecha']; ?> ',
        },
     
        <?php
      }
      ?>
        // Agrega más puntos cardinales aquí si lo deseas
      ];
      

        // Agregar los marcadores al mapa
        markers.forEach(function(marker) {
          new google.maps.Marker({
            position: marker.position,
            map: map,
            title: marker.title
          });
        });
    }
    
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkgT0RFUq4nueCZBxig7rpOjoQoPM1XY&callback=initMap"></script>
</body>

</html>