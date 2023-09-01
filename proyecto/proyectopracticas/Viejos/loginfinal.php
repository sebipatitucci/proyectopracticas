<?php
    session_start(); 
    if(isset($_SESSION['id']) && isset($_SESSION['name']) ){
        header("location: index.php");
    }
    else{
        //header('location: loginfinal.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="CSS/new_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(IMAGENES/Caution.jpg); background-blend-mode:soft-light; background-color: #222222"> 
    
    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
        </div>
        <div class="right-container">
            <form action="loginback.php" method="POST">
                <h3>Iniciar Sesión</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Ingrese su correo electrónico" name="correo" required class="inputs">
                    <label for="floatingInput">Correo electrónico</label>
                    
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Ingrese su contraseña" name="contraseña" required class="inputs">
                    <label for="floatingPassword">Contraseña</label>
                    
                </div>
                <input type="submit" value="INGRESAR" id="btn-login">
            </form>
            
        </div>
    </div>
</body>
</html>