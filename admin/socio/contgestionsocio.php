<?php 
if (isset($_GET['a']))
{session_start();} ?>
<script type="text/javascript">
//ventana emergente {
function showLightbox(x,y,z) {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
	divContenido=document.getElementById('over');
	ajax=objetoAjax();
 ajax.open("GET", "./verficha.php?uskey="+x+"&nombre="+y+"&apellidos="+z);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divContenido.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)

}

function cambiaractivo(x) 
	{

	if(document.getElementById('activo').checked==true)
					{
				 window.open('./activacion.php?uskey='+x+'&activo=s','popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
					}
	else
			{
			window.open('./activacion.php?uskey='+x+'&activo=n','popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
			}
	}
function actualizarposicion (x,y) 
{
window.open('./actualizarposicion.php?uskey='+x+'&posicion='+y,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
}


function verestadistica(x,y){
 divContenido = document.getElementById('estadistica');
 ajax=objetoAjax();
 ajax.open("GET", "./estadistica.php?tempmayor="+x+"&uskey="+y);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:0px;margin-top:0px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   divContenido.innerHTML = ajax.responseText
  }
 }
 ajax.send(null)
}

function verpagos(x,y){
 divContenido = document.getElementById('pagos');
 ajax=objetoAjax();
 ajax.open("GET", "./verpagos.php?tempmayor="+x+"&uskey="+y);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:0px;margin-top:0px;">';
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
// ventana emergente }

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
 mostrarr=document.getElementById('paginar');
 ordenarr=document.getElementById('ordenarr').value;
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./contgestionsocio.php?a=1&pag="+nropagina+"&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar="+ordenarr);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
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

function nosubrayar(idfila){
 //donde se mostrará los registros
 filaasubrayar = document.getElementById('fila'+idfila);
filaasubrayar.style.backgroundImage="url(../../images/.png)";
}

function subrayar(idfila){
 //donde se mostrará los registros
 filaasubrayar = document.getElementById('fila'+idfila);
filaasubrayar.style.backgroundImage="url(../../images/transpgris.png)";
}
function mostrar(e)
{
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	divContenido = document.getElementById('undiv');
	mostrarr=document.getElementById('paginar');
	ordenarr=document.getElementById('ordenarr').value;
	ajax=objetoAjax();
	 //uso del medoto GET
	 //indicamos el archivo que realizará el proceso de paginar
	 //junto con un valor que representa el nro de pagina
//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar="+ordenarr);	
	ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar="+ordenarr);
	divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
	 ajax.onreadystatechange=function() 
				{
				if (ajax.readyState==4)
					{
				   //mostrar resultados en esta capa
				   divContenido.innerHTML = ajax.responseText
					}
				}
	 //como hacemos uso del metodo GET
	 //colocamos null ya que enviamos 
	 //el valor por la url ?pag=nropagina
	 ajax.send(null)
	}

}
function versocioo()
		{
		mostrarr=document.getElementById('paginar');
			if(document.getElementById('noactivo').checked==true)
					{
					//alert("está activado ver no activo sólo");
					return("n");
					}
			else if(document.getElementById('activo').checked==true)
				{
				//alert("está activado ver activo sólo");
				return("s");
				}
			else {
				//alert("ambos desactivados");
				return("n");
				}
		}
function vernosocioo()
		{
		mostrarr=document.getElementById('paginar');
		 if(document.getElementById('activo').checked==true) 
				{
				//alert("está activado ver activo sólo");
				return("n");
				}
			else if(document.getElementById('noactivo').checked==true){
				//alert("está activado ver no activo sólo");
				return("s");
				}
			else {
				//alert("ambos desactivados");
				return("n");
				}
		}

function versocio()
		{
		ordenarr=document.getElementById('ordenarr').value;
		mostrarr=document.getElementById('paginar');
			if(document.getElementById('noactivo').checked==true)
					{
					//alert("está activado ver no activo sólo");
					divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					//alert ("./contgestionsocio.php?a=1&sisocio=n&nosocio=s&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=n&nosocio=s&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
					//return("n");
					}
			else if(document.getElementById('activo').checked==true)
				{
				//alert("está activado ver activo sólo");
				divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					//alert("./contgestionsocio.php?a=1&sisocio=s&nosocio=n&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=s&nosocio=n&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
				//return("s");
				}
			else {
				//alert("ambos desactivados");
				divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=n&nosocio=n&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
				//return("n");
				}
		}
function vernosocio()
		{
		ordenarr=document.getElementById('ordenarr').value;
		mostrarr=document.getElementById('paginar');
		 if(document.getElementById('activo').checked==true) 
				{
				//alert("está activado ver activo sólo");
				
				divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=s&nosocio=n&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
				
				//return("n");
				}
			else if(document.getElementById('noactivo').checked==true){
				//alert("está activado ver no activo sólo");
				divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=n&nosocio=s&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
				//return("s");
				}
			else {
				// alert("ambos desactivados");
				divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					 ajax.open("GET", "./contgestionsocio.php?a=1&sisocio=n&nosocio=n&mostrar="+mostrarr.value+"&ordenar="+ordenarr);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
				//return("n");
				}
		}
function generarpass(x)
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

//alert(contienepass[i]+" "+x);
fin=fin+contienepass[i];
}

//alert("contraseña final-> "+fin);
//alert('/generarcontrasena.php?uskey='+x+'&contrasena='+fin);
window.open('./generarcontrasena.php?uskey='+x+'&contrasena='+fin,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
}

function eliminarusuario(x,y,z)
{
if(confirm("¿Seguro que quieres borrar del sistema al socio "+y+" "+z+" ?")) 
		{
		divContenido = document.getElementById('undiv');
					ajax=objetoAjax();
					 ajax.open("GET", "./borrarsocio.php?usuario="+x);
					divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
					 ajax.onreadystatechange=function() 
								{
								if (ajax.readyState==4)
									{
								   divContenido.innerHTML = ajax.responseText
									}
								}
					 ajax.send(null)
		
		
		setTimeout(function (){window.location.reload( true )},2000);
		}


}

</script>
<style>
th {
	color:aqua;
	border-bottom:2px dotted navy;
	text-align:center;
	}
td {
	color:Orange;padding:5px;
	}
td .menabierto{color:black}
.usuario {
	color:white;
	}	
td a {
	color:GreenYellow;
	}
input,textarea {
		background-color:transparent;
		border:none;
		color:orange;
		font-size:11px;
		width:50px;
		cursor:pointer;
		}

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
	top: 20%;
	left: 25%;
	width: 50%;
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

<div id="over" class="overbox">
</div>


<script type="text/javascript" src="editusuario.js"></script>
<script type="text/javascript" src="editnombre.js"></script>
<script type="text/javascript" src="editapellidos.js"></script>
<script type="text/javascript" src="editdni.js"></script>
<script type="text/javascript" src="editdireccion.js"></script>
<script type="text/javascript" src="editcp.js"></script>
<script type="text/javascript" src="editlocalidad.js"></script>
<script type="text/javascript" src="editprovincia.js"></script>
<script type="text/javascript" src="edittelefono1.js"></script>
<script type="text/javascript" src="edittelefono2.js"></script>
<script type="text/javascript" src="ordenar.js"></script>
<?php 
  
 require('../../php/conexion.php');
 
 if (isset($_GET['mostrar']))
{
 $RegistrosAMostrar=$_GET['mostrar'];
  }
  else {
		$RegistrosAMostrar=10;
		}
 if (isset($_GET['ordenar']))
{
 $ordenar=$_GET['ordenar'];
  }
  else {
		$ordenar=0;
		}
 //estos valores los recibo por GET
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
  //caso contrario los iniciamos
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }
mysql_set_charset("utf8");

if (isset($_GET['sisocio']))
	{
	
	$sisocio=$_GET['sisocio'];
	$nosocio=$_GET['nosocio'];
	if ($sisocio=="n"&&$nosocio=="n")
		{
		if (isset($_GET['ordenar']))
		{
		if ($_GET['ordenar']==0)
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
			}
		if ($_GET['ordenar']=="o1a")
		{
		
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY usuario ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o1d")
		{
	
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY usuario DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2a")
		{
	
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY nombre ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2d")
		{
		
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY apellidos ASC,nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY dni ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY dni DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY direccion ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY direccion DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY cp ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY cp DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY localidad ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY localidad DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY provincia ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY provincia DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY telefono1 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY telefono1 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10a")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY telefono2 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10d")
		{

		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY telefono2 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		}
		else {
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio
			ORDER BY BY apellidos ASC,nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
			}

		}
	else if ($sisocio=="s"&&$nosocio=="n")
		{
	if (isset($_GET['ordenar']))
		{
		if ($_GET['ordenar']==0)
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo ='s'
			ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
			}
		if ($_GET['ordenar']=="o1a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY usuario ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o1d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY usuario DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY nombre ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2d")
		{		
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY apellidos ASC,nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY dni ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY dni DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY direccion ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY direccion DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY cp ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY cp DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY localidad ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY localidad DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY provincia ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY provincia DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY telefono1 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY telefono1 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY telefono2 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY telefono2 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		}
		else {
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='s'
			ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		}
	else if ($sisocio=="n"&&$nosocio=="s")
		{
		if ($_GET['ordenar']==0)
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
			}
		if (isset($_GET['ordenar']))
		{
		if ($_GET['ordenar']=="o1a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY usuario ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o1d")
		{	
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY usuario DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2a")
		{	
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY nombre ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o2d")
		{		
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY apellidos ASC,nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o3d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY nombre DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY dni ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o4d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY dni DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY direccion ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o5d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY direccion DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY cp ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o6d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY cp DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY localidad ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o7d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY localidad DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY provincia ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o8d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY provincia DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY telefono1 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o9d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY telefono1 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10a")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY telefono2 ASC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		else if ($_GET['ordenar']=="o10d")
		{
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY telefono2 DESC,apellidos DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
		}
		}
		else {
		$consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
			FROM socio WHERE activo='n'
			ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
			}
		}
	
	}
else {
 $consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
FROM socio
ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
}

$nfilas = mysql_num_rows ($consulta);					
					if ($nfilas==0)
						{
						echo "<h2 style='color:red;'>Aún no hay usuarios.</h2>";
						}
					
					else {
						echo "
							<table cellspacing='0'>
							<tr>
							<th></th>
							<th>Usuario<img style='cursor:pointer;' name='o1' onclick=\"ordenar('a')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Nombre<img style='cursor:pointer;' name='o2' onclick=\"ordenar('b')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Apellidos<img style='cursor:pointer;' name='o3' onclick=\"ordenar('c')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>DNI<img style='cursor:pointer;' name='o4' onclick=\"ordenar('d')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Dirección<img style='cursor:pointer;' name='o5' onclick=\"ordenar('e')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>C.P<img style='cursor:pointer;' name='o6' onclick=\"ordenar('f')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Localidad<img style='cursor:pointer;' name='o7' onclick=\"ordenar('g')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Provincia<img style='cursor:pointer;' name='o8' onclick=\"ordenar('h')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Teléfono 1<img style='cursor:pointer;' name='o9' onclick=\"ordenar('i')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Teléfono 2<img style='cursor:pointer;' name='o10' onclick=\"ordenar('j')\" src='../../images/admin/desc_order.png' title='Descendente' /></th>
							</tr>
							";
						
						for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										echo "
												<tr onmouseover=\"subrayar('".$i."')\" onmouseout=\"nosubrayar('".$i."')\" id='fila$i' style='cursor:pointer;'>
												
												<td><a  href=\"javascript:showLightbox('".$resultado['usuario']."','".$resultado['nombre']."','".$resultado['apellidos']."');\">Ver ficha</a><img onclick=\"eliminarusuario('".$resultado['usuario']."','".$resultado['nombre']."','".$resultado['apellidos']."')\" src='../../images/socio/checkx.png' alt='Eliminar socio' title='Eliminar socio'/></td>
												<td id='fil$i'><input style='padding:5px' type='text' id='usuario$i' onkeypress=\"enterusu(event,'usuario$i','$i')\" onclick=\"editarusuarioon('usuario".$i."')\" onblur=\"editarusuariooff('usuario".$i."')\" value='".$resultado['usuario']."' /></td>
												<td id='nom$i'><input style='padding:5px;width:80px;' type='text' id='nombre$i' onkeypress=\"enternom(event,'nombre$i','$i','".$resultado['usuario']."')\" onclick=\"editarnombreon('nombre".$i."')\" onblur=\"editarnombreoff('nombre".$i."')\" value='".$resultado['nombre']."' /></td>
												<td id='ape$i'><input style='padding:5px;width:80px' type='text' id='apellidos$i' onkeypress=\"enterape(event,'apellidos$i','$i','".$resultado['usuario']."')\" onclick=\"editarapeon('apellidos".$i."')\" onblur=\"editarapeoff('apellidos".$i."')\" value='".$resultado['apellidos']."' /></td>
												<td id='dn$i'><input style='padding:5px;width:56px;' type='text' id='dni$i' onkeypress=\"enterdni(event,'dni$i','$i','".$resultado['usuario']."')\" onclick=\"editardnion('dni".$i."')\" onblur=\"editardnioff('dni".$i."')\" value='".$resultado['dni']."' /></td>
												<td id='dir$i'><textarea style='padding:5px;width:160px;resize:vertical;font-size:12px;min-height:50px;' type='text' id='direccion$i' onkeypress=\"enterdir(event,'direccion$i','$i','".$resultado['usuario']."')\" onclick=\"editardiron('direccion".$i."')\" onblur=\"editardiroff('direccion".$i."')\"> ".$resultado['direccion']."</textarea></td>
												<td id='cop$i'><input style='padding:5px;' type='text' id='cp$i' onkeypress=\"entercp(event,'cp$i','$i','".$resultado['usuario']."')\" onclick=\"editarcpon('cp".$i."')\" onblur=\"editarcpoff('cp".$i."')\" value='".$resultado['cp']."' /></td>
												<td id='loc$i'><input style='padding:5px;' type='text' id='localidad$i' onkeypress=\"enterloc(event,'localidad$i','$i','".$resultado['usuario']."')\" onclick=\"editarlocon('localidad".$i."')\" onblur=\"editarlocoff('localidad".$i."')\" value='".$resultado['localidad']."' /></td>
												<td id='prov$i'><input style='padding:5px;' type='text' id='provincia$i' onkeypress=\"enterprov(event,'provincia$i','$i','".$resultado['usuario']."')\" onclick=\"editarprovon('provincia".$i."')\" onblur=\"editarprovoff('provincia".$i."')\" value='".$resultado['provincia']."' /></td>
												<td id='tel1$i'><input style='padding:5px;width:55px;' type='text' id='telefono1$i' onkeypress=\"entertel1(event,'telefono1$i','$i','".$resultado['usuario']."')\" onclick=\"editartel1on('telefono1".$i."')\" onblur=\"editartel1off('telefono1".$i."')\" value='".$resultado['telefono1']."' /></td>
												<td id='tel2$i'><input style='padding:5px;width:55px;' type='text' id='telefono2$i' onkeypress=\"entertel2(event,'telefono2$i','$i','".$resultado['usuario']."')\" onclick=\"editartel2on('telefono2".$i."')\" onblur=\"editartel2off('telefono2".$i."')\" value='".$resultado['telefono2']."' /></td>
												</tr>
												";
										
										}
							echo "</table>";
						}
		
						
 //******--------determinar las páginas---------******//



if (isset($_GET['sisocio']))
	{
	$sisocio=$_GET['sisocio'];
	$nosocio=$_GET['nosocio'];
	if ($sisocio=="n"&&$nosocio=="n")
		{
		$NroRegistros=mysql_num_rows(mysql_query("SELECT usuario
	FROM socio
	ORDER BY apellidos DESC , nombre DESC",$conexion));

		}
	else if ($sisocio=="s"&&$nosocio=="n")
		{
		 $NroRegistros=mysql_num_rows(mysql_query("SELECT usuario
			FROM socio where activo='s'
			ORDER BY apellidos DESC , nombre DESC",$conexion));

		}
	else if ($sisocio=="n"&&$nosocio=="s")
		{
		 $NroRegistros=mysql_num_rows(mysql_query("SELECT usuario
				FROM socio WHERE activo='n'
				ORDER BY apellidos DESC , nombre DESC",$conexion));

		}
	
	}
else {
	 $NroRegistros=mysql_num_rows(mysql_query("SELECT usuario
	FROM socio
	ORDER BY apellidos DESC , nombre DESC",$conexion));
	} ?> 


<div id="fade" class="fadebox">&nbsp;</div>	
<?php
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;?>
 <div style="margin-bottom:20px;"></div>
 <label for="paginar" style="color:white;">Mostrar:&nbsp;</label><input type="text" onkeypress="mostrar(event)" size="2" maxlength="2" id="paginar" style="background-color:white;color:black;" value="<?php echo $RegistrosAMostrar; ?>"/>
 <input type="hidden" id="ordenarr" value="<?php echo $ordenar;?>" />
 <br />
 <br />
 <?php 

if (isset($_GET['sisocio']))
	{
	$sisocio=$_GET['sisocio'];
	$nosocio=$_GET['nosocio'];
	if ($sisocio=="n"&&$nosocio=="n")
		{ ?>
 <input type="checkbox" id="activo" onclick="versocio()"  /><label for="activo" ><span style="color:white;">Ver socios activos</span></label>
 <br />
 <input type="checkbox" id="noactivo" onclick="vernosocio()"  /><label for="noactivo" ><span style="color:white;">Ver socios no activos</span></label>

		<?php }
	else if ($sisocio=="s"&&$nosocio=="n")
		{ ?>
 <input type="checkbox" id="activo" onclick="versocio()" checked="checked"  /><label for="activo" ><span style="color:white;">Ver socios activos</span></label>
 <br />
 <input type="checkbox" id="noactivo" onclick="vernosocio()"  /><label for="noactivo" ><span style="color:white;">Ver socios no activos</span></label>
		<?php }
	else if ($sisocio=="n"&&$nosocio=="s")
		{ ?>
 <input type="checkbox" id="activo" onclick="versocio()"  /><label for="activo" ><span style="color:white;">Ver socios activos</span></label>
 <br />
 <input type="checkbox" id="noactivo" onclick="vernosocio()" checked="checked"  /><label for="noactivo" ><span style="color:white;">Ver socios no activos</span></label>

		<?php }
	
	}
	
else {
 ?>
 <input type="checkbox" id="activo" onclick="versocio()"  /><label for="activo" ><span style="color:white;">Ver socios activos</span></label>
 <br />
 <input type="checkbox" id="noactivo" onclick="vernosocio()"  /><label for="noactivo" ><span style="color:white;">Ver socios no activos</span></label> <?php  } ?>
 <!-- <input type="hidden" id="ordenar" name="ordenar" value="<?php //echo $ordenar;?>"  /> -->
 <?php
 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>";
 