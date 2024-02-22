<?php
    include("conex.php");

    if ($_GET['borrar']) {
        $id = $_GET['borrar'];
        $consulta = "UPDATE usuarios 
             SET uEstado = 0 
             where uEstado = 1
             and idUsuario = '$id'";
        $resultado = mysqli_query($conex, $consulta);
        if($resultado){
            ?>
            <script> location.replace("usuarios.php"); </script>
            <?php
            //header("location: usuarios.php");
        }else{
            echo "No se pudo borrar";

        }
    }

    if ($_GET['activar']) {
        $id = $_GET['activar'];
        $consulta = "UPDATE usuarios 
             SET uEstado = 1 
             where uEstado = 0
             and idUsuario = '$id'";
        $resultado = mysqli_query($conex, $consulta);
        if($resultado){
            ?>
            <script> location.replace("usuarios.php"); </script>
            <?php
            //header("location: usuarios.php");
        }else{
            echo "No se pudo activar";
    
        }
    }

?>