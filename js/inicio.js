$(document).ready(function () {

    traerElectronicos();
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

            let cantidadSlides = Math.ceil(response.length / 4);
            console.log("cantidadSlides: " + cantidadSlides);

            let cantidadFor = cantidadSlides == 1 ? 2 : cantidadSlides;
            console.log("cantidad for: " + cantidadFor)


            var indexResponse = 0;

            $("#electronicosSlides").html("");


            for (let i = 0; i < cantidadSlides; i++) {

                if (i == 0) {
                    $("#electronicosSlides").append(`<div class="carousel-item active"><div class="row" id="electronicosParte${i}">`);
                } else {
                    $("#electronicosSlides").append(`<div class="carousel-item"><div class="row" id="electronicosParte${i}">`);
                }

                for (let j = 0; j < 4; j++) {
                    if (j == 0) {

                        $(`#electronicosParte${i}`).append(`
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
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
                                src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
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

                $("#electronicosSlides").append(`</div></div>`);


            }

            $("#electronicos").html("");

            for (let i = 0; i < cantidadFor; i++) {
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

// console.log("Locacion")
// console.log(window.location.hostname)
// console.log(window.location.href)


// console.log(parseInt(2 / 3))