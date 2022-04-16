<?php session_start() ?>
	<div id="left">
	<div id="izqda" style="margin-left:3px;margin-top:70px;">
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
					$instruccion = "SELECT SUM(puntos) AS puntoss FROM incidencias i WHERE substr(fecha FROM 1 FOR 4)=(SELECT substr(fecha FROM 1 FOR 4) AS ano1 FROM incidencias WHERE fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
					GROUP BY usuario
					ORDER BY fecha DESC LIMIT 0,1) AND usuario='".$_SESSION['usu']."'  " ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$resultado = mysql_fetch_array ($consulta);
					$totpuntos=$resultado['puntoss'];
	
	?>
	<hr style="width:70%;" />
	<p>Tengo <span><?php echo $totpuntos; ?> </span> Puntos esta temporada</p>
	<hr style="width:70%;" />
	
	<p>
	
	
	</div>
	<div  id="drcha">
	<?php include ('../../php/conexion.php');
		include ('../../php/funciones.php');
					mysql_set_charset('utf8');
								$instruccion = "select 	p.fecha, p.local, p.visitante, p.tgolam, p.tgolaz, p.tamam, p.troam, p.tamaz, p.troaz, 		i.usuario, i.puntos, i.color
								from partido p
								LEFT JOIN incidencias i ON p.fecha=i.fecha
								WHERE i.usuario='".$_SESSION['usu']."' AND i.puntos>0
								AND substr(p.fecha FROM 1 FOR 4)=(SELECT substr(fecha FROM 1 FOR 4) AS ano1 FROM incidencias
								WHERE fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
								GROUP BY usuario
								ORDER BY fecha DESC LIMIT 0,1) 
								ORDER BY i.fecha DESC" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
if ($nfilas==0) {
	?>
	<h2 style="text-align:center;margin-top:150px;margin-bottom:230px;color:AntiqueWhite;">Aún no has puntuado este año pero el próximo partido puede ser el tuyo.<br /><br />¡Ánimo!</h2>
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
	<th>Mis puntos</th>
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