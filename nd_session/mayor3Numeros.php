<?php 

	/**
	*	Encontrar el mayor de 3 numeros
	*   Contemplar unicamente valores 
	*   DIFERENTES entre cada variable
	**/

	// declarando variables nombradas con snake_case;
	$st_value = 5; # st hace referencia a first
	$nd_value = 3; # nd hace referencia a second
	$th_value = 9; # th hace referencia a third

	// declarando mensajes para el usuario
	$st_value_maj = "El primer valor es el mayor, con un valor de: " . $st_value . " el cual es mayor a: " . $nd_value . " y " . $th_value;
	$nd_value_maj = "El segundo valor es el mayor, con un valor de: " . $nd_value. " el cual es mayor a: " . $st_value . " y " . $th_value;
	$th_value_maj = "El tercer valor es el mayor, con un valor de: " . $th_value. " el cual es mayor a: " . $st_value . " y " . $nd_value;

	# evaluar si el primer valor es el mayor de todos
	if($st_value > $nd_value && $st_value > $th_value){
		echo $st_value_maj;
	}else{
		if($nd_value > $th_value){
			echo $nd_value_maj;
		}else{
			echo $th_value_maj;
		}
	}

 ?>