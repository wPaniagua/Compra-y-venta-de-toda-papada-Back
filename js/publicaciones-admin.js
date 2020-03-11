$(window).on("load", function () {
    cargarTabla();
    cargarCategorias();
    cargarUsuarios();

})


function darDeBaja(idAnuncio) {

    $.ajax({
        url: "backend/publicaciones_admin.php",
        data: `idAnuncio=${idAnuncio}&accion=darDeBaja`,
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
        url: "backend/publicaciones_admin.php",
        data: `accion=getPublicaciones`,
        method: "POST",
        success: function (respuesta) {

            let response = JSON.parse(respuesta)
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

$("#slc-categorias").on("change", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    console.log(valueSelected);

});


function cargarCategorias() {
    $.ajax({
        url: "backend/publicaciones_admin.php",
        method: "POST",
        data: `accion=seleccionarCategorias`,
        success: function (respuesta) {
            let response = JSON.parse(respuesta);

            // $("#slc-categorias").html(" ");

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

function cargarUsuarios() {
    $.ajax({
        url: "backend/publicaciones_admin.php",
        method: "POST",
        data: `accion=seleccionarUsuarios`,
        success: function (respuesta) {
            let response = JSON.parse(respuesta);

            console.log(response);
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