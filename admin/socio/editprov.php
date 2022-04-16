<?php

/*$_GET['provincianuevo']
$_GET['provinciaantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET provincia='".$_GET['provincianuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px' type='text' id='provincia".$_GET['indice']."' onkeypress=\"enterprov(event,'provincia".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editarprovon('provincia".$_GET['indice']."')\" onblur=\"editarprovoff('provincia".$_GET['indice']."')\" value='".$_GET['provincianuevo']."' />";


?>
