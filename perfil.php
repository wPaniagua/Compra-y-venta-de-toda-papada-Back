<?php 

include 'backend/seguridad.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <?php 
    /*incluir navbar*/
    //include 'navbarAdmin.php';
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
    <br><br>
    <div class="container py-5">
        <div class="row">
            <div class="col-4">
                
            </div>
            <div class="col-5">

                <form>
                    <h1 class="text-center">Usuario Logueado</h1>
                    <h3 class="text-center" id="hNombre" style="color:blue"></h3>
                  <div class="form-group">
                    <label for="Nombre" id="pnombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre usuario Administrador">
                  </div>
                  <div class="form-group">
                    <label for="Correo">Correo</label>
                    <input type="email" class="form-control" id="correo" placeholder="Correo administrador">
                  </div>
                </form>
                <br><br><button class="btn btn-primary" type="button" id="cerrarSesion">Cerrar Sesion </button>
            </div>
        </div>
    </div>


    

</body>

<script src="js/perfil.js"></script>

</html>