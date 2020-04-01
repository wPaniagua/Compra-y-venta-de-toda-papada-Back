<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/fontsawesome.min.css">
    <script src="js/fontsawesome.min.js"></script>

    <link rel="stylesheet" href="css/inicio.styles.css">


    <link rel="stylesheet" href="css/inicio.css">


</head>

<body>

    <!-- style="background-color: #2b3f81 !important; color: white !important;" -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Favoritos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item " id="categorias">

                    <select class="custom-select" id="categoriasElementos">
                        <option value="null" selected>Todas</option>
                    </select>


                    </select>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" id="formBusqueda">
                <input class="form-control mr-sm-2" type="search" id="inputBusqueda"
                    placeholder="Buscar por palabra clave" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-busqueda">Buscar</button>
            </form>

            <ul class="navbar-nav mr-auto">

                <?php
                    session_start(); 
                    if (isset($_SESSION["id_usuario"])){
                        echo ('<li class="nav-item">
                        <a class="nav-link" href="administracion/index.php">Admin</a></li><li class="nav-item">
                        <a class="nav-link" href="usuarioCV/perfil.php">Usuario Normal</a></li>');
                    }
                    else{
                        echo ('<li class="nav-item"><button type="button" class="btn" id="iniciarSesionBoton" data-toggle="modal" data-target="#modalFormularioLogin"> Ingresa</button></li>');
                    }
                ?>
            </ul>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="modalFormularioLogin" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <form id="login-form">
                        <div style="text-align: center; margin-top: 1em; margin-bottom: 2em;">
                            <h4>Ingresa para poder comprar y vender.</h4>
                        </div>
                        <div class="form-group">
                            <!-- <label>Email</label> -->
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="Ingrese su correo electrónico">
                            <small style="display: none;" id="aviso" class="form-text text-muted">Debes haberte
                                registrado
                                para
                                poder
                                ingresar.</small>
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Contraseña</label> -->
                            <input type="password" class="form-control" id="contrasena" name="contrasena"
                                placeholder="Contraseña">
                            <small style="display: none;" id="avisoContrasena" class="form-text text-muted">Contraseña
                                Incorrecta</small>

                            <small><a href="#">
                                    ¿Olvidaste tu contraseña?
                                </a></small>

                        </div>

                        <div style="margin-left: auto;margin-right: auto;" class="text-center">
                            <button type="button" class="btn btn-primary" id="login-button"
                                style=" width: 15em !important;">Ingresar</button>

                        </div> <br>

                        <div class="alert alert-danger" id="mensajeDadodeBaja" style="display:none;text-align:center;">
                            Estás dado de baja actualmente </div>

                        <br>
                        <div class="text-center">
                            <small>¿No tienes una cuenta? </small>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegistro" id="crearCuenta">
                                Crea una cuenta
                            </button>
                        </div>
                        <?php 
                            include "reg.php";
                         ?>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>


    <br>




    <!-- //slide 0 -->
    <div class="container my-4">

        <h3 id="tituloCategoria0"></h3>
        <div style="display:inline" id="linkCategoria0">
            <!-- <a href="Google.com">Ver todos</a>
            <i style="margin-left:1em;" class="fas fa-arrow-right"></i> -->
            </div>

        <!--Carousel Wrapper-->
        <div id="slide0" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top" style="text-align:center;">
                <a class="btn-floating" href="#slide0" data-slide="prev">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <a class="btn-floating" href="#slide0" data-slide="next"><i class="fas fa-arrow-right"></i></a>
            </div>
            <!--/.Controls-->

            <br>
            <br>

            <!--Indicators-->
            <ol class="carousel-indicators" id="categoriaControl0">
                <!-- <li data-target="#multi-item-example" data-slide-to="0" style="background-color:black;" class="active">
        </li>
        <li data-target="#multi-item-example" data-slide-to="1" style="background-color:black;"></li>
        <li data-target="#multi-item-example" data-slide-to="2" style="background-color:black;"></li> -->
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox" style="margin-bottom:1em;" id="categoriaSlide0">

                <!--First slide-->
                <div class="carousel-item active">


                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>


    <br>
    <!-- mas visitados -->
    <div class="container my-4">

        <h3>Busquedas frecuentemente realizadas</h3>

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <br>
            <br>
            <!--Slides-->
            <div class="carousel-inner" role="listbox" style="margin-bottom:1em;" id="top-categorias-slides">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-2 columna" style="text-align: center;">
                            <a href="busqueda?categoria=null&busqueda=carros">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Carros</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-2 clearfix d-none d-md-block columna">
                            <a href="busqueda?categoria=null&busqueda=electrodomesticos">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Electrodomesticos</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-2 clearfix d-none d-md-block columna">
                            <a href="busqueda?categoria=null&busqueda=electronicos">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-plug"></i> </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Electronicos</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 clearfix d-none d-md-block columna">
                            <a href="busqueda?categoria=null&busqueda=&hasta=100">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-search-dollar"></i>
                                    </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Por menos de L. 100</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 clearfix d-none d-md-block columna">
                            <a href="busqueda?categoria=null&busqueda=herramientas">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Herramientas</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 clearfix d-none d-md-block columna">
                            <a href="busqueda?categoria=null&busqueda=juequetes">
                                <div class="elemento-top">
                                    <div class="icono">
                                        <i class="fas fa-gamepad"></i>
                                    </div>
                                    <div class="texto-elemento-top">
                                        <strong>
                                            Juguetes</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>


            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>

    <!-- //slide 1 -->
    <div class="container my-4">

        <h3 id="tituloCategoria1"></h3>
        
        <div style="display:inline" id="linkCategoria1">
            <!-- <a href="Google.com">Ver todos</a>
            <i style="margin-left:1em;" class="fas fa-arrow-right"></i> -->
            </div>


        <!--Carousel Wrapper-->
        <div id="slide1" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top" style="text-align:center;">
                <a class="btn-floating" href="#slide1" data-slide="prev">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <a class="btn-floating" href="#slide1" data-slide="next"><i class="fas fa-arrow-right"></i></a>
            </div>
            <!--/.Controls-->

            <br>
            <br>

            <!--Indicators-->
            <ol class="carousel-indicators" id="categoriaControl1">
                <!-- <li data-target="#multi-item-example" data-slide-to="0" style="background-color:black;" class="active">
        </li>
        <li data-target="#multi-item-example" data-slide-to="1" style="background-color:black;"></li>
        <li data-target="#multi-item-example" data-slide-to="2" style="background-color:black;"></li> -->
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox" style="margin-bottom:1em;" id="categoriaSlide1">

                <!--First slide-->
                <div class="carousel-item active">


                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>
</body>

<script src="js/inicio.js"></script>

</html>