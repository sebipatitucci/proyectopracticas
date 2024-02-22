<?php
// Aquí deberías conectar a tu base de datos y obtener los datos de la tarjeta según el ID proporcionado
include("conex.php");
// Ejemplo simulado de datos
$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%i') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre, uEstado, foto, l.descripcion as lDescripcion
                    FROM eventos e, usuarios u, accidentes a, localidades l
                    WHERE e.estado = 1
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    and e.idLocalidad = l.idLocalidad
                    ORDER BY fecha desc";

$resultado = mysqli_query($conex, $consulta);

foreach ($resultado as $i) {
    $descripcion = ucfirst($i['descripcion']);
    echo"<h5>$descripcion</h5>";
}


?>
