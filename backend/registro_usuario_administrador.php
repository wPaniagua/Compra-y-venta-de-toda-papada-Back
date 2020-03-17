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

$primerNombre = $_POST["primerNombre"];
$segundoNombre = $_POST["segundoNombre"];
$primerApellido = $_POST["primerApellido"];
$segundoApellido = $_POST["segundoApellido"];
$correo = $_POST["correo"];
$fechaNac = $_POST["fechaNac"];
$contrasenia = $_POST["contrasenia"];
$idMunicipio  = (int)$_POST["idMunicipio"];


// echo(json_encode(
//     array(
//         "primerNombre"=> $primerNombre,
//         "segundoNombre"=> $segundoNombre,
//         "primerApellido"=> $primerApellido,
//         "segundoApellido"=> $segundoApellido,
//         "correo"=> $correo,
//         "fechaNac"=> $fechaNac,
//         "contrasenia"=> $contrasenia,
//         "idMunicipio"=> $idMunicipio,


//     )
//     ));




$call = $mysqli->prepare('CALL SP_REGISTRO_USUARIO_ADMINISTRADOR(?, ? , ? , ? ,? , ?, ? , ? , @mensaje, @codigo, @idUsuario)');

$call->bind_param('sssssssi', 
    $primerNombre,
    $segundoNombre,
    $primerApellido,
    $segundoApellido,
    $correo,
    $contrasenia,
    $fechaNac,
    $idMunicipio
);


$call->execute();

$select = $mysqli->query('SELECT  @mensaje, @codigo, @idUsuario');

$result = $select->fetch_assoc();
$mensaje = $result['@mensaje'];
$codigo = $result['@codigo'];
$idUsuario = $result['@idUsuario'];

if((int)$codigo==1){

    session_start(); 

    $_SESSION["id_usuario"] =   null; 
        
        echo json_encode(
            array(
                // 'pid'=>$pid,
                'codigo'=>$codigo,
                'mensaje'=>$mensaje,
                'idUsuario'=>$idUsuario
            ));
    } else
    {
        session_start(); 

        $_SESSION["id_usuario"] =   null; 
        echo json_encode(
            array(
                'codigo'=>$codigo,
                'mensaje'=>$mensaje,
            ));
    }


?>