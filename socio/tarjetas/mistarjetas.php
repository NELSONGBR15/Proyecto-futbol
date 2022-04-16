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
		
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT SUM(roam+roaz) AS rojas,SUM(amam+amaz) AS amarillas  FROM incidencias 
									WHERE usuario='".$_SESSION['usu']."' AND( roam>0 OR roaz>0 OR amam>0 OR amaz>0)
									AND substr(fecha FROM 1 FOR 4)=(SELECT substr(fecha FROM 1 FOR 4) AS ano1 FROM incidencias
									GROUP BY usuario
									ORDER BY fecha DESC LIMIT 0,1) AND fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01' 
									GROUP BY usuario" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$resultado = mysql_fetch_array ($consulta);
?>
	<h3 style="text-align:center;color:Turquoise;margin:10px;" >Ésta temporada tengo... </h3>
	<p><span><?php if($resultado['amarillas']) {echo $resultado['amarillas'];} else { echo "0";} ?> </span> tarjetas <span style="color:yellow">Amarillas</span></p>
	<hr style="width:70%;" />
	<p><span><?php if($resultado['rojas']) {echo $resultado['rojas'];} else { echo "0";} ?> </span> tarjetas <span style="color:red">Rojas</span></p>
	<hr style="width:70%;" />

	</div>
	<div  id="drcha">
	<?php
						include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT p.fecha, p.local, p.visitante, p.tgolam, p.tgolaz,i.color, i.amam, i.roam, i.amaz, i.roaz
									FROM partido p
									LEFT JOIN incidencias i ON i.fecha = p.fecha
									WHERE i.usuario = '".$_SESSION['usu']."'
									AND (roam >0 OR roaz >0	OR amam >0	OR amaz >0)
									AND substr( i.fecha	FROM 1 FOR 4 ) = (SELECT substr( fecha	FROM 1	FOR 4 ) AS ano1
									FROM incidencias GROUP BY usuario ORDER BY fecha DESC LIMIT 0 , 1 ) AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01' " ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
if ($nfilas==0) {
	?>
	<h2 style="text-align:center;margin-top:150px;margin-bottom:230px;color:AntiqueWhite;">Aún no tienes ninguna tarjeta en ningún partido.</h2>
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
	<th>Tarjetas</th>
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
		for ($a=0;$a<($resultado['amam']+$resultado['amaz']);$a++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/tamarilla20x26.png' />";
					}

		for ($d=0;$d<($resultado['roam']+$resultado['roaz']);$d++)
					{
					echo "<img style='margin:auto;' src='../../images/socio/troja20x26.png' />";
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
