<?php
 include('../../php/conexion.php');
 $instruccion="SELECT * from socio WHERE usuario='".$_GET['nombreusu']."'";
 $consulta=mysql_query($instruccion,$conexion);
 $nfilas = mysql_num_rows ($consulta);	
// $resultado=mysql_fetch_array($consulta);
 mysql_close($conexion);

 if ($nfilas==0)
	{?>

	<?php }
else { ?>
<p style="color:red;">Éste nombre de usuario ya está siendo usado por otro socio</p>

	<?php } ?>