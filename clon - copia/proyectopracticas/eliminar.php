<?php 
include("conex.php");

session_start();

$consulta = "DELETE FROM eventos e, usuarios u
             where e.idUsuario = u.idUsuario 
             and e.idUsuario = '$_SESSION[id]'";

$resultado = mysqli_query($conex, $consulta);
        
if($resultado){
    header("location: mostrarmis-denuncias.php");
}else{
    
}
    

?>