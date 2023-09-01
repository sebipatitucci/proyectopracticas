<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="CSS/new_registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(IMAGENES/person.jpg); background-blend-mode:soft-light; background-color: #222222">

    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
            <a href="loginfinal.php"><input type="button" value="INICIAR SESIÓN"></a>
        </div>
        <div class="right-container">
            <form action="registrofinal.php" method="POST">
                <h3>Registrarse</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese su nombre" name="nombre" required >
                    <label for="floatingInput">Nombre y Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="correo" required >
                    <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese su contraseña" name="contraseña" required >
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="XX-XXXX-XXXX" placeholder="XX-XXXX-XXXX" name="telefono" required>
                    <label for="floatingInput">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="date" required >
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>
                <input type="submit" value="REGISTRARSE" id="btn-registro" name="registrarse">
            </form>
            
        </div>
    </div>

    <?php
    include("conex.php");
    session_start();
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) &&
            isset($_POST['telefono']) && isset($_POST['date']) ){
                
            
            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $contrasenia = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $date = $_POST['date'];
    
            $consulta = "INSERT INTO usuarios (nombre, email, contrasenia, telefono, fecha_nac, idPerfil) 
                         VALUES ('$nombre', '$email', '$contrasenia', '$telefono', '$date', '2')";
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

</body>
</html>