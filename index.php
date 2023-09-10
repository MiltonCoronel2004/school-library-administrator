<?php 
include('php/nologin.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Biblioteca E.E.T.P 462</title>
</head>
<body>

    <div class="container-fluid" style="background-color: #782a8e;">
        <div class="cotainer">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <img src="img/logo.png" alt="" width="65" height="65" class="d-inline-block align-text-top"> 
                    <a class="navbar-brand mt-" href="index.php">E.E.T.P 462</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admLibros/libros.php">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admComp/notebooks.php">Nooteboks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admObjetos/objetos.php">Objetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admMoves/elegirmovimiento.php">Movimientos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestionar</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Usuarios Admitidos</a></li>
                          <li><a class="dropdown-item" href="#">Registrar Nuevo Usuario</a></li>
                          <li><a class="dropdown-item" href="#">Eliminar Usuario</a></li>
                          <li>
                            <div class="dropdown-divider" style="border: 1px solid white;"></div>
                          </li>
                          <li>
                            <a class="dropdown-item" href="php/logout.php">Cerrar Sesión</a>
                          </li>

                        </ul>
                      </li> 
                    
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container text-center mt-2">
        <h1 class="display-4">Sistema de Administración de Biblioteca</h1>
        <h2>Seleccione una opción:</h2>
    </div>





    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 text-center">
                <div class="card">
                    <img src="img/libro.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Libros</h5>
                        <p class="card-text p1">Base de datos de todos los libros de la biblioteca.</p>
                        <a href="admLibros/libros.php" class="btn btn-primary">Administrar</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 text-center">
                <div class="card">
                    <img src="img/laptop.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title p2">Notebooks</h5>
                        <p class="card-text">Base de datos de todas las notebooks de biblioteca.</p>
                        <a href="admComp/notebooks.php" class="btn btn-primary">Administrar</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 text-center">
                <div class="card">
                    <img src="img/otros.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Objetos</h5>
                        <p class="card-text p3">Base de datos con todos los objetos adicionales.</p>
                        <a href="admObjetos/objetos.php" class="btn btn-primary">Administrar</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 text-center">
                <div class="card">
                    
                    <img src="img/admin.png" class="card-img-top" alt="...">
                    <div class="card-body p4">
                        <h5 class="card-title">Movimientos</h5>
                        <p class="card-text">Creación y finalizacíon de movimientos.</p>
                        <a href="admMoves/elegirmovimiento.php" class="btn btn-primary">Administrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    



</body>
</html>




