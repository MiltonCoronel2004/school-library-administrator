<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
  <div class="form-group">
    <label for="numero">Número:</label>
    <input type="number" id="numero" name="numero" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="observaciones">Observaciones:</label>
    <input type="text" id="observaciones" name="observaciones" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
</form>

<style>
form {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-65%);
  background-color: #f5f5f5;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  width: 300px;
  text-align: center;
}

form .form-group {
  text-align: center;
}

input[type="text"], input[type="number"] {
  margin-bottom: 10px;
  padding: 5px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3);
  text-align: center;
  margin: 0 auto;
}

input[type="text"], input[type="number"] {
  display: block;
  margin-top: 10px;
}

input[type="text"]:first-of-type {
  margin-top: 10px;
  margin-bottom: 10px;
}

input[type="number"]:last-of-type {
  margin-bottom: 30px;
}



label {
  font-weight: bold;
}

button {
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  font-weight: bold;
  margin-top: 10px;
  padding: 10px;
  text-transform: uppercase;
  width: 100%;
}

button:hover {
  background-color: #0069d9;
}

.alreadyregistered {
  position: absolute;
  top: 51%;
  left: 50%;
  transform: translate(-50%,-30%);
  font-weight: bold;
}


</style>

<script>
  setTimeout(function() {
  var element = document.querySelector('.alreadyregistered');
  element.style.display = 'none';
}, 5000);


</script>




</body>
</html>

<?php  
include_once("../../database.php");




if (isset($_POST['registrar'])) {
  $numero = $_POST["numero"];
  $estado = $_POST["estado"];
  $observaciones = $_POST["observaciones"];

  $consulta = "SELECT * FROM tabladecomputadoras WHERE numero='$numero'";
  $resultado = mysqli_query($connection, $consulta);
  $contador = mysqli_num_rows($resultado);

  if ($contador > 0) {
    ?>
    <p class="alreadyregistered">Computadora existente.</p>
  <?php   
  } else {
    $insertar_datos = "INSERT INTO tabladecomputadoras (numero, estado, observaciones) VALUES ('$numero','$estado','$observaciones')";
    $resultado = mysqli_query($connection, $insertar_datos);

    $consulta = "SELECT * FROM tabladecomputadoras";
    $result = mysqli_query($connection, $consulta);
    if (!$result) {
      echo "No se ha podido realizar la consulta";
    }


      
    mysqli_close($connection);
    header("Location: ../notebooks.php");
  }
}



    
    ?>