jQuery(document).ready(function ($) {


	const queryString = window.location.search;

	const urlParams = new URLSearchParams(queryString);

	const idAnuncio = urlParams.get('idAnuncios');

	detalleAnuncio(idAnuncio);

	obtenerIdUsuario();

	$('#etalage').etalage({
		thumb_image_width: 300,
		thumb_image_height: 400,
		source_image_width: 900,
		source_image_height: 1200,
		show_hint: true,
		click_callback: function (image_anchor, instance_id) {
			alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
		}
	});
});

$(function () {
	var menu_ul = $('.menu_drop > li > ul'),
		menu_a = $('.menu_drop > li > a');
	menu_ul.hide();
	menu_a.click(function (e) {
		e.preventDefault();
		if (!$(this).hasClass('active')) {
			menu_a.removeClass('active');
			menu_ul.filter(':visible').slideUp('normal');
			$(this).addClass('active').next().stop(true, true).slideDown('normal');
		} else {
			$(this).removeClass('active');
			$(this).next().stop(true, true).slideUp('normal');
		}
	});
});


$("#guardarCalificacion").on("click", () => {

	const queryString = window.location.search;

	const urlParams = new URLSearchParams(queryString);

	const idAnuncio = urlParams.get('idAnuncios');
	var parametros = "calificacion=" + $('input:radio[name=calificacion]:checked').val() + "&" +
		"razones=" + $('#razones').val() + "&" +
		"idAnuncios=" + idAnuncio + "&" +
		"idUsuariDaLike=" + $("#idUL").val();
	//alert(parametros);

	$.ajax({
		url: "../backend/gestionDetalleAnuncio.php?accion=guardarCalificacion",
		method: "GET",
		data: parametros,
		dataType: "json",
		success: function (respuesta) {
			console.log(respuesta);
			//alert(respuesta[0].mensaje);

			$("#msjG").addClass("alert-danger");
			$("#msjG").html(respuesta[0].mensaje);
			$("#msjG").fadeIn();
			$("#msjG").fadeOut(2000);
		}
	});
});


function detalleAnuncio(idAnuncio) {
	console.log(idAnuncio);

	var parametros = "idAnun=" + idAnuncio;
	$.ajax({
		url: "../backend/gestionDetalleAnuncio.php?accion=obtenerPublicacion",
		method: "GET",
		data: parametros,
		dataType: "json",
		success: function (respuesta) {
			console.log(respuesta);

			var contenido = "";
			//datos producto
			$("#tituloAnuncio").html(respuesta[0].titulo);
			$("#titPub").html(respuesta[0].titulo);
			$("#descripcion").html(respuesta[0].descripcion);
			$("#precio").html(respuesta[0].precio + " " + respuesta[0].moneda);
			//Datos Contacto

			$("#nombre").html(respuesta[0].primerNombre + " " + respuesta[0].primerApellido);
			$("#correo").html(respuesta[0].correo);
			$("#telefono").html(respuesta[0].telefono);
			//Datos Ubicacion
			$("#depto").html(respuesta[0].depto);
			$("#municipio").html(respuesta[0].municipio);
			//console.log(respuesta[0].titulo);
			//$("#btn-Cal").addClass("onclick='"+respuesta[0].idAnuncios+","+respuesta[0].idPersona+"'");
		}
	});
}

function obtenerIdUsuario() {
	$.ajax({
		url: "../backend/perfilAdmin.php",
		// data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
		method: "GET",
		dataType: "json",
		success: function (respuesta) {
			console.log(respuesta);
			$("#idUL").val(respuesta.idUsuario);

		},
		error: function (error) {
			console.log(error)
		}
	});
}

$("#verCalifi").on("click", () => {
	obtenerPuntuacion();
});

function obtenerPuntuacion() {

	const queryString = window.location.search;

	const urlParams = new URLSearchParams(queryString);

	const idAnuncio = urlParams.get('idAnuncios');

	console.log(idAnuncio);

	var parametros = "idAnun=" + idAnuncio;
	$.ajax({
		url: "../backend/gestionDetalleAnuncio.php?accion=obtenerPuntuacion",
		method: "GET",
		data: parametros,
		dataType: "json",
		success: function (respuesta) {
			console.log(respuesta);

			var contenido = "";
			//datos producto
			if (respuesta.length > 0) {
				$("#msjTotal").fadeOut();
				$("#calTotal").html("★★★★★ " + respuesta[0].Total + " Puntos");
				/*
					for (var i = 0; i < respuesta.length; i++) {
			
			  			contenido+='<div class="row"><div class="col-md-3">'+
			      		'<label id="" class="">'+respuesta[i].primerNombre+" "
			      		+respuesta[i].primerApellido +'</label>'+
			      		'</div></div>"'+
			  			'</div><div class="col-md-3">'+
			  			'<label id="" class="">Puntuacion: '+respuesta[i].puntuacion+
				        '</label></div></div>"'+
					    '<p>Razones: "'+respuesta[i].razones+'"</p>';
					   //$("#listaUsuarios").append("");
					   $("#listaUsuarios").append(contenido);
					}*/
			} else {
				$("#msjTotal").fadeIn();
			}
		}
	});
}