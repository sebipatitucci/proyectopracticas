<?php 
    include('conex.php');
    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['name']) ){
        header("location: index.php");
    }
    else{
        //header('location: registrofinal.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar datos</title>
    <link rel="stylesheet" href="CSS/new_registro.css">
    <script language="javascript" src="../js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body style="background-image: url(IMAGENES/person.jpg); background-blend-mode:soft-light; background-color: #222222">

    <?php 
    
        if(isset($_GET['id']) ){
            $id = $_GET['id'];
            $sql = "SELECT *FROM usuarios WHERE idUsuario = '$id'";
            $bd = mysqli_query($conex, $sql);
            $fila = mysqli_fetch_assoc($bd);
            
        }
        
        
    ?>


    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
        </div>
        <div class="right-container">
            <form action="modificarUsuario.php" method="POST">
                <h3>Modificar</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" required value="<?php echo $fila['nombre'];?>">
                    <label for="floatingInput">Nombre y Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico" name="correo" required value="<?php echo $fila['email'];?>">
                    <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña" required value="<?php echo $fila['contrasenia'];?>">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="XX-XXXX-XXXX" placeholder="XX-XXXX-XXXX" name="telefono" required value="<?php echo $fila['telefono'];?>">
                    <label for="floatingInput">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fechanac" placeholder="Ingrese su correo electrónico" name="date" required value="<?php echo $fila['fecha_nac'];?>">
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="idUsuario">
                <input type="submit" value="MODIFICAR" id="btn-registro" name="modificar">
            </form>
            
        </div>
    </div>

    <?php
    include("conex.php");
    
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) &&
            isset($_POST['telefono']) && isset($_POST['date']) && isset($_POST['idUsuario'])
            
            ){
                
            $id2 = $_POST['idUsuario'];
            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $contrasenia = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $date = $_POST['date'];
    
            $consulta = "UPDATE usuarios 
            SET nombre = '$nombre', email = '$email', contrasenia = '$contrasenia', telefono = '$telefono', fecha_nac = '$date'
            where idUsuario = '$id2'";

            $resultado = mysqli_query($conex, $consulta);     

            if ($resultado) {
                echo"<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bien hecho!',
                    text: 'Tus datos fueron modificados',
                    showConfirmButton: false,
                    footer: '<a href=perfil.php>Volver al perfil</a>'
                  });
                    </script>";  
                    
                    echo "<script>
            
            var nombre = document.getElementById('nombre');
            var email = document.getElementById('email');
            var con = document.getElementById('contraseña');
            var telefono = document.getElementById('telefono');
            var fechanac = document.getElementById('fechanac');
            
            
            nombre.value = '';
            email.value = '';
            con.value = '';
            telefono.value = '';
            fechanac.value = '';
            
            </script>";
            } else {
                echo "<div class='bad animate__animated animate__fadeInLeft'>¡HUBO UN ERROR!</div>";
                
            }
            $conex->close();
        }else{
            echo "<div class='bad animate__animated animate__fadeInLeft'>¡HUBO UN ERROR!</div>";
        }
    }
    


?>
</body>
</html>