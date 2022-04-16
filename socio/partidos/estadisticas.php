<?php session_start() ?>
	<div id="left">
	<div id="izqda" style="margin-left:3px;margin-top:9px;">
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
					$instruccion = "SELECT p.id,p.tgolam,p.tgolaz,i.color
									FROM partido p
									LEFT JOIN incidencias i ON i.fecha=p.fecha
									WHERE usuario='".$_SESSION['usu']."' AND i.fecha<='".temporadamayor($temporada['fecha'])."/09/01' AND i.fecha>='".temporadamenor($temporada['fecha'])."/06/30'
									ORDER BY id DESC LIMIT 0,15" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
					$pganando[0]=0;
					$pperdiendo[0]=0;
					$pempatando[0]=0;
					$iganar=0;
					$iperder=0;
					$iempatar=0;
					$iganaram=0;
					$iperderam=0;
					$iempataram=0;
					$iganaraz=0;
					$iperderaz=0;
					$iempataraz=0;
					
					
					
					
					for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										if ($resultado['tgolam']>$resultado['tgolaz'])
											{
												if ($resultado['color']=='am')
														{
														$pganando[$iganar]=$resultado['id'];
														$iganar++;
														$iganaram++;
														}
												else {
													$pperdiendo[$iperder]=$resultado['id'];
														$iperder++;
														$iperderaz++;
													}
											}
										else if ($resultado['tgolam']<$resultado['tgolaz'])
											{
											if ($resultado['color']=='az')
														{
														$pganando[$iganar]=$resultado['id'];
														$iganar++;
														$iganaraz++;
														}
												else {
													$pperdiendo[$iperder]=$resultado['id'];
														$iperder++;
														$iperderam++;
													}
											}
										else if ($resultado['tgolam']==$resultado['tgolaz'])
											{
											if ($resultado['color']=='am')
														{
														$pempatando[$iempatar]=$resultado['id'];
																	$iempatar++;
																	$iempataram++;
														}
											else {
												$pempatando[$iempatar]=$resultado['id'];
																	$iempatar++;
																	$iempataraz++;
												}
											}

										}
										mysql_close($conexion);
//cojo los ultimos id's
$iganarr=$pganando[0];
$iperderr=$pperdiendo[0];
$iempatarr=$pempatando[0];
/*con esto ire contando los que son consecutivos desde los ultimos partidos 
empezando por el dato mas moderno al mas antiguo hasta 15 registros*/
$icongan=-1;
$iconper=-1;
$iconemp=-1;
foreach ($pganando as $valor) {
 	if($iganarr==$valor) {
		$icongan++;
		$iganarr--;
		}

}

foreach ($pperdiendo as $valor) {
	if($iperderr==$valor) {
		$iconper++;
		$iperderr--;
		}
}

foreach ($pempatando as $valor) {
	if($iempatarr==$valor) {
		$iconemp++;
		$iempatarr--;
		}
}
	?>
	<table style="margin-bottom:15px;">
	<tr>
	<th colspan="3" style="color:aqua;text-align:center;border-bottom:2px solid gray;" >Partidos</th>
	
	</tr>
	<tr>
	<th style="color:aqua;" >Ganados</th>
	<th style="color:aqua;" >Empatados</th>
	<th style="color:aqua;" >Perdidos</th>
	</tr>
	<tr style="text-align:center">
	<td style="color:LightGreen;"><?php echo $iganar; ?></td>
	<td style="color:orange;"><?php echo $iempatar; ?></td>
	<td style="color:red;"><?php echo $iperder; ?></td>
	</tr>
	<tr style="text-align:center">
	<th colspan=3 style="color:lime;">Consecutivos</th>
	<tr style="text-align:center">
	<td style="color:LightGreen;"><?php echo $icongan; ?></td>
	<td style="color:orange;"><?php echo $iconemp; ?></td>
	<td  style="color:red;"><?php echo $iconper; ?></td>
	</tr>
	<tr>
	</tr>
	</table>
	
	<table>
	<tr style="text-align:center">
	<th colspan="4" style="color:white;border-bottom:1px dotted beige;">De los cuales</th>
	</tr>
	<tr style="text-align:center">
	<td></td>
	<td style="color:DeepPink;">Ganados</td>
	<td style="color:DeepPink;">Empatados</td>
	<td style="color:DeepPink;">Perdidos</td>
	</tr>
	<tr style="text-align:center">
	<td style="color:lightblue;">Azul</td>
	<td style="color:lightblue;"><?php echo $iganaraz; ?></td>
	<td style="color:lightblue;"><?php echo $iempataraz; ?></td>
	<td style="color:lightblue;"><?php echo $iperderaz; ?></td>
	</tr>
	<tr style="text-align:center">
	<td style="color:yellow;">Amarillo</td>
	<td style="color:yellow;"><?php echo $iganaram; ?></td>
	<td style="color:yellow;"><?php echo $iempataram; ?></td>
	<td style="color:yellow;"><?php echo $iperderam; ?></td>
	</tr>
	</table>
	
	
	</div>
	<div  id="drcha">
	<h3 style="text-align:center;color:Turquoise;margin:50px 0px 10px 0px;" >Jugadores con los que más he jugado.</h3>
	<table>
	<tr>
	<th style="text-align:center;color:Pink;border-bottom:1px dotted red;">Jugadores</th>
	<th style="text-align:center;color:Pink;border-bottom:1px dotted red;padding:5px;">Nº de veces</th>
	</tr>
	<?php include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT s.nombre, s.apellidos, COUNT( * ) AS contar
									FROM incidencias i
									LEFT JOIN (
												SELECT fecha AS fecharr, color AS colorr, usuario AS usuarior
												FROM incidencias
												WHERE usuario = '".$_SESSION['usu']."'
												ORDER BY fecha DESC
											) AS i1 ON i.fecha = i1.fecharr
									
									LEFT JOIN socio s ON i.usuario = s.usuario
									WHERE i.color = i1.colorr  AND i.usuario <> '".$_SESSION['usu']."' AND i.fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND i.fecha>='".temporadamenor($temporada['fecha'])."/09/01'
									GROUP BY i.usuario
									ORDER BY contar DESC , s.apellidos ASC , s.nombre ASC
									LIMIT 0 , 22" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
		for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
	
	
	?>
	
	
	<tr>
	<td style="color:Beige;text-align:right;"><?php echo $resultado['nombre']." ".substr($resultado['apellidos'],0,3)."."; ?></td>
	<td style="color:Beige;text-align:center;"><?php echo $resultado['contar']; ?></td>
	</tr>
	
	<?php } ?>
	</table>
	
	
	
	
	
	
	</div>
	</div>