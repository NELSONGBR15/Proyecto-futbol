var dniantiguo,dninuevo;
function enterdni(e,idfila,indice) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editdni = document.getElementById(idfila);
	eop = document.getElementById('dn'+indice);
	dninuevo=editdni.value;
	
	
ajax=objetoAjax();
 ajax.open("GET", "./editdni.php?dninuevo="+dninuevo+"&dniantiguo="+dniantiguo+"&indice="+indice);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editardnion(idfila){
 //donde se mostrará los registros
 editdni = document.getElementById(idfila);
/* alert(idfila);*/
 dniantiguo=editdni.value;
 editdni.style.backgroundColor="#FFFFFF";
editdni.style.color="#000000";
}
function editardnioff(idfila){
 //donde se mostrará los registros
 editdni = document.getElementById(idfila);
editdni.style.backgroundColor="transparent";
editdni.style.color="orange";
}