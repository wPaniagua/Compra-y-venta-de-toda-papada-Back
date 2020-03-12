<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Principal</title>
</head>
<body>
    <div class="container">
        <!--Boton de registro-->
        <button type="button" id="btnRegistro" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Registro</button><br>
        <!--El Modal-->
        <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--Cabecera del Modal-->
                    <div class="modal-header">
                        <h4 class="modal-title">Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Cuerpo del Modal-->
                    <div class="modal-body">
                        <form action="registro.php" method="POST" role="form">
                            <input type="text" name="pnombre" id="pnombre" placeholder="Escriba su primer nombre" required>
                            <input type="text" name="snombre" id="snombre" placeholder="Escriba su segundo nombre" required><br><br>
                            <input type="text" name="papellido" id="papellido" placeholder="Escriba su primer apellido" required>
                            <input type="text" name="sapellido" id="sapellido" placeholder="Escriba su segumdo apellido" required><br><br>
                            <img class="svg" src="ico/email.svg" alt="insertar SVG con la etiqueta image">
                            <input type="text" name="correo" id="correo" placeholder="Ingrese el correo" required><br><br>
                            <img class="svg" src="ico/address-card-regular.svg" alt="insertar SVG con la etiqueta image">
                            <input type="number" name="ID" id="ID" placeholder="numero de identidad" required><br><br>
                            <img class="svg" src="ico/telefono.svg" alt="insertar SVG con la etiqueta image">
                            <input type="number" name="telefono" id="telefono" placeholder="Ingrese su telefono" required><br><br>
                            <img class="svg" src="ico/calendario.svg" alt="insertar SVG con la etiqueta image">
                            <input type="date" name="fechaNacmiento" id="fechaNacimineto"step="1" min="1940-01-01" max="2020-04-03" required><br><br>
                            <img class="svg" src="ico/pin1.svg" alt="insertar SVG con la etiqueta image">
                            <select name="depto" id="depto" required>
                            <option selected="selected" value="null">No hay nada que cargar</option>
                            </select><br>
                            <img class="svg" src="ico/pin.svg" alt="insertar SVG con la etiqueta image">
                            <select name="municipio" id="municipio" required>
                            <option selected="selected" value="null">Seleccione un departamento</option>
                            </select><br><br>
                            <img class="svg" src="ico/clave.svg" alt="insertar SVG con la etiqueta image">
                            <input type="password" name="contresenia" id="contrasenia" placeholder="escriba su contraseña" required
                            minlength="6"><br><br>
                            <img class="svg" src="ico/bloquear.svg" alt="insertar SVG con la etiqueta image">
                            <input type="password" name="confContrasenia" id="confContrasenia" placeholder="Vuelva a escribir la contraseña" required><br><br>
                            <div class="form-group">
                                <fieldset>
                                    <legend>Elija el tipo de usuario:</legend>
                                    <label for="radio">
                                        <input type="radio" name="tipo" id="tiposEmpresa" value="1">Empresa
                                    </label>
                                    <label for="radio">
                                        <input type="radio" name="tipo" id="tipoComun" value="2" checked="checked">Comprador/Vendedor
                                    </label>
                                </fieldset>
                            </div>
                            <input type="checkbox" name="contrato" id="contrtato" required>Acepta nuestro termino y condiciones
                            <div id="exito" style="display:none">
                                Sus datos han sido recibidos con éxito.
                            </div>
                            <div id="fracaso" style="display:none">
                                Se ha producido un error durante el envío de datos.
                            </div>
                        </form>
                    </div>
                    <!--Pie del Modal-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnGuardar" class="btn btn-primary submitBtn">Guardar</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <script src="js/funciones.js"></script>
</body>

</html>