<?php 
if (isset($_GET['tempmayor']))
{
//gol,punt,amarillas,rojas de jugador x en temporada x
include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select (SUM(golam)+SUM(golaz)) as gol,SUM(puntos) as punt,(SUM(amaz)+SUM(amam)) as amarillas,(SUM(roaz)+SUM(roam)) as rojas from partido p
LEFT join incidencias i ON i.fecha=p.fecha
where i.fecha>='".($_GET['tempmayor']-1)."-09-01' AND i.fecha<='".$_GET['tempmayor']."-06-30' AND usuario='".$_GET['uskey']."' GROUP BY usuario";
	//echo $instruccion;
	$consulta1 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado1 = mysql_fetch_array ($consulta1);
	 mysql_close($conexion);
//num partidos jugados por jugador x de temporada y
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select count(local) as numpartjug from partido p
LEFT join incidencias i ON i.fecha=p.fecha where i.fecha>='".($_GET['tempmayor']-1)."-09-01' AND i.fecha<='".$_GET['tempmayor']."-06-30' AND usuario='".$_GET['uskey']."' GROUP BY usuario";
	//echo $instruccion;
	$consulta2 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado2 = mysql_fetch_array ($consulta2);
	 mysql_close($conexion);
	 
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT count( * ) AS parttot
FROM partido p where p.fecha>='".($_GET['tempmayor']-1)."-09-01' AND p.fecha<='".$_GET['tempmayor']."-06-30'";
	//echo $instruccion;
	$consulta3 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado3 = mysql_fetch_array ($consulta3);
	 mysql_close($conexion);
	echo " <td></td>
	<td><a href='#' onclick=\"window.open('./vergol.php?temporadamayor=".$_GET['tempmayor']."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=730,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['gol']."</a></td>
	<td><a href='#' onclick=\"window.open('./verpuntos.php?temporadamayor=".$_GET['tempmayor']."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['punt']."</a></td>
	<td><a href='#' onclick=\"window.open('./veramarillas.php?temporadamayor=".$_GET['tempmayor']."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['amarillas']."</a></td>
	<td><a href='#' onclick=\"window.open('./verrojas.php?temporadamayor=".$_GET['tempmayor']."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['rojas']."</a></td>
	<td><a href='#' onclick=\"window.open('./verpartidosjugados.php?temporadamayor=".$_GET['tempmayor']."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado2['numpartjug']."</a>/".$resultado3['parttot']."</td>";
}
else if($temporadapordefecto!=0){
//gol,punt,amarillas,rojas de jugador x en temporada x
include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select (SUM(golam)+SUM(golaz)) as gol,SUM(puntos) as punt,(SUM(amaz)+SUM(amam)) as amarillas,(SUM(roaz)+SUM(roam)) as rojas from partido p
LEFT join incidencias i ON i.fecha=p.fecha
where i.fecha>='".($temporadapordefecto-1)."-09-01' AND i.fecha<='".$temporadapordefecto."-06-30' AND usuario='".$_GET['uskey']."' GROUP BY usuario";
	//echo $instruccion;
	$consulta1 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado1 = mysql_fetch_array ($consulta1);
	 mysql_close($conexion);
//num partidos jugados por jugador x de temporada y
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="select count(local) as numpartjug from partido p
LEFT join incidencias i ON i.fecha=p.fecha where i.fecha>='".($temporadapordefecto-1)."-09-01' AND i.fecha<='".$temporadapordefecto."-06-30' AND usuario='".$_GET['uskey']."' GROUP BY usuario";
	//echo $instruccion;
	$consulta2 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado2 = mysql_fetch_array ($consulta2);
	 mysql_close($conexion);
	 
	 include('../../php/conexion.php');
	mysql_set_charset("utf8");
	$instruccion="SELECT count( * ) AS parttot
FROM partido p where p.fecha>='".($temporadapordefecto-1)."-09-01' AND p.fecha<='".$temporadapordefecto."-06-30'";
	//echo $instruccion;
	$consulta3 = mysql_query ($instruccion, $conexion)
				or die ("Fallo en la consulta");
	 $resultado3 = mysql_fetch_array ($consulta3);
	 mysql_close($conexion);
	echo " <td></td>
	<td><a href='#' onclick=\"window.open('./vergol.php?temporadamayor=".$temporadapordefecto."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=730,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['gol']."</a></td>
	<td><a href='#' onclick=\"window.open('./verpuntos.php?temporadamayor=".$temporadapordefecto."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['punt']."</a></td>
	<td><a href='#' onclick=\"window.open('./veramarillas.php?temporadamayor=".$temporadapordefecto."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['amarillas']."</a></td>
	<td><a href='#' onclick=\"window.open('./verrojas.php?temporadamayor=".$temporadapordefecto."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado1['rojas']."</a></td>
	<td><a href='#' onclick=\"window.open('./verpartidosjugados.php?temporadamayor=".$temporadapordefecto."&uskey=".$_GET['uskey']."','popup','scrollbars=1,width=740,height=700,top='+(screen.height*0.2)+',left='+(screen.width*0.2))\">".$resultado2['numpartjug']."</a>/".$resultado3['parttot']."</td>";
	$temporadapordefecto=0;
}

?>
