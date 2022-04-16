<?php

function formateodia($fecha)
	{
	$dia=substr($fecha,8,2);
	switch($dia)
		{
			case $dia=='01': $dia=1;
							break;
			case $dia=='02': $dia=2;
							break;
			case $dia=='03': $dia=3;
							break;
			case $dia=='04': $dia=4;
							break;
			case $dia=='05': $dia=5;
							break;				
			case $dia=='06': $dia=6;
							break;			
			case $dia=='07': $dia=7;
							break;
			case $dia=='08': $dia=8;
							break;
			case $dia=='09': $dia=9;
							break;
		}
	return($dia);
	}

function formateomes($fecha)
	{
	$mes=substr($fecha,5,2);
	switch($mes)
		{
		case $mes=='01': $mes='Enero';
						break;
		case $mes=='02': $mes='Febrero';
						break;
		case $mes=='03': $mes='Marzo';
						break;
		case $mes=='04': $mes='Abril';
						break;
		case $mes=='05': $mes='Mayo';
						break;
		case $mes=='06': $mes='Junio';
						break;
		case $mes=='07': $mes='Julio';
						break;
		case $mes=='08': $mes='Agosto';
						break;
		case $mes=='09': $mes='Septiembre';
						break;
		case $mes=='10': $mes='Octubre';
						break;
		case $mes=='11': $mes='Noviembre';
						break;
		case $mes=='12': $mes='Diciembre';

		}
	return($mes);
	}
function cambiacolor($texto)
 {
	if ($texto=='am') {return('Amarillo');}
	else {return('Azul');}
 }
 
?>
