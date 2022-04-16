function ordenar (y)
{
var direccionasc="http://localhost/p/images/admin/asc_order.png";
var direcciondesc="http://localhost/p/images/admin/desc_order.png";
switch (y)
	{
	case "a":
			x=document.o1.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o1.src=direccionasc;
								document.o1.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1d");
				// alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o1.src=direcciondesc;
								document.o1.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
		
		case "b":
			x=document.o2.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o2a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o2.src=direccionasc;
								document.o2.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o2d");
				// alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o2.src=direcciondesc;
								document.o2.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
		case "c":
			x=document.o3.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o3.src=direccionasc;
								document.o3.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o3.src=direcciondesc;
								document.o3.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
		case "d":
			x=document.o4.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o4a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o4.src=direccionasc;
								document.o4.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o4d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o4.src=direcciondesc;
								document.o4.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
			case "e":
			x=document.o5.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o5a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o5.src=direccionasc;
								document.o5.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o5d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o5.src=direcciondesc;
								document.o5.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
			case "f":
			x=document.o6.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o6a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o6.src=direccionasc;
								document.o6.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o6d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o6.src=direcciondesc;
								document.o6.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
		case "g":
			x=document.o7.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o7a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o7.src=direccionasc;
								document.o7.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o7d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o7.src=direcciondesc;
								document.o7.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
			case "h":
			x=document.o8.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o8a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o8.src=direccionasc;
								document.o8.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o8d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o8.src=direcciondesc;
								document.o8.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
			case "i":
			x=document.o9.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o9a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o8.src=direccionasc;
								document.o8.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o9d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o9.src=direcciondesc;
								document.o9.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
			case "j":
			x=document.o10.src;
			if (x==direcciondesc)
				{
				/*document.o1.src="http://localhost/p/images/admin/asc_order.png";
				document.o1.title="Ascendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o10a");
				 //alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o1a");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o10.src=direccionasc;
								document.o10.title="Ascendente";
							   
								}
							}
				 ajax.send(null)
				//
				
				}
			else if(x==direccionasc)
				{
				/*document.o1.src="http://localhost/p/images/admin/desc_order.png";
				document.o1.title="Descendente";*/
				//
				divContenido = document.getElementById('undiv');
				mostrarr=document.getElementById('paginar');
				ajax=objetoAjax();
				 ajax.open("GET", "./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o10d");
				//alert("./contgestionsocio.php?a=1&mostrar="+mostrarr.value+"&sisocio="+versocioo()+"&nosocio="+vernosocioo()+"&ordenar=o3d");
				divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:350px;margin-top:200px;">';
				 ajax.onreadystatechange=function() 
							{
							if (ajax.readyState==4)
								{
								divContenido.innerHTML = ajax.responseText;
								document.o10.src=direcciondesc;
								document.o10.title="Descendente";
							   
								}
							}
				 ajax.send(null)
				//
				}
			
			break;
		
	}
}
