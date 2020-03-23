$(document).ready(function () {

    console.log("DOM cargado");
    obtenerUsuarios();
});

function obtenerUsuarios(){
	$.ajax({
		url:"../backend/gestionReportes.php?accion=obtenerUsuarios",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			//console.log(respuesta);
			var contenido = "";

			contenido='<table id="divUsuarios" class="table table-striped table-hover table-bordered"><tr>'+
                       	    '<th>Id</th>'+
	                        '<th>Nombre</th>'+
	                        '<th>Departamento</th>'+
	                        '<th>Municipio</th>'+
	                        '<th>N# Publicaciones</th>'+
	                        '<th>N# Denuncias</th>'+
	                        '<th>Estado</th></tr>';


			for (var i = 0; i<respuesta.length; i++){

				contenido += '<tr><td>'+respuesta[i].idPersona+ '</td>'+
			                    '<td>'+respuesta[i].concatenacion+'</td>'+
			                    '<td>'+respuesta[i].nombreDepto+'</td>'+
			                    '<td>'+respuesta[i].nombre+'</td>'+
			                    '<td>'+respuesta[i].conteo+'</td>'+
			                    '<td>'+respuesta[i].cantidad+'</td>'+
			                    '<td>'+respuesta[i].estado+'</td>'+
			                  '</tr>';
			}	
			contenido+='</table></div>';
            console.log(contenido[i]);
			//$("#divEstadisticas").remove();
			//$("#con2").remove();
			//$("#c1").prop("disabled",false);
			//$("#divDenuncias").remove();
			$("#divUsuarios").append(contenido);
		}
	});

}




$('#departamentos').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    console.log('data=' + 'municipios&idMunicipio=' + valueSelected.trim());


    $.ajax({
        url: "../backend/Select_Deptos_Municipios.php",
        data: 'data=' + 'municipios&idDepartamento=' + valueSelected.trim(), //+ "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);

            document.getElementById("municipios").innerHTML = "";

            document.getElementById("municipios").innerHTML += `<option selected="selected" value="null">
            Selecciona un municipio</option>`;


            for (let i = 0; i < respuesta.length; i++) {

                document.getElementById("municipios").innerHTML +=
                    ` <option value="${respuesta[i].idMunicipio}">${respuesta[i].nombre}</option>`
            }
        },

        error: function (error) {
            console.log(error);
        }
    });
 });


var validarCampoVacio = function(id){
	
	if ($("#"+id).val() == ""){
		$("#"+id).removeClass('is-valid');
		$("#"+id).addClass('is-invalid');
		return false;
	}
	else{
		$("#"+id).removeClass('is-invalid');
		$("#"+id).addClass('is-valid');
		return true;
	}
}

function validarRegistro(){
	
	var nombre=validarCampoVacio("nombreRepo");
	if (nombre) {
		$("#avisoRepoE").fadeOut();
		console.log("Reporte correcto");
		return true;
	}else{
		console.log("IncorrectO");
		$("#avisoRepoE").fadeIn();
		return false;
	}
}


function validarBuscar(){
	
	var nombre=validarCampoVacio("buscarRepo");
	if (nombre) {
		$("#avisoRepoB").fadeOut();
		console.log("Correcto");
		return true;
	}else{
		console.log("Correcto");
		$("#avisoRepoB").fadeIn();
		return false;
	}
}

/*function buscar(){
	validarBuscar();
	if (validarBuscar()) {
		var parametros= "nombreRepo="+$("#buscarRepo").val();
		//alert(parametros);
		$.ajax({
			url:"backend/gestionReportes.php?accion=buscarNombre",
			data:parametros,
			method:"GET",
			dataType:"json",
			success:function(respuesta){
				//console.log(respuesta);
				var contenido = "";

				contenido='<div id="div_ini"><table class="table table-striped table-hover"><tr>'+
	                        '<th>Codigo</th>'+
	                        '<th>Denunciado</th>'+
	                        '<th>Denunciante/s</th>'+
	                        '<th>Publicacion</th></tr>'+
	                        '<th>Producto/Servicio</th></tr>'+
	                        '<th>Cantidad Denuncias</th>'+
	                        '<th>Razones Denuncia</th></tr>';

					
				}
				contenido+='</table></div>';

				$("#div_ini").remove();
				//$("#con2").remove();
				//$("#c1").prop("disabled",false);
				$("#div_table").append(contenido);
				$("#buscarT").fadeIn();
			}
		});
	}
}*/

$("#buscarT").click(function(){
	$("#buscarT").fadeOut();
	$("#buscarCat").val("");
});