$('#btnPublicar').click(registrarDatos);
$(window).on("load", function () {
    cargarCategorias();
    

    
});
function registrarDatos(){
    var nombre = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var idCategorias = $('#slc-categorias').val();
    var tipo = $('input:radio[name=tipo]:checked').val();
    var precio = $('#precio').val();
    var idPersona = $('#id_usuario').val();
    var idMoneda = $('input:radio[name=moneda]:checked').val();
    //var url = $('#url');
    console.log(nombre);

    
    $.ajax({
            url: "backend/gestionAgregarPub.php",
            data: `accion=obtener`+"&nombre="+nombre+"&descripcion="+descripcion+"&idCategoria="+idCategorias+"&tipo="+tipo+"&precio="+ precio+
            "&idPersona="+idPersona+"&idMoneda="+idMoneda,
            method: "POST",
            dataType: "json",
            success: function (respuesta) {
            console.log(respuesta);

        },
            error: function (error) {
                console.log(error)
            }
        });

}


function cargarCategorias() {
    $.ajax({
        url: "backend/gestionAgregarPub.php",
        method: "POST",
        data: `accion=seleccionarCategorias`,
        success: function (respuesta) {

            let response = JSON.parse(respuesta);

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
