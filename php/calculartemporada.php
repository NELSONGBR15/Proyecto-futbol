<?php 
function temporadamayor($fecha)
	{
	$mes=substr($fecha,5,2);
	$ano=substr($fecha,0,4);
	switch($mes)
		{
		case $mes=='08': $ano++;
						break;
		case $mes=='09': $ano++;
						break;
		case $mes=='10': $ano++;
						break;
		case $mes=='11': $ano++;
						break;
		case $mes=='12': $ano++;
						break;

		}
	return($ano);
	}
function temporadamenor($fecha)
	{
	$mes=substr($fecha,5,2);
	$ano=substr($fecha,0,4);
	switch($mes)
		{
		case $mes=='01': $ano--;
						break;
		case $mes=='02': $ano--;
						break;
		case $mes=='03': $ano--;
						break;
		case $mes=='04': $ano--;
						break;
		case $mes=='05': $ano--;
						break;
		case $mes=='06': $ano--;
						break;
		case $mes=='07': $ano--;
						break;

		}
	return($ano);
	}

//echo "el partido es de la temporada ".temporadamenor("2011/09/11")." - ".temporadamayor("2011/09/11");
?>