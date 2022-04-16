<?php session_start(); ?>
<html>
<head>
<title>Generar contrasena</title>
</head>
<body>
<?php 

if (isset($_GET['uskey']))
{
	echo "<span style='color:green;'>Contraseña actualizada correctamente</span>";
	 $_SESSION['pas']=$_GET['contrasena'];
	require('../../php/conexion.php');
	 $consulta=mysql_query("UPDATE socio SET contrasena='".$_GET['contrasena']."' WHERE usuario='".$_GET['uskey']."'",$conexion) or die ("fallo al actualizar");
	
	 mysql_close($conexion);	 

}
?>
</body>
<html>



