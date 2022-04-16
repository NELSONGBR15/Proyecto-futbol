<?php

/*$_GET['telefono2nuevo']
$_GET['telefono2antiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET telefono2='".$_GET['telefono2nuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	// echo "UPDATE socio SET telefono2='".$_GET['telefono2nuevo']."' WHERE usuario='".$_GET['idusu']."'";
	 mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px;width:55px;' type='text' id='telefono2".$_GET['indice']."' onkeypress=\"entertel2(event,'telefono2".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editartel2on('telefono2".$_GET['indice']."')\" onblur=\"editartel2off('telefono2".$_GET['indice']."')\" value='".$_GET['telefono2nuevo']."' />";


?>
