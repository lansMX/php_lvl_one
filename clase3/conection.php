<?php 

	/**
		Contiene variable y funciones
	 * 	Relacionado a conection de dase de datos
	 */
	class conectionDB
	{
		protected $HOST = "localhost";
		protected $SCHEMA = "escula_bd";
		private $USER = "root";
		private $PASW = "";
		public $puente_systema_db;
		
		function __construct()
		{
			$this->puente_systema_db = new mysqli(
				$this->HOST  ,
				$this->USER  ,
				$this->PASW  ,
				$this->SCHEMA
			);
		}

		/**
		* PUENTE DE CONECTION HACIA LA BASE DE DATOS
		*/
		public function establecer_conection(){

			// al fallar la conexion entra a la condicion
			if ($this->puente_systema_db->connect_errno) {
		    	$errStr = "Fallo al conectar a MySQL: (" 
		    		. $this->puente_systema_db->connect_errno 
		    		. ") " 
		    		. $this->puente_systema_db->connect_error;

		    	// cncluir el programa para evitar mas errores
		    	die($errStr);
			}
			//echo $this->puente_systema_db->host_info . "\n"; 

			return $this->puente_systema_db;
		}
	}

	

 ?>