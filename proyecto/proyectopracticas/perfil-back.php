<?php 
    include("conex.php");
    // session_start();

   // $consulta = "SELECT nombre, email, contrasenia, telefono, fecha_nac FROM usuarios where nombre = '$_SESSION[name]'";
    $consulta = "SELECT nombre, email, contrasenia, telefono, DATE_FORMAT(fecha_nac, '%d-%m-%Y') as fecha_nac FROM usuarios where '$_SESSION[id]' = idUsuario";

    $resultado = mysqli_query($conex, $consulta);
    $row = mysqli_fetch_array($resultado);

    if($row){
        
       echo "<ul class='list-type'>";
            echo "<li class='right-list-element'>$row[nombre]</li>";
            echo "<li class='right-list-element'>$row[email]</li>";
            echo "<li class='right-list-element'>$row[contrasenia]</li>";
            echo "<li class='right-list-element'>$row[telefono]</li>";
            echo "<li class='right-list-element'>$row[fecha_nac]</li>";
        echo"</ul>";
        
       
    }

    $conex->close();

?>
<div class="card-body">
    <a href="modificarUsuario.php?id=<?php echo $_SESSION['id']; ?>"  class="btn btn-primary"  
    style="
    position: relative;
    left: 140px;
    top: 45px;
    ">Modificar datos</a>
</div>