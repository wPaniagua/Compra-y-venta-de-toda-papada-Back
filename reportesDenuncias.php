<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.styles.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    &nbsp
    &nbsp

        <!-- Navegación parte superior -->
        <ul class="nav justify-content-end">
          <li class="nav-item">
             <a class="nav-link active" href="#">Publicaciones</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Usuarios</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Categorias</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Productos o Servicios</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Denuncias</a>
          </li>
          <li class="nav-item">
             <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Reportes</a>
          </li>
        </ul>
        &nbsp
        &nbsp
        &nbsp
        &nbsp
        &nbsp

    
    <!--</ul>
        <form class="form-inline my-2 my-lg-0" id="formBusqueda">
            <input class="form-control mr-sm-2" type="search" id="inputBusqueda"
                    placeholder="Escribe una opcion de busqueda" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    <ul class="">-->
    <h2>Lista de Denuncias</h2>
    <br>
    </br>
    <br>

    </br>

    <h3>Filtrar por</h3>
    <!-- Example split danger button -->
   
    <div class="btn-group">
      <button type="button" class="btn btn-danger">Depto</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Depto</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>

    <div class="btn-group">
      <button type="button" class="btn btn-danger">Municipio</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Municipio</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>

    <div class="btn-group">
      <button type="button" class="btn btn-danger">Categoria</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Categoria</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>

    <div class="btn-group">
      <button type="button" class="btn btn-danger">Cantidad Denuncias</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Cantidad Denuncias</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>



    <br>
    </br>
    <br>
    </br>

    <div class="btn-group-vertical">
      <button type="button" class="btn btn-secondary btn-lg btn-block">Reportes Denuncias </button>
      <button type="button" class="btn btn-secondary btn-lg btn-block">Reportes Usuarios</button>
      <button type="button" class="btn btn-secondary btn-lg btn-block">Estadísticas</button>
    </div>

    <br>
    </br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">idPublicación</th>
          <th scope="col">Fecha</th>
          <th scope="col">Producto/Servicio</th>
          <th scope="col">Denunciado</th>
          <th scope="col">Cantidad Denuncias</th>
          <th scope="col">Departamento</th>
          <th scope="col">Municipio</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>

           
        </tr>
        <tr>
           <th scope="row">2</th>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>

           
        </tr>
        
      </tbody>
    </table>
    <br>
    </br>
    <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">

   
        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Denuncias <span class="sr-only">(current)</span></a>
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
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"></a>
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
        </div>-->
    
  
    
</body>

<script src="js/inicio.js"></script>
<script type="text/javascript" src="js/fotoAdmin.js"></script>

</html>