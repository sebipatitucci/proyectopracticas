<?php
    include("conex.php");

    $id = $_GET['borrar'];
    $consulta = "UPDATE usuarios 
         SET uEstado = 0 
         where uEstado = 1 
         and idUsuario = '$id'";
    $resultado = mysqli_query($conex, $consulta);
    if($resultado){
        header("location: usuarios.php");
    }else{
        echo "No se pudo borrar";

    }

?>