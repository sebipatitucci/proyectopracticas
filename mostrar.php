<?php 
    include("conex.php");

 
    $consulta = "SELECT *FROM eventos ORDER BY idEventos asc ";

    $resultado = mysqli_query($conex, $consulta);
  
    foreach ($resultado as $i){
        echo '<img src="IMAGENES/Earth.png"';
        echo "<br>";
        echo "<br>" .$i['tipo'];
        echo "<br>" .$i['localidad'];
        echo " ".$i['calle'];
        echo "<br>".$i['fecha'];
        echo " ".$i['hora'];
        echo "<br>" .$i['descripcion'];
        echo "<br>";
    }

    $conex->close();

?>