var provinciaantiguo,provincianuevo;
function enterprov(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editprovincia = document.getElementById(idfila);
	eop = document.getElementById('prov'+indice);
	provincianuevo=editprovincia.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editprov.php?provincianuevo="+provincianuevo+"&provinciaantiguo="+provinciaantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarprovon(idfila){
 //donde se mostrará los registros
 editprovincia = document.getElementById(idfila);
/* alert(idfila);*/
 provinciaantiguo=editprovincia.value;
 editprovincia.style.backgroundColor="#FFFFFF";
editprovincia.style.color="#000000";
}
function editarprovoff(idfila){
 //donde se mostrará los registros
 editprovincia = document.getElementById(idfila);
editprovincia.style.backgroundColor="transparent";
editprovincia.style.color="orange";
}