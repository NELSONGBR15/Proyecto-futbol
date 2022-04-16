<div class="indexx">
<script type="text/javascript" src="./ajax/paginadornoticias/paginador.js"></script>
        <div id="left" class="clearfix">
          <div id="news">
            <h2>Bienvenido a nuestra página web</h2>
            <div id="news_l"> <a href="#"><img src="images/news_img1.jpg" width="307" height="200" alt="newsimg1" /></a>
              <div class="txt">
                <h3>Título de contenido 1 </h3>
                <p>Párrafo de noticia contenido 1 de lo que vas a escribir aquí va a ser información corta acerca de la noticia, como 280 caracteres. </p>
              </div>
              <div  class="readmore clsFloatRight"> <a class="clsFloatRight" href="#">Leer más...</a> </div>
            </div>
            <div id="news_r"> <a href="#"><img src="images/news_img2.jpg" width="307" height="200" alt="newsimg1" /></a>
              <div class="txt">
                <h3>Título de contenido 2</h3>
                <p>Párrafo de noticia contenido 2 de lo que vas a escribir aquí va a ser información corta acerca de la noticia, como 280 caracteres. </p>
              </div>
              <div  class="readmore clsFloatRight"> <a class="clsFloatRight" href="#">Leer más...</a> </div>
            </div>
          </div>
		  <div id="central" >
		  <h2>Próximo partido</h2>
		  
		  <h1 style="color:red;text-align:center;margin:30px;"> Domingo, 13 de abril de 2012</h1>
		  <h1 style="color:red;text-align:center;margin:30px;"> 11:00 H</h1>
		  <h3 style="font-weight:bold;text-align:center;margin:30px;font-size:14px;">¡No te lo puedes perder!</h3>
		  
		  <p style="text-align:center;"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/?ie=UTF8&amp;ll=37.21026,-3.629139&amp;spn=0.001576,0.002411&amp;t=h&amp;z=19&amp;output=embed"></iframe><br /><small><a href="http://maps.google.es/?ie=UTF8&amp;ll=37.21026,-3.629139&amp;spn=0.001576,0.002411&amp;t=h&amp;z=19&amp;source=embed" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small></p>
		  		  
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
										</div>";
										
										}
						echo "<div><p style='text-decoration:underline;text-align:right;'><a href='./noticias1.php'>todas las noticias</a></p></div>";
					mysql_close ($conexion);
					?>
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
