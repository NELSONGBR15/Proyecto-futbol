function objetoAjax(){

  var xmlhttp=false;


  try {

  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

  } catch (e) {

  try {

  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");


  } catch (E) {

  xmlhttp = false;

  }

  }

  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {


  xmlhttp = new XMLHttpRequest();

  }

  return xmlhttp;

}




function cargacontenido()
		{
		var indice=document.f1.activo.value;
		/*alert(indice);*/
		divContenido = document.getElementById('drcha');
		ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./consulta.php?usu="+indice);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:170px;margin-top:75px;">';
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