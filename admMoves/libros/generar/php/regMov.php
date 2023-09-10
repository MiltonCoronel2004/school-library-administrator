<?php
    include('../../../../database.php');
    // Verificar si se ha presionado el botón de enviar
    if (isset($_POST['registrar'])) {
        // Incluir archivo database.php

        // Obtener los datos del formulario
        $fecha = $_POST['fecha'];
        $curso = $_POST['curso'];
        $responsable = $_POST['responsable'];
        $profesor = $_POST['profesor'];
        $devuelto = "No";
        $observaciones = $_POST['observaciones'];
        $ids = $_POST['ids'];

        // Calcular la cantidad de libros
        $idArray = explode(',', $ids);
        $cantidad = count($idArray);

        // Convertir los IDs a nombres de libros
        $libros = array();

        foreach ($idArray as $id) {
            $selectQuery = "SELECT nombrelibro FROM tabladelibros WHERE id = $id";
            $result = mysqli_query($connection, $selectQuery);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $libros[] = $row['nombrelibro'];
            }
        }

        if (count($libros) < count($idArray)) {
            echo "<script>alert('No se encontraron algunos libros con los IDs proporcionados.'); window.location.href='../generar.php';</script>";
            exit; // Detener la ejecución si no se encontraron todos los libros
        }

        $librosStr = implode(', ', $libros);

        // Insertar los datos en la tabla movimientoslibros
        $insertQuery = "INSERT INTO movimientoslibros (fecha, curso, cantidad, responsable, profesor, devuelto, observaciones, libros) 
                      VALUES ('$fecha', '$curso', '$cantidad', '$responsable', '$profesor', '$devuelto', '$observaciones', '$librosStr')";

        // Ejecutar la consulta
        if (mysqli_query($connection, $insertQuery)) {
            header('location: ../../tabladelibros.php');
        } else {
            echo "Error al insertar los datos: " . mysqli_error($connection);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($connection);
    }
?>
