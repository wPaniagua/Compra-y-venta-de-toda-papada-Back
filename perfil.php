<?php 

include("backend/seguridad.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="js/jquery-3.4.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <?php 
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

    <div class="container">
        <div class="row">
            <div class="col">

                <h1>Usuario Logueado</h1>

                <span id="nombre">Nombre: </span>
                <br>

                <span id="correo"> Correo: </span>
            </div>
        </div>
    </div>

</body>

<script src="js/perfil.js"></script>

</html>