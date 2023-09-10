<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg_styles.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form method="POST" action="registrar.php">
            <label for="numero">Número de Computadora:</label>
            <input type="number" id="numero" name="numero" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>

            <label for="en-uso">En Uso:</label>
            <input type="text" id="en-uso" name="en_uso" required>

            <input type="submit" value="Enviar" name="enviar">
        </form>  
    </div>

    <?php 
    require_once('../php/registrar.php');
    ?>





</body>
</html>