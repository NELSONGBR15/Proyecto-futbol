<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Peña deportiva amigos del cerro</title>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<link href="css/lightbox.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./js/lightbox.js"></script>
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
	
	document.getElementById('cbox').innerHTML= '<img src="./images/loading.gif" style="margin-left:500px;padding-top:100px;">';
     $(div).load(desde);
	 
}
	
	</script>
	
</head>
<body>
<?php if(isset($_GET['desconectar']))
		{
		session_destroy();
		}
		?>
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
	  <td><input id="us" name="us" type="text"/></td>
	  
	  </tr>
	  <tr>
	  <td><label for="pas">Contraseña</label></td>
	  <td><input id="pas" name="pas" type="password" /></td>
	  </tr>
	  <tr>
	  <td><input type="submit" value="entrar" /></td>
	  <td><input type="reset" value="borrar"/></td>
	  </tr>
	  </table>
	  </form>
	  </div >
        <ul class="clsClearFixSub" id="prueba">
          <li class="clsActive"><a onclick="cargar('#cbox', './contindex.php')" style="cursor:pointer;">Inicio</a></li>
          <li><a onclick="cargar('#cbox', './contquienes_somos.php')" style="cursor:pointer;">Quienes somos</a></li>
          <li><a onclick="cargar('#cbox', './contgaleria.php')" style="cursor:pointer;">Galería</a></li>
          <li><a onclick="cargar('#cbox', './contestatutos.php')" style="cursor:pointer;">Estatutos</a></li>
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
     <?php include('./contindex.php')?>
	</div>
	 <div class="shadow">
	  </div>
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
