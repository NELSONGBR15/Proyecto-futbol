<?php
	/*
	$_GET['color']
	$_GET['fecha']
	*/
	include('../../php/conexion.php');
	
	$instruccion8="SELECT * from partido WHERE fecha='".$_GET['fecha']."'";
		//echo $instruccion."<br />";
		$consulta6 = mysql_query ($instruccion8, $conexion)
				or die ("Fallo en la consulta $instruccion8");
		$resultado7=mysql_fetch_array($consulta6);
	
	if ($_GET['color']=='am')
		{
		mysql_set_charset("utf8");
		$instruccion="UPDATE partido SET local='az',visitante='am',tamaz='".$resultado7['tamam']."',troaz='".$resultado7['troam']."',tgolaz='".$resultado7['tgolam']."',tamam='".$resultado7['tamaz']."',troam='".$resultado7['troaz']."',tgolam='".$resultado7['tgolaz']."' WHERE fecha='".$_GET['fecha']."'";
		//echo $instruccion."<br />";
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
		}
		else 
		{
		mysql_set_charset("utf8");
		$instruccion="UPDATE partido SET local='am',visitante='az',tamaz='".$resultado7['tamam']."',troaz='".$resultado7['troam']."',tgolaz='".$resultado7['tgolam']."',tamam='".$resultado7['tamaz']."',troam='".$resultado7['troaz']."',tgolam='".$resultado7['tgolaz']."' WHERE fecha='".$_GET['fecha']."'";
		//echo $instruccion."<br />";
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
		}
	
	mysql_set_charset("utf8");
	
	$instruccion10="SELECT caplocal from partido WHERE fecha='".$_GET['fecha']."'";
	//echo $instruccion."<br />";
	$consulta10 = mysql_query ($instruccion10, $conexion)
				or die ("Fallo en la consulta $instruccion");
				$resultado10=mysql_fetch_array($consulta10);
	$instruccion11="SELECT capvisitante from partido WHERE fecha='".$_GET['fecha']."'";
	//echo $instruccion11."<br />";
	$consulta11 = mysql_query ($instruccion11, $conexion)
				or die ("Fallo en la consulta $instruccion");
				$resultado11=mysql_fetch_array($consulta11);	
	
	$instruccion="SELECT * from incidencias WHERE fecha='".$_GET['fecha']."' AND color='am'";
	//echo $instruccion."<br />";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
	
	
	$instruccion2="SELECT * from incidencias WHERE fecha='".$_GET['fecha']."' AND color='az'";
	//echo $instruccion2."<br />";
	$consulta2 = mysql_query ($instruccion2, $conexion)
				or die ("Fallo en la consulta $instruccion");
	
	$resultado=mysql_fetch_array($consulta);			
	
	while ($resultado)
	{
	$instruccion1="UPDATE incidencias SET color='az',roaz='".$resultado['roam']."',amaz='".$resultado['amam']."',golaz='".$resultado['golam']."' WHERE fecha='".$_GET['fecha']."' AND color='am' AND usuario='".$resultado['usuario']."'";
	//echo $instruccion1."<br />";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion");
				$resultado=mysql_fetch_array($consulta);
	}
	$resultado=mysql_fetch_array($consulta2);
	
	while ($resultado)
	{
	$instruccion1="UPDATE incidencias SET color='am',roam='".$resultado['roaz']."',amam='".$resultado['amaz']."',golam='".$resultado['golaz']."' WHERE fecha='".$_GET['fecha']."' AND color='az' AND usuario='".$resultado['usuario']."'";
	//echo $instruccion1."<br />";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion");
				$resultado=mysql_fetch_array($consulta2);
	}
	
	
	 

	
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
