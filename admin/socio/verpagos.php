<?php 

 function formateomes($fecha)
	{
	$mes=$fecha;
	switch($mes)
		{
		case $mes==1: $mes='Enero';
						break;
		case $mes==2: $mes='Febrero';
						break;
		case $mes==3: $mes='Marzo';
						break;
		case $mes==4: $mes='Abril';
						break;
		case $mes==5: $mes='Mayo';
						break;
		case $mes==6: $mes='Junio';
						break;
		case $mes==7: $mes='Julio';
						break;
		case $mes==8: $mes='Agosto';
						break;
		case $mes==9: $mes='Septiembre';
						break;
		case $mes==10: $mes='Octubre';
						break;
		case $mes==11: $mes='Noviembre';
						break;
		case $mes==12: $mes='Diciembre';

		}
	return($mes);
	}
  
  function formateodia($fecha)
	{
	$dia=substr($fecha,8,2);
	switch($dia)
		{
			case $dia=='01': $dia=1;
							break;
			case $dia=='02': $dia=2;
							break;
			case $dia=='03': $dia=3;
							break;
			case $dia=='04': $dia=4;
							break;
			case $dia=='05': $dia=5;
							break;				
			case $dia=='06': $dia=6;
							break;			
			case $dia=='07': $dia=7;
							break;
			case $dia=='08': $dia=8;
							break;
			case $dia=='09': $dia=9;
							break;
		}
	return($dia);
	}
/*
$_GET['tempmayor'];
$_GET['uskey'];
*/	
		
					/*para saber los meses*/
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT count(*)as nfilasmes, p.mes, p.ano, a.nombre, a.precio, p.pagado
									FROM pagos p
									LEFT JOIN amonestacion a ON p.id_amon = a.id_amon
									WHERE usuario = '".$_GET['uskey']."' AND p.fecha<='".$_GET['tempmayor']."/06/30' AND p.fecha>='".($_GET['tempmayor']-1)."/09/01'
									GROUP BY mes
									ORDER BY fecha DESC" ;
						//echo $instruccion."<br /><br />";
					$consulta1 = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
						$numeromes = mysql_num_rows ($consulta1);
						$consultames = mysql_fetch_array ($consulta1);
					mysql_close($conexion);
					
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT p.fecha, p.mes, p.ano, a.nombre, a.precio, p.pagado
									FROM pagos p
									LEFT JOIN amonestacion a ON p.id_amon = a.id_amon
									WHERE usuario = '".$_GET['uskey']."'
									AND p.ano = (
									SELECT ano
									FROM pagos
									ORDER BY ano DESC
									LIMIT 0 , 1 ) AND fecha<='".$_GET['tempmayor']."/06/30' AND fecha>='".($_GET['tempmayor']-1)."/09/01'
									ORDER BY fecha DESC" ;
					//	echo $instruccion;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
						mysql_close($conexion);
	 ?>
	<table style="margin:auto;">
	<tr>
	<?php ?>
	<th style="border-bottom:2px solid lightblue;color:orange;" colspan="7"><?php echo $consultames['ano']; ?> </th> 
	</tr>
	
	<?php for($i=0;$i<$numeromes;$i++)
	{ ?>
	<tr>

	<th style="width:30px;"></th>
	<th style="border-bottom:2px solid lightblue;color:orange;" colspan="6"><?php echo formateomes($consultames['mes']); ?></th>
	</tr>
	<tr>
	<td></td>
	<td  style="width:20px;"></td>
	<td  style="width:20px;color:Chartreuse;">Día</td>
	<td style="color:Chartreuse;">Concepto</td>
	<td style="color:Chartreuse;">Precio</td>
	<td style="color:Chartreuse;">Pagado</td>
	</tr>
	<?php for ($a=0;$a<$consultames['nfilasmes'];$a++) {
	$resultado = mysql_fetch_array ($consulta);
	?>
	<tr>
	<td></td>
	<td></td>
	<td style="color:PowderBlue"><?php echo formateodia($resultado['fecha']);?></td>
	<td style="color:PowderBlue"><?php echo $resultado['nombre'];?></td>
	<td style="color:PowderBlue"><?php echo $resultado['precio'];?> €</td>
	<td style="color:PowderBlue"><?php
	if ($resultado['pagado']=='s')
				{ echo "<img src='../../images/socio/checkok.png' />"; }   else { echo "<img src='../../images/socio/checkx.png' />"; }
	
	?></td>
	</tr>
	<?php 
							}
	$consultames = mysql_fetch_array ($consulta1);				
	}
	?>
	</table>