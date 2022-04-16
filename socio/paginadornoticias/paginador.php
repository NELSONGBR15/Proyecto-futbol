<?php
 require('../../php/conexion.php');
 $RegistrosAMostrar=5;

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
 $consulta=mysql_query("SELECT titulo, contenido, fecha
									FROM noticias
									ORDER BY fecha DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$conexion);
$nfilas = mysql_num_rows ($consulta);					
					if ($nfilas==0)
						{
						echo "<h2 style='color:red;'>La noticia a la que intentas acceder no está disponible</h2>";
						}
					
					else {
						for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										$dia=substr($resultado['fecha'],8,2);
										$mes=substr($resultado['fecha'],5,2);
										$ano=substr($resultado['fecha'],0,4);
										$fecha=$dia."-".$mes."-".$ano;
										echo "
										<div class='rc_bx'>
										<h1 style='text-align:center;color:#8585FF;'>".$resultado['titulo']."</h1>
										<p class='fechanoticiass'>".$fecha."</p>
										
										<div class='dotlineC' style='margin-left:20px;margin-right:30px;'></div>
										<p style='color:#D1D1D1;margin:10px;'>".$resultado['contenido']."</p>
										<div class='dotlineC' style='margin-left:20px;margin-right:30px;'></div>
										</div>
										";
										
										}
					
						}

 //******--------determinar las páginas---------******//
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
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>";
 
 
?>
