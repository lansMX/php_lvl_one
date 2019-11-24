<?php  
	
	include("crud.php");

	var_dump($_POST['nombreFacil'] );
	
	$variable = new crud();
	$variable->delete_alumnos($_POST['nombreFacil']);

 ?>