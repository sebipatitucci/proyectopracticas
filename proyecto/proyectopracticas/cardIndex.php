<?php
include("conex.php");

$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%m') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre, uEstado
                    FROM eventos e, usuarios u, accidentes a
                    WHERE e.estado = 1
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    ORDER BY fecha desc";

$resultado = mysqli_query($conex, $consulta);

$denuncias = 0;
?>

  
            <?php 
            foreach($resultado as $i){
              $descripcion = ucfirst($i['descripcion']);
              ?>
              <div class="col-3">
              <div class="card text-bg-light mb-3" style="max-width: 18rem; max-height: 400px; box-shadow: 5px 5px 5px 2px #abadb1; border: solid 3px grey; margin-left: 20px; margin-top: 40px; ">
              <div class="card-header"><b><?php echo  $i['nombre']; ?></b></div>
              <div class="card-body">
                <h6 class="card-title"><?php echo  $i['dAccidente']; ?></h6>
                <p class="card-text" style="font-size: 15px; margin-bottom: 30px"><?php echo $descripcion; ?></p>
                <hr>
                <p class="card-text"><?php echo  $i['fecha']; echo " | ". $i['hora'];  ?></p>
              </div>
            </div>
            </div>
            <?php
            $denuncias++;
            if($denuncias == 8){
              break;
            }
        }
        ?>
        
