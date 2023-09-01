<?php
require ('conex.php');
	
$query = "SELECT idPais, descripcion FROM paises ORDER BY descripcion";
$resultado=$conex->query($query);
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['name'])) {
    header("location: index.php");
} else {

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
    <script language="javascript" src="../js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="CSS/denuncia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb576a252a.js" crossorigin="anonymous"></script>

    <script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						idPais = $(this).val();
						$.post("includes/getProvincias.php", { idPais: idPais }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						idProvincia = $(this).val();
						$.post("includes/getLocalidades.php", { idProvincia: idProvincia }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>

</head>

<body style="background-image: url(IMAGENES/police.jpg); background-blend-mode:soft-light; background-color: #222222">

    <div class="main-container">
        <div class="left-container">
            <img src="IMAGENES/Logo proyecto.png" alt="" class="animate__animated animate__zoomIn">
            <a href="index.php"><input type="button" value="Volver" id="btnVolver"></a>
        </div>
        <div class="right-container">
            <form id="combo" name="combo" method="POST" action="denuncia.php">
                <h3>DENUNCIAR</h3>
                <div class="form-floating ">
                    <select name="opciones" id="floatingOpciones" class="form-control">
                    <option value="0">Seleccionar Accidente</option>
				<?php 
                $query2 = "select * from accidentes";
                $resultado2 = $conex->query($query2);
                
                while($row = $resultado2->fetch_assoc()) { ?>
					<option value="<?php echo $row['idAccidente']; ?>"><?php echo $row['descripcion']; ?></option>
				<?php } ?>
                    </select>
                    <label for="floatingOpciones">Tipo de accidente</label>
                </div>

                <div class="form-floating"> 
                <select name="cbx_estado" id="cbx_estado" class="form-control">
				<option value="0">Seleccionar Pais</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['idPais']; ?>"><?php echo $row['descripcion']; ?></option>
				<?php } ?>
			</select>
                    <label for="floatingCalle">Pais</label>
                 </div>

                <div class="form-floating"> 
                <select name="cbx_municipio" id="cbx_municipio" class="form-control"></select>
                    <label for="floatingCalle">Provincia/Estado</label> 
                 </div> 

                <div class="form-floating"> 
                    
                <select name="cbx_localidad" id="cbx_localidad" class="form-control"></select>
                     <label for="floatingLocalidad">Localidad</label> 


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
    // include("conex.php");

    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        if (
            isset($_POST['opciones']) && isset($_POST['cbx_estado']) && isset($_POST['cbx_municipio']) &&
            isset($_POST['cbx_localidad']) && isset($_POST['fecha']) && isset($_POST['hora']) && 
            isset($_POST['descripcionEvento'])
        ) {


            $opciones = $_POST['opciones'];
            $pais = $_POST['cbx_estado'];
            $provincia = $_POST['cbx_municipio'];
            $localidad = $_POST['cbx_localidad'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $descripcion = $_POST['descripcionEvento'];
            $idUsuario = $_SESSION['id'];

            $consulta = "INSERT INTO eventos (idAccidente, idPais, idProvincia, idLocalidad, fecha,
                         hora, descripcion, idUsuario) 
                        VALUES ('$opciones', '$pais', '$provincia', '$localidad', '$fecha', '$hora', '$descripcion', '$idUsuario')";
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