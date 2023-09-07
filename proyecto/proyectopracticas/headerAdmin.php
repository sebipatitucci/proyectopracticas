<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./CSS/headerAdmin.css">
</head>
<body>
<nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="indexAdmin.php#main-container">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="indexAdmin.php#about-us">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="denuncia.php" id="btnDenuncia">Denuncia</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="color4" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-user"></i>
                </a>
                <ul class="dropdown-menu" style="border: solid 3px black;">
                    <li><a class="dropdown-item " href="dncAdministrador.php" id="configuracion">Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item " href="logout.php" id="btnSesion">Cerrar sesión</a></li>
                </ul>
            </li>
          </ul>
          <?php 
          include("conex.php");
          $consulta = "SELECT * FROM usuarios u, perfiles p where u.nombre = '$_SESSION[name]' and '$_SESSION[id]' = u.idUsuario and u.idPerfil = p.idPerfil";
          $resultado = mysqli_query($conex, $consulta);
          foreach($resultado as $i){
            $user = ucfirst($i['descripcion']);
            echo "<p style='position: absolute; right: 160px; top: 8px; font-weight: bold'>$user<p>";
          }
          ?>
    </nav>
  