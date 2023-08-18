<?php
	require ('../conex.php');
	
	$idPais = $_POST['idPais'];
	
	$queryM = "SELECT idProvincia, descripcion FROM provincias WHERE idPais = '$idPais' ORDER BY descripcion";
	$resultadoM = $conex->query($queryM);
	
	$html= "<option value='0'>Seleccionar Provincia</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idProvincia']."'>".$rowM['descripcion']."</option>";
	}
	
	echo $html;
?>