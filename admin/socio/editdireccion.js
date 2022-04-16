var direcantiguo,direcnuevo;
function enterdir(e,idfila,indice,idusu) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) 
	{
	editdirec = document.getElementById(idfila);
	eop = document.getElementById('dir'+indice);
	direcnuevo=editdirec.value;
	
ajax=objetoAjax();
 ajax.open("GET", "./editdirec.php?direcnuevo="+direcnuevo+"&direcantiguo="+direcantiguo+"&indice="+indice+"&idusu="+idusu);
 eop.innerHTML= '<img src="../../images/admin/ajax_clock_small.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   eop.innerHTML = ajax.responseText 
  }
 }
 ajax.send(null)

	}
	}

	function editardiron(idfila){
 //donde se mostrará los registros
 editdirec = document.getElementById(idfila);
/* alert(idfila);*/
 direcantiguo=editdirec.value;
 editdirec.style.backgroundColor="#FFFFFF";
editdirec.style.color="#000000";
}
function editardiroff(idfila){
 //donde se mostrará los registros
 editdirec = document.getElementById(idfila);
editdirec.style.backgroundColor="transparent";
editdirec.style.color="orange";
}