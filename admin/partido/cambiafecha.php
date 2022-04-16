<?php
/*
$_GET['fechanueva']
$_GET['fechantigua']
*/
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="UPDATE partido SET fecha='".$_GET['fechanueva']."' WHERE fecha='".$_GET['fechantigua']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
	$instruccion="UPDATE incidencias SET fecha='".$_GET['fechanueva']."' WHERE fecha='".$_GET['fechantigua']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");	

	mysql_close($conexion);
?>
<html>
<head>
<script>
function cerrar (){
setTimeout(function () {window.close()},2000);}

</script>
</head>
<body onload="cerrar()">
</body>
</html>
<h3 style="color:green;">Guardado!</h3>
