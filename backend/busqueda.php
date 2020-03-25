<?php 

$mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );

switch ($_POST["accion"]) {

    case "traerNoNull":
        $categoria = $_POST["idcategoria"];
        $busqueda = $_POST["busqueda"];


        $stmt = $mysqli -> prepare('
        SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha)<= tu.tiempoPublicacion 
        and ca.idCategorias = ? and a.titulo like ?
        ');

        $stmt->bind_param('is', $categoria, $busqueda);

        generarRespuesta($stmt);

    break;

    case "traerCategoriaNull":
        $busqueda = $_POST["busqueda"];


        $stmt = $mysqli -> prepare('
        SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha )<= tu.tiempoPublicacion 
        and a.titulo like ?
        ');

        $stmt->bind_param('s', $busqueda);

        generarRespuesta($stmt);

    break;

    case "traerTodos":
        
        $stmt = $mysqli -> prepare('
        SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha )<= tu.tiempoPublicacion
        ');

        generarRespuesta($stmt);
        
    break;

    case "traerBusquedaNull":

        $idcategoria = $_POST["idcategoria"];

        $stmt = $mysqli -> prepare('
        SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha )<= tu.tiempoPublicacion 
        and ca.idCategorias = ?
        ');

        $stmt->bind_param('i', $idcategoria);

        generarRespuesta($stmt);
    break;
}

function generarRespuesta($stmt){
            $idAnuncio;
            $titulo;
            $descripcion;
            $precio;
            $municipio;

            $stmt -> execute();

            $stmt -> store_result();
            $stmt -> bind_result( 
                $idAnuncio,
                $titulo,
                $descripcion,
                $precio,
                $municipio,
            );

        $respuesta = array();
            
        $index = 0;
        
        while($stmt -> fetch()){
        
            $respuesta[$index] =  array(
                "idAnuncio"=>$idAnuncio,
                "titulo"=>$titulo,
                "descripcion"=>$descripcion,
                "precio"=>$precio,
                "municipio"=>$municipio,
            );
        
            $index++;
        }

        echo json_encode($respuesta);

}
?>