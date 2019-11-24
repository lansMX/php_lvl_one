<?php  
	include("crud.php");
	$obj_temp = new crud();
	// echo( $obj_temp->select_alumnos() );
?>
<!DOCTYPE html>
<html>
<head>
	<!-- jquery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- datatables -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js"></script>

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<style type="text/css">
		#addUser{
			margin: 5% 0 0 75%;	
			border-radius: 5px;
			background-color: #333;
			border-color: #000;
			color: #fff;
		}
		#conteinerTable{
			margin: 5%;	
		}
		.btntb{
			margin: 2.5%;
		}
	</style>

</head>
<body class="body">
	<!-- barra de navegacion https://getbootstrap.com/docs/4.3/components/navbar/ -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#">Navbar</a>

	  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

	<button id="addUser" onclick="addUser()">add User</button>
		

	<br>
	<div id="container">
		<div id="conteinerTable">
			<table id="example" class="stripe">
				<thead>
					<tr>
						<th>Nombre</th>	
						<th>Apellido</th>		
						<th>Opciones</th>		
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<br>

	<script type="text/javascript">
		$(document).ready(function(){
			// function que carga la tabla de info
			cargarAsync();
		});

		/**
		* Funciones de crud AJAX
		*/
		// create
		function addUserRequest(info) {
			$.ajax({
				method : 'POST',
				url : 'insert.php',
				dataType : 'json',
				data : { name : info }
			});

			setTimeout(function function_name() {
				reinitilizeTable();
		    }, 500);
		}
		// read
		function cargarAsync() {
			$.ajax({
				method : 'POST',
				url : 'selectAlumnos.php',
				dataType : 'json',
				success: function(result){
					console.log(result);
					loadTable(result);
				}
			});
		}
		// update
		function updateUserRequest(id, info) {
			$.ajax({
				method : 'POST',
				url : 'update.php',
				dataType : 'json',
				data : { identificador : id, name : info }
			});

			setTimeout(function function_name() {
				reinitilizeTable();
		    }, 500);
		}
		// delete
		function eliminarRegistro(id){
			$.ajax({
				method : 'POST',
				url : 'eliminar.php',
				dataType : 'json',
				data: { nombreFacil : id }
			});

			setTimeout(function function_name() {
				reinitilizeTable();
		    }, 500);
		}


		/**
		* Funciones que cargan la tabla
		*/
		// reainicializar la tabla
		function reinitilizeTable() {
			$('#example').dataTable().fnClearTable();
		    $('#example').dataTable().fnDestroy();
		    // cargar la tabla de forma asincrona
		    cargarAsync();
		}
		// crear tabla
		function loadTable(dataSource) {		
			$('#example').DataTable( {
			    data: dataSource,
			    columnDefs: [
		            { width: 150, targets: [0,1,2] }
		        ],
			    columns: [
			        { data: 'name' },
			        { data: 'apellido' },
				    { 
				    	render : function ( data, type, full, meta ) {
		                   		return '<button id=' + full.id + ' class="btntb btn btn-secondary" ' +
		                   		       'value="'+ full.name +'" onclick="updateFn(this)"   >Update</button>' 
		                     			+ 
		                     		'<button id=' + full.id + ' class="btntb btn btn-dark" '+
		                     		    'value="' + full.name + '" onclick="deleteFn(this)">Delete</button>';
		                }
	                 }

			    ]
			} );
		}

		/**
		* funciones realcionas a la tabla 
		*/
		// accion onclick de button Update (ver funcion: loadTable())
		function updateFn(ctrl){
			
			Swal.fire({
			  title: "<i>Actualizar usuario</i>", 
			  html: '<input id="idUpd" placeholder="'+ ctrl.id +'" value="'+ ctrl.id +'" type="hidden" >' +
			  		'<input id="input" placeholder="'+ ctrl.value +'" value="'+ ctrl.value +'" type="text" >',
			  confirmButtonText: true
			}).then((result) => {
				
				updateUserRequest(
					document.getElementById('idUpd').value,
					document.getElementById('input').value
				);
			})
		}
		// accion onclick de button Delete (ver funcion: loadTable())
		function deleteFn(ctrl){
			/*Codigo copiada de sweet alert excepto linea 222*/
			const swalWithBootstrapButtons = Swal.mixin({
			  	customClass: {
			    	confirmButton: 'btn btn-success',
			    	cancelButton: 'btn btn-danger'
			  	},
			  	buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
			  title: 'Esta seguro ?',
			  text: "Eliminara a " + ctrl.value,
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Si, eliminalo!',
			  cancelButtonText: 'No, me arrepentì!',
			  reverseButtons: true
			}).then((result) => {
					if (result.value) { 
						// funcion que eliminará el registro
					  	    eliminarRegistro(ctrl.id);

					    swalWithBootstrapButtons.fire(
					      'Eliminado!',
					      'Tu alumno fue eliminado.',
					      'success'
					    )
					  } else if (
					    /* Read more about handling dismissals below */
					    result.dismiss === Swal.DismissReason.cancel
					  ) {
					    swalWithBootstrapButtons.fire(
					      'Cancelado',
					      'Tu alumno sigue a salvo :)',
					      'error'
					    )
					  }
			})
		}

		
		// function para agregar un usuario
		function addUser(){
			Swal.fire({
			  title: "<i>Agrega usuario</i>", 
			  html: '<input id="input" type="text" name="name">',
			  confirmButtonText: true
			}).then((result) => {
				alert(document.getElementById('input').value);
				addUserRequest(document.getElementById('input').value);
			})
		}
	</script>

</body>
</html>