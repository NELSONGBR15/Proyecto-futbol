	<div id="left">
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
 divContenido = document.getElementById('con');
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "./consultatodospartidos.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="../../images/loading.gif"style="margin-left:320px;margin-top:200px;">';
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

	</script>
	<div  id="todosgoles">
<?php
	 require('../../php/conexion.php');
 $RegistrosAMostrar=3;

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
					include ('../../php/conexion.php');
		include ('../../php/calculartemporada.php');
		$instruccion = "SELECT fecha
						FROM partido
						ORDER BY fecha DESC LIMIT 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$temporada=mysql_fetch_array($consulta);
		mysql_close($conexion);	
					
					
					include ('../../php/conexion.php');
					include ('../../php/funciones.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT p.fecha,p.caplocal,p.capvisitante, p.local, p.visitante,p.caplocal,p.capvisitante, p.tgolam, p.tgolaz,p.tamam,p.tamaz,p.troam,p.troaz
					FROM partido p WHERE fecha<='".temporadamayor($temporada['fecha'])."/06/30' AND fecha>='".temporadamenor($temporada['fecha'])."/09/01'
					ORDER BY p.fecha DESC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$nfilas = mysql_num_rows ($consulta);
					mysql_close ($conexion);
	?>

	
	<?php

	
	for ($i=0; $i<$nfilas; $i++)
										{
										$resultado = mysql_fetch_array ($consulta);
										
			?>
	<table id="todosgoless">
	<tr>
	<th>Fecha</th>
	<th>T. Roja</th>
	<th>T. Amarilla</th>
	<th>Gol</th>
	<th>Local</th>
	<th>Marcador</th>
	<th>Visitante</th>
	<th>Gol</th>
	<th>T. Amarilla</th>
	<th>T. Roja</th>
	</tr>
	<tr>
	
	<td style="color:lightblue;font-size:14px;text-align:center">
	<?php echo formateodia($resultado['fecha'])?> de <?php echo formateomes($resultado['fecha']) ?></td>
	<?php 
	if (cambiacolor($resultado['local'])=='Amarillo')
	{
	echo " <td style='color:red;font-weight:bold;'>".$resultado['troam']."</td>";
	echo " <td style='color:yellow;font-weight:bold;'>".$resultado['tamam']."</td>";
	}
	else {
	echo " <td style='color:red;font-weight:bold;'>".$resultado['troaz']."</td>";
	echo " <td style='color:yellow;font-weight:bold;'>".$resultado['tamaz']."</td>";
	}
	?>
	
	<td></td>
	<?php 
	if (cambiacolor($resultado['local'])=='Amarillo')
	{
	echo " <td><img style='float:right;' src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img style='float:right;' src='../../images/azul.png' /></td>";
	}
	
	if ($resultado['local']=='am')
		{
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px'>".$resultado['tgolam']." <span style='color:red;'>-</span> ".$resultado['tgolaz']."</td>";
		}
	else {
		echo "<td style='text-align:center;color:white;font-weight:bold;font-size:20px'>".$resultado['tgolaz']." <span style='color:red;'>-</span> ".$resultado['tgolam']."</td>";
		}

	if (cambiacolor($resultado['visitante'])=='Amarillo')
	{
	echo " <td><img style='float:left;' src='../../images/amarillo.png' /></td>";
	}
	else {
	echo "<td><img style='float:left;' src='../../images/azul.png' /></td>";
	}

	?>
	<td></td>
	<?php 
	if (cambiacolor($resultado['visitante'])=='Amarillo')
	{
	echo " <td style='color:yellow;font-weight:bold;'>".$resultado['tamam']."</td>";
	echo " <td style='color:red;font-weight:bold;'>".$resultado['troam']."</td>";
	}
	else {
	echo " <td style='color:yellow;font-weight:bold;'>".$resultado['tamaz']."</td>";
	echo " <td style='color:red;font-weight:bold;'>".$resultado['troaz']."</td>";
	}
	?>
	</tr>
	<?php
					
					//todos los datos en un partido X por color ordenado por posicion de 0 a n
					include ('../../php/conexion.php');
					$instruccion = "SELECT i.usuario,i.golam, i.roam, i.amam, s.nombre, s.apellidos, s.posicion, i.color
									FROM incidencias i
									LEFT JOIN socio s ON i.usuario = s.usuario
									WHERE fecha = '".$resultado['fecha']."'
									AND color = 'am'
									ORDER BY posicion ASC";
					$filaam = mysql_query ($instruccion, $conexion)
								or die ("Fallo en la consulta");
					$jugam = mysql_fetch_array ($filaam);
					
					mysql_close($conexion);
					
					//todos los datos en un partido X por color ordenado por posicion de 0 a n
					include ('../../php/conexion.php');
					$instruccion = "SELECT i.usuario,i.golaz, i.roaz, i.amaz, s.nombre, s.apellidos, s.posicion, i.color
									FROM incidencias i
									LEFT JOIN socio s ON i.usuario = s.usuario
									WHERE fecha = '".$resultado['fecha']."'
									AND color = 'az'
									ORDER BY posicion ASC";
					$filaaz = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta3");
					$jugaz = mysql_fetch_array ($filaaz);
					mysql_close($conexion);
					
		

	?>
	<tr>
	<tr>
	<td style="color:red;border-bottom:1px dotted MediumSpringGreen;">Porteros</td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	<td style="border-bottom:1px dotted MediumSpringGreen;"></td>
	</tr>
	<?php 
	
	while ($jugam['posicion']==0||$jugaz['posicion']==0)
	
	{
	if ($resultado['local']=='am')
		{
		if ($jugam['posicion']==1)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
		?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?>
		</td>
		<?php } ?>
		<td>
		</td>
		
		<td><?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		</tr>
<?php	
		if ($jugam['posicion']==0) { $jugam = mysql_fetch_array ($filaam);}
		$jugaz = mysql_fetch_array ($filaaz);
		}
	else {
	
	 if ($jugaz['posicion']==1)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
			?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		
		</td>
		<td>
		<?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}		?>
		</td> <?php } ?>
		<td></td>
		
		<td><?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		<td>
		
		</td>
		</tr> <?php 
		$jugam = mysql_fetch_array ($filaam);
		if ($jugaz['posicion']==0) { $jugaz = mysql_fetch_array ($filaaz);}
			}
	}
	?>
	
	
	
	<tr>
	<td style="color:Cornsilk;border-bottom:1px dotted DeepPink;">Defensas</td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	<td style="border-bottom:1px dotted DeepPink;"></td>
	</tr>
		<?php 
	while ($jugam['posicion']==1||$jugaz['posicion']==1)
	
	{
	if ($resultado['local']=='am')
		{
		if ($jugam['posicion']==2)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
		?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?>
		</td>
		<?php } ?>
		<td>
		</td>
		
		<td><?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		</tr>
<?php	
		if ($jugam['posicion']==1) { $jugam = mysql_fetch_array ($filaam);}
		$jugaz = mysql_fetch_array ($filaaz);
		}
	else {
	
	 if ($jugaz['posicion']==2)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
			?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		
		</td>
		<td>
		<?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}		?>
		</td> <?php } ?>
		<td></td>
		
		<td><?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		<td>
		
		</td>
		</tr> <?php 
		$jugam = mysql_fetch_array ($filaam);
		if ($jugaz['posicion']==1) { $jugaz = mysql_fetch_array ($filaaz);}
			}
	}
	?>
	<tr>
	<td style="color:chocolate;border-bottom:1px dotted RoyalBlue;">Centrocampistas</td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	<td style="border-bottom:1px dotted RoyalBlue;"></td>
	</tr>
		<?php 
	while ($jugam['posicion']==2||$jugaz['posicion']==2)
	
	{
	if ($resultado['local']=='am')
		{
		if ($jugam['posicion']==3)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
		?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?>
		</td>
		<?php } ?>
		<td>
		</td>
		
		<td><?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		</tr>
<?php	
		if ($jugam['posicion']==2) { $jugam = mysql_fetch_array ($filaam);}
		$jugaz = mysql_fetch_array ($filaaz);
		}
	else {
	
	 if ($jugaz['posicion']==3)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
			?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		
		</td>
		<td>
		<?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}		?>
		</td> <?php } ?>
		<td></td>
		
		<td><?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		<td>
		
		</td>
		</tr> <?php 
		$jugam = mysql_fetch_array ($filaam);
		if ($jugaz['posicion']==2) { $jugaz = mysql_fetch_array ($filaaz);}
			}
	}
	?>
	</tr>
	<td style="color:khaki;border-bottom:1px dotted Purple;">Delanteros</td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	<td style="border-bottom:1px dotted Purple;"></td>
	</tr>
			<?php 
	while ($jugam['posicion']==3||$jugaz['posicion']==3)
	
	{
	if ($resultado['local']=='am')
		{
		if ($jugam['posicion']!=3)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
		?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?>
		</td>
		<?php } ?>
		<td>
		</td>
		
		<td><?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		</tr>
<?php	
		if ($jugam['posicion']==3) { $jugam = mysql_fetch_array ($filaam);}
		$jugaz = mysql_fetch_array ($filaaz);
		}
	else {
	
	 if ($jugaz['posicion']>3)
			{ ?>
			<tr><td></td><td></td><td></td><td></td><td></td>
			<?php }
		else {
			?>
		<tr>
		<td></td>
		<td>
		<?php 
		if ($jugaz['roaz']>0) {
								for ($c=0;$c<$jugaz['roaz'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugaz['amaz']>0) {
								for ($c=0;$c<$jugaz['amaz'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php if ($jugaz['golaz']>0) {
								for ($c=0;$c<$jugaz['golaz'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		
		</td>
		<td>
		<?php  echo $jugaz['nombre']." ".substr($jugaz['apellidos'],0,3).".";
		if ($resultado['caplocal']==$jugaz['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}		?>
		</td> <?php } ?>
		<td></td>
		
		<td><?php  echo $jugam['nombre']." ".substr($jugam['apellidos'],0,3)."."; 
		if ($resultado['capvisitante']==$jugam['usuario']) { echo "<span style='color:white;'>&nbsp;C&nbsp;</span>";}
		?></td>
		
		<td>
		<?php 
		if ($jugam['golam']>0) {
								for ($c=0;$c<$jugam['golam'];$c++)
										{
										echo "<img src='../../images/socio/gol20x20.png' />";
										}
								}
		?>
		</td>
		<td>
		<?php 
		if ($jugam['amam']>0) {
								for ($c=0;$c<$jugam['amam'];$c++)
										{
										echo "<img src='../../images/socio/tamarilla20x26.png' />";
										}
								}
		?>
		</td>
		<?php 
		if ($jugam['roam']>0) {
								for ($c=0;$c<$jugam['roam'];$c++)
										{
										echo "<img src='../../images/socio/troja20x26.png' />";
										}
								}
		?>
		<td>
		
		</td>
		</tr> <?php 
		$jugam = mysql_fetch_array ($filaam);
		if ($jugaz['posicion']==3) { $jugaz = mysql_fetch_array ($filaaz);}
			}
	}
	//num de jugadores de azul en partido X
	include ('../../php/conexion.php');
					$instruccion = "SELECT COUNT( usuario ) AS contar
					FROM incidencias
					WHERE fecha = '".$resultado['fecha']."'
					AND color = 'az'
					GROUP BY color";

					$filaaz = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta amarillo");
					$jugaz = mysql_fetch_array ($filaaz);
					$jugazz=$jugaz['contar'];
					mysql_close($conexion);
	//num de jugadores de amarillo en partido X
	include ('../../php/conexion.php');
					$instruccion = "SELECT COUNT( usuario ) AS contar
					FROM incidencias
					WHERE fecha = '".$resultado['fecha']."'
					AND color = 'am'
					GROUP BY color";

					$filaam = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta azul");
					$jugam = mysql_fetch_array ($filaam);
					$jugamm=$jugam['contar'];
					mysql_close($conexion);
	
	?>
	
	
	
	
	
	
		<tr>
	<td style="color:white;border-bottom:1px dotted white;">Total Jugadores</td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="color:white;font-weight:bold;border-bottom:1px dotted white;"><?php if ($resultado['local']=='am')
		{echo $jugamm;} else {echo $jugazz;} ?></td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="color:white;font-weight:bold;border-bottom:1px dotted white;"><?php if ($resultado['visitante']=='am')
		{echo $jugamm;} else {echo $jugazz;} ?></td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="border-bottom:1px dotted white;"></td>
	<td style="border-bottom:1px dotted white;"></td>
	</tr>
	<?php }

//******--------determinar las páginas---------******//
include ('../../php/conexion.php');
 $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM partido WHERE fecha<='".temporadamayor($temporada['fecha'])."/09/01' OR fecha>='".temporadamenor($temporada['fecha'])."/06/30'",$conexion));

 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;

	?>
	</table>
	<?php 
	 //desplazamiento
 echo "<p style='text-align:center;'><a onclick=\"Pagina('1')\" style='text-decoration:underline;cursor:pointer;color:white;'>Primero</a> ";
 if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\" style='text-decoration:underline;cursor:pointer;color:white;'>Anterior</a> ";
 echo "<strong style='color:white;'>Pagina ".$PagAct."/".$PagUlt." </strong>";
 if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\" style='text-decoration:underline;cursor:pointer;color:white;'>Siguiente</a> ";
 echo "<a onclick=\"Pagina('$PagUlt')\" style='text-decoration:underline;cursor:pointer;color:white;'>&Uacute;ltimo</a></p>";



	
	
	
	
	?>
	</div>
	</div>