<script type="text/javascript">
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
 divContenido = document.getElementById('drcha');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./contgestionsocio.php?a=1&pag="+nropagina);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:250px;margin-top:100px;">';
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

function nosubrayar(idfila){
 //donde se mostrará los registros
 filaasubrayar = document.getElementById('fila'+idfila);
filaasubrayar.style.backgroundImage="url(../../images/.png)";
}

function subrayar(idfila){
 //donde se mostrará los registros
 filaasubrayar = document.getElementById('fila'+idfila);
/*filaasubrayar.style.backgroundColor="#FFFFFF";*/
filaasubrayar.style.backgroundImage="url(../../images/transpgris.png)";
}
</script>
<style>
th {
	color:aqua;
	border-bottom:2px dotted navy;
	text-align:center;
	}
td {
	color:Orange;padding:5px;
	}
td .menabierto{color:black}
.usuario {
	color:white;
	}	
td a {
	color:GreenYellow;
	}
</style>
<?php
if (isset($_GET['a']))
{
 session_start();
  }
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
mysql_set_charset("utf8");
 $consulta=mysql_query("SELECT usuario, nombre, apellidos, direccion, cp, localidad, provincia, telefono1, telefono2,dni
FROM socio
ORDER BY apellidos DESC , nombre DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
$nfilas = mysql_num_rows ($consulta);					
					if ($nfilas==0)
						{
						echo "<h2 style='color:red;'>Aún no has recibido ningún mensaje.</h2>";
						}
					
					else {
						echo "
							<table>
							<tr>
							<th></th>
							<th>Usuario<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Nombre<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Apellidos<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>DNI<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Dirección<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>C.P<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Localidad<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Provincia<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Teléfono 1<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							<th>Teléfono 2<img src='../../images/admin/desc_order.png' title='Descendente' /></th>
							</tr>
							";
						
						for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										echo "
												<tr onmouseover=\"subrayar('".$i."')\" onmouseout=\"nosubrayar('".$i."')\" id='fila$i' style='cursor:pointer;'>
												
												<td><a href='#'>Ver ficha</a></td>
												<td id='usuario$i'>".$resultado['usuario']."</td>
												<td id='nombre$i'>".$resultado['nombre']."</td>
												<td id='apellidos$i'>".$resultado['apellidos']."</td>
												<td id='dni$i'>".$resultado['dni']."</td>
												<td id='direccion$i'>".$resultado['direccion']."</td>
												<td id='cp$i'>".$resultado['cp']."</td>
												<td id='localidad$i'>".$resultado['localidad']."</td>
												<td id='provincia$i'>".$resultado['provincia']."</td>
												<td id='telefono1$i'>".$resultado['telefono1']."</td>
												<td id='telefono2$i'>".$resultado['telefono2']."</td>
												</tr>
												";
										
										}
							echo "</table>";
						}

 //******--------determinar las páginas---------******//
 $NroRegistros=mysql_num_rows(mysql_query("SELECT usuario
FROM socio
ORDER BY apellidos DESC , nombre DESC",$conexion));

 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;
 ?><div style="margin-bottom:20px;"></div>
 <label for="paginar" style="color:white;">Mostrar:&nbsp;</label><input type="text" size="2" maxlength="2" id="paginar" />
 <?php
 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>";
 