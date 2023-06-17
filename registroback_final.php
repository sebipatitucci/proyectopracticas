<?php
    include("conex.php");
    //session_start();
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) &&
            isset($_POST['telefono']) && isset($_POST['date']) ){
                
            
            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $contrasenia = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $date = $_POST['date'];
    
            $consulta = "INSERT INTO usuarios (nombre, email, contrasenia, telefono, fecha_nac) 
                         VALUES ('$nombre', '$email', '$contrasenia', '$telefono', '$date')";
            $resultado = mysqli_query($conex, $consulta);     

            if ($resultado) {
                echo "<div class='ok animate__animated animate__fadeInLeft'>¡HAZ SIDO REGISTRADO!</div>";
            } else {
                echo "<div class='bad animate__animated animate__fadeInLeft'>¡HUBO UN ERROR!</div>";
            }
            $conex->close();
        }else{
            echo "<div class='bad animate__animated animate__fadeInLeft'>¡HUBO UN ERROR!</div>";
        }
    }

    // session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) ){
        //header('location: registrofinal.php');
    }
    else{
        header("location: index.php");
    }
?>