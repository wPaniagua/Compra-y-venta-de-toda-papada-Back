<?php
	
	$mysqli = new mysqli("localhost:3308", "root", "", "mydb");

	
	switch($_GET["accion"]){

		case 'obtenerTodos':
			
			$mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2='obtenerTodos'; SET @p3=''; CALL SP_CATEGORIAS(@p0, @p1, @p2, @p3, @p4);");
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
			$idCat=$_GET["idCategoria"];

			$resultadoConsulta = array();
			$mysqli->multi_query("SET @p0=''; SET @p1='".$idCat."'; SET @p2='eliminar'; SET @p3=''; CALL `SP_CATEGORIAS`(@p0, @p1, @p2, @p3, @p4); SELECT @p4 AS `mensaje`;");

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
			$nombreCat=$_GET["nombreCate"];
			$idC=$_GET["codigo"];

			$resultadoConsulta = array();

			$mysqli->multi_query("SET @p0='".$nombreCat."'; SET @p1='".$idC."'; SET @p2='editar'; SET @p3='a'; CALL `SP_CATEGORIAS`(@p0, @p1, @p2, @p3, @p4); SELECT @p4 AS `mensaje`;");

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

		case 'nuevo':
			$nombreCat=$_GET["nombreCate"];

			$resultadoConsulta = array();
			$mysqli->multi_query("SET @p0='".$nombreCat."'; SET @p1=''; SET @p2='guardar'; SET @p3=''; CALL `SP_CATEGORIAS`(@p0, @p1, @p2, @p3, @p4); SELECT @p4 AS `mensaje`;");

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

		case 'buscarNombre':
			$nombreCat=$_GET["nombreCat"];
			//$nombreCat="Camas";
			$resultadoConsulta = array();
			$mysqli->multi_query("SET @p0='".$nombreCat."'; SET @p1=''; SET @p2='obtenerPorPalabra'; SET @p3=''; CALL `SP_CATEGORIAS`(@p0, @p1, @p2, @p3, @p4);");

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