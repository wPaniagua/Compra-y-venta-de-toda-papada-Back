$('#btnRegistro').click(obtenerJSON);
$('#btnGuardar').click(enviarDatos);

async function obtenerJSON()
{
    $.ajax({
        url:"class-gestion-deptos.php?accion=obtener_Deptos",
        method: "GET",
        dataType:"json",
        success: async function (respuesta)
        {
            //console.log(respuesta);
            //var dato = JSON.parse(respuesta);
            for(var i=0; i<respuesta.length; i++)
            {
                $("#depto").append('<option value="'+respuesta[i].idDeptos+'">'+respuesta[i].nombre+'</option>');
                //console.log(respuesta[i].idDeptos);
            }
        } 
    });
    $.ajax({
        url:"class-gestion-municipios.php?accion=obtener_Municipios",
        method: "GET",
        dataType:"json",
        success: async function (respuesta)
        {
            //console.log(respuesta);
            //var dato = JSON.parse(respuesta);
            for(var i=0; i<respuesta.length; i++)
            {
                $("#municipio").append('<option value="'+respuesta[i].idDeptos+'">'+respuesta[i].nombre+'</option>');
                //console.log(respuesta[i].idDeptos);
            }
        } 
    });
}

async function enviarDatos()
{
    var Nombre = $('#nombre').val();
    var Apellido = $('#apellido').val();
    var Correo = $('#correo').val();
    var ID = $('#ID').val();
    var Telefono = $('#telefono').val();
    var Fecha = $('#fechaNacimineto').val();
    var Depto = $('#depto').val();
    var Ciudad = $('#municipio').val();
    var Password = $('#contrasenia').val();
    var Tipo = $('input:radio[name=tipo]:checked').val();
    var ConfPassword = $('#confContrasenia').val();
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if(validarVacio(Nombre))
    {
        alert("Debe ingresar su nombre");
    }
    else
    {
        if (validarVacio(Apellido)) 
        {
            alert("Debe ingresar su apellido");
        } 
        else 
        {
            if (validarVacio(Correo)) 
            {
                alert("Debe ingresar su correo");
            } 
            else 
            {
                if (!expr.test(Correo))
                {
                    alert("Error: La dirección de correo " + correo + " es incorrecta.");
                }
                else
                {
                    if (validarVacio(ID))
                    {
                        alert("Debe ingresar su numero de identidad");
                    } 
                    else 
                    {
                        if (validarVacio(Telefono)) 
                        {
                            alert("Debe ingresar su telefono");
                        } else 
                        {
                            if (validarVacio(Fecha)) 
                            {
                                alert("Debe ingresar su fecha de nacimiento");
                            } 
                            else 
                            {
                                if (validarVacio(Depto)) 
                                {
                                    alert("Debe elegir un departamento");
                                } 
                                else 
                                {
                                    if (validarVacio(Ciudad)) 
                                    {
                                        alert("Debe elegir un municipio");
                                    } 
                                    else 
                                    {
                                        if (validarVacio(Password)) 
                                        {
                                            alert("Debe ingresar su contraseña");
                                        } 
                                        else 
                                        {
                                            if (validarVacio(ConfPassword))
                                            {
                                                alert("Debe confirmar su contraseña");
                                            }
                                            else
                                            {
                                                if (ConfPassword == !Password)
                                                {
                                                    alert("Las contraseñas no son iguales");
                                                }
                                                else
                                                {
                                                    if (!$("#contrtato").is(":checked"))
                                                    {
                                                        alert("Debe aceptar el contrato");
                                                    }
                                                    else 
                                                    {
                                                        var datos = {
                                                            'ppNombre':Nombre,
                                                            'ppApellido':Apellido,
                                                            'pcorreo':Correo,
                                                            'pid':ID,
                                                            'ptelefono':Telefono,
                                                            'pfechaNac':Fecha,
                                                            'pdepto':Depto,
                                                            'pmunicipio':Ciudad,
                                                            'pcontrasenia':Password,
                                                            'pestado':Tipo
                                                        };
                                                        var cadena1 = "ppNombre="+Nombre+"&ppApellido="+Apellido+"&pcorreo="+Correo+"&pid="+ID+"&ptelefono="+Telefono+"&pfechaNac="+Fecha+"&pdepto="+Depto
                                                        +"&pmunicipio="+Ciudad+"&pcontrasenia="+Password+"&ptipoUsuario="+Tipo+"&pestado="+"A";
                                                        var cadena = JSON.stringify(datos);
                                                        console.log(cadena1);
                                                        $.ajax(
                                                            {
                                                                type: 'POST',
                                                                url: 'registro.php',
                                                                dataType: 'json',
                                                                data: cadena1,
                                                                succes:async function(resp)
                                                                {
                                                                    if(resp==1)
                                                                    {
                                                                        alert("Agregado con exito");
                                                                    }
                                                                }
                                                            }    
                                                        );
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function validarVacio(valor)
{
    valor = valor.replace("&nbsp;","");
    valor = valor == undefined ? "" : valor;
    if(!valor || 0 === valor.trim().length)
    {
        return true;
    }
    else
    {
        return false;
    }
}