<?php
include("conex.php");


// $consulta = "SELECT E.* FROM USUARIOS U, eventos E WHERE e.idUsuario = u.idUsuario and '$_SESSION[id]' = u.idUsuario";
$consulta = "SELECT E.*, a.descripcion as dAccidente, p.descripcion as pDescripcion,
             pr.descripcion as prDescripcion, l.descripcion as lDescripcion, u.idUsuario as idUsuario
             FROM USUARIOS U, eventos E, localidades l, paises p, provincias pr, accidentes a 
             WHERE e.idUsuario = u.idUsuario
             and e.idPais = p.idPais 
             and pr.idProvincia = e.idProvincia
             and e.idAccidente = a.idAccidente
             and e.idLocalidad = l.idLocalidad
             and '$_SESSION[id]' = u.idUsuario";


$resultado = mysqli_query($conex, $consulta);

foreach ($resultado as $i) {
?>
    <div class="card" style="margin-top: 20px; border: solid 1px black;">
        <div class="card-body">
            <div id="contenedor-denuncia">
                <img src="IMAGENES/Call.png" alt="">
                <div id="texto-denuncia">
                    <?php

                    echo "<p><b> Tipo de accidente: </b>" . $i['dAccidente'] . "</p>";
                    echo "<p><b> Pais: </b>" . $i['pDescripcion'] . "</p>";
                    echo "<p><b> Provincia: </b>" . $i['prDescripcion'] . "</p>";
                    echo "<p><b> Localidad: </b>" . $i['lDescripcion'] . "</p>";
                    echo "<p><b> Fecha: </b>" . $i['fecha'] . "</p>";
                    echo "<p><b> Hora: </b>" . $i['hora'] . "</p>";
                    echo "<p><b> Comentarios: </b>" . $i['descripcion'] . "</p>";
                    echo "<br>";
                    ?>
                </div>
            </div>
            
            <a href="eliminar.php?idUsuario=<?php echo $i['idUsuario']?>" class="btn btn-primary">Eliminar</a>
            <a href="#" class="btn btn-primary">Modificar</a>
            <a href="http://maps.google.com/?q=<?php echo $i['prDescripcion']; ?>,+<?php echo $i['lDescripcion']; ?>" class="btn btn-primary" style="float: right;">Ver en el mapa</a>
            
        </div>
    </div>


<?php


}
$conex->close();

?>