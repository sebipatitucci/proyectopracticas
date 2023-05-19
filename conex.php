<?php

$conex = mysqli_connect("localhost", "root", "", "savelife");

// Verificar conexión
if ($conex->connect_error) {
    die("Connection failed: " . $conex->connect_error);
    echo"no se pudo conectar la bd";
  }

?>