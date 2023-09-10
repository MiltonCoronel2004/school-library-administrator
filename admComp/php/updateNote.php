<?php
include_once('../../database.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $numero = $_POST["numero"];
  $estado = $_POST["estado"];
  $observaciones = $_POST["observaciones"];

  // El número de computadora no existe, proceder con la actualización
  $consulta = "UPDATE tabladecomputadoras SET numero = '$numero', estado = '$estado', observaciones = '$observaciones' WHERE numero = '$id'";
  $resultado = mysqli_query($connection, $consulta);
}

header("Location: ../notebooks.php");
?>
