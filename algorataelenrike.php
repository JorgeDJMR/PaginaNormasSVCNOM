<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $query = "SELECT * FROM norma041999;";

        $result_usuarios = mysqli_query($conn, $query);
        $numRespuestas = 0;
        $respuestasArray = array(); // Crear el arreglo

        while ($row = mysqli_fetch_array($result_usuarios)) {
            for ($i = -2; $i < $result_usuarios->field_count; $i++) { 
                $fieldName = 'r' . $i;

                if (isset($row[$fieldName]) && is_numeric(substr($row[$fieldName], 0, 1))) {
                    $numRespuestas++;

                    // Agregar el nombre de la columna al arreglo
                    $respuestasArray[] = $fieldName;
                }
            }
            break;
        }


        // Construir la segunda consulta SQL
        $query2 = "SELECT ";

        foreach ($respuestasArray as $key => $value) {
            $query2 .= $value;

            // Agregar una coma si no es el último elemento
            if ($key < count($respuestasArray) - 1) {
                $query2 .= ", ";
            }
        }

        $query2 .= " FROM norma041999;";
        
        echo "<p>Query 2: " . $query2 . "</p>";

        // Imprimir el arreglo
        echo "<pre>";
        print_r($respuestasArray);
        echo "</pre>";

        // Ejecutar la segunda consulta
        // Ejecutar la segunda consulta
    $result_respuestas = mysqli_query($conn, $query2);

    // Verificar si la consulta fue exitosa
    if ($result_respuestas === false) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Imprimir los resultados de la segunda consulta
    echo "<p>Resultados de la segunda consulta:</p>";
    while ($row_respuestas = mysqli_fetch_assoc($result_respuestas)) {
        foreach ($row_respuestas as $columnName => $value) {
            echo " $value ";
        }
        echo "<br>";
    }

    for ($i=0; $i < count($respuestasArray); $i++) { 
        # code...
    }

    ?>
</body>
</html>
