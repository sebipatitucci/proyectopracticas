<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="./CSS/notificaciones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <img src="IMAGENES/Logo proyecto.png" alt="Logo de Save a Life" id="nav-img">
    <div class="container-lista">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" id="color1" aria-current="page" href="index.php#main-container">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="color2" href="index.php#about-us">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="color3" href="denuncia.php">Denunciar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="color4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perfil
          </a>
          <ul class="dropdown-menu" style="border: solid 3px black">
            <li><a class="dropdown-item " href="mis-denuncias.php">Configuración</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="#">Cerrar sesión</a></li>
          </ul>
        </li>
        
      </ul>
      </div> 
    </div>
  </div>
</nav>

    <div class="row">
        
        <div class="col-3" id="left-col"> 
          
           <a href="mis-denuncias.php" class="nav-items">Mis denuncias</a>
           <a href="perfil.php" class="nav-items">Mi Perfil</a>                   
           <a href="notificaciones.php" class="nav-items">Notificaciones</a>  
        </div>
        <div class="col-9" id="right-col">
            
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
</body>
</html>