<?php
include("conex.php");
#consulta denuncias activadas
$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%i') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre
                    FROM eventos e, usuarios u, accidentes a
                    WHERE e.estado = 1
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    order by e.idEventos asc";
$resultado = mysqli_query($conex, $consulta);


?>



    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nº</th>
            <th scope="col">Tipo de accidente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Comentario</th>
            <th scope="col">Usuario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
            foreach($resultado as $i){
            $descripcion = ucfirst($i['descripcion']);
            echo "<th scope='row'>$i[idEventos]</th>
            <td>$i[dAccidente]</td>
            <td>$i[fecha]</td>
            <td>$i[hora]</td>
            <td>$descripcion</td>
            <td>$i[nombre]</td>
            <td><a href='aEliminar.php?aBorrar=$i[idEventos] ' <i class='fa-solid fa-trash' style='color: #ff2b05;'></i></a></td> 
            </tr>";
            
        }
        ?>
        </tbody>
    </table>


  
<?php


#consulta denuncias desactivadas
$query = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%i') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre
                    FROM eventos e, usuarios u, accidentes a
                    WHERE e.estado = 0
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    order by e.idEventos asc";
$result = mysqli_query($conex, $query);

?>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          Denuncias desactivadas 
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">

          <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nº</th>
              <th scope="col">Tipo de accidente</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col">Comentario</th>
              <th scope="col">Usuario</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php 
              foreach($result as $j){
                $descripcion = ucfirst($j['descripcion']);
              echo "<th scope='row'>$j[idEventos]</th>
              <td>$j[dAccidente]</td>
              <td>$j[fecha]</td>
              <td>$j[hora]</td>
              <td>$descripcion</td>
              <td>$j[nombre]</td>
              <td><a href='eliminar.php?activar=$j[idEventos] ' <i class='fa-solid fa-house-medical-circle-check' style='color: #19e67c;'></i></a></td> 
              </tr>";
              
          }
          ?>
          </tbody>
          </table>

      </div>
    </div>
  </div>
<?php

$conex->close();

?>