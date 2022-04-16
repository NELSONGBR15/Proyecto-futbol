<?php
/*
$_GET['color']
$_GET['uskey']
$_GET['fecha']
$_GET['amon']
*/
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="UPDATE incidencias SET amon='".$_GET['amon']."' WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
	 
	$amam=0;
	$roam=0;
	 switch($_GET['amon'])
					{
					
					case 0: $amam=0;
							$roam=0;
						break;
					
					case 1: $amam=1;
						break;
					case 2: $roam=1;
						break;
					case 3: $roam=1;
						break;
					}
					
		if($_GET['amon']==0) 
			{
			$instruccion="UPDATE incidencias SET roam='".$amam."',roaz='".$roam."',amam='".$amam."',roam='".$roam."' WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
			//echo $instruccion."<br />";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
			}
		
		else if($_GET['color']=="am") 
			{
			$instruccion="UPDATE incidencias SET amam='".$amam."',roam='".$roam."' WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
			//echo $instruccion."<br />";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
			}
		else 
			{
			$instruccion="UPDATE incidencias SET roaz='".$amam."',roaz='".$roam."' WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'";
			//echo $instruccion."<br />";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
			}
	
	mysql_close($conexion);
?>

