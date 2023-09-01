<?php
	require ('../conex.php');
	
	$idProvincia = $_POST['idProvincia'];
	
	$query = "SELECT idLocalidad, descripcion FROM localidades WHERE idProvincia = '$idProvincia' ORDER BY descripcion";
	$resultado=$conex->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['idLocalidad']."'>".$row['descripcion']."</option>";
	}
	echo $html;
?>