<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../../css/socio.css" rel="stylesheet" type="text/css"/>
<link href="./css/partidos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="./ajax.js"></script>
<script type="text/javascript">
function cargar(div, desde)
{
	
	document.getElementById('con').innerHTML= '<img src="../../images/loading.gif" style="margin-left:270px;padding-top:200px;">';
     $(div).load(desde);
	 
}
</script>

</head>
<body>
<div id="topimg">
  <?php 
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
          <li class="clsActive"><a href="./partidos.php"><img src="../../images/socio/1.png"/>Partidos</a></li>
          <li><a href="../goles/goles.php"><img src="../../images/socio/2.png"/>Goles</a></li>
          <li><a href="../asistencia/asistencia.php"><img src="../../images/socio/3.png"/>Asistencia</a></li>
          <li><a href="../tarjetas/tarjetas.php"><img src="../../images/socio/4.png"/>Tarjetas</a></li>
          <li><a href="../pagos/pagos.php"><img src="../../images/socio/5.png"/>Pagos</a></li>
		  <li><a href="../mensajes/mensajes.php"><img src="../../images/socio/6.png"/>Mensajes</a></li>
		</ul>
      </div>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	 
	<ul class="partidos">
	<p></p>
	<li><a style="cursor:pointer;" onclick="cargar('#con', './ultimopartido.php')">Último partido</a></li>
	<li><a style="cursor:pointer;" href="./porfecha.php">Partidos por fecha</a></li>
	<li><a style="cursor:pointer;" href="./todospartidos.php">Todos los partidos</a></li>
	<li><a style="cursor:pointer;" onclick="cargar('#con', './estadisticas.php')">Estadísticas</a></li>
	<li><a style="cursor:pointer;" onclick="cargar('#con', './puntos.php')">Puntos</a></li>
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
	<div id="con">

	
	
	
	
	
	
	<div id="left">
	<div id="izqda" style="width:203px;height:50px;margin-left:200px;margin-top:9px;margin-bottom:25px;">
	<p>Selecciona</p>
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
		$instruccion = "SELECT fecha
						FROM partido WHERE fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
						ORDER BY fecha DESC" ;
		$consulta = mysql_query ($instruccion, $conexion);

		// Voy imprimiendo el primer select compuesto por los paises
		echo "<form name='f1' style='margin-left:55px;margin-top:10px;'>";
		echo "<select name='activo' id='activo' onChange='cargacontenido()'>";
		echo "<option value='0'>Elige</option>";
		while($registro=mysql_fetch_row($consulta))
		{
		//YYYY-MM-DD
		$dia=substr($registro[0],8,2);
		$mes=substr($registro[0],5,2);
		$ano=substr($registro[0],0,4);
		echo "<option value='".$registro[0]."'>".$dia."/".$mes."/".$ano."</option>";
		}
		echo "</select>";
?>
	</div>

	<div  id="drchaporfecha">
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
	mysql_close ($conexion);
			}
	
	?>
	
	
    <div id="footer"> 
	<div class="txtf">


		<p>Copyright@2012 Peña deportiva amigos del cerro. Todos los derechos reservados<br/>
		Diseñado por: <a href="http://es.linkedin.com/pub/antonio-moles-leiva/3a/70/970"><span> Antonio Moles Desings </span></a>| Valid<a href="http://validator.w3.org/check/referer"><span> XHTML </span></a> | Valid <a href="http://jigsaw.w3.org/css-validator/check/referer"><span> CSS </span></a></p>
		
		
	</div>
	</div>
  </div>
</div>
</body>
</html>
