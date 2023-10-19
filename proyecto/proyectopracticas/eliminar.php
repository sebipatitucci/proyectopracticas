<?php 
session_start();
include("conex.php");

$id = $_GET['borrar'];

if ($_SESSION['perfil'] = 2) {
    $consulta = "UPDATE eventos 
                      SET estado = 0 
                      where estado = 1
                      and idEventos = '$id'";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        ?>
        <script>
            window.location.href = "mis-denuncias.php";
        </script>
        <?php
        // header("location: mis-denuncias.php");
    } else {
        echo "No se pudo borrar";
    }
}

  
