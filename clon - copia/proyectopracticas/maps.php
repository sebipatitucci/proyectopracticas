<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mapa con Puntos Cardinales</title>
  <style>
    #map {
      height: 200px;
      width: 200px;
    }
  </style>
</head>
<body>
  <?php 
    include("conex.php");
    
    $provincia = $_GET['idProvincia'];
    $localidad = $_GET['idLocalidad'];

?>

  <div id="map"></div>

  <script>
    function initMap() {
      // Coordenadas del centro del mapa
      var center = { lat: -34.6712, lng: -58.3645 };

      // Crear el mapa
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: center
      });

      // Marcadores para los puntos cardinales
      var markers = [
      { position: { lat: -34.6712, lng: -58.3645 }, title: 'Estadio Libertadores de América' },
      { position: { lat: -34.6616, lng: -58.3667 }, title: 'Puente Nicolás Avellaneda' },
      { position: { lat: -34.6759, lng: -58.3633 }, title: 'Parque Domínico' }
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
  
</body>
</html>
