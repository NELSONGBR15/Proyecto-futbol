<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../css/socio.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>


</head>
<body>
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
		$_SESSION['usu']=1;
				$_SESSION['pas']=1;
		}
		
		}
		if (isset($_SESSION['usu'])&&isset($_SESSION['pas'])) {
				
				$_SESSION['usu']=1;
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
          <li class="clsActive"><a href="./socioindex.php"><img src="../images/socio/1.png"/>Partidos</a></li>
          <li><a href="./goles.php"><img src="../images/socio/2.png"/>Goles</a></li>
          <li><a href="#"><img src="../images/socio/3.png"/>Asistencia</a></li>
          <li><a href="#"><img src="../images/socio/4.png"/>Tarjetas</a></li>
          <li><a href="#"><img src="../images/socio/5.png"/>Pagos</a></li>
		  <li><a href="#"><img src="../images/socio/6.png"/>Mensajes</a></li>
		</ul>
      </div>
    </div>
    <div id="contenido">
     <div id="submenu">
	 
	<ul>
	<p></p>
	<li><a href="">Opción 1</a></li>
	<li><a href="">Opción 2</a></li>
	<li><a href="">Opción 3</a></li>
	<li><a href="">Opción 4</a></li>
	<li><a href="">Opción 5</a></li>
	<li><a href="">Opción 6</a></li>
	<li><a href="">Opción 7</a></li>
	<li><a href="">Opción 8</a></li>
	</ul>
	</div>	 
	
	<div id="resultado">
		<p>Aquí se mostrarán los resultados</p>
	</div>
	  
	  
	  
	  
	  
    </div>
	
	
	<?php 
	mysql_close ($conexion);
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
