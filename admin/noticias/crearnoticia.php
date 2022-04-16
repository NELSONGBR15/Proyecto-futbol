<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../../css/admin.css" rel="stylesheet" type="text/css"/>
<link href="../socio/css/socio.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

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
	label {
			color:orange;
			}
	h1 {
		color:#a9f5bc;
		}
	#undiv	p {text-align:center;margin-bottom:5px;font-size:16px;}
	#undiv {width:950px;}
	th {color:lightgreen;}
	td {color:white;}
	.jugadores {width:260px;height:500px}
	</style>
<script>
function enviarr()
	{
	titulo=document.getElementById("titulo");
	contenid=document.getElementById("contenid");
	tipo=document.getElementById("tipo");

	if (titulo.value.length==0)
		{
		alert("no has rellenado el título de la noticia.");
		}
	else if (contenid.value.length==0)
		{
		alert("no has rellenado el contenido de la noticia.");
		}
	else {
	formulario = document.forms["formulario1"];
	formulario.submit();
		}
	}
	
	</script>
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
				$_SESSION['pas']=1;
		}
		
		}
		if (isset($_SESSION['usu'])&&isset($_SESSION['pas'])) {
				
				/*$_SESSION['usu']=$socio;*/
				$_SESSION['pas']=1;
		//echo $_SESSION['usu'];
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
          <li><a style="cursor:pointer;"><img src="../../images/admin/1.png"/>Partidos</a>
					<ul class="submenu">
				  <li><a href="../partido/crearpartido.php">Crear Partido</a></li>
				  <li><a href="../partido/gestionpartidos.php">Gestionar Partidos</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../../images/admin/2.png"/>Socio</a>
					<ul class="submenu">
				  <li><a href="../socio/crearsocio.php">Crear Socio</a></li>
				  <li><a href="../socio/gestionsocio.php">Gestionar Socios</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../../images/admin/3.png"/>Noticias</a>
				  <ul class="submenu">
				  <li><a href="./crearnoticia.php">Crear Noticia</a></li>
				  <li><a href="./gestionarnoticias.php">Gestionar Noticias</a></li>
					</ul>
		  
		  </li>
          <li><a style="cursor:pointer;"><img src="../../images/admin/4.png"/>Mensajes</a>
					<ul class="submenu">
				  <li><a href="">Crear Mensaje</a></li>
				  <li><a href="">Borrar Mensajes</a></li>
				  <li><a href="">Modificar Mensajes</a></li>
				  <li><a href="">Consultar Mensajes</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../../images/admin/5.png"/>Pagos</a>
				 <ul class="submenu">
				  <li><a href="">Crear Pago</a></li>
				  <li><a href="">Borrar Pagos</a></li>
				  <li><a href="">Modificar Pagos</a></li>
				  <li><a href="">Consultar Pagos</a></li>
					</ul>
			</li>
		</ul>
      </div>
	  <h2 style="position:absolute;top:190px;left:200px;color:white;" >Crear noticia</h2>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	<ul class="partidos">
	</ul>
	</div>	 
	<div id="resultado">
	<div id="undiv">
	<?php if (isset($_POST['tipo']))
		{
		/*
		$_POST['titulo']
		$_POST['contenid']
		$_POST['tipo']
		$_SESSION['usu']
		*/
		$instruccion = "INSERT INTO noticias values ('NULL','".$_SESSION['usu']."','CURRENT_TIMESTAMP','".$_POST['titulo']."','".$_POST['contenid']."','".$_POST['tipo']."')" ;
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
		
		?>
		<h3 style="color:lightgreen;">Guardado correctamente</h3>
		<?php
		} 
	?>
	<form action="./crearnoticia.php" method="post" name="formulario1" id="formulario1">
	<p><label for="titulo">Título&nbsp;</label><input type="text" name="titulo" id="titulo" style="width:260px;" /></p>
	<p><label for="contenid">Contenido&nbsp;</label><textarea name="contenid" id="contenid" cols="40" rows="12"></textarea></p>
	<p><label for="tipo">Público ->&nbsp;</label><input type="radio" checked="checked" name="tipo" value="p" /><label for="">Para socios ->&nbsp;</label><input type="radio" name="tipo" value="s" /></p>
	<p><input type="button" name="enviar" value="enviar" onclick="enviarr()"/></p>
	</form>
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
