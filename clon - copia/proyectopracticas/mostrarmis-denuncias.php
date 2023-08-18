<?php
include("conex.php");

// $consulta = "SELECT E.* FROM USUARIOS U, eventos E WHERE e.idUsuario = u.idUsuario and '$_SESSION[id]' = u.idUsuario";
$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha, 
             DATE_FORMAT(e.hora, '%h:%m') as hora, e.descripcion,e.idEventos,
             a.descripcion as dAccidente, e.latitud, e.longitud
             FROM usuarios u, eventos e, accidentes a 
             WHERE e.idUsuario = u.idUsuario
             and e.idAccidente = a.idAccidente
             and '$_SESSION[id]' = u.idUsuario 
             and estado = 1";

$resultado = mysqli_query($conex, $consulta);


foreach($resultado as $i) {
?>
    <div class="card" style="margin-top: 20px; border: solid 1px black;">
        <div class="card-body">
            <div id="contenedor-denuncia">
                 <img src="IMAGENES/Call.png" alt="" style="width: 150px; height:150px;"> 
                
                <div id="texto-denuncia">
                    <?php
                     
                    echo "<p><b> Tipo de accidente: </b>" . $i['dAccidente'] . "</p>";
                    echo "<p><b> Fecha: </b>" . $i['fecha'] . "</p>";
                    echo "<p><b> Hora: </b>" . $i['hora'] . "</p>";
                    echo "<p><b> Comentarios: </b>" . $i['descripcion'] . "</p>";
                    echo "<br>";
                    ?>
                </div>
            </div>
            <a href="eliminar.php?borrar=<?php echo $i['idEventos']; ?>" class="btn btn-primary">Eliminar</a>
            <a href="#" class="btn btn-primary">Modificar</a>
            <a href="http://maps.google.com/?q=<?php echo $i['latitud']; ?>,+<?php echo $i['longitud']; ?>" class="btn btn-primary" style="float: right;">Ver en el mapa</a>
        </div>
    </div>


<?php


}
$conex->close();

?>