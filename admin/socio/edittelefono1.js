var telefono1antiguo,telefono1nuevo;
function entertel1(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	edittel1 = document.getElementById(idfila);
	eop = document.getElementById('tel1'+indice);
	telefono1nuevo=edittel1.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./edittel1.php?telefono1nuevo="+telefono1nuevo+"&telefono1antiguo="+telefono1antiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editartel1on(idfila){
 //donde se mostrará los registros
 edittel1 = document.getElementById(idfila);
/* alert(idfila);*/
 telefono1antiguo=edittel1.value;
 edittel1.style.backgroundColor="#FFFFFF";
edittel1.style.color="#000000";
}
function editartel1off(idfila){
 //donde se mostrará los registros
 edittel1 = document.getElementById(idfila);
edittel1.style.backgroundColor="transparent";
edittel1.style.color="orange";
}