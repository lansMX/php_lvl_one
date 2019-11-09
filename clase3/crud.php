<?php 
	include("conection.php");
	
	/**
	 * 
	 */
	class crud extends conectionDB
	{
		private $objeto_conection;

		function __construct()
		{
			$this->objeto_conection = new conectionDB();
		}

		public function select_alumnos(){
			$resp = "";
			
			$temp = $this->objeto_conection->establecer_conection();
			
			// linea para hacer selects
			$respuesta = mysqli_query(
				$temp, "select * from alumno_tb"
			);

			$resp = '[';
			// ciclo para leer los datos del query select
			foreach ($respuesta as $contador => $item) {
				$resp .= '{ "name" ' . ': "' . $item['Nombre'] .'" }' ;
				
				if( $contador < $respuesta->num_rows - 1){
					$resp .= ',';
				}

			}
			$resp .= ']';
			
			// cerrar la conexion
			mysqli_close($temp);
			// var_dump($resp);
			return $resp;
		}
	}


	// $obj_temp = new crud();
	// echo( $obj_temp->select_alumnos() );

 ?>