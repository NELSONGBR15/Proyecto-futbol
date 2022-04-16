var usuantiguo,usunuevo;
function enterusu(e,idfila,indice) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editusu = document.getElementById(idfila);
	eop = document.getElementById('fil'+indice);
	usunuevo=editusu.value;
	//alert("valor nuevo "+usunuevo+", valor antiguo "+usuantiguo);
	
	
ajax=objetoAjax();
 ajax.open("GET", "./editusu.php?usunuevo="+usunuevo+"&usuantiguo="+usuantiguo+"&indice="+indice);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarusuarioon(idfila){
 //donde se mostrará los registros
 editusu = document.getElementById(idfila);
/* alert(idfila);*/
 usuantiguo=editusu.value;
 editusu.style.backgroundColor="#FFFFFF";
editusu.style.color="#000000";
}
function editarusuariooff(idfila){
 //donde se mostrará los registros
 editusu = document.getElementById(idfila);
editusu.style.backgroundColor="transparent";
editusu.style.color="orange";
}