<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma252008 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

    $result_usuarios = mysqli_query($conn, $query);
    $numRespuestas = 0;
    $respuestasArray = array();
    $respuestasArray2 = array();
    $numeroCumplimiento = 0;

    // Verifica que preguntas fueron respondidas
    while ($row = mysqli_fetch_array($result_usuarios)) {
        for ($i = -2; $i < $result_usuarios->field_count; $i++) { 
            $fieldName = 'r' . $i;

            if (isset($row[$fieldName]) && is_numeric(substr($row[$fieldName], 0, 1))) {
                $numRespuestas++;
                $numeroCumplimiento += substr($row[$fieldName], 0, 1);


                // Agregar el nombre de la columna al arreglo
                $respuestasArray[] = $fieldName;
                $respuestasArray2[] = "pregunta" . $i;
            }
        }
        break; // Solo necesitas verificar la primera fila
    }

    // Construcción de la segunda consulta solo si hay respuestas
    if ($numRespuestas > 0) {
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma252008 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

        // Ejecutar la segunda consulta
        $result_respuestas = mysqli_query($conn, $query2);

        // Verificar si la consulta fue exitosa
        if ($result_respuestas === false) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
    } else {
        // No hay respuestas, manejarlo como desees
    }

    while ($row = mysqli_fetch_array($result_usuarios)){
      
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylePages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,400&family=Oswald:wght@300&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <title>Normas/NOM-025-STPS-2008.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-025-STPS-2008</h1>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n252008.php" method="post">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.2. Contar con los niveles de iluminación en las áreas de trabajo o en las tareas visuales de acuerdo con la Tabla 1 del Capítulo 7.
            </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
              Criterio de aceptación
          </h2>
      </div>
        <div class="conteiner">
            <label for="pregunta1">Se comprueba que para las tareas por puesto o área de trabajo, los niveles de iluminación corresponden a los de la Tabla 1 del Capítulo 7.</label>
            <div class="radio-buttons">
              <input type="radio" id="p1-0" name="pregunta1" value="0">
              <label for="p1-0">0</label>
              <input type="radio" id="p1-1" name="pregunta1" value="1">
              <label for="p1-1">1</label>
              <input type="radio" id="p1-2" name="pregunta1" value="2">
              <label for="p1-2">2</label>
              <input type="radio" id="p1-3" name="pregunta1" value="3">
              <label for="p1-3">3</label>
              <input type="radio" id="p1-4" name="pregunta1" value="4">
              <label for="p1-4">4</label>
            </div>
            <textarea id="comentario1" name="comentario1" placeholder="Comentario"></textarea>
        </div>

        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.3 Efectuar el reconocimiento de las condiciones de iluminación de las áreas y puestos de trabajo, según lo establecido en el Capítulo 8.
          </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
    </div>
    
      <div class="conteiner">
        <label for="pregunta2">Presenta el registro de la información recopilada en el reconocimiento de las áreas y puestos de trabajo.</label>
        <div class="radio-buttons">
          <input type="radio" id="p2-0" name="pregunta2" value="0">
          <label for="p2-0">0</label>
          <input type="radio" id="p2-1" name="pregunta2" value="1">
          <label for="p2-1">1</label>
          <input type="radio" id="p2-2" name="pregunta2" value="2">
          <label for="p2-2">2</label>
          <input type="radio" id="p2-3" name="pregunta2" value="3">
          <label for="p2-3">3</label>
          <input type="radio" id="p2-4" name="pregunta2" value="4">
          <label for="p2-4">4</label>
        </div>
        <textarea id="comentario2" name="comentario2" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta3">El registro contiene al menos la siguiente información técnica y administrativa que haya servido al patrón para seleccionar las áreas y puestos de trabajo evaluadas:
          <br>- Distribución de las áreas de trabajo, del sistema de iluminación (número y distribución de luminarias), así como de la maquinaria y equipo.
          <br>- Potencia de las lámparas.
          <br>- Descripción del área iluminada: colores y tipo de superficies del local o edificio.
          <br>- Descripción de las tareas visuales y de las áreas de trabajo de acuerdo con la Tabla 1 del Capítulo 7.
          <br>- Descripción de los puestos de trabajo que requieren iluminación localizada.</label>
        <div class="radio-buttons">
            <input type="radio" id="p3-0" name="pregunta3" value="0">
            <label for="p3-0">0</label>
            <input type="radio" id="p3-1" name="pregunta3" value="1">
            <label for="p3-1">1</label>
            <input type="radio" id="p3-2" name="pregunta3" value="2">
            <label for="p3-2">2</label>
            <input type="radio" id="p3-3" name="pregunta3" value="3">
            <label for="p3-3">3</label>
            <input type="radio" id="p3-4" name="pregunta3" value="4">
            <label for="p3-4">4</label>
        </div>
        <textarea id="comentario3" name="comentario3" placeholder="Comentario"></textarea>
    </div>

    <div>
      <h2>
          Disposición
      </h2>
      <label class="conteiner">5.4 Contar con el informe de resultados de la evaluación de los niveles de iluminación de las áreas, actividades o puestos de trabajo que cumpla con en los apartados 5.2 y 10.4 de la presente Norma, y conservarlo mientras se mantengan las condiciones que dieron origen a ese resultado.
      </label>
  </div>
  <hr class="styled-separator">
  <div>
    <h2>
        Criterio de aceptación
    </h2>
</div>
      <div class="conteiner">
        <label for="pregunta4">Presenta las evidencias de la evaluación de los niveles de iluminación de las áreas y puestos de trabajo.</label>
        <div class="radio-buttons">
          <input type="radio" id="p4-0" name="pregunta4" value="0">
          <label for="p4-0">0</label>
          <input type="radio" id="p4-1" name="pregunta4" value="1">
          <label for="p4-1">1</label>
          <input type="radio" id="p4-2" name="pregunta4" value="2">
          <label for="p4-2">2</label>
          <input type="radio" id="p4-3" name="pregunta4" value="3">
          <label for="p4-3">3</label>
          <input type="radio" id="p4-4" name="pregunta4" value="4">
          <label for="p4-4">4</label>
        </div>
        <textarea id="comentario4" name="comentario4" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta5">La evaluación se realizó de acuerdo a los Capítulos 8 y 9, así como con el apartado 10.4.</label>
        <div class="radio-buttons">
          <input type="radio" id="p5-0" name="pregunta5" value="0">
          <label for="p5-0">0</label>
          <input type="radio" id="p5-1" name="pregunta5" value="1">
          <label for="p5-1">1</label>
          <input type="radio" id="p5-2" name="pregunta5" value="2">
          <label for="p5-2">2</label>
          <input type="radio" id="p5-3" name="pregunta5" value="3">
          <label for="p5-3">3</label>
          <input type="radio" id="p5-4" name="pregunta5" value="4">
          <label for="p5-4">4</label>
        </div>
        <textarea id="comentario5" name="comentario5" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.5. Realizar la evaluación de los niveles de iluminación de acuerdo con lo establecido en los capítulos 8 y 9.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta6">Presenta las evidencias de la evaluación de los niveles de iluminación de las áreas y puestos de trabajo.</label>
        <div class="radio-buttons">
          <input type="radio" id="p6-0" name="pregunta6" value="0">
          <label for="p6-0">0</label>
          <input type="radio" id="p6-1" name="pregunta6" value="1">
          <label for="p6-1">1</label>
          <input type="radio" id="p6-2" name="pregunta6" value="2">
          <label for="p6-2">2</label>
          <input type="radio" id="p6-3" name="pregunta6" value="3">
          <label for="p6-3">3</label>
          <input type="radio" id="p6-4" name="pregunta6" value="4">
          <label for="p6-4">4</label>
        </div>
        <textarea id="comentario6" name="comentario6" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta7">La evaluación se realizó de acuerdo a los Capítulos 8 y 9, así como con el apartado 10.4.</label>
        <div class="radio-buttons">
          <input type="radio" id="p7-0" name="pregunta7" value="0">
          <label for="p7-0">0</label>
          <input type="radio" id="p7-1" name="pregunta7" value="1">
          <label for="p7-1">1</label>
          <input type="radio" id="p7-2" name="pregunta7" value="2">
          <label for="p7-2">2</label>
          <input type="radio" id="p7-3" name="pregunta7" value="3">
          <label for="p7-3">3</label>
          <input type="radio" id="p7-4" name="pregunta7" value="4">
          <label for="p7-4">4</label>
        </div>
        <textarea id="comentario7" name="comentario7" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.6 Llevar a cabo el control de los niveles de iluminación, según lo establecido en el Capítulo 10.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta8">Si derivado de la evaluación no se identificaron deficiencias o excesos de iluminación en las áreas o puestos de trabajo, por lo que no se aplicaron medidas de control.
        </label>
        <div class="radio-buttons">
          <input type="radio" id="p8-0" name="pregunta8" value="0">
          <label for="p8-0">0</label>
          <input type="radio" id="p8-1" name="pregunta8" value="1">
          <label for="p8-1">1</label>
          <input type="radio" id="p8-2" name="pregunta8" value="2">
          <label for="p8-2">2</label>
          <input type="radio" id="p8-3" name="pregunta8" value="3">
          <label for="p8-3">3</label>
          <input type="radio" id="p8-4" name="pregunta8" value="4">
          <label for="p8-4">4</label>
        </div>
        <textarea id="comentario8" name="comentario8" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta9">Si derivado de la evaluación se identificaron deficiencias o excesos de iluminación en las áreas o puestos de trabajo, se aplicaron las siguientes medidas de control:
          <br>- Proporcionó mantenimiento a las luminarias.
          <br>- Modificó el sistema de iluminación o su distribución.
          <br>- En su caso, instaló la iluminación complementaria o localizada.
          <br>- Derivado del criterio anterior presenta evidencias de una nueva evaluación donde se constata que las nuevas condiciones de iluminación cumplen con lo establecido en la presente Norma.</label>
        <div class="radio-buttons">
          <input type="radio" id="p9-0" name="pregunta9" value="0">
          <label for="p9-0">0</label>
          <input type="radio" id="p9-1" name="pregunta9" value="1">
          <label for="p9-1">1</label>
          <input type="radio" id="p9-2" name="pregunta9" value="2">
          <label for="p9-2">2</label>
          <input type="radio" id="p9-3" name="pregunta9" value="3">
          <label for="p9-3">3</label>
          <input type="radio" id="p9-4" name="pregunta9" value="4">
          <label for="p9-4">4</label>
        </div>
        <textarea id="comentario9" name="comentario9" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.7 Contar con un reporte del estudio elaborado para las condiciones de iluminación del centro de trabajo, según lo establecido en el Capítulo 12.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta10">El informe descriptivo de las condiciones normales de operación, en las cuales se realizó la evaluación de los niveles de iluminación, incluyendo las
          descripciones del proceso, instalaciones, puestos de trabajo y el número de trabajadores expuestos por área y puesto de trabajo.</label>
        <div class="radio-buttons">
          <input type="radio" id="p10-0" name="pregunta10" value="0">
          <label for="p10-0">0</label>
          <input type="radio" id="p10-1" name="pregunta10" value="1">
          <label for="p10-1">1</label>
          <input type="radio" id="p10-2" name="pregunta10" value="2">
          <label for="p10-2">2</label>
          <input type="radio" id="p10-3" name="pregunta10" value="3">
          <label for="p10-3">3</label>
          <input type="radio" id="p10-4" name="pregunta10" value="4">
          <label for="p10-4">4</label>
        </div>
        <textarea id="comentario10" name="comentario10" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta11">La distribución del área evaluada, en el que se indique la ubicación de los puntos de medición.</label>
        <div class="radio-buttons">
          <input type="radio" id="p11-0" name="pregunta11" value="0">
          <label for="p11-0">0</label>
          <input type="radio" id="p11-1" name="pregunta11" value="1">
          <label for="p11-1">1</label>
          <input type="radio" id="p11-2" name="pregunta11" value="2">
          <label for="p11-2">2</label>
          <input type="radio" id="p11-3" name="pregunta11" value="3">
          <label for="p11-3">3</label>
          <input type="radio" id="p11-4" name="pregunta11" value="4">
          <label for="p11-4">4</label>
        </div>
        <textarea id="comentario11" name="comentario11" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta12">Los resultados de la evaluación de los niveles de iluminación indicando su incertidumbre.</label>
        <div class="radio-buttons">
          <input type="radio" id="p12-0" name="pregunta12" value="0">
          <label for="p12-0">0</label>
          <input type="radio" id="p12-1" name="pregunta12" value="1">
          <label for="p12-1">1</label>
          <input type="radio" id="p12-2" name="pregunta12" value="2">
          <label for="p12-2">2</label>
          <input type="radio" id="p12-3" name="pregunta12" value="3">
          <label for="p12-3">3</label>
          <input type="radio" id="p12-4" name="pregunta12" value="4">
          <label for="p12-4">4</label>
        </div>
        <textarea id="comentario12" name="comentario12" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta13">La comparación e interpretación de los resultados obtenidos, contra lo establecido en las Tablas 1 y 2 de los Capítulos 7 y 9 respectivamente.</label>
        <div class="radio-buttons">
          <input type="radio" id="p13-0" name="pregunta12" value="0">
          <label for="p13-0">0</label>
          <input type="radio" id="p13-1" name="pregunta12" value="1">
          <label for="p13-1">1</label>
          <input type="radio" id="p13-2" name="pregunta12" value="2">
          <label for="p13-2">2</label>
          <input type="radio" id="p13-3" name="pregunta12" value="3">
          <label for="p13-3">3</label>
          <input type="radio" id="p13-4" name="pregunta12" value="4">
          <label for="p13-4">4</label>
        </div>
        <textarea id="comentario13" name="comentario13" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta14">La hora en que se efectuaron las mediciones.</label>
        <div class="radio-buttons">
          <input type="radio" id="p14-0" name="pregunta12" value="0">
          <label for="p14-0">0</label>
          <input type="radio" id="p14-1" name="pregunta12" value="1">
          <label for="p14-1">1</label>
          <input type="radio" id="p14-2" name="pregunta12" value="2">
          <label for="p14-2">2</label>
          <input type="radio" id="p14-3" name="pregunta12" value="3">
          <label for="p14-3">3</label>
          <input type="radio" id="p14-4" name="pregunta12" value="4">
          <label for="p14-4">4</label>
        </div>
        <textarea id="comentario14" name="comentario14" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta15">El programa de mantenimiento.</label>
        <div class="radio-buttons">
          <input type="radio" id="p15-0" name="pregunta12" value="0">
          <label for="p15-0">0</label>
          <input type="radio" id="p15-1" name="pregunta12" value="1">
          <label for="p15-1">1</label>
          <input type="radio" id="p15-2" name="pregunta12" value="2">
          <label for="p15-2">2</label>
          <input type="radio" id="p15-3" name="pregunta12" value="3">
          <label for="p15-3">3</label>
          <input type="radio" id="p15-4" name="pregunta12" value="4">
          <label for="p15-4">4</label>
        </div>
        <textarea id="comentario15" name="comentario15" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta16">La copia del documento que avale la calibración del luxómetro expedida por un laboratorio acreditado y aprobado conforme a la Ley Federal sobre Metrología y Normalización, y que cumpla con las disposiciones estipuladas en esta Norma.</label>
        <div class="radio-buttons">
          <input type="radio" id="p16-0" name="pregunta12" value="0">
          <label for="p16-0">0</label>
          <input type="radio" id="p16-1" name="pregunta12" value="1">
          <label for="p16-1">1</label>
          <input type="radio" id="p16-2" name="pregunta12" value="2">
          <label for="p16-2">2</label>
          <input type="radio" id="p16-3" name="pregunta12" value="3">
          <label for="p16-3">3</label>
          <input type="radio" id="p16-4" name="pregunta12" value="4">
          <label for="p16-4">4</label>
        </div>
        <textarea id="comentario16" name="comentario16" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta17">La conclusión técnica del estudio;</label>
        <div class="radio-buttons">
          <input type="radio" id="p17-0" name="pregunta12" value="0">
          <label for="p17-0">0</label>
          <input type="radio" id="p17-1" name="pregunta12" value="1">
          <label for="p17-1">1</label>
          <input type="radio" id="p17-2" name="pregunta12" value="2">
          <label for="p17-2">2</label>
          <input type="radio" id="p17-3" name="pregunta12" value="3">
          <label for="p17-3">3</label>
          <input type="radio" id="p17-4" name="pregunta12" value="4">
          <label for="p17-4">4</label>
        </div>
        <textarea id="comentario17" name="comentario17" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta18">Las medidas de control a desarrollar y el programa de implantación.</label>
        <div class="radio-buttons">
          <input type="radio" id="p18-0" name="pregunta18" value="0">
          <label for="p18-0">0</label>
          <input type="radio" id="p18-1" name="pregunta18" value="1">
          <label for="p18-1">1</label>
          <input type="radio" id="p18-2" name="pregunta18" value="2">
          <label for="p18-2">2</label>
          <input type="radio" id="p18-3" name="pregunta18" value="3">
          <label for="p18-3">3</label>
          <input type="radio" id="p18-4" name="pregunta18" value="4">
          <label for="p18-4">4</label>
        </div>
        <textarea id="comentario18" name="comentario18" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta19">El nombre y firma del responsable del estudio.</label>
        <div class="radio-buttons">
          <input type="radio" id="p19-0" name="pregunta19" value="0">
          <label for="p19-0">0</label>
          <input type="radio" id="p19-1" name="pregunta19" value="1">
          <label for="p19-1">1</label>
          <input type="radio" id="p19-2" name="pregunta19" value="2">
          <label for="p19-2">2</label>
          <input type="radio" id="p19-3" name="pregunta19" value="3">
          <label for="p19-3">3</label>
          <input type="radio" id="p19-4" name="pregunta19" value="4">
          <label for="p19-4">4</label>
        </div>
        <textarea id="comentario19" name="comentario19" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta20">Los resultados de las evaluaciones hasta cumplir con lo establecido en las Tablas 1 y 2 de los Capítulos 7 y 9, respectivamente.</label>
        <div class="radio-buttons">
          <input type="radio" id="p20-0" name="pregunta20" value="0">
          <label for="p20-0">0</label>
          <input type="radio" id="p20-1" name="pregunta20" value="1">
          <label for="p20-1">1</label>
          <input type="radio" id="p20-2" name="pregunta20" value="2">
          <label for="p20-2">2</label>
          <input type="radio" id="p20-3" name="pregunta20" value="3">
          <label for="p20-3">3</label>
          <input type="radio" id="p20-4" name="pregunta20" value="4">
          <label for="p20-4">4</label>
        </div>
        <textarea id="comentario20" name="comentario20" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.8. Informar a todos los trabajadores, sobre los riesgos que puede provocar un deslumbramiento o un nivel deficiente de iluminación en sus áreas o puestos de trabajo.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta21">Exhibe las evidencias con los elementos y/o mecanismos de difusión para dar a conocer los riesgos a los trabajadores de las áreas o puestos de trabajo con
          iluminación deficiente, excesiva o que provoque deslumbramiento</label>
        <div class="radio-buttons">
          <input type="radio" id="p21-0" name="pregunta21" value="0">
          <label for="p21-0">0</label>
          <input type="radio" id="p21-1" name="pregunta21" value="1">
          <label for="p21-1">1</label>
          <input type="radio" id="p21-2" name="pregunta21" value="2">
          <label for="p21-2">2</label>
          <input type="radio" id="p21-3" name="pregunta21" value="3">
          <label for="p21-3">3</label>
          <input type="radio" id="p21-4" name="pregunta21" value="4">
          <label for="p21-4">4</label>
        </div>
        <textarea id="comentario21" name="comentario21" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta22">Al realizar la(s) entrevista(s) al personal del centro de trabajo involucrado en las áreas o puestos de trabajo, se constata que identifican los riesgos relacionados
          con iluminación deficiente, excesiva o que provoque deslumbramiento.</label>
        <div class="radio-buttons">
          <input type="radio" id="p22-0" name="pregunta22" value="0">
          <label for="p22-0">0</label>
          <input type="radio" id="p22-1" name="pregunta22" value="1">
          <label for="p22-1">1</label>
          <input type="radio" id="p22-2" name="pregunta22" value="2">
          <label for="p22-2">2</label>
          <input type="radio" id="p22-3" name="pregunta22" value="3">
          <label for="p22-3">3</label>
          <input type="radio" id="p22-4" name="pregunta22" value="4">
          <label for="p22-4">4</label>
        </div>
        <textarea id="comentario22" name="comentario22" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.9. Practicar exámenes con periodicidad anual de agudeza visual, campimetría y de percepción de colores a los trabajadores que desarrollen sus actividades en áreas del centro de trabajo que cuenten con
          iluminación especial.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta23">Presenta los exámenes médicos visuales realizados a los trabajadores para agudeza visual, campimetría y de percepción de colores, con una periodicidad anual.</label>
        <div class="radio-buttons">
          <input type="radio" id="p23-0" name="pregunta23" value="0">
          <label for="p23-0">0</label>
          <input type="radio" id="p23-1" name="pregunta23" value="1">
          <label for="p23-1">1</label>
          <input type="radio" id="p23-2" name="pregunta23" value="2">
          <label for="p23-2">2</label>
          <input type="radio" id="p23-3" name="pregunta23" value="3">
          <label for="p23-3">3</label>
          <input type="radio" id="p23-4" name="pregunta23" value="4">
          <label for="p23-4">4</label>
        </div>
        <textarea id="comentario23" name="comentario23" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.10 Elaborar y ejecutar un programa de mantenimiento para las luminarias del centro de trabajo, incluyendo los sistemas de iluminación de emergencia, según lo establecido en el Capítulo 11.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta24">Presenta un programa de mantenimiento que contenga al menos:
          <br>- La limpieza de las luminarias.
          <br>- La ventilación de las luminarias.
          <br>- El reemplazo de las luminarias cuando dejen de funcionar, o después de transcurrido el número predeterminado de horas de funcionamiento establecido por el fabricante.
          <br>- Los elementos que eviten el deslumbramiento directo y por reflexión, así como el efecto estroboscópico.
          <br>- Los elementos de preencendido o de calentamiento.</label>
        <div class="radio-buttons">
          <input type="radio" id="p24-0" name="pregunta24" value="0">
          <label for="p24-0">0</label>
          <input type="radio" id="p24-1" name="pregunta24" value="1">
          <label for="p24-1">1</label>
          <input type="radio" id="p24-2" name="pregunta24" value="2">
          <label for="p24-2">2</label>
          <input type="radio" id="p24-3" name="pregunta24" value="3">
          <label for="p24-3">3</label>
          <input type="radio" id="p24-4" name="pregunta24" value="4">
          <label for="p24-4">4</label>
        </div>
        <textarea id="comentario24" name="comentario24" placeholder="Comentario"></textarea>
      </div>

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.11 Instalar sistemas de iluminación eléctrica de emergencia, en aquellas áreas del centro de trabajo donde la interrupción de la fuente de luz artificial represente un riesgo en la tarea visual del puesto de trabajo,
          o en las áreas consideradas como ruta de evacuación que lo requieran.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta25">Derivado de un recorrido por las instalaciones del centro de trabajo, identifica que existen los sistemas de iluminación de emergencia y éstos están funcionando.</label>
        <div class="radio-buttons">
          <input type="radio" id="p25-0" name="pregunta25" value="0">
          <label for="p25-0">0</label>
          <input type="radio" id="p25-1" name="pregunta25" value="1">
          <label for="p25-1">1</label>
          <input type="radio" id="p25-2" name="pregunta25" value="2">
          <label for="p25-2">2</label>
          <input type="radio" id="p25-3" name="pregunta25" value="3">
          <label for="p25-3">3</label>
          <input type="radio" id="p25-4" name="pregunta25" value="4">
          <label for="p25-4">4</label>
        </div>
        <textarea id="comentario25" name="comentario25" placeholder="Comentario"></textarea>
      </div>
      
        <!-- Repite el bloque anterior para cada pregunta -->
      
        <input type="submit" value="Enviar" name="guardar_n252008">
      </form>
      <div style="text-align: right; margin-top: 20px;">
        <button onclick="generatePDF()" id="botonDescarga" disabled style="background-color: #4CAF50; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Generar PDF</button>
        <button onclick="openGraphPDF()" style="background-color: #008CBA; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s; margin-left: 10px;">Abrir Gráfica</button>
      </div> 

      <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
      
      <script>
// Obtener el resultado de las respuestas desde PHP
var respuestasArray = <?php echo json_encode($respuestasArray); ?>;
var resultRespuestas = <?php echo json_encode(mysqli_fetch_all($result_respuestas)); ?>;
var numeroRespuestas = <?php echo json_encode($numRespuestas); ?>;
var respuestasArray2 = <?php echo json_encode($respuestasArray2); ?>;
var numeroCumplimiento = <?php echo json_encode($numeroCumplimiento); ?>;

var botonDescarga = document.getElementById('botonDescarga');


// Verifica si hay al menos un resultado
if (respuestasArray2.length > 0) {
            // Habilita el botón de descarga
            botonDescarga.removeAttribute('disabled');
        }

// Obtener el número total de preguntas
// MODIFICARR!!!!!!!!!!!!!!
var totalPreguntas = 25;


// Crear un array para almacenar los textos de las etiquetas
var textosEtiquetas = [];

// Obtener valores de las etiquetas en un bucle
for (var j = 0; j < respuestasArray2.length; j++) {
    var selector = 'label[for="' + respuestasArray2[j] + '"]';
    var textoEtiqueta = document.querySelector(selector).innerText;
    textosEtiquetas.push(textoEtiqueta);
}

// Imprimir los textos de las etiquetas
/* console.log("Textos de las etiquetas:");
        textosEtiquetas.forEach(function (texto) {
            console.log("- " + texto);
        }); */
   


// Imprimir los resultados de las respuestas
/* console.log("Respuestas Array:", respuestasArray);
console.log("Result Respuestas:", resultRespuestas);
console.log("Número de respuestas:", numeroRespuestas); */

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
        fileName: "Reporte",
        orientationLandscape: false,
        compress: true,
        logo: {
            src: "../logito.png",
            type: 'PNG',
            width: 24.33,
            height: 28.66,
            margin: {
                top: 0,
                left: 0
            }
        },
        // Eliminando el sello
        // ...
        business: {
            name: "SVCNOM",
            address: "Sinaloa, Mexico",
            phone: "(+52) 687 180 58 99",
            email: "normas@gmail.com",
            /* email_1: "info@example.al",
            website: "www.example.al", */
        },
        contact: {
            label: "Registro para la norma:",
            name: "NOM-025-STPS-2008",
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
                textosEtiquetas[index],
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

var totalNumeroCumplimiento = totalPreguntas * 4;
  var porcentajeCumplimiento = numeroCumplimiento / totalNumeroCumplimiento * 100;
  var porcentajeNoCumplimiento = 100 - porcentajeCumplimiento;
  console.log("porcentajeCumplimiento:", porcentajeCumplimiento);
  console.log("porcentajeNoCumplimiento:", porcentajeNoCumplimiento);

</script>

<div id="graficaPastelContainer">
    <canvas id="graficaPastel"></canvas>
</div>

<!-- Incluye la biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Agrega el script de JavaScript para generar la gráfica -->
<script>
  

    // Configura datos para la gráfica
    var datos = {
        labels: ['Cumplimiento de Normas', 'No Cumplimiento'],
        datasets: [{
            data: [porcentajeCumplimiento, porcentajeNoCumplimiento],
            backgroundColor: ['#36A2EB', '#FFCE56']
        }]
    };

    // Configura opciones de la gráfica
    var opciones = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Obtiene el contexto del lienzo de la gráfica
    var ctx = document.getElementById('graficaPastel').getContext('2d');

    // Crea la gráfica de pastel
    var graficaPastel = new Chart(ctx, {
        type: 'pie',
        data: datos,
        options: opciones
    });
</script>

<div id="graficaPastelContainer">
    <canvas id="graficaPastel"></canvas>
</div>

<!-- Incluye la biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Agrega el script de JavaScript para generar la gráfica -->
<script>
  

    // Configura datos para la gráfica
    var datos = {
        labels: ['Cumplimiento de Normas', 'No Cumplimiento'],
        datasets: [{
            data: [porcentajeCumplimiento, porcentajeNoCumplimiento],
            backgroundColor: ['#36A2EB', '#FFCE56']
        }]
    };

    // Configura opciones de la gráfica
    var opciones = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Obtiene el contexto del lienzo de la gráfica
    var ctx = document.getElementById('graficaPastel').getContext('2d');

    // Crea la gráfica de pastel
    var graficaPastel = new Chart(ctx, {
        type: 'pie',
        data: datos,
        options: opciones
    });
</script>



<!-- Aqui descarga la grafica -->



<!-- Agrega un nuevo contenedor para la gráfica -->
<div id="graficaPastelContainer">
    <canvas id="graficaPastel"></canvas>
</div>

<!-- ... (otras inclusiones de scripts) -->

<!-- Agrega el script de JavaScript para generar la gráfica -->
<script>
    // ... (código de configuración de Chart.js y generación de gráfica)

    // Función para abrir la gráfica como un archivo PDF
    function openGraphPDF() {
        try {
            // Obtener la gráfica como enlace de datos (data URL)
            var graficaDataURL = graficaPastel.toBase64Image();

            // Crear un enlace temporal y abrirlo en una nueva ventana
            var enlaceTemp = document.createElement('a');
            enlaceTemp.href = graficaDataURL;
            enlaceTemp.target = '_blank';
            enlaceTemp.rel = 'noopener noreferrer';
            enlaceTemp.click();
        } catch (error) {
            console.error("Error al abrir PDF:", error);
        }
    }
</script>

</body>
</html>