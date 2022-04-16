<?php session_start() ?>
	<div id="left">
	<div id="izqda">
	<?php 
	
	include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);		
	
	/* estadisticas*/
	
	include ('../../php/conexion.php');
	$instruccion = "SELECT COUNT(i.fecha) as fecha,SUM(i.golaz+i.golam) AS gol
			FROM incidencias i
			LEFT JOIN partido p ON i.fecha=p.fecha
			WHERE i.usuario = '".$_SESSION['usu']."' AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01'";
	$consulta = mysql_query ($instruccion, $conexion)
		or die ("Fallo en la consulta1");
	$resultado = mysql_fetch_array ($consulta);
	if ($resultado['gol']==0) {
					$gol=0;
					$numpartidos=0;
					$num2=0;
					}
	else {
		$numpartidos=$resultado['fecha'];
		$gol=$resultado['gol'];
		$numpartidos=($numpartidos*90)/$resultado['gol'];
		$num2=round($resultado['gol']/$resultado['fecha'],2);
		}
	
	$instruccion = "SELECT SUM(i.golaz+i.golam) AS totalgol
					FROM incidencias i
					LEFT JOIN partido p ON i.fecha=p.fecha
					WHERE i.usuario ='".$_SESSION['usu']."' AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01'";
	$consulta = mysql_query ($instruccion, $conexion)
		or die ("Fallo en la consulta2");
	$nfilas = mysql_num_rows ($consulta);
	for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										$totalgol=$resultado['totalgol'];
										}
	
	$instruccion = "SELECT SUM( golaz ) AS golaz, SUM( golam ) AS golam
					FROM incidencias i
					WHERE usuario ='".$_SESSION['usu']."' AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01'";
	$consulta = mysql_query ($instruccion, $conexion)
		or die ("Fallo en la consulta3");
	$resultado = mysql_fetch_array ($consulta);
	$golaz=$resultado['golaz'];
	$golam=$resultado['golam'];

	if ($totalgol==0) {
					$poraz=0;
					$poram=0;
					}
	else {
		$poraz=($golaz*100)/$totalgol;
		$poram=($golam*100)/$totalgol;
		}
	mysql_close ($conexion);
	?>
	
	
	
	<h3 style="text-align:center;color:Turquoise;margin:10px;" >Estadísticas</h3>
	<p><span>1 </span>Gol por cada<span> <?php echo $numpartidos; ?></span> Mins</p>
	<hr style="width:70%;" />
	<p><span><?php echo $num2; ?></span> Gol por partido</p>
	<hr style="width:70%;" />
	<p>
	<table  id="estadisticasmisgoles" >
	<tr>
	<th colspan="2" style="color:lime;">Total Goles</th>
	</tr>
	<tr>
	<tr>
	
	<td colspan="2"><?php echo $totalgol; ?></td>
	</tr>
	<tr>

	<td style="color:lightblue;">Azul</td>
	<td style="color:yellow;">Amarillo</td>
	</tr>
	<tr>
	
	<td><?php echo $golaz; ?></td>
	<td><?php echo $golam; ?></td>
	</tr>
	<tr>
	<tr>
	<th colspan="2" style="color:lime;">%</th>
	</tr>
	<td><?php echo round($poraz, 2); ?></td>
	<td><?php echo round($poram, 2); ?></td>
	</tr>
	</table>
	</p>
	</div>
	<div  id="drcha">
<?php
					include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT i.fecha, p.local, p.visitante, p.tgolam, p.tgolaz, i.usuario, i.golam, i.golaz,i.color
					FROM incidencias i
					LEFT JOIN partido p ON i.fecha = p.fecha
					WHERE i.usuario = '".$_SESSION['usu']."' AND (
					i.golam >0
					OR i.golaz >0
					) AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01' ORDER BY i.fecha DESC" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
if ($nfilas==0) {
	?>
	<h2 style="text-align:center;margin-top:150px;margin-bottom:230px;color:AntiqueWhite;">Aún no has marcado ningún gol pero el próximo partido puede ser el tuyo.<br /><br />¡Ánimo!</h2>
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
	<th>Mis goles</th>
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
					echo "<img style='margin:auto;' src='../../images/socio/gol20x20.png' />";
					}

		for ($d=0;$d<$resultado['golaz'];$d++)
					{
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
		
	</div>
	</div>
