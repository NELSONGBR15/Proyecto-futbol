<?php session_start() ?>
	<div id="left">
	<div  id="todosgoles">
<?php
include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);	
		
					/*Mi color*/
					
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT fecha, color
					FROM incidencias
					WHERE usuario = '".$_SESSION['usu']."' AND fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
					ORDER BY fecha DESC" ;
					$consultacolor = mysql_query ($instruccion, $conexion);
	
					mysql_close($conexion);
					
					
					/*todos los partidos*/
					include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT p.fecha, p.local, p.visitante, p.tgolam, p.tgolaz
					FROM partido p
					LEFT JOIN incidencias i ON i.fecha = p.fecha
					WHERE roam >0 OR roaz >0 OR amam >0	OR amaz >0
					AND substr( i.fecha	FROM 1 FOR 4 ) = (SELECT substr( fecha	FROM 1	FOR 4 ) AS ano1
									FROM incidencias GROUP BY usuario ORDER BY fecha DESC LIMIT 0 , 1 ) AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01'
					GROUP BY i.fecha
					ORDER BY p.fecha DESC" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
	?>

	<table id="todosgoless">
	<tr>
	<th>Fecha</th>
	<th>Local</th>
	<th>Marcador</th>
	<th>Visitante</th>
	<th>Equipación</th>
	</tr>
	<?php
	//cojo el primer valor de la fecha -> color
	$consultacolorr = mysql_fetch_array ($consultacolor);
	
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
	echo " <td><img style='float:right;' src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img style='float:right;' src='../../images/azul.png' /></td>";
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
	echo " <td><img style='float:left;' src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img style='float:left;' src='../../images/azul.png' /></td>";
	}

	
	if ($consultacolorr['fecha']==$resultado['fecha']) 
		{
			
			if (cambiacolor($consultacolorr['color'])=='Amarillo')
			{
			
			echo " <td style='color:yellow;font-size:14px;'>Amarillo</td>";
			}
			else  {
			echo "<td style='color:lightblue;font-size:14px;'>Azul</td>";
			}
			$consultacolorr = mysql_fetch_array ($consultacolor);
		}
	else { echo "<td></td>"; }
	
	?>
	</tr>
	
	<?php

					//lista de filas con jugadores que marcaron de azul
					include ('../../php/conexion.php');
					$instruccion = "select i.amaz,i.roaz,s.nombre,s.apellidos from incidencias i 
					LEFT JOIN socio s ON i.usuario=s.usuario
					where fecha='".$resultado['fecha']."' AND (i.amaz >0 OR i.roaz >0)";
					$listaaz = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
						
					//$listaazul = mysql_fetch_array ($listaaz);
		
					//lista de filas con jugadores que marcaron de amarillo
					include ('../../php/conexion.php');
					$instruccion = "select i.amam,i.roam,s.nombre,s.apellidos from incidencias i 
					LEFT JOIN socio s ON i.usuario=s.usuario
					where fecha='".$resultado['fecha']."' AND (i.amam >0 OR i.roam >0)";
					$listaam = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
						
					//$listaamarillo = mysql_fetch_array ($listaam);
					$totfilasgol=MAX(mysql_num_rows ($listaaz),mysql_num_rows ($listaam));
					
					for ($b=0; $b<$totfilasgol; $b++)
					{
					$listaazul = mysql_fetch_array ($listaaz);
					$listaamarillo = mysql_fetch_array ($listaam);
					
						if (cambiacolor($resultado['local'])=='Amarillo')
	{
	?>
					<tr>
					<td>
					<?php
					for ($a=0;$a<$listaamarillo['amam'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/tamarilla20x26.png' />\n";
					}
					for ($a=0;$a<$listaamarillo['roam'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/troja20x26.png' />\n";
					}
					?>
					</td>
					<td>
					<?php echo $listaamarillo['nombre']." ".substr($listaamarillo['apellidos'],0,3) ?>
					</td>
					<td>
					</td>
					<td>
					<?php echo $listaazul['nombre']." ".substr($listaazul['apellidos'],0,3) ?>
					</td>
					<td>
					<?php
					for ($a=0;$a<$listaazul['amaz'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/tamarilla20x26.png' />\n";
					}
					for ($a=0;$a<$listaazul['roaz'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/troja20x26.png' />\n";
					}
					?>
					</td>
					</tr>
	<?php }
	else {
	?>
	<tr>
					<td>
					<?php
					for ($a=0;$a<$listaazul['amaz'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/tamarilla20x26.png' />\n";
					}
					for ($a=0;$a<$listaazul['roaz'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/troja20x26.png' />\n";
					}
					?>
					</td>
					<td>
					<?php echo $listaazul['nombre']." ".substr($listaazul['apellidos'],0,3) ?>
					</td>
					<td>
					</td>
					<td>
					<?php echo $listaamarillo['nombre']." ".substr($listaamarillo['apellidos'],0,3) ?>
					</td>
					<td>
					<?php
					for ($a=0;$a<$listaamarillo['amam'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/tamarilla20x26.png' />\n";
					}
					for ($a=0;$a<$listaamarillo['roam'];$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/troja20x26.png' />\n";
					}
					?>
					</td>
	</tr>
	
	<?php }	?>
					
	<?php
					} 
	?>
	
	
	
	<?php } mysql_close ($conexion); ?>
	</table>
	</div>
	</div>