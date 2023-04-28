<?php 

session_start();

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];


$_SESSION['email'] = $correo;

include("conex.php");

$query = "SELECT * FROM users where email = '$correo' and contraseña = '$contraseña' ";
$result = mysqli_query($conex, $query);

$filas = mysqli_num_rows($result);

if($filas){
    header("location:proyecto.html");
}else{
    ?>
    <?php
    include("loginfinal.php");
    
    echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
    
}

mysqli_free_result($result);
mysqli_close($conex);

?>