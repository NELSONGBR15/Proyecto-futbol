<?php

/*$_GET['direcnuevo']
$_GET['direcantiguo']
$_GET['indice']
$_GET['idusu']*/

	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET direccion='".$_GET['direcnuevo']."' WHERE usuario='".$_GET['idusu']."'",$conexion)
	 or die ("fallo al actualizar");
	// echo "UPDATE socio SET direccion='".$_GET['direcnuevo']."' WHERE usuario='".$_GET['idusu']."'";
	 mysql_close($conexion);
	
	
	
	echo "<textarea style='padding:5px;width:160px;resize:vertical;min-height:60px;' type='text' id='direccion".$_GET['indice']."' onkeypress=\"enterdir(event,'direccion".$_GET['indice']."','".$_GET['indice']."','".$_GET['idusu']."')\" onclick=\"editardiron('direccion".$_GET['indice']."')\" onblur=\"editardiroff('direccion".$_GET['indice']."')\">".$_GET['direcnuevo']."</textarea>";


?>
