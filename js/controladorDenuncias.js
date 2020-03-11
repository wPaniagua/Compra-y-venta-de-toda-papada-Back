$(document).ready(function () {
    console.log("DOM cargado");
	$("#denuncias").addClass("active");
	obtenerDenuncias();
});

function obtenerDenuncias(){
	$.ajax({
		url:"backend/gestionDenuncias.php?accion=obtenerTodos",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			//console.log(respuesta);
			var contenido = "";
			console.log(respuesta);
			contenido='<div id="div_ini"><table class="table table-striped table-hover"><tr>'+
                       '<th>Id denuncia</th>'+
		               '<th>Fecha</th>'+
		               '<th>Publicacion denunciada</th>'+
		               '<th>Denunciantes</th>'+
		               '<th>Razones</th>'+
		               '<th>Estado</th>'+
		               '<th>Dar de baja</th>';

				/*  */

			for (var i = 0; i<respuesta.length; i++){

				contenido += '<tr><td>'+respuesta[i].idDenuncias+'</td>'+
			                    '<td>'+respuesta[i].fecha+'</td>'+
			                    '<td>'+respuesta[i].razones+'</td>'+
			                    '<td>'+respuesta[i].titulo+'</td>'+
			                    '<td>'+respuesta[i].estado+'</td>'+
			                    '<td>'+respuesta[i].primerNombre+' '+respuesta[i].segundoApellido+'</td>'+
			                    '<td>'+
			                    '<button class="btn" type="button" id="btnEliminar" onclick="eliminarDenuncias('+respuesta[i].idDenuncias+       ')"><i class="fas fa-trash-alt fa-lg" style="color:green"></i></button>'+ 
			                    '</td>'+
			                  '</tr>';
			}
			contenido+='</table></div>';

			$("#div_ini").remove();
			//$("#con2").remove();
			//$("#c1").prop("disabled",false);
			$("#div_table").append(contenido);

		}
	});

}

function eliminarDenuncias(idDenuncia){

	var parametros = "idDenuncia="+idDenuncia;
	
	alert(parametros);
	$.ajax({
		url:"backend/gestionDenuncias.php?accion=eliminar",
		method:"GET",
		data:parametros,
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			
			window.location.replace("denuncias.php");
			//obtenerDenuncias();
		}
	});

}