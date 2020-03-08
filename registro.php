<?php

      include("class-conexion.php");            
    
      $host = "localhost";
      $usuario = "root";
      $password = "";
      $baseDatos = "mydb";
      $puerto = 3308;
      $link;
      $conexion = new Conexion();

      $mysqli = new mysqli(	
        $host,
        $usuario,
        $password,
        $baseDatos,
        $puerto
      );
      $primerNombre = $_POST['ppNombre'];
      $segNombre = $_POST['psNombre'];
      $primerApll = $_POST['ppApellido'];
      $segApll = $_POST['psApellido'];  
      $id = $_POST['pid'];
      $correo = $_POST['pcorreo']; 
      $contrasenia = $_POST['pcontrasenia']; 
      $fechaNac = $_POST['pfechaNac']; 
      $urlFoto = $_POST['pfoto']; 
      $tipoUser = $_POST['ptipoUsuario'];
      $telefono = $_POST['ptelefono']; 
      $municipio = $_POST['pmunicipio'];
      $depto = $_POST['pdepto'];
      $estado = $_POST['pestado'];   
      $sql = "INSERT INTO `persona` (`idPersona`, `primerNombre`, `segundoNombre`, `primerApellido`, 
      `segundoApellido`, `correo`, `fechaNac`, `contrasenia`, `idTipoUsuario`, `idMunicipio`, `estado`) 
      VALUES ('$id', '$primerNombre', '$segNombre', '$primerApll', '$segApll', '$correo', 
      '$fechaNac', '$contrasenia', '$tipoUser', '$municipio', '$estado')";
      $resultado = $conexion->ejecutarConsulta($sql);

      //$call = $mysqli->prepare('CALL SP_REGISTRO_USUARIO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @mensaje)');
      //$call->bind_param('ssssissdsisiis',$primerNombre, $segNombre, $primerApll, $segApll, $id, $correo, $contrasenia, $fechaNac, $urlFoto, $tipoUser, $telefono, $municipio, $depto, $estado);
      //$call->execute();



?>

