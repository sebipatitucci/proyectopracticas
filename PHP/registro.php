<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- <link rel="stylesheet" href="registro.css"> -->
    <link rel="stylesheet" href="http://localhost/proyecto/CSS/registro2.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  />
</head>
<body>
    <div id="main-container">
        <img src="Logo proyecto.png" alt="" id="logo"><br>
        <form action="" method="post">


            <label for="" class="form-label">Nombre y apellido</label><br>
            <input type="text" name="nombre" class="form-input" ><br>
            <label for="" class="form-label">Teléfono</label><br>
            <input type="number" name="telefono" id="" class="form-input" ><br>
            <label for="" class="form-label">Fecha de nacimiento</label><br>
            <input type="date" name="date" id="" class="form-input" ><br>
            <label for="" class="form-label">Email</label><br>
            <input type="email" name="email" id="" class="form-input" ><br>
            <label for="" class="form-label">Contraseña</label><br>
            <input type="password" name="password" id="" class="form-input" ><br>
            <input type="submit" name="registrarse" value="Registrarse" id="btn-register"><br>
            <a href="loginfinal.php" id="cuenta-true">Ya tiene una cuenta?</a>

            <?php 
            
            //include("back_registro.php");
        
            ?> 
        </form>
        <?php 
            
            //include("back_registro.php");
        
        ?>
    </div>

    <?php 
            
            include("back_registro.php");
        
    ?>
   
</body>
</html>