var localidadantiguo,localidadnuevo;
function enterloc(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editlocalidad = document.getElementById(idfila);
	eop = document.getElementById('loc'+indice);
	localidadnuevo=editlocalidad.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editloc.php?localidadnuevo="+localidadnuevo+"&localidadantiguo="+localidadantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarlocon(idfila){
 //donde se mostrará los registros
 editlocalidad = document.getElementById(idfila);
/* alert(idfila);*/
 localidadantiguo=editlocalidad.value;
 editlocalidad.style.backgroundColor="#FFFFFF";
editlocalidad.style.color="#000000";
}
function editarlocoff(idfila){
 //donde se mostrará los registros
 editlocalidad = document.getElementById(idfila);
editlocalidad.style.backgroundColor="transparent";
editlocalidad.style.color="orange";
}