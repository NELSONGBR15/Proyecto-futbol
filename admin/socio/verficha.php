<style>
#content input {
		background-image:url(../../images/bgsubmenu.jpg);
				border:1px solid blue;
				border-radius:5px;
				box-shadow: 0px 0px 1px 3px #000000;
				color:white;
				font-weight:bold;
				width:auto;
		}
h2
	{
	color:#A9F5BC;
	margin-left:100px;
	}
h3
	{
	color:#A9F5BC;
	}	
label {
		color:gold;}
</style>
<div id="content" style="border-radius:15px">
<?php
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT * FROM socio WHERE usuario='".$_GET['uskey']."'";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	 mysql_close($conexion);
?>


	<a href="javascript:hideLightbox();" style="position:fixed;margin-left:575px;margin-top:-22px;"><img src="./close.png"/></a>
	<h2>Editando ficha de: <?php echo $_GET['nombre']." ".$_GET['apellidos'] ; ?> </h2>
	<p style="margin-top:20px;"><label for="cont" style="margin-right:20px;">Generar contraseña</label><input name="cont" type="button" style="border-radius:10px;padding:5px;" value="generar contraseña" onclick="generarpass('<?php echo $_GET['uskey']; ?>')" /></p>
	<p style="margin-top:20px;">
	<label for="activo">Socio activo&nbsp;</label>
	<?php
	if($resultado['activo']=="s")
		{ ?>
		<input type="checkbox" id="activo" onclick="cambiaractivo('<?php echo $_GET['uskey']; ?>')" name="activo" checked="checked" />
		<?php }
	else 
		{ ?>
		<input type="checkbox"  id="activo" onclick="cambiaractivo('<?php echo $_GET['uskey']; ?>')" name="activo" />
		<?php }
	?>
	
	</p>
	<p style="margin-top:20px;"><label for="posicion">posición:&nbsp;</label>
	<select name="posicion" >
	<?php 
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT * FROM posicion ORDER BY id ASC";
	//echo $instruccion;
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $nfilas=mysql_num_rows ($consulta);

for($i=0;$i<$nfilas;$i++)
		{
		$posicion = mysql_fetch_array ($consulta);
		if ($resultado['posicion']==$posicion['id'])
			{
			echo "<option value=".$posicion['id']." selected>".$posicion['nombre']."</option>";
			}
		else {echo "<option value=".$posicion['id']." onclick=\"actualizarposicion('".$_GET['uskey']."','".$posicion['id']."')\" >".$posicion['nombre']."</option>";}
		}	 
	 
	 mysql_close($conexion);
	?>
	</select>
	<h3 style="margin-top:20px;">Goles, tarjetas y asistencia</h3>
	<hr />
	<table>
	<tr>
	<td>Temporada
	<?php 
	//saber el dia de hoy
	include('../../php/conexion.php');
	include ('../../php/calculartemporada.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT CURDATE( ) AS fechahoy FROM partido LIMIT 0 , 1";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	 $fechahoy=$resultado['fechahoy'];
	 mysql_close($conexion);
	
	$tempmayor=temporadamayor($fechahoy);
	$temporadapordefecto=$tempmayor;
	$tempmenor=temporadamenor($fechahoy);
	$romper=0;
	$romper1=0;
	$cont=1;
	?>
	<select>
	<?php
	
	while ($romper==0)
	{
	
		include ('../../php/conexion.php');
		$instruccion = " SELECT fecha FROM partido p WHERE fecha<='".$tempmayor."/06/30' AND fecha>='".$tempmenor."/09/01' ORDER BY fecha DESC LIMIT 0 , 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$nfilas=mysql_num_rows($consulta);
		$temporada=mysql_fetch_array($consulta);
		//echo "<option>".$nfilas." </option>";
		mysql_close($conexion);	
		
		if ($nfilas!=0)
		{
		$cont++;
		echo"<option value='".$tempmayor."' onclick=\"verestadistica('".$tempmayor."','".$_GET['uskey']."')\">".$tempmenor." - ".$tempmayor."</option>";
		
		 }
		 else {
			$tempmenor--;
			$tempmayor--;
			if ($cont==1){$temporadapordefecto=$tempmayor;} else {
			$temporadapordefecto=$tempmayor+$cont;}
					while ($romper1==0)
							{
							include ('../../php/conexion.php');
							$instruccion = " SELECT fecha FROM partido p WHERE fecha<='".$tempmayor."/06/30' AND fecha>='".$tempmenor."/09/01' ORDER BY fecha DESC LIMIT 0 , 1" ;
							$consultaa = mysql_query ($instruccion, $conexion);
							$nfilass=mysql_num_rows($consultaa);
							$temporadaa=mysql_fetch_array($consultaa);
							//echo "<option>".$nfilas." </option>";
							mysql_close($conexion);	
							if($nfilass!=0)
							{
							echo"<option value='".$tempmayor."' onclick=\"verestadistica('".$tempmayor."','".$_GET['uskey']."')\">".$tempmenor." - ".$tempmayor."</option>";
							$tempmenor--;
							$tempmayor--;
							}
							else {
								$romper1=1;
								}
							}
				$romper=1;
				}
				$tempmenor--;
			$tempmayor--;
	}
/*
UPDATE incidencias SET fecha='2012/01/01' WHERE fecha='2012/09/01';
UPDATE incidencias SET fecha='2012/01/07' WHERE fecha='2012/09/07';
UPDATE incidencias SET fecha='2012/01/14' WHERE fecha='2012/09/14';
UPDATE incidencias SET fecha='2012/01/21' WHERE fecha='2012/09/21';
UPDATE partido SET fecha='2012/01/01' WHERE fecha='2012/09/01';
UPDATE partido SET fecha='2012/01/07' WHERE fecha='2012/09/07';
UPDATE partido SET fecha='2012/01/14' WHERE fecha='2012/09/14';
UPDATE partido SET fecha='2012/01/21' WHERE fecha='2012/09/21';


UPDATE incidencias SET fecha='2012/09/01' WHERE fecha='2012/01/01';
UPDATE incidencias SET fecha='2012/09/07' WHERE fecha='2012/01/07';
UPDATE incidencias SET fecha='2012/09/14' WHERE fecha='2012/01/14';
UPDATE incidencias SET fecha='2012/09/21' WHERE fecha='2012/01/21';
UPDATE partido SET fecha='2012/09/01' WHERE fecha='2012/01/01';
UPDATE partido SET fecha='2012/09/07' WHERE fecha='2012/01/07';
UPDATE partido SET fecha='2012/09/14' WHERE fecha='2012/01/14';
UPDATE partido SET fecha='2012/09/21' WHERE fecha='2012/01/21';


*/
?>
	</select>
	</td>
	<td>Gol</td>
	<td>puntos</td>
	<td>Tarjetas amarillas</td>
	<td>Tarjetas Rojas</td>
	<td>Asistencia</td>
	</tr>
	<tr style="text-align:center" id="estadistica">
	<?php include('estadistica.php'); ?>
	</tr>
	</table>
	</p>
	<h3>Pagos</h3>
	<hr />
	<table style="margin:auto;">
	<tr>
		<th style="border-bottom:2px solid lightblue;color:orange;" colspan="7"> Temporada 
		<?php 
	//saber el dia de hoy
	include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT CURDATE( ) AS fechahoy FROM partido LIMIT 0 , 1";
	$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado = mysql_fetch_array ($consulta);
	 $fechahoy=$resultado['fechahoy'];
	 mysql_close($conexion);
	
	$tempmayor=temporadamayor($fechahoy);
	$temporadapordefecto=$tempmayor;
	$tempmenor=temporadamenor($fechahoy);
	$romper=0;
	$romper1=0;
	$cont=1;
	?>
	<select>
	<?php
	
	while ($romper==0)
	{
	
		include ('../../php/conexion.php');
		$instruccion = " SELECT fecha FROM pagos p WHERE fecha<='".$tempmayor."/06/30' AND fecha>='".$tempmenor."/09/01' ORDER BY fecha DESC LIMIT 0 , 1" ;
		$consulta = mysql_query ($instruccion, $conexion);
		$nfilas=mysql_num_rows($consulta);
		$temporada=mysql_fetch_array($consulta);
		//echo "<option>".$nfilas." </option>";
		mysql_close($conexion);	
		
		if ($nfilas!=0)
		{
		$cont++;
		echo"<option value='".$tempmayor."' onclick=\"verpagos('".$tempmayor."','".$_GET['uskey']."')\">".$tempmenor." - ".$tempmayor."</option>";
		
		 }
		 else {
			$tempmenor--;
			$tempmayor--;
			if ($cont==1){$temporadapordefecto=$tempmayor;} else {
			$temporadapordefecto=$tempmayor+$cont;}
					while ($romper1==0)
							{
							include ('../../php/conexion.php');
							$instruccion = " SELECT fecha FROM pagos p WHERE fecha<='".$tempmayor."/06/30' AND fecha>='".$tempmenor."/09/01' ORDER BY fecha DESC LIMIT 0 , 1" ;
							$consultaa = mysql_query ($instruccion, $conexion);
							$nfilass=mysql_num_rows($consultaa);
							$temporadaa=mysql_fetch_array($consultaa);
							//echo "<option>".$nfilas." </option>";
							mysql_close($conexion);	
							if($nfilass!=0)
							{
							echo"<option value='".$tempmayor."' onclick=\"verpagos('".$tempmayor."','".$_GET['uskey']."')\">".$tempmenor." ::- ".$tempmayor."</option>";
							$tempmenor--;
							$tempmayor--;
							}
							else {
								$romper1=1;
								}
							}
				$romper=1;
				}
				$tempmenor--;
			$tempmayor--;
	} ?>
		</select> 
		</th> 
	</tr>
	</table>
	<div id="pagos">
	<?php //include ('./verpagos.php'); ?>
	</div>
		</table>
	
	
	
	</div>