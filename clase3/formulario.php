<?php  
	include("crud.php");
	$obj_temp = new crud();
	// echo( $obj_temp->select_alumnos() );
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<title></title>
	<style type="text/css">
		#content{
			margin: 5%;
		}
	</style>
</head>
<body class="body">

	<br>
	<div id="content">
		<table id="example">
			<thead>
				<tr>
					<th>Nombre</th>		
					<th>Opciones</th>		
				</tr>
			</thead>
		</table>
	</div>

	<br>

	<script type="text/javascript">
		$('#example').DataTable( {
		    data: <?php echo $obj_temp->select_alumnos(); ?>,
		    columns: [
		        { data: 'name' },
		        { defaultContent: "<button>Opciones</button>" }
		    ]
		} );
	</script>

</body>
</html>