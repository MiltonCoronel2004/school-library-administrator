<?php
include_once('../database.php');
include('../php/nologin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/delRow.js"></script>
    <script src="js/searchRow.js"></script>
    <title>Notebooks | E.E.T.P 462</title>
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
          <a class="nav-link" href="../../admLibros/libros.php">Libros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admObjetos/objetos.php"">Objetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admMoves/elegirmovimiento.php">Movimientos</a>
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
    </form>

    
      <div class="mb-4 mt-5">
        <a type="button" class="btn btn-primary addBtn col-12" href="php/regNote.php">Agregar Computadora</a>
      </div>
      
      <div class="mb-4">
        <a type="button" id="editBtn" class="btn btn-secondary col-12" href="#">Editar Computadora</a>
      </div>

      <div class="mb-4">
        <a type="button" id="imgBtn" class="btn btn-success col-12" href="#">Más información</a>
      </div>
      
      <div class="mb-4">
        <a type="button" class="btn btn-warning col-12" href="../admMoves/Computadoras/tablacomputadoras.php">Movimientos</a>
      </div>
      
      <div class="mb-4">
        <a type="button" id="delButton" class="btn btn-danger col-12" href="delNote.php">Eliminar Computadora</a>
      </div>

    </div>
    
    <div class="col-12 col-sm-8 table-responsive table-wrapper">
      <table class="table text-center" id="table" style="border: 1px solid #303436;">
        <thead> 
          <tr style="color: #fff; background-color: #7144b5;">
            <th scope="col">Computadora</th>
            <th scope="col">Estado</th>
            <th scope="col">Observaciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
$consulta = "SELECT * FROM tabladecomputadoras ORDER BY numero ASC";
$resultado = mysqli_query($connection, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    // Si hay datos, mostrarlos en una tabla HTML
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $valorOculto = $fila["oculto"];
        $valorNumero = $fila["numero"];

        // Verificar el valor de la columna "oculto"
        if ($valorOculto == !1) {
        // Aquí puedes mostrar el contenido de otras columnas en las celdas de la fila
        echo "<tr class='fila-tabla' data-numero='" . $fila['numero'] . "' id='" . $fila['numero'] . "'>";
        echo "<td>" . $fila['numero'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "<td>" . $fila['observaciones'] . "</td>";
        echo "</tr>";
            
        } else {
          echo '<tr id="' . $valorNumero . '" style="display: none;">';
        }


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<style>
  @media screen and (max-width: 768px) {
    table {
      max-width: 425px;
      font-size: 11.5px;
    }
  }

  th {
    position: sticky;
  }

  .table-wrapper {
    max-height: 600px;
    overflow-y: scroll;
  }
</style>


<script>
$(document).ready(function() {
  $("#editBtn").click(function() {
    var selectedRow = $(".fila-tabla.selected");
    if(selectedRow.length == 0) {
      // Si no hay fila seleccionada, muestra un mensaje de error
      alert("Por favor, seleccione una fila para editar.");
      return;
    }
    // Verifica si alguna fila está seleccionada
    if ($(".fila-tabla.selected").length > 0) {
      // Obtiene el ID de la fila seleccionada
      var idFila = $(".fila-tabla.selected").attr("id");
      // Obtiene los valores de las celdas de la fila seleccionada
      var numero = $("#" + idFila + " td:nth-child(1)").text();
      var estado = $("#" + idFila + " td:nth-child(2)").text();
      var observaciones = $("#" + idFila + " td:nth-child(3)").text();

      // Crea un formulario para editar los valores
      var formEditar = $("<tr class='formEditar'><td><input type='number' id='inputNumero' name='id' value='" + numero + "' style='border: 1px solid #ccc; padding: 5px; font-size: 16px;' required></td><td><input type='text' id='inputEstado' name='estado' value='" + estado + "' style='border: 1px solid #ccc; padding: 5px; font-size: 16px;' required> <br> <input type='button' id='guardarBtn' class='btn btn-primary mt-3 mb-3' value='Guardar'> </td><td><input type='text' id='inputObservaciones' name='obervaciones' value='" + observaciones + "' style='border: 1px solid #ccc; padding: 5px; font-size: 16px;' required></td></tr>");

      // Reemplaza los valores de la fila con el formulario de edición
      
    selectedRow.after(formEditar);
    // Oculta la fila seleccionada actual
    selectedRow.hide();


      // Manejador de eventos para el botón "Guardar"
      $("#guardarBtn").click(function() {
        // Obtiene los valores del formulario
        var nuevoNumero = $("#inputNumero").val();
        var nuevoEstado = $("#inputEstado").val();
        var nuevoObservaciones = $("#inputObservaciones").val();

        // Realiza una petición AJAX para verificar la existencia del número de computadora
        $.ajax({
          url: "php/checkExistence.php",
          type: "POST",
          data: { id: idFila, numero: nuevoNumero },
          success: function(response) {
            if (response === "exists") {
              alert("El número de computadora ya existe.");
            } else {
              // Realiza una petición AJAX para actualizar los valores en la base de datos
              $.ajax({
                url: "php/updateNote.php",
                type: "POST",
                data: { id: idFila, numero: nuevoNumero, estado: nuevoEstado, observaciones: nuevoObservaciones },
                success: function(response) {
                  location.reload();
                  // Actualiza los valores en la fila de la tabla
                  $("#" + idFila + " td:nth-child(1)").text(nuevoNumero);
                  $("#" + idFila + " td:nth-child(2)").text(nuevoEstado);
                  $("#" + idFila + " td:nth-child(3)").text(nuevoObservaciones);
                  // Reemplaza el formulario de edición con los valores actualizados
                  $("#" + idFila).html("<td>" + nuevoNumero + "</td><td>" + nuevoEstado + "</td><td>" + nuevoObservaciones + "</td>");
                },
                error: function(xhr, status, error) {
                  console.log("Error al actualizar fila: " + error);
                }
              });
            }
          },
          error: function(xhr, status, error) {
            console.log("Error al verificar existencia: " + error);
          }
        });
      });
    }
  });
});

</script>


<style>
  #inputNumero,
  #inputEstado,
  #inputObservaciones {
    max-width: 50%;

  }
</style>


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
    $(this).css("outline", "2px solid black");
  });
});
</script>













    

