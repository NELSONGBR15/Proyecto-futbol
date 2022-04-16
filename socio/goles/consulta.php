<?php
session_start();

include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);	

					include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT i.fecha, p.local, p.visitante, p.tgolam, p.tgolaz, i.usuario, i.golam, i.golaz,i.color
					FROM incidencias i
					LEFT JOIN partido p ON i.fecha = p.fecha
					WHERE i.usuario = '".$_GET['usu']."' AND (
					i.golam >0
					OR i.golaz >0
					) AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01' ORDER BY i.fecha DESC" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
if ($nfilas==0) {
	?>
	<h2 style="text-align:center;margin-top:150px;margin-bottom:230px;color:AntiqueWhite;">Éste jugador aún no ha marcado ningún gol</h2>
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
	<th>goles</th>
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
	<td >
	<?php 
		for ($a=0;$a<$resultado['golam'];$a++)
					{
					//echo "<span style='color:white'>".$resultado['golam']." <span>";
					echo "<img style='margin:auto;' src='../../images/socio/gol20x20.png' />";
					}

		for ($d=0;$d<$resultado['golaz'];$d++)
					{
					//echo "<span style='color:white'>".$resultado['golaz']." <span>";
					echo "<img style='margin:auto;' src='../../images/socio/gol20x20.png' />";
					}
	?>
	</td>
	
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
	

	
	}
	
	?>
		