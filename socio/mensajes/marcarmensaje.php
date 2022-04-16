<?php 
require('../../php/conexion.php');
$marcar=$_GET['marcar'];
mysql_set_charset("utf8");
 $consulta=mysql_query("UPDATE mensajerec SET leido = 's' WHERE idmen =".$marcar,$conexion);
 mysql_close($conexion);
?>