$('#btnRegistro').click(obtenerJSON);
$('#btnGuardar').click(enviarDatos);

async function obtenerJSON()
{
    $.ajax({
        url:"backend/Select_Deptos_Municipios.php",
        data: 'data=' + 'departamentos',
        method: "POST",
        dataType:"json",
        success: async function (respuesta)
        {
            //console.log(respuesta);
            document.getElementById("depto").innerHTML += `<option selected="selected" value="null">
            Selecciona un departamento</option>`;
            //var dato = JSON.parse(respuesta);
            for(var i=0; i<respuesta.length; i++)
            {
                document.getElementById("depto").innerHTML+=` <option value="${respuesta[i].idDepartamento}">${respuesta[i].nombre}</option>`;
                //console.log(respuesta[i].idDeptos);
            }
        } 
    });
    $("#depto").on('change', function (e)
    {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        console.log(valueSelected);
        $.ajax({
            url:"backend/Select_Deptos_Municipios.php",
            data: 'data=' + 'municipios&idDepartamento=' + valueSelected.trim(),
            method: "POST",
            dataType:"json",
            success: async function (respuesta)
            {
                console.log(respuesta);
                document.getElementById("municipio").innerHTML += `<option selected="selected" value="null">
                Selecciona un municipio</option>`;
                //var dato = JSON.parse(respuesta);
                for(var i=0; i<respuesta.length; i++)
                {
                    document.getElementById("municipio").innerHTML+=` <option value="${respuesta[i].idMunicipio}">${respuesta[i].nombre}</option>`;
                    //console.log(respuesta[i].idDeptos);
                }
            } 
        });
    }
    );
    
}

async function enviarDatos()
{
    var Nombre = $('#pnombre').val();
    var sNombre = $('#snombre').val();
    var Apellido = $('#papellido').val();
    var sApellido = $('#sapellido').val();
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
                                                        var cadena1 = `ppNombre=${Nombre}&psNombre=${sNombre}&ppApellido=${Apellido}&psApellido=${sApellido}&pcorreo=${Correo}&pfechaNac=${Fecha}&pmunicipio=${Ciudad}&pcontrasenia=${Password}&ptipoUsuario=${Tipo}`;
                                                        
                                                        console.log(cadena1);
                                                        $.ajax(
                                                            {
                                                                type: 'POST',
                                                                url: 'backend/registro_usuario.php',
                                                                dataType: 'json',
                                                                data: cadena1,
                                                                success:function(resp)
                                                                {
                                                                    console.log(resp);
                                                                    if(resp.codigo==1)
                                                                    {
                                                                        alert("Agregado con exito");
                                                                        var url = "http://localhost:80/proyecto/registro.php";
                                                                        window.location = url;
                                                                    }
                                                                    else
                                                                    {
                                                                        alert("No se agrego");
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