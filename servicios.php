<!DOCTYPE html>
<html>
<head>
	<title>PUBLITODO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--link href="css/font-awesome.css" rel="stylesheet"-->
	<link rel="stylesheet" type="text/css" href="css/all.css">

	<!-- tablas-->
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
</head>
<body>
	<?php
      include 'navbarAdmin.php';
    ?>
	
	<div><br><br><br><br></div>	
	<!--Prueba-->
	<section id="main">
      <div class="container-fluid px-3">
        <div class="row">
        <!--Columna agregar o editar -->
          <div class="col-md-4" >
				 <!--Columna agregar -->
				 <br>
				<div class="py-3" id="agregarCat" name="agregarProducto">
					<div class="list-group">
		              <button class="list-group-item active  bg-success text-light bg-dark" id="Agregar">
		                Agregar Servicio&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-plus-circle fa-lg"></i>
		              </button>
		             <div class="list-group">
		             	<div class="py-1">
							<br><h4 class="font-weight-bold">Datos Servicio</h4>
							<form class="py-4">
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtPro">Nombre Servicio:</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="nombrePro" name="nombreCat" class="form-control"><br>
										<span id="avisoPro"  style=" display: none; color:red">Debe llenar el producto</span>
									</div>
								</div>
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtCat">Nombre Categoria:</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="nombrePro" name="nombreCat" class="form-control"><br>
										<span id="avisoCat"  style=" display: none; color:red">Debe llenar la categoria</span>
									</div>
								</div>
								<div class="form-row ">
									<div class="col-3 ">
										<label id="txtDes">Descripcion:</label>
									</div>
									<div class="col-9 ">
										<textarea class="form-control" id="nombrePro" rows="5"></textarea><br>
										<span id="avisoCat"  style=" display: none; color:red">Debe llenar la descripcion</span>
									</div>
								</div><br>
								<button type="button" id="btnGuardarP" name="btnGuardarC" class="btn  btn-block p-3 mb-2 bg-success text-white font-weight-bold" onclick="guardarCategorias()">Guardar&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-save fa-lg"></i></button>
							</form>
						</div>
		             </div>
		            </div><br><br><br>
		        </div><!--Fin Columna agregar-->

		         <!--Columna editar -->
				 <br>
				<div class="py-3" id="editarProducto" name="editarProducto">
					<div class="list-group">
		              <button class="list-group-item active  bg-success text-light bg-dark" id="Agregar">
		                Editar Servicio&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-plus-circle fa-lg"></i>
		              </button>
		             <div class="list-group">
		             	<div class="py-1">
							<br><h4 class="font-weight-bold">Datos Servicio</h4>
							<form class="py-4">
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtProE">Nombre Servicio:</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="nombreProE" name="nombreCat" class="form-control"><br>
										<span id="avisoProE"  style=" display: none; color:red">Debe llenar el servicio</span>
									</div>
								</div>
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtCatE">Nombre Categoria:</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="nombreProE" name="nombreProE" class="form-control"><br>
										<span id="avisoCat"  style=" display: none; color:red">Debe llenar la categoria</span>
									</div>
								</div>
								<div class="form-row ">
									<div class="col-3 ">
										<label id="txtDesE">Descripcion:</label>
									</div>
									<div class="col-9 ">
										<textarea class="form-control" id="nombrePro" rows="5"></textarea><br>
										<span id="avisoProE"  style=" display: none; color:red">Debe llenar la descripcion</span>
									</div>
								</div><br>
								<button type="button" id="btnGuardarPE" name="btnGuardarC" class="btn  btn-block p-3 mb-2 bg-success text-white font-weight-bold" onclick="guardarCategorias()">Guardar&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-save fa-lg"></i></button>
							</form>
						</div>
		             </div>
		            </div><br><br><br>
		        </div>
				<!--Fin Columna editar-->

        </div> <!--Fin Columna agregar o editar-->
		<div class="col-1"></div>
        <div class="col-md-7 px-5">
            <!-- Vista rápida del sitio -->
              <!-- últimos usuarios -->
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><h3 class="panel-title">Lista Servicios</h3>
                </div>
                <br><br>    
                <div><span class="alert alert-danger" id="msjDelete"  style=" display: none; color:red"></span><br><br></div>   
                <div id="div_ini"></div>
                <div id="div_table"></div>
          </div>
        </div>
      </div>
    </section>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/controladorServicios.js"></script>
</body>
</html>