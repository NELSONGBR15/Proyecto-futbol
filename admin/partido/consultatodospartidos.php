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
function Pagina(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('undiv');
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./consultatodospartidos.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:320px;margin-top:200px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function cambiacaplocal(x,f) 
	{
window.open('./cambiacaplocal.php?uskey='+x+'&fecha='+f,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
	setTimeout(function () {window.location.reload( true )},2000);
	}

function cambiacapvis(x,f) 
	{
window.open('./cambiacapvisitante.php?uskey='+x+'&fecha='+f,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
	setTimeout(function () {window.location.reload( true )},2000);
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
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    
        $(document).ready(function() {
           $('#datepicker0').datepicker({
   onSelect: function(dateText, inst) { 
   ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"-"+mes+"-"+dia;
  //alert("fecha nueva ->"+total+" fecha antigua-> "+document.getElementById("copia0").value); 
 window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia0").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
 setTimeout(function () {window.location.reload(true)},2000);
  }
   
});
$('#datepicker1').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia1").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia1").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
setTimeout(function () {window.location.reload( true )},2000);
  }
  
   
});
$('#datepicker2').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia2").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia2").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
setTimeout(function () {window.location.reload( true )},2000);
  }
  
   
});
$('#datepicker3').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia3").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia3").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
	setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker4').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia4").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia4").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4)) 
	setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker5').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia5").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia5").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker6').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia6").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia6").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker7').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia7").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia7").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker8').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia8").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia8").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
$('#datepicker9').datepicker({
   onSelect: function(dateText, inst) { 
    ano=dateText.substr(6,4);
   mes=dateText.substr(3,2);
   dia=dateText.substr(0,2);
   total=ano+"/"+mes+"/"+dia;
  //alert("fecha nueva ->"+dateText+" fecha antigua-> "+document.getElementById("copia9").value); 
  window.open('./cambiafecha.php?fechanueva='+total+'&fechantigua='+document.getElementById("copia9").value,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
  }
   
});
		   });
  
function abrirpartido(x,i)
			{
			fila=document.getElementById('partido'+i);
			if (fila.style.display=='none')
			{
			$(fila).fadeIn('slow');
			fila.style.display="table-row";
divContenido = document.getElementById('contenidopartido'+i);
 
 ajax=objetoAjax();
 ajax.open("GET", "./consultapartido.php?fecha="+x);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:450px;margin-top:100px;margin-bottom:100px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divContenido.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)
			}
			else 
			{
			$(fila).fadeOut('slow');
			}
			
}
function cambiarcolorlocal (x,y) 
	{
	if(confirm("¿Seguro que quieres cambiar el color local?")) 
		{
 window.open('./cambiacolorlocal.php?color='+x+'&fecha='+y,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
		}
	}
	// ventana emergente {

function showLightbox(x,y,z,f) {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
	divContenido=document.getElementById('over');
	ajax=objetoAjax();
 ajax.open("GET", "./verficha.php?uskey="+x+"&nombre="+y+"&apellidos="+z+"&fecha="+f);
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
	function we () {window.location.reload( true );}
}
//ventana emergente }

function cambiaramon(x,y,z,c)
	{
ajax=objetoAjax();
//alert("./cambiaramon.php?uskey="+x+"&fecha="+y+"&amon="+z+"&color="+c);
 ajax.open("GET", "./cambiaramon.php?uskey="+x+"&fecha="+y+"&amon="+z+"&color="+c);
 ajax.send(null)
 setTimeout(function () {window.location.reload( true )},2000);
	}
function guardargol(x,y,c)	
	{
	z=document.getElementById("gol").value;
	//alert('./guardargol.php?uskey='+x+'&fecha='+y+"&gol="+z+"&color="+c);
	window.open('./guardargol.php?uskey='+x+'&fecha='+y+"&gol="+z+"&color="+c,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
	setTimeout(function () {window.location.reload( true )},2000);
	}
function guardarpuntos(x,y)
	{
	z=document.getElementById("puntos").value;
	//alert('./guardarpuntos.php?uskey='+x+'&fecha='+y+"&puntos="+z);
	window.open('./guardarpuntos.php?uskey='+x+'&fecha='+y+"&puntos="+z,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
	setTimeout(function () {window.location.reload( true )},2000);
	}
function cambiacolorr(x,y,z)
	{
	window.open('./cambiarcolor.php?uskey='+x+'&fecha='+y+"&color="+z,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4));
	setTimeout(function () {window.location.reload( true )},2000);
	}
</script>
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
	left: 25%;
	width: 50%;
	height: 50%;
	z-index:1002;
	overflow: auto;
}
</style>
<div id="over" class="overbox">
</div>
<table class="todosgoless">
	<tr>
	<th></th>
	<th>Fecha</th>
	<th>T. Roja</th>
	<th>T. Amarilla</th>
	<th style="text-align:center;">Capitán</th>
	<th>Local</th>
	<th>Marcador</th>
	<th>Visitante</th>
	<th style="text-align:center;">Capitán</th>
	<th>T. Amarilla</th>
	<th>T. Roja</th>
	</tr>
		<?php
			 require('../../php/conexion.php');
 $RegistrosAMostrar=10;

 //estos valores los recibo por GET
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
  //caso contrario los iniciamos
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }
		
		/*todos los partidos*/
					include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);	
					
					
					include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT p.fecha,p.caplocal,p.capvisitante, p.local, p.visitante,p.caplocal,p.capvisitante, p.tgolam, p.tgolaz,p.tamam,p.tamaz,p.troam,p.troaz
					FROM partido p WHERE fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
					ORDER BY p.fecha DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
					mysql_close ($conexion);
	?>

	
	<?php

	
	for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
			$dia=substr($resultado['fecha'],8,2);
			$mes=substr($resultado['fecha'],5,2);
			$ano=substr($resultado['fecha'],0,4);
										
			?>
	
	<tr>
	<td><a href="#" style="color:lightgreen;" onclick="abrirpartido('<?php echo $resultado['fecha']; ?>','<?php echo $i; ?>')" >Ver partido</a></td>
	<td>
	<input style="width:80px;color:lightblue;font-size:14px;text-align:center;background-color:transparent;" type="text" id="datepicker<?php echo $i; ?>" value="<?php echo $dia."/".$mes."/".$ano; ?>"/>
	<input type="hidden" id="copia<?php echo $i; ?>" value="<?php echo $resultado['fecha']; ?>" /></td>
	<?php 
	if (cambiacolor($resultado['local'])=='Amarillo')
	{
	echo " <td style='text-align:center;color:red;font-weight:bold;'>".$resultado['troam']."</td>";
	echo " <td style='text-align:center;color:yellow;font-weight:bold;'>".$resultado['tamam']."</td>";
	}
	else {
	echo " <td style='text-align:center;color:red;font-weight:bold;'>".$resultado['troaz']."</td>";
	echo " <td style='text-align:center;color:yellow;font-weight:bold;'>".$resultado['tamaz']."</td>";
	}
	?>
	
	<td>
	<select id="caplocal">
	<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion2="SELECT s.nombre AS nsocio, s.apellidos, s.usuario FROM socio s
	WHERE activo = 's'
	ORDER BY s.apellidos ASC , s.nombre ASC";
	//echo $instruccion;
	$consulta2 = mysql_query ($instruccion2, $conexion)
				or die ("Fallo en la consulta");
	 mysql_close($conexion);
	  while ($resultado2 = mysql_fetch_array ($consulta2))
	  {
	 
		if ($resultado2['usuario']==$resultado['caplocal'])
			{
			echo "<option value=".$resultado2['usuario']." onclick=\"cambiacaplocal('".$resultado2['usuario']."',".$resultado['fecha'].")\" selected >".$resultado2['nsocio']." ".$resultado2['apellidos']."</option>";
			}
		else {
			echo "<option value=".$resultado2['usuario']." onclick=\"cambiacaplocal('".$resultado2['usuario']."','".$resultado['fecha']."')\" >".$resultado2['nsocio']." ".$resultado2['apellidos']."</option>";
			}
	  }
	?>
	</select>
	</td>
	<?php 
	if (cambiacolor($resultado['local'])=='Amarillo')
	{
	echo " <td><img style='float:right;cursor:pointer;' src='../../images/amarillo.png' onclick=\"cambiarcolorlocal('".$resultado['local']."','".$resultado['fecha']."')\" /></td>";
	}
	else {
	echo "<td><img style='float:right;cursor:pointer;' src='../../images/azul.png' onclick=\"cambiarcolorlocal('".$resultado['local']."','".$resultado['fecha']."')\" /></td>";
	}
	
	if ($resultado['local']=='am')
		{
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px' >".$resultado['tgolam']." <span style='color:red;'>-</span> ".$resultado['tgolaz']."</td>";
		}
	else {
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px'>".$resultado['tgolaz']." <span style='color:red;'>-</span> ".$resultado['tgolam']."</td>";
		}

	if (cambiacolor($resultado['visitante'])=='Amarillo')
	{
	echo " <td><img style='float:left;' src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img style='float:left;' src='../../images/azul.png' /></td>";
	}

	?>
	<td>
	<select id="capvisitante">
	<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion2="SELECT s.nombre AS nsocio, s.apellidos, s.usuario FROM socio s
	WHERE activo = 's'
	ORDER BY s.apellidos ASC , s.nombre ASC";
	//echo $instruccion;
	$consulta2 = mysql_query ($instruccion2, $conexion)
				or die ("Fallo en la consulta");
	 mysql_close($conexion);
	  while ($resultado2 = mysql_fetch_array ($consulta2))
	  {
		if ($resultado2['usuario']==$resultado['capvisitante'])
			{
			echo "<option value=".$resultado2['usuario']." onclick=\"cambiacapvis('".$resultado2['usuario']."','".$resultado['fecha']."')\" selected>".$resultado2['nsocio']." ".$resultado2['apellidos']."</option>";
			}
		else {
			echo "<option value=".$resultado2['usuario']." onclick=\"cambiacapvis('".$resultado2['usuario']."','".$resultado['fecha']."')\" >".$resultado2['nsocio']." ".$resultado2['apellidos']."</option>";
			}
	  }
	?>
	</select>
	</td>
	<?php 
	if (cambiacolor($resultado['visitante'])=='Amarillo')
	{
	echo " <td style='text-align:center;color:yellow;font-weight:bold;'>".$resultado['tamam']."</td>";
	echo " <td style='text-align:center;color:red;font-weight:bold;'>".$resultado['troam']."</td>";
	}
	else {
	echo " <td style='text-align:center;color:yellow;font-weight:bold;'>".$resultado['tamaz']."</td>";
	echo " <td style='text-align:center;color:red;font-weight:bold;'>".$resultado['troaz']."</td>";
	}
	?>
	</tr>
	<tr id='partido<?php echo $i;?>' style='display:none;'>
	<td></td>
	<td id="contenidopartido<?php echo $i;?>" colspan="9"></td>
	<td></td>
	</tr>
	<?php } ?>
	
	</table>
	
	<?php 
	//******--------determinar las páginas---------******//
include ('../../php/conexion.php');
 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM partido WHERE fecha<='".temporadamayor($temporada['fecha'])."/09/01' OR fecha>='".temporadamenor($temporada['fecha'])."/06/30'",$conexion));

 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;

	?>
	</table>
	<div id="fade" class="fadebox">&nbsp;</div>	
	<?php 
	 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>"; ?>