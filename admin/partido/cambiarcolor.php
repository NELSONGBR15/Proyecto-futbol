<?php
/*
$_GET['uskey']
$_GET['fecha']
$_GET['color']
*/
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT * from incidencias where usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
$resultado=mysql_fetch_array($consulta);

			$instruccion="UPDATE incidencias SET roam='".$resultado['roaz']."',golaz='".$resultado['golam']."',golam='".$resultado['golaz']."',roaz='".$resultado['roam']."',amam='".$resultado['amaz']."',amaz='".$resultado['amam']."',color='".$_GET['color']."' WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
			//echo $instruccion."<br />";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
		
	mysql_close($conexion);
?>
<html>
<head>
<script>
function cerrar (){ setTimeout(function () {window.close()},2000);}

</script>
</head>
<body onload="cerrar()">
</body>
</html>
<h3 style="color:green;">Guardado!</h3>
