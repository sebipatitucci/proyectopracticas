<?php 

$email = $_POST['correo'];
$contrasenia = $_POST['contraseña'];

include("conex.php");

$query = "SELECT * FROM usuarios where email = '$email' and contrasenia = '$contrasenia' ";
$result = mysqli_query($conex, $query);

$filas = mysqli_fetch_array($result);

if($filas){
    session_start();
    $_SESSION['id'] = $filas['idUsuario'];
    $_SESSION['name'] = $filas['nombre'];
    $_SESSION['perfil'] = $filas['idPerfil'];  
    
    if($_SESSION['perfil'] == 2){
        header("location:index.php");
    }else{
        header("location: indexAdmin.php");
    }

}else{
    include("loginfinal.php");
    
    echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
    
}

mysqli_free_result($result);
mysqli_close($conex);

?>