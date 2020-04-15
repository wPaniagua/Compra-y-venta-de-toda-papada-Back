<?php 
session_start(); 

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

    case 'obtener':
    
    $codigo=$_POST['nombreImagen'];
    $nombre_temporal=$_FILES['archivo']['tmp_name'];
    $nombre=$_FILES['archivo']['codigo'];
    move_uploaded_file($nombre_temporal, 'ImagenesAnuncios/'.$nombre);

    $idUser = $_SESSION["id_usuario"];
    $nombreProducto = $_POST["nombre"];
    $caracteristicas = $_POST["descripcion"];
    $idCategoria = $_POST["idCategoria"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $idPersona = $idUser;//$_SESSION["id_usuario"];
    $idMoneda = $_POST["idMoneda"];
    //$url = $_POST["url"];

    $mysqli->multi_query("SET @p0='".$nombreProducto."'; SET @p1='".$caracteristicas."'; SET @p2='".$idCategoria."'; SET @p3='".$tipo."'; SET @p4='".$precio."'; SET @p5='".$idPersona."'; SET @p6='".$idMoneda."';SET @p7='ImagenesAnuncios/".$nombre."';SET @p8=''; CALL `SP_AGREGAR_PUB`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8); SELECT @p8 AS `mensaje`;");
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

/*---- Archivos

$num_archivos = count($_FILES['archivo']['name']);

for($i=0; $i <= $num_archivos; $i++){
    if(!empty($_FILES['archivo']['name'][$i])){
        $ruta_nueva = "ImagenesAnuncios/".$_FILES['archivo']['name'][$i];
        if(file_exists($ruta_nueva)){
            echo "El archivo".$_FILES['archivo']['name'][$i]."ya se encuentra en el servidor<br>";
        }else {
            $ruta_temporal = $_FILES['archivo']['tmp_name'][$i];
            move_uploaded_file($ruta_temporal, $ruta_nueva);
            

            echo "El archivo".$_FILES['archivo']['name'][$i]."se subio de manera exitosa<br>";
        }
    }
}*/

$mysqli->close();



?>