<?php  
	include("crud.php");
	$obj_temp = new crud();
	echo( $obj_temp->select_alumnos() );
?>