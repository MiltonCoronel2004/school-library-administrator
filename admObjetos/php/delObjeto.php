<?php
include_once('../../database.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $consulta = "DELETE FROM tabladeobjetos WHERE objeto = '$id'";
  $resultado = mysqli_query($connection, $consulta);
  
  if($resultado) {
    echo "El libro se eliminó correctamente";
  } else {
    echo "Error al eliminar el libro";
  }
} else {
  header("Location:../objeto.php");
}
?>