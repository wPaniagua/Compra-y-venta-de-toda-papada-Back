<?php
	
	$mysqli = new mysqli("localhost", "root", "", "mydb");

	
	switch($_GET["accion"]){

		case 'obtenerMunicipios':
			
			$mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7=''; SET @p8=''; SET @p9='obtenerMunicipios'; CALL SP_PERFIL_ADMIN(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);");
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
					

		case 'obtenerDeptos':

			$resultadoConsulta = array();
			$mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7=''; SET @p8=''; SET @p9='obtenerDeptos'; CALL SP_PERFIL_ADMIN(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10);");

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
			$pNombre=$_GET["pNombre"];
			$sNombre=$_GET["sNombre"];
			$pApellido=$_GET["pApellido"];
			$sApellido=$_GET["sApellido"];
			$correo=$_GET["correo"];
			$municipio=$_GET["municipio"];
			$id=$_GET["codigo"];

			$resultadoConsulta = array();

			$mysqli->multi_query("SET @p0='".$pNombre."'; SET @p1='".$sNombre."'; SET @p2='".$pApellido."'; SET @p3='".$sApellido."'; SET @p4='".$correo."'; SET @p5=''; SET @p6='".$municipio."'; SET @p7='".$id."'; SET @p8=''; SET @p9='editar'; CALL `SP_PERFIL_ADMIN`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");

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

		case 'editarFoto':
			$urlImg=$_GET["urlImag"];
			$id=$_GET["codigo"];

			$resultadoConsulta = array();

			$mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7='".$id."'; SET @p8='".$urlImg."'; SET @p9='editarFoto'; CALL `SP_PERFIL_ADMIN`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");

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

		case 'obtenerFoto':
			
			$id=$_GET["codigo"];

			$resultadoConsulta = array();

			$mysqli->multi_query("SET @p0=''; SET @p1=''; SET @p2=''; SET @p3=''; SET @p4=''; SET @p5=''; SET @p6=''; SET @p7='1'; SET @p8=''; SET @p9='".$id."'; CALL `SP_PERFIL_ADMIN`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10); SELECT @p10 AS `mensaje`;");

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