<?php 

	// linea necesaria para aceptar saltos de linea
	header("Content-type: text/plain");

	// sintaxis para un arreglo
	$array = [];

	// declarando arrelgos
	$array1 = ['a','b', 'c'];
	$array2 = [1, 2, 3];
	$array3 = ['a','b', 'c', 1, 3];

	// ciclo para leer un arreglo
	for ($i=0; $i < count($array3); $i++) { 
		echo "Position:" . $i . " value:" . $array3[$i] . "\n";
	}

 ?>