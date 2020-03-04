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

function validarCampos()
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
                                                    if (!$('#contrtato').prop('checked'))
                                                    {
                                                        alert("Debe aceptar el contrato");
                                                    }
                                                    else 
                                                    {
                                                        $.ajax(
                                                            {
                                                                type: 'POST',
                                                                url: 'index.php',
                                                                data: 'contactFrmSubmit=&nombre='+Nombre+'&apellido='+Apellido+'&email='+Correo+'&message='+message,
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