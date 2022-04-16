<?php

/*$_GET['dninuevo']
$_GET['dniantiguo']
$_GET['indice']*/

 include('../../php/conexion.php');
mysql_set_charset("utf8");
 $consulta=mysql_query("SELECT * from socio WHERE dni='".$_GET['dninuevo']."'",$conexion);
 $nfilas = mysql_num_rows ($consulta);
mysql_close($conexion);
if ($nfilas==0) 
	{
	//si no existe
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	 $consulta=mysql_query("UPDATE socio SET dni='".$_GET['dninuevo']."' WHERE dni='".$_GET['dniantiguo']."'",$conexion)
	 or die ("fallo al actualizar");
	mysql_close($conexion);
	
	
	
	echo "<input style='padding:5pxwidth:56px;' type='text' id='dni".$_GET['indice']."' onkeypress=\"enterdni(event,'dni",$_GET['indice'],"','".$_GET['indice']."')\" onclick=\"editardnion('dni".$_GET['indice']."')\" onblur=\"editardnioff('dni".$_GET['indice']."')\" value='".$_GET['dninuevo']."' />";
	}

else 
	{
	//si existe
	echo "<input style='padding:5pxwidth:56px;' type='text' id='dni".$_GET['indice']."' onkeypress=\"enterdni(event,'dni",$_GET['indice'],"','".$_GET['indice']."')\" onclick=\"editardnion('dni".$_GET['indice']."')\" onblur=\"editardnioff('dni".$_GET['indice']."')\" value='".$_GET['dniantiguo']."' />";
	
	}

?>
