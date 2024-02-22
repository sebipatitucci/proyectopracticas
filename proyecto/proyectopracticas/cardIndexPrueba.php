<?php
include("conex.php");

$consulta = "SELECT DATE_FORMAT(e.fecha, '%d-%m-%Y') as fecha,
                    DATE_FORMAT(e.hora, '%h:%i') as hora, 
                    e.descripcion,e.idEventos, 
                    a.descripcion as dAccidente,
                    e.latitud, e.longitud, u.nombre, uEstado, foto, l.descripcion as lDescripcion
                    FROM eventos e, usuarios u, accidentes a, localidades l
                    WHERE e.estado = 1
                    and uEstado = 1
                    AND u.idPerfil = 2
                    AND e.idUsuario = u.idUsuario
                    AND e.idAccidente = a.idAccidente
                    and e.idLocalidad = l.idLocalidad
                    ORDER BY fecha desc";

$resultado = mysqli_query($conex, $consulta);

$denuncias = 0;
?>

<style>
    
    .custom-card {
        min-width: 19rem;
        max-width: 19rem;
        min-height: 13rem;
        max-height: 13rem;
        border: solid 1px gray;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 2px 2px 10px  black;
        background: rgb(4, 45, 92);
        transition: transform 0.3s;
        color: white;
    }

    .custom-card:hover {
        transform: scale(1.05);
    }

    .name{
        font-family: "Permanent Marker", cursive;
    }

    .card-body {
        margin-top: -0.5rem;
        background: rgb(4, 45, 92);
    }

    .card-title {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: white;
        font-family: "Inconsolata", monospace;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        color: white;
        font-family: "Inconsolata", monospace;
        font-weight: 500;
        text-shadow: 2px 2px 5px black;
    }

    .footer{
        font-family: "Single Day", cursive;
    }

    .btn {
        font-size: 0.8rem;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        padding: 0.25rem 0.5rem;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

  
    @media (max-width: 1366px) {
        .custom-card{
            min-width: 17rem;
            max-width: 17rem;
            min-height: 12rem;
            max-height: 12rem;
        }
    }
</style>

<?php
foreach ($resultado as $i) {
    $descripcion = ucfirst($i['descripcion']);
?>

    <div class="col-3">
        <div class="container mt-5">
            <div class="card custom-card">
            <div class="card-header"><img src="<?php echo  $i['foto']; ?>" alt="" style="width: 20px; height: 20px; border-radius: 100%"><span class="name"> <?php echo  $i['nombre']; ?></span></div>
                <div class="card-body" >
                    <h5 class="card-title"><?php echo  $i['dAccidente']; ?></h5>
                    <p class="card-text"><?php echo $descripcion; ?></p>
                    <hr>
                <p class="card-text footer"><?php echo  $i['fecha']; echo " | ". $i['lDescripcion'];  ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Descripción Ampliada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



<?php
    $denuncias++;
    if ($denuncias == 8) {
        break;
    }
}
?>