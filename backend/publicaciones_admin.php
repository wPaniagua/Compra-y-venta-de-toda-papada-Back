<?php 

$mysqli = new mysqli( 'localhost:3306', 'root', '', 'mydb' );

switch ($_GET["accion"]) {

    case "getPublicaciones":

        $nombreProducto;
        $tipoProducto;
        $categoria;
        $descripcion;
        $primerNombre;
        $primerApellido;
        $precio;
        $moneda;
        $fechaPublicacion;
        $fechaVencimiento;
        $estado;
        $idAnuncio;
    
    
        $stmt = $mysqli -> prepare(
            'select  pro.nombre,pro.tipoProducto,ca.descripcion categoria,an.descripcion,per.primerNombre,per.primerApellido ,an.precio,mo.descripcion ,an.fechaPublicacion,
            an.fechaVencimiento,an.estado, an.idAnuncios from anuncios an
            inner join producto pro on an.idProducto=pro.idProducto
            inner join categorias ca on pro.idCategorias=ca.idCategorias
            inner join persona per on an.idPersona=per.idPersona
            inner join moneda mo on an.idMoneda=mo.idMoneda');
        
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $nombreProducto,
            $tipoProducto,
            $categoria,
            $descripcion,
            $primerNombre,
            $primerApellido,
            $precio,
            $moneda,
            $fechaPublicacion,
            $fechaVencimiento,
            $estado,
            $idAnuncio
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "nombreProducto"=>$nombreProducto,
                "tipoProducto"=>$tipoProducto,
                "categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "precio"=>$precio,
                "moneda"=>$moneda,
                "fechaPublicacion"=>$fechaPublicacion,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado"=>$estado,
                "idAnuncio"=>$idAnuncio
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);
        break;

        case "darDeBaja":


            $idAnuncio = $_GET["idAnuncio"];

            $stmt = $mysqli -> prepare('UPDATE anuncios  SET estado = "I"  WHERE idAnuncios = ?');
            $stmt->bind_param('i', $idAnuncio);

            $stmt -> execute();
            // $stmt -> store_result();
            // $stmt -> bind_result( );
            // $stmt -> fetch();


            echo (json_encode(array("idAnuncio"=>$_GET["idAnuncio"])));

        break;

        case "seleccionarCategorias":

            $idCategorias;
            $descripcion;

            $stmt = $mysqli -> prepare(
                'SELECT idCategorias, descripcion FROM categorias'
                );
            
            $stmt -> execute();
            $stmt -> store_result();
            $stmt -> bind_result( 
                $idCategorias,
                $descripcion);
            
            
            $respuesta = array();
            
            $index = 0;
            
            while($stmt -> fetch()){
            
                $respuesta[$index] =  array(
                    "idCategorias"=>$idCategorias,
                    "nombreCategoria"=>$descripcion
                );
            
                $index++;
            }

            echo json_encode($respuesta);
        break;

        case "seleccionarUsuarios":

            $idUsuario;
            $primerNombre;
            $primerApellido;

            $stmt = $mysqli -> prepare(
                'SELECT idPersona, primerNombre, primerApellido FROM persona'
                );
            
            $stmt -> execute();
            $stmt -> store_result();
            $stmt -> bind_result( 
                $idUsuario,
                $primerNombre,
                $primerApellido);
            
            
            $respuesta = array();
            
            $index = 0;
            
            while($stmt -> fetch()){
            
                $respuesta[$index] =  array(
                    "idUsuario"=>$idUsuario,
                    "primerNombre"=>$primerNombre,
                    "primerApellido"=>$primerApellido
                );
            
                $index++;
            }

            echo json_encode($respuesta);
        break;  
        
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        case "busquedaNombreAnuncio":

        $palabraClave = $_GET["palabraClave"];
        $palabra="%$palabraClave%";
        $stmt = $mysqli -> prepare(
            'SELECT  pro.nombre,pro.tipoProducto,ca.descripcion categoria,an.descripcion,per.primerNombre,per.primerApellido ,an.precio,mo.descripcion ,an.fechaPublicacion,
            an.fechaVencimiento,an.estado, an.idAnuncios from anuncios an
            inner join producto pro on an.idProducto=pro.idProducto
            inner join categorias ca on pro.idCategorias=ca.idCategorias
            inner join persona per on an.idPersona=per.idPersona
            inner join moneda mo on an.idMoneda=mo.idMoneda  WHERE an.descripcion LIKE ?');
        $stmt->bind_param('s', $palabra);  
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $nombreProducto,
            $tipoProducto,
            $categoria,
            $descripcion,
            $primerNombre,
            $primerApellido,
            $precio,
            $moneda,
            $fechaPublicacion,
            $fechaVencimiento,
            $estado,
            $idAnuncio
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "nombreProducto"=>$nombreProducto,
                "tipoProducto"=>$tipoProducto,
                "categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "precio"=>$precio,
                "moneda"=>$moneda,
                "fechaPublicacion"=>$fechaPublicacion,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado"=>$estado,
                "idAnuncio"=>$idAnuncio
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);

        break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                


        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        case "filtrarCategoria":

        $idCategoria = $_GET["idCategoria"];
        $stmt = $mysqli -> prepare(
            'SELECT  pro.nombre,pro.tipoProducto,ca.descripcion categoria,an.descripcion,per.primerNombre,per.primerApellido ,an.precio,mo.descripcion ,an.fechaPublicacion,
            an.fechaVencimiento,an.estado, an.idAnuncios from anuncios an
            inner join producto pro on an.idProducto=pro.idProducto
            inner join categorias ca on pro.idCategorias=ca.idCategorias
            inner join persona per on an.idPersona=per.idPersona
            inner join moneda mo on an.idMoneda=mo.idMoneda WHERE ca.idCategorias = ?');
        $stmt->bind_param('i', $idCategoria);  
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $nombreProducto,
            $tipoProducto,
            $categoria,
            $descripcion,
            $primerNombre,
            $primerApellido,
            $precio,
            $moneda,
            $fechaPublicacion,
            $fechaVencimiento,
            $estado,
            $idAnuncio
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "nombreProducto"=>$nombreProducto,
                "tipoProducto"=>$tipoProducto,
                "categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "precio"=>$precio,
                "moneda"=>$moneda,
                "fechaPublicacion"=>$fechaPublicacion,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado"=>$estado,
                "idAnuncio"=>$idAnuncio
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);

        break;

        case "filtrarUsuario":

        $idUsuario = $_GET["idUsuario"];
        $stmt = $mysqli -> prepare(
            'SELECT  pro.nombre,pro.tipoProducto,ca.descripcion categoria,an.descripcion,per.primerNombre,per.primerApellido ,an.precio,mo.descripcion ,an.fechaPublicacion,
            an.fechaVencimiento,an.estado, an.idAnuncios from anuncios an
            inner join producto pro on an.idProducto=pro.idProducto
            inner join categorias ca on pro.idCategorias=ca.idCategorias
            inner join persona per on an.idPersona=per.idPersona
            inner join moneda mo on an.idMoneda=mo.idMoneda WHERE per.idPersona = ?');
        $stmt->bind_param('i', $idUsuario);  
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $nombreProducto,
            $tipoProducto,
            $categoria,
            $descripcion,
            $primerNombre,
            $primerApellido,
            $precio,
            $moneda,
            $fechaPublicacion,
            $fechaVencimiento,
            $estado,
            $idAnuncio
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "nombreProducto"=>$nombreProducto,
                "tipoProducto"=>$tipoProducto,
                "categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "precio"=>$precio,
                "moneda"=>$moneda,
                "fechaPublicacion"=>$fechaPublicacion,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado"=>$estado,
                "idAnuncio"=>$idAnuncio
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);

        break;

        case "filtrarEstado":

        $estado = $_GET["estado"];
        $stmt = $mysqli -> prepare(
            'SELECT  pro.nombre,pro.tipoProducto,ca.descripcion categoria,an.descripcion,per.primerNombre,per.primerApellido ,an.precio,mo.descripcion ,an.fechaPublicacion,
            an.fechaVencimiento,an.estado, an.idAnuncios from anuncios an
            inner join producto pro on an.idProducto=pro.idProducto
            inner join categorias ca on pro.idCategorias=ca.idCategorias
            inner join persona per on an.idPersona=per.idPersona
            inner join moneda mo on an.idMoneda=mo.idMoneda WHERE an.estado = ?');
        $stmt->bind_param('s', $estado);  
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $nombreProducto,
            $tipoProducto,
            $categoria,
            $descripcion,
            $primerNombre,
            $primerApellido,
            $precio,
            $moneda,
            $fechaPublicacion,
            $fechaVencimiento,
            $estado,
            $idAnuncio
            );
        
        
        $respuesta = array();
        
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "nombreProducto"=>$nombreProducto,
                "tipoProducto"=>$tipoProducto,
                "categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "primerNombre"=>$primerNombre,
                "primerApellido"=>$primerApellido,
                "precio"=>$precio,
                "moneda"=>$moneda,
                "fechaPublicacion"=>$fechaPublicacion,
                "fechaVencimiento"=>$fechaVencimiento,
                "estado"=>$estado,
                "idAnuncio"=>$idAnuncio
            );
        
            $index++;
        }
        
        echo json_encode($respuesta);

        break;

}

$mysqli->close();

//works

/**
 * 
 * 
 */
?>
