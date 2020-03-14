$(window).on("load", function () {
    cargarTabla();
    //cargarTipoUsuarios();
    cargarDepartamento();
    cargarMunicipio();

})


function darDeBaja(idPersona) {

    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php",
        data: `idPersona=${idPersona}&accion=darDeBaja`,
        method: "POST",
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
        url: "backend/verUsuariosDesdeAdmin.php?action=getUsuarios",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            //let respuesta =JSON.stringify(respuestas);
            //let response = JSON.parse(respuesta)
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

$("#slc-categorias").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

});


function cargarTipoUsuarios() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php",
        method: "POST",
        data: `accion=seleccionarTipoUsuarios`,
        success: function (respuesta) {
            let response = JSON.parse(respuesta);

            // $("#slc-categorias").html(" ");

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

function cargarDepartamento() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php?action=seleccionarDepartamento",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            //let response = JSON.parse(respuesta);

            //console.log(response);
            // $("#slc-categorias").html(" ");

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

function cargarMunicipio() {
    $.ajax({
        url: "backend/verUsuariosDesdeAdmin.php?action=seleccionarMunicipio",
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            //let response = JSON.parse(respuesta);

            // $("#slc-categorias").html(" ");

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