<?php 

// $mysqli = new mysqli( 'localhost:3308', 'root', '', 'mydb' );
$dsn = "mysql:host=localhost:3308;dbname=mydb;charset=utf8mb4";
        $options = [
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
            $pdo = new PDO($dsn, "root", "", $options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something weird happened'); //something a user can understand
        }

switch ($_POST["accion"]) {

    case "BusquedaPrincipal":
        $queryBase='SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio
        inner join deptos de on de.idDeptos = mu.idDeptos 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha )<= tu.tiempoPublicacion';

        $parametros = array();


        if( isset($_POST["busqueda"])){
            $queryBase.=' and a.titulo like ?';
            array_push($parametros, $_POST["busqueda"] );
        }
        if( isset($_POST["categoria"])){
            $queryBase.=' and ca.idCategorias = ?';
            array_push($parametros, (int)$_POST["categoria"] );
        }

        

        $stmt = $pdo->prepare($queryBase);
        $stmt->execute($parametros);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$arr) exit('No rows');
        
        echo json_encode($arr);
        
    break;


    case "filtros":
        $departamento= isset($_POST["idDepartamento"]);
        $municipio=    isset($_POST["idMunicipio"]);
        $desde=        isset($_POST["desde"]);
        $hasta=        isset($_POST["hasta"]);
        $servicio=     isset($_POST["servicio"]);
        $busqueda =  isset($_POST["busqueda"]);
        $categoria = isset($_POST["categoria"]);

        $parametros = array();


        $queryBase = 'SELECT a.idAnuncios, a.titulo , a.descripcion , a.precio,mu.nombre  municipio from anuncios a 
        inner join  persona  per on per.idPersona = a.idPersona 
        inner join municipio mu  on per.idMunicipio = mu.idMunicipio
        inner join deptos de on de.idDeptos = mu.idDeptos 
        inner join  tipousuario tu on tu.idTipoUsuario = per.idTipoUsuario 
        inner join producto pro on pro.idProducto = a.idProducto 
        inner join categorias  ca on ca.idCategorias = pro.idCategorias 
        where a.estado like "%a" and  DATEDIFF(now(), a.fecha )<= tu.tiempoPublicacion';

        if(isset($_POST["idDepartamento"])){
            $queryBase.=' and de.idDeptos = ?';
            array_push($parametros, (int)$_POST["idDepartamento"] );
        }
        if(isset($_POST["idMunicipio"])){
            $queryBase.=' and mu.idMunicipio = ?';
            array_push($parametros, (int)$_POST["idMunicipio"] );
        }
        if(isset($_POST["desde"]) ){
            $queryBase.=' and a.precio >= ?';
            array_push($parametros,(int)$_POST["desde"] );
        }

        if(isset($_POST["hasta"]) ){
            $queryBase.=' and a.precio <= ?';
            array_push($parametros, (int)$_POST["hasta"] );
        }
        if( isset($_POST["busqueda"])){
            $queryBase.=' and a.titulo like ?';
            array_push($parametros, $_POST["busqueda"] );
        }
        if( isset($_POST["categoria"])){
            $queryBase.=' and ca.idCategorias = ?';
            array_push($parametros, (int)$_POST["categoria"] );
        }

        //echo json_encode($parametros);

        $stmt = $pdo->prepare($queryBase);
        $stmt->execute($parametros);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$arr) exit('No rows');
        
        echo json_encode($arr);
        

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