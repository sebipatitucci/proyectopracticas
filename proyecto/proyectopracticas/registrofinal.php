<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    header("location: index.php");
    if ($_SESSION['perfil'] == 1) {
        header("location: indexAdmin.php");
    }
} else {
    //header('location: loginfinal.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="CSS/new_registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body style="background-color: rgb(243, 222, 208);">
    <?php

    include("header.php");
    ?>

    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">

        </div>
        <div class="right-container">
            <form action="registrofinal.php" method="POST" enctype="multipart/form-data">
                <h3>REGISTRO DE USUARIO</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese su nombre" name="nombre" required>
                    <label for="floatingInput">Nombre y Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="correo" required>
                    <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese su contraseña" name="contraseña" required>
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="XX-XXXX-XXXX" placeholder="XX-XXXX-XXXX" name="telefono" required>
                    <label for="floatingInput">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="date" required>
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" placeholder="Foto de perfil" name="foto" required>
                    <label for="floatingInput">Foto de perfil</label>
                </div>
                <input type="submit" value="REGISTRARSE" id="btn-registro" name="registrarse">
                <a href="loginfinal.php" id="linkLogin">Ya tiene una cuenta? Inicie sesión</a>
            </form>

        </div>
    </div>

    <?php
    include("conex.php");
    // session_start();
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        if (
            isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) &&
            isset($_POST['telefono']) && isset($_POST['date'])
        ) {


            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $contrasenia = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $date = $_POST['date'];
            $foto = $_FILES['foto'];

            $tmp_name = $foto['tmp_name'];
            $directorio_destino = "IMAGENES";
            $img_file = $foto['name'];
            $img_type = $foto['type'];

            $validarPass = mysqli_query($conex, "SELECT contrasenia FROM usuarios WHERE contrasenia = '$contrasenia' ");
            if (mysqli_num_rows($validarPass) > 0) {
                echo"<script>
                        Swal.fire('¡ERROR!','La contraseña ingresada ya existe','error');
                    </script>";
                exit();
            }
            
            $validarCorreo = mysqli_query($conex, "SELECT email FROM usuarios WHERE email = '$email' ");
            if (mysqli_num_rows($validarCorreo) > 0) {
                echo"<script>
                        Swal.fire('¡ERROR!','El email ingresado ya existe','error');
                    </script>";
                exit();
            }

            if (strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg") || strpos($img_type, "png")) {
                $destino = $directorio_destino . '/' . $img_file;
                $consulta = "INSERT INTO usuarios (nombre, email, contrasenia, telefono, fecha_nac, idPerfil, foto) 
                VALUES ('$nombre', '$email', '$contrasenia', '$telefono', '$date', '2', '$destino')";
                $resultado = mysqli_query($conex, $consulta);

                if(move_uploaded_file($tmp_name, $destino)){
                    if ($resultado) {
                           echo"<script>
                                Swal.fire('¡Bien hecho!','Fuiste registrado correctamente','success');
                            </script>";
                    } else {
                        echo"<script>
                        Swal.fire('¡Bien hecho!','Fuiste registrado correctamente','success');
                    </script>";
                    }
                }
                
            }


            $conex->close();
        } else {
            echo"<script>
            Swal.fire('¡ERROR!','Algo salio mal','error');
        </script>";
        }
    }

    // session_start();
    if (!isset($_SESSION['id']) && !isset($_SESSION['name'])) {
        //header('location: registrofinal.php');
    } else {
        header("location: index.php");
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>