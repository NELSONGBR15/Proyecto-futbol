<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../../css/socio.css" rel="stylesheet" type="text/css"/>
<link href="./css/partidos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
function cargar(div, desde)
{
	
	document.getElementById('con').innerHTML= '<img src="../../images/loading.gif" style="margin-left:270px;padding-top:200px;">';
     $(div).load(desde);
	 
}
function showLightbox(x,y) {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
	divContenido=document.getElementById('over');
	 ajax=objetoAjax();
ajax.open("GET", "./cambiarcontrasena.php?uskey="+x+"&pass="+y);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divContenido.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)

}
function hideLightbox() {
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}
function cambiar(x)
{
y=document.getElementById('contrasenanueva').value;
if(comprobarcontrasena(y))
	{
	window.open('./nuevaventana.php?uskey='+x+'&contrasena='+y,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
	;window.location.reload( true );
	}
else 
	{
	alert("Contraseña nueva errónea, introduce caracteres de la 'a' a la 'z' en minuscula y/o del 0 al 9");

	}
 }
function comprobarcontrasena(q) {

var cadena=["n","d","s","7","g","h","k","a","2","ñ","p","u","0","c","3","w","e","5","f","m","y","v","9","o","b","6","l","j","q","8","r","i","1","t","x","4"];
if (q.length==0) {return(false);}
for(i=0;i<q.length;i++)
	{
	pos=cadena.indexOf(q[i]);
	if(pos===-1)
		{
		return(false)
		}
	}
return(true);

}

</script>
</head>
<body>
<div id="topimg">
  <?php
		include ('../../php/conexion.php');
		if (isset($_POST['us'])&&isset($_POST['pas'])) /*para la primera vez que se manda el usuario y la contraseña*/
		{
		$socio=$_POST['us']; 
		$contrasena=$_POST['pas'];
		
		
		$instruccion = "select * from socio WHERE usuario='".$socio."' AND contrasena='".$contrasena."'" ;
		
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
				$nfilas = mysql_num_rows ($consulta);
		if ($nfilas>0) {
				$_SESSION['usu']=$socio;
				$_SESSION['pas']=$contrasena;
		}
		
		}
		if (isset($_SESSION['usu'])&&isset($_SESSION['pas'])) {
				
				/*$_SESSION['usu']=$socio;
				$_SESSION['pas']=$contrasena;*/
		
		
		
	?>
	<style>
			.fadebox {
font-family: "Trebuchet MS", Tahoma, Verdana;
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
.overbox {
font-family: "Trebuchet MS", Tahoma, Verdana;
	display: none;
	position: fixed;
	top: 30%;
	left: 30%;
	width: 400px;
	height: 50%;
	z-index:1002;
	overflow: auto;
}
#content {
font-family: "Trebuchet MS", Tahoma, Verdana;
	background: #2E2E2E;
	border: solid 3px #CCCCCC;
	padding: 10px;
}
</style>
	</style>
	<div id="over" class="overbox">
</div>
  <div id="maincontent">
    <div id="header" class="clearfix">
     <div id="Logo">
        <h1></h1>
      </div>
      <div id="selSubHeader" class="clsFloatRight">
	<div id="identificacion">
	  <a href="../../index.php?desconectar=1" >Desconectar</a>
	  <hr />
	  <a href="#" onclick="showLightbox('<?php echo $_SESSION['usu'] ?>','<?php echo $_SESSION['pas'] ?>')">Cambiar contraseña</a>
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
	
	<div id="fade" class="fadebox">&nbsp;</div>	
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
