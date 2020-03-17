<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/FontAwesome.min.css">
    <script src="js/FontAwesome.min.js"></script>

    <link rel="stylesheet" href="css/inicio.styles.css">

</head>

<body>

	<?php
      include 'navbarAdmin.php';
    ?>
    <!-- style="background-color: #2b3f81 !important; color: white !important;" -->



    <br>
    <div style="padding-left:65em; padding-right:0px; margin-top:70px">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="inputBusqueda" name="inputBusqueda" placeholder="¿Que deseas buscar?"
                aria-label="Search">
            <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>-->
            <button type="button" id="inputBusquedaBtn" name="inputBusquedaBtn" style="border-color:white; background-color:white;"><img src="ico/search.svg"
                    style="width:25px "></button>
        </form>
    </div>

    <br>
    <br>
    <div class="row " style="margin-left:67%;">
        <div style="padding-top:2.5%;">Filtrar por: </div>
        <div style="margin-left:5%;">
            <label for="slc-categorias">Categoria: </label><br>
            <select name="slc-categorias" id="slc-categorias">
                <option value="null">Seleccionar</option>
            </select>
        </div>

    <div class="container" style="margin-right: 2em;">

        <div class="row">
            <div class="col col-lg-6" style="margin-top: auto !important; margin-bottom: 0em; !important">
                <form id="form-tiempo-vencimiento">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="caducidadUsuarioNormal">Tiempo de caducidad Usuario Normal:</label>
                            <input type="text" class="form-control" id="caducidadUsuarioNormal"
                                placeholder="Ingresa una cantidad en días" style="width:50%;">
                            <button type="button" class="btn btn-primary" style="margin-top: .5em;">Actualizar</button>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="caducidadUsuarioAdministrador">Tiempo de caducidad Usuario
                                Administrador:</label>
                            <input type="password" class="form-control" id="caducidadUsuarioAdministrador"
                                placeholder="Ingresa una cantidad en días" style="width:50%;">

                            <button type="button" class="btn btn-primary" style="margin-top: .5em;">Actualizar</button>

                        </div>

                    </div>
                </form>
            </div>

            <div class="col col-lg-6"
                style="margin-top: auto; margin-bottom: 0em; margin-left: auto; margin-right: 0em;">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        <div>Filtrar por: </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col col-lg-4">
                                        <div>
                                            <label for=" slc-categorias">Categoria: </label><br>
                                            <select name="slc-categorias" id="slc-categorias"
                                                onChange="busquedaSegunSelect()">
                                                <option value="null">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col col-lg-4">
                                        <div>
                                            <label for="slc-usuarios">Usuario: </label><br>
                                            <select name="slc-usuarios" id="slc-usuarios"
                                                onChange="busquedaSegunSelect()">
                                                <option value="null">Seleccionar</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col col-lg-4">
                                        <div>
                                            <label>Estado: </label><br>
                                            <select name="slc-estados" id="slc-estados"
                                                onChange="busquedaSegunSelect()">
                                                <option selected value="null">Seleccionar</option>
                                                <option value="A">Activo</option>
                                                <option value="I">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row" style="padding-top:2em;">
                        <div class="col col-lg-12">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" id="inputBusqueda" placeholder="Buscar">
                                <button type="button" class="btn btn-outline-success" id="botonBuscar">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

        <div style="margin-left:5%;">
            <label>Estado: </label><br>
            <select name="slc-estados" id="slc-estados" >
                <option value="-">Seleccionar</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>

    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div>
                    <center>
                        <h2>Lista de publicaciones</h2>
                    </center>
                    <br>

                    <table border="1" cellspacing="0" cellpadding="10" class="table-striped table-hover"
                        id="tablaPublicaciones" style="width: 85%; margin-left:auto; margin-right:auto">
                        <thead>
                            <tr>
                                <td><strong> Nombre </strong></td>
                                <td><strong>Tipo (Produto o Servicio) </strong></td>
                                <td><strong>Categoria </strong></td>
                                <td><strong>Descripcion </strong></td>
                                <td><strong>Nombre Usuario </strong></td>
                                <td><strong>Precio </strong></td>
                                <td><strong>Moneda </strong></td>
                                <td><strong>Dia Publicación </strong></td>
                                <td><strong>Dia Vencimiento </strong></td>
                                <td><strong>Estado </strong></td>
                                <td><strong>Dar de Baja </strong></td>
                                <!--<td><strong>Modificar </strong></td>  -->
                            </tr>
                        </thead>
                        <tr>
                            <td>Cama </td>
                            <td>Producto </td>
                            <td>camas</td>
                            <td>Queen Size</td>
                            <td>Pedro Perez</td>
                            <td>5,500.00</td>
                            <td>12/02/2020</td>
                            <td>25/02/2020 </td>
                            <td>disponible</td>
                            <td>
                                <center><a href="#"><img src="ico/x-circle-fill.svg" style="width:25px "></a></center>
                            </td>
                            <!--<td><center><a href="index.html"><img src="ico/pencil.svg" style="width:25px "></a></center></td>   -->
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <br>
    <br>
    <center>
        <h2>Lista de publicaciones</h2>
    </center>
    <br>

    <table border="1" cellspacing="0" cellpadding="10" class="table-striped table-hover" id="tablaPublicaciones"
        style="width: 85%; margin-left:auto; margin-right:auto">
        <thead>
            <tr>
                <td><strong> Nombre </strong></td>
                <td><strong>Tipo (Produto o Servicio) </strong></td>
                <td><strong>Categoria </strong></td>
                <td><strong>Descripcion </strong></td>
                <td><strong>Nombre Usuario </strong></td>
                <td><strong>Precio </strong></td>
                <td><strong>Moneda </strong></td>
                <td><strong>Dia Publicación </strong></td>
                <td><strong>Dia Vencimiento </strong></td>
                <td><strong>Estado </strong></td>
                <td><strong>Dar de Baja </strong></td>
                <!--<td><strong>Modificar </strong></td>  -->
            </tr>
        </thead>
        <tr>
           
        </tr>
    </table>


    <script src="js/publicaciones-admin.js"></script>
</body>

</html>
