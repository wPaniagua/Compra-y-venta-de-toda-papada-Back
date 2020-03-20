<!DOCTYPE html>
<html>
<head>
	<title>PUBLITODO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
	<!--barra de navegacion para el administrador-->
	<div class="fixed-top">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		  <a class="navbar-brand font-weight-bold" href="#">PUBLITODO</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item " id="publicaciones">
		        <a class="nav-link  font-weight-bold" href="publicaciones-adminF.php">Publicaciones <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item " id="usuarios">
		        <a class="nav-link  font-weight-bold" href="verUsuariosDesdeAdminF.php" tabindex="-1" aria-disabled="true">Usuarios</a>
		      </li>
		      <li class="nav-item " id="categorias">
		        <a class="nav-link  font-weight-bold" href="categorias.php" tabindex="-1" aria-disabled="true">Categorias</a>
		      </li>
		   	  <li class="nav-item" id="productos">
		        <a class="nav-link  font-weight-bold" href="productos.php" tabindex="-1" aria-disabled="true">Productos</a>
		      </li>
		      <li class="nav-item" id="denuncias">
		        <a class="nav-link  font-weight-bold" href="denuncias.php" tabindex="-1" aria-disabled="true">Denuncias</a>
		      </li>
		      <li class="nav-item" id="reportes">
		        <a class="nav-link  font-weight-bold" href="#" tabindex="-1" aria-disabled="true">Reportes</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		    	<a href="perfilAdmin.php">
		    		<div id="imgNP"></div>
		    	</a>
		    </form>
		  </div>
		</nav>
	</div>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.css"></script>
	<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript"></script>

</body>
</html>
