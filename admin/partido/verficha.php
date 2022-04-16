<style>
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
		
#content {
	font-family: "Trebuchet MS",Tahoma,Verdana;
	background-color: #2e2e2e;
	background-image: none;
	background-repeat: repeat;
	background-attachment: scroll;
	background-position: 0% 0%;
	background-clip: border-box;
	background-origin: padding-box;
	background-size: auto auto;
	border:3px solid #cccccc;
	padding:10px;
 
		}
</style>

<div id="content" style="border-radius:15px">

	<a href="javascript:hideLightbox();" style="position:fixed;margin-left:595px;margin-top:-27px;"><img src="./close.png"/></a>
	<h2>Editando Jugador: <?php echo $_GET['nombre']." ".$_GET['apellidos'] ; ?> </h2>
<?php
/*
$_GET['nombre']
$_GET['apellidos']
$_GET['uskey']
$_GET['fecha']
*/
					include ('../../php/conexion.php');
					mysql_set_charset('utf8');
					$instruccion = "SELECT * from incidencias WHERE usuario='".$_GET['uskey']."' AND fecha='".$_GET['fecha']."'" ;
					$consulta = mysql_query ($instruccion, $conexion)
						or die ("Fallo en la consulta");
					$resultado1 = mysql_fetch_array ($consulta);
					mysql_close ($conexion);
 ?>	
	<br />
	<br />
	<table>
	<tr>
	<th>Amonestación</th>
	<th>Goles</th>
	<th>Puntos</th>
	<th>Color</th>
	</tr>
	<tr>
	<td>
	<?php
	include ('../../php/conexion.php');
		mysql_set_charset("utf8");
		$instruccion="select * from amonestacion order by id_amon";
		$consulta = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta $instruccion");
		mysql_close($conexion);
		$nfilas=mysql_num_rows($consulta);
		echo "<select><option value='0' onclick=cambiaramon('".$_GET['uskey']."','".$_GET['fecha']."','0','".$resultado1['color']."')>Ninguna</option>";
		for ($i=0;$i<$nfilas;$i++)
		{
		$resultado = mysql_fetch_array ($consulta);
		if ($resultado['id_amon']==$resultado1['amon']) 
			{
			echo "<option value='".$resultado['id_amon']."' selected >".$resultado['nombre']."</option>";
			}
		else {
			echo "<option value='".$resultado['id_amon']."' onclick=cambiaramon('".$_GET['uskey']."','".$_GET['fecha']."','".$resultado['id_amon']."','".$resultado1['color']."')>".$resultado['nombre']."</option>";
			}
		}
		echo "</select>"; 
		?>
	</td>
	<?php
	if ($resultado1['color']=='am') 
	{
	echo "<td><input id='gol' type='text' id='goles1' onblur=\"guardargol('".$_GET['uskey']."','".$_GET['fecha']."','".$resultado1['color']."')\" style='width:40px' maxlength='2' value='".$resultado1['golam']."'/></td>
	<td><input id='puntos' type='text' onblur=\"guardarpuntos('".$_GET['uskey']."','".$_GET['fecha']."')\" id='puntos' style='width:40px' maxlength='1' value='".$resultado1['puntos']."' /></td>
	<td>
	<select id='color'>
	<option value='am' selected >Amarillo</option>
	<option value='az' onclick=\"cambiacolorr('".$_GET['uskey']."','".$_GET['fecha']."','az') \">Azul</option>
	</select>
	</td>";
	}
	else
	{
	echo "<td><input type='text' id='goles' onblur=\"guardargol('".$_GET['uskey']."','".$_GET['fecha']."','document.getElementById('goles')','".$resultado1['color']."')\" style='width:40px' maxlength='2' value='".$resultado1['golaz']."'/></td>
	<td><input type='text' onblur=\"guardarpuntos('".$_GET['uskey']."','".$_GET['fecha']."','".$resultado1['puntos']."')\" id='puntos' style='width:40px' maxlength='1' value='".$resultado1['puntos']."' /></td>
	<td>
	<select id='color'>
	<option value='am' onclick=\"cambiacolorr('".$_GET['uskey']."','".$_GET['fecha']."','am') \">Amarillo</option>
	<option value='az' selected >Azul</option>
	</select>
	</td>";
	}
	?>
	</tr>
	</table>
	<br />
	<br />

	</div>