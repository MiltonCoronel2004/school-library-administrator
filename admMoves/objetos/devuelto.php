<?php
include_once("../../database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  // Eliminar los espacios en blanco de la variable id
  $id = str_replace(' ', '', $id);

  $consulta = "SELECT devuelto, objeto FROM movimientos_objetos WHERE REPLACE(id, ' ', '') = $id";
  $resultado = mysqli_query($connection, $consulta);

  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $devuelto = $fila['devuelto'];
    $objeto = $fila['objeto'];

    if ($devuelto === 'No') {
      $actualizarConsulta = "UPDATE movimientos_objetos SET devuelto = 'Sí' WHERE id = $id";
      $actualizarResultado = mysqli_query($connection, $actualizarConsulta);

      if ($actualizarResultado) {
        echo 'Sí';

        // Aquí puedes agregar cualquier código adicional que necesites realizar después de actualizar el valor de "devuelto" a "Sí"
      } else {
        echo "Error al actualizar el valor de devuelto: " . mysqli_error($connection);
      }
    } else {
      echo "El movimiento ya ha sido terminado anteriormente.";
    }
  } else {
    echo "No se encontró ningún movimiento con el ID especificado.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>
