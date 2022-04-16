<?php

/*$_GET['nombrenuevo']
$_GET['nombreantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET nombre='".$_GET['nombrenuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5pxwidth:80px;' type='text' id='nombre".$_GET['indice']."' onkeypress=\"enternom(event,'nombre".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editarnombreon('nombre".$_GET['indice']."')\" onblur=\"editarnombreoff('nombre".$_GET['indice']."')\" value='".$_GET['nombrenuevo']."' />";


?>
