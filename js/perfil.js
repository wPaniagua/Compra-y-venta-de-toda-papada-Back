$(document).ready(function () {


    console.log("DOM cargado");

    $.ajax({
        url: "backend/perfil.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);


            $("#nombre").val(respuesta.nombre);
            $("#correo").val(respuesta.correo);
            $("#hNombre").html(respuesta.nombre);

        },
        error: function (error) {
            console.log(error)
        }
    });


});

$("#cerrarSesion").on("click", () => {

    $.ajax({

        url: "backend/cerrarSesion.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.ok) {
                window.location.replace("inicio.php");
            }

        },
        error: function (error) {
            console.log(error)
        }

    });
})