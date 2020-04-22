<?php 

include '../backend/seguridad.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>PubliTodo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--  /Booststrap -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>
	<?php
	include 'navbarU.php';
	?>
<br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-2 py-5">
   			<br><br>
    <div class="btn-group-vertical">
    	<button class="btn btn-danger">Administra tus publicaciones</button>
				<a href="agregarPublicacion.php" class="btn btn-outline-danger btn-lg btn-block" id="btnAdd"><i class="fas fa-plus-circle" ></i>Agregar Publicaciones</a>
		</div>
	</div><!--fin menu--->

	<div class="col-md-10 py-5">
		<br><br>
		<center><h3>Mis Publicaciones</h3></center>
		<div class="row" id="anuncios">
		</div>
	</div>
</div>








<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js.descarga"></script>

<script src="../js/controlador_AgregarPublicacion.js"></script>

<script type="text/javascript" src="../js/fotoAdmin.js"></script>

</body>

