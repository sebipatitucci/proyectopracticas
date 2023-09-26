<?php
include("conex.php");

// $consulta = "SELECT E.* FROM USUARIOS U, eventos E WHERE e.idUsuario = u.idUsuario and '$_SESSION[id]' = u.idUsuario";
// $consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha, 
//              DATE_FORMAT(e.hora, '%h:%m') as hora, e.descripcion,e.idEventos,
//              a.descripcion as dAccidente, e.latitud, e.longitud, foto
//              FROM usuarios u, eventos e, accidentes a 
//              WHERE e.idUsuario = u.idUsuario
//              and e.idAccidente = a.idAccidente
//              and '$_SESSION[id]' = u.idUsuario 
//              and estado = 1
//              order by fecha desc";
$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha, 
             DATE_FORMAT(e.hora, '%h:%i') as hora, e.descripcion,e.idEventos,
             a.descripcion as dAccidente, e.latitud, e.longitud, foto, l.Descripcion as lDescripcion, p.descripcion as pDescripcion
             FROM usuarios u, eventos e, accidentes a, localidades l, provincias p
             WHERE e.idUsuario = u.idUsuario
             and e.idAccidente = a.idAccidente
             and l.idLocalidad = e.idLocalidad
             and l.idProvincia = p.idProvincia
             and '$_SESSION[id]' = u.idUsuario 
             and estado = 1
             order by fecha desc";

$resultado = mysqli_query($conex, $consulta);


foreach($resultado as $i) {
?>
    <div class="card" style="margin-top: 20px; border: solid 1px black;">
        <div class="card-body">
            <div id="contenedor-denuncia">
            <img src="<?php echo $i['foto'] ?>" alt="No se puede ver la foto" style="width: 150px; height:150px; border-radius: 100%">  
                
                <div id="texto-denuncia">
                    <?php
                    $descripcion = ucfirst($i['descripcion']);
                    echo "<p><b> Tipo de accidente: </b>" . $i['dAccidente'] . "</p>";
                    echo "<p><b> Fecha: </b>" . $i['fecha'] . "</p>";
                    echo "<p><b> Hora: </b>" . $i['hora'] . "</p>";
                    echo "<p><b> Localidad: </b>" . $i['lDescripcion'] . ", " . $i['pDescripcion'] . "</p>";
                    echo "<p><b> Comentarios: </b>" . $descripcion . "</p>";
                    echo "<br>";
                    ?>
                </div>
            </div>
            <a href="eliminar.php?borrar=<?php echo $i['idEventos']; ?>" class="btn btn-primary" style="margin-left: 5px;">Eliminar</a>
            <a href="modificarDenuncia.php?var=<?php echo $i['idEventos']; ?>" class="btn btn-primary">Modificar</a>
            <a href="mapBase.php?map=<?php echo $i['idEventos']; ?>" class="btn btn-primary" style="float: right;">Ver en el mapa</a>
        </div>
    </div>


<?php


}
$conex->close();

?>