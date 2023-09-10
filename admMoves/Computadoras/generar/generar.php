<?php 

session_start();

if(!isset($_SESSION["username"])) {
  header("location: ../../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../../../img/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid" style="background-color: #111111;">
    <div class="cotainer">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <img src="../../../img/logo.png" alt="" width="65" height="65" class="d-inline-block align-text-top"> 
                <a class="navbar-brand" href="../../../index.html">E.E.T.P 462</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../../admLibros/libros.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../../admComp/notebooks.php">Nooteboks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Objetos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../elegirmovimiento.php">Movimientos</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestionar</a>
                  <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-white" href="#">Usuarios Admitidos</a></li>
                    <li><a class="dropdown-item text-white" href="#">Registrar Nuevo Usuario</a></li>
                    <li><a class="dropdown-item text-white" href="#">Eliminar Usuario</a></li>
                    <li>
                      <div class="dropdown-divider" style="border: 1px solid white;"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../../../php/logout.php">Cerrar Sesión</a>
                    </li>
                  </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
</div>
<div class="container d-flex align-items-start justify-content-center vh-100 mt-lg-5 mobile-margin mb-3">
<div class="centered-container">
<div class="card bg-dark text-light p-4">
  <h2 class="text-center mb-4">Movimiento de Computadoras</h2>
  <form action="php/regMov.php" method="post" class="text-light bg-dark border border-white p-4">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="datetime-local" id="fecha" name="fecha" class="form-control mb-4" required max="9999-12-31T00:00">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" class="mb-4 form-control" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
            <label for="profesor">Profesor:</label>
            <input type="text" id="profesor" name="profesor" class="mb-4 form-control" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="responsable">Responsable:</label>
          <input type="text" id="responsable" name="responsable" class="mb-4 form-control" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones" class="mb-4 form-control" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
            <label for="numero">Números:</label>
            <input type="text" id="numero" name="numero" class="mb-4 form-control" required oninput="sanitizeInput(this)" onkeydown="preventSpaces(event)">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 d-grid">
          <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
    </div>
  </div>
  



  </form>
</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<style>
@media (max-width: 767px) {
  .mobile-margin {
    margin-top: 3rem !important;
    margin-bottom: 30px;
  }
}

@media (min-width: 768px) {
  .centered-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
}
</style>


<script>
  // Obtener el elemento del campo de fecha
  var fechaInput = document.getElementById('fecha');

  // Obtener la fecha y hora actual en formato local
  var fechaActual = new Date();

  // Ajustar la fecha y hora actual a GMT-3
  fechaActual.setHours(fechaActual.getHours() - 3);

  // Obtener la fecha y hora actual formateada en el formato requerido por el campo de fecha
  var fechaActualFormateada = fechaActual.toISOString().slice(0, 16);

  // Establecer el valor del campo de fecha a la fecha y hora actual en GMT-3
  fechaInput.value = fechaActualFormateada;

  function sanitizeInput(input) {
  // Obtener el valor actual del campo de texto
  var value = input.value;

  // Eliminar caracteres que no sean números ni comas
  var sanitizedValue = value.replace(/[^0-9,]/g, '');

  // Actualizar el valor del campo de texto sin caracteres no permitidos
  input.value = sanitizedValue;
}

function preventSpaces(event) {
  // Obtener el código de tecla presionada
  var keyCode = event.keyCode || event.which;

  // Verificar si la tecla presionada es un espacio
  if (keyCode === 32) {
    // Prevenir la acción por defecto (insertar espacio)
    event.preventDefault();
  }
}
</script>
