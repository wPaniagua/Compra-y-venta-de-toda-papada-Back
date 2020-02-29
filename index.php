<!DOCTYPE html>
<html>
<head>
	<title>Proyecto ingenieria del sofware</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<h1 class="text-center">Pruebas Conexion base de datos</h1>

	<?php 
		include_once 'class-conexion.php';
		$conexion = new Conexion();

		$sql = "SELECT * FROM persona";
  		$resultado = $conexion->ejecutarConsulta($sql); 
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3">
				
			</div>
			<div class="col-6">

				<table class="table table-striped table-hover">                     
		          <tr>
		            <th>Nombre</th>
		            <th>Apellidos</th>
		            <th>Correo </th>
		            <th>Direccion</th>
		          </tr>
		          <?php while( $persona = $conexion->obtenerFila($resultado) ){ ?>
		            <tr>
		              <td><?php echo $persona["primerNombre"]." ".$persona["segundoNombre"] ; ?></td>
		              <td><?php echo $persona["primerApellido"]." ".$persona["segundoApellido"] ; ?></td>
		              <td><?php echo $persona["correo"] ; ?></td>
		              <td><?php echo $persona["idMunicipio"] ; ?></td>
		              <td>
		                <a class="btn btn-danger" href="pedido.php?id=<?php echo $persona['ID'] ?>">Prueba</a> 
		              </td>
		            </tr>
		          <?php } ?>
		        </table>
				
			</div>
			
		</div>
	</div>



</body>
</html>
