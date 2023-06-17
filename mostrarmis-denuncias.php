<?php
include("conex.php");


$consulta = "SELECT E.* FROM USUARIOS U, eventos E WHERE e.idUsuario = u.idUsuario and '$_SESSION[id]' = u.idUsuario";


$resultado = mysqli_query($conex, $consulta);

foreach ($resultado as $i) {
?>
    <div class="card" style="margin-top: 20px; border: solid 1px black;">
        <div class="card-body">
            <div id="contenedor-denuncia">
                <img src="IMAGENES/Earth.png" alt="">
                <div id="texto-denuncia">
                    <?php

                    echo "<p>" . $i['tipo'] . "</p>";
                    echo "<p>" . $i['localidad'] . "</p>";
                    echo "<p>" . $i['calle'] . "</p>";
                    echo "<p>" . $i['fecha'] . "</p>";
                    echo "<p>" . $i['hora'] . "</p>";
                    echo "<p>" . $i['descripcion'] . "</p>";
                    echo "<br>";
                    ?>
                </div>
            </div>
            <a href="#" class="btn btn-primary">Eliminar</a>
            <a href="#" class="btn btn-primary">Modificar</a>
            <a href="http://maps.google.com/?q=<?php echo $i['calle']; ?>,+<?php echo $i['localidad']; ?>" class="btn btn-primary" style="float: right;">Ver en el mapa</a>
        </div>
    </div>


<?php


}
$conex->close();

?>