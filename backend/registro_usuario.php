<?php
//include("class-conexion.php");
$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "mydb";
$puerto = 3306;
$link;
//$conexion = new Conexion();

$mysqil = new mysqli(	
        $host,
        $usuario,
        $password,
        $baseDatos,
        $puerto
);

$primerNombre = $_POST["ppNombre"];
$segNombre =$_POST["psNombre"];
$primerApll =$_POST["ppApellido"];
$segApll =$_POST["psApellido"];  
//$id = $_POST['pid'];
$correo =$_POST["pcorreo"]; 
$contrasenia =$_POST["pcontrasenia"]; 
$fechaNac =$_POST["pfechaNac"]; 
//$urlFoto = $_POST["pfoto"]; 
//$tipoUser = (int)$_POST["pestado"];
//$telefono = $_POST["ptelefono"]; 
$municipio = (int)$_POST["pmunicipio"];
//$depto = $_POST["pdepto"];
$tipoUser = (int)$_POST["ptipoUsuario"]; 
      /*$sql = "INSERT INTO `persona` (`idPersona`, `primerNombre`, `segundoNombre`, `primerApellido`, 
      `segundoApellido`, `correo`, `fechaNac`, `contrasenia`, `idTipoUsuario`, `idMunicipio`, `estado`) 
      VALUES ('$id', '$primerNombre', '$segNombre', '$primerApll', '$segApll', '$correo', 
      '$fechaNac', '$contrasenia', '$tipoUser', '$municipio', '$estado')";
      $resultado = $conexion->ejecutarConsulta($sql);*/

      $call = $mysqil->prepare('CALL SP_REGISTRO_USUARIO(?, ? , ? , ? ,? , ?, ? , ? , ? , @mensaje, @codigo, @idUsuario)');

$call->bind_param('sssssssii', 
    $primerNombre,
    $segNombre,
    $primerApll,
    $segApll,
    $correo,
    $contrasenia,
    $fechaNac,
    $tipoUser,
    $municipio
);


$call->execute();

$select = $mysqil->query('SELECT  @mensaje, @codigo, @idUsuario');

$result = $select->fetch_assoc();
$mensaje = $result['@mensaje'];
$codigo = $result['@codigo'];
$idUsuario = $result['@idUsuario'];

if((int)$codigo==1){

        session_start(); 

        $_SESSION["id_usuario"] =   $idUsuario; 
        
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