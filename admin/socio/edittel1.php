<?php

/*$_GET['telefono1nuevo']
$_GET['telefono1antiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET telefono1='".$_GET['telefono1nuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5pxwidth:55px;' type='text' id='telefono1".$_GET['indice']."' onkeypress=\"entertel1(event,'telefono1".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editartel1on('telefono1".$_GET['indice']."')\" onblur=\"editartel1off('telefono1".$_GET['indice']."')\" value='".$_GET['telefono1nuevo']."' />";


?>
