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
                            <select id="departamentos" class="form-control">
                                <option selected="selected" value="null">No hay nada que cargar</option>
                            </select><br>
                            <img class="svg" src="ico/pin.svg" alt="insertar SVG con la etiqueta image">
                            <select id="municipios" class="form-control">
                                <option selected="selected" value="null">Seleccione un departamento arriba</option>
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
                            <input type="checkbox" name="contrato" id="contrtato" required>Acepta nuestros <a href="" data-toggle="modal" data-target="#exampleModalLong">terminos y condiciones</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Contrato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div align="right"><a href="docs/Contrato.pdf" download> Descargar </a></div>
          <!--<h2>CONTRATO</h2>-->
          <center><h3>Condiciones para la publicación de un artículo o servicio</h3></center>
          <br>
          <p>
            Cuando pones en venta un artículo o decides ofrecer un servicio, debes estar de acuerdo con las siguientes condiciones que se te presentan a continuación:
          </p>
  
          <ul>
            <li>Es necesario que seas mayor de edad para poder registrarte y publicar anuncios en esta plataforma.</li>
            <li>El contenido que publiques a través de los anuncios debe contener información verídica de los mismos, ya sea un servicio o producto que se ofrezca, de lo contrario puede ser modificado, o eliminado a nuestra discreción.</li>
            <li>Si publicas un anuncio que contenga imágenes pornográficas, o contenido relacionado con el mismo, esto para ofrecer un servicio relacionado con ello, dicho anuncio será eliminado.</li>
            <li>No está permitido que dupliques un anuncio (esto no significa que no puedes publicar anuncios que tengan cosas similares).</li>
            <li>El administrador podrá editar y eliminar cualquier anuncio considerando que no cumple con las reglas establecidas en este contrato.</li>
            <li>La empresa no tiene ninguna responsabilidad con respecto al envió de productos comprados o vendidos en su plataforma.</li>
            <li>Los anuncios se publicarán inicialmente por orden de fecha y hora, por lo cual tu anuncio no siempre estará entre los primeros inicialmente.</li>
            <li>Para generar una experiencia positiva para el usuario, es posible que un anuncio no aparezca en algunos resultados de búsqueda independientemente del orden de clasificación elegido por el comprador.</li>
            <li>Los anuncios tendrán un límite de 14 días para estar publicados en la plataforma, al finalizar el tiempo, éstos serán eliminados automáticamente.(No aplica para los usuario con tipo de cuenta: Empresa)</li>
            <li>No nos hacemos responsables si el comprador recibe un artículo que no sea de su voluntad, es decir que no sea el que vio inicialmente en la o las imágenes del anuncio que le interesó.</li>
            <li>No es responsabilidad nuestra si en un anuncio se postean imágenes de un artículo nuevo y al final se entrega un artículo usado.</li>
          </ul>
          <br>
          <hr>
          <p>Crear una plataforma de comercio electrónico donde los compradores  encuentren lo que buscan, es uno de los objetivos primordiales de la empresa por lo cual te especificamos lo que debes tener en cuenta:</p>
          <h4>Cuando compras un artículo:</h4>
          Debes estar de acuerdo con lo siguiente:
          <ul>
            <li>Eres responsable de leer todo el anuncio del artículo antes de hacer una oferta de compra o confirmar una compra.</li>
            <li>Al elegir un anuncio que sea de tu conveniencia debes contactarte con el vendedor de dicho anuncio, solo si realmente estas interesado en dicha compra.</li>
            <li>La empresa no se hace responsable de cualquier daño que pueda tener el artículo que desees comprar, ya que solo ofrecemos la oportunidad de que puedas encontrar lo que buscas con mayor facilidad.</li>
          </ul>
          <br>
          <hr>
  
          <p>Así mismo es de nuestro interés que los vendedores logren sus objetivos de venta de una forma eficiente, por lo cual:</p>
          <h4>Cuando vendes un artículo:</h4>
          Te debes comprometer a cumplir lo siguiente:
          <ul>
            <li>Ofrecer un artículo en buen estado, esto quiere decir, que si ofreces un artículo usado, tú debes garantizar que dicho artículo se puede utilizar en lo que se amerita.</li>
            <li>Eres responsable de dar una descripción bien detallada del contenido de lo que es el artículo ofrecido para la venta.</li>
            <li>Debes indicar obligatoriamente el precio del producto que deseas vender, el cual debe ser: en lempiras o dólares solamente.</li>
            <li>Es necesario que al publicar tu artículo para la venta pongas al menos una  imagen del mismo, ya que de esta manera haces tú anuncio más amigable a las personas que visitan la página.</li>
          </ul>
          <br>
          <hr>
  
          <p>De igual forma, cuando tu objetivo radica en publicar un anuncio para dar un servicio, nos interesa que tomes en cuenta lo siguiente:</p>
          <h4>Cuando ofreces un servicio:</h4>
          <ul>
            <li>El servicio que se brindará debe ser legal.</li>
            <li>Es importante colocar el costo del servicio que quieres brindar, ya que éste es muy importante para que los usuarios que vean el anuncio estén consientes al momento de contactarse contigo.</li>
            <li>Siempre debes colocar al menos una imagen para ilustrar el tipo de servicio que ofreces.</li>
          </ul>
          <br>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
    <script src="js/funciones.js"></script>
</body>

</html>