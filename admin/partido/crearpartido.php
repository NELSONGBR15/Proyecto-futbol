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
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
		
function pasardentrolocal() {
	obj=document.getElementById('jugadores');//origen
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si está seleccionado
    	obj2=document.getElementById('juglocal'); //destino
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
		recogelocal=document.getElementById('recogelocal');
		recogelocal.value=recogelocal.value+valor+",";
  }	
}
function pasarfueralocal() {
	obj=document.getElementById('juglocal');//origen
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si está seleccionado
    	obj2=document.getElementById('jugadores'); //destino
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
		recogelocal=document.getElementById('recogelocal');
		x=document.getElementById('recogelocal').value;
		recogelocal.value=x.replace(valor+",","");
  }	
}
function pasardentrovisitante() {
	obj=document.getElementById('jugadores');//origen
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si está seleccionado
    	obj2=document.getElementById('jugvisitante'); //destino
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
		recogevisitante=document.getElementById('recogevisitante');
		recogevisitante.value=recogevisitante.value+valor+",";
  }	
}		

function pasarfueravisitante() {
	obj=document.getElementById('jugvisitante');//origen
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si está seleccionado
    	obj2=document.getElementById('jugadores'); //destino
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
		recogevisitante=document.getElementById('recogevisitante');
		x=document.getElementById('recogevisitante').value;
		recogevisitante.value=x.replace(valor+",","");
  }	
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
				  <li><a href="./crearpartido.php">Crear Partido</a></li>
				  <li><a href="./gestionpartidos.php">Gestionar Partidos</a></li>
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
	  <h2 style="position:absolute;top:190px;left:200px;color:white;" >Crear partido</h2>
    </div>
    <div id="contenido">
     <div id="submenu" class="submenugoles">
	<ul class="partidos">
	</ul>
	</div>	 
	<div id="resultado">
	<div id="undiv">
	
	<h1 style="text-align:center;">Formulario de datos</h1>
	<hr />
	<br />
	<?php 
	if (isset($_POST['enviar1']))
	{
	/*
	$_POST['datepicker']
	$_POST['colorlocal']
	$_POST['amonam$i'] 'a'
	$_POST['amonaz$i'] 'a'
	$_POST['golam$i']
	$_POST['golaz$i']
	$_POST['jugam$i']
	$_POST['jugaz$i']
	$_POST['puntosam$i']
	$_POST['puntosaz$i']
	$_POST['totjuglocal']
	$_POST['totjugvisitante']
	*/
	/*if ($_POST['colorlocal']=='am')
		{*/
		include('../../php/conexion.php');
		for ($i=0;$i<$_POST['totjuglocal'];$i++)
			{
			$amam=0;
			$roam=0;
			if ($_POST['amonam'.$i]=='a')
				{
				mysql_set_charset("utf8");
				$instruccion="INSERT INTO incidencias VALUES ('".$_POST['datepicker']."','".$_POST['jugam'.$i]."','".$_POST['golam'.$i]."','am','0','".$_POST['puntosam'.$i]."','0','0','0','0','0')";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
							
				
				}
			else {
				switch($_POST['amonam'.$i])
					{
					
					case 1: $amam=1;
						break;
					case 2: $roam=1;
						break;
					case 3: $roam=1;
						break;
					}
				mysql_set_charset("utf8");
				$instruccion="INSERT INTO incidencias VALUES ('".$_POST['datepicker']."','".$_POST['jugam'.$i]."',".$_POST['golam'.$i].",'am',".$_POST['amonam'.$i].",'".$_POST['puntosam'.$i]."','0','".$amam."','".$roam."','0','0')";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta sin amonesacion $instruccion");
				}
	
			}
		for ($i=0;$i<$_POST['totjugvisitante'];$i++)
			{
			$amaz=0;
			$roam=0;
			if ($_POST['amonaz'.$i]=='a')
				{
				mysql_set_charset("utf8");
				$instruccion="INSERT INTO incidencias VALUES ('".$_POST['datepicker']."','".$_POST['jugaz'.$i]."','0','az','0','".$_POST['puntosaz'.$i]."','".$_POST['golaz'.$i]."','0','0','0','0')";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta con amonestacion $instruccion");
				
				}
			else {
			switch($_POST['amonaz'.$i])
					{
					
					case 1: $amaz=1;
						break;
					case 2: $roaz=1;
						break;
					case 3: $roaz=1;
						break;
					}
				mysql_set_charset("utf8");
				$instruccion="INSERT INTO incidencias VALUES ('".$_POST['datepicker']."','".$_POST['jugaz'.$i]."','0','az','".$_POST['amonaz'.$i]."','".$_POST['puntosaz'.$i]."','".$_POST['golaz'.$i]."','0','0','".$amaz."','".$roaz."')";
				$consulta = mysql_query ($instruccion, $conexion)
							or die ("Fallo en la consulta sin amonesacion $instruccion");
				}
			}
		mysql_close($conexion);
		
		 // }
		echo "<p style='color:green;' >partido ingresado correctamente</p>"; 
	
	}
	
	
	else if (isset($_POST['enviar']))
	{
	/*
	$_POST['recogelocal']
	$_POST['recogevisitante']
	$_POST['datepicker']
	$_POST['colorlocal']
	$_POST['caplocal']
	$_POST['capvisitante']
	*/
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select id FROM partido ORDER BY id DESC LIMIT 0,1";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	 mysql_close($conexion);
	 $idultmpartido=$resultado['id']+1;
	if ($_POST['colorlocal']=='am')
	{
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="INSERT INTO partido VALUES (".$idultmpartido.",'".$_POST['datepicker']."','am','az','".$_POST['caplocal']."','".$_POST['capvisitante']."',0,0,0,0,0,0)";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
	 mysql_close($conexion);
	}
	else 
	{
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="INSERT INTO partido VALUES (".$idultmpartido.",'".$_POST['datepicker']."','az','am','".$_POST['caplocal']."','".$_POST['capvisitante']."',0,0,0,0,0,0)";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
	 mysql_close($conexion);
	}
	?>
	<form action="./crearpartido.php" method="post">
	<table style="text-align:center;">
	<tr>
	<th>Equipo local&nbsp;<input type="text" name="colorlocal" value="<?php echo $_POST['colorlocal']; ?>" readonly style="width:20px;"></th>
	<th>Equipo visitante</th>
	</tr>
	
	<tr>
	<td style="margin-right:10px;border-right:5px dotted blue;">
	<?php
	$recogelocal = explode(",",$_POST['recogelocal']);
	$local=0;
	$visitante=0;
 if ($_POST['colorlocal']=='am')
	{
	 echo "<table><tr>
	<th>Amonestación</th>
	<th>Gol</th>
	<th>Puntos</th>
	<th>Nombre</th>
	</tr>";
	
	 foreach ($recogelocal as $a1)
	{
	echo "<tr>";
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select nombre,apellidos FROM socio WHERE usuario='$a1'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	if ($a1!=""){
	mysql_set_charset("utf8");
		$instruccion1="select * from amonestacion order by id_amon";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion1");
	 mysql_close($conexion);
		echo "<td><select name='amonam$local'><option value='a'>Elige</option>";
		$nfilas1=mysql_num_rows($consulta1);
		for ($i=0;$i<$nfilas1;$i++)
		{
		$resultado1 = mysql_fetch_array ($consulta1);
		echo "<option value='".$resultado1['id_amon']."'>".$resultado1['nombre']."</option>";
		
		}
		echo "</select></td>";
		echo "<td><input type='text' name='golam$local' maxlength='2' style='width:20px;' value='0'/></td><td><input type='text' maxlength='1' name='puntosam$local' style='width:20px;' value='0'/></td><td><select name='jugam$local'><option value='$a1'>".$resultado['nombre']." ".$resultado['apellidos']."</option></select></td>";
		$local++;
			}
	echo "</tr>";
	}
	echo "</table>";
	?>
	</td>
	<td>
	<?php
	$recogevisitante = explode(",",$_POST['recogevisitante']);
	echo "<table><tr>
	<th>Amonestación</th>
	<th>Gol</th>
	<th>Puntos</th>
	<th>Nombre</th>
	</tr>";
 foreach ($recogevisitante as $a1)
	{
	
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select nombre,apellidos FROM socio WHERE usuario='$a1'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	if ($a1!=""){
	echo "<tr>";
	mysql_set_charset("utf8");
		$instruccion1="select * from amonestacion order by id_amon";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion1");
	 mysql_close($conexion);
		echo "<td><select name='amonaz$visitante'><option value='a'>Elige</option>";
		$nfilas1=mysql_num_rows($consulta1);
		for ($i=0;$i<$nfilas1;$i++)
		{
		$resultado1 = mysql_fetch_array ($consulta1);
		echo "<option value='".$resultado1['id_amon']."'>".$resultado1['nombre']."</option>";
		
		}
		echo "</select></td>";
		echo "<td><input type='text' name='golaz$visitante' maxlength='2' style='width:20px;' value='0'/></td><td><input type='text' maxlength='1' name='puntosaz$visitante' style='width:20px;' value='0'/></td><td><select name='jugaz$visitante'><option value='$a1'>".$resultado['nombre']." ".$resultado['apellidos']."</option></select></td>";
		$visitante++;
		echo "</tr>";
			}
			
	}

	?>
	</td>
	</tr>
	</table>
	<?php 
	}
	else 
	{
	echo "<table><tr>
	<th>Amonestación</th>
	<th>Gol</th>
	<th>Puntos</th>
	<th>Nombre</th>
	</tr>";
	
	 foreach ($recogelocal as $a1)
	{
	echo "<tr>";
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select nombre,apellidos FROM socio WHERE usuario='$a1'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	if ($a1!=""){
	mysql_set_charset("utf8");
		$instruccion1="select * from amonestacion order by id_amon";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion1");
	 mysql_close($conexion);
		echo "<td><select name='amonaz$local'><option value='a'>Elige</option>";
		$nfilas1=mysql_num_rows($consulta1);
		for ($i=0;$i<$nfilas1;$i++)
		{
		$resultado1 = mysql_fetch_array ($consulta1);
		echo "<option value='".$resultado1['id_amon']."'>".$resultado1['nombre']."</option>";
		
		}
		echo "</select></td>";
		echo "<td><input type='text' name='golaz$local' maxlength='2' style='width:20px;' value='0'/></td><td><input type='text' maxlength='1' name='puntosaz$local' style='width:20px;' value='0'/></td><td><select name='jugaz$local'><option value='$a1'>".$resultado['nombre']." ".$resultado['apellidos']."</option></select></td>";
		$local++;
			}
	echo "</tr>";
	}
	echo "</table>";
	?>
	</td>
	<td>
	<?php
	$recogevisitante = explode(",",$_POST['recogevisitante']);
	echo "<table><tr>
	<th>Amonestación</th>
	<th>Gol</th>
	<th>Puntos</th>
	<th>Nombre</th>
	</tr>";
 foreach ($recogevisitante as $a1)
	{
	
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select nombre,apellidos FROM socio WHERE usuario='$a1'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	if ($a1!=""){
	echo "<tr>";
	mysql_set_charset("utf8");
		$instruccion1="select * from amonestacion order by id_amon";
	$consulta1 = mysql_query ($instruccion1, $conexion)
				or die ("Fallo en la consulta $instruccion1");
	 mysql_close($conexion);
		echo "<td><select name='amonam$visitante'><option value='a'>Elige</option>";
		$nfilas1=mysql_num_rows($consulta1);
		for ($i=0;$i<$nfilas1;$i++)
		{
		$resultado1 = mysql_fetch_array ($consulta1);
		echo "<option value='".$resultado1['id_amon']."'>".$resultado1['nombre']."</option>";
		
		}
		echo "</select></td>";
		echo "<td><input type='text' name='golam$visitante' maxlength='2' style='width:20px;' value='0'/></td><td><input type='text' maxlength='1' name='puntosam$visitante' style='width:20px;' value='0'/></td><td><select name='jugam$visitante'><option value='$a1'>".$resultado['nombre']." ".$resultado['apellidos']."</option></select></td>";
		$visitante++;
		echo "</tr>";
			}
			
	}

	?>
	</td>
	</tr>
	</table>
	<?php  
	}
	?>
	</td>
	</tr>
	<tr>
	<td><input type="hidden" name="totjuglocal" value="<?php echo $local; ?>"/>
	<input type="hidden" name="datepicker" value="<?php echo $_POST['datepicker']; ?>"/></td>
	<td><input type="hidden" name="totjugvisitante" value="<?php echo $visitante; ?>"/></td>
	</tr>
	<tr>
	<td colspan="2"><p><input type="submit" name="enviar1" value="Enviar"/></p></td>

	</tr>
	</table>
	</form>
	<?php
	
	}
	else {
	?>
	<form action="./crearpartido.php" method="post">
	<p><label for="datepiker"> Seleccionar Fecha (<span style="font-size:11px;">AAAA-MM-DD</span>):&nbsp;</label>
	       <input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12" /></p>
	
	<table style="text-align:center;margin:auto;border:1px solid yellow;">
	<tr>
	
	<th>Equipo local<br /><select name="colorlocal"><option value="am">Amarillo</option><option value="az">Azul</option></select></th>
	<th colspan="3">Jugadores por posiciones</th>
	<th>Equipo visitante</th>
	</tr>
	<tr>
	<td>Capitán:
	<select name="caplocal">
	<option value="0">Elige Capitán</option>
	<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT s.nombre AS nsocio, s.apellidos, s.usuario, s.posicion, p.nombre
	FROM socio s
	LEFT JOIN posicion p ON s.posicion = p.id
	WHERE activo = 's'
	ORDER BY p.id ASC , s.apellidos ASC , s.nombre ASC";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 mysql_close($conexion);
	  while ($resultado = mysql_fetch_array ($consulta))
	  {
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
	  }
	?>
	</select>
	<input type="hidden" name="recogelocal" id="recogelocal"/>
	</td>
	<td></td>
	<td></td>
	<td></td>
	<td>Capitán:
	<select name="capvisitante">
	<option value="0">Elige Capitán</option>
	<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT s.nombre AS nsocio, s.apellidos, s.usuario, s.posicion, p.nombre
	FROM socio s
	LEFT JOIN posicion p ON s.posicion = p.id
	WHERE activo = 's'
	ORDER BY p.id ASC , s.apellidos ASC , s.nombre ASC";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 mysql_close($conexion);
	  while ($resultado = mysql_fetch_array ($consulta))
	  {
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
	  }
	?>
	</select>
	<input type="hidden" name="recogevisitante" id="recogevisitante" />
	</td>
	</tr>
	<tr>
	
	<td >
	
	<select name="juglocal[]" class="jugadores" id="juglocal" multiple="multiple">
	</select>
	</td>
	<td>
	<ul>
	<li><input type="button" value=">>" onclick="pasarfueralocal()"/></li>
	<li><input type="button" value="<<" onclick="pasardentrolocal()" /></li>
	</ul>
	</td>
	<td>
	<select class="jugadores" name="jugadores" id="jugadores" multiple="multiple">
	<?php 
	/*
	
	todos los jugadores ordenados por posicion
	
	SELECT s.nombre, s.apellidos, s.usuario, s.posicion, p.nombre
	FROM socio s
	LEFT JOIN posicion p ON s.posicion = p.id
	WHERE activo = 's'
	ORDER BY p.id ASC , s.apellidos ASC , s.nombre ASC
	*/
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT s.nombre AS nsocio, s.apellidos, s.usuario, s.posicion, p.nombre
	FROM socio s
	LEFT JOIN posicion p ON s.posicion = p.id
	WHERE activo = 's'
	ORDER BY p.id ASC , s.apellidos ASC , s.nombre ASC";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 mysql_close($conexion);
	 
	  $resultado = mysql_fetch_array ($consulta);
	 echo "<optgroup label='Porteros'>";
	 while ($resultado['posicion']==0) 
		{
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
		$resultado = mysql_fetch_array ($consulta);
		}
	 echo "</optgroup>";
	 echo "<optgroup label='Defensas'>";
	 while ($resultado['posicion']==1) 
		{
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
		$resultado = mysql_fetch_array ($consulta);
		}
	 echo "</optgroup>";
	 echo "<optgroup label='Centrocampistas'>";
	 while ($resultado['posicion']==2) 
		{
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
		$resultado = mysql_fetch_array ($consulta);
		}
	 echo "</optgroup>";
	echo "<optgroup label='Delanteros'>";
	 while ($resultado['posicion']==3) 
		{
		echo "<option value=".$resultado['usuario'].">".$resultado['nsocio']." ".$resultado['apellidos']."</option>";
		$resultado = mysql_fetch_array ($consulta);
		}
	 echo "</optgroup>";
	
	?>
	</select>
	</td>
	<td>
	<ul>
	<li><input type="button" value=">>" onclick="pasardentrovisitante()"/></li>
	<li><input type="button" value="<<" onclick="pasarfueravisitante()"/></li>
	</ul>
	</td>
	<td >
	
	<select name="jugvisitante[]" class="jugadores" id="jugvisitante" multiple ="multiple">
	</select>
	</td>
	</tr>
	<tr>
	<td colspan="5"><input type="submit" name="enviar" value="Enviar"/></td>
	</tr>
	</table>
	</form>
	</p>
	<?php 
	 }
	?>
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
