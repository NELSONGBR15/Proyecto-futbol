var cpantiguo,cpnuevo;
function entercp(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editcp = document.getElementById(idfila);
	eop = document.getElementById('cop'+indice);
	cpnuevo=editcp.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editcp.php?cpnuevo="+cpnuevo+"&cpantiguo="+cpantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarcpon(idfila){
 //donde se mostrará los registros
 editcp = document.getElementById(idfila);
/* alert(idfila);*/
 cpantiguo=editcp.value;
 editcp.style.backgroundColor="#FFFFFF";
editcp.style.color="#000000";
}
function editarcpoff(idfila){
 //donde se mostrará los registros
 editcp = document.getElementById(idfila);
editcp.style.backgroundColor="transparent";
editcp.style.color="orange";
}