<?php
include_once('../database.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $nombreLibro = $_POST['nombrelibro'];
  $autor = $_POST['autor'];
  $existencias = $_POST['existencias'];
  
  $consulta = "UPDATE librosdematematicas SET nombrelibro = '$nombreLibro', autor = '$autor', existencias = '$existencias' WHERE nombrelibro = '$id'";
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
