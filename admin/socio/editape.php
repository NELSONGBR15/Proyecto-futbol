<?php

/*$_GET['apenuevo']
$_GET['apeantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET apellidos='".$_GET['apenuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px;width:80px;' type='text' id='apellidos".$_GET['indice']."' onkeypress=\"enterape(event,'apellidos".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editarapeon('apellidos".$_GET['indice']."')\" onblur=\"editarapeoff('apellidos".$_GET['indice']."')\" value='".$_GET['apenuevo']."' />";


?>
