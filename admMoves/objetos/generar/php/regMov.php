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

        // Calcular la cantidad de objetos
        $idArray = explode(',', $ids);
        $cantidad = count($idArray);

        // Convertir los IDs a nombres de objetos
        $objetos = array();

        foreach ($idArray as $id) {
            $selectQuery = "SELECT objeto FROM tabladeobjetos WHERE id = $id";
            $result = mysqli_query($connection, $selectQuery);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $objetos[] = $row['objeto'];
            }
        }

        if (count($objetos) < count($idArray)) {
            echo "<script>alert('No se encontraron algunos objetos con los IDs proporcionados.'); window.location.href='../generar.php';</script>";
            exit; // Detener la ejecución si no se encontraron todos los objetos
        }

        $objetosStr = implode(', ', $objetos);

        // Insertar los datos en la tabla movimientos_objetos
        $query = "INSERT INTO movimientos_objetos (fecha, curso, cantidad, responsable, profesor, devuelto, observaciones, objeto) 
                  VALUES ('$fecha', '$curso', '$cantidad', '$responsable', '$profesor', '$devuelto', '$observaciones', '$objetosStr')";

        // Ejecutar la consulta
        if (mysqli_query($connection, $query)) {
            header("Location:../../tabladeobjetos.php");
        } else {
            echo "Error al insertar los datos: " . mysqli_error($connection);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($connection);
    }
?>
