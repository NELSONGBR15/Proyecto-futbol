<?php
/*$_GET['usuario']*/
include ('../../php/conexion.php');
					$instruccion = "DELETE FROM socio WHERE usuario='".$_GET['usuario']."'";
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");

?>
