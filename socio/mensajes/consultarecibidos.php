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
 ajax.open("GET", "./consultarecibidos.php?a=1&pag="+nropagina);
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

function vermensaje(mensajje)
{
fila=document.getElementById('mensaje'+mensajje);
$(fila).fadeIn('slow');
fila.style.display="table-row";
fila1=document.getElementById('ponernormal'+mensajje);
fila1.style.color="GreenYellow";
fila1.style.fontWeight="normal";
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./marcarmensaje.php?marcar="+mensajje);
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function cerrarmensaje(mensajje)
{
fila=document.getElementById('mensaje'+mensajje);
$(fila).fadeOut('slow');
fila.style.display="none";


}

function checktodos()
	{
	if (document.getElementById("chek").checked==true)
			{
			   for (i=1;i<document.f1.elements.length;i++)
					{
					  if(document.f1.elements[i].type == "checkbox")
							{
							document.f1.elements[i].checked=true;
							}
					}
			}
	else 
		{
		for (i=1;i<document.f1.elements.length;i++)
					{
					  if(document.f1.elements[i].type == "checkbox")
							{
							document.f1.elements[i].checked=false;
							}
					}
		
		}
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
 $consulta=mysql_query("SELECT *
FROM mensajerec
WHERE destinatario = '".$_SESSION['usu']."'
ORDER BY fecha DESC , idmen DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
$nfilas = mysql_num_rows ($consulta);					
					if ($nfilas==0)
						{
						echo "<h2 style='color:red;'>Aún no has recibido ningún mensaje.</h2>";
						}
					
					else {
						echo "
							<table>
							<tr>
							<th>Fecha</th>
							<th>De</th>
							<th>Mensaje</th>
							<form action='./recibidos.php' name='f1' method='post'>
							<th>Borrar<br /><input type='checkbox' id=\"chek\" onclick=\"checktodos()\"/></th>
							</tr>
							";
						
						for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										$dia=substr($resultado['fecha'],8,2);
										$mes=substr($resultado['fecha'],5,2);
										$ano=substr($resultado['fecha'],0,4);
										$fecha=$dia."-".$mes."-".$ano;
										echo "
										<tr>
										<td>".$fecha."</td>
										<td class='usuario'>".$resultado['usuario']."</td>
										<td>";
										if ($resultado['leido']=='n') { ?>
										<a id="ponernormal<?php echo $resultado['idmen']; ?>" onclick="vermensaje('<?php echo $resultado['idmen']; ?>')" style="cursor:pointer;font-weight:bold;color:MediumSpringGreen;"><?php echo substr($resultado['mensaje'],0,50)?>...</a>
										 <?php }
										else { ?>
										<a id="ponernormal<?php echo $resultado['idmen']; ?>" onclick="vermensaje('<?php echo $resultado['idmen']; ?>')" style="cursor:pointer;"><?php echo substr($resultado['mensaje'],0,50)?>...</a>
										<?php }

										 echo "</td>
										<td><p style='margin:auto;'><input type='checkbox' name=borrar[] value='".$resultado['idmen']."' /></td></p>
										</tr>
										<tr id='mensaje".$resultado['idmen']."' style='display:none;'>
										<td></td>
										<td></td>
										<td style='background-repeat:no-repeat;vertical-align:top;padding:20px;background-image:url(\"../../images/socio/posit.png\");'>
										<a onclick=\"cerrarmensaje('".$resultado['idmen']."')\" style='cursor:pointer;margin:auto;float:right;'><img src='../../images/socio/checkx.png'/></a>
										<p class='menabierto' style=' height:200px;width:269px; overflow:auto;font-size:12px;;padding:6px;'>".$resultado['mensaje']."</p><br />
										
										</td>
										<td></td>
										</tr>
										";
										
										}
						echo "</table><p style='text-align:center;'><input type='submit' name='borrarr' value='Borrar'/></p></form>";
						}

 //******--------determinar las páginas---------******//
 $NroRegistros=mysql_num_rows(mysql_query("SELECT *
FROM mensajerec
WHERE destinatario = '".$_SESSION['usu']."'
ORDER BY fecha DESC , idmen DESC",$conexion));

 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;
 ?><div style="margin-bottom:20px;"></div><?php
 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>";
 