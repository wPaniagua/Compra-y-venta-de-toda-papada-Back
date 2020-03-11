<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PUBLITODO</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
	<!--Encabezado -->
	<?php
      include 'navbarAdmin.php';
    ?>
	<!--Fin Encabezado -->
	<!--Contenido div tabla denuncias -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 py-5">
				<br><br>
				<h3 class="text-center">Lista de denuncias</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-7 py-5">
			</div>
			<div class="col-5">
				<form class="form-inline my-2 my-lg-0 " id="formBusqueda">
                  <input class="form-control mr-sm-2" type="search" id="inputBusqueda" placeholder="Buscar Denuncia" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-lg-0" type="button">Buscar</button>
                </form>
			</div>
		</div>
		<div class="row py-2">
			<div class="col-1"></div>
			<div class="col-10">
				<div id="div_ini"></div>
            	<div id="div_table"></div>
			</div>
			
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!--script type="text/javascript" src="js/controladorCategoria.js"></script-->
    <script type="text/javascript" src="js/controladorDenuncias.php"></script>
</body>
</html>