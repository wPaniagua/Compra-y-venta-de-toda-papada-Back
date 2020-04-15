$(document).ready(function () {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    const busqueda = urlParams.get('busqueda');
    const categoria = urlParams.get("categoria");
    const hasta = urlParams.get("hasta");


    console.log("Busqueda get")
    console.log(busqueda);
    console.log("categoria get")
    console.log(categoria);
    console.log("hasta get")
    console.log(hasta);

    if (busqueda == null && categoria == null) {
        window.location.href = "busqueda.html?categoria=null&busqueda=";
    }

    hacerBusqueda(busqueda, categoria, hasta);

    traerDepartamentos();


});

function hacerBusqueda(busqueda, categoria, hasta) {

    dataQuerys = `accion=BusquedaPrincipal${busqueda!=""?`&busqueda=%${busqueda}%`:``}${validarCategoriaNumerica(categoria)?`&categoria=${categoria}`:``}${hasta!=null?`&hasta=${hasta}`:``}`;


    console.log("Busqueda general");
    console.log(dataQuerys.trim())

    $.ajax({
        url: "backend/busqueda.php",
        method: "POST",
        data: dataQuerys,
        success: function (respuesta) {
            console.log(respuesta)

            var response = Array();
            if (respuesta == `["null"][]`) {
                response = [];
            } else {
                response = JSON.parse(respuesta)
            }
            console.log(response);
            if (response.length > 0) {
                $("#noHayDatos").fadeOut();

                generarAnuncios(response);
            } else {
                //alert("No hay datos")
                //TODO:no hay datos mensaje
                $("#anuncios").html("");
                $("#noHayDatos").fadeIn();
            }
        },
        error: function (error) {
            console.error(error)
        }
    });

    // if (categoria != "null" && busqueda != "") {
    //     $.ajax({
    //         url: "backend/busqueda.php",
    //         method: "POST",
    //         data: `accion=traerNoNull&busqueda=%${busqueda}%&idcategoria=${categoria}`,
    //         success: function (respuesta) {
    //             let response = JSON.parse(respuesta)
    //             // console.log(response);

    //             generarAnuncios(response);
    //         },
    //         error: function (error) {
    //             console.error(error)
    //         }
    //     });
    // } else if (categoria == "null" && busqueda != "") {
    //     console.log("Categoria null")
    //     $.ajax({
    //         url: "backend/busqueda.php",
    //         method: "POST",
    //         data: `accion=traerCategoriaNull&busqueda=%${busqueda}%`,
    //         success: function (respuesta) {
    //             let response = JSON.parse(respuesta);

    //             generarAnuncios(response);
    //         },
    //         error: function (error) {
    //             console.error(error)
    //         }
    //     });
    // } else if (categoria != "null" && busqueda == "") {
    //     $.ajax({
    //         url: "backend/busqueda.php",
    //         method: "POST",
    //         data: `accion=traerBusquedaNull&idcategoria=${categoria}`,
    //         success: function (respuesta) {
    //             let response = JSON.parse(respuesta)
    //             // console.log(response);

    //             generarAnuncios(response);
    //         },
    //         error: function (error) {
    //             console.error(error)
    //         }
    //     });
    // } else if (categoria == "null" && busqueda == "") {
    //     $.ajax({
    //         url: "backend/busqueda.php",
    //         method: "POST",
    //         data: `accion=traerTodos`,
    //         success: function (respuesta) {
    //             let response = JSON.parse(respuesta);
    //             //console.log(response);

    //             generarAnuncios(response);
    //         },
    //         error: function (error) {
    //             console.error(error)
    //         }
    //     });
    // }
}

function generarAnuncios(response) {

    $("#anuncios").html("");
    $("#segundaFila").html("")

    for (let i = 0; i < 2; i++) {
        $("#anuncios").append(`
        <div class="col col-lg-5">
            <div class="card" style="width: inherit;">
                <img class="card-img-top"
                    src="https://i.pcmag.com/imagery/reviews/05PEXoDoiSN5HXomKOYFTJ7-18.fit_lim.size_1320x742.v_1574731239.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-12">
                                <strong>${response[i].titulo}</strong>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-lg-3 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-american-sign-language-interpreting iconoTarjeta"> </i>
                                            Vendo
                                        </div>
                                        <div class="col col-lg-3 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-dollar-sign iconoTarjeta"></i>
                                            L. ${response[i].precio}
                                        </div>
                                        <div class="col col-lg-3 iconoPequeno">
                                            <i style="display: block;"
                                                class="fas fa-location-arrow iconoTarjeta"></i>
                                            ${response[i].municipio}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-12 descripcionAnuncio">
                                <p>${response[i].descripcion}.</p>
                                <button type="button" class="btn btn-outline-info">Ver articulo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `);
    }
    for (let i = 2; i < response.length; i++) {
        $("#segundaFila").append(`
        <div class="col col-lg-3">
            <div class="card" style="width: inherit;">
                <img class="card-img-top"
                    src="https://i.pcmag.com/imagery/reviews/05PEXoDoiSN5HXomKOYFTJ7-18.fit_lim.size_1320x742.v_1574731239.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-12">
                                <strong>${response[i].titulo}</strong>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-lg-3 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-american-sign-language-interpreting iconoTarjeta"> </i>
                                            Vendo
                                        </div>
                                        <div class="col col-lg-3 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-dollar-sign iconoTarjeta"></i>
                                            L. ${response[i].precio}
                                        </div>
                                        <div class="col col-lg-3 iconoPequeno">
                                            <i style="display: block;"
                                                class="fas fa-location-arrow iconoTarjeta"></i>
                                            ${response[i].municipio}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-12 descripcionAnuncio">
                                <p>${response[i].descripcion}.</p>
                                <button type="button" class="btn btn-outline-info">Ver articulo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `);
    }
}

function traerDepartamentos() {


    $.ajax({
        url: "backend/Select_Deptos_Municipios.php",
        method: "POST",
        data: `data=departamentos`,
        success: function (respuesta) {
            let response = JSON.parse(respuesta);
            console.log(response);

            //$("#departamentos").html("");
            for (let i = 0; i < response.length; i++) {
                console.log("entra for")
                $("#departamentos").append(`
                <option value=${response[i].idDepartamento}>${response[i].nombre}</option>
                `);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function traerMunicipios() {
    let idDepartamento = $("#departamentos option:selected").val();
    console.log(idDepartamento);

    $("#municipios").html("");
    $("#municipios").append(`<option value="null" selected>Seleccione un municipio</option>`);

    if (idDepartamento != "null") {

        $.ajax({
            url: "backend/Select_Deptos_Municipios.php",
            method: "POST",
            data: `data=municipios&idDepartamento=${idDepartamento}`,
            success: function (respuesta) {
                let response = JSON.parse(respuesta);
                console.log(response);


                for (let i = 0; i < response.length; i++) {
                    console.log("entra for")
                    $("#municipios").append(`
                    <option value=${response[i].idMunicipio}>${response[i].nombre}</option>
                    `);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

}

function busquedaDetallada() {

    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    const busqueda = urlParams.get('busqueda');
    const categoria = urlParams.get("categoria");


    let departamento = $("#departamentos option:selected").val();
    let municipio = $("#municipios option:selected").val();

    //precios
    let desde = $("#desde").val();
    let hasta = $("#hasta").val();


    let servicio = $("input[name='servicios']:checked").val();

    console.log(departamento);
    console.log(municipio);
    console.log(desde);
    console.log(hasta);
    console.log(servicio);

    let data = `accion=filtros${departamento!="null"?`&idDepartamento=${departamento}`:``}${municipio!="null"?`&idMunicipio=${municipio}`:``}${validarValorNumerico(desde, "#mensajeDesde")?`&desde=${desde}`:``}${validarValorNumerico(hasta, "#mensajeHasta")?`&hasta=${hasta}`:``}${servicio!=""?`&servicio=${servicio}`:``}${validarCategoriaNumerica(categoria)?`&categoria=${categoria}`:``}${busqueda!=""?`&busqueda=%${busqueda}%`:``}`;
    console.log(data.trim());

    $.ajax({
        url: "backend/busqueda.php",
        method: "POST",
        datatype: "json",
        data: data.trim(),
        success: (respuesta) => {

            var response = Array();

            if (respuesta == `["null"][]`) {
                response = [];
            } else {
                response = JSON.parse(respuesta)
            }
            console.log(response);
            if (response.length > 0) {
                $("#noHayDatos").fadeOut();
                generarAnuncios(response);
            } else {
                //alert("No hay datos")
                $("#anuncios").html("");
                $("#noHayDatos").fadeIn();
            }

            // let response = JSON.parse(respuesta);
            // console.log(response);

            generarAnuncios(response);
        },
        error: (error) => {
            console.log(error);
        }
    });


}

$("#btn-buscar").on("click", () => {
    busquedaDetallada();
});

function validarValorNumerico(numero, idMensaje) {

    let esNumero = isNaN(numero) ? false : true;
    let estaVacio = numero == "" ? true : false;

    if (estaVacio) {
        $(idMensaje).fadeOut();
        return false;
    } else {
        if (!esNumero) {
            $(idMensaje).fadeIn();
            return false;
        } else {
            $(idMensaje).fadeOut();
            return true;
        }
    }
}

function validarCategoriaNumerica(numero) {

    let esNumero = isNaN(numero) ? false : true;
    let estaVacio = numero == "" ? true : false;

    if (estaVacio) {
        return false;
    } else {
        if (!esNumero) {
            return false;
        } else {
            return true;
        }
    }
}