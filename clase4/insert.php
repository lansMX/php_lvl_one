<?php  

		
	if( !empty($_POST['name']) ){

			$test = $_POST['name'];
			var_dump($test);



		include("crud.php");
		$obj_temp = new crud();
		$obj_temp->insert_alumnos($test);
		
	}

 ?>