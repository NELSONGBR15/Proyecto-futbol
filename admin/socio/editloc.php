<?php

/*$_GET['localidadnuevo']
$_GET['localidadantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET localidad='".$_GET['localidadnuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px' type='text' id='localidad".$_GET['indice']."' onkeypress=\"enterloc(event,'localidad".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editarlocon('localidad".$_GET['indice']."')\" onblur=\"editarlocoff('localidad".$_GET['indice']."')\" value='".$_GET['localidadnuevo']."' />";


?>
