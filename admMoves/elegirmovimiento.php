<?php include_once('../database.php'); 
include('../php/nologin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Biblioteca 462</title>
</head>
<body>

    <div class="container-fluid" style="background-color: #782a8e;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <img src="../img/logo.png" alt="" width="65" height="65" class="d-inline-block align-text-top"> 
                    <a class="navbar-brand mt-" href="../index.php">E.E.T.P 462</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../../admLibros/libros.php">Libros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../../admComp/notebooks.php">Notebooks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../admObjetos/objetos.php">Objetos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestionar</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Usuarios Admitidos</a></li>
                                    <li><a class="dropdown-item" href="#">Registrar Nuevo Usuario</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar Usuario</a></li>
                                    <li><div class="dropdown-divider" style="border: 1px solid white;"></div></li>
                                    <li><a class="dropdown-item" href="../php/logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </li> 
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container text-center mt-2">
        <h1 class="display-4">Sistema de Movimientos de Biblioteca</h1>
        <h2>Seleccione una opción:</h2>
    </div>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
            <div class="col mt-4 text-center">
                <div class="card">
                    <img src="../img/libro.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Libros</h5>
                        <p class="card-text">Base de datos de todos los libros de la biblioteca, divididos por categorías.</p>
                        <a href="libros/tabladelibros.php" class="btn btn-primary">Administrar Libros</a>
                    </div>
                </div>
            </div>
            <div class="col mt-4 text-center">
                <div class="card">
                    <img src="../img/laptop.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Notebooks</h5>
                        <p class="card-text">Base de datos de todas las notebooks, creación y visualización de movimientos.</p>
                        <a href="Computadoras/tablacomputadoras.php" class="btn btn-primary">Administrar Notebooks</a>
                    </div>
                </div>
            </div>
            <div class="col mt-4 text-center">
                <div class="card">
                    <img src="../img/otros.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Objetos</h5>
                        <p class="card-text">Base de datos con todos los objetos adicionales que tiene la biblioteca.</p>
                        <a href="objetos/tabladeobjetos.php" class="btn btn-primary">Administrar Objetos</a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>


<?php
// Incluir el archivo de conexión a la base de datos
include("../database.php");

// Calcular la fecha límite para mantener los registros (3 meses atrás)
$limitDate = date("Y-m-d H:i:s", strtotime("-3 months"));

// Tablas a limpiar
$tables = array("movimientoslibros", "movimientoscomputadoras", "movimientos_objetos");

// Variable para verificar si se eliminaron registros
$deleted = false;

// Eliminar registros antiguos en cada tabla
foreach ($tables as $table) {
    // Crear la consulta para eliminar los registros antiguos
    $query = "DELETE FROM $table WHERE fecha < '$limitDate'";

    // Ejecutar la consulta
    if (mysqli_query($connection, $query)) {
        $deleted = true;
    } else {
        echo "Error al eliminar registros antiguos de la tabla $table: " . mysqli_error($connection) . "<br>";
    }
}



?>