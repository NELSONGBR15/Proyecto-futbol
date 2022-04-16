var apeantiguo,apenuevo;
function enterape(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editape = document.getElementById(idfila);
	eop = document.getElementById('ape'+indice);
	apenuevo=editape.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editape.php?apenuevo="+apenuevo+"&apeantiguo="+apeantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarapeon(idfila){
 //donde se mostrará los registros
 editape = document.getElementById(idfila);
/* alert(idfila);*/
 apeantiguo=editape.value;
 editape.style.backgroundColor="#FFFFFF";
editape.style.color="#000000";
}
function editarapeoff(idfila){
 //donde se mostrará los registros
 editape = document.getElementById(idfila);
editape.style.backgroundColor="transparent";
editape.style.color="orange";
}