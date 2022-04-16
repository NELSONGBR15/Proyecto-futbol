<html>
<head>
<title> Ver puntos de un jugador</title>
<link href="../../css/socio.css" rel="stylesheet" type="text/css"/>
<link href="../../socio/goles/css/gol.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div id="left" style="width:735px;">
<?php session_start() ?>
	<div id="izqda" style="background-color:black;">
			<?php
			/*$_GET['temporadamayor'];
	$_GET['uskey'];*/
		
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT SUM(puntos) AS puntoss FROM incidencias i WHERE substr(fecha FROM 1 FOR 4)=(SELECT substr(fecha FROM 1 FOR 4) AS ano1 FROM incidencias WHERE fecha<='".$_GET['temporadamayor']."/06/30' AND fecha>='".($_GET['temporadamayor']-1)."/09/01'
					GROUP BY usuario
					ORDER BY fecha DESC LIMIT 0,1) AND usuario='".$_GET['uskey']."'  " ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$resultado = mysql_fetch_array ($consulta);
					$totpuntos=$resultado['puntoss'];
	
	?>
	<hr style="width:70%;" />
	<p>Tiene <span><?php echo $totpuntos; ?> </span> Puntos esta temporada</p>
	<hr style="width:70%;" />
	
	<p>
	
	
	</div>
	<div  id="drcha" style="background-color:black;width:auto;" >
<?php include ('../../php/conexion.php');
		include ('../../php/funciones.php');
					mysql_set_charset('utf8');
								$instruccion = "select 	p.fecha, p.local, p.visitante, p.tgolam, p.tgolaz, p.tamam, p.troam, p.tamaz, p.troaz, 		i.usuario, i.puntos, i.color
								from partido p
								LEFT JOIN incidencias i ON p.fecha=i.fecha
								WHERE i.usuario='".$_GET['uskey']."' AND i.puntos>0
								AND substr(p.fecha FROM 1 FOR 4)=(SELECT substr(fecha FROM 1 FOR 4) AS ano1 FROM incidencias
								WHERE fecha<='".$_GET['temporadamayor']."/06/30' AND fecha>='".($_GET['temporadamayor']-1)."/09/01'
								GROUP BY usuario
								ORDER BY fecha DESC LIMIT 0,1) 
								ORDER BY i.fecha DESC" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
if ($nfilas==0) {
	?>
	<h2 style="text-align:center;margin-top:150px;margin-bottom:230px;color:AntiqueWhite;">Éste jugador aún no ha puntuado ésta temporada</h2>
	<?php

	}
else {
?>
	<table id="misgoles">
	<tr>
	<th>Fecha</th>
	<th>Local</th>
	<th>Marcador</th>
	<th>Visitante</th>
	<th>puntos</th>
	<th>Equipación</th>
	</tr>
	<?php
	for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
			?>
	<tr>
	
	<td style="color:lightblue;font-size:14px;text-align:center">
	<?php echo formateodia($resultado['fecha'])?> de <?php echo formateomes($resultado['fecha']) ?></td>
	
	<?php 
	if (cambiacolor($resultado['local'])=='Amarillo')
	{
	echo " <td><img src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img src='../../images/azul.png' /></td>";
	}
	
	if ($resultado['local']=='am')
		{
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px'>".$resultado['tgolam']." <span style='color:red;'>-</span> ".$resultado['tgolaz']."</td>";
		}
	else {
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px'>".$resultado['tgolaz']." <span style='color:red;'>-</span> ".$resultado['tgolam']."</td>";
		}

	if (cambiacolor($resultado['visitante'])=='Amarillo')
	{
	echo " <td><img src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img src='../../images/azul.png' /></td>";
	}
	
	?>
	<td><?php echo $resultado['puntos']; ?>	</td>
	
	<?php 
	if (cambiacolor($resultado['color'])=='Amarillo')
	{
	echo " <td style='color:yellow;font-size:14px;'>Amarillo</td>";
	}
	else {
	echo "<td style='color:lightblue;font-size:14px;'>Azul</td>";
	}
	
	?>
	
	</tr>
	<?php } mysql_close ($conexion); ?>
	</table>
	<?php 
	
	} ?>
	
	
	
	
	
	
	</div>
	</div>

</body>
</html>