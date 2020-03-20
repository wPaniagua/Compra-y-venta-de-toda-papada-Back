$(document).ready(function () {


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


});

//funcion para obtener la foto del user logiado
function obtenerFotos(idUsuario){
   // console.log("DOM cargado");
   // 
   var parametros= "codigo="+idUsuario;
                    //alert(parametros);
    //document.getElementById("imgUsuario").innerHTML = " ";
    document.getElementById("imgNP").innerHTML = " ";
    $.ajax({
        url:"backend/editarPerfilAdmin.php?accion=obtenerFoto",
        method:"GET",
        data:parametros,
        dataType:"json",
        success:function(respuesta){
            var foto=""
            //alert(respuesta[0].urlFoto)
            //console.log(respuesta);
               /*  */

            foto='<img src="'+respuesta[0].urlFoto+'" alt="..." class="rounded-circle" alt="..." style="width: 50px;height: 60px;">';
            document.getElementById("imgNP").innerHTML = " ";
            $("#imgNP").append(foto);
        }
    });
}