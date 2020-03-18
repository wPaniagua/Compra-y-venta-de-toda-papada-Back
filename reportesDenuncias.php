<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="css/bootstrap.min.css">
  <!--link href="css/font-awesome.css" rel="stylesheet"-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/all.css">
  <title>Reportes</title>
  <link  rel="stylesheet" type="text/css" href="css/clasescss.css">
 

  <!--link rel="stylesheet" href="css/vertical-menu.css"-->
  <!-- Custom styles for this template -->

</head>

<body>
  <?php
  include 'navbarAdmin.php';
  ?>

  <!-- Envoltura Barra Izquierda & Contenido de la Pagina -->
  <div  id="wrapper">

    <!-- Barra Izquierda & Contenido de la Pagina -->
    <div class="container-fluid container-fluid-fix">

      <div class="row row-margin-fix">

        <!-- Barra de Menu Izquierdo-->
        <div id="sidebar-wrapper" class="col-sm-5 col-md-2 col-lg-2 sidebar hidden-xs envoltura-barra-principal">
          <ul class="nav nav-sidebar borde-dos">
            <li class="active"><a class="lista" href="" onclick="obtenerDenuncias()">Reportes Denuncias</a></li>
            <li class="active"><a class="lista" href="reportesUsuarios.php" onclick="obtenerUsuarios()">Reportes Usuarios</a></li>  
            <li class="active"><a class="lista" href="Estadisticas.php" onclick="obtenerEstadisticas()">Estadisticas</a></li>
          </ul>

        </div>
        
        <div class="col-lg">
          <br><br>
          <br><br>
          <div id="divDenuncias" >
            <h4>Lista de Denuncias</h4>

            <br></br> 

          </div> 
          <br></br>
          <br></br><br></br><br></br>
          <input type="button"  class="btn active color-principal bg-success" name="imprimir" value="Imprimir" onclick="window.print();">
        </div>

      </div>

      <div id="divUsuarios"></div>
      <div id="divEstadisticas" ></div>

    </div>

  </div>

</div> 


</div>  

<!--<input type="button" class="btn active color-principal bg-success" name="imprimir" value="Imprimir" onclick="window.print();">-->



</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script src="js/controladorReportes.js"></script>


</html>