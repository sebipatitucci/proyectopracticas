<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save a Life</title>
    <link rel="stylesheet" href="CSS/proyecto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php
    session_start();
    include("header.php");
    ?>
   

    <main>
        <div class="container">
            <div id="main-container">
                <h1>Save a Life</h1>
                <p>Choques de autos?</p>
                <p>Personas lastimadas?</p>
                <p>Incendios?</p>
                <p>Cualquiera sea la emergencia, no dudes en realizar la denuncia.</p>
                <a><input type="submit" value="Registrarme" id="reg"></a>
                <a><input type="button" value="Iniciar sesión" id="ini"></a>
            </div>
            <div id="main-image-container">
                <img src="IMAGENES/cars.jpg" alt="" id="img-main">
            </div>
        </div>
    </main>

    <?php
    if (!isset($_SESSION['id']) && !isset($_SESSION['name'])) {
        echo "<script type='text/javascript'>
        var idDenuncia = document.getElementById('btnDenuncia');
        var btnConfig = document.getElementById('configuracion');
        var btnSesion = document.getElementById('btnSesion');
        var btnRegistro = document.getElementById('reg');
        var btnInicio = document.getElementById('ini');

        btnInicio.onclick = function(){
            window.location.href = 'loginfinal.php';
        }

        btnRegistro.onclick = function(){
            window.location.href = 'registrofinal.php';
        }

        idDenuncia.onclick = function(){
            
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe iniciar sesión para poder denunciar!',
                
              })
              
        }
        btnConfig.onclick = function(){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe iniciar sesión para acceder a las configuraciones!',
                
              })
        }
        btnSesion.onclick = function(){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No ha iniciado sesión!',
                
              })
            
        }

        </script>";
} else {
echo "<script type='text/javascript'>
        var btnRegistro = document.getElementById('reg');
        var btnInicio = document.getElementById('ini');
        var idDenuncia = document.getElementById('btnDenuncia');
        var btnConfig = document.getElementById('configuracion');
        var btnSesion = document.getElementById('btnSesion');

        btnInicio.onclick = function(){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya tiene una sesión iniciada!',
                
              })
        }
        btnRegistro.onclick = function(){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe cerrar sesión para poder registrar otro usuario!',
                
              });
        }
        idDenuncia.onclick = function(){
            window.location.href = 'denuncia.php';
        }
        btnConfig.onclick = function(){
            window.location.href = 'mis-denuncias.php';
        }
        btnSesion.onclick = function(){
           
            location.href = 'logout.php';
        }


                </script>";
    }
    ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="IMAGENES/Call.png" alt="">
                    <h3>Empiece por su cuenta</h3>
                    <p>Aconsejamos que cree su cuenta antes del evento de emergencia.</p>
                </div>
                <div class="col-6">
                    <img src="IMAGENES/Datos.png" alt="">
                    <h3>Fácil de usar</h3>
                    <p>Solo ingrese los datos de la emergencia y la denuncia estará hecha.</p>
                </div>
            </div>
        </div>

        <div class="container" id="about-us">
            <div class="row">
                <div class="col-7">
                    <img src="IMAGENES/email.png" alt="">

                </div>
                <div class="col-5">
                    <h2>Aplicación de emergencias</h2>
                    <p>La aplicación fue creada con el propósito de facilitar las denuncias de accidentes o emergencias, a la vez que sea mas rápida y efectiva.</p>
                </div>
            </div>
        </div>


        <h2 class="latest-news">Localidades donde mas denuncias se realizaron</h2>
        <?php include_once("maps.php"); ?>
        <div class="container">
            <div class="row">
                <h2 class="latest-news">Últimas denuncias</h2>
        <?php 
        include("cardIndex.php");
        ?>
                
            </div>
        </div>
        <h2 class="latest-news">Estadísticas</h2>

        <div class="container">
        <?php 
        include_once("graficoLinea.php"); 
        
        ?>      
        </div>
        <h6 class="latest-news">Cantidad de denuncias por país</h6><br>
        <div class="container">
        <?php 
        include_once("graficoLinea.php"); 
        include_once("graficoGeografico.php");
        ?>      
        </div>
      

    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="IMAGENES/Logo proyecto.png" alt="">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkgT0RFUq4nueCZBxig7rpOjoQoPM1XY&callback=initMap"></script>
</body>

</html>