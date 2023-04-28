<?php 

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

session_start();
$_SESSION['email'] = $correo;

include("con_db.php");

$query = "SELECT * FROM users where email = '$correo' and contraseña = '$contraseña' ";
$result = mysqli_query($conex, $query);

$filas = mysqli_num_rows($result);

if($filas){
    header("location:proyecto.html");
}else{
    ?>
    <?php
    include("login.php");
    
    echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
    
}

mysqli_free_result($result);
mysqli_close($conex);

?>