<?php 
session_start();
include("conex.php");

$id = $_GET['borrar'];

if($_SESSION['perfil'] = 1){
    $consulta = "UPDATE eventos 
             SET estado = 0 
             where estado = 1
             and idEventos = '$id'";
    $resultado = mysqli_query($conex, $consulta);

    if($resultado){
        header("location: dncAdministrador.php");
    }else{
        echo "No se pudo borrar";
    }

}else{
    $consulta = "UPDATE eventos 
             SET estado = 0 
             where estado = 1
             and idEventos = '$id'";
    $resultado = mysqli_query($conex, $consulta);
            
    if($resultado){
        header("location: mis-denuncias.php");
    }else{
        echo "No se pudo borrar";
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
    

?>