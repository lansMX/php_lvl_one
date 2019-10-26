<?php 
	
	// linea necesaria para aceptar saltos de linea
	header("content-type: text/plain");
	
	// declarando arrelgo
	$array = [0,1,2];

	// una forma mas para leer un arreglo
	foreach ($array as $i => $contenido_de_posicion) {
		echo $contenido_de_posicion . "\n";
	}

 ?>