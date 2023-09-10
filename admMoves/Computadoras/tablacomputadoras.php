<?php include_once("../../database.php");


session_start();

if(!isset($_SESSION["username"])) {
  header("location: ../../login.php");
}


?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Movimientos | E.E.T.P 462</title>
  </head>
  <body>

  <div class="container-fluid" style="background-color: #111111;">
        <div class="cotainer">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <img src="../../img/logo.png" alt="" width="65" height="65" class="d-inline-block align-text-top"> 
                    <a class="navbar-brand" href="../../index.php">E.E.T.P 462</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admLibros/libros.php">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admComp/notebooks.php">Nooteboks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admObjetos/objetos.php">Objetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../admMoves/elegirmovimiento.php">Movimientos</a>
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
                          <a class="dropdown-item" href="../../php/logout.php">Cerrar Sesión</a>
                        </li>
                      </ul>
                    </li>

                    
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </div>

  <div class="content">

    <div class="container">
    <div class="d-flex justify-content-center align-items-center mt-n5">
  <a class="btn btn-warning w-60 mb-3 mb-sm-0" href="generar/generar.php">Nuevo Movimiento</a>
</div>













      <div class="table-responsive custom-table-responsive mt-4 table-wrapper">

        <table class="table custom-table text-center">
          <thead>
            <tr>
          <!--<th scope="col">
                <label class="control control--checkbox">
                  <input type="checkbox"  class="js-check-all"/>
                  <div class="control__indicator"></div>
                </label>
              </th>-->
              <th scope="col">Fecha</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Número</th>
              <th scope="col">Curso</th>
              <th scope="col">Responasble</th>
              <th scope="col">Profesor</th>
              <th scope="col">Observaciones</th>
              <th scope="col">Devuelto</th>
            </tr>
          </thead>
          <tbody>

          <?php
         $consulta = "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y %H:%i') AS fecha_formateada FROM movimientoscomputadoras ORDER BY fecha_formateada DESC";
  
         


         $resultado = mysqli_query($connection, $consulta);


          if(mysqli_num_rows($resultado) > 0) {
              // Si hay datos, mostrarlos en una tabla HTML
              while($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr class='fila-tabla' data-id='" . $fila['id'] . "' id='" . $fila['id'] . "'>";
                echo "</th>";
                echo "<td style='max-width: 150px; word-break: break-word;'>" . $fila['fecha_formateada'] . "</td>";
                echo "<td>" . $fila['cantidad'] . "</td>";
                echo "<td style='max-width: 150px; word-break: break-word;'>" . $fila['numero'] . "</td>";
                echo "<td>" . $fila['curso'] . "</td>";
                echo "<td>" . $fila['responsable'] . "</td>";
                echo "<td>" . $fila['profesor'] . "</td>";
                echo "<td style='max-width: 150px; word-break: break-word;'>" . $fila['observaciones'] . "</td>";
                echo "<td>" . $fila['devuelto'] . "</td>";
                echo "</tr>";

                
              }
          } else {
              // Si no hay datos, mostrar un mensaje
              echo "<tr><td colspan='8' class='nodata text-center'>No se encontraron datos.</td></tr>";
          }
          ?>
            
          </tbody>
        </table>
      </div>


    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>




<style>
    th {
    position: sticky;
  }

  .table-wrapper {
    max-height: 600px;
    overflow-y: scroll;
  }


 /* Para navegadores basados en WebKit (Google Chrome, Safari, etc.) */
.table-wrapper::-webkit-scrollbar {
  width: 10px; /* Ancho de la scrollbar */
  border-radius: 5px; /* Puntas redondeadas */
  background-color: #1a1a1a; /* Color de fondo de la scrollbar */
}

.table-wrapper::-webkit-scrollbar-thumb {
  background-color: #555; /* Color del thumb (barra de desplazamiento) */
  border-radius: 5px; /* Puntas redondeadas */
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
  background-color: #888; /* Color del thumb (barra de desplazamiento) al pasar el cursor */
}

/* Para navegadores basados en Mozilla (Firefox, etc.) */
.table-wrapper {
  scrollbar-width: thin; /* Ancho de la scrollbar */
}

.table-wrapper::-moz-scrollbar {
  width: 10px; /* Ancho de la scrollbar */
  border-radius: 5px; /* Puntas redondeadas */
  background-color: #1a1a1a; /* Color de fondo de la scrollbar */
}

.table-wrapper::-moz-scrollbar-thumb {
  background-color: #555; /* Color del thumb (barra de desplazamiento) */
  border-radius: 5px; /* Puntas redondeadas */
}

.table-wrapper::-moz-scrollbar-thumb:hover {
  background-color: #888; /* Color del thumb (barra de desplazamiento) al pasar el cursor */
}

</style>







<script>
  $(document).ready(function() {
    $('.fila-tabla').on('dblclick', function() {
      var devueltoCell = $(this).find('td:last-child');
      var devuelto = devueltoCell.text().trim();

      if (devuelto === 'No') {
        var id = $(this).data('id');

        var confirmar = confirm("¿Desea terminar el movimiento?");

        if (confirmar) {
          $.ajax({
            url: 'devuelto.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
              location.reload();
              console.log(response);
            },
            error: function(xhr, status, error) {
              // Manejar errores si es necesario
              console.error(error);
            }
          });
        }
      }
    });
  });
</script>
