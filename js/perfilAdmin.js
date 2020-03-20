$(document).ready(function () {


    console.log("DOM cargado");

    $.ajax({
        url: "backend/perfilAdmin.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);


            $("#txtNombre").val(respuesta.nombre);
            $("#hNombre").html(respuesta.nombre);
            $("#txtCorreo").val(respuesta.correo);
            $("#fecha").html( respuesta.fechaNa);
            obtenerMunicipios(respuesta.idmunicipio);
            obtenerFotos(respuesta.idUsuario);
            obtenerTelefono(respuesta.idUsuario);

        },
        error: function (error) {
            console.log(error)
        }
    });


});

$("#cerrarSesion").on("click", () => {

    $.ajax({

        url: "backend/cerrarSesion.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.ok) {
                location.reload();
            }

        },
        error: function (error) {
            console.log(error)
        }

    });
})


function obtenerMunicipios(idmunicipio){
   // console.log("DOM cargado");
    document.getElementById("municipios").innerHTML = " ";

    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerMunicipios",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            var contenido = "";
            //console.log(respuesta);

                /*  */
            for (var i = 0; i<respuesta.length; i++){
                
                if (respuesta[i].idmunicipio=idmunicipio) {
                    contenido += '<option value="'+respuesta[i].idmunicipio+'" selected="selected">'+
                                respuesta[i].nombre+'</option>';
                                obtenerDeptos(respuesta[i].idDeptos);
                }else {
                    contenido += '<option value="'+respuesta[i].idmunicipio+'">'+
                                respuesta[i].nombre+'</option>';
                }
            }

            $("#municipios").append(contenido);
        }
    });

}
function obtenerDeptos(idDeptos){
   // console.log("DOM cargado");
    document.getElementById("departamentos").innerHTML = " ";

    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerDeptos",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            var contenido = "";
            console.log(respuesta);

                /*  */
            for (var i = 0; i<respuesta.length; i++){
                
                if (respuesta[i].idDeptos=idDeptos) {
                    contenido += '<option value="'+respuesta[i].idDeptos+'" selected="selected">'+
                                respuesta[i].nombre+'</option>';
                }else {
                    contenido += '<option value="'+respuesta[i].idDeptos+'">'+
                                respuesta[i].nombre+'</option>';
                }
            }
            document.getElementById("departamentos").innerHTML = " ";
            $("#departamentos").append(contenido);
        }
    });
}




//funcion para obtener la foto del user logiado
function obtenerFotos(idUsuario){
   // console.log("DOM cargado");
   // 
   var parametros= "codigo="+idUsuario;
                    //alert(parametros);
    document.getElementById("imgUsuario").innerHTML = " ";
    document.getElementById("imgNP").innerHTML = " ";
    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerFoto",
        method:"GET",
        data:parametros,
        dataType:"json",
        success:function(respuesta){
            var contenido = "";
            var foto=""
            //alert(respuesta[0].urlFoto)
            //console.log(respuesta);
            contenido='<img src="'+respuesta[0].urlFoto+'" class="rounded-left rounded-circle" alt="..." style="width: 230px;height: 300px;">';
                /*  */

            foto='<img src="'+respuesta[0].urlFoto+'" alt="..." class="rounded-circle" alt="..." style="width: 50px;height: 60px;">';
            
            document.getElementById("imgUsuario").innerHTML = " ";
            document.getElementById("imgNP").innerHTML = " ";
            $("#imgNP").append(foto);
            $("#imgUsuario").append(contenido);
        }
    });
}

//cargar foto
function cargarFoto(){
    $.ajax({
        url: "backend/perfilAdmin.php",
        // data: "correo=" + correo.toLowerCase() + "&contrasena=" + contrasena, //data, //"correo=" + $("#txt-correo").val().toLowerCase() + "&password=" + $("#txt-contrasena").val(),
        method: "GET",
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            obtenerFotos(respuesta.idUsuario);
            

        },
        error: function (error) {
            console.log(error)
        }
    });
}

//funcion para obtener el telefono del user logiado
function obtenerTelefono(idUsuario){
   // console.log("DOM cargado");
   // 
   var parametros= "codigo="+idUsuario;
                    //alert(parametros);

    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerTelefono",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            $("#txtTelefono").val(respuesta[0].telefono);
        }
    });
}

document.addEventListener("DOMContentLoaded",()=>{
    let form = document.getElementById('form_subir');

    form.addEventListener("submit",function(event){
        event.preventDefault();
        subir_archivos(this);
    });
});
 
function subir_archivos(form){

    let peticion= new XMLHttpRequest();

    //enviar datos
    peticion.open('post','backend/subirImgAdmin.php');
    peticion.send(new FormData(form));
    $("#msj").fadeIn();
    $("#msj").fadeOut(2000);
}



 