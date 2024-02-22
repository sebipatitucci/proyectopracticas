<?php

include("conex.php");

$id = $_GET['aBorrar'];

if ($_SESSION['perfil'] = 1) {
    $consulta = "UPDATE eventos 
                         SET estado = 0 
                         where estado = 1
                         and idEventos = '$id'";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        ?>
        <script>
            location = "dncAdministrador.php";

        </script>
        <?php
    } else {
        echo "No se pudo borrar";
    }

    
        if ($_GET['activar']) {
            $id = $_GET['activar'];
    
            $consulta = "UPDATE eventos 
            SET estado = 1 
            where estado = 0
            and idEventos = '$id'";
            $resultado = mysqli_query($conex, $consulta);
    
            if($resultado){
                header("location: dncAdministrador.php");
            }else{
                echo "No se pudo activar";
            }
        }
} 
/* $consulta = "DELETE FROM eventos where idEventos = '$id'";
$consulta = "UPDATE eventos 
             SET estado = 0 
             where estado = 1
             and idEventos = '$id'";
$resultado = mysqli_query($conex, $consulta);
        
if($resultado){
    header("location: mis-denuncias.php");
}else{
    echo "No se pudo borrar";
}*/
