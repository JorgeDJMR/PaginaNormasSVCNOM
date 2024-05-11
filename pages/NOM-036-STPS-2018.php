<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma362018 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma362018 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-036-STPS-2018.HTML</title>
</head>
<body>
    <div class="barrasuperior">
        <h1>Norma NOM-036-STPS-2018</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    
    <form action="guardar_n362018.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1 Contar con el análisis de los factores de riesgo ergonómico debido al manejo manual de cargas.
                </label>
        </div>
        <hr class="styled-separator">

          <div class="conteiner">
              <label for="pregunta1">Cuenta con el análisis de los factores de riesgo ergonómico debido al manejo manual de cargas.
            </label>
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.1 El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas que elaboren los centros de trabajo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta2">La identificación de las actividades que conllevan factores de riesgo ergonómico debido a manejo manual de cargas, es decir, que implican levantar, bajar, transportar, empujar y/o jalar cargas.
            </label>
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

      <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.2 La identificación de los factores de riesgo ergonómico debido al manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta3">La estimación del nivel de riesgo de las actividades identificadas.
          </label>
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

      <hr class="styled-separator">
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.3 La estimación del nivel de riesgo debido al manejo manual de cargas de las actividades.
        </label>
      </div>
      <hr class="styled-separator">

      <div class="conteiner">
        <label for="pregunta4">La evaluación específica del riesgo, cuando el resultado de la estimación del riesgo no permita estimar el riesgo o determinar condiciones aceptables y/o cuando a pesar de la 
implementación de medidas correctivas siga existiendo algún peligro para el trabajador.
        </label>
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


      <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.4 El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas deberá constar en un informe.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta5">La identificación de los factores de riesgo ergonómico debido al manejo manual de cargas.
          </label>
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

      <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5 El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas deberá estar disponible para los trabajadores que participen o realicen actividades de manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta6">La identificación de la actividad, tarea o puesto de trabajo que conllevan manejo manual de cargas: levantar, bajar, empujar, jalar, transportar y/o estibar materiales.
          </label>
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

        <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.7 El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas deberá integrarse al diagnóstico de seguridad y salud en el trabajo, a que se refiere la NOM-030-STPS-2009, o las que la sustituyan.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta7">La descripción de las actividades.
        </label>
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

      <div class="conteiner">
        <label for="pregunta8">Los trabajadores involucrados en la realización de estas actividades.
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
        <label for="pregunta9">La frecuencia con que se realiza la actividad.
        </label>
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

      <div class="conteiner">
        <label for="pregunta10">La estimación del nivel de riesgo debido al manejo manual de cargas de las actividades.
          </label>
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
        <label for="pregunta11">Conforme al estimación del riesgo por el levantamiento y transporte de cargas, y operaciones de carga manual en grupo de trabajo, para actividades que implican levantar, bajar, o
 transportar cargas.
        </label>
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
        <label for="pregunta12">De acuerdo con la estimación del riesgo por empuje y arrastre de cargas con o sin equipo auxiliar, para actividades que implican empujar y jalar materiales, con o sin la ayuda de equipo auxiliar.

          </label>
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
        <label for="pregunta13">Cuenta con un informe del análisis de los factores de riesgo ergonómico debido al manejo manual de cargas.
        </label>
        <div class="radio-buttons">
          <input type="radio" id="p13-0" name="pregunta13" value="0">
          <label for="p13-0">0</label>
          <input type="radio" id="p13-1" name="pregunta13" value="1">
          <label for="p13-1">1</label>
          <input type="radio" id="p13-2" name="pregunta13" value="2">
          <label for="p13-2">2</label>
          <input type="radio" id="p13-3" name="pregunta13" value="3">
          <label for="p13-3">3</label>
          <input type="radio" id="p13-4" name="pregunta13" value="4">
          <label for="p13-4">4</label>
        </div>
        <textarea id="comentario13" name="comentario13" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta14">Las actividades realizadas en el centro de trabajo que conllevan exposición a factores de riesgo ergonómico debido al manejo manual de cargas sujetas al análisis.
            
          </label>
        <div class="radio-buttons">
          <input type="radio" id="p14-0" name="pregunta14" value="0">
          <label for="p14-0">0</label>
          <input type="radio" id="p14-1" name="pregunta14" value="1">
          <label for="p14-1">1</label>
          <input type="radio" id="p14-2" name="pregunta14" value="2">
          <label for="p14-2">2</label>
          <input type="radio" id="p14-3" name="pregunta14" value="3">
          <label for="p14-3">3</label>
          <input type="radio" id="p14-4" name="pregunta14" value="4">
          <label for="p14-4">4</label>
        </div>
        <textarea id="comentario14" name="comentario14" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta15">El resultado de la evaluación específica, cuando se determine que no se requiere esta evaluación, señala porqué se llegó a esa conclusión.
          </label>
        <div class="radio-buttons">
          <input type="radio" id="p15-0" name="pregunta15" value="0">
          <label for="p15-0">0</label>
          <input type="radio" id="p15-1" name="pregunta15" value="1">
          <label for="p15-1">1</label>
          <input type="radio" id="p15-2" name="pregunta15" value="2">
          <label for="p15-2">2</label>
          <input type="radio" id="p15-3" name="pregunta15" value="3">
          <label for="p15-3">3</label>
          <input type="radio" id="p15-4" name="pregunta15" value="4">
          <label for="p15-4">4</label>
        </div>
        <textarea id="comentario15" name="comentario15" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta16">Las conclusiones derivadas de la identificación y análisis.
            
          </label>
        <div class="radio-buttons">
          <input type="radio" id="p16-0" name="pregunta16" value="0">
          <label for="p16-0">0</label>
          <input type="radio" id="p16-1" name="pregunta16" value="1">
          <label for="p16-1">1</label>
          <input type="radio" id="p16-2" name="pregunta16" value="2">
          <label for="p16-2">2</label>
          <input type="radio" id="p16-3" name="pregunta16" value="3">
          <label for="p16-3">3</label>
          <input type="radio" id="p16-4" name="pregunta16" value="4">
          <label for="p16-4">4</label>
        </div>
        <textarea id="comentario16" name="comentario16" placeholder="Comentario"></textarea>
      </div>

        <!-- Pregunta 17 -->
        <div class="conteiner">
          <label for="pregunta17">Las recomendaciones y acciones de prevención y/o control.

            </label>
          <div class="radio-buttons">
            <input type="radio" id="p17-0" name="pregunta17" value="0">
            <label for="p17-0">0</label>
            <input type="radio" id="p17-1" name="pregunta17" value="1">
            <label for="p17-1">1</label>
            <input type="radio" id="p17-2" name="pregunta17" value="2">
            <label for="p17-2">2</label>
            <input type="radio" id="p17-3" name="pregunta17" value="3">
            <label for="p17-3">3</label>
            <input type="radio" id="p17-4" name="pregunta17" value="4">
            <label for="p17-4">4</label>
          </div>
          <textarea id="comentario17" name="comentario17" placeholder="Comentario"></textarea>
        </div>
      
        <!-- Pregunta 18 -->
        <div class="conteiner">
          <label for="pregunta18">Los datos del responsable de la elaboración.
          </label>
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
      
        <!-- Pregunta 19 -->
        <div class="conteiner">
          <label for="pregunta19">El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas se revisa, actualiza o modifica.
            </label>
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
      

        <!-- Pregunta 20 -->
        <div class="conteiner">
          <label for="pregunta20">Se modifican las condiciones en las que se realiza la actividad.
          </label>
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

        <!-- Pregunta 21 -->
        <div class="conteiner">
          <label for="pregunta21">Se detecta alguna alteración a la salud de los trabajadores ocupacionalmente expuestos o se presenta un trastorno músculo-esquelético laboral.

          </label>
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
          <label for="pregunta22">El análisis de los factores de riesgo ergonómico debido al manejo manual de cargas está integrado al diagnóstico de seguridad y salud en el trabajo, a que se refiere la NOM-030-STPS-2009, 
o las que la sustituyan.

          </label>
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

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.2 Adoptar medidas de prevención y/o control para reducir o eliminar los factores de riesgo ergonómico en el centro de trabajo debido al manejo manual de cargas, de acuerdo con medidas de prevención y/o control de los factores de riesgo ergonómico por el manejo manual de cargas
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->
        
        <div class="conteiner">
          <label for="pregunta23">Realiza las actividades de manejo manual de cargas con trabajadores que cuentan con aptitud física avalada por un médico o a través de una institución de seguridad 
social o privada.
          </label>
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.1 Las actividades de manejo manual de cargas deberán ser realizadas por trabajadores que cuenten con aptitud física avalada por un médico o a través de una institución de seguridad social o privada.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta24">Cuenta con un procedimiento de seguridad para desarrollar actividades que involucran manejo manual de cargas.
            </label>
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.2 La identificación y análisis de los factores de riesgo psicosocial.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta25">La identificación de los factores de riesgo psicosocial y análisis.
            </label>
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.2 Para desarrollar actividades que involucren manejo manual de cargas, se deberá contar con un procedimiento de seguridad.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta26">La descripción de la técnica adecuada para realizar las actividades de forma segura, considerando: la intensidad, distancias: horizontal y/o vertical, repetición, frecuencia, duración, y 
posturas con que deben efectuarse las actividades.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p26-0" name="pregunta26" value="0">
            <label for="p26-0">0</label>
            <input type="radio" id="p26-1" name="pregunta26" value="1">
            <label for="p26-1">1</label>
            <input type="radio" id="p26-2" name="pregunta26" value="2">
            <label for="p26-2">2</label>
            <input type="radio" id="p26-3" name="pregunta26" value="3">
            <label for="p26-3">3</label>
            <input type="radio" id="p26-4" name="pregunta26" value="4">
            <label for="p26-4">4</label>
          </div>
          <textarea id="comentario26" name="comentario26" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta27">Las medidas de seguridad y, en su caso, de control por aplicar en el desarrollo de las actividades.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p20-0" name="pregunta27" value="0">
            <label for="p27-0">0</label>
            <input type="radio" id="p27-1" name="pregunta27" value="1">
            <label for="p27-1">1</label>
            <input type="radio" id="p27-2" name="pregunta27" value="2">
            <label for="p27-2">2</label>
            <input type="radio" id="p27-3" name="pregunta27" value="3">
            <label for="p27-3">3</label>
            <input type="radio" id="p27-4" name="pregunta27" value="4">
            <label for="p27-4">4</label>
          </div>
          <textarea id="comentario27" name="comentario27" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta28">Las características de la carga, por ejemplo, dimensiones, agarre, forma, peso, estabilidad.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p28-0" name="pregunta28" value="0">
            <label for="p28-0">0</label>
            <input type="radio" id="p28-1" name="pregunta28" value="1">
            <label for="p28-1">1</label>
            <input type="radio" id="p28-2" name="pregunta28" value="2">
            <label for="p28-2">2</label>
            <input type="radio" id="p28-3" name="pregunta28" value="3">
            <label for="p28-3">3</label>
            <input type="radio" id="p28-4" name="pregunta28" value="4">
            <label for="p28-4">4</label>
          </div>
          <textarea id="comentario28" name="comentario28" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta29">La posición de los materiales o contenedores a manejar, con respecto a la de los trabajadores: levantamiento o descenso de la carga al piso, o a una cierta altura.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p29-0" name="pregunta29" value="0">
            <label for="p29-0">0</label>
            <input type="radio" id="p29-1" name="pregunta29" value="1">
            <label for="p29-1">1</label>
            <input type="radio" id="p29-2" name="pregunta29" value="2">
            <label for="p29-2">2</label>
            <input type="radio" id="p29-3" name="pregunta29" value="3">
            <label for="p29-3">3</label>
            <input type="radio" id="p29-4" name="pregunta29" value="4">
            <label for="p29-4">4</label>
          </div>
          <textarea id="comentario29" name="comentario29" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta30">Las condiciones del ambiente que puedan incrementar el esfuerzo del trabajador.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p30-0" name="pregunta30" value="0">
            <label for="p30-0">0</label>
            <input type="radio" id="p30-1" name="pregunta30" value="1">
            <label for="p30-1">1</label>
            <input type="radio" id="p30-2" name="pregunta30" value="2">
            <label for="p30-2">2</label>
            <input type="radio" id="p30-3" name="pregunta30" value="3">
            <label for="p30-3">3</label>
            <input type="radio" id="p30-4" name="pregunta30" value="4">
            <label for="p30-4">4</label>
          </div>
          <textarea id="comentario30" name="comentario30" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta31">La trayectoria para el transporte de las cargas, en su caso, subiendo o bajando escaleras, rampas inclinadas, plataformas, vehículos, tránsito sobre superficies resbalosas o con obstáculos 
que puedan generar riesgo de caídas.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p31-0" name="pregunta31" value="0">
            <label for="p31-0">0</label>
            <input type="radio" id="p31-1" name="pregunta31" value="1">
            <label for="p31-1">1</label>
            <input type="radio" id="p31-2" name="pregunta31" value="2">
            <label for="p31-2">2</label>
            <input type="radio" id="p31-3" name="pregunta31" value="3">
            <label for="p31-3">3</label>
            <input type="radio" id="p31-4" name="pregunta31" value="4">
            <label for="p31-4">4</label>
          </div>
          <textarea id="comentario31" name="comentario31" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta32">Las características de materiales que se manejen, en su caso, con énfasis en los peligrosos tales como: tóxicos, irritantes, corrosivos, inflamables, explosivos, reactivos, con riesgo biológico, 
temperatura elevada o abatida, entre otros.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p32-0" name="pregunta32" value="0">
            <label for="p32-0">0</label>
            <input type="radio" id="p32-1" name="pregunta32" value="1">
            <label for="p32-1">1</label>
            <input type="radio" id="p32-2" name="pregunta32" value="2">
            <label for="p32-2">2</label>
            <input type="radio" id="p32-3" name="pregunta32" value="3">
            <label for="p32-3">3</label>
            <input type="radio" id="p32-4" name="pregunta32" value="4">
            <label for="p32-4">4</label>
          </div>
          <textarea id="comentario32" name="comentario32" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.2 Adoptar medidas de prevención y/o control para reducir o eliminar los factores de riesgo ergonómico en el centro de trabajo debido al manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta33">Al realizar un recorrido en el centro de trabajo se constata que para reducir o eliminar los factores de riesgo ergonómico debido al manejo de materiales de forma manual adopta las medidas 
de prevención y/o seguridad.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p33-0" name="pregunta33" value="0">
            <label for="p33-0">0</label>
            <input type="radio" id="p33-1" name="pregunta33" value="1">
            <label for="p33-1">1</label>
            <input type="radio" id="p33-2" name="pregunta33" value="2">
            <label for="p33-2">2</label>
            <input type="radio" id="p33-3" name="pregunta33" value="3">
            <label for="p33-3">3</label>
            <input type="radio" id="p33-4" name="pregunta33" value="4">
            <label for="p33-4">4</label>
          </div>
          <textarea id="comentario33" name="comentario33" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.3 Para realizar actividades que impliquen manejo manual de cargas se deberán adoptar las medidas de prevención o de seguridad.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta34">Supervisa que se realicen en condiciones seguras, con base en el procedimiento.

          </label>
          <div class="radio-buttons">
            <input type="radio" id="p34-0" name="pregunta34" value="0">
            <label for="p34-0">0</label>
            <input type="radio" id="p34-1" name="pregunta34" value="1">
            <label for="p34-1">1</label>
            <input type="radio" id="p34-2" name="pregunta34" value="2">
            <label for="p34-2">2</label>
            <input type="radio" id="p34-3" name="pregunta34" value="3">
            <label for="p34-3">3</label>
            <input type="radio" id="p34-4" name="pregunta34" value="4">
            <label for="p34-4">4</label>
          </div>
          <textarea id="comentario34" name="comentario34" placeholder="Comentario"></textarea>
        </div>


        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.4 Los centros de trabajo deberán adoptar medidas de control sólo en aquellos casos en que el análisis de los factores de riesgo ergonómico así lo indique. Las medidas de control técnicas y/o administrativas de los factores de riesgo ergonómico deberán aplicarse mediante un Programa de ergonomía para el manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta35">Mantiene las áreas de tránsito y de trabajo libres de obstáculos.

            </label>
          <div class="radio-buttons">
            <input type="radio" id="p35-0" name="pregunta35" value="0">
            <label for="p35-0">0</label>
            <input type="radio" id="p35-1" name="pregunta35" value="1">
            <label for="p35-1">1</label>
            <input type="radio" id="p35-2" name="pregunta35" value="2">
            <label for="p35-2">2</label>
            <input type="radio" id="p35-3" name="pregunta35" value="3">
            <label for="p35-3">3</label>
            <input type="radio" id="p35-4" name="pregunta35" value="4">
            <label for="p35-4">4</label>
          </div>
          <textarea id="comentario35" name="comentario35" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.6 Las medidas de control administrativas se deberán adoptar con el fin de proteger la salud del personal ocupacionalmente expuesto.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta36">Conserva orden y limpieza en el lugar de trabajo.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p36-0" name="pregunta36" value="0">
            <label for="p36-0">0</label>
            <input type="radio" id="p36-1" name="pregunta36" value="1">
            <label for="p36-1">1</label>
            <input type="radio" id="p36-2" name="pregunta36" value="2">
            <label for="p36-2">2</label>
            <input type="radio" id="p36-3" name="pregunta36" value="3">
            <label for="p36-3">3</label>
            <input type="radio" id="p36-4" name="pregunta36" value="4">
            <label for="p36-4">4</label>
          </div>
          <textarea id="comentario36" name="comentario36" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.7 Las medidas de control técnicas por adoptar podrán comprender, entre otras, las siguientes:
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta37">Establece, en su caso, períodos de descanso.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p37-0" name="pregunta37" value="0">
            <label for="p37-0">0</label>
            <input type="radio" id="p37-1" name="pregunta37" value="1">
            <label for="p37-1">1</label>
            <input type="radio" id="p37-2" name="pregunta37" value="2">
            <label for="p37-2">2</label>
            <input type="radio" id="p37-3" name="pregunta37" value="3">
            <label for="p37-3">3</label>
            <input type="radio" id="p37-4" name="pregunta37" value="4">
            <label for="p37-4">4</label>
          </div>
          <textarea id="comentario37" name="comentario37" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">La modificación de los procedimientos de trabajo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta38">Asegura que la carga tenga elementos de sujeción.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p38-0" name="pregunta38" value="0">
            <label for="p38-0">0</label>
            <input type="radio" id="p38-1" name="pregunta38" value="1">
            <label for="p38-1">1</label>
            <input type="radio" id="p38-2" name="pregunta38" value="2">
            <label for="p38-2">2</label>
            <input type="radio" id="p38-3" name="pregunta38" value="3">
            <label for="p38-3">3</label>
            <input type="radio" id="p38-4" name="pregunta38" value="4">
            <label for="p38-4">4</label>
          </div>
          <textarea id="comentario38" name="comentario38" placeholder="Comentario"></textarea>
        </div>


        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">La modificación, adecuación o sustitución de las instalaciones, procesos, maquinaria y equipos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta39">Revisa que las actividades aledañas no impliquen un riesgo para el trabajador que las realiza.

          </label>
          <div class="radio-buttons">
            <input type="radio" id="p39-0" name="pregunta39" value="0">
            <label for="p39-0">0</label>
            <input type="radio" id="p39-1" name="pregunta39" value="1">
            <label for="p39-1">1</label>
            <input type="radio" id="p39-2" name="pregunta39" value="2">
            <label for="p39-2">2</label>
            <input type="radio" id="p39-3" name="pregunta39" value="3">
            <label for="p39-3">3</label>
            <input type="radio" id="p39-4" name="pregunta39" value="4">
            <label for="p39-4">4</label>
          </div>
          <textarea id="comentario39" name="comentario39" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">El acondicionamiento, redistribución física de las instalaciones, procesos, maquinaria y equipos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta40">Aplica las medidas de seguridad que se requieren conforme a los materiales, procesos, equipos, herramienta y maquinaria que se utilizan.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p40-0" name="pregunta40" value="0">
            <label for="p40-0">0</label>
            <input type="radio" id="p40-1" name="pregunta40" value="1">
            <label for="p40-1">1</label>
            <input type="radio" id="p40-2" name="pregunta40" value="2">
            <label for="p40-2">2</label>
            <input type="radio" id="p40-3" name="pregunta40" value="3">
            <label for="p40-3">3</label>
            <input type="radio" id="p40-4" name="pregunta40" value="4">
            <label for="p40-4">4</label>
          </div>
          <textarea id="comentario40" name="comentario40" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta41">Las medidas de seguridad para el levantamiento y transporte de cargas.

          </label>
          <div class="radio-buttons">
            <input type="radio" id="p41-0" name="pregunta41" value="0">
            <label for="p41-0">0</label>
            <input type="radio" id="p41-1" name="pregunta41" value="1">
            <label for="p41-1">1</label>
            <input type="radio" id="p41-2" name="pregunta41" value="2">
            <label for="p41-2">2</label>
            <input type="radio" id="p41-3" name="pregunta41" value="3">
            <label for="p41-3">3</label>
            <input type="radio" id="p41-4" name="pregunta41" value="4">
            <label for="p41-4">4</label>
          </div>
          <textarea id="comentario41" name="comentario41" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta42">Prohíbe que las mujeres en estado de gestación, y durante las primeras 10 semanas posteriores al parto, realicen actividades de manejo de cargas de forma manual que implican cargas de 
más de 10 kg, y determina la masa máxima real que podrán cargar considerando su estado de salud, así como factores tales como frecuencia, distancia, posición de la carga, agarre, masa 
acumulada.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p42-0" name="pregunta42" value="0">
            <label for="p42-0">0</label>
            <input type="radio" id="p42-1" name="pregunta42" value="1">
            <label for="p42-1">1</label>
            <input type="radio" id="p42-2" name="pregunta42" value="2">
            <label for="p42-2">2</label>
            <input type="radio" id="p42-3" name="pregunta42" value="3">
            <label for="p42-3">3</label>
            <input type="radio" id="p42-4" name="pregunta42" value="4">
            <label for="p42-4">4</label>
          </div>
          <textarea id="comentario42" name="comentario42" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta43">Verifica que las cargas no rebasan las masas.
            
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p43-0" name="pregunta43" value="0">
            <label for="p43-0">0</label>
            <input type="radio" id="p43-1" name="pregunta43" value="1">
            <label for="p43-1">1</label>
            <input type="radio" id="p43-2" name="pregunta43" value="2">
            <label for="p43-2">2</label>
            <input type="radio" id="p43-3" name="pregunta43" value="3">
            <label for="p43-3">3</label>
            <input type="radio" id="p43-4" name="pregunta43" value="4">
            <label for="p43-4">4</label>
          </div>
          <textarea id="comentario43" name="comentario43" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta44">Determina la masa máxima real que cargan los trabajadores considerando factores tales como frecuencia, distancia, posición de la carga, agarre, masa acumulada, entre otros, y en 
ningún caso rebasa el límite indicado.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p44-0" name="pregunta44" value="0">
            <label for="p44-0">0</label>
            <input type="radio" id="p44-1" name="pregunta44" value="1">
            <label for="p44-1">1</label>
            <input type="radio" id="p44-2" name="pregunta44" value="2">
            <label for="p44-2">2</label>
            <input type="radio" id="p44-3" name="pregunta44" value="3">
            <label for="p44-3">3</label>
            <input type="radio" id="p44-4" name="pregunta44" value="4">
            <label for="p44-4">4</label>
          </div>
          <textarea id="comentario44" name="comentario44" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta45">Efectúa el manejo manual de cargas cuya masa sea superior a lo determinado o su longitud dificulta el transporte.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p45-0" name="pregunta45" value="0">
            <label for="p45-0">0</label>
            <input type="radio" id="p45-1" name="pregunta45" value="1">
            <label for="p45-1">1</label>
            <input type="radio" id="p45-2" name="pregunta45" value="2">
            <label for="p45-2">2</label>
            <input type="radio" id="p45-3" name="pregunta45" value="3">
            <label for="p45-3">3</label>
            <input type="radio" id="p45-4" name="pregunta45" value="4">
            <label for="p45-4">4</label>
          </div>
          <textarea id="comentario45" name="comentario45" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta46">La integración de grupos de carga (considerando que la capacidad de carga de un equipo de dos personas será dos terceras partes de la suma de sus capacidades individuales, y para un equipo 
de tres personas, la capacidad de carga será la mitad de la suma de sus capacidades individuales, por ejemplo, para dos personas la capacidad de carga no sería de 50 kg, serian aproximadamente 
34 kg) y asegurar que exista coordinación y comunicación entre los miembros de éste.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p46-0" name="pregunta46" value="0">
            <label for="p46-0">0</label>
            <input type="radio" id="p46-1" name="pregunta46" value="1">
            <label for="p46-1">1</label>
            <input type="radio" id="p46-2" name="pregunta46" value="2">
            <label for="p46-2">2</label>
            <input type="radio" id="p46-3" name="pregunta46" value="3">
            <label for="p46-3">3</label>
            <input type="radio" id="p46-4" name="pregunta46" value="4">
            <label for="p46-4">4</label>
          </div>
          <textarea id="comentario46" name="comentario46" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta47">La utilización de equipos auxiliares manuales (carretillas, diablos, patines, etc.), o bien utilizar maquinaria.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p47-0" name="pregunta47" value="0">
            <label for="p47-0">0</label>
            <input type="radio" id="p47-1" name="pregunta47" value="1">
            <label for="p47-1">1</label>
            <input type="radio" id="p47-2" name="pregunta47" value="2">
            <label for="p47-2">2</label>
            <input type="radio" id="p47-3" name="pregunta47" value="3">
            <label for="p47-3">3</label>
            <input type="radio" id="p47-4" name="pregunta47" value="4">
            <label for="p47-4">4</label>
          </div>
          <textarea id="comentario47" name="comentario47" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta48">La división de las cargas en bultos, envases, sacos o paquetes más pequeños y ligeros.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p48-0" name="pregunta48" value="0">
            <label for="p48-0">0</label>
            <input type="radio" id="p48-1" name="pregunta48" value="1">
            <label for="p48-1">1</label>
            <input type="radio" id="p48-2" name="pregunta48" value="2">
            <label for="p48-2">2</label>
            <input type="radio" id="p48-3" name="pregunta48" value="3">
            <label for="p48-3">3</label>
            <input type="radio" id="p48-4" name="pregunta48" value="4">
            <label for="p48-4">4</label>
          </div>
          <textarea id="comentario48" name="comentario48" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta49">Traslada los barriles o tambos, a través del uso de maquinaria o equipo auxiliar, cuando se trasportan rodando y superan una masa de 400 kg o cuando se trasladan girando sobre su base y su 
masa es mayor a 80 kg.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p49-0" name="pregunta49" value="0">
            <label for="p49-0">0</label>
            <input type="radio" id="p49-1" name="pregunta49" value="1">
            <label for="p49-1">1</label>
            <input type="radio" id="p49-2" name="pregunta49" value="2">
            <label for="p49-2">2</label>
            <input type="radio" id="p49-3" name="pregunta49" value="3">
            <label for="p49-3">3</label>
            <input type="radio" id="p49-4" name="pregunta49" value="4">
            <label for="p49-4">4</label>
          </div>
          <textarea id="comentario49" name="comentario49" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta50">Proporciona la ropa y el equipo de protección personal, conforme a lo previsto por la NOM-017-STPS-2008, o las que la sustituyan, a los trabajadores que realizan actividades de carga.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p50-0" name="pregunta50" value="0">
            <label for="p50-0">0</label>
            <input type="radio" id="p50-1" name="pregunta50" value="1">
            <label for="p50-1">1</label>
            <input type="radio" id="p50-2" name="pregunta50" value="2">
            <label for="p50-2">2</label>
            <input type="radio" id="p50-3" name="pregunta50" value="3">
            <label for="p50-3">3</label>
            <input type="radio" id="p50-4" name="pregunta50" value="4">
            <label for="p50-4">4</label>
          </div>
          <textarea id="comentario50" name="comentario50" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta51">Materiales o contenedores con aristas cortantes, rebabas, astillas, puntas agudas, clavos u otros salientes peligrosos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p51-0" name="pregunta51" value="0">
            <label for="p51-0">0</label>
            <input type="radio" id="p51-1" name="pregunta51" value="1">
            <label for="p51-1">1</label>
            <input type="radio" id="p51-2" name="pregunta51" value="2">
            <label for="p51-2">2</label>
            <input type="radio" id="p51-3" name="pregunta51" value="3">
            <label for="p51-3">3</label>
            <input type="radio" id="p51-4" name="pregunta51" value="4">
            <label for="p51-4">4</label>
          </div>
          <textarea id="comentario51" name="comentario51" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta52">Materiales con temperaturas extremas.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p52-0" name="pregunta52" value="0">
            <label for="p52-0">0</label>
            <input type="radio" id="p52-1" name="pregunta52" value="1">
            <label for="p52-1">1</label>
            <input type="radio" id="p52-2" name="pregunta52" value="2">
            <label for="p52-2">2</label>
            <input type="radio" id="p52-3" name="pregunta52" value="3">
            <label for="p52-3">3</label>
            <input type="radio" id="p52-4" name="pregunta52" value="4">
            <label for="p52-4">4</label>
          </div>
          <textarea id="comentario52" name="comentario52" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta53">Contenedores con sustancias irritantes, corrosivas o tóxicas.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p53-0" name="pregunta53" value="0">
            <label for="p53-0">0</label>
            <input type="radio" id="p53-1" name="pregunta53" value="1">
            <label for="p53-1">1</label>
            <input type="radio" id="p53-2" name="pregunta53" value="2">
            <label for="p53-2">2</label>
            <input type="radio" id="p53-3" name="pregunta53" value="3">
            <label for="p53-3">3</label>
            <input type="radio" id="p53-4" name="pregunta53" value="4">
            <label for="p53-4">4</label>
          </div>
          <textarea id="comentario53" name="comentario53" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta54">Asegura que en ningún caso se exceda de 10,000 kg/día de masa acumulada total de levantamiento y transporte manual de cargas, cualquiera que sea la duración de la actividad y sin 
exceder jornadas de trabajo de 8 horas.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p54-0" name="pregunta54" value="0">
            <label for="p54-0">0</label>
            <input type="radio" id="p54-1" name="pregunta54" value="1">
            <label for="p54-1">1</label>
            <input type="radio" id="p54-2" name="pregunta54" value="2">
            <label for="p54-2">2</label>
            <input type="radio" id="p54-3" name="pregunta54" value="3">
            <label for="p54-3">3</label>
            <input type="radio" id="p54-4" name="pregunta54" value="4">
            <label for="p54-4">4</label>
          </div>
          <textarea id="comentario54" name="comentario54" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta55">Las medidas de seguridad para empujar o jalar de cargas, con o sin ayuda de equipo auxiliar.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p55-0" name="pregunta55" value="0">
            <label for="p55-0">0</label>
            <input type="radio" id="p55-1" name="pregunta55" value="1">
            <label for="p55-1">1</label>
            <input type="radio" id="p55-2" name="pregunta55" value="2">
            <label for="p55-2">2</label>
            <input type="radio" id="p55-3" name="pregunta55" value="3">
            <label for="p55-3">3</label>
            <input type="radio" id="p55-4" name="pregunta55" value="4">
            <label for="p55-4">4</label>
          </div>
          <textarea id="comentario55" name="comentario55" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta56">Asegura la estabilidad de la carga durante su traslado.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p56-0" name="pregunta56" value="0">
            <label for="p56-0">0</label>
            <input type="radio" id="p56-1" name="pregunta56" value="1">
            <label for="p56-1">1</label>
            <input type="radio" id="p56-2" name="pregunta56" value="2">
            <label for="p56-2">2</label>
            <input type="radio" id="p56-3" name="pregunta56" value="3">
            <label for="p56-3">3</label>
            <input type="radio" id="p56-4" name="pregunta56" value="4">
            <label for="p56-4">4</label>
          </div>
          <textarea id="comentario56" name="comentario56" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta57">Tiene una visión completa sobre y alrededor de la carga.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p57-0" name="pregunta57" value="0">
            <label for="p57-0">0</label>
            <input type="radio" id="p57-1" name="pregunta57" value="1">
            <label for="p57-1">1</label>
            <input type="radio" id="p57-2" name="pregunta57" value="2">
            <label for="p57-2">2</label>
            <input type="radio" id="p57-3" name="pregunta57" value="3">
            <label for="p57-3">3</label>
            <input type="radio" id="p57-4" name="pregunta57" value="4">
            <label for="p57-4">4</label>
          </div>
          <textarea id="comentario57" name="comentario57" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta58">Evita trayectorias por pisos ranurados, deteriorados o resbalosos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p58-0" name="pregunta58" value="0">
            <label for="p58-0">0</label>
            <input type="radio" id="p58-1" name="pregunta58" value="1">
            <label for="p58-1">1</label>
            <input type="radio" id="p58-2" name="pregunta58" value="2">
            <label for="p58-2">2</label>
            <input type="radio" id="p58-3" name="pregunta58" value="3">
            <label for="p58-3">3</label>
            <input type="radio" id="p58-4" name="pregunta58" value="4">
            <label for="p58-4">4</label>
          </div>
          <textarea id="comentario58" name="comentario58" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta59">Verifica que la carga no exceda la capacidad nominal de las ruedas del equipo auxiliar que se utilice.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p59-0" name="pregunta59" value="0">
            <label for="p59-0">0</label>
            <input type="radio" id="p59-1" name="pregunta59" value="1">
            <label for="p59-1">1</label>
            <input type="radio" id="p59-2" name="pregunta59" value="2">
            <label for="p59-2">2</label>
            <input type="radio" id="p59-3" name="pregunta59" value="3">
            <label for="p59-3">3</label>
            <input type="radio" id="p59-4" name="pregunta59" value="4">
            <label for="p59-4">4</label>
          </div>
          <textarea id="comentario59" name="comentario59" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta60">Revisa que el equipo auxiliar se encuentra en condiciones seguras de operación antes del inicio de las actividades.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p60-0" name="pregunta60" value="0">
            <label for="p60-0">0</label>
            <input type="radio" id="p60-1" name="pregunta60" value="1">
            <label for="p60-1">1</label>
            <input type="radio" id="p60-2" name="pregunta60" value="2">
            <label for="p60-2">2</label>
            <input type="radio" id="p60-3" name="pregunta60" value="3">
            <label for="p60-3">3</label>
            <input type="radio" id="p60-4" name="pregunta60" value="4">
            <label for="p60-4">4</label>
          </div>
          <textarea id="comentario60" name="comentario60" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta61">Comprueba antes de realizar la actividad que la superficie del suelo no se encuentra en malas condiciones o represente un problema para la operación de las ruedas del equipo auxiliar que se utiliza.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p61-0" name="pregunta61" value="0">
            <label for="p61-0">0</label>
            <input type="radio" id="p61-1" name="pregunta61" value="1">
            <label for="p61-1">1</label>
            <input type="radio" id="p61-2" name="pregunta61" value="2">
            <label for="p61-2">2</label>
            <input type="radio" id="p61-3" name="pregunta61" value="3">
            <label for="p61-3">3</label>
            <input type="radio" id="p61-4" name="pregunta61" value="4">
            <label for="p61-4">4</label>
          </div>
          <textarea id="comentario61" name="comentario61" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta62">Revisa, de forma previa, que el espacio para girar o maniobrar es adecuado, en especial en pasillos angostos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p62-0" name="pregunta62" value="0">
            <label for="p62-0">0</label>
            <input type="radio" id="p62-1" name="pregunta62" value="1">
            <label for="p62-1">1</label>
            <input type="radio" id="p62-2" name="pregunta62" value="2">
            <label for="p62-2">2</label>
            <input type="radio" id="p62-3" name="pregunta62" value="3">
            <label for="p62-3">3</label>
            <input type="radio" id="p62-4" name="pregunta62" value="4">
            <label for="p62-4">4</label>
          </div>
          <textarea id="comentario62" name="comentario62" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta63">Asegura que la ropa o el equipo de protección personal permita realizar con seguridad el movimiento.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p63-0" name="pregunta63" value="0">
            <label for="p63-0">0</label>
            <input type="radio" id="p63-1" name="pregunta63" value="1">
            <label for="p63-1">1</label>
            <input type="radio" id="p63-2" name="pregunta63" value="2">
            <label for="p63-2">2</label>
            <input type="radio" id="p63-3" name="pregunta63" value="3">
            <label for="p63-3">3</label>
            <input type="radio" id="p63-4" name="pregunta63" value="4">
            <label for="p63-4">4</label>
          </div>
          <textarea id="comentario63" name="comentario63" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta64">Jala el equipo con ruedas, como el diablo, patín o carretilla en el mismo sentido del ascenso al subir una pendiente, y en sentido opuesto al del descenso al bajar, con el objeto de evitar que la carga 
represente un riesgo.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p64-0" name="pregunta64" value="0">
            <label for="p64-0">0</label>
            <input type="radio" id="p64-1" name="pregunta64" value="1">
            <label for="p64-1">1</label>
            <input type="radio" id="p64-2" name="pregunta64" value="2">
            <label for="p64-2">2</label>
            <input type="radio" id="p64-3" name="pregunta64" value="3">
            <label for="p64-3">3</label>
            <input type="radio" id="p64-4" name="pregunta64" value="4">
            <label for="p64-4">4</label>
          </div>
          <textarea id="comentario64" name="comentario64" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta65">Evita paradas y maniobras frecuentes, cuando se esté jalando o empujando un objeto, el esfuerzo aplicado es continúo evitando movimientos bruscos y de larga duración.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p65-0" name="pregunta65" value="0">
            <label for="p65-0">0</label>
            <input type="radio" id="p65-1" name="pregunta65" value="1">
            <label for="p65-1">1</label>
            <input type="radio" id="p65-2" name="pregunta65" value="2">
            <label for="p65-2">2</label>
            <input type="radio" id="p65-3" name="pregunta65" value="3">
            <label for="p65-3">3</label>
            <input type="radio" id="p65-4" name="pregunta65" value="4">
            <label for="p65-4">4</label>
          </div>
          <textarea id="comentario65" name="comentario65" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta66">Evita la aplicación de fuerzas iniciales y sostenidas de forma frecuente y de tiempo prolongado, con el fin de disminuir o evitar la fatiga.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p66-0" name="pregunta66" value="0">
            <label for="p66-0">0</label>
            <input type="radio" id="p66-1" name="pregunta66" value="1">
            <label for="p66-1">1</label>
            <input type="radio" id="p66-2" name="pregunta66" value="2">
            <label for="p66-2">2</label>
            <input type="radio" id="p66-3" name="pregunta66" value="3">
            <label for="p66-3">3</label>
            <input type="radio" id="p66-4" name="pregunta66" value="4">
            <label for="p66-4">4</label>
          </div>
          <textarea id="comentario66" name="comentario66" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta67">Evita rampas, pendientes o superficies desniveladas en la trayectoria.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p67-0" name="pregunta67" value="0">
            <label for="p67-0">0</label>
            <input type="radio" id="p67-1" name="pregunta67" value="1">
            <label for="p67-1">1</label>
            <input type="radio" id="p67-2" name="pregunta67" value="2">
            <label for="p67-2">2</label>
            <input type="radio" id="p67-3" name="pregunta67" value="3">
            <label for="p67-3">3</label>
            <input type="radio" id="p67-4" name="pregunta67" value="4">
            <label for="p67-4">4</label>
          </div>
          <textarea id="comentario67" name="comentario67" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta68">Elimina los obstáculos y objetos que pueden representar peligro de tropiezo.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p68-0" name="pregunta68" value="0">
            <label for="p68-0">0</label>
            <input type="radio" id="p68-1" name="pregunta68" value="1">
            <label for="p68-1">1</label>
            <input type="radio" id="p68-2" name="pregunta68" value="2">
            <label for="p68-2">2</label>
            <input type="radio" id="p68-3" name="pregunta68" value="3">
            <label for="p68-3">3</label>
            <input type="radio" id="p68-4" name="pregunta68" value="4">
            <label for="p68-4">4</label>
          </div>
          <textarea id="comentario68" name="comentario68" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta69">Las medidas de control sólo en aquellos casos en que el análisis de los factores de riesgo ergonómico así lo indique. Las medidas de control técnicas y/o administrativas de los factores 
de riesgo ergonómico las aplica mediante un Programa de ergonomía, que para tal efecto elaboró.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p69-0" name="pregunta69" value="0">
            <label for="p69-0">0</label>
            <input type="radio" id="p69-1" name="pregunta69" value="1">
            <label for="p69-1">1</label>
            <input type="radio" id="p69-2" name="pregunta69" value="2">
            <label for="p69-2">2</label>
            <input type="radio" id="p69-3" name="pregunta69" value="3">
            <label for="p69-3">3</label>
            <input type="radio" id="p69-4" name="pregunta69" value="4">
            <label for="p69-4">4</label>
          </div>
          <textarea id="comentario69" name="comentario69" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.2 Adoptar medidas de prevención y/o control para reducir o eliminar los factores de riesgo ergonómico en el centro de trabajo debido al manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta70">Presenta evidencia documental de que el programa de ergonomía.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p70-0" name="pregunta70" value="0">
            <label for="p70-0">0</label>
            <input type="radio" id="p70-1" name="pregunta70" value="1">
            <label for="p70-1">1</label>
            <input type="radio" id="p70-2" name="pregunta70" value="2">
            <label for="p70-2">2</label>
            <input type="radio" id="p70-3" name="pregunta70" value="3">
            <label for="p70-3">3</label>
            <input type="radio" id="p70-4" name="pregunta70" value="4">
            <label for="p70-4">4</label>
          </div>
          <textarea id="comentario70" name="comentario70" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.5 El programa de ergonomía para el manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta71">Los puestos de trabajo sujetos al programa.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p71-0" name="pregunta71" value="0">
            <label for="p71-0">0</label>
            <input type="radio" id="p71-1" name="pregunta71" value="1">
            <label for="p71-1">1</label>
            <input type="radio" id="p71-2" name="pregunta71" value="2">
            <label for="p71-2">2</label>
            <input type="radio" id="p71-3" name="pregunta71" value="3">
            <label for="p71-3">3</label>
            <input type="radio" id="p71-4" name="pregunta71" value="4">
            <label for="p71-4">4</label>
          </div>
          <textarea id="comentario71" name="comentario71" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta72">Las medidas de control técnicas y/o administrativas por adoptarse.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p72-0" name="pregunta72" value="0">
            <label for="p72-0">0</label>
            <input type="radio" id="p72-1" name="pregunta72" value="1">
            <label for="p72-1">1</label>
            <input type="radio" id="p72-2" name="pregunta72" value="2">
            <label for="p72-2">2</label>
            <input type="radio" id="p72-3" name="pregunta72" value="3">
            <label for="p72-3">3</label>
            <input type="radio" id="p72-4" name="pregunta72" value="4">
            <label for="p72-4">4</label>
          </div>
          <textarea id="comentario72" name="comentario72" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta73">Las fechas programadas para su realización.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p73-0" name="pregunta73" value="0">
            <label for="p73-0">0</label>
            <input type="radio" id="p73-1" name="pregunta73" value="1">
            <label for="p73-1">1</label>
            <input type="radio" id="p73-2" name="pregunta73" value="2">
            <label for="p73-2">2</label>
            <input type="radio" id="p73-3" name="pregunta73" value="3">
            <label for="p73-3">3</label>
            <input type="radio" id="p73-4" name="pregunta73" value="4">
            <label for="p73-4">4</label>
          </div>
          <textarea id="comentario73" name="comentario73" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta74">El control de los avances de la implementación del programa.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p74-0" name="pregunta74" value="0">
            <label for="p74-0">0</label>
            <input type="radio" id="p74-1" name="pregunta74" value="1">
            <label for="p74-1">1</label>
            <input type="radio" id="p74-2" name="pregunta74" value="2">
            <label for="p74-2">2</label>
            <input type="radio" id="p74-3" name="pregunta74" value="3">
            <label for="p74-3">3</label>
            <input type="radio" id="p74-4" name="pregunta74" value="4">
            <label for="p74-4">4</label>
          </div>
          <textarea id="comentario74" name="comentario74" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta75">El responsable de su ejecución.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p75-0" name="pregunta75" value="0">
            <label for="p75-0">0</label>
            <input type="radio" id="p75-1" name="pregunta75" value="1">
            <label for="p75-1">1</label>
            <input type="radio" id="p75-2" name="pregunta75" value="2">
            <label for="p75-2">2</label>
            <input type="radio" id="p75-3" name="pregunta75" value="3">
            <label for="p75-3">3</label>
            <input type="radio" id="p75-4" name="pregunta75" value="4">
            <label for="p75-4">4</label>
          </div>
          <textarea id="comentario75" name="comentario75" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta76">La evaluación posterior a la aplicación de las medidas de control.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p76-0" name="pregunta76" value="0">
            <label for="p76-0">0</label>
            <input type="radio" id="p76-1" name="pregunta76" value="1">
            <label for="p76-1">1</label>
            <input type="radio" id="p76-2" name="pregunta76" value="2">
            <label for="p76-2">2</label>
            <input type="radio" id="p76-3" name="pregunta76" value="3">
            <label for="p76-3">3</label>
            <input type="radio" id="p76-4" name="pregunta76" value="4">
            <label for="p76-4">4</label>
          </div>
          <textarea id="comentario76" name="comentario76" placeholder="Comentario"></textarea>
        </div>

         <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.3 Efectuar la vigilancia a la salud de los trabajadores ocupacionalmente expuestos conforme a vigilancia a la salud de los trabajadores.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta77">Cuenta con un programa para realizar la vigilancia a la salud de los trabajadores ocupacionalmente expuestos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p77-0" name="pregunta77" value="0">
            <label for="p77-0">0</label>
            <input type="radio" id="p77-1" name="pregunta77" value="1">
            <label for="p77-1">1</label>
            <input type="radio" id="p77-2" name="pregunta77" value="2">
            <label for="p77-2">2</label>
            <input type="radio" id="p77-3" name="pregunta77" value="3">
            <label for="p77-3">3</label>
            <input type="radio" id="p77-4" name="pregunta77" value="4">
            <label for="p77-4">4</label>
          </div>
          <textarea id="comentario77" name="comentario77" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9 Vigilancia a la salud de los trabajadores. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta78">El programa para la vigilancia a la salud de los trabajadores ocupacionalmente expuestos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p78-0" name="pregunta78" value="0">
            <label for="p78-0">0</label>
            <input type="radio" id="p78-1" name="pregunta78" value="1">
            <label for="p78-1">1</label>
            <input type="radio" id="p78-2" name="pregunta78" value="2">
            <label for="p78-2">2</label>
            <input type="radio" id="p78-3" name="pregunta78" value="3">
            <label for="p78-3">3</label>
            <input type="radio" id="p78-4" name="pregunta78" value="4">
            <label for="p78-4">4</label>
          </div>
          <textarea id="comentario78" name="comentario78" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta79">La aplicación de exámenes médicos iniciales para integrar la historia clínica laboral.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p79-0" name="pregunta79" value="0">
            <label for="p79-0">0</label>
            <input type="radio" id="p79-1" name="pregunta79" value="1">
            <label for="p79-1">1</label>
            <input type="radio" id="p79-2" name="pregunta79" value="2">
            <label for="p79-2">2</label>
            <input type="radio" id="p79-3" name="pregunta79" value="3">
            <label for="p79-3">3</label>
            <input type="radio" id="p79-4" name="pregunta79" value="4">
            <label for="p79-4">4</label>
          </div>
          <textarea id="comentario79" name="comentario79" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta80">La práctica de exámenes médicos de acuerdo con la actividad específica de los trabajadores, sujeta al seguimiento clínico anual o a la evidencia de signos o síntomas que denoten un posible trastorno 
músculo-esquelético laboral.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p80-0" name="pregunta80" value="0">
            <label for="p80-0">0</label>
            <input type="radio" id="p80-1" name="pregunta80" value="1">
            <label for="p80-1">1</label>
            <input type="radio" id="p80-2" name="pregunta80" value="2">
            <label for="p80-2">2</label>
            <input type="radio" id="p80-3" name="pregunta80" value="3">
            <label for="p80-3">3</label>
            <input type="radio" id="p80-4" name="pregunta80" value="4">
            <label for="p80-4">4</label>
          </div>
          <textarea id="comentario80" name="comentario80" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta81">Los exámenes médicos se efectúan de conformidad con lo establecido por las normas oficiales mexicanas que al respecto emitan la Secretaría de Salud y/o la Secretaría del Trabajo y Previsión Social, 
y a falta de éstas, los que indique la institución de seguridad social o de salud, el médico de la empresa, o la institución privada que le preste el servicio médico al centro de trabajo laboral.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p81-0" name="pregunta81" value="0">
            <label for="p81-0">0</label>
            <input type="radio" id="p81-1" name="pregunta81" value="1">
            <label for="p81-1">1</label>
            <input type="radio" id="p81-2" name="pregunta81" value="2">
            <label for="p81-2">2</label>
            <input type="radio" id="p81-3" name="pregunta81" value="3">
            <label for="p81-3">3</label>
            <input type="radio" id="p81-4" name="pregunta81" value="4">
            <label for="p81-4">4</label>
          </div>
          <textarea id="comentario81" name="comentario81" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta82">La aplicación de las acciones preventivas y correctivas para la protección de la salud de los trabajadores, con base en los factores de riesgo ergonómico detectados y como resultado de los 
exámenes médicos practicados.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p82-0" name="pregunta82" value="0">
            <label for="p82-0">0</label>
            <input type="radio" id="p82-1" name="pregunta82" value="1">
            <label for="p82-1">1</label>
            <input type="radio" id="p82-2" name="pregunta82" value="2">
            <label for="p82-2">2</label>
            <input type="radio" id="p82-3" name="pregunta82" value="3">
            <label for="p82-3">3</label>
            <input type="radio" id="p82-4" name="pregunta82" value="4">
            <label for="p82-4">4</label>
          </div>
          <textarea id="comentario82" name="comentario82" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta83">La vigilancia a la salud de los trabajadores es efectuada por un médico, con conocimientos en medicina del trabajo.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p83-0" name="pregunta83" value="0">
            <label for="p83-0">0</label>
            <input type="radio" id="p83-1" name="pregunta83" value="1">
            <label for="p83-1">1</label>
            <input type="radio" id="p83-2" name="pregunta83" value="2">
            <label for="p83-2">2</label>
            <input type="radio" id="p83-3" name="pregunta83" value="3">
            <label for="p83-3">3</label>
            <input type="radio" id="p83-4" name="pregunta83" value="4">
            <label for="p83-4">4</label>
          </div>
          <textarea id="comentario83" name="comentario83" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta84">Los exámenes médicos practicados y su registro, así como las acciones preventivas y correctivas para la vigilancia a la salud de los trabajadores, se integran en un expediente clínico que
conserva por un período mínimo de cinco años.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p84-0" name="pregunta84" value="0">
            <label for="p84-0">0</label>
            <input type="radio" id="p84-1" name="pregunta84" value="1">
            <label for="p84-1">1</label>
            <input type="radio" id="p84-2" name="pregunta84" value="2">
            <label for="p84-2">2</label>
            <input type="radio" id="p84-3" name="pregunta84" value="3">
            <label for="p84-3">3</label>
            <input type="radio" id="p84-4" name="pregunta84" value="4">
            <label for="p84-4">4</label>
          </div>
          <textarea id="comentario84" name="comentario84" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta85">Un médico determina la aptitud física de los trabajadores para realizar actividades que conllevan carga manual, y en su caso, determina el período de recuperación.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p85-0" name="pregunta85" value="0">
            <label for="p85-0">0</label>
            <input type="radio" id="p85-1" name="pregunta85" value="1">
            <label for="p85-1">1</label>
            <input type="radio" id="p85-2" name="pregunta85" value="2">
            <label for="p85-2">2</label>
            <input type="radio" id="p85-3" name="pregunta85" value="3">
            <label for="p85-3">3</label>
            <input type="radio" id="p85-4" name="pregunta85" value="4">
            <label for="p85-4">4</label>
          </div>
          <textarea id="comentario85" name="comentario85" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.4 Informar a los trabajadores sobre las posibles alteraciones a la salud por el manejo manual de cargas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta86">Presenta evidencia de que informa a los trabajadores sobre las posibles alteraciones a la salud por el manejo manual de cargas.

            </label>
          <div class="radio-buttons">
            <input type="radio" id="p86-0" name="pregunta86" value="0">
            <label for="p86-0">0</label>
            <input type="radio" id="p86-1" name="pregunta86" value="1">
            <label for="p86-1">1</label>
            <input type="radio" id="p86-2" name="pregunta86" value="2">
            <label for="p86-2">2</label>
            <input type="radio" id="p86-3" name="pregunta86" value="3">
            <label for="p86-3">3</label>
            <input type="radio" id="p86-4" name="pregunta86" value="4">
            <label for="p86-4">4</label>
          </div>
          <textarea id="comentario86" name="comentario86" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
      <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.5 Proporcionar capacitación y adiestramiento al personal ocupacionalmente expuesto sobre los procedimientos de seguridad y las prácticas de trabajo seguro, y en su caso, en las medidas de prevención y/o control.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta87">Proporciona capacitación y adiestramiento al personal ocupacionalmente expuesto sobre los procedimientos de seguridad y las prácticas de trabajo seguro, y en su caso, 
en las medidas de prevención y/o control.

          </label>
          <div class="radio-buttons">
            <input type="radio" id="p87-0" name="pregunta87" value="0">
            <label for="p87-0">0</label>
            <input type="radio" id="p87-1" name="pregunta87" value="1">
            <label for="p87-1">1</label>
            <input type="radio" id="p87-2" name="pregunta87" value="2">
            <label for="p87-2">2</label>
            <input type="radio" id="p87-3" name="pregunta87" value="3">
            <label for="p87-3">3</label>
            <input type="radio" id="p87-4" name="pregunta87" value="4">
            <label for="p87-4">4</label>
          </div>
          <textarea id="comentario87" name="comentario87" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">10 Capacitación y adiestramiento
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta88">La capacitación tiene énfasis en la prevención de riesgos, y con base en las tareas asignadas.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p88-0" name="pregunta88" value="0">
            <label for="p88-0">0</label>
            <input type="radio" id="p88-1" name="pregunta88" value="1">
            <label for="p88-1">1</label>
            <input type="radio" id="p88-2" name="pregunta88" value="2">
            <label for="p88-2">2</label>
            <input type="radio" id="p88-3" name="pregunta88" value="3">
            <label for="p88-3">3</label>
            <input type="radio" id="p88-4" name="pregunta88" value="4">
            <label for="p88-4">4</label>
          </div>
          <textarea id="comentario88" name="comentario88" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta89">La capacitación y adiestramiento consiste en una instrucción teórica, entrenamiento práctico y evaluación de los conocimientos y habilidades adquiridos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p89-0" name="pregunta89" value="0">
            <label for="p89-0">0</label>
            <input type="radio" id="p89-1" name="pregunta89" value="1">
            <label for="p89-1">1</label>
            <input type="radio" id="p89-2" name="pregunta89" value="2">
            <label for="p89-2">2</label>
            <input type="radio" id="p89-3" name="pregunta89" value="3">
            <label for="p89-3">3</label>
            <input type="radio" id="p89-4" name="pregunta89" value="4">
            <label for="p89-4">4</label>
          </div>
          <textarea id="comentario89" name="comentario89" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta90">Los efectos a la salud que puede ocasionar la exposición a los factores de riesgo ergonómico debido al manejo manual de materiales.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p90-0" name="pregunta90" value="0">
            <label for="p90-0">0</label>
            <input type="radio" id="p90-1" name="pregunta90" value="1">
            <label for="p90-1">1</label>
            <input type="radio" id="p90-2" name="pregunta90" value="2">
            <label for="p90-2">2</label>
            <input type="radio" id="p90-3" name="pregunta90" value="3">
            <label for="p90-3">3</label>
            <input type="radio" id="p90-4" name="pregunta90" value="4">
            <label for="p90-4">4</label>
          </div>
          <textarea id="comentario90" name="comentario90" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta91">La forma de reconocer factores de riesgo ergonómico por el manejo manual de cargas, así como riesgos adicionales presentes en el lugar de trabajo.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p91-0" name="pregunta91" value="0">
            <label for="p91-0">0</label>
            <input type="radio" id="p91-1" name="pregunta91" value="1">
            <label for="p91-1">1</label>
            <input type="radio" id="p91-2" name="pregunta91" value="2">
            <label for="p91-2">2</label>
            <input type="radio" id="p91-3" name="pregunta91" value="3">
            <label for="p91-3">3</label>
            <input type="radio" id="p91-4" name="pregunta91" value="4">
            <label for="p91-4">4</label>
          </div>
          <textarea id="comentario91" name="comentario91" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta92">El contenido de la presente Norma, con énfasis en la aplicación de las medidas de seguridad, y en su caso, medidas de control derivadas del análisis de los factores de riesgo ergonómico.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p92-0" name="pregunta92" value="0">
            <label for="p92-0">0</label>
            <input type="radio" id="p92-1" name="pregunta92" value="1">
            <label for="p92-1">1</label>
            <input type="radio" id="p92-2" name="pregunta92" value="2">
            <label for="p92-2">2</label>
            <input type="radio" id="p92-3" name="pregunta92" value="3">
            <label for="p92-3">3</label>
            <input type="radio" id="p92-4" name="pregunta92" value="4">
            <label for="p92-4">4</label>
          </div>
          <textarea id="comentario92" name="comentario92" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta93">La manera de realizar sus actividades en forma segura, a través de los procedimientos de seguridad y/o prácticas seguras.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p93-0" name="pregunta93" value="0">
            <label for="p93-0">0</label>
            <input type="radio" id="p93-1" name="pregunta93" value="1">
            <label for="p93-1">1</label>
            <input type="radio" id="p93-2" name="pregunta93" value="2">
            <label for="p93-2">2</label>
            <input type="radio" id="p93-3" name="pregunta93" value="3">
            <label for="p93-3">3</label>
            <input type="radio" id="p93-4" name="pregunta93" value="4">
            <label for="p93-4">4</label>
          </div>
          <textarea id="comentario93" name="comentario93" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta94">La capacitación y adiestramiento se refuerza por lo menos cada dos años.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p94-0" name="pregunta94" value="0">
            <label for="p94-0">0</label>
            <input type="radio" id="p94-1" name="pregunta94" value="1">
            <label for="p94-1">1</label>
            <input type="radio" id="p94-2" name="pregunta94" value="2">
            <label for="p94-2">2</label>
            <input type="radio" id="p94-3" name="pregunta94" value="3">
            <label for="p94-3">3</label>
            <input type="radio" id="p94-4" name="pregunta94" value="4">
            <label for="p94-4">4</label>
          </div>
          <textarea id="comentario94" name="comentario94" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta95">Se introducen herramientas, equipo nuevo o se modifican las condiciones en las que se desarrollan las actividades.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p95-0" name="pregunta95" value="0">
            <label for="p95-0">0</label>
            <input type="radio" id="p95-1" name="pregunta95" value="1">
            <label for="p95-1">1</label>
            <input type="radio" id="p95-2" name="pregunta95" value="2">
            <label for="p95-2">2</label>
            <input type="radio" id="p95-3" name="pregunta95" value="3">
            <label for="p95-3">3</label>
            <input type="radio" id="p95-4" name="pregunta95" value="4">
            <label for="p95-4">4</label>
          </div>
          <textarea id="comentario95" name="comentario95" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta96">Se evidencian condiciones inseguras en el desarrollo de las actividades o trabajos, y que pudieran derivar en la presencia de factores de riesgo ergonómico.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p96-0" name="pregunta96" value="0">
            <label for="p96-0">0</label>
            <input type="radio" id="p96-1" name="pregunta96" value="1">
            <label for="p96-1">1</label>
            <input type="radio" id="p96-2" name="pregunta96" value="2">
            <label for="p96-2">2</label>
            <input type="radio" id="p96-3" name="pregunta96" value="3">
            <label for="p96-3">3</label>
            <input type="radio" id="p96-4" name="pregunta96" value="4">
            <label for="p96-4">4</label>
          </div>
          <textarea id="comentario96" name="comentario96" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta97">Así lo sugiera la última evaluación aplicada a los trabajadores.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p97-0" name="pregunta97" value="0">
            <label for="p97-0">0</label>
            <input type="radio" id="p97-1" name="pregunta97" value="1">
            <label for="p97-1">1</label>
            <input type="radio" id="p97-2" name="pregunta97" value="2">
            <label for="p97-2">2</label>
            <input type="radio" id="p97-3" name="pregunta97" value="3">
            <label for="p97-3">3</label>
            <input type="radio" id="p97-4" name="pregunta97" value="4">
            <label for="p97-4">4</label>
          </div>
          <textarea id="comentario97" name="comentario97" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta98">Lleva el registro de la capacitación y adiestramiento que proporciona al personal ocupacionalmente expuesto.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p98-0" name="pregunta98" value="0">
            <label for="p98-0">0</label>
            <input type="radio" id="p98-1" name="pregunta98" value="1">
            <label for="p98-1">1</label>
            <input type="radio" id="p98-2" name="pregunta98" value="2">
            <label for="p98-2">2</label>
            <input type="radio" id="p98-3" name="pregunta98" value="3">
            <label for="p98-3">3</label>
            <input type="radio" id="p98-4" name="pregunta98" value="4">
            <label for="p98-4">4</label>
          </div>
          <textarea id="comentario98" name="comentario98" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta99">El nombre y puesto de los trabajadores a los que se les proporcionó.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p99-0" name="pregunta99" value="0">
            <label for="p99-0">0</label>
            <input type="radio" id="p99-1" name="pregunta99" value="1">
            <label for="p99-1">1</label>
            <input type="radio" id="p99-2" name="pregunta99" value="2">
            <label for="p99-2">2</label>
            <input type="radio" id="p99-3" name="pregunta99" value="3">
            <label for="p99-3">3</label>
            <input type="radio" id="p99-4" name="pregunta99" value="4">
            <label for="p99-4">4</label>
          </div>
          <textarea id="comentario99" name="comentario99" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta100">La fecha en que se proporcionó la capacitación.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p100-0" name="pregunta100" value="0">
            <label for="p100-0">0</label>
            <input type="radio" id="p100-1" name="pregunta100" value="1">
            <label for="p100-1">1</label>
            <input type="radio" id="p100-2" name="pregunta100" value="2">
            <label for="p100-2">2</label>
            <input type="radio" id="p100-3" name="pregunta100" value="3">
            <label for="p100-3">3</label>
            <input type="radio" id="p100-4" name="pregunta100" value="4">
            <label for="p100-4">4</label>
          </div>
          <textarea id="comentario100" name="comentario100" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta101">Los temas impartidos.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p101-0" name="pregunta101" value="0">
            <label for="p101-0">0</label>
            <input type="radio" id="p101-1" name="pregunta101" value="1">
            <label for="p101-1">1</label>
            <input type="radio" id="p101-2" name="pregunta101" value="2">
            <label for="p101-2">2</label>
            <input type="radio" id="p101-3" name="pregunta101" value="3">
            <label for="p101-3">3</label>
            <input type="radio" id="p101-4" name="pregunta101" value="4">
            <label for="p101-4">4</label>
          </div>
          <textarea id="comentario101" name="comentario101" placeholder="Comentario"></textarea>
        </div>


        <div class="conteiner">
          <label for="pregunta102">El nombre del instructor y, en su caso, número de registro como agente capacitador ante la Secretaría del Trabajo y Previsión Social.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p102-0" name="pregunta102" value="0">
            <label for="p102-0">0</label>
            <input type="radio" id="p102-1" name="pregunta102" value="1">
            <label for="p102-1">1</label>
            <input type="radio" id="p102-2" name="pregunta102" value="2">
            <label for="p102-2">2</label>
            <input type="radio" id="p102-3" name="pregunta102" value="3">
            <label for="p102-3">3</label>
            <input type="radio" id="p102-4" name="pregunta102" value="4">
            <label for="p102-4">4</label>
          </div>
          <textarea id="comentario102" name="comentario102" placeholder="Comentario"></textarea>
        </div>


        <!-- TERMINA LOS CUESTIONARIOS -->
      
        <input type="submit" name="guardar_n362018" value="Enviar">
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
var totalPreguntas = 102;


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
            name: "NOM-036-STPS-2018",
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