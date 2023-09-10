<?php
include_once("../../database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $consulta = "SELECT devuelto, numero FROM movimientoscomputadoras WHERE id = $id";
  $resultado = mysqli_query($connection, $consulta);

  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $devuelto = $fila['devuelto'];
    $numero = $fila['numero'];

    if ($devuelto === 'No') {
      $actualizarConsulta = "UPDATE movimientoscomputadoras SET devuelto = 'Sí' WHERE id = $id";
      $actualizarResultado = mysqli_query($connection, $actualizarConsulta);

      if ($actualizarResultado) {
        echo 'Sí';

        // Añade aquí el código para cambiar el valor de "oculto" de 0 a 1 en la tabla "tabladecomputadoras"
        $numeros = explode(',', $numero);

        // Construir una consulta para cambiar el valor de "oculto" a 0 para los números en "tabladecomputadoras"
        $updateQuery = "UPDATE tabladecomputadoras SET oculto = 0 WHERE numero IN (";
        foreach ($numeros as $num) {
          $updateQuery .= "'$num',";
        }
        $updateQuery = rtrim($updateQuery, ','); // Eliminar la última coma
        $updateQuery .= ")";

        if (mysqli_query($connection, $updateQuery)) {
          // Cambio realizado correctamente
        } else {
          echo "Error al cambiar el valor de oculto: " . mysqli_error($connection);
        }
      } 
    } 
  }
  
  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>
