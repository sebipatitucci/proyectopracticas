<?php

include("conex.php");

if (isset($_POST['registrarse'])) {
    if (
        strlen($_POST['nombre'] >= 1) &&
        strlen($_POST['telefono'] >= 1) &&
        strlen($_POST['date'] >= 1) &&
        strlen($_POST['correo'] >= 1) &&
        strlen($_POST['contraseña'] >= 1)
    ) {

        $name = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $date = date("d/m/y");
        $email = $_POST['correo'];
        $password = $_POST['contraseña'];
        $consulta = "INSERT INTO `users`(`nombre`, `telefono`, `fecha_nac`, `email`, `contraseña`) 
                             VALUES ('$name', '$telefono', '$date', '$email', '$password')";

        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            
            echo "<div class='ok animate__animated animate__fadeInLeft'>Te has registrado correctamente!</div>";
            
        } else {
            echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
        }
    }else {
        echo "<div class='bad animate__animated animate__fadeInLeft'>Error en la autentificación</div>";
    }
}


?>