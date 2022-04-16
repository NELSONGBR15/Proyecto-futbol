<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../../css/socio.css" rel="stylesheet" type="text/css"/>


</head>
<body>
<div id="topimg">
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
  
		if (isset($_SESSION['usu'])&&isset($_SESSION['pas'])) {
				
		
		
		
		
	?>
  <div id="maincontent">
    <div id="header" class="clearfix">
     <div id="Logo">
        <h1></h1>
      </div>
      <div id="selSubHeader" class="clsFloatRight">
	<div id="identificacion">
	  <a href="../../index.php?desconectar=1" >Desconectar</a>
	  </div>
        <ul class="clsClearFixSub">
          <li><a href="../partidos/partidos.php"><img src="../../images/socio/1.png"/>Partidos</a></li>
          <li><a href="../goles/goles.php"><img src="../../images/socio/2.png"/>Goles</a></li>
          <li><a href="../asistencia/asistencia.php"><img src="../../images/socio/3.png"/>Asistencia</a></li>
          <li><a href="../tarjetas/tarjetas.php"><img src="../../images/socio/4.png"/>Tarjetas</a></li>
          <li class="clsActive"><a href="./pagos.php"><img src="../../images/socio/5.png"/>Pagos</a></li>
		  <li><a href="../mensajes/mensajes.php"><img src="../../images/socio/6.png"/>Mensajes</a></li>
		</ul>
      </div>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	 
	<ul class="goles" style="display:none">
	<p></p>
	<li><a href="">ver pagos</a></li>
	</ul>
	</div>	 
	
	<div id="resultado">
	<div id="right" class="cajanoticias">
          <div class="right_header">
            <h2>Últimas noticias</h2>
            <div class="rc_list">
              <div class="rc_bx">
                <?php
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT id,titulo, contenido, fecha
									FROM noticias
									ORDER BY fecha DESC
									LIMIT 0 , 3" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
										
					for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										$dia=substr($resultado['fecha'],8,2);
										$mes=substr($resultado['fecha'],5,2);
										$ano=substr($resultado['fecha'],0,4);
										$fecha=$dia."-".$mes."-".$ano;
										echo "
										<div class='rc_bx'>
										<h3>".$resultado['titulo']."</h3><p class='fechanoticias'>".$fecha."</p>
										<p>".substr($resultado['contenido'], 0, 200)."...</p>
										<div  class='readmore clsFloatRight'> <a class='clsFloatRight' href='../leernoticia.php?noticia=".$resultado['id']."'>Leer más...</a> </div>
										<div class='dotlineC'></div>
										</div>
										";
										
										}
					echo "<div><p style='text-decoration:underline;text-align:right;'><a href='../paginadornoticias/leernoticias.php'>todas las noticias</a></p></div>";
					mysql_close ($conexion);
					?>
              </div>
              
            </div>
          </div>
        </div>
	<div id="left">
	<div style="border:1px solid white;margin:auto;margin-top:30px;width:400px;border-radius:25px;">
	
	<!-- 
	SELECT p.mes, p.ano, a.nombre, a.precio, p.pagado
	FROM pagos p
	LEFT JOIN amonestacion a ON p.id_amon = a.id_amon
	WHERE usuario = '".$_SESSION['usu']."' AND p.ano = (SELECT ano FROM pagos ORDER BY ano DESC LIMIT 0 , 1 )
	ORDER BY fecha
	-->
	<style>
	tr td {padding:5px;text-align:center;}
	</style>
	<?php 
	
	include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);		
		
					/*para saber los meses*/
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT count(*)as nfilasmes, p.mes, p.ano, a.nombre, a.precio, p.pagado
									FROM pagos p
									LEFT JOIN amonestacion a ON p.id_amon = a.id_amon
									WHERE usuario = '".$_SESSION['usu']."' AND p.ano = (SELECT ano FROM pagos ORDER BY ano DESC LIMIT 0 , 1 )
									AND fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
									GROUP BY mes
									ORDER BY fecha DESC" ;
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
									WHERE usuario = '".$_SESSION['usu']."'
									AND p.ano = (
									SELECT ano
									FROM pagos
									ORDER BY ano DESC
									LIMIT 0 , 1 ) AND fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
									ORDER BY fecha DESC" ;
						//echo $instruccion;
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
	</div>
	
	</div>
	</div>
	  
	  
	  
	  
	  
    </div>
	
	
	<?php 
	} 
	
	else  {
	?>
	
	<div id="resultado" style="margin:auto;width:400px;height:150px;margin-top:200px;">
		<p style="text-align:center;color:red;">Usuario y/o contraseña erróneos</p>
		<p style="text-align:center;"><a href="../../index.php">volver</a></p>
	</div>
	
	
	<?php
			}
	
	?>
	
	
    <div id="footer"> 
	<div class="txtf">


		<p>Copyright@2012 Peña deportiva amigos del cerro. Todos los derechos reservados<br/>
		Diseñado por: <a href="http://es.linkedin.com/pub/antonio-moles-leiva/3a/70/970"><span> Antonio Moles Desings </span></a>| Valid<a href="http://validator.w3.org/check/referer"><span> XHTML </span></a> | Valid <a href="http://jigsaw.w3.org/css-validator/check/referer"><span> CSS </span></a></p>
		
		
	</div>
	</div>
  </div>*/
</div>
</body>
</html>
