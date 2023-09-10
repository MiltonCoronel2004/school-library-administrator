<?php
include_once('../../database.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $objeto = $_POST['objeto'];
  $observaciones = $_POST['observaciones'];
  $existencias = $_POST['existencias'];
  
  $consulta = "UPDATE tabladeobjetos SET objeto = '$objeto', observaciones = '$observaciones', existencias = '$existencias' WHERE objeto = '$id'";
  $resultado = mysqli_query($connection, $consulta);
  
  if($resultado) {
    echo "El libro se actualizó correctamente";
  } else {
    echo "Error al actualizar el libro";
  }
} else {
  echo "No se especificó un libro para actualizar";
}
?>
