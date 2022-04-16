var nombreantiguo,nombrenuevo;
function enternom(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editnom = document.getElementById(idfila);
	eop = document.getElementById('nom'+indice);
	nombrenuevo=editnom.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editnom.php?nombrenuevo="+nombrenuevo+"&nombreantiguo="+nombreantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editarnombreon(idfila){
 //donde se mostrará los registros
 editnom = document.getElementById(idfila);
/* alert(idfila);*/
 nombreantiguo=editnom.value;
 editnom.style.backgroundColor="#FFFFFF";
editnom.style.color="#000000";
}
function editarnombreoff(idfila){
 //donde se mostrará los registros
 editnom = document.getElementById(idfila);
editnom.style.backgroundColor="transparent";
editnom.style.color="orange";
}