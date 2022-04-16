<html>
<head>
<title>Generar contrasena</title>
</head>
<body>
<?php 

if (isset($_GET['uskey']))
{
$pos = strpos($_GET['uskey'],'@');
if ($pos===false)
	{
	echo "el usuario no tiene email.<br />";
	echo "Nombre de usuario:&nbsp;".$_GET['uskey']."<br /> contraseña-> ".$_GET['contrasena'];
	require('../../php/conexion.php');
	 $consulta=mysql_query("UPDATE socio SET contrasena='".$_GET['contrasena']."' WHERE usuario='".$_GET['uskey']."'",$conexion) or die ("fallo al actualizar");
	
	 mysql_close($conexion);	 
	}
else
	{
	?>
<form action="mailto:<?php echo $_GET['uskey'];?>" method="post">
<label>Correo electrónico:&nbsp;</label><input type="text" value="<?php echo $_GET['uskey'];?>"/>
<input type="hidden" name="contrasena" value="<?php echo $_GET['contrasena']; ?>" />
<input type="submit" value="enviar contraseña" />
</form>
<?php	}


}
?>
</body>
<html>



