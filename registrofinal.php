<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="http://localhost/proyecto/CSS/new_registro.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="main-container">
        <div class="left-container">
            <img src="./Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
            <h1 class="animate__animated animate__zoomIn">Save a Life</h1>
            <a href="http://localhost/proyecto/loginfinal.php"><input type="button" value="INICIAR SESIÓN"></a>
        </div>
        <div class="right-container">
            <form action="" method="POST">
                <h3>Registrarse</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="nombre">
                    <label for="floatingInput">Nombre y Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="telefono">
                    <label for="floatingInput">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="date">
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="correo">
                    <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese su contraseña" name="contraseña">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <input type="submit" value="REGISTRARSE" id="btn-registro" name="registrarse">
            </form>
            
        </div>
    </div>

    <?php 
            
    include("registroback_final.php");

    ?>
</body>
</html>