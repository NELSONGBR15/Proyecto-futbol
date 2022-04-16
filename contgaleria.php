        <div id="left" class="clearfix">
          <div id="central">
            <h2>Galería</h2>
           
		<p>
		<a href="./images/galeria/1.jpg" rel="lightbox[gal]"><img src="./images/galeria/1_.jpg"/></a>
		<a href="./images/galeria/2.jpg" rel="lightbox[gal]"><img src="./images/galeria/2_.jpg"/></a>
		<a href="./images/galeria/3.jpg" rel="lightbox[gal]"><img src="./images/galeria/3_.jpg"/></a>
		<a href="./images/galeria/4.jpg" rel="lightbox[gal]"><img src="./images/galeria/4_.jpg"/></a>
		<a href="./images/galeria/5.jpg" rel="lightbox[gal]"><img src="./images/galeria/5_.jpg"/></a>
		<a href="./images/galeria/6.jpg" rel="lightbox[gal]"><img src="./images/galeria/6_.jpg"/></a>
		<a href="./images/galeria/7.jpg" rel="lightbox[gal]"><img src="./images/galeria/7_.jpg"/></a>
		<a href="./images/galeria/8.jpg" rel="lightbox[gal]"><img src="./images/galeria/8_.jpg"/></a>
		<a href="./images/galeria/9.jpg" rel="lightbox[gal]"><img src="./images/galeria/9_.jpg"/></a>
		<a href="./images/galeria/10.jpg" rel="lightbox[gal]"><img src="./images/galeria/10_.jpg"/></a>
		<a href="./images/galeria/11.jpg" rel="lightbox[gal]"><img src="./images/galeria/11_.jpg"/></a>
		<a href="./images/galeria/12.jpg" rel="lightbox[gal]"><img src="./images/galeria/12_.jpg"/></a>
		<a href="./images/galeria/13.jpg" rel="lightbox[gal]"><img src="./images/galeria/13_.jpg"/></a>
		<a href="./images/galeria/14.jpg" rel="lightbox[gal]"><img src="./images/galeria/14_.jpg"/></a>
		<a href="./images/galeria/15.jpg" rel="lightbox[gal]"><img src="./images/galeria/15_.jpg"/></a>      
		<a href="./images/galeria/10.jpg" rel="lightbox[gal]"><img src="./images/galeria/1_.jpg"/></a>		
		<a href="./images/galeria/1.jpg" rel="lightbox[gal]"><img src="./images/galeria/1_.jpg"/></a>
		<a href="./images/galeria/2.jpg" rel="lightbox[gal]"><img src="./images/galeria/2_.jpg"/></a>
		<a href="./images/galeria/3.jpg" rel="lightbox[gal]"><img src="./images/galeria/3_.jpg"/></a>
		<a href="./images/galeria/4.jpg" rel="lightbox[gal]"><img src="./images/galeria/4_.jpg"/></a>
		<a href="./images/galeria/5.jpg" rel="lightbox[gal]"><img src="./images/galeria/5_.jpg"/></a>
		<a href="./images/galeria/6.jpg" rel="lightbox[gal]"><img src="./images/galeria/6_.jpg"/></a>
		<a href="./images/galeria/7.jpg" rel="lightbox[gal]"><img src="./images/galeria/7_.jpg"/></a>
		<a href="./images/galeria/8.jpg" rel="lightbox[gal]"><img src="./images/galeria/8_.jpg"/></a>
		<a href="./images/galeria/9.jpg" rel="lightbox[gal]"><img src="./images/galeria/9_.jpg"/></a>
		<a href="./images/galeria/10.jpg" rel="lightbox[gal]"><img src="./images/galeria/10_.jpg"/></a>
		<a href="./images/galeria/11.jpg" rel="lightbox[gal]"><img src="./images/galeria/11_.jpg"/></a>
		<a href="./images/galeria/12.jpg" rel="lightbox[gal]"><img src="./images/galeria/12_.jpg"/></a>
		<a href="./images/galeria/13.jpg" rel="lightbox[gal]"><img src="./images/galeria/13_.jpg"/></a>
		<a href="./images/galeria/14.jpg" rel="lightbox[gal]"><img src="./images/galeria/14_.jpg"/></a>
		<a href="./images/galeria/15.jpg" rel="lightbox[gal]"><img src="./images/galeria/15_.jpg"/></a>      
		<a href="./images/galeria/10.jpg" rel="lightbox[gal]"><img src="./images/galeria/1_.jpg"/></a>
		</p>
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