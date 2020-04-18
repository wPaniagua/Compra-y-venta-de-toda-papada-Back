<?php 
  include '../backend/seguridad.php';
?>

<!--?php
$errores = '';

if (isset($_POST['#btnPublicar'])){
	$titulo = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$categoria = $_POST['sls-categoria'];
	$precio = $_POST['precio'];

	if(!empty($titulo)){
		$titulo =filter_var($titulo);
	}else {
		$errores .= 'Agregue un titulo';
	}

	if(!empty($descripcion)){
		$descripcion =filter_var($descripcion);
	}else {
		$descripcion .= 'Agregue una descripcion';
	}

	if(!empty($categoria)){
		$categoria =filter_var($categoria);
	}else {
		$errores .= 'Debe seleccionar una categoria';
	}

	if(!empty($precio)){
		$precio =filter_var($precio);
	}else {
		$errores .= 'Agregue un precio';
	}

} 
?-->
<!DOCTYPE html>
<html>
<head>
	<title>PubliTodo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<!-- Booststrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--  /Booststrap -->

	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/modal.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!--link href="css/font-awesome.css" rel="stylesheet"-->
	<link rel="stylesheet" type="text/css" href="../css/pruebaaa.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

	

</head>
<body>
	<!--?php
	include 'usuarioCV/navbarU.php';
	?-->
	
	<div><br><br><br><br></div>
	
	<div class="testbox">
		<h1>Editar Aviso</h1>
    
		<form action="/"> 
			
			<hr>
			<div class="accounttype">
				<input type="radio" value="Producto" id="radioProducto" name="tipo" checked/>
				<label for="radioProducto" class="radio" chec>Producto</label>
				<input type="radio" value="Servicio" id="radioServicio" name="tipo" />
				<label for="radioServicio" class="radio">Servicio</label>
			</div>
			<fieldset>
				<legend>Información del Aviso</legend>
				<!--label for="categorias">Categoria:</label>
				<select id="categorias" name="categorias">

				</select-->
				<label for="slc-categorias">Categoria: </label><br>
				<select name="slc-categorias" id="slc-categorias">
					<option value="null">Seleccionar</option>
					<span style="color: red;display: none" id="avisoCategorias" >Debe seleccionar una categoria</span>
				</select>
				<label for="titulo">Título/Nombre:</label>
				<input type="text" id="titulo" name="titulo">
				<span style="color: red;display: none" id="avisoTitulo" >Debe colocar un título o nombre</span>

				<label for="descripcion">Descripción:</label>
				<textarea id="descripcion" name="descripcion">
				</textarea>
				<span style="color: red;display: none" id="avisoDescripcion" >Debe colocar una descripción del producto o servicio</span>

				
				<label for="precio">Precio:</label>
				<input type="text" id="precio" name="precio">
				<input type="radio" value="1" id="radioLps" name="moneda" checked/>
				<label for="radioLps" class="radio" chec>Lempiras</label>
				<input type="radio" value="2" id="radioDolar" name="moneda"/>
				<label for="radioDolar" class="radio">Dólares</label> </label>
				<div class="container">
					<section id="Images" class="images-cards">
						<form action="upload.php" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-xl-2 col-lg-4 col-md-2 col-sm-2 col-xl-6" id="add-photo-container">
									<div class="add-new-photo first"  id="add-photo">
										<span><i class="icon-camera"></i></span>
									</div>
									<input type="file" multiple id="add-new-photo" name="images[]">
								</div>
							</div>
						</form> 
					
					</section>
				</div>
				
					<!--legend><span class="number">2</span>Ubicación del Aviso</legend>
					<div class="form-group">

						<label for="departamentos">Departamento</label>

						<select id="departamentos" class="form-control">
							<option selected="selected" value="null">No hay nada que cargar</option>

						</select>

					</div>
				<div class="form-group">

					<label for="municipios">Municipios</label>

					<select id="municipios" class="form-control">
						<option selected="selected" value="null">Seleccione un departamento arriba</option>

					</select>

				</div-->
			</fieldset>
			<button type="submit" id="#btnPublicar" class="btn btn-primary submitBtn" onclick="registrarDatos();">Publicar Anuncio</button>
			
		</form>

	</form>
</div>	


<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/prueba.js"></script>
<script src="../js/controlador_AgregarPublicacion.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/functions.js"></script>
<script src="../js/scripts.js"></script>

</body>
</html>