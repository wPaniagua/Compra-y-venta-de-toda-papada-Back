<!DOCTYPE html>
<html>
<head>
	<title>PUBLITODO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--link href="css/font-awesome.css" rel="stylesheet"-->
	<link rel="stylesheet" type="text/css" href="css/all.css">
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
				 <br><br>
				<div class="py-5" id="agregarCat" name="agregarCat">
					<div class="list-group">
		              <button class="list-group-item active color-principal bg-success" id="Agregar">
		                Agregar Categoria&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-plus-circle fa-lg"></i>
		              </button>
		             <div class="list-group">
		             	<div class="py-1">
							<br><br><h4 class="font-weight-bold">Datos Categoria</h4>
							<form class="py-4">
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtCat">Nombre Categoria</label>
									</div>
									<div class="col-6 ">
										<input type="text" id="nombreCat" name="nombreCat" class="form-control">
										<span id="avisoCat"  style=" display: none">Debe llenar la categoria</span>
									</div>
								</div><br>
								<button type="button" id="btnGuardarC" name="btnGuardarC" class="btn btn-success btn-block" onclick="guardarCategorias()">Guardar&nbsp;&nbsp;&nbsp;&nbsp; <i class="fas fa-save fa-lg"></i></button>
							</form>
						</div>
		             </div>
		            </div><br><br><br>
		        </div><!--Fin Columna agregar-->

		         <!--Columna editar -->

				<div id="editarCat" name="editarCat" style="display: none">
					<br>
					<div class="list-group">
		              <button class="list-group-item active color-principal bg-success" id="Agregar">
		                Editar Categoria
		              </button>
		             <div class="list-group">
		             	<div class="py-3">
							<br><br><h3>Datos Categoria</h3>
							<form class="py-4">
								<div class="form-row " style="display: none">
									<div class="col-5 ">
										<label id="txtCod">Codigo</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="cod" name="cod" class="disabled form-control ">
									</div>
								</div><br>
								<div class="form-row ">
									<div class="col-5 ">
										<label id="txtCat">Nombre Categoria</label>
									</div>
									<div class="col-7 ">
										<input type="text" id="nombreCatEdit" name="nombreCatEdit" class="form-control">
										<span id="avisoCatE" style="display: none">Debe llenar la categoria</span>
									</div>
								</div><br>
								<button type="button" id="btnEditarC" name="btnEditarC" class="btn btn-success btn-block" onclick="editCategorias()">Editar</button>
							</form>
						</div>
		             </div>
		            </div><br><br><br>
		        </div><!--Fin Columna editar-->

        </div> <!--Fin Columna agregar o editar-->
		<div class="col-1"></div>
        <div class="col-md-7 px-5">
            <!-- Vista rápida del sitio -->
              <!-- últimos usuarios -->
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><h3 class="panel-title">Lista Categorias</h3>
                </div>
				<!-- Busqueda usuarios -->
                <div><br>
                  	<form class="form-inline my-2 my-lg-0">
				      <input id="buscarCat" name="buscarCat" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="buscar()">Buscar</button>&nbsp;&nbsp;&nbsp;&nbsp;
				      <button id="buscarT" class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="obtenerCategorias();" style="display: none">Todos</button>
				    </form><br>
				    <span id="avisoCatB" style="color: red; display: none">Debe llenar la busqueda</span>
                  </div>
              </div>
                <div id="div_ini"></div>
                <div id="div_table"></div>
          </div>
        </div>
      </div>
    </section>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/controladorCategoria.js"></script>
</body>
</html>