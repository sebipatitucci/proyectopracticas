<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mapa con Puntos Cardinales</title>
  <style>
    #mapBase {
      height: 600px;
      width: 90%;
      margin-right: auto;
      margin-left: auto;
      border: solid 1px black;
      margin-top: 50px;
      margin-bottom: 50px;
      box-shadow: 5px 5px 5px 2px #abadb1;
    }
  </style>
</head>

<body>
  <?php include("conex.php");
  session_start();
  $map = $_GET['map'];


  $query2 = "SELECT estado, uEstado, latitud, longitud, descripcion, u.nombre as nombre, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha from eventos e, usuarios u
          where e.idUsuario = u.idUsuario and estado = 1 and uEstado = 1 and $map = idEventos and '$_SESSION[id]' = u.idUsuario ";

  echo $query2;
  $resultadoMapa2 = mysqli_query($conex, $query2);

  ?>
  <div id="mapBase"></div>

  <script>
    function initMap() {
      // Marcadores para los puntos cardinales
      var markers = [
        <?php
        foreach ($resultadoMapa2 as $datos2) {

          $latitud = $datos2['latitud'];
          $longitud = $datos2['longitud'];
        ?>, {
            position: {
              lat: <?php echo $datos2['latitud']; ?>,
              lng: <?php echo $datos2['longitud']; ?>
            },
            title: '<?php echo $datos2['descripcion']; ?>, denuncia realizada por <?php echo $datos2['nombre']; ?>, el dia <?php echo $datos2['fecha']; ?> ',
          },
  
        <?php
        }
        ?>
        // Agrega más puntos cardinales aquí si lo deseas
      ];
      // Coordenadas del centro del mapa
      const center = {
        lat: <?php echo $latitud;?>,
        lng: <?php echo $longitud; ?>

      };


      // Crear el mapa
      const mapa = new google.maps.Map(document.getElementById('mapBase'), {
        zoom: 12,
        center: center
      });



      // Agregar los marcadores al mapa
      markers.forEach(function(marker) {
        new google.maps.Marker({
          position: marker.position,
          map: mapa,
          title: marker.title
        });
      });
    }
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkgT0RFUq4nueCZBxig7rpOjoQoPM1XY&callback=initMap"></script>
</body>

</html>