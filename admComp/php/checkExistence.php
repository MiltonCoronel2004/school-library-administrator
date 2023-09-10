<?php
include_once('../../database.php');

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $numero = $_POST['numero'];

  // Verificar si el número de computadora ya existe en la base de datos
  $consultaExistencia = "SELECT COUNT(*) as total FROM tabladecomputadoras WHERE numero = '$numero' AND numero != '$id'";
  $resultadoExistencia = mysqli_query($connection, $consultaExistencia);
  $filaExistencia = mysqli_fetch_assoc($resultadoExistencia);
  $totalExistencia = $filaExistencia['total'];

  if ($totalExistencia > 0) {
    echo "exists";
  } else {
    echo "not_exists";
  }
}
?>
