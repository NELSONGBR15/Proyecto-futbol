<?php

/*$_GET['usunuevo']
$_GET['usuantiguo']
$_GET['indice']*/

 include('../../php/conexion.php');
mysql_set_charset("utf8");
 $consulta=mysql_query("SELECT * from socio WHERE usuario='".$_GET['usunuevo']."'",$conexion);
 $nfilas = mysql_num_rows ($consulta);
mysql_close($conexion);
if ($nfilas==0) 
	{
	//si no existe
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET usuario='".$_GET['usunuevo']."' WHERE usuario='".$_GET['usuantiguo']."'",$conexion)
	 or die ("fallo al actualizar");
	mysql_close($conexion);
	
	
	
	echo "<input style='padding:5px' type='text' id='usuario".$_GET['indice']."' onkeypress=\"enterusu(event,'usuario",$_GET['indice'],"','".$_GET['indice']."')\" onclick=\"editarusuarioon('usuario".$_GET['indice']."')\" onblur=\"editarusuariooff('usuario".$_GET['indice']."')\" value='".$_GET['usunuevo']."' />";
	}

else 
	{
	//si existe
	echo "<script>alert(\"No se puede modificar por que ya existe éste usuario.\");</script>";
	echo "<input style='padding:5px' type='text' id='usuario".$_GET['indice']."' onkeypress=\"enterusu(event,'usuario",$_GET['indice'],"','".$_GET['indice']."')\" onclick=\"editarusuarioon('usuario".$_GET['indice']."')\" onblur=\"editarusuariooff('usuario".$_GET['indice']."')\" value='".$_GET['usuantiguo']."' />";
	
	}

?>
