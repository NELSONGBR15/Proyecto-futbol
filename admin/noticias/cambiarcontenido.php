<?php
	/*
	$_GET['id']
	$_GET['contenido']
	*/
	include('../../php/conexion.php');
	
	$instruccion="update noticias SET contenido='".$_GET['contenido']."',fecha='".date("Y-m-d H:i:s")."' WHERE id='".$_GET['id']."'";
		//echo $instruccion."<br />";
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
		mysql_close($conexion);
	
	
?>
<html>
<head>
<script>
function cerrar (){
setTimeout(function () {window.close()},3000);}

</script>
</head>
<body onload="cerrar()">
</body>
</html>
<h3 style="color:green;">Guardado!</h3>
