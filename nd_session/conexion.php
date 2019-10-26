<?php
	// linea necesaria para aceptar saltos de linea
	header("content-type: text/plain");

	// obj de conexion y sus propiedades
	$mysqli = new mysqli(
			"localhost",
			"root",
			"",
			"escula_bd");

	// al fallar la conexion entra a la condicion
	if ($mysqli->connect_errno) {
    	$errStr = "Fallo al conectar a MySQL: (" 
    		. $mysqli->connect_errno 
    		. ") " 
    		. $mysqli->connect_error;

    	// cncluir el programa para evitar mas errores
    	die($errStr);
	}
	echo $mysqli->host_info . "\n";

	// linea para hacer un insert
	/*mysqli_query(
		$mysqli, "insert into alumno_tb (id_alumno, Nombre) values ('', 'ESTUDIANTENUEVO')"
	);*/


	/*// linea para hacer un update
	mysqli_query(
		$mysqli, "update alumno_tb set Nombre = 'Lucia' where Nombre='ESTUDIANTENUEVO' "
	);*/

	// linea para hacer un delete
	mysqli_query(
		$mysqli, "delete from alumno_tb where Nombre='Alma' "
	);	

	// linea para hacer selects
	$respuesta = mysqli_query(
		$mysqli, "select * from alumno_tb"
	);

	// ciclo para leer los datos del query select
	foreach ($respuesta as $contador => $item) {
		echo($item['Nombre'] . "\n");
	}
	
	// cerrar la conexion
	mysqli_close($mysqli);
	// var_dump($resp);
?>