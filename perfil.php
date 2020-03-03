<?php 

include("seguridad.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );


    $correo;

    $stmt = $mysqli -> prepare('SELECT  correo FROM persona WHERE idPersona = ?');

    $userId = $_SESSION["id_usuario"]; // or $_GET['userId'];
    
    $stmt -> bind_param('i', $userId);
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result($correo, );
    $stmt -> fetch();
    
    echo $correo; // Teodor
    ?>

</body>
</html>