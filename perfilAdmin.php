<?php 

  include("backend/seguridad.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLITODO</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <?php 

    //llamado a nabvar
    include 'navbarAdmin.php';
    // $mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );

    // $correo;

    // $stmt = $mysqli -> prepare('SELECT  correo FROM persona WHERE idPersona = ?');

    // $userId = $_SESSION["id_usuario"]; // or $_GET['userId'];
    
    // $stmt -> bind_param('i', $userId);
    // $stmt -> execute();
    // $stmt -> store_result();
    // $stmt -> bind_result($correo, );
    // $stmt -> fetch();
    
    // echo $correo; // Teodor
    ?>
    <br><br><br><br>
    <div class="container py-5">
        <div class="row">
            <div class="col-4">
                <h4 id="hNombre">Usuario Logueado</h4>
                <div id="imgUsuario"></div>
                <img src="imgUsers/pic.png" class="rounded-circle" alt="..." style="width: 250px;height: 250px;">
                    <div class="form-group">
                    <label>Cambiar imagen:</label>
                    <input class="form-control alert-secondary btn" type="file" id="imagen" name="imagen" required>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-4 py-5"><!--campos administrador  -->
                <!--formulario administrador  -->
                <form>
                  <div class="form-group alert alert-warning">
                    <h4>Datos personales</h4>
                  </div>
                  <div class="form-group">
                    <label for="Nombre" >Nombre</label>
                    <input type="text" class="form-control alert alert-secondary" id="txtNombre" placeholder="Nombre usuario Administrador">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" class="form-control alert alert-secondary" id="txtCorreo" placeholder="Correo administrador">
                  </div>
                  <div class="form-group">
                    <label for="Fecha nacimiento">Fecha de nacimiento:</label>
                    <div class="alert alert-secondary" role="alert" id="fecha">
            
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Departamento">Departamento Residencia:</label>
                    <select id="departamentos" class="form-control  alert-secondary">
                        <option selected="selected" value="null">No hay nada que cargar</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Correo">Municipio:</label>
                    <select id="municipios" class="form-control  alert-secondary">
                        <option selected="selected" value="null">Seleccione un departamento</option>
                    </select>
                  </div>
                  <button class="btn btn-danger" onclick="editPerfil(1)">Guardar</button>
                </form><!--end formulario administrador  -->
            </div><!--end campos administrador  -->
        </div>
    </div>


    <button type="button" id="cerrarSesion">Cerrar Sesion </button>

</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="js/perfilAdmin.js"></script>
<!--script type="text/javascript" src="js/controladorAdministrador.js"></script-->

</html>