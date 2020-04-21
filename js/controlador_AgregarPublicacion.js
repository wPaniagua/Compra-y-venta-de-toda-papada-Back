$('#btnPublicar').click(registrarDatos);
$(window).on("load", function () {
    cargarCategorias();



});

function registrarDatos() {
    var nombre = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var idCategorias = $('#slc-categorias').val();
    var tipo = $('input:radio[name=tipo]:checked').val();
    var precio = $('#precio').val();
    var idPersona = $('#id_usuario').val();
    var idMoneda = $('input:radio[name=moneda]:checked').val();
    //var url = $('#url');
    console.log(nombre);


    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        data: `accion=obtener` + "&nombre=" + nombre + "&descripcion=" + descripcion + "&idCategoria=" + idCategorias + "&tipo=" + tipo + "&precio=" + precio +
            "&idPersona=" + idPersona + "&idMoneda=" + idMoneda,
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);

        },
        error: function (error) {
            console.log(error)
        }
    });

}


function cargarCategorias() {
    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        method: "POST",
        data: `accion=seleccionarCategorias`,
        success: function (respuesta) {

            let response = JSON.parse(respuesta);

            for (let i = 0; i < response.length; i++) {
                $("#slc-categorias").append(
                    `<option value=${response[i].idCategoria}>${response[i].categoria}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });

}



$(document).ready(() => {

    console.log("DOM cargado");

    document.getElementById("departamentos").innerHTML = " ";

    console.log('data="' + 'departamentos"');

    $.ajax({


        url: "../backend/Select_Deptos_Municipios.php",
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

$("#GuardarImg").on("click", () => {
    var formData=new FormData($("#form_subir_fa")[0]);
    console.log('formData');
});

