

        <div id="left" class="clearfix">

		  <div id="central" >
		  <h2>Quienes somos</h2>
		  
		  <img style="float:right;margin:10px;" src="./images/news_img1.jpg" /><p style="margin-top:20px;">Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.</p>  
		  <img style="float:left;margin:10px;" src="./images/news_img2.jpg" /><p>Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más. Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.</p>
	
		  </div>
          <div id="events">
            <h2>Nuestro bar</h2>
            <div class="e_list">
              <div class="e_box"> <a href="#"><img src="images/ev_img1.jpg" width="121" height="78" alt="ev_img1"/></a>
                <h3>Podrás encontrarlo abierto:</h3>
                <ul>
				<li>Martes de 12:00 H - 15:00 H</li>
				<li>Jueves de 19:00 H - 21:00 H</li>
				<li>Viernes de 21:00 H - 00:00 H</li>
				</ul>
				<span style="color:red;font-weight:bold;">Sólo para socios.</span>
				<p style="margin-top:10px;border-radius:10px;"><iframe width="300" height="275" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/?ie=UTF8&amp;t=h&amp;layer=c&amp;cbll=37.204597,-3.627416&amp;panoid=1WPNN-SOgjx8ufAXQh8Xtg&amp;cbp=13,250.46,,0,0&amp;source=embed&amp;ll=37.204431,-3.627417&amp;spn=0.000587,0.000805&amp;z=19&amp;output=svembed"></iframe><br /><small><a href="http://maps.google.es/?ie=UTF8&amp;t=h&amp;layer=c&amp;cbll=37.204597,-3.627416&amp;panoid=1WPNN-SOgjx8ufAXQh8Xtg&amp;cbp=13,250.46,,0,0&amp;source=embed&amp;ll=37.204431,-3.627417&amp;spn=0.000587,0.000805&amp;z=19" style="color:#0000FF;text-align:left;">Ver mapa más grande</a></small></p>
              </div>
              
            </div>
          </div>
          <div id="comp">
            <h2>Contacta</h2>
            <div>
			
              <form action="" method="post">
			  <table>
			  <tr>
			  <td>E-mail</td>
			  <td><input type="text" size="30"/></td>
			  </tr>
			  <tr>
			  <td>Asunto</td>
			  <td><input type="text" size="30"/></td>
			  </tr>
			  <tr>
			  </tr>
			  <td>Mensaje</td>
			  <td><textarea class="texto" rows="10" cols="31" style="resize:vertical;" ></textarea></td>
			  <tr>
			  <td colspan="2">
			 <p style="text-align:center;"><input type="submit" value="enviar"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="borrar" /></p>
			  </td>
			  </tr>
			  </table>
			  </form>
			  <p style="text-align:justify;margin:5px;">Si tienes alguna consulta, no dudes en escribirnos, tan pronto como nos sea posible atenderemos su pregunta.</p>
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
 