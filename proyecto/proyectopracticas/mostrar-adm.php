<?php
include("conex.php");

$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%i') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre, uEstado
                    FROM eventos e, usuarios u, accidentes a
                    WHERE e.estado = 1
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    order by fecha desc";
$resultado = mysqli_query($conex, $consulta);


?>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nº</th>
            <th scope="col">Tipo de accidente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Usuario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
            foreach($resultado as $i){
            $descripcion = ucfirst($i['descripcion']);
            echo "<th scope='row'>$i[idEventos]</th>
            <td>$i[dAccidente]</td>
            <td>$i[fecha]</td>
            <td>$i[hora]</td>
            <td>$descripcion</td>
            <td>$i[nombre]</td>
            <td><a href='aEliminar.php?aBorrar=$i[idEventos] ' <i class='fa-solid fa-trash' style='color: #ff2b05;'></i></a></td> 
            </tr>";
            
        }
        ?>
        </tbody>
    </table>
<?php



$conex->close();

?>