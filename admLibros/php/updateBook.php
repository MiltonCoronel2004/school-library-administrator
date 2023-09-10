<?php
include_once('../../database.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $nombreLibro = $_POST['nombrelibro'];
  $categoria = $_POST['categoria'];
  $existencias = $_POST['existencias'];
  
  $consulta = "UPDATE tabladelibros SET nombrelibro = '$nombreLibro', categoria = '$categoria', existencias = '$existencias' WHERE nombrelibro = '$id'";
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
