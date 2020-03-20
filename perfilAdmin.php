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

    ?>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-4 ">
              <br><br>
              <span class="text-uppercase text-center"><br><br><h4 id="hNombre">Usuario Logueado</h4></span><br>
              <div class="text-center px-5"  id="imgUsuario"></div>
              <br>
            
          <!-- Modal imagen perfil--->
          <!-- Button trigger modal -->
          <center>
             <button type="button" class="btn btn btn-light" data-toggle="modal" data-target="#exampleModal">
              Cambiar imagen perfil
            </button>

          </center>
     

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Foto de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="principal">
                <form action="" id="form_subir">
                  
                  <div class="container">
                    <div class="row">
                      <div class=" col-sm-12">
                        <label>Foto a subir:</label>
                      </div>
                      <div class="col-sm-12">
                        <input class="alert alert-secondary" type="file" name="archivo" required>
                      </div>

                      <div id="msj" class="alert alert-danger" role="alert" style="display: none">
                        Imagen editada correctamente
                      </div>
                    </div>
                    
                  </div>
                  <br>
                  <div class="acciones">
                    <input class="btn btn-danger" type="submit" name="" value="Subir Foto perfil">
                  </div>
                </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="cargarFoto();" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
              </div>
            </div>
          </div>
        </div><!-- Fin modal--->

                <!--img src="imgUsers/pic.png" class="rounded-circle" alt="..." style="width: 250px;height: 250px;">
                    <div class="form-group">
                    <label>Cambiar imagen:</label>
                    <input class="form-control alert-secondary btn" type="file" id="imagen" name="imagen" required>
                    </div>
                    <br>
                </form-->
            </div>
            <div class="col-12 col-sm-4 py-5 p-xl-5 col-sm-offset-3"><!--campos administrador  -->
                <!--formulario administrador  -->
                <form>
                  <br><br>
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
                  <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" class="form-control alert alert-secondary" id="txtTelefono" placeholder="telefono administrador">
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
                  <button class="btn btn-success" type="button" id="cerrarSesion">Cerrar Sesion </button>
                </form><!--end formulario administrador  -->
            </div><!--end campos administrador  -->
        </div>
    </div>


    

</body>
<!--script type="text/javascript" src="js/jquery-3.4.1.min.js"></script-->
<script src="js/perfilAdmin.js"></script>
<!--script type="text/javascript" src="js/controladorAdministrador.js"></script-->

</html>