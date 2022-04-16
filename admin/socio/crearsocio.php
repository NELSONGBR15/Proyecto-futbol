<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Peña deportiva amigos del cerro</title>
<link href="../../css/admin.css" rel="stylesheet" type="text/css"/>
<link href="./css/socio.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
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

function comprobarnombre()
	{
	nombreusu=document.getElementById('nombreusu').value;
	divContenido = document.getElementById('errores');
	 ajax=objetoAjax();
	 ajax.open("GET", "./comprobarnombreusu.php?nombreusu="+nombreusu);
 //divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divContenido.innerHTML = ajax.responseText
  }
 }

 ajax.send(null)
	}

function generarpass()
{
var cadena=["n","d","s",7,"g","h","k","a",2,"ñ","p","u",0,"c",3,"w","e",5,"f","m","y","v",9,"o","b",6,"l","j","q",8,"r","i",1,"t","x",4],contienenum = new Array(8),contienepass = new Array(8),fin="" ;
//cojo 8 num aleatorios y los meto en contienenum (otro array)
for (i=0;i<8;i++)
{
aleat = Math.random() * cadena.length;
num=Math.round(aleat);
contienenum[i]=num;
}
for (i=0;i<8;i++)
{
contienepass[i]=cadena[contienenum[i]];
fin=fin+contienepass[i];
}
document.getElementById('contrasena').value=fin;
}
</script>
</head>
<body onload="generarpass()">
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
	</style>

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
				  <li><a href="./crearsocio.php">Crear Socio</a></li>
				  <li><a href="./gestionsocio.php">Gestionar Socios</a></li>
					</ul>
				</li>
          <li><a style="cursor:pointer;"><img src="../../images/admin/3.png"/>Noticias</a>
				  <ul class="submenu">
				  <li><a href="../noticias/crearnoticia.php">Crear Noticia</a></li>
				  <li><a href="../noticias/gestionarnoticias.php">Gestionar Noticias</a></li>
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
	  <h2 style="position:absolute;top:190px;left:200px;color:white;" >Crear socio</h2>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	<ul class="partidos">
	</ul>
	</div>	 
	<div id="resultado">
	<div id="undiv" style="border:1px solid yellow;">
	
	<h1 style="text-align:center;">Formulario de datos</h1>
	<hr />
	<br />
	<br />
	<br />
	<?php 
	if (isset($_POST['enviar']))
	{
	/*
	$nombreusu=$_POST['nombreusu']
	$contrasena=$_POST['contrasena']
	$nombre=$_POST['nombre']
	$apellidos=$_POST['apellidos']
	$dni=$_POST['dni']
	$direccion=$_POST['direccion']
	$tlf1=$_POST['tlf1']
	$tlf2=$_POST['tlf2']
	$cp=$_POST['cp']
	$loc=$_POST['loc']
	$prov=$_POST['prov']
	$activo=$_POST['activo']
	$pos=$_POST['pos']
	*/
	$nombreusu=$_POST['nombreusu'];
	$contrasena=$_POST['contrasena'];
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$dni=$_POST['dni'];
	$direccion=$_POST['direccion'];
	$tlf1=$_POST['tlf1'];
	$tlf2=$_POST['tlf2'];
	$cp=$_POST['cp'];
	$loc=$_POST['loc'];
	$prov=$_POST['prov'];
	$pos=$_POST['pos'];
	if (isset($_POST['nombre'])){
						include('../../php/conexion.php');
						mysql_set_charset("utf8");
						$instruccion="INSERT INTO socio (usuario,contrasena,nombre) VALUES ('".$nombreusu."','".$contrasena."','".$nombre."')";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta1 $instruccion");
						}
	if (isset($_POST['apellidos']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET apellidos='$apellidos' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta2 $instruccion");
			} 
	if (isset($_POST['dni']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET dni='$dni' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta3 $instruccion");
			} 
	if (isset($_POST['direccion']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET direccion='$direccion' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta4 $instruccion");
			} 
	if (isset($_POST['tlf1']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET telefono1='$tlf1' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta5 $instruccion");
			} 
	if (isset($_POST['tlf2']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET telefono2='$tlf2' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta6 $instruccion");
			} 
	if (isset($_POST['cp']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET cp='$cp' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta7 $instruccion");
			}
	if (isset($_POST['loc']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET localidad='$loc' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta8 $instruccion");
			}
	if (isset($_POST['prov']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET provincia='$prov' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta9 $instruccion");
			}
	if (isset($_POST['activo']))
			{mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET activo='s' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta10 $instruccion");} else {mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET activo='n' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta10b $instruccion");}
	if (isset($_POST['pos']))
			{
			mysql_set_charset("utf8");
						$instruccion="UPDATE socio SET posicion='$pos' WHERE usuario='$nombreusu'";
						$consulta = mysql_query ($instruccion, $conexion)
									or die ("Fallo en la consulta11 $instruccion");
			}
	mysql_close($conexion);
	
	echo "<p style='color:green;' >Socio ingresado correctamente</p>"; }
	else {
	?>
	<form action="./crearsocio.php" method="post">
	<p><label for="nombreusu">Nombre de usuario:&nbsp;</label><input type="text" id="nombreusu" name="nombreusu" onblur="comprobarnombre()" maxlength="25" />
	<label for="contrasena">Contraseña:&nbsp;</label><input type="text" id="contrasena" name="contrasena" maxlength="8" /></p>
	<p><label for="nombre">Nombre&nbsp;</label><input type="text" id="nombre" name="nombre" maxlength="20" />
	<label for="apellidos">Apellidos:&nbsp;</label><input type="text" id="apellidos" name="apellidos" maxlength="20" />
	<label for="dni">DNI:&nbsp;</label><input type="text" id="dni" name="dni" maxlength="9" /></p>
	<p><label for="direccion">Dirección:&nbsp;</label><input type="text" id="direccion" name="direccion" maxlength="60" />
	<label for="tlf1">Teléfono 1:&nbsp;</label><input type="text" id="tlf1"name="tlf1" maxlength="9" />
	<label for="tlf2">Teléfono 2:&nbsp;</label><input type="text" id="tlf2" name="tlf2" maxlength="9" /></p>
	<p><label for="cp">Código Postal:&nbsp;</label><input type="text" id="cp" name="cp" maxlength="5" />
	<label for="loc">Localidad:&nbsp;</label><input type="text" id="loc" name="loc" maxlength="20" />
	<label for="prov">Provincia:&nbsp;</label><input type="text" id="prov" name="prov" maxlength="20" /></p>
	
	<p><label for="activo">Socio activo &nbsp;</label><input type="checkbox" id="activo" name="activo" />
	<label for="pos">Posición:&nbsp;</label>
	<select id="pos" name="pos">
	<?php 
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT * FROM posicion ORDER BY id ASC";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $nfilas=mysql_num_rows ($consulta);

for($i=0;$i<$nfilas;$i++)
		{
		$posicion = mysql_fetch_array ($consulta);
		echo "<option value=".$posicion['id']." >".$posicion['nombre']."</option>";
		}	 
	 
	 mysql_close($conexion);
	?>
	</select></p>
	<p><input type="submit" name="enviar" value="Guardar"/>
	</form>
	</p>
	<?php } ?>
	<p id="errores"></p>
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
