<?php
include("conex.php");

$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                 DATE_FORMAT(e.hora, '%h:%i') as hora,
                 e.descripcion,e.idEventos, 
                 a.descripcion as dAccidente,
                 e.latitud, e.longitud
                 FROM usuarios u, eventos e, accidentes a
                 WHERE e.idUsuario = u.idUsuario
                 and e.idAccidente = a.idAccidente 
                 and estado = 1
                 ORDER BY idEventos desc";

$resultado = mysqli_query($conex, $consulta);

$denuncias = 0;




/*foreach ($resultado as $i) {
?>
    <div id="contenedor-denuncia">
        <div id="texto-denuncia">

      <?php
            
            echo "<br>";
            echo "<br> <b>Accidente: </b>" . $i['dAccidente'];
            echo "<br> <b>Fecha: </b>" . $i['fecha'];
            echo "<br> <b>Hora: </b>" . $i['hora'];
            echo "<br> <b>Descripción: </b>" . $i['descripcion'];
            echo "<br>";

            ?>


        </div>
    </div>

<?php
    $denuncias++;
    if ($denuncias == 3) {
        break;
    }
}
*/
$conex->close();

?>