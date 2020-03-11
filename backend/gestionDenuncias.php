<?php
	
    $mysqli = new mysqli("localhost", "root", "", "mydb");

    
    switch($_GET["accion"]){

        case 'obtenerTodos':
            
            $mysqli->multi_query("SET @p0='obtenerTodos'; SET @p1=''; SET @p2=''; SET @p3='A'; CALL `SP_DENUNCIAS`(@p0, @p1, @p2, @p3, @p4);");
           
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
                    

        case 'eliminar':
            $idDenuncia=$_GET["idDenuncia"];

            $resultadoConsulta = array();
            $mysqli->multi_query("SET @p0='eliminar'; SET @p1='".$idDenuncia."'; SET @p2=''; SET @p3=''; CALL `SP_DENUNCIAS`(@p0, @p1, @p2, @p3, @p4); SELECT @p4 AS `mensaje`;");

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
?>