<?php 
    include("conex.php");
 
    $consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha, DATE_FORMAT(e.hora, '%h:%m') as hora, e.descripcion,e.idEventos, 
                 a.descripcion as dAccidente, p.descripcion as pDescripcion,
                 pr.descripcion as prDescripcion, l.descripcion as lDescripcion
                 FROM usuarios u, eventos e, paises p, provincias pr, accidentes a, localidades l
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
                    echo ", " .$i['lDescripcion'];
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