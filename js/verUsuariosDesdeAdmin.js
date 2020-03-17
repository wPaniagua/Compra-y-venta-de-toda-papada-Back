$(window).on("load", function () {
    cargarTabla();
    cargarTipoUsuarios();
    cargarDepartamento();
    cargarMunicipio();

})
var respuestaTbl;
var busqueda;
/**==============================================================CARGAR TABLA EN GENERAL======================================================= */
function darDeBaja(idPersona) {

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?idPersona=${idPersona}&action=darDeBaja`,
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

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
        url: "backend/verUsuariosDesdeAdmin.php?action=getUsuarios",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

            console.log(respuesta);

            $("#tablaUsuarios>tbody").html(" ");

            for (let i = 0; i < respuesta.length; i++) {

                $("#tablaUsuarios>tbody").append(
                    `<tr>  
                <td>${respuesta[i].primerNombre}</td>
                <td>${respuesta[i].primerApellido}</td>
                <td>${respuesta[i].tipoUsuario}</td>
                <td>${respuesta[i].fechaNacimiento}</td>
                <td>${respuesta[i].telefono}</td>
                <td>${respuesta[i].correo}</td>
                <td>${respuesta[i].departamento}</td>
                <td>${respuesta[i].municipio}</td>
                <td>${respuesta[i].estado}</td>
                <td><button class="btn btn-outline-danger" onclick="darDeBaja(${respuesta[i].idPersona})"><i class="far fa-trash-alt"></i></button></td>
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
function darDeBajaTbl(idPersona) {

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?idPersona=${idPersona}&action=darDeBaja`,
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
    
    $("#tablaUsuarios>tbody").html(" ");

    for (let i = 0; i < respuestaTbl.length; i++) {

        $("#tablaUsuarios>tbody").append(
            `<tr>  
        <td>${respuestaTbl[i].primerNombre}</td>
        <td>${respuestaTbl[i].primerApellido}</td>
        <td>${respuestaTbl[i].tipoUsuario}</td>
        <td>${respuestaTbl[i].fechaNacimiento}</td>
        <td>${respuestaTbl[i].telefono}</td>
        <td>${respuestaTbl[i].correo}</td>
        <td>${respuestaTbl[i].departamento}</td>
        <td>${respuestaTbl[i].municipio}</td>
        <td>${respuestaTbl[i].estado}</td>
        <td><button class="btn btn-outline-danger" onclick="darDeBajaTbl(${respuestaTbl[i].idPersona})"><i class="far fa-trash-alt"></i></button></td>
        </tr>`
        );

    }

}
/**==============================================================FIN CARGAR TBL ======================================================= */

/**==============================================================BUSQUEDA======================================================= */
$("#inputBusquedaBtn").click(function () {
    //var optionSelected = $("option:selected", this);
    var valueSelected = $("#inputBusqueda").val();
    busqueda=valueSelected;
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

function hacerBusqueda(){
    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?palabraClave=${busqueda}&action=busquedaNombreUsuario`,
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
});*//////////////////////////////////////////////////////////////////////
/*function myFunction(e) {
    //See notes about 'which' and 'key'
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == 13) {
        hacerBusqueda();
    }
}*/
/**==============================================================FIN BUSQUEDA======================================================= */


/**==============================================================SELECCIONAR TIPO DE USUARIO======================================================= */
$("#slc-tipoUsuario").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?idUsuario=${valueSelected}&action=filtrarUsuario`,
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
    });
});

function cargarTipoUsuarios() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php?action=seleccionarTipoUsuarios",
        method: "GET",
        dataType: "json",
        success: function (response) {

            for (let i = 0; i < response.length; i++) {
                $("#slc-tipoUsuario").append(
                    `<option value=${response[i].idTipoUsuario}>${response[i].descripcion}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
/**==============================================================FIN SELECCIONAR TIPO DE USUARIO======================================================= */


/**==============================================================SELECCIONAR DEPARTAMENTO======================================================= */
$("#slc-departamento").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?idDepto=${valueSelected}&action=filtrarDepto`,
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
    });
});

function cargarDepartamento() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php?action=seleccionarDepartamento",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {

            for (let i = 0; i < respuesta.length; i++) {
                $("#slc-departamento").append(
                    `<option value=${respuesta[i].idDeptos}>${respuesta[i].nombre}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
/**==============================================================FIN SELECCIONAR DEPARTAMENTO======================================================= */


/**==============================================================SELECCIONAR MUNICIPIO======================================================= */

$("#slc-municipio").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?idMunicipio=${valueSelected}&action=filtrarMunicipio`,
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
    });
});

function cargarMunicipio() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php?action=seleccionarMunicipio",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            for (let i = 0; i < respuesta.length; i++) {
                $("#slc-municipio").append(
                    `<option value=${respuesta[i].idMunicipio}>${respuesta[i].nombre}</option>`
                )
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
/**==============================================================FIN SELECCIONAR MUNICIPIO======================================================= */

/**==============================================================SELECCIONAR ESTADO DEL USUARIO======================================================= */

$("#slc-estados").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

    $.ajax({
        url: `backend/verUsuariosDesdeAdmin.php?estado=${valueSelected}&action=filtrarEstado`,
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
    });
});

/**==============================================================FIN SELECCIONAR ESTADO DEL USUARIO======================================================= */
