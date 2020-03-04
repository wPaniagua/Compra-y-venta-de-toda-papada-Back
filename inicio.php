<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/inicio.styles.css">


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
                <li class="nav-item dropdown" id="categorias">
                    <a class="nav-link dropdown-toggle border border-primary rounded" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Busca por Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Carros</a>
                        <a class="dropdown-item" href="#">Hogar</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"></a> -->
                    </div>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" id="formBusqueda">
                <input class="form-control mr-sm-2" type="search" id="inputBusqueda"
                    placeholder="Buscar por palabra clave" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

            <ul class="navbar-nav mr-auto">


                <?php
                    session_start(); 
                    if (isset($_SESSION["id_usuario"])){
                        echo ('<li class="nav-item">
                        <a class="nav-link" href="perfil.php">Mi Cuenta</a></li>');
                    }
                    else{
                        echo ('<li class="nav-item"><button type="button" class="btn" id="iniciarSesionBoton" data-toggle="modal" data-target="#modalFormularioLogin"> Ingresa</button></li>');
                    }
                ?>
            </ul>
        </div>
    </nav>


    <div class="container">
        <!-- <div class="row">
            <div class="col col-lg-5 col-sm-10 center-block" style="margin-left: auto;
            margin-right: auto;">
                <form id="login-form">
                    <div style="text-align: center; margin-top: 1em; margin-bottom: 2em;">
                        <h4>Ingresa para poder comprar y vender.</h4>
                    </div>
                    <div class="form-group">
                        <!-- <label>Email</label> 
                        <input type="email" class="form-control" id="correo" name="correo"
                            placeholder="Ingrese su correo electrónico">
                        <small style="display: none;" id="aviso" class="form-text text-muted">Debes haberte registrado
                            para
                            poder
                            ingresar.</small>
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputPassword1">Contraseña</label> 
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

                    <br>
                    <div class="text-center">
                        <small>¿No tienes una cuenta? </small><a href="#" class="btn btn-outline-success">
                            Crea una cuenta
                        </a>
                    </div>

                </form>
            </div>
        </div> -->

        <div class="row">
            <div class="col col-lg-12">
                <span style="font-size: 2em;">Teléfonos</span>
                <span style="width: 3em;"></span>
                <span style="border-left:1px solid #000;height:2em; margin-left: 1em; margin-right: 1em;"></span>
                <span style="font-size: 1.5em;"> Ver todos</span>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                    style="border: black solid thin !important;">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="padding-left: 2.5em; padding-right: 0.5em;">
                            <!-- <img class="d-block w-100" src="..." alt="First slide">5 -->
                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important;">
                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important;">
                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>

                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important; ">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide " style="display:inline-block !important;">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide " style="display:inline-block !important;">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>

                        </div>
                        <div class="carousel-item " style="padding-left: 2.5em; padding-right: 0.5em;">
                            <!-- <img class="d-block w-100" src="..." alt="First slide">5 -->
                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important;">
                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important;">
                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>

                            <div class="d-inline w-9  elementoSlide" style="display:inline-block !important; ">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide " style="display:inline-block !important;">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>
                            <div class="d-inline w-9  elementoSlide " style="display:inline-block !important;">

                                <img src="img/phone.webp" style="width: 10em;" alt="Samsung Phone">
                                <p>Nombre</p>
                                <p>Precio</p>
                            </div>

                        </div>
                        <!-- <div class="carousel-item " style="padding-left: 5em; padding-right: 0em;">
                        -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"
                        style="color: black;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"
                        style="color: black;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormularioLogin">
        Launch demo modal
    </button> -->

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

                        <br>
                        <div class="text-center">
                            <small>¿No tienes una cuenta? </small><a href="#" class="btn btn-outline-success">
                                Crea una cuenta
                            </a>
                        </div>

                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
</body>

<script src="js/inicio.js"></script>

</html>