<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css"/>
<link href="./css/partidos.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
function cargar(div, desde)
{
	
	document.getElementById('con').innerHTML= '<img src="../../images/loading.gif" style="margin-left:270px;padding-top:200px;">';
     $(div).load(desde);
	 
}
</script>
</head>
<body>
	<style>

	ul ul {
			display:none;
			position:absolute;
			left:380px;
			top:157px;
			height:40px;
		}
	ul li:hover ul{
					display:block;
				}
	
	</style>

<div id="topimg">
  <?php
		include ('../php/conexion.php');
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
				$_SESSION['pas']=1;
		}
		
		}
		if (isset($_SESSION['usu'])&&isset($_SESSION['pas'])) {
				
				/*$_SESSION['usu']=$socio;*/
				$_SESSION['pas']=1;
		
		
		
	?>
  <div id="maincontent">
    <div id="header" class="clearfix">
     <div id="Logo">
        <h1></h1>
      </div>
      <div id="selSubHeader" class="clsFloatRight">
	<div id="identificacion">
	  <a href="../index.php?desconectar=1" >Desconectar</a>
	  </div>
        <ul class="clsClearFixSub">
          <li><a style="cursor:pointer;"><img src="../images/admin/1.png"/>Partidos</a>
					<ul class="submenu">
				  <li><a href="./partido/crearpartido.php">Crear Partido</a></li>
				  <li><a href="./partido/gestionpartidos.php">Gestionar Partidos</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../images/admin/2.png"/>Socio</a>
					<ul class="submenu">
				  <li><a href="./socio/crearsocio.php">Crear Socio</a></li>
				  <li><a href="./socio/gestionsocio.php">Gestionar Socios</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../images/admin/3.png"/>Noticias</a>
				  <ul class="submenu">
				  <li><a href="./noticias/crearnoticia.php">Crear Noticia</a></li>
				  <li><a href="./noticias/gestionarnoticias.php">Gestionar Noticias</a></li>
					</ul>
		  
		  </li>
          <li><a style="cursor:pointer;"><img src="../images/admin/4.png"/>Mensajes</a>
					<ul class="submenu">
				  <li><a href="">Crear Mensaje</a></li>
				  <li><a href="">Borrar Mensajes</a></li>
				  <li><a href="">Modificar Mensajes</a></li>
				  <li><a href="">Consultar Mensajes</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../images/admin/5.png"/>Pagos</a>
				 <ul class="submenu">
				  <li><a href="">Crear Pago</a></li>
				  <li><a href="">Borrar Pagos</a></li>
				  <li><a href="">Modificar Pagos</a></li>
				  <li><a href="">Consultar Pagos</a></li>
					</ul>
			</li>
		</ul>
      </div>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	 
	<ul class="partidos">


	</ul>
	</div>	 
	
	<div id="resultado">
	<div id="con">
	</div>
	
	</div>
	
	
	<?php 
	} 
	
	else  {
	?>
	
	<div id="resultado" style="margin:auto;width:400px;height:150px;margin-top:200px;">
		<p style="text-align:center;color:red;">Usuario y/o contraseña erróneos</p>
		<p style="text-align:center;"><a href="../index.php">volver</a></p>
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
