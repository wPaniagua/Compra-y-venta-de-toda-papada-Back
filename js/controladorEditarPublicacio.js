$(window).on("load", function () {
  const queryString = window.location.search;

  const urlParams = new URLSearchParams(queryString);

  const idAnuncio = urlParams.get('idAnuncio');

    cargarCategorias();
    obtenerIdUsuario();
    obtenerDatos(idAnuncio);
    obtenerFotosANuncio(idAnuncio);
    $("#publicaciones").addClass("active");
});


function cargarCategorias() {
    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        method: "POST",
        data: `accion=seleccionarCategorias`,
        success: function (respuesta) {

            let response = JSON.parse(respuesta);
            console.log(response);
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

//funcion para validar registro
function validarRegistro(){

    var idCategorias = $('#slc-categorias').val();
    console.log(idCategorias);
    //var tipo = $('input:radio[name=tipo]:checked').val();
    //var idMoneda = $('input:radio[name=moneda]:checked').val();
    var nombre = validarCampoVacio("titulo");
    var descripcion =validarCampoVacio("descripcion");
    var precio = validarCampoVacio("precio");
    //var idPersona = validarCampoVacio(id_usuario);
 
    var catS=false;
    if (nombre) {
        // statement
        $("#msjTitulo").fadeOut();
    } else {
        // statement
        $("#msjTitulo").fadeIn();
    }

    if (descripcion) {
        $("#msjdescripcion").fadeOut();
    } else {
        $("#msjdescripcion").fadeIn();
    }

    if (precio) {
        $("#msjPrecio").fadeOut();
    } else {
        $("#msjPrecio").fadeIn();
    }

    if (idCategorias=='null') {
        // statement
        console.log('Entro a error');
        $("#msjCate").fadeIn();
        $("#slc-categorias").removeClass('is-valid');
        $("#slc-categorias").addClass('is-invalid');
        catS=false;
    } else {
        // statement
        $("#msjCate").fadeOut();
        $("#slc-categorias").removeClass('is-invalid');
        $("#slc-categorias").addClass('is-valid');
        catS=true;
    }

    if (!(nombre || descripcion  || catS || precio)) {
        // statement
        return false;
    } else {
        // statement
        return true;
    }
}

var validarCampoVacio = function(id){
 
 if ($("#"+id).val() == ""){
  $("#"+id).removeClass('is-valid');
  $("#"+id).addClass('is-invalid');
  return false;
 }
 else{
  $("#"+id).removeClass('is-invalid');
  $("#"+id).addClass('is-valid');
  return true;
 }
};

function obtenerIdUsuario() {
 $.ajax({
  url: "../backend/perfilAdmin.php",
  // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
  method: "GET",
  dataType: "json",
  success: function (respuesta) {
   //console.log(respuesta);
   $("#idUsuario").val(respuesta.idUsuario);

  },
  error: function (error) {
   console.log(error)
  }
 });
}

function obtenerDatos(idAnuncio) {

    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        data: `accion=obtenerAnuncio`,
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            //console.log(respuesta);
          for (var i = 0; i<respuesta.length; i++){
           if (respuesta[i].idAnuncios==idAnuncio) {
              // statement
              console.log(respuesta[i]);
            $('#titulo').val(respuesta[i].titulo);
            $('#descripcion').val(respuesta[i].descripcion);
            //$('#slc-categorias').val();
            $("#slc-categorias option[value="+respuesta[i].idCategorias+"]").attr("selected",true);
           // $('input:radio[name=tipo]:checked').val();
            $("input[name=tipo][value=" + respuesta[i].tipo + "]").attr('checked', 'checked');
            $('#precio').val(respuesta[i].precio);
    
            $("input[name=moneda][value=" + respuesta[i].idMoneda + "]").attr('checked', 'checked');
              

              }
            }
            
            
        },
        error: function (error) {
            console.log(error)
        }
    });

}

function editarDatos(){
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const idAnuncios = urlParams.get('idAnuncio');

  if (validarRegistro()==true) {

   var nombre = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var idCategorias = $('#slc-categorias').val();
    var tipo = $('input:radio[name=tipo]:checked').val();
    var precio = $('#precio').val();
    var idPersona = $('#idUsuario').val();
    var idMoneda = $('input:radio[name=moneda]:checked').val();
    var idAnuncio =idAnuncios; 
    //var url = $('#url');
    //console.log('Persona: '+idPersona);

    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        data: `accion=editar` + "&nombre=" + nombre + "&descripcion=" + descripcion + "&idCategoria=" + idCategorias + "&tipo=" + tipo + "&precio=" + precio +
            "&idPersona=" + idPersona + "&idMoneda=" + idMoneda+ "&idAnuncio=" + idAnuncio,
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            $("#msjAviso").html(respuesta[0].mensaje);
            $("#msjAviso").fadeIn();
            $("#msjAviso").fadeOut(4000);

            if (respuesta[0].mensaje=='Edicion exitosa') {
              // statement
              var url = "http://localhost/Compra-y-venta-de-toda-papada-Back/usuarioCV/publicaciones.php";
              window.location = url;
            } 
        },
        error: function (error) {
            console.log(error)
        }
    });
  } else {
   // statement
   //alert("Campos requeridos");
  }
}

function obtenerFotosANuncio(idAnuncio){
  var idAnuncios =idAnuncio; 
    //var url = $('#url');
    //console.log('Persona: '+idPersona);

    $.ajax({
        url: "../backend/gestionAgregarPub.php",
        data: `accion=obtenerFotos` + "&idAnuncio=" + idAnuncio,
        method: "POST",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            var contenidoD='';
            var contenido='';
            if (respuesta.length>0) {
              // statement
              for (var i = 0; i<respuesta.length; i++){
                contenido+='<div class="col-md-4">'+
              '<img src="../'+respuesta[i].urlFoto+'" style="width: 250px;height: 250px;"></div>';
              }
              $("#imgAnuncio").append(contenido);
            } else {
              // statement
              
              
                  contenidoD='<div class="col-md-4">'+
              '<img src="../imgCate/micro3.jpg"></div>'+
              '<div class="col-md-4"><img src="../imgCate/microondas.jpg">'+
              '</div><div class="col-md-4">'+
              '<img src="../imgCate/micro2.jpg"></div>'+
              '<div class="col-md-4"><img src="../imgCate/micro4.jpg">'+
              '</div>';
              
              console.log('No hay fotos');
              $("#imgAnuncio").append(contenidoD);
            }
        },
        error: function (error) {
            console.log(error)
        }
    });
}