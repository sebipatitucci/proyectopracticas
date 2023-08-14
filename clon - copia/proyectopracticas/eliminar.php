<?php 
include("conex.php");

$id = $_GET['borrar'];

$consulta = "DELETE FROM eventos where idEventos = '$id'";

$resultado = mysqli_query($conex, $consulta);
        
if($resultado){
    header("location: mis-denuncias.php");
}else{
    echo "No se pudo borrar";
}


?>