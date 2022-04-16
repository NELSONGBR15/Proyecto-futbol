<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Peña deportiva amigos del cerro</title>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="js/coda-slider.1.1.1.pack.js"></script>
<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 7 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
		
		function cargar(div, desde)
{
     $(div).load(desde);
}
	
	</script>
</head>
<body>
<div id="topimg">
  <div id="maincontent">
    <div id="header" class="clearfix">
     <div id="Logo">
        <h1></h1>
      </div>
      <div id="selSubHeader" class="clsFloatRight">
	  <div id="identificacion">
	  <form action="./socio/partidos/partidos.php" method="post">
	  <table>
	  <span>Identifícate</span>
	  <tr>
	  <td><label for="us">Usuario</label></td>
	  <td><input name="us" name="us" type="text"/></td>
	  
	  </tr>
	  <tr>
	  <td><label for="pas">Contraseña</label></td>
	  <td><input name="pas" name="pas" type="password" /></td>
	  </tr>
	  <tr>
	  <td><input type="submit" value="entrar" /></td>
	  <td><input type="reset" value="borrar"/></td>
	  </tr>
	  </table>
	  </form>
	  </div>
        <ul class="clsClearFixSub">
          <li class="clsActive"><a onclick="cargar('#cbox', './contindex.php')">Inicio</a></li>
          <li><a onclick="cargar('#cbox', './contquienes_somos.php')">Quienes somos</a></li>
          <li><a onclick="cargar('#cbox', './contgaleria.php')">Galería</a></li>
          <li><a onclick="cargar('#cbox', './contestatutos.php')">Estatutos</a></li>
        </ul>
      </div>
    </div>
    <div id="content">
      <div class="bnr_bg">
        <div id="banner">
          <div id="page-wrap">
            <div class="slider-wrap">
              <div id="main-photo-slider" class="csw">
                <div class="panelContainer">
                  <div class="panel" title="Panel 1">
                    <div class="wrapper"> <img src="images/bnr_img1.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 1</a><br />
                        <span>Comentario de pie de foto 1</span> </div>
                    </div>
                  </div>
                  <div class="panel" title="Panel 2">
                    <div class="wrapper"> <img src="images/bnr_img2.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 2</a><br />
                        <span>Comentario de pie de foto 2.</span> </div>
                    </div>
                  </div>
                  <div class="panel" title="Panel 3">
                    <div class="wrapper"> <img src="images/bnr_img3.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 3</a><br />
                        <span>Comentario de pie de foto 3.</span> </div>
                    </div>
                  </div>
                  <div class="panel" title="Panel 4">
                    <div class="wrapper"> <img src="images/bnr_img4.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 4</a><br />
                        <span>Comentario de pie de foto 4.</span> </div>
                    </div>
                  </div>
                  <div class="panel" title="Panel 5">
                    <div class="wrapper"> <img src="images/bnr_img5.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 5</a><br />
                        <span>Comentario de pie de foto 5.</span> </div>
                    </div>
                  </div>
                  <div class="panel" title="Panel 6">
                    <div class="wrapper"> <img src="images/bnr_img6.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 6</a><br />
                        <span>Comentario de pie de foto 6.</span> </div>
                    </div>
                  </div>
                 <div class="panel" title="Panel 7">
                    <div class="wrapper"> <img src="images/bnr_img7.jpg" alt="temp" />
                      <div class="photo-meta-data"><a href="#">Título foto 7</a><br />
                        <span>Comentario de pie de foto 7.</span> </div>
                    </div>
					
                  </div>
                </div>
              </div>
              <a href="#1" class="cross-link active-thumb"><img src="images/bnr_thumb1.jpg" class="nav-thumb" alt="temp-thumb" /></a>
              <div id="movers-row">
                <div><a href="#2" class="cross-link"><img src="images/bnr_thumb2.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
                <div><a href="#3" class="cross-link"><img src="images/bnr_thumb3.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
                <div><a href="#4" class="cross-link"><img src="images/bnr_thumb4.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
                <div><a href="#5" class="cross-link"><img src="images/bnr_thumb5.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
                <div><a href="#6" class="cross-link"><img src="images/bnr_thumb6.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
                <div><a href="#7" class="cross-link"><img src="images/bnr_thumb7.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			  
			  </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cbox">
        <div id="left" class="clearfix">
          <div id="news">
            <h2>Noticia ampliada</h2>
			<div>
			<?php
					include ('./php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT titulo, contenido, fecha
									FROM noticias
									WHERE tipo = 'p' AND id=".$_GET['noticia'];
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);					
					if ($nfilas==0)
						{
						echo "<h2 style='color:red;'>La noticia a la que intentas acceder no está disponible</h2>";
						}
					
					else {
						for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										$dia=substr($resultado['fecha'],8,2);
										$mes=substr($resultado['fecha'],5,2);
										$ano=substr($resultado['fecha'],0,4);
										$fecha=$dia."-".$mes."-".$ano;
										echo "
										<div class='rc_bx'>
										<h1 style='text-align:center;color:blue;'>".$resultado['titulo']."</h1>
										<p class='fechanoticias'>".$fecha."</p>
										
										<div class='dotlineC'></div>
										<p>".$resultado['contenido']."</p>
										<div class='dotlineC'></div>
										</div>
										";
										
										}
					
						}
					
					mysql_close ($conexion);
					?>
		</div>

          </div>
          

        </div>
		
		
        <div id="right" class="clsFloatRight">
          <div class="right_header">
            <h2>Últimas noticias</h2>
            <div class="rc_list">
              <div class="rc_bx">
                <?php
					include ('./php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT id,titulo, contenido, fecha
									FROM noticias
									WHERE tipo = 'p'
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
										<div  class='readmore clsFloatRight'> <a class='clsFloatRight' href='./noticias.php?noticia=".$resultado['id']."'>Leer más...</a> </div>
										<div class='dotlineC'></div>
										</div>
										";
										
										}
					echo "<div><p style='text-decoration:underline;text-align:right;'><a href='./noticias1.php'>todas las noticias</a></p></div>";
					mysql_close ($conexion);
					?>
              </div>
              
            </div>

          </div>
		  
		  <div class="right_header">
            <h2>Clasificación</h2>
            <div class="time_box">
				<span>Goleadores</span>
				<ul>
					<li><p><a class="Num" style="font-weight:bold;">Pos.</a><a class="name" style="font-weight:bold;text-align:center;">Jugador</a><a  class="date" style="font-weight:bold;">Goles</a></p></li>
					<?php
					include ('./php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT s.nombre, s.apellidos, SUM( i.golaz + i.golam ) AS goles_marcados
									FROM incidencias i
									LEFT JOIN socio s ON i.usuario = s.usuario
									WHERE golaz >0
									OR golam >0
									GROUP BY i.usuario
									ORDER BY goles_marcados DESC
									LIMIT 0 , 5" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
					
					
					
					for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										if ($i+1==$nfilas) {
												echo "<li class='clsNoBorder'><p><a class='Num'>".($i+1).".</a><a class='name' >".$resultado['nombre']." ".substr($resultado['apellidos'], 0, 3).".</a><a  class='date' >".$resultado['goles_marcados']."</a></p></li>\n";
												}
										else {
											echo "<li><p><a class='Num'>".($i+1).".</a><a class='name' >".$resultado['nombre']." ".substr($resultado['apellidos'], 0, 3).".</a><a  class='date' >".$resultado['goles_marcados']."</a></p></li>\n";
											}
										
										}
					
					
					
					mysql_close ($conexion);
					?>
																			
				</ul>
				<span>Partidos</span>
				<ul>
				<li><p><a class="res" style="font-weight:bold;">Resultado</a><a class="equipo" style="font-weight:bold;text-align:center;">Equipo</a><a  class="date" style="font-weight:bold;">Fecha</a></p></li>
				<?php
					include ('./php/conexion.php');
					include ('./php/funciones.php');
					$instruccion = "SELECT tgolam, tgolaz,
									local , visitante, fecha
									FROM partido
									ORDER BY fecha DESC
									LIMIT 0 , 5" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
					
					for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										if ($resultado['local']=='am')
										{
										if ($i+1==$nfilas) {
												echo "<li class='clsNoBorder'><p><a class='res'>".$resultado['tgolam']." - ".$resultado['tgolaz']."</a><a class='equipo'>".cambiacolor($resultado['local'])." - ".cambiacolor($resultado['visitante'])."</a><a class='fecha' >".formateodia($resultado['fecha'])." de ".formateomes($resultado['fecha'])."</a></p></li>";
												}
										else {
											echo "<li><p><a class='res'>".$resultado['tgolam']." - ".$resultado['tgolaz']."</a><a class='equipo'>".cambiacolor($resultado['local'])." - ".cambiacolor($resultado['visitante'])."</a><a class='fecha' >".formateodia($resultado['fecha'])." de ".formateomes($resultado['fecha'])."</a></p></li>";
											}
										}
										
										else {
											if ($i+1==$nfilas) {
												echo "<li class='clsNoBorder'><p><a class='res'>".$resultado['tgolaz']." - ".$resultado['tgolam']."</a><a class='equipo'>".cambiacolor($resultado['local'])." - ".cambiacolor($resultado['visitante'])."</a><a class='fecha' >".formateodia($resultado['fecha'])." de ".formateomes($resultado['fecha'])."</a></p></li>";
												}
											else {
											echo "<li><p><a class='res'>".$resultado['tgolaz']." - ".$resultado['tgolam']."</a><a class='equipo'>".cambiacolor($resultado['local'])." - ".cambiacolor($resultado['visitante'])."</a><a class='fecha' >".formateodia($resultado['fecha'])." de ".formateomes($resultado['fecha'])."</a></p></li>";
											}

											}

										}
					mysql_close ($conexion);
					?>																				
				</ul>		
            </div>
          </div> 
        </div>
        <div class="clearboth"></div>
      </div>
    </div>
		  <div class="shadow">
	  </div>
    <div id="footer"> 
	<div class="txtf">
	 <!-- Google ads-->
  <script type="text/javascript">
  <!-- 
  google_ad_client = "pub-6176951568527348"; /* 728x90, created 10/12/10 */ 
  google_ad_slot = "5359831295"; google_ad_width = 728; google_ad_height = 90; 
  //-->
   </script> <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> </script>
<!-- Google ads-->

		<p>Copyright@2012 Peña deportiva amigos del cerro. Todos los derechos reservados<br/>
		Diseñado por: <a href="http://es.linkedin.com/pub/antonio-moles-leiva/3a/70/970"><span> Antonio Moles Desings </span></a>| Valid<a href="http://validator.w3.org/check/referer"><span> XHTML </span></a> | Valid <a href="http://jigsaw.w3.org/css-validator/check/referer"><span> CSS </span></a></p>
		
		
	</div>
	</div>
  </div>
</div>
</body>
</html>
