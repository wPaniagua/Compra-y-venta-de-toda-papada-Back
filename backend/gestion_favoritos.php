<?php

$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "mydb";
$puerto = 3308;
$link;

$mysqli = new mysqli(	
        $host,
        $usuario,
        $password,
        $baseDatos,
        $puerto
);

session_start(); 



switch($_POST["accion"]){
    case "nuevo":

        $idAnuncio = $_POST["idAnuncio"];
        $idPersona = $_SESSION["id_usuario"];
        $accion = "nuevo";

        $call = $mysqli->prepare('CALL SP_FAVORITOS(? , ? , ?  , @codigo,@mensaje)');

        $call->bind_param('iis', 
            $idPersona,
            $idAnuncio,
            $accion
        );


        $call->execute();

        $select = $mysqli->query('SELECT  @codigo , @mensaje ');

        $result = $select->fetch_assoc();

        $mensaje = $result['@mensaje'];
        $codigo = $result['@codigo'];

        echo json_encode(
            array(
                "mensaje"=>$mensaje,
                "codigo"=>$codigo
            )
        );
    

    break;
}


?>