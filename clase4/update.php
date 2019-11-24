<?php 
	include('crud.php');

	$instancia = new crud();

	$instancia->update_alumnos($_POST['identificador'], $_POST['name']);

 ?>