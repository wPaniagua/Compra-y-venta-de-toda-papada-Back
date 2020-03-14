<?php 

$mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );

switch ($_GET["action"]) {

    case "getUsuarios":

    $primerNombr;
    $primerApellido;
    $tipoUsuario;
    $fechaNacimiento;
    $telefono;
    $correo;
    $departamento;
    $municipio;
    $estado;
    $idPersona;
    
    
        $stmt = $mysqli -> prepare(
            'SELECT per.primerNombre, per.primerApellido, tip.descripcion tipoUsuario, per.fechaNac fechaNacimiento, tel.telefono, per.correo, dep.nombre departamento, mun.nombre municipio, per.estado, per.idPersona FROM persona per 
            inner join tipousuario tip on per.idTipoUsuario=tip.idTipoUsuario 
            inner join municipio mun on per.idMunicipio=mun.idMunicipio 
            inner join deptos dep on mun.idDeptos=dep.idDeptos 
            inner join telefono tel on per.idPersona=tel.idPersona');
        
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $primerNombre,
            $primerApellido,
            $tipoUsuario,
            $fechaNacimiento,
            $telefono,
            $correo,
            $departamento,
            $municipio,
            $estado,
            $idPersona
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "tipoUsuario"=>$tipoUsuario,
                "fechaNacimiento"=>$fechaNacimiento,
                "telefono"=>$telefono,
                "correo"=>$correo,
                "departamento"=>$departamento,
                "municipio"=>$municipio,
                "estado"=>$estado,
                "idPersona"=>$idPersona
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);
        break;

        case "darDeBaja":


            $idPersona = $_POST["idPersona"];

            $stmt = $mysqli -> prepare('UPDATE persona  SET estado = "I"  WHERE idPersona = ?');
            $stmt->bind_param('i', $idPersona);

            $stmt -> execute();
            // $stmt -> store_result();
            // $stmt -> bind_result( );
            // $stmt -> fetch();


            echo (json_encode(array("idPersona"=>$_POST["idPersona"])));

        break;

        case "seleccionarTipoUsuarios":

            $idTipoUsuario;
            $descripcion;

            $stmt = $mysqli -> prepare(
                'SELECT * FROM tipousuario'
                );
            
            $stmt -> execute();
            $stmt -> store_result();
            $stmt -> bind_result( 
                $idTipoUsuario,
                $descripcion);
            
            
            $respuesta = array();
            
            $index = 0;
            
            while($stmt -> fetch()){
            
                $respuesta[$index] =  array(
                    "idTipoUsuario"=>$idTipoUsuario,
                    "descripcion"=>$descripcion,
                );
            
                $index++;
            }

            echo json_encode($respuesta);
        break;

        case "seleccionarDepartamento":

            $idDeptos;
            $nombre;

            $stmt = $mysqli -> prepare(
                'SELECT * FROM deptos'
                );
            
            $stmt -> execute();
            $stmt -> store_result();
            $stmt -> bind_result( 
                $idDeptos,
                $nombre);
            
            
            $respuesta = array();
            
            $index = 0;
            
            while($stmt -> fetch()){
            
                $respuesta[$index] =  array(
                    "idDeptos"=>$idDeptos,
                    "nombre"=>$nombre
                );
            
                $index++;
            }

            echo json_encode($respuesta);
        break;    

        case "seleccionarMunicipio":

            $idMunicipio;
            $nombre;

            $stmt = $mysqli -> prepare(
                'SELECT idMunicipio, nombre FROM municipio'
                );
            
            $stmt -> execute();
            $stmt -> store_result();
            $stmt -> bind_result( 
                $idMunicipio,
                $nombre);
            
            
            $respuesta = array();
            
            $index = 0;
            
            while($stmt -> fetch()){
            
                $respuesta[$index] =  array(
                    "idMunicipio"=>$idMunicipio,
                    "nombre"=>$nombre,
                );
            
                $index++;
            }

            echo json_encode($respuesta);
        break;


}

$mysqli->close();

//works
?>