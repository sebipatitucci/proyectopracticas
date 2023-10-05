<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="CSS/mis-denuncias.css">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php 
    include("header.php");
    ?>


    <div class="row">
        
        <div class="col-3" id="left-col"> 
           
           <a href="mis-denuncias.php" class="nav-items"><i class="fa-solid fa-truck-medical"></i> Mis denuncias</a>
           <a href="perfil.php" class="nav-items"><i class="fa-solid fa-user"></i> Mi Perfil</a>                   
           <a href="notificaciones.php" class="nav-items"><i class="fa-solid fa-bell"></i> Notificaciones</a>   
           
        </div>
        <div class="col-9" id="right-col">
            <div class="content-right-col">

                <?php 
               
                  include("conex.php");
                  
                  $consulta = "SELECT u.nombre FROM usuarios U, eventos E where u.nombre = '$_SESSION[name]' and '$_SESSION[id]' = u.idUsuario ";
                  $resultado = mysqli_query($conex, $consulta);
                  $row = mysqli_fetch_array($resultado);
                  if($row){
                    echo "<h4>Bienvenido, $row[nombre]!</h4>";
                  }
                 $conex->close();
                
                ?>

            </div>
            <div class="main-right-col">   
                <h3>Mis últimas denuncias</h3>
                <?php include("mostrarmis-denuncias.php"); ?>
            </div>
            
        </div>
    </div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="./IMAGENES/Logo proyecto.png" alt="">
                </div>
                <div class="col-3">
                    <h2>Alumno 1</h2><br>
                    <i class="fa-regular fa-user"></i>
                    Duette Gonzalo<br>
                    <i class="fa-regular fa-envelope"></i>
                    43851204@itbeltran.com.ar <br>   
                    <i class="fa-solid fa-location-dot"></i>
                    Instituto tecnológico beltran
                </div>
                <div class="col-3">
                    <h2>Alumno 2</h2><br>
                    <i class="fa-regular fa-user"></i>
                    Bossio Maximiliano<br>
                    <i class="fa-regular fa-envelope"></i>
                    24481923@itbeltran.com.ar <br>   
                    <i class="fa-solid fa-location-dot"></i>
                    Instituto tecnológico beltran
                </div>
                <div class="col-3">
                    <h2>Alumno 3</h2><br>
                    <i class="fa-regular fa-user"></i>
                    Patitucci Sebastián<br>
                    <i class="fa-regular fa-envelope"></i>
                    44209384@itbeltran.com.ar <br>   
                    <i class="fa-solid fa-location-dot"></i>
                    Instituto tecnológico beltran
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>