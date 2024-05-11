<?php include("db.php"); ?>

<?php 
    $query = "SELECT * FROM norma031999;";

    $result_usuarios = mysqli_query($conn, $query);
    $numRespuestas = 0;
    $respuestasArray = array();


    // verifica que preguntas fueron respondidas
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

    // construccion de query2
    $query2 = "SELECT ";

    foreach ($respuestasArray as $key => $value) {
        $query2 .= $value;

        // Agregar una coma si no es el último elemento
        if ($key < count($respuestasArray) - 1) {
            $query2 .= ", ";
        }
    }   

    $query2 .= " FROM norma031999;";

    // Ejecutar la segunda consulta
    $result_respuestas = mysqli_query($conn, $query2);

    // Verificar si la consulta fue exitosa
    if ($result_respuestas === false) {
        die("Error en la consulta: " . mysqli_error($conn));
    }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>usuarioID</th>
                <th>username</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                /* $_SESSION['password'] = $password;
                $_SESSION['username'] = $username; */
                $query = "SELECT * FROM usuarios;";
    
    
                $result_usuarios = mysqli_query($conn, $query);
    
                while($row = mysqli_fetch_array($result_usuarios)) { ?>
                    <tr>
                        <td><?php echo $row['usuarioID'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

    

    <label for="pregunta1">El patrón cumple cuando presenta evidencia documental de que clasifica como recipientes sujetos a presión dentro de la: 
    Aquéllos que contienen agua, aire y/o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, menor o igual a 490.33 kPa y un volumen menor o igual a 5 galones. </label>

    <button onclick="generatePDF()">Generar PDF</button>

    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>

    <script>
    // Obtener valor de la etiqueta <label>
    var etiquetaPregunta1 = document.querySelector('label[for="pregunta1"]').innerText;

    // Imprimir el valor
    console.log("Texto de la etiqueta <label>: " + etiquetaPregunta1);    


    // Obtener el resultado de las respuestas desde PHP
    var respuestasArray = <?php echo json_encode($respuestasArray); ?>;
    var resultRespuestas = <?php echo json_encode(mysqli_fetch_all($result_respuestas)); ?>;
    var numeroRespuestas = <?php echo json_encode($numRespuestas); ?>;

    // Imprimir los resultados de las respuestas
    console.log("Respuestas Array:", respuestasArray);
    console.log("Result Respuestas:", resultRespuestas);
    console.log("Número de respuestas:", numeroRespuestas);

    // Modificar la estructura de la tabla
    var tableData = [];
    for (var i = 0; i < resultRespuestas.length; i++) {
        var rowData = [];
        for (var j = 0; j < respuestasArray.length; j++) {
            var pregunta = "Pregunta " + (j + 1);
            var respuesta = "Respuesta " + (j + 1);
            var comentario = "Comentario " + (j + 1);

            // Aquí ajusta cómo deseas mostrar las respuestas en la tabla
            rowData.push(resultRespuestas[i][j]);
        }
        tableData.push(rowData);
    }

    // Propiedades de la tabla
    var props = {
            outputType: jsPDFInvoiceTemplate.OutputType.Save,
            returnJsPDFDocObject: true,
            fileName: "Invoice 2021",
            orientationLandscape: false,
            compress: true,
            logo: {
                src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/logo.png",
                type: 'PNG',
                width: 53.33,
                height: 26.66,
                margin: {
                    top: 0,
                    left: 0
                }
            },
            // Eliminando el sello
            // ...
            business: {
                name: "Business Name",
                address: "Albania, Tirane ish-Dogana, Durres 2001",
                phone: "(+355) 069 11 11 111",
                email: "email@example.com",
                email_1: "info@example.al",
                website: "www.example.al",
            },
            contact: {
                label: "Invoice issued for:",
                name: "Client Name",
                // Eliminando la información de contacto
            },
            invoice: {
                // Eliminando la información de la factura
                // ...
                header: [
                    { title: "Pregunta" },  // Columna 1
                    { title: "Respuesta" }, // Columna 2
                    { title: "Comentario" } // Columna 3
                ],
                // Puedes ajustar el número de filas según tus necesidades
                // MODIFICAR AQUI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                table: Array.from(Array(numeroRespuestas), (item, index) => [
                    "Pregunta " + (index + 1),
                    tableData[0][index].split(",")[0],
                    tableData[0][index].split(",")[1]
                ]),
            },
            // Eliminando la información adicional
            // ...
            invDescLabel: "Invoice Note",
            invDesc: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
            footer: {
                text: "The invoice is created on a computer and is valid without the signature and stamp.",
            },
            pageEnable: true,
            pageLabel: "Page ",
        };

    function generatePDF() {
        var pdfObject = jsPDFInvoiceTemplate.default(props);
        console.log("Objeto creado:", pdfObject);
    }

    // Imprimir los datos de tableData en la página HTML
    var outputDiv = document.createElement("div");
    outputDiv.style.whiteSpace = "pre-wrap"; // Para manejar saltos de línea
    document.body.appendChild(outputDiv);

    for (var i = 0; i < tableData.length; i++) {
        outputDiv.innerHTML += "Fila " + (i + 1) + ": " + JSON.stringify(tableData[i]) + "\n";
    }
</script>

</body>
</html>