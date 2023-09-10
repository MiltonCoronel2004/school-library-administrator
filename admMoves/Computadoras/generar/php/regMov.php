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
        $numero = $_POST['numero'];

        // Calcular la cantidad de computadoras
        $numeroArray = explode(',', $numero);
        $cantidad = count($numeroArray);

        // Verificar la existencia de los números en la tabla "tabladecomputadoras"
        $numerosNoExistentes = array();

        foreach ($numeroArray as $num) {
            $checkQuery = "SELECT numero FROM tabladecomputadoras WHERE REPLACE(numero, ' ', '') = '$num'";
            $result = mysqli_query($connection, $checkQuery);

            if (mysqli_num_rows($result) == 0) {
                $numerosNoExistentes[] = $num;
            }
        }

        if (!empty($numerosNoExistentes)) {
            $numerosNoExistentesStr = implode(', ', $numerosNoExistentes);
            echo "<script>alert('La(s) computadora(s) $numerosNoExistentesStr no existe(n).'); window.location.href='../generar.php';</script>";
            exit; // Detener la ejecución si hay computadoras inexistentes
        }

        // Verificar si los números tienen la columna "oculto" en true (1)
        $numerosOcultos = array();

        foreach ($numeroArray as $num) {
            $checkQuery = "SELECT numero FROM tabladecomputadoras WHERE numero = '$num' AND oculto = 1";
            $result = mysqli_query($connection, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                $numerosOcultos[] = $num;
            }
        }

        if (!empty($numerosOcultos)) {
            $numerosOcultosStr = implode(', ', $numerosOcultos);
            echo "<script>alert('La(s) computadora(s) $numerosOcultosStr ya están siendo utilizada(s).'); window.location.href='../generar.php';</script>";
        } else {
            // Insertar los datos en la tabla movimientoscomputadoras
            $query = "INSERT INTO movimientoscomputadoras (fecha, curso, cantidad, responsable, profesor, devuelto, observaciones, numero) 
                      VALUES ('$fecha', '$curso', '$cantidad', '$responsable', '$profesor', '$devuelto', '$observaciones', '$numero')";

            // Ejecutar la consulta
            if (mysqli_query($connection, $query)) {
                header('location: ../../tabladecomputadoras.php');
            } else {
                echo "Error al insertar los datos: " . mysqli_error($connection);
            }

            // Ocultar los números en la tabla tabladecomputadoras
            // Recorrer los números y construir una consulta para ocultar las filas correspondientes
            $updateQuery = "UPDATE tabladecomputadoras SET oculto = 1 WHERE ";
            foreach ($numeroArray as $num) {
                $updateQuery .= "numero = '$num' OR ";
            }
            $updateQuery = rtrim($updateQuery, "OR "); // Eliminar el último "OR" innecesario

            // Ejecutar la consulta de actualización para ocultar las filas
            if (mysqli_query($connection, $updateQuery)) {
                header("Location:../../tablacomputadoras.php");
            } else {
                echo "Error al ocultar las filas: " . mysqli_error($connection);
            }
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($connection);
    }
?>
