<?php 
    include("conex.php");

 
    $consulta = "SELECT *FROM eventos ORDER BY idEventos desc ";

    $resultado = mysqli_query($conex, $consulta);
  
    $denuncias = 0;

    foreach ($resultado as $i){
        ?>
        <div id="contenedor-denuncia">
            <div id="texto-denuncia">
                <?php 
                    echo '<img src="IMAGENES/Earth.png" alt="">' ;   
                    echo "<br>";
                    echo "<br>" .$i['tipo'];
                    echo "<br>" .$i['localidad'];
                    echo "<br>".$i['calle'];
                    echo "<br>".$i['fecha'];
                    echo " ".$i['hora'];
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