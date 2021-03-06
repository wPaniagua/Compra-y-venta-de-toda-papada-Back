$(window).on("load", function () {  

    $("#denuncias").addClass("active");
 	

 	const queryString = window.location.search;

	const urlParams = new URLSearchParams(queryString);

	const idAnuncio = urlParams.get('idAnuncio');
	obtener(idAnuncio);
	
});

function obtenerDenuncias(idAnuncio){
	var codigo=$("#idUL").val();
	//alert(idAnuncio);
	$.ajax({
		url:"../backend/gestionDenuncias.php?accion=obtenerTodos",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			//console.log(respuesta);
			var contenido = "";
			//console.log(respuesta);
			contenido='<div class="table-responsive  id="div_ini"><table id="tablaDenuncias" class="table table-striped table-hover table-bordered"><thead class="thead-dark"><tr>'+
                       '<th>No</th>'+
		               '<th>Fecha</th>'+
		               '<th>Publicacion denunciada</th>'+
		               '<th>Denunciantes</th>'+
		               '<th>Razones</th>'+
		               '<!--th>Estado</th-->'+
		               '<!--th>Dar de baja</th--></thead>';

				/*  */
		if (idAnuncio==null) {
					// statement
				
			for (var i = 0; i<respuesta.length; i++){

				if (respuesta[i].denunciado==codigo) {
					// statement
					contenido += '<tr><td>'+respuesta[i].idDenuncias+'</td>'+
			                    '<td>'+respuesta[i].fecha+'</td>'+
			                    '<td>'+respuesta[i].titulo+'</td>'+
			                    '<td>'+respuesta[i].primerNombre+' '+respuesta[i].segundoApellido+'</td>'+
			                    '<td>'+respuesta[i].razones+'</td>'+
			                    '<!--td>'+respuesta[i].estado+'</td-->'+
			                    '<!--td>'+
			                    '<button class="btn" type="button" id="btnEliminar" onclick="eliminarDenuncias('+respuesta[i].idDenuncias+       ')"><i class="fas fa-trash-alt fa-lg" style="color:green"></i></button>'+ 
			                    '</td-->'+
			                  '</tr>';
				} 
				
			}
			contenido+='</table></div>';
			} else {
					// statement
			for (var i = 0; i<respuesta.length; i++){
				if (idAnuncio==respuesta[i].idAnuncios) {
					// statement
					contenido +='<tr><td>'+respuesta[i].idDenuncias+'</td>'+
			                    '<td>'+respuesta[i].fecha+'</td>'+
			                    '<td>'+respuesta[i].titulo+'</td>'+
			                    '<td>'+respuesta[i].primerNombre+' '+respuesta[i].segundoApellido+'</td>'+
			                    '<td>'+respuesta[i].razones+'</td>'+
			                    '<!--td>'+respuesta[i].estado+'</td-->'+
			                    '<!--td>'+
			                    '<button class="btn" type="button" id="btnEliminar" onclick="eliminarDenuncias('+respuesta[i].idDenuncias+       ')"><i class="fas fa-trash-alt fa-lg" style="color:green"></i></button>'+ 
			                    '</td-->'+
			                  '</tr>';
				} 
				
			}
			contenido+='</table></div>';
		}
			$("#div_ini").remove();
			//$("#con2").remove();
			//$("#c1").prop("disabled",false);
			$("#div_table").append(contenido);
			cargarTabla();
		}
	});

}

function cargarTabla(){

	$('#tablaDenuncias').DataTable({
		language: {
			"lengthMenu":"Mostrar _MENU_ registros",
			"zeroRecords":"No se encontraron Resultados",
			"info":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty":"Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered":"(Filtrado de un total de _MAX_ registros)",
			"sSearch":"Buscar",
			"oPaginate":{
				"sFirst":"Primero",
				"sLast":"Ultimo",
				"sNext":"Siguiente",
				"sPrevious":"Anterior"
			},
			"sProcessing":"Procesando...",
		}
		/*,
		initComplete: function(){
                    this.api().columns().every(function(){
                        var column=this;
                        var select=
                        $('<select class="form-control btn-dark" style=""><option value=""></option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change',function(){
                                var val=$.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column.search(val ? '^'+val+'$': '',true,false)
                                  .draw();

                        });

                        column.data().unique().sort().each(function (d,j){
                            select.append('<option value"'+d+'">'+d+'</option>')
                        });
                    });
                }*/
		
	});


}

function obtener(idAnuncio){
	$.ajax({
		url: "../backend/perfilAdmin.php",
		// data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
		method: "GET",
		dataType: "json",
		success: function (respuesta) {
			//console.log(respuesta);
			$("#idUL").val(respuesta.idUsuario);
			obtenerDenuncias(idAnuncio);
		},
		error: function (error) {
			console.log(error)
		}
	});
}