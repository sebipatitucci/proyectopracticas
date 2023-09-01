<?php 
    include("conex.php");
 
    $consulta = "SELECT e.fecha, e.hora, e.descripcion,e.idEventos, a.descripcion as dAccidente, p.descripcion as pDescripcion,
                 pr.descripcion as prDescripcion,  l.descripcion as lDescripcion
                 FROM USUARIOS U, eventos E, paises p, provincias pr, accidentes a, localidades l
                 WHERE e.idUsuario = u.idUsuario
                 and e.idPais = p.idPais 
                 and pr.idProvincia = e.idProvincia
                 and e.idAccidente = a.idAccidente
                 and e.idLocalidad = l.idLocalidad
                 ORDER BY idEventos desc";

    $resultado = mysqli_query($conex, $consulta);
  
    $denuncias = 0;

    foreach ($resultado as $i){
        ?>
        <div id="contenedor-denuncia">
            <div id="texto-denuncia">
                <?php 
                    
                    // echo '<img src="IMAGENES/Earth.png" alt="">' ;  
                    include("maps.php");  
                    echo "<br>";
                    echo "<br>" .$i['dAccidente'];
                    echo "<br>" .$i['pDescripcion'];
                    echo "<br>" .$i['prDescripcion'];
                    echo "<br> ".$i['fecha'];
                    echo "<br> ".$i['hora'];
                    echo "<br>" .$i['descripcion'];
                    echo "<br>";
                    
                ?>
                
              
            </div>
        </div>
     
        <?php
        $denuncias++;
        if($denuncias == 5){
            break;
        }
    }

    $conex->close();

?>