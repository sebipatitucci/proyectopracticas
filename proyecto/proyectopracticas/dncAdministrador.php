<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Administrador</title>
    <link rel="stylesheet" href="CSS/mis-denuncias copy.css">
    <link rel="stylesheet" href="CSS/search.css">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="IMAGENES/emergencia-logo.png" type="image/x-icon">
</head>

<body>
    <?php

    include("headerAdmin.php");
    include("buscador.php");

    if ($_SESSION['perfil'] == 1) {
    } else {
        header("location: index.php");
    }

    ?>


    <div class="row">

        <div class="col-3" id="left-col">

            <a href="dncAdministrador.php" class="nav-items"><i class="fa-solid fa-file-lines"></i></i> Denuncias</a>
            <a href="usuarios.php" class="nav-items"><i class="fa-solid fa-user"></i> Usuarios</a>


        </div>
        <div class="col-9" id="right-col">

            <div class="main-right-col">
                <h3>Denuncias de los usuarios</h3>

                <div class="container">
                    <input type="text" name="text" class="input input light-table-filter" placeholder="Buscar denuncia" data-table="table_id">
                    <div class="btn">
                        <i class="icono fa fa-search"></i>
                    </div>
                </div>


                <?php include("mostrar-adm.php"); ?>
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