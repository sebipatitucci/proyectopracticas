<?php 
    include("conex.php");
 
    $consulta = "SELECT * FROM eventos e, accidentes a ORDER BY idEventos desc";

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
                    echo "<br>" .$i['descripcion'];
                    echo "<br>" .$i['idPais'];
                    echo "<br>".$i['idProvincia'];
                    echo "<br>".$i['idLocalidad'];
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