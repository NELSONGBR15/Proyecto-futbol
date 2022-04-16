<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
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
	  <form action="#" method="post">
	  <table>
	  <span>Identifícate</span>
	  <tr>
	  <td><label for="us">Usuario</label></td>
	  <td><input name="us" type="text"/></td>
	  
	  </tr>
	  <tr>
	  <td><label for="pas">Contraseña</label></td>
	  <td><input name="pas" type="password" /></td>
	  </tr>
	  <tr>
	  <td><input name="pas" type="submit" value="entrar" /></td>
	  <td><input name="pas" type="reset" value="borrar"/></td>
	  </tr>
	  </table>
	  </form>
	  </div>
        <ul class="clsClearFixSub">
          <li class="clsActive"><a href="#">Inicio</a></li>
          <li><a href="#">Quienes somos</a></li>
          <li><a href="#">Galería</a></li>
          <li><a href="#">Estatutos</a></li>
          <li><a href="#">Partidos</a></li>
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
            <h2>Contenido</h2>
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
          <div id="events">
            <h2>Top Events</h2>
            <div class="e_list">
              <div class="e_box"> <a href="#"><img src="images/ev_img1.jpg" width="121" height="78" alt="ev_img1"/></a>
                <h3>July 18, 2010 <br/>
                  Lorem ipsum dolor sit amet</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit eaque voluptatem accusantium.</p>
              </div>
              <div class="dotlineE"></div>
              <div class="e_box"> <a href="#"><img src="images/ev_img2.jpg" width="121" height="78" alt="ev_img2"/></a>
                <h3>July 18, 2010 <br/>
                  Lorem ipsum dolor sit amet</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit eaque voluptatem accusantium.</p>
              </div>
              <div class="dotlineE"></div>
              <div class="e_box"> <a href="#"><img src="images/ev_img3.jpg" width="121" height="78" alt="ev_img3"/></a>
                <h3>July 18, 2010 <br/>
                  Lorem ipsum dolor sit amet</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit eaque voluptatem accusantium.</p>
              </div>
            </div>
            <div class="btn clsFloatRight">
              <p><a href="#">Read more</a></p>
            </div>
          </div>
          <div id="comp">
            <h2>Competition Masters</h2>
            <div class="comp_list">
              <div class="c_box">
                <div class="flagbulletin"></div>
                <h3>July 18, 2010</h3>
                <p>Lorem ipsum dolor sit amet consectetur </p>
              </div>
              <div class="dotlineC"></div>
              <div class="c_box">
                <div class="flagbulletin"></div>
                <h3>July 18, 2010</h3>
                <p>Lorem ipsum dolor sit amet consectetur </p>
              </div>
              <div class="dotlineC"></div>
              <div class="c_box">
                <div class="flagbulletin"></div>
                <h3>July 18, 2010</h3>
                <p>Lorem ipsum dolor sit amet consectetur </p>
              </div>
              <div class="dotlineC"></div>
              <div class="c_box">
                <div class="flagbulletin"></div>
                <h3>July 18, 2010</h3>
                <p>Lorem ipsum dolor sit amet consectetur </p>
              </div>
              <div class="dotlineC"></div>
              <div class="c_box">
                <div class="flagbulletin"></div>
                <h3>July 18, 2010</h3>
                <p>Lorem ipsum dolor sit amet consectetur </p>
              </div>
            </div>
            <div class="btn clsFloatRight">
              <p><a href="#">&nbsp;&nbsp;All news</a></p>
            </div>
          </div>

        </div>
		
		
        <div id="right" class="clsFloatRight">
          <div class="right_header">
            <h2>Últimas noticias</h2>
            <div class="rc_list">
              <div class="rc_bx">
                <h3>Título de noticia 1 </h3>
                <p>Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.</p>
                <div  class="readmore clsFloatRight"> <a class="clsFloatRight" href="#">Leer más...</a> </div>
				<div class="dotlineC"></div>
              </div>
              <div class="rc_bx">
                <h3>Título de noticia 2 </h3>
                <p>SComentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.</p>
				  <div  class="readmore clsFloatRight"> <a class="clsFloatRight" href="#">Leer más...</a> </div>
                <div class="dotlineC"></div>
              </div>
              <div class="rc_bx">
                <h3>Título de noticia 3 </h3>
                <p>Comentario acerca de la noticia del título, aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.  aqui puedes escribir un cierto limitado número de caracteres, se ampliará en leer más.</p>
				  <div  class="readmore clsFloatRight"> <a class="clsFloatRight" href="#">Leer más...</a> </div>
              </div>
            </div>
            <!-- <div class="readmore_r clsFloatRight"><a href="#">read more</a> </div> -->
          </div>
		  
		  <div class="right_header">
            <h2>Clasificación</h2>
            <div class="time_box">
				<span>Goleadores</span>
				<ul>
					<li><p><a class="Num" style="font-weight:bold;">Pos.</a><a class="name" style="font-weight:bold;text-align:center;">Jugador</a><a  class="date" style="font-weight:bold;">Goles</a></p></li>
					<li><p><a class="Num">1.</a><a class="name" >Nombre compuesto apellido 1</a><a  class="date" >10</a></p></li>
					<li><p><a class="Num" >2.</a><a class="name" >Nombre compuesto apellido 2</a><a  class="date" >20</a></p></li>
					<li><p><a class="Num" >3.</a><a class="name" >Nombre compuesto apellido 3</a><a  class="date" >30</a></p></li>
					<li><p><a class="Num" >4.</a><a class="name" >Nombre compuesto apellido 4</a><a  class="date" >40</a></p></li>
					<li class="clsNoBorder"><p><a class="Num" >5.</a><a class="name" >Nombre compuesto apellido 5</a><a  class="date" >50</a></p></li>																				
				</ul>
				<span>Partidos</span>
				<ul>
					<li><p><a class="res" style="font-weight:bold;">Resultado</a><a class="equipo" style="font-weight:bold;text-align:center;">Equipo</a><a  class="date" style="font-weight:bold;">Fecha</a></p></li>
					<li><p><a class="res">5 - 1</a><a class="equipo" >Amarillo - Azul</a><a  class="fecha" >1 de Enero</a></p></li>
					<li><p><a class="res" >3 - 2</a><a class="equipo" >Azul - Amarillo</a><a  class="fecha" >3 de Julio</a></p></li>
					<li><p><a class="res" > 2 - 1 </a><a class="equipo" >Amarillo - Azul</a><a  class="fecha" >15 de Octubre</a></p></li>
					<li><p><a class="res" >7 - 8</a><a class="equipo" >Amarillo - Azul</a><a  class="fecha" >25 de Diciembre</a></p></li>
					<li class="clsNoBorder"><p><a class="res" > 4 - 3 </a><a class="equipo" >Azul - Amarillo</a><a  class="fecha" > 3 de Marzo</a></p></li>																				
				</ul>		
            </div>
            <div class="readmore_r clsFloatRight"><a href="#">ver todos los partidos</a> </div>
          </div> 
        </div>
        <div class="clearboth"></div>
      </div>
	  <div class="shadow">
	  </div>
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
