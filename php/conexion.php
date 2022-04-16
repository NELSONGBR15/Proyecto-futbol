<?php
$servidor="localhost";
$usuario="root";
$pass="root";
$basededatos="futbol";
 
$conexion = mysql_connect ($servidor,$usuario,$pass)
					or die ("No se puede conectar con el servidor");

					// Seleccionar base de datos
					mysql_select_db ($basededatos)
					or die ("No se puede seleccionar la base de datos");
?>