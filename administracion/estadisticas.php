<?php 

include '../backend/seguridad.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/all.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes</title>
  <link href="../css/clasescss.css" rel="stylesheet" type="text/css">

  
  <link rel="stylesheet" href="../css/inicio.styles.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
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
            <li class="active"><a class="lista" href="reportesDenuncias.php" onclick="obtenerDenuncias()">Reportes Denuncias</a></li>
            <li class="active"><a class="lista" href="reportesUsuarios.php" onclick="obtenerUsuarios()">Reportes Usuarios</a></li>  
            <li class="active"><a class="lista" href="" onclick="">Estadisticas</a></li>
          </ul>

        </div>
        
        <div class="col-lg">
          <br><br><br><br>
          <div id="divEstadisticas"></div>
          <h4>Estadisticas</h4> 
          <div class="container">
            <div class="row">
              <div class="col-lg">
                <div class="panel panel-primary">
                  <div class="panel panel-heading"></div>
                  <div class="panel panel-body">
                    <div class="row">
                        <!--div class="col-sm">
                          <div id="cargaPastel"></div>
                        </div-->
                        <div class="col-sm">
                          <div id="cargaLineal"></div>
                        </div>
                        <div class="col-sm">
                          <div id="cargaBarra"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <br></br>
            <input type="button" class="btn active color-principal bg-success" name="imprimir" value="Imprimir" onclick="window.print();">
            <div id="divDenuncias"></div>
            <div id="divUsuarios"></div>
          </div> 
        </div>

      </div>
      
      
    </div>

  </div>
  
</div> 


</div>     

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../Graficas/Librerias/jquery-3.4.1.min.js"></script>
<script src="../Graficas/Librerias/plotly-latest.min.js"></script>
<!--script src="js/controlador_estadisticas.js"></script-->

</html>

<script type="text/javascript">
  $(document).ready(function () {

    $('#cargaBarra').load('Graficas/graficoBarra.php');
    $('#cargaPastel').load('Graficas/graficoPastel.php');
    $('#cargaLineal').load('Graficas/graficoLineal.php');
    console.log("DOM cargado");

  });
</script>

