<?php 
//session_start(); 

$mysqli = new mysqli( 'localhost:3306', 'root', '', 'mydb' );

//$prueba = "registrarAnuncio";

switch ($_POST["accion"]) {  

    case "seleccionarCategorias":

    $idCategoria;
    $categoria;

    $stmt = $mysqli -> prepare(
        'SELECT idCategorias, descripcion FROM categorias'
    );

    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result( 
        $idCategoria,
        $categoria);


    $respuesta = array();

    $index = 0;

    while($stmt -> fetch()){

        $respuesta[$index] =  array(
            "idCategoria"=>$idCategoria,
            "categoria"=>$categoria,
        );

        $index++;
    }

    echo json_encode($respuesta);
    break;

    case 'guardar':
 
    $nombreProducto = $_POST["nombre"];
    $caracteristicas = $_POST["descripcion"];
    $idCategoria = $_POST["idCategoria"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $idPersona = $_POST["idPersona"];
    $idMoneda = $_POST["idMoneda"];
    //$url = $_POST["url"];
    //
    /*$nombreProducto='Puerta';
    $caracteristicas='COlor caoba';
    $idCategoria=1;
    $tipo='Producto';
    $precio=1234;
    $idPersona=4;
    $idMoneda=1;*/

    $mysqli->multi_query("SET @p0='".$nombreProducto."'; SET @p1='".$caracteristicas."'; SET @p2='".$idCategoria."'; SET @p3='".$tipo."'; SET @p4='".$precio."'; SET @p5='".$idPersona."'; SET @p6='".$idMoneda."'; SET @p7=''; SET @p8=''; SET @p9='guardar'; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");
    $resultadoConsulta = array();
    do {
        if ($resultado = $mysqli->store_result()) {
          while ($fila = $resultado->fetch_assoc()) {

            $resultadoConsulta[] = $fila;

        }

        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());

echo json_encode($resultadoConsulta);

break;

case 'obtenerAnuncio':
    $idPersona = $_POST["idPersona"];
    //$idPersona=4;
    $mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5='".$idPersona."'; SET @p6=''; SET @p7=''; SET @p8=''; SET @p9='obtenerAnuncio'; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);");
    $resultadoConsulta = array();
    do {
        if ($resultado = $mysqli->store_result()) {
          while ($fila = $resultado->fetch_assoc()) {

            $resultadoConsulta[] = $fila;

        }

        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());

echo json_encode($resultadoConsulta);

break;

case 'editar':

    $nombreProducto = $_POST["nombre"];
    $caracteristicas = $_POST["descripcion"];
    $idCategoria = $_POST["idCategoria"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $idPersona = $_POST["idPersona"];
    $idMoneda = $_POST["idMoneda"];
    $idAnuncio = $_POST["idAnuncio"];

    $mysqli->multi_query("SET @p0='".$nombreProducto."'; SET @p1='".$caracteristicas."'; SET @p2='".$idCategoria."'; SET @p3='".$tipo."'; SET @p4='".$precio."'; SET @p5='".$idPersona."'; SET @p6='".$idMoneda."'; SET @p7='".$idAnuncio."'; SET @p8=''; SET @p9='editar'; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");
    $resultadoConsulta = array();
    do {
        if ($resultado = $mysqli->store_result()) {
          while ($fila = $resultado->fetch_assoc()) {

            $resultadoConsulta[] = $fila;

        }

        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());

echo json_encode($resultadoConsulta);

break;

case 'obtenerFotos':

    $idAnuncio =$_POST["idAnuncio"];

    $mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7='".$idAnuncio."'; SET @p8=''; SET @p9='obtenerFotos'; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);");
    $resultadoConsulta = array();
    do {
        if ($resultado = $mysqli->store_result()) {
          while ($fila = $resultado->fetch_assoc()) {

            $resultadoConsulta[] = $fila;

        }

            $resultado->free();
        } else {
            if ($mysqli->errno) {
                echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
            }
        }
    } while ($mysqli->more_results() && $mysqli->next_result());

    echo json_encode($resultadoConsulta);

break;

case 'eliminarAnuncio':

    $idAnuncio = $_POST["idAnuncio"];
    $razones =$_POST["razones"];
    //$idAnuncio =1;
    $mysqli->multi_query("SET @p0=''; SET @p1='".$razones."'; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7='".$idAnuncio."'; SET @p8=''; SET @p9='eliminar'; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");
    $resultadoConsulta = array();
    do {
        if ($resultado = $mysqli->store_result()) {
          while ($fila = $resultado->fetch_assoc()) {

            $resultadoConsulta[] = $fila;

        }

            $resultado->free();
        } else {
            if ($mysqli->errno) {
                echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
            }
        }
    } while ($mysqli->more_results() && $mysqli->next_result());

    echo json_encode($resultadoConsulta);

break;
}

$mysqli->close();



?>

