var telefono2antiguo,telefono2nuevo;
function entertel2(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	edittel2 = document.getElementById(idfila);
	eop = document.getElementById('tel2'+indice);
	telefono2nuevo=edittel2.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./edittel2.php?telefono2nuevo="+telefono2nuevo+"&telefono2antiguo="+telefono2antiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editartel2on(idfila){
 //donde se mostrará los registros
 edittel2 = document.getElementById(idfila);
 telefono2antiguo=edittel2.value;
 edittel2.style.backgroundColor="#FFFFFF";
edittel2.style.color="#000000";
}
function editartel2off(idfila){
 //donde se mostrará los registros
 edittel2 = document.getElementById(idfila);
edittel2.style.backgroundColor="transparent";
edittel2.style.color="orange";
}