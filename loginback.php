<?php 

session_start();

$correo = $_POST['correo'];
$contrasenia = $_POST['contraseña'];


$_SESSION['email'] = $correo;

include("conex.php");

$query = "SELECT * FROM usuarios where email = '$correo' and contrasenia = '$contrasenia' ";
$result = mysqli_query($conex, $query);

$filas = mysqli_num_rows($result);

if($filas){
    header("location:index.php");
}else{
    include("loginfinal.php");
    
    echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
    
}

mysqli_free_result($result);
mysqli_close($conex);

?>