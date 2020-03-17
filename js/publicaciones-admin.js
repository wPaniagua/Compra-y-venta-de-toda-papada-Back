var publicaciones = [];

$(window).on("load", function () {
    cargarTabla();
    cargarCategorias();
    cargarUsuarios();

})

var respuestaTbl;
var busqueda;
/**==============================================================CARGAR TABLA EN GENERAL======================================================= */
function darDeBaja(idAnuncio) {

    $.ajax({
        url: `backend/publicaciones_admin.php?idAnuncio=${idAnuncio}&accion=darDeBaja`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

            // console.log(JSON.parse(respuesta))

            console.log(respuesta)

            cargarTabla();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });

}

function cargarTabla() {
    $.ajax({
        url: "backend/publicaciones_admin.php?accion=getPublicaciones",
        method: "GET",
        dataType: "json",
        success: function (response) {

            //let response = JSON.parse(respuesta)
            console.log(response.length);

            $("#tablaPublicaciones>tbody").html(" ");

            for (let i = 0; i < response.length; i++) {

                $("#tablaPublicaciones>tbody").append(
                    `<tr>  
                <td>${response[i].nombreProducto}</td>
                <td>${response[i].tipoProducto}</td>
                <td>${response[i].categoria}</td>
                <td>${response[i].descripcion}</td>
                <td>${response[i].primerNombre} ${response[i].primerApellido}</td>
                <td>${response[i].precio}</td>
                <td>${response[i].moneda}</td>
                <td>${response[i].fechaPublicacion}</td>
                <td>${response[i].fechaVencimiento}</td>
                <td>${response[i].estado}</td>
                <td><button class="btn btn-outline-danger" onclick="darDeBaja(${response[i].idAnuncio})"><i class="far fa-trash-alt"></i></button></td>
                </tr>`
                );

            }

        },
        error: function (error) {

        }
    });
}
/**==============================================================FIN CARGAR TABLA EN GENERAL======================================================= */

/**==============================================================CARGAR TBL======================================================= */
function darDeBajaTbl(idAnuncio) {

    $.ajax({
        url: `backend/publicaciones_admin.php?idAnuncio=${idAnuncio}&accion=darDeBaja`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });

}

function cargarTablaTbl() {

    $("#tablaPublicaciones>tbody").html(" ");

    for (let i = 0; i < respuestaTbl.length; i++) {

        $("#tablaPublicaciones>tbody").append(
            `<tr>  
            <td>${respuestaTbl[i].nombreProducto}</td>
            <td>${respuestaTbl[i].tipoProducto}</td>
            <td>${respuestaTbl[i].categoria}</td>
            <td>${respuestaTbl[i].descripcion}</td>
            <td>${respuestaTbl[i].primerNombre} ${respuestaTbl[i].primerApellido}</td>
            <td>${respuestaTbl[i].precio}</td>
            <td>${respuestaTbl[i].moneda}</td>
            <td>${respuestaTbl[i].fechaPublicacion}</td>
            <td>${respuestaTbl[i].fechaVencimiento}</td>
            <td>${respuestaTbl[i].estado}</td>
            <td><button class="btn btn-outline-danger" onclick="darDeBajaTbl(${respuestaTbl[i].idAnuncio})"><i class="far fa-trash-alt"></i></button></td>
            </tr>`
        );

    }

}
/**==============================================================FIN CARGAR TBL ======================================================= */

/**==============================================================BUSQUEDA======================================================= */
$("#inputBusquedaBtn").click(function () {
    //var optionSelected = $("option:selected", this);
    var valueSelected = $("#inputBusqueda").val();
    busqueda = valueSelected;
    console.log(valueSelected);
    hacerBusqueda();
    /*$.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?palabraClave=${valueSelected}&action=busquedaNombreUsuario`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            respuestaTbl=respuesta;
            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });*/

});

function hacerBusqueda() {
    $.ajax({
        url: `backend/publicaciones_Admin.php?palabraClave=${busqueda}&accion=busquedaNombreAnuncio`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            respuestaTbl = respuesta;
            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });
}

/*$('#inputBusqueda').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        hacerBusqueda();
        //Buscar();
        //e.preventDefault();
        //return false;
    }
});*/ /////////////////////////////////////////////////////////////////////
/*function myFunction(e) {
    //See notes about 'which' and 'key'
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == 13) {
        hacerBusqueda();
    }
}*/
/**==============================================================FIN BUSQUEDA======================================================= */

/**==============================================================SELECCIONAR CATEGORIA======================================================= */
$("#slc-categorias").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    //     console.log(valueSelected);

    $.ajax({
        url: `backend/publicaciones_Admin.php?idCategoria=${valueSelected}&accion=filtrarCategoria`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            respuestaTbl = respuesta;
            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });

});


function cargarCategorias() {
    $.ajax({
        url: "backend/publicaciones_admin.php?accion=seleccionarCategorias",
        method: "GET",
        dataType: "json",
        success: function (response) {
            for (let i = 0; i < response.length; i++) {
                $("#slc-categorias").append(
                    `<option value=${response[i].idCategorias}>${response[i].nombreCategoria}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
/**==============================================================FIN SELECCIONAR CATEGORIA======================================================= */

/**==============================================================SELECCIONAR USUARIO======================================================= */
$("#slc-usuarios").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/publicaciones_Admin.php?idUsuario=${valueSelected}&accion=filtrarUsuario`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            respuestaTbl = respuesta;
            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });

});

function cargarUsuarios() {
    $.ajax({
        url: "backend/publicaciones_admin.php?accion=seleccionarUsuarios",
        method: "GET",
        dataType: "json",
        success: function (response) {
            //let response = JSON.parse(respuesta);

            // console.log(response);
            // $("#slc-categorias").html(" ");

            for (let i = 0; i < response.length; i++) {
                $("#slc-usuarios").append(
                    `<option value=${response[i].idUsuario}>${response[i].primerNombre} ${response[i].primerApellido}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
/**==============================================================FIN SELECCIONAR USUARIO======================================================= */

/**==============================================================SELECCIONAR ESTADO DEL ANUNCIO======================================================= */

$("#slc-estados").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/publicaciones_admin.php?estado=${valueSelected}&accion=filtrarEstado`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

            respuestaTbl = respuesta;
            console.log(respuesta)
            cargarTablaTbl();
        },
        error: function (respuesta) {
            console.log(error);
        }
    });
});

/**==============================================================FIN SELECCIONAR ESTADO DEL ANUNCIO======================================================= */