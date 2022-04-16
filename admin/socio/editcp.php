<?php

/*$_GET['cpnuevo']
$_GET['cpantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET cp='".$_GET['cpnuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px' type='text' id='cp".$_GET['indice']."' onkeypress=\"entercp(event,'cp".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editarcpon('cp".$_GET['indice']."')\" onblur=\"editarcpoff('cp".$_GET['indice']."')\" value='".$_GET['cpnuevo']."' />";


?>
