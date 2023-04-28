<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="http://localhost/proyecto/CSS/login2.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <!-- <link rel="stylesheet" href="login.css"> -->
    <!-- <link rel="stylesheet" href="/CSS/login2.css"> -->
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body>

    <div id="main-container">
        <img src="Logo proyecto.png" alt="" id="logo">
        <h2 id="title-main">Iniciar sesión</h2>
        <form action="back_login.php" method="post">
            <label for="" class="form-label">Email </label></i><br>
            <input type="text" name="correo" placeholder="Ingrese su email" class="form-input" required ><br>
            <label for="" class="form-label" >Contraseña </label><br>
            <input type="password" name="contraseña" placeholder="Ingrese su contraseña" class="form-input" required><br>
            <input type="submit" value="Iniciar" id="btn-iniciar"><br>
            <a href="contraseña.html" id="forget-password">Olvidó su contraseña?</a>
            <a href="registro.php" id="register">Registrarse</a><br><br><br>
        </form>
    </div>
    
</body>
</html>