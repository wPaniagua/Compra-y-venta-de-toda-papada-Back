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
            //console.log(respuesta);
            var contenido = "";
            console.log(respuesta);

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


function obtenerFotos(idUsuario){
   // console.log("DOM cargado");
   // 
   var parametros= "codigo="+idUsuario;
                    //alert(parametros);

    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerFotos",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            var contenido = "";
            console.log(respuesta);
            contenido='<img src="'+respuesta.urlFoto+'" class="rounded-circle" alt="..." style="width: 150px;height: 200px;">';
                /*  */
            $("#imgUsuario").append(contenido);
            
        }
    });
}