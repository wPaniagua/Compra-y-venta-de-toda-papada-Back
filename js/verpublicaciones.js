jQuery(document).ready(function ($) {

    console.log("Cargado DOM");

    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    const idpersona = urlParams.get('idpersona');

    if (idpersona == null) {
        window.location.href = "../inicio.php"
    }

    traerPublicaciones(idpersona);



});

function traerPublicaciones(idPersona) {

    $.ajax({
        url: "../backend/gestion_favoritos.php",
        method: "POST",
        data: `accion=verpublicaciones&idpersona=${idPersona}`,
        success: (respuesta) => {

            console.log(respuesta);

            if (respuesta != `["null"][]`) {
                let response = JSON.parse(respuesta);

                for (let i = 0; i < response.length; i++) {

                    $("#anuncios").append(
                        `
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
                                        <div class="col col-lg-4 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-american-sign-language-interpreting iconoTarjeta"> </i>
                                            Vendo
                                        </div>
                                        <div class="col col-lg-4 iconoPequeno ">
                                            <i style="display: block;"
                                                class="fas fa-dollar-sign iconoTarjeta"></i>
                                            L. ${response[i].precio}
                                        </div>
                                        <div class="col col-lg-4 iconoPequeno">
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
                                <button type="button" class="btn btn-outline-info"><a href="detalleAnuncio.php?idAnuncios=${response[i].idAnuncios}">Ver articulo</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `
                    );
                }

                console.log(response)
            }
        },
        error: (error) => {
            console.error(error);
        }
    });
}