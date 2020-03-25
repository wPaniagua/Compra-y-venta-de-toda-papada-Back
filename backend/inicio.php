<?php 


$mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );

switch ($_POST["accion"]){


    case "traerElectronicos":

        $idAnuncio;    
        $titulo;
        $descripcion;
        $precio;
    
        //TODO: hacer subconsulta para traer id tipo usuario
        $stmt = $mysqli -> prepare('
        select a.idAnuncios, a.titulo , a.descripcion , a.precio from anuncios a 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias ca on ca.idCategorias = pro.idCategorias 
        where ca.descripcion  like "%electronico%"
                ');
        
        // $stmt -> bind_param('i', $userId);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $idAnuncio,    
            $titulo,
            $descripcion,
            $precio
        );
    
    
        $respuesta = array();
    
        $index = 0;
        
        while($stmt -> fetch()){
    
            $respuesta[$index] =  array(
            "idAnuncio"=>$idAnuncio,    
            "titulo"=>$titulo,
            "descripcion"=>$descripcion,
            "precio"=>$precio
            );
    
            $index++;
        }
        
        echo json_encode($respuesta);
    break;

    case "Traercategorias":

        $idCategorias;    
        $descripcion;
    
        //TODO: hacer subconsulta para traer id tipo usuario
        $stmt = $mysqli -> prepare('
        select idCategorias , descripcion from categorias c
        where estado like "%a"
                ');
        
        // $stmt -> bind_param('i', $userId);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result( 
            $idCategorias,    
            $descripcion,
        );
    
    
        $respuesta = array();
    
        $index = 0;
        
        while($stmt -> fetch()){
    
            $respuesta[$index] =  array(
                "idCategorias"=>$idCategorias,
                "descripcion"=>$descripcion
            );
    
            $index++;
        }
        
        echo json_encode($respuesta);
    break;

}
?>