$(document).ready(function () {

    console.log("DOM cargado");
    obtenerCategorias();

});
function obtenerCategorias(){
	$.ajax({
		url:"backend/gestionCategorias.php?accion=obtenerTodos",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			//console.log(respuesta);
			var contenido = "";

			contenido='<div id="div_ini"><table class="table table-striped table-hover"><tr>'+
                        '<th>Nombre Categoria</th>'+
                        //'<th>Tipo Categoria</th>'+
                        '<th>Dar de baja</th>'+
                        '<th>Editar</th></tr>';

				/*  */

			for (var i = 0; i<respuesta.length; i++){

				contenido += '<tr><!--td>'+respuesta[i].idCategorias+ '</td-->'+
			                    '<td>'+respuesta[i].descripcion+'</td>'+
			                    //'<td>'+respuesta[i].estado+'</td>'+
			                    '<td>'+
			                    '<button class="btn" type="button" id="btnEliminar'+respuesta[i].idCategorias+'" onclick="eliminarCategorias('+respuesta[i].idCategorias +')"><i class="fas fa-trash-alt fa-lg" style="color:green"></i></button>'+ 
			                    '</td>'+
			                    '<td>'+
			                    '<button class="btn" type="button" id="btnEdit'+respuesta[i].idCategorias+'"   onclick="editarCategorias('+respuesta[i].idCategorias+','+"'"+respuesta[i].descripcion+"'"+')"><i class="fas fa-edit fa-lg" style="color:green"></i></button>'+ 
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

function guardarCategorias(){
	validarRegistro();
	if (validarRegistro()) {
		var parametros= "nombreCate="+$("#nombreCat").val();
					alert(parametros);
	
		$.ajax({
			url:"backend/gestionCategorias.php?accion=nuevo",
			method:"GET",
			data:parametros,
			dataType:"json",
			success:function(respuesta){
				console.log(respuesta);
				alert(respuesta);
				
			}
		});
		window.location.replace("categorias.php");
		//obtenerCategorias();
	}else {
		alert("Campos requeridos");
	}
	
}


function eliminarCategorias(idCategoria){

	var parametros = "idCategoria="+idCategoria;
	
	alert(parametros);
	$.ajax({
		url:"backend/gestionCategorias.php?accion=eliminar",
		method:"GET",
		data:parametros,
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);

			if (respuesta.mensaje=='Eliminado exitosamente') {
				
				
				window.location.replace("categorias.php");
			//
			}
			obtenerCategorias();
		}
	});

}

function editarCategorias(idCategoria,nombreCat){

	///$("#Agregar").css("display","none");
	//$("#Editar").css("display","block");
	$("#agregarCat").fadeOut();
	$("#editarCat").fadeIn();
	//llenado de codigo categoria a editar
	$("#cod").val(idCategoria);
	$("#nombreCatEdit").val(nombreCat);
	
	alert(idCategoria,nombreCat);
	//$("#nombreCatEdit").value('Hola', nombreCat); 

}
//Funcion para cambiar el nombre a la categoria
function editCategorias(){

	validarEditar();
	if (validarEditar()) {
		var parametros= "codigo="+$("#cod").val()+"&"+
						"nombreCate="+$("#nombreCatEdit").val();
					alert(parametros);
		$.ajax({
			url:"backend/gestionCategorias.php?accion=editar",
			method:"GET",
			data:parametros,
			dataType:"json",
			success:function(respuesta){
				console.log(respuesta);
			}
		});
		$("#agregarCat").fadeIn();
		$("#editarCat").fadeOut();
		obtenerCategorias();
		//window.location.replace("categorias.php");
	}
	
	
}

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
};

function validarRegistro(){
	
	var nombre=validarCampoVacio("nombreCat");
	if (nombre) {
		$("#avisoCatE").fadeOut();
		console.log("Categoria correcta");
		return true;
	}else{
		console.log("Categoria incorrecta");
		$("#avisoCatE").fadeIn();
		return false;
	}
}

function validarEditar(){
	
	var nombre=validarCampoVacio("nombreCatEdit");
	if (nombre) {
		$("#avisoCatE").fadeOut();
		console.log("Categoria correcta");
		return true;
	}else{
		console.log("Categoria incorrecta");
		$("#avisoCatE").fadeIn();
		return false;
	}
}

function validarBuscar(){
	
	var nombre=validarCampoVacio("buscarCat");
	if (nombre) {
		$("#avisoCatB").fadeOut();
		console.log("Categoria correcta");
		return true;
	}else{
		console.log("Categoria incorrecta");
		$("#avisoCatB").fadeIn();
		return false;
	}
}

function buscar(){
	validarBuscar();
	if (validarBuscar()) {
		var parametros= "nombreCat="+$("#buscarCat").val();
		//alert(parametros);
		$.ajax({
			url:"backend/gestionCategorias.php?accion=buscarNombre",
			data:parametros,
			method:"GET",
			dataType:"json",
			success:function(respuesta){
				//console.log(respuesta);
				var contenido = "";

				contenido='<div id="div_ini"><table class="table table-striped table-hover"><tr>'+
	                        '<th>Nombre Categoria</th>'+
	                        //'<th>Tipo Categoria</th>'+
	                        '<th>Dar de baja</th>'+
	                        '<th>Editar</th></tr>';

					/*  */

				for (var i = 0; i<1; i++){

					contenido += '<tr><!--td>'+respuesta[i].idCategorias+ '</td-->'+
				                    '<td>'+respuesta[i].descripcion+'</td>'+
				                    //'<td>'+respuesta[i].estado+'</td>'+
				                    '<td>'+
				                    '<button class="btn btn-primary" type="button" id="btnEliminar'+respuesta[i].idCategorias+'" onclick="eliminarCategorias('+respuesta[i].idCategorias +')">Eliminar</button>'+ 
				                    '</td>'+
				                    '<td>'+
				                    '<button class="btn btn-primary" type="button" id="btnEdit'+respuesta[i].idCategorias+'"   onclick="editarCategorias('+respuesta[i].idCategorias+','+"'"+respuesta[i].descripcion+"'"+')">Editar</button>'+ 
				                    '</td>'+
				                  '</tr>';
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
}

$("#buscarT").click(function(){
	$("#buscarT").fadeOut();
	$("#buscarCat").val("");
});