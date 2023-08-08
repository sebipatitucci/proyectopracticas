<?php 
include("conex.php");
$id = $_GET['idEventos'];

$consulta = "DELETE FROM eventos where idEventos = '$id'";;

$resultado = mysqli_query($conex, $consulta);
        
if($resultado){
    header("location: mostrarmis-denuncias.php");
}else{
    
}
    

?>