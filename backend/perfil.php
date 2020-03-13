<?php 

session_start(); 

$mysqli = new mysqli( 'localhost:3306', 'root', '', 'mydb' );


    $correo;
    $primerNombre;
    $segundoNombre;
    $primerApellido;
    $segundoApellido;
    $idUser;
    $fechaNac;
    $municipio;
    $deptos;
    $estado;


    $stmt = $mysqli -> prepare("SELECT primerNombre, segundoNombre, ".
        "primerApellido,segundoApellido, correo, fechaNac,". 
        "estado,m.nombre 'municipio', d.nombre 'departamento'".
        "FROM persona p inner join municipio m on m.idMunicipio=p.idMunicipio".
        "inner join deptos d on  d.idDeptos=m.idDeptos WHERE idPersona = ?");



    $userId = $_SESSION["id_usuario"]; // or $_GET['userId'];
    //$userId=1;
    //$stmt -> bind_param('i', $userId);
    $stmt -> bind_param('i', $userId);
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result( 
    $primerNombre,
    $segundoNombre,
    $primerApellido,
    $segundoApellido,
    $correo,
    $fechaNac,
    $estado,
    $municipio,
    $departamento);


    $stmt -> fetch();
    
    echo (json_encode(
        array(
            "nombre"=> $primerNombre." ".$segundoNombre." ".$primerApellido." ".$segundoApellido,
            "correo"=>$correo,
            "fechaNac"=>$estado,
            "municipio"=>$municipio,
            "departamento"=>$departamento
        )
    ));

?>