<?php

$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "mydb";
$puerto = 3306;
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
$telefono = $_POST["telefono"];
$fechaNac = $_POST["fechaNac"];
$contrasenia = $_POST["contrasenia"];
$idMunicipio  = (int)$_POST["idMunicipio"];
/*
$primerNombre = "Orlando";
$segundoNombre = "Alfonso";
$primerApellido = "Valladares";
$segundoApellido = "Ponce";
$correo = "orlando@gmail.com";
$telefono = "34567890";
$fechaNac = "12-12-1890";
$contrasenia = "12345678";
$idMunicipio  = "1";*/



$call = $mysqli->prepare('CALL SP_REGISTRO_USUARIO(?, ? , ? , ? ,? , ?, ? , ?, ? , @mensaje, @codigo, @idUsuario)');

$call->bind_param('ssssssssi', 
    $primerNombre,
    $segundoNombre,
    $primerApellido,
    $segundoApellido,
    $correo,
    $telefono,
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