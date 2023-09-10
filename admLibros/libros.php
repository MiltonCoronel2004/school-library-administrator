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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/delRow.js"></script>
    <script src="js/searchRow.js"></script>
    <title>Libros | E.E.T.P 462</title>
</head>
<body>












    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #782a8e;">
  <div class="container-fluid">
    <img src="../../img/logo.png" alt="" width="65" height="65" class="d-inline-block align-text-top"> 
    <a class="navbar-brand" href="../../index.php">E.E.T.P 462</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../admComp/notebooks.php">Notebooks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admObjetos/objetos.php">Objetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../admMoves/elegirmovimiento.php">Movimientos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestionar</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Usuarios Admitidos</a>
            <a class="dropdown-item" href="#">Registrar Nuevo Usuario</a>
            <a class="dropdown-item" href="#">Eliminar Usuario</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../php/logout.php">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container">
  <div class="row mt-4">
    <div class="col-12 col-sm-4">
    <form class="d-flex mt-3" role="search">
        <input id="searchInput" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

    
      <div class="mb-4 mt-5">
        <a type="button" class="btn btn-primary addBtn col-12" href="php/regBook.php">Agregar Libro</a>
      </div>
      
      <div class="mb-4">
        <a type="button" id="editBtn" class="btn btn-secondary col-12" href="#">Editar Libro</a>
      </div>

      <div class="mb-4">
        <a type="button" id="imgBtn" class="btn btn-success col-12" href="#">Más información</a>
      </div>
      
      <div class="mb-4">
        <a type="button" class="btn btn-warning col-12" href="../admMoves/libros/tabladelibros.php">Movimientos</a>
      </div>
      
      <div class="mb-4">
        <a type="button" id="delButton" class="btn btn-danger col-12" href="php/delBook.php">Eliminar Libro</a>
      </div>

    </div>
    
    <div class="col-12 col-sm-8 table-responsive table-wrapper">
      <table class="table text-center" id="table" style="border: 1px solid #303436;">
        <thead>
          <tr style="color: #fff; background-color: red;">
            <th scope="col">Nombre del Libro</th>
            <th scope="col">Categoria</th>
            <th scope="col">Existencias</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $consulta = "SELECT * FROM tabladelibros ORDER BY categoria ASC";
          $resultado = mysqli_query($connection, $consulta);

          if(mysqli_num_rows($resultado) > 0) {
              // Si hay datos, mostrarlos en una tabla HTML
              while($fila = mysqli_fetch_assoc($resultado)) {
                  echo "<tr class='fila-tabla' data-nombrelibro='" . $fila['nombrelibro'] . "' id='" . $fila['nombrelibro'] . "'>";
                  echo "<td>" . $fila['nombrelibro'] . " (" . $fila['id'] . ")</td>";
                  echo "<td>" . $fila['categoria'] . "</td>";
                  echo "<td>" . $fila['existencias'] . "</td>";
                  echo "</tr>";
              }
          } else {
              // Si no hay datos, mostrar un mensaje
              echo "<tr><td colspan='3' class='nodata text-center'>No se encontraron datos.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>







</body>
</html>








<script>
  // Manejador de eventos para el botón "Editar Libro"
  $("#editBtn").click(function() {
    // Obtiene la fila seleccionada actual
    var selectedRow = $(".fila-tabla.selected");
    if(selectedRow.length == 0) {
      // Si no hay fila seleccionada, muestra un mensaje de error
      alert("Por favor, seleccione una fila para editar.");
      return;
    }
    // Obtiene los valores de la fila seleccionada actual
    var nombreLibro = selectedRow.find("td:eq(0)").text();
    var categoria = selectedRow.find("td:eq(1)").text();
    var existencias = selectedRow.find("td:eq(2)").text();
    // Crea el formulario de edición y lo inserta después de la fila seleccionada
    var editForm = $("<tr class='edit-form'><td><input type='text' id='inputnombrelibro' name='nombrelibro' value='" + nombreLibro + "' class='edit-input'></td><td><input type='text' id='inputcategoria' name='categoria' value='" + categoria + "' class='edit-input text-center'><br><button class='save-btn mt-3 mb-3'>Guardar</button></td><td><input type='text' id='inputexistencias' name='existencias' value='" + existencias + "' class='edit-input'></td></tr>");

selectedRow.after(editForm);
// Oculta la fila seleccionada actual
selectedRow.hide();

  });

  // Manejador de eventos para el botón "Guardar" en el formulario de edición
  $(document).on("click", ".save-btn", function() {
    // Obtiene la fila de la tabla anterior al formulario de edición
    var selectedRow = $(".edit-form").prev();
    // Obtiene los valores editados del formulario de edición
    var nombreLibro = $(".edit-form input[name='nombrelibro']").val();
    var categoria = $(".edit-form input[name='categoria']").val();
    var existencias = $(".edit-form input[name='existencias']").val();
    // Actualiza la fila de la tabla con los nuevos valores editados
    selectedRow.find("td:eq(0)").text(nombreLibro);
    selectedRow.find("td:eq(1)").text(categoria);
    selectedRow.find("td:eq(2)").text(existencias);
    // Oculta el formulario de edición
    $(".edit-form").remove();
    // Muestra la fila actualizada
    selectedRow.show();
    // Actualiza los datos en la base de datos
    var id = selectedRow.attr("id");
    $.ajax({
      type: "POST",
      url: "php/updateBook.php",
      data: {id: id, nombrelibro: nombreLibro, categoria: categoria, existencias: existencias},
      success: function(data) {
        window.location.href = "libros.php";
    alert(data);
    }
  });
});
</script>





<script>
$(document).ready(function() {
  // Manejador de eventos para las filas de la tabla
  $(".fila-tabla").click(function() {
    // Remueve el borde de la fila anteriormente seleccionada
    $(".fila-tabla.selected").css("outline", "none");
    // Remueve la clase "selected" de todas las filas de la tabla
    $(".fila-tabla").removeClass("selected");
    // Agrega la clase "selected" a la fila que se hizo clic
    $(this).addClass("selected");
    // Agrega el borde a la fila seleccionada actual
    $(this).css("outline", "2px solid white");
  });
});




  
</script>











    

