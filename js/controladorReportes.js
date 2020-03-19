$(document).ready(function () {
    console.log("DOM cargado");
    $("#reportes").addClass("active");
	obtenerDenuncias();

});
function obtenerDenuncias(){
	$.ajax({
		url:"backend/gestionReportes.php?accion=obtenerDenuncias",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			//console.log(respuesta);
			var contenido = "";

			contenido='<table id="divDenuncias" class="table table-striped table-hover table-bordered"><tr>'+
                       	    '<th>Codigo</th>'+
	                        '<th>Denunciado</th>'+
	                        '<th>Denunciante</th>'+
	                        '<th>Anuncio</th>'+
	                        '<th>Tipo</th>'+
	                        '<th>Cantidad</th>'+
	                        '<th>Razones</th></tr>';
            

			for (var i = 0; i<respuesta.length; i++){

				contenido += '<tr><td>'+respuesta[i].idDenuncias+ '</td>'+
			                    '<td>'+respuesta[i].idPersona+'</td>'+
			                    '<td>'+respuesta[i].denunciante+'</td>'+
			                    '<td>'+respuesta[i].idAnuncios+'</td>'+
			                    '<td>'+respuesta[i].tipo+'</td>'+
			                    '<td>'+respuesta[i].cantidad+'</td>'+
			                    '<td>'+respuesta[i].razones+'</td>'+
			                  '</tr>';
			                  //console.log(respuesta[i]);
			}	
			contenido+='</table></div>';
			
			$("#divDenuncias").append(contenido);
            
		}
	});
}



$(document).ready(() => {

    console.log("DOM cargado");

    document.getElementById("departamentos").innerHTML = " ";

    console.log('data="' + 'departamentos"');

    $.ajax({


        url: "backend/Select_Deptos_Municipios.php",
        data: 'data=' + 'departamentos', //+ "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);

            document.getElementById("departamentos").innerHTML += `<option selected="selected" value="null">
            Selecciona un departamento</option>`;


            for (let i = 0; i < respuesta.length; i++) {

                document.getElementById("departamentos").innerHTML +=
                    ` <option value="${respuesta[i].idDepartamento}">${respuesta[i].nombre}</option>`
            }
        },

        error: function (error) {
            console.log(error);
    		}
	});

});


$('#departamentos').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    console.log('data=' + 'municipios&idMunicipio=' + valueSelected.trim());


    $.ajax({
        url: "backend/Select_Deptos_Municipios.php",
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
