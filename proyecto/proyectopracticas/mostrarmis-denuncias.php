<?php
include("conex.php");

$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha, 
             DATE_FORMAT(e.hora, '%h:%i') as hora, e.descripcion,e.idEventos,
             a.descripcion as dAccidente, e.latitud, e.longitud, foto, l.Descripcion as lDescripcion, p.descripcion as pDescripcion
             FROM usuarios u, eventos e, accidentes a, localidades l, provincias p
             WHERE e.idUsuario = u.idUsuario
             and e.idAccidente = a.idAccidente
             and l.idLocalidad = e.idLocalidad
             and l.idProvincia = p.idProvincia
             and '$_SESSION[id]' = u.idUsuario 
             and estado = 1
             order by fecha desc";

$resultado = mysqli_query($conex, $consulta);

foreach ($resultado as $i) {
?>

    <div class="card" style="margin-top: 20px; border: solid 1px black;">
        <div class="card-body">
            <div id="contenedor-denuncia">
                <img src="<?php echo $i['foto'] ?>" alt="No se puede ver la foto" style="width: 150px; height:150px; border-radius: 100%">

                <div id="texto-denuncia">
                    <?php
                    $descripcion = ucfirst($i['descripcion']);
                    echo "<p><b> Tipo de accidente: </b>" . $i['dAccidente'] . "</p>";
                    echo "<p><b> Fecha: </b>" . $i['fecha'] . "</p>";
                    echo "<p><b> Hora: </b>" . $i['hora'] . "</p>";
                    echo "<p><b> Localidad: </b>" . $i['lDescripcion'] . ", " . $i['pDescripcion'] . "</p>";
                    echo "<p><b> Comentarios: </b>" . $descripcion . "</p>";
                    echo "<br>";
                    ?>
                </div>
            </div>
            <a class="btn btn-primary" style="margin-left: 5px;" onclick="return eliminar()">Eliminar</a>
            <a href="modificarDenuncia.php?var=<?php echo $i['idEventos']; ?>" class="btn btn-primary">Modificar</a>
            <a href="mapBase.php?map=<?php echo $i['idEventos']; ?>" class="btn btn-primary" style="float: right;">Ver en el mapa</a>
        </div>
    </div>

    <script language="javascript" type="text/javascript">
        function eliminar() {
            if (Swal.fire({
                    title: 'Esta seguro de eliminar esta denuncia?',
                    text: "No podrá recuperarla!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, quiero borrarla',
                    cancelButtonText: 'Cancelar',
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Eliminada!',
                            'Su denuncia ha sido eliminada',
                            'success',
                            
                            location = 'eliminar.php?borrar=<?php echo $i['idEventos']; ?>'
                        )
                    }
                })) {
            }
        }
    </script>
<?php


}
$conex->close();

?>