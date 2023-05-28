<?php
    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) ){
        header("location: index.php");
    }
    else{
        //header('location: denuncia.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar denuncia</title>
    <link rel="stylesheet" href="CSS/new_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(IMAGENES/police.jpg)">
    
    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
            
        </div>
        <div class="right-container">
            <form method="POST" action="denuncia.php">
                <h3>DENUNCIAR</h3>
                <div class="form-floating mb-3">
                    <select name="opciones" id="floatingOpciones" class="form-control">
                        <option></option>
                        <option>Opcion 1</option>
                        <option>Opción 2</option>
                        <option>Opción 3</option>
                    </select>
                    <label for="floatingOpciones">Seleccione una opcion</label>     
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingLocalidad" placeholder="localidad" name="localidad" required class="inputs">
                    <label for="floatingLocalidad">Localidad</label>

                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingCalle" placeholder="calle" name="calle" required class="inputs">
                    <label for="floatingCalle">Calle</label>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control" id="floatingFecha" placeholder="fecha" name="fecha" required class="inputs">
                    <label for="floatingFecha">Fecha</label>
                </div>
                <div class="form-floating">
                    <input type="time" class="form-control" id="floatingHora" placeholder="horario" name="hora" required class="inputs">
                    <label for="floatingHora">Horario</label> 
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingDescripcion" placeholder="descripcion" name="descripcionEvento" required class="inputs">
                    <label for="floatingDescripcion">Descripcion del evento</label>
                </div>
                <input type="submit" value="Denunciar" id="btn-denunciar">
            </form>

        </div>
    </div>

    <?php
                include("conex.php");

                if ('POST' == $_SERVER['REQUEST_METHOD']) {
                    if (isset($_POST['opciones']) && isset($_POST['localidad']) && isset($_POST['calle']) &&
                        isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['descripcionEvento']) ){
                            
                        
                        $opciones = $_POST['opciones'];
                        $localidad = $_POST['localidad'];
                        $calle = $_POST['calle'];
                        $date = $_POST['fecha'];
                        $time = $_POST['hora'];
                        $descripcion = $_POST['descripcionEvento'];
                        $idUsuario = $_SESSION['id'];

                        $consulta = "INSERT INTO eventos (tipo, localidad, calle, fecha, hora, descripcion, idUsuario) 
                                    VALUES ('$opciones', '$localidad', '$calle', '$date', '$time', '$descripcion', '$idUsuario')";
                        $resultado = mysqli_query($conex, $consulta);
                        
                        if ($resultado) {
                            echo "<div class='ok animate__animated animate__fadeInLeft'>¡LA DENUNCIA SE HA REALIZADO!</div>";
                        } else {
                            echo "<div class='bad animate__animated animate__fadeInLeft'>¡HUBO UN ERROR!</div>";
                        }

                        $conex->close();
                    }
                }
            ?>

</body>
</html>