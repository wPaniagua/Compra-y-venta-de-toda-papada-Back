$(document).ready(function () {


    console.log("DOM cargado");

    $.ajax({
        url: "backend/perfil.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);


            $("#nombre").html("Nombre:  " + respuesta.nombre);
            $("#correo").html("Correo:  " + respuesta.correo);

        },
        error: function (error) {
            console.log(error)
        }
    });


});