$(document).ready(function () {

    //  traerElectronicos();
    traerCategorias();
    traerSlides()

});

$("#login-button").on("click", () => {
    let correo = $("#correo").val();
    let contrasena = $("#contrasena").val();

    console.log(correo + ", " + contrasena);

    /*|||||||||||||||||VALIDACIONES|||||||||||||||||||||| */

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    //prueba si el correo es valido
    var esCorreoValido = re.test(String(correo).toLowerCase());

    var esContrasenaValida = contrasena.length > 6;

    if (correo != "" && contrasena != "") {
        login(correo, contrasena);

    } else {
        alert("No puede dejar Campos Vacios")
    }

});



function validarCampoVacio(id) {

    /*Funcion que valida si el campo está vacío */
    if (document.getElementById(id).value == "") {
        document.getElementById(id).classList.remove("is-valid");
        document.getElementById(id).classList.add("is-invalid");
        return false;
    } else {
        document.getElementById(id).classList.remove("is-invalid");
        document.getElementById(id).classList.add("is-valid");
        return true;
    }
}

function validarEmail(email, emailId) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(String(email).toLowerCase())) {
        //console.log("Correo valido " + email);
        document.getElementById(emailId).classList.remove("is-invalid");
        document.getElementById(emailId).classList.add("is-valid");

    } else {
        //console.log("Correo invalido " + email);
        document.getElementById(emailId).classList.remove("is-valid");
        document.getElementById(emailId).classList.add("is-invalid");

    }
}

async function login(correo, contrasena) {


    data = {
        correo: correo.toLowerCase(), //$("#correo").val().toLowerCase(),
        password: contrasena //$("#contrasena").val()
    };

    var respuestaGlobal;


    $.ajax({
        url: "backend/login.php",
        data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "POST",
        dataType: "json",
        success: async function (respuesta) {
            respuestaGlobal = respuesta;

            // alert(respuesta.mensaje);

            console.log(respuesta);


            if (respuesta.existe == 1 && respuesta.contrasenaCorrecta == 1 && respuesta.estadoRegistro == 1) {

                console.log("Logueado Exitosamente");

                document.getElementById("correo").classList.remove("is-invalid");
                document.getElementById("correo").classList.add("is-valid");

                document.getElementById("contrasena").classList.remove("is-invalid");
                document.getElementById("contrasena").classList.add("is-valid");
                $("#aviso").fadeOut();
                $("#avisoContrasena").fadeOut();


                await sleep(500);
                location.reload();
            } else if (respuesta.existe == 1 && respuesta.contrasenaCorrecta == 0) {

                console.log("contrasena incorrecta");

                document.getElementById("contrasena").classList.remove("is-valid");
                document.getElementById("contrasena").classList.add("is-invalid");
                $("#avisoContrasena").fadeIn();
                $("#aviso").fadeOut();

            } else if (respuesta.existe == 0 && respuesta.contrasenaCorrecta ==
                0) {
                console.log(" No existe el usuario");


                document.getElementById("correo").classList.remove("is-valid");
                document.getElementById("correo").classList.add("is-invalid");

                document.getElementById("contrasena").classList.remove("is-valid");
                document.getElementById("contrasena").classList.add("is-invalid");


                $("#aviso").fadeIn();
            } else if (respuesta.existe == 1 && respuesta.contrasenaCorrecta == 1 && respuesta.estadoRegistro == 0) {
                console.log(respuesta.mensaje)

                $("#mensajeDadodeBaja").fadeIn();
            }
        },
        error: function (error) {
            console.log(error);
            alert("Ocurrió un error.");
        }
    });


    // var loginCorrecto = true;

    // if (loginCorrecto) {
    //     document.getElementById("correo").classList.remove("is-invalid");
    //     document.getElementById("correo").classList.add("is-valid");

    //     document.getElementById("contrasena").classList.remove("is-invalid");
    //     document.getElementById("contrasena").classList.add("is-valid");
    //     $("#aviso").fadeOut();
    //     $("#avisoContrasena").fadeOut();

    //     await sleep(500);

    //     // $('#modalFormularioLogin').modal('hide')
    // } else {

    //     var correoIncorrecto = true;
    //     var contrasenaIncorrecta = true;


    //     if (correoIncorrecto) {
    //         contrasenaIncorrecta = true;
    //     }



    //     if (correoIncorrecto) {
    //         document.getElementById("correo").classList.remove("is-valid");
    //         document.getElementById("correo").classList.add("is-invalid");

    //         document.getElementById("contrasena").classList.remove("is-valid");
    //         document.getElementById("contrasena").classList.add("is-invalid");

    //         $("#aviso").fadeIn();

    //     } else if (contrasenaIncorrecta) {
    //         document.getElementById("contrasena").classList.remove("is-valid");
    //         document.getElementById("contrasena").classList.add("is-invalid");
    //         $("#avisoContrasena").fadeIn();
    //     }
    // }
}

function sleep(time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}


function traerElectronicos() {
    $.ajax({
        url: "backend/inicio.php",
        method: "POST",
        data: "accion=traerElectronicos",
        success: function (respuesta) {

            var response = JSON.parse(respuesta);

            var cantidadSlides = Math.ceil(response.length / 4);
            console.log("cantidadSlides: " + cantidadSlides);

            var cantidadFor = cantidadSlides == 1 ? 2 : cantidadSlides;
            console.log("cantidad for: " + cantidadFor)


            var indexResponse = 0;

            $("#electronicosSlides").html("");

            var elementosSobrantes = response.length;


            for (let i = 0; i < cantidadSlides; i++) {

                if (i == 0) {
                    $("#electronicosSlides").append(`<div class="carousel-item active"><div class="row" id="electronicosParte${i}">`);
                } else {
                    $("#electronicosSlides").append(`<div class="carousel-item"><div class="row" id="electronicosParte${i}">`);
                }


                var sobranSuficientes = elementosSobrantes < 4 ? elementosSobrantes : 4;

                for (let j = 0; j < sobranSuficientes; j++) {
                    if (j == 0) {

                        $(`#electronicosParte${i}`).append(`
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="https://eldiariony.files.wordpress.com/2018/04/sony-xperia-xz-premium-cnet.jpg?quality=80&strip=all&w=940"
                                    alt="Card image cap">
                                <div class="card-body" style="max-height:10em; min-height:10em;">
                                    <h5 class="card-title">${response[indexResponse].titulo.slice(0, 22)}...</h5>
                                    <p class="card-text">${response[indexResponse].descripcion}.</p>
                                    <a class="btn btn-outline-info">Ver anuncio</a>
                                </div>
                            </div>
                        </div>
                    
                    `);
                    } else {

                        $(`#electronicosParte${i}`).append(`
                    <div class="col-md-3 clearfix d-none d-md-block">
                        <div class="card mb-2">
                            <img class="card-img-top"
                                src="https://eldiariony.files.wordpress.com/2018/04/sony-xperia-xz-premium-cnet.jpg?quality=80&strip=all&w=940"
                                alt="Card image cap">
                            <div class="card-body" style="max-height:10em; min-height:10em;">
                                <h5 class="card-title">${response[indexResponse].titulo.slice(0, 22)}...</h5>
                                <p class="card-text">${response[indexResponse].descripcion}.</p>
                                <a class="btn btn-outline-info">Ver anuncio</a>
                            </div>
                        </div>
                    </div>
                
                `);
                    }


                    indexResponse++;
                }

                elementosSobrantes -= 4;

                $("#electronicosSlides").append(`</div></div>`);


            }

            $("#electronicos").html("");

            for (var i = 0; i < cantidadFor; i++) {
                console.log("entra a for de indicators");

                if (i == 0) {
                    $("#electronicos").append(`
                    <li data-target="#multi-item-example" data-slide-to="${i}" style="background-color:black;" class="active">
                    `);
                } else {
                    $("#electronicos").append(`
                    <li data-target="#multi-item-example" data-slide-to="${i}" style="background-color:black;">
                    `);
                }

            }

            console.log(response);
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function llenarSlides(response, categoriaNombre, categoriaSlide, categoriaControl, indexGeneral) {

    console.log("Valores recibidos:")
    console.log(response);
    console.log(categoriaNombre);
    console.log(categoriaSlide);
    console.log(categoriaControl);

    //cambiar titulo a categoria
    $(`#tituloCategoria${indexGeneral}`).html(categoriaNombre);
    $(`#linkCategoria${indexGeneral}`).html(`
    <a href="busqueda?categoria=${response[0].idCategorias}&busqueda=">Ver todos</a>
    <i style="margin-left:1em;" class="fas fa-arrow-right"></i>
    `);



    var cantidadSlides = Math.ceil(response.length / 4);
    console.log("cantidadSlides: " + cantidadSlides);

    var cantidadFor = cantidadSlides == 1 ? 2 : cantidadSlides;
    console.log("cantidad for: " + cantidadFor)


    var indexResponse = 0;

    // $("#tituloCategoria0")

    $(categoriaSlide).html("");

    var elementosSobrantes = response.length;


    var cantNetSlides = cantidadSlides <= 2 ? cantidadSlides : 2;
    for (let i = 0; i < cantidadSlides; i++) {

        if (i == 0) {
            $(categoriaSlide).append(`<div class="carousel-item active"><div class="row" id="${categoriaNombre}Parte${i}">`);
        } else {
            $(categoriaSlide).append(`<div class="carousel-item"><div class="row" id="${categoriaNombre}Parte${i}">`);
        }

        var sobranSuficientes = elementosSobrantes < 4 ? elementosSobrantes : 4;

        for (let j = 0; j < sobranSuficientes; j++) {

            console.log("Sobran sufiicientes");
            console.log(`#${categoriaNombre}Parte${i}`);
            if (j == 0) {

                $(`#${categoriaNombre}Parte${i}`).append(`
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="https://eldiariony.files.wordpress.com/2018/04/sony-xperia-xz-premium-cnet.jpg?quality=80&strip=all&w=940"
                                    alt="Card image cap">
                                <div class="card-body" style="max-height:10em; min-height:10em;">
                                    <h5 class="card-title">${response[indexResponse].titulo.slice(0, 22)}...</h5>
                                    <p class="card-text">${response[indexResponse].descripcion}.</p>
                                    <a class="btn btn-outline-info">Ver anuncio</a>
                                </div>
                            </div>
                        </div>
                    
                    `);
            } else {

                $(`#${categoriaNombre}Parte${i}`).append(`
                    <div class="col-md-3 clearfix d-none d-md-block">
                        <div class="card mb-2">
                            <img class="card-img-top"
                                src="https://eldiariony.files.wordpress.com/2018/04/sony-xperia-xz-premium-cnet.jpg?quality=80&strip=all&w=940"
                                alt="Card image cap">
                            <div class="card-body" style="max-height:10em; min-height:10em;">
                                <h5 class="card-title">${response[indexResponse].titulo.slice(0, 22)}...</h5>
                                <p class="card-text">${response[indexResponse].descripcion}.</p>
                                <a class="btn btn-outline-info">Ver anuncio</a>
                            </div>
                        </div>
                    </div>
                
                `);
            }


            indexResponse++;
        }

        elementosSobrantes -= 4;

        $(categoriaSlide).append(`</div></div>`);


    }

    $(categoriaControl).html("");

    for (var i = 0; i < cantidadFor; i++) {
        console.log("entra a for de indicators");

        if (i == 0) {
            $(categoriaControl).append(`
                    <li data-target="#slide${indexGeneral}" data-slide-to="${i}" style="background-color:black;" class="active">
                    `);
        } else {
            $(categoriaControl).append(`
                    <li data-target="#slide${indexGeneral}" data-slide-to="${i}" style="background-color:black;">
                    `);
        }

    }

    console.log(response);

}

function traerSlides() {

    $.ajax({
        url: "backend/inicio.php",
        method: "POST",
        data: `accion=probandoFetchGroup`,
        success: function (respuesta) {
            let response = JSON.parse(respuesta)

            //console.log("FetchGroup");
            //console.log(response);

            var categorias = Array();
            for (let i = 0; i < response.length; i++) {
                if (!categorias.includes(response[i].categoria)) {
                    categorias.push(response[i].categoria)
                }
            }

            console.log("Categorias");
            console.log(categorias);

            var arregloGeneral = Array();

            for (let i = 0; i < categorias.length; i++) {

                let temp = response.filter((elemento) => {
                    return elemento.categoria == categorias[i];
                });

                arregloGeneral.push(temp);
            }

            console.log("arregloGeneral");
            console.log(arregloGeneral);
            shuffleArray(arregloGeneral)

            for (let i = 0; i < arregloGeneral.length; i++) {
                llenarSlides(arregloGeneral[i], arregloGeneral[i][0].categoria, `#categoriaSlide${i}`, `#categoriaControl${i}`, i);
            }


        },
        error: function (error) {
            console.error(error)
        }
    });
}


function traerCategorias() {

    $.ajax({
        url: "backend/inicio.php",
        method: "POST",
        data: "accion=Traercategorias",
        success: function (respuesta) {
            let response = JSON.parse(respuesta);

            //console.log(response);

            // $("#categoriasElementos").html("");
            // $("#categoriasElementos").append(`<option value="null" selected>Todas</option>`);

            for (let i = 0; i < response.length; i++) {
                $("#categoriasElementos").append(`
                <option value="${response[i].idCategorias}">${response[i].descripcion}</option>`);

            }
        },
        error: function (error) {
            console.error(error)
        }

    });
}

$("#btn-busqueda").on("click", () => {
    console.log("click");

    let categoriaSeleccionada = $("#categoriasElementos :selected").val();
    console.log(categoriaSeleccionada);

    let busqueda = $("#inputBusqueda").val();
    console.log(busqueda)

    if (categoriaSeleccionada != "null" && busqueda != "") {
        window.location.href = `busqueda?categoria=${categoriaSeleccionada}&busqueda=${busqueda}`;
    } else if (categoriaSeleccionada == "null" && busqueda != "") {
        window.location.href = `busqueda?categoria=null&busqueda=${busqueda}`;
    } else if (categoriaSeleccionada != "null" && busqueda == "") {
        window.location.href = `busqueda?categoria=${categoriaSeleccionada}&busqueda=`;
    } else if (categoriaSeleccionada == "null" && busqueda == "") {
        console.error("Introduzca una busqueda")
    }
})
// console.log("Locacion")
// console.log(window.location.hostname)
// console.log(window.location.href)


// console.log(parseInt(2 / 3))



/**
 * Randomize array element order in-place.
 * Using Durstenfeld shuffle algorithm.
 */
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}