<script>
function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
function Pagina(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('undiv');
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./consultatodasnoticias.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:500px;margin-top:200px;">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function cambiartipo(x,y)
{
 window.open('./cambiartipo.php?id='+x+'&tipo='+y,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
}

function cambiarcontenido (x,y)
{
z=document.getElementById("contenido"+y).value;
//alert("./cambiarcontenido.php?id="+x+"&contenido="+z);
 window.open('./cambiarcontenido.php?id='+x+'&contenido='+z,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
}
function cambiartitulo (x,y)
{

z=document.getElementById("titulo"+y).value;
//alert("./cambiartitulo.php?id="+x+"&titulo="+z);
 window.open('./cambiartitulo.php?id='+x+'&titulo='+z,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
}
function eliminarnoticia (x)
{
if(confirm("¿Seguro que quieres borrar ésta noticia?")) 
		{
 window.open('./borrarnoticia.php?id='+x,'popup','width=300,height=200,top='+(screen.height*0.3)+',left='+(screen.width*0.4))
setTimeout(function () {window.location.reload( true )},2000);
}
}
</script>
<table class="todosgoless">
	<tr>
	<th>Fecha</th>
	<th>usuario</th>
	<th>Título</th>
	<th>Contenido</th>
	<th>Tipo</th>
	<th></th>
	</tr>
		<?php
			 require('../../php/conexion.php');
 $RegistrosAMostrar=10;

 //estos valores los recibo por GET
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
  //caso contrario los iniciamos
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }
		
		/*todos los partidos*/
		mysql_set_charset("utf8");
					include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT *
						FROM noticias
						ORDER BY fecha DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar" ;
		$consulta = mysql_query ($instruccion, $conexion);
		mysql_close($conexion);	
	$nfilas=mysql_num_rows($consulta);
	for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);										
			?>
	
	<tr>
	<td><input id="datepicker<?php echo $i; ?>" value="<?php 
	$dia=substr($resultado['fecha'],8,2);
	$mes=substr($resultado['fecha'],5,2);
	$ano=substr($resultado['fecha'],0,4);
	$hora=substr($resultado['fecha'],11,8);
	echo $dia."-".$mes."-".$ano." ".$hora;
	
	?>" readonly /></td>
	<td><input value="<?php echo $resultado['usu']; ?>" readonly /></td>
	<td><input id="titulo<?php echo $i; ?>" value="<?php echo $resultado['titulo']; ?>" onblur="cambiartitulo('<?php echo $resultado['id']; ?>','<?php echo $i; ?>')" /></td>
	<td><textarea id="contenido<?php echo $i; ?>" style="resize:vertical;" cols="30" rows="10" onblur="cambiarcontenido('<?php echo $resultado['id']; ?>','<?php echo $i; ?>')" ><?php echo $resultado['contenido']; ?></textarea></td>
	<td>
	<?php 
	if($resultado['tipo']=='p')
	{
	echo "público&nbsp;<input name='tipo$i' type='radio' value='p' checked='checked' />&nbsp;socio&nbsp;<input  name='tipo$i' type='radio' value='s' onclick=\"cambiartipo('".$resultado['id']."','s')\" />";
	}
		else
			{
			echo "público&nbsp;<input name='tipo$i' type='radio' value='p' onclick=\"cambiartipo('".$resultado['id']."','p')\" />&nbsp;socio&nbsp;<input  name='tipo$i' type='radio' value='s' checked='checked' />";
			}
	?>
	
	
	</td>
	<td><img onclick="eliminarnoticia('<?php echo $resultado['id']; ?>')" src="../../images/socio/checkx.png" alt="Eliminar noticia" title="Eliminar noticia"/></td>
	</tr>
	<?php } ?>
	
	</table>
	</table>
	<?php 
	//******--------determinar las páginas---------******//
include ('../../php/conexion.php');
 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM noticias",$conexion));

 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;

	 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>"; ?>