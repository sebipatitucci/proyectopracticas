<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mapa con Puntos Cardinales</title>
  <style>
    #map {
      height: 300px;
      width: 300px;
    }
  </style>
</head>

<body>
  <?php include("conex.php");

  $query = "SELECT latitud, longitud from eventos";

  $resultadoMapa = mysqli_query($conex, $query);

  foreach ($resultadoMapa as $datos) {
    
  ?>
    
    <script>

      function initMap() {
        // Coordenadas del centro del mapa
        const center = {
          lat: <?php echo $datos['latitud']; ?>,
          lng: <?php echo $datos['longitud'];?>
        };

        // Crear el mapa
        const map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: center
        });

        // Marcadores para los puntos cardinales
        const markers = [{
            position: {
              lat: <?php echo $datos['latitud']; ?>,
              lng: <?php echo $datos['longitud'];?>
            },
         
          },
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
  <?php } ?>
  
  <div id="map"></div>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkgT0RFUq4nueCZBxig7rpOjoQoPM1XY&callback=initMap"></script>
</body>

</html>