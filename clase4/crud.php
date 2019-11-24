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
				$resp .= '{ "name" ' . ': "' . $item['Nombre'] .'","apellido" ' . ': "' . $item['Apellido'] .'", "id" ' . ': "' . $item['id_alumno'] .'" }' ;
				
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


		public function insert_alumnos($name='noValue'){
			$resp = "";
			
			$temp = $this->objeto_conection->establecer_conection();
			
			// linea para hacer selects
			$respuesta =mysqli_query(
					$temp, "INSERT INTO alumno_tb (id_alumno, Nombre) values ('', '" . $name . "')"
				);

			// cerrar la conexion
			mysqli_close($temp);
			// var_dump($resp);
			return $resp;
		}

		public function update_alumnos($id, $name='noValue'){
			$temp = $this->objeto_conection->establecer_conection();
			
			// linea para hacer selects
			$respuesta = mysqli_query(
					$temp, "UPDATE alumno_tb SET Nombre = '" . $name . "' WHERE id_alumno = '" . $id . "' "
				);

			// cerrar la conexion
			mysqli_close($temp);
		}

		public function delete_alumnos($ID){
			$temp = $this->objeto_conection->establecer_conection();
			
			// linea para hacer selects
			$respuesta =mysqli_query(
					$temp, "delete from alumno_tb where id_alumno = " . $ID . " "
				);

			// cerrar la conexion
			mysqli_close($temp);
		}


	}


	// $obj_temp = new crud();
	// echo( $obj_temp->select_alumnos() );

 ?>