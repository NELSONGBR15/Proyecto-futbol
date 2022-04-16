<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="UPDATE socio SET activo='".$_GET['activo']."' WHERE usuario='".$_GET['uskey']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
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
<h3 style="green">Guardado!</h3>
