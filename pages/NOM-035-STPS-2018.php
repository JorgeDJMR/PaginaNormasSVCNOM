<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma352018 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma352018 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-035-STPS-2018.HTML</title>
</head>
<body>
    <div class="barrasuperior">
        <h1>NOM-035-STPS-2018</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    
    <form action="guardar_n0352018.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1 Establecer por escrito, implantar, mantener y difundir en el centro de trabajo una política de prevención de
                 riesgos psicosociales que contemple:  La prevención de los factores de riesgo psicosocial. 
                 La prevención de la violencia laboral. La promoción de un entorno organizacional favorable.</label>
        </div>
        <hr class="styled-separator">
        <div>
            <h2>
                Criterio de aceptación
            </h2>
        </div>
          <div class="conteiner">
              <label for="pregunta1">Establece, implanta y mantiene una política de prevención de riesgos psicosociales.</label>
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

        <div class="conteiner">
          <label for="pregunta2">La promoción de un entorno organizacional favorable.</label>
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
          <label for="pregunta3">La prevención de los factores de riesgo psicosocial. 
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

      <div class="conteiner">
        <label for="pregunta4">La prevención de la violencia laboral.
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
        
      <div class="conteiner">
        <label for="pregunta5">Difunde en el centro de trabajo la política de prevención de riesgos psicosociales.
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
        <label class="conteiner">7.1 a) Los centros de trabajo que tengan entre 16 y 50 trabajadores, únicamente deberán realizar la identificación y análisis de los factores de riesgo psicosocial, incluyendo a todos los trabajadores.</label>
      </div>
         <hr class="styled-separator">
         <div>
            <h2>
                Criterio de aceptación
            </h2>
        </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta6">La identificación y análisis de los factores de riesgo psicosocial comprende a todos los trabajadores del centro de trabajo.
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
        <label class="conteiner">7.2 La identificación y análisis de los factores de riesgo psicosocial.</label>
      </div>
         <hr class="styled-separator">
         <div>
            <h2>
                Criterio de aceptación
            </h2>
        </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta7">Las condiciones en el ambiente de trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.4 Los centros de trabajo podrán utilizar para identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
            <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta8">Las cargas de trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.5 Los cuestionarios que desarrolle el centro de trabajo para la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta9">La falta de control sobre el trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.6 La identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá integrarse al diagnóstico de seguridad y salud en el trabajo a que se refiere la NOM-030-STPS-2009, vigente o las que la sustituyan.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta10">Las jornadas de trabajo y rotación de turnos.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.7 El resultado de la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá constar en un informe.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta11">Interferencia en la relación trabajo-familia.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.8 El resultado de la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá estar disponible para consulta de los trabajadores.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta12">Liderazgo y relaciones negativas en el trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.9 La identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá realizarse, al menos, cada dos años.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta13">La violencia laboral.
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
        <label for="pregunta14">Los cuestionarios que comprenden los factores.
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
        <label for="pregunta15">La forma como se realiza la aplicación de los cuestionarios.
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
        <label for="pregunta16">La manera de evaluar los cuestionarios.
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
          <label for="pregunta17">Los niveles y la forma de determinar el riesgo conforme a los resultados de los cuestionarios aplicados.
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
          <label for="pregunta18">La validación fue realizada en trabajadores cuyos centros de trabajo se ubican en el territorio nacional.
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
          <label for="pregunta19">El número de individuos que se utilizó para realizar la validación sea mayor o igual a 10 veces por cada reactivo contemplado inicialmente. 
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
          <label for="pregunta20">Coeficientes de confiabilidad (alfa de Cronbach) superiores a 0.7
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
          <label for="pregunta21">Coeficientes de correlación (Pearson o Spearman), con r mayor a 0.5, y un nivel de significancia mayor o igual a 0.05.
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
          <label for="pregunta22">Tiene validez de constructo mediante análisis factorial confirmatorio.
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

        
        <div class="conteiner">
          <label for="pregunta23">Índice de Bondad de Ajuste, GFI (Goodness of Fit Index), mayor a 0.90.
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


        <div class="conteiner">
          <label for="pregunta24">Residuo cuadrático medio, RMSR (Root Mean Square Residual), cercana a 0 y máximo 0.08.
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


        <div class="conteiner">
          <label for="pregunta25">Error de aproximación cuadrático medio, RMSEA (Root Mean Square Error of Approximation), menor a 0.08.
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

        <div class="conteiner">
          <label for="pregunta26">De ajuste incremental o relativo con el índice de ajuste normado, NFI (Normed Fit Index), mayor a 0.90.
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
          <label for="pregunta27">De parsimonia con el índice Ji cuadrada normada: X2/gl menor o igual a 5.
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
          <label for="pregunta28">Se aplican en población trabajadora de características semejantes a la población trabajadora en que se validó.
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
          <label for="pregunta29">Derivado del recorrido por el centro de trabajo, se identifiquen señalizaciones en los cambios de nivel de los pisos.
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
          <label for="pregunta30">La identificación y análisis de los factores de riesgo psicosocial está integrada al diagnóstico de seguridad y salud en el trabajo a que se refiere la NOM-030-STPS-2009.
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
          <label for="pregunta31">El resultado de la identificación y análisis de los factores de riesgo psicosocial.
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
          <label for="pregunta32">Método utilizado en los centros de trabajo podrán utilizar para identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional.
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

        <div class="conteiner">
          <label for="pregunta33">Resultados obtenidos en los centros de trabajo podrán utilizar para identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional.
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


        <div class="conteiner">
          <label for="pregunta34">El resultado de la identificación y análisis de los factores de riesgo psicosocial está disponible para consulta de los trabajadores.
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


        <div class="conteiner">
          <label for="pregunta35">La identificación y análisis de los factores de riesgo psicosocial se realiza, al menos, cada dos años.
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
            <label class="conteiner">5.3 Identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta36">Realiza la identificación y análisis de los factores de riesgo psicosocial, así como la evaluación del entorno organizacional.
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
            <label class="conteiner">7.1 b) Los centros de trabajo que tengan más de 50 trabajadores, deberán realizar la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta37">La identificación y análisis de los factores de riesgo psicosocial, así como la evaluación del entorno organizacional comprende a todos los trabajadores del centro de trabajo.
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
            <label class="conteiner">7.2 La identificación y análisis de los factores de riesgo psicosocial.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta38">La identificación de los factores de riesgo psicosocial y análisis.
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
            <label class="conteiner">7.3 La evaluación del entorno organizacional favorable deberá comprender:</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta39">Las condiciones en el ambiente de trabajo.
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
            <label class="conteiner">El sentido de pertenencia de los trabajadores a la empresa.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta40">Las cargas de trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La formación para la adecuada realización de las tareas encomendadas.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta41">La falta de control sobre el trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La definición precisa de responsabilidades para los trabajadores.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta42">Las jornadas de trabajo y rotación de turnos.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La participación proactiva y comunicación entre el patrón, sus representantes y los trabajadores.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta43">Interferencia en la relación trabajo-familia.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La distribución adecuada de cargas de trabajo, con jornadas laborales regulares.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta44">Liderazgo y relaciones negativas en el trabajo.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La evaluación y el reconocimiento del desempeño.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->


        <div class="conteiner">
          <label for="pregunta45">La violencia laboral.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.4 Los centros de trabajo podrán utilizar para identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta46">El sentido de pertenencia de los trabajadores a la empresa.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.5 Los cuestionarios que desarrolle el centro de trabajo para la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta47">La formación para la adecuada realización de las tareas encomendadas. 
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.6 La identificación y análisis de los factores de riesgo psicosocial y la evaluación del
                 entorno organizacional deberá integrarse al diagnóstico de seguridad y salud en el trabajo a que se refiere la NOM-030-STPS-2009, vigente o las que la sustituyan.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta48">La definición precisa de responsabilidades para los trabajadores.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.7 El resultado de la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá constar en un informe.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->


        <div class="conteiner">
          <label for="pregunta49">La participación proactiva y comunicación entre el patrón, sus representantes y los trabajadores.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.8 El resultado de la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá estar disponible para consulta de los trabajadores.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta50">La distribución adecuada de cargas de trabajo, con jornadas laborales regulares.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">7.9 La identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional deberá realizarse, al menos, cada dos años.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta51">El método que se utiliza para realizar la identificación y análisis de los factores de riesgo psicosocial.
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
          <label for="pregunta52">Los cuestionarios comprenden los factores.
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
          <label for="pregunta53">La forma como se realiza la aplicación de los cuestionarios.
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
          <label for="pregunta54">La manera de evaluar los cuestionarios.
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
          <label for="pregunta55">Los niveles y la forma de determinar el riesgo conforme a los resultados de los cuestionarios aplicados.
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
          <label for="pregunta56">Los cuestionarios que utiliza el centro de trabajo para la identificación y análisis de los factores de riesgo psicosocial.
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
          <label for="pregunta57">La validación fue realizada en trabajadores cuyos centros de trabajo se ubican en el territorio nacional.
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
          <label for="pregunta58">El número de individuos que se utilizó para realizar la validación sea mayor o igual a 10 veces por cada reactivo contemplado inicialmente.
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
          <label for="pregunta59">Tiene medidas de consistencia interna. 
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
          <label for="pregunta60">Coeficientes de confiabilidad (alfa de Cronbach) superiores a 0.7.
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
          <label for="pregunta61">Coeficientes de correlación (Pearson o Spearman), con r mayor a 0.5, y un nivel de significancia mayor o igual a 0.05.
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
          <label for="pregunta62">Tiene validez de constructo mediante análisis factorial confirmatorio. 
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
          <label for="pregunta63">Índice de Bondad de Ajuste, GFI (Goodness of Fit Index), mayor a 0.90.
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
          <label for="pregunta64">Residuo cuadrático medio, RMSR (Root Mean Square Residual), cercana a 0 y máximo 0.08.
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
          <label for="pregunta65">Error de aproximación cuadrático medio, RMSEA (Root Mean Square Error of Approximation), menor a 0.08.
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
          <label for="pregunta66">De ajuste incremental o relativo con el índice de ajuste normado, NFI (Normed Fit Index), mayor a 0.90.
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
          <label for="pregunta67">De parsimonia con el índice Ji cuadrada normada: X2/gl menor o igual a 5.
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
          <label for="pregunta68">Se aplican en población trabajadora de características semejantes a la población trabajadora.
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
          <label for="pregunta69">La identificación y análisis de los factores de riesgo psicosocial, así como la evaluación del entorno organizacional está integrada al diagnóstico de seguridad y salud en el trabajo a que se refiere la 
            NOM-030-STPS-2009.
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

        <div class="conteiner">
          <label for="pregunta70">El resultado de la identificación y análisis de los factores de riesgo psicosocial, así como de la evaluación del entorno organizacional.
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

        <div class="conteiner">
          <label for="pregunta71">El resultado de la identificación y análisis de los factores de riesgo psicosocial, así como de la evaluación del entorno organizacional está disponible para consulta de los trabajadores.
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
          <label for="pregunta72">La identificación y análisis de los factores de riesgo psicosocial, así como la evaluación del entorno organizacional se realiza, al menos, cada dos años.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.4 Adoptar las medidas para prevenir y controlar los factores de riesgo psicosocial, promover
                 el entorno organizacional favorable, así como para atender las prácticas opuestas al entorno organizacional favorable y los actos de violencia laboral.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta73">Adopta medidas para prevenir los factores de riesgo psicosocial, promover el entorno organizacional favorable, así como para atender las prácticas opuestas al entorno organizacional favorable 
            y los actos de violencia laboral.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">8.1 Para la prevención de los factores de riesgo psicosocial y la violencia laboral, así como para la promoción del entorno organizacional favorable.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta74">Dispone de mecanismos seguros y confidenciales para la recepción de quejas por prácticas opuestas al entorno organizacional favorable y para denunciar actos de violencia laboral.
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

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">8.2 Las acciones y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta75">Realiza acciones que promueven el sentido de pertenencia de los trabajadores a la organización; la capacitación para la adecuada realización de las tareas encomendadas; la 
            definición precisa de responsabilidades para los miembros de la organización; la participación proactiva y comunicación entre sus integrantes; la distribución adecuada de cargas 
            de trabajo, con jornadas laborales regulares conforme a la Ley Federal del Trabajo, y la evaluación y el reconocimiento del desempeño.
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
          <label for="pregunta76">Comprenden las acciones y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.
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

        <div class="conteiner">
          <label for="pregunta77">Acciones para el manejo de conflictos en el trabajo, la distribución de los tiempos de trabajo, y la determinación de prioridades en el trabajo.
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

        <div class="conteiner">
          <label for="pregunta78">Lineamientos para prohibir la discriminación y fomentar la equidad y el respeto.
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
          <label for="pregunta79">Mecanismos para fomentar la comunicación entre supervisores o gerentes y trabajadores, así como entre los trabajadores.
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
          <label for="pregunta80">Instrucciones claras que difunde a los trabajadores para la atención de los problemas que impidan o limitan el desarrollo de su trabajo, cuando éstos se presentan.
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
          <label for="pregunta81">Capacitación y sensibilización de los directivos, gerentes y supervisores para la prevención de los factores de riesgo psicosocial y la promoción de entornos organizacionales favorables, 
            con énfasis en lo señalado en los subincisos 1) al 3) de este inciso, según aplique.
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
          <label for="pregunta82">Revisión y supervisión de que la distribución de la carga de trabajo se realiza de forma equitativa y considerando el número de trabajadores y su capacitación.
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
          <label for="pregunta83">Actividades para planificar el trabajo, considerando el proceso productivo, de manera que se tengan pausas o periodos de descanso, rotación de tareas y otras medidas, a efecto de evitar 
            ritmos de trabajo acelerados.
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
          <label for="pregunta84">Instructivos o procedimientos que definan claramente las tareas y responsabilidades
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
          <label for="pregunta85">Actividades para involucrar a los trabajadores en la toma de decisiones sobre la organización de su trabajo; para que participen en la mejora de las condiciones de trabajo 
            y la productividad siempre que el proceso productivo lo permita y cuenten con la experiencia y capacitación para ello.
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

        <div class="conteiner">
          <label for="pregunta86">Acciones para acordar y mejorar el margen de libertad y control sobre su trabajo por parte de los trabajadores y el patrón, y para impulsar que éstos desarrollen 
            nuevas competencias o habilidades, considerando las limitaciones del proceso productivo.
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



        <div class="conteiner">
          <label for="pregunta87">Reuniones para abordar las áreas de oportunidad de mejora, a efecto de atender los problemas en el lugar de su trabajo y determinar sus soluciones.
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



        <div class="conteiner">
          <label for="pregunta88">La mejora de las relaciones entre trabajadores, supervisores, gerentes y patrones para que puedan obtener apoyo los unos de los otros.
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
          <label for="pregunta89">La realización de reuniones periódicas (semestrales o anuales) de seguimiento a las actividades establecidas para el apoyo social y, en su caso, extraordinarias si ocurren eventos que 
            pongan en riesgo la salud del trabajador o al centro de trabajo.
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
          <label for="pregunta90">La promoción de la ayuda mutua y el intercambio de conocimientos y experiencias entre los trabajadores.
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
          <label for="pregunta91">El fomento de las actividades culturales y del deporte entre sus trabajadores y proporcionarles los equipos y útiles indispensables.
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
          <label for="pregunta92">Acciones para involucrar a los trabajadores en la definición de los horarios de trabajo, cuando las condiciones del trabajo lo permitan.
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
          <label for="pregunta93">Lineamientos para establecer medidas y límites que eviten las jornadas de trabajo superiores a las previstas en la Ley Federal del Trabajo.
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
          <label for="pregunta94">Apoyos a los trabajadores, de manera que puedan atender emergencias familiares, mismas que el trabajador tendrá que comprobar.
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
          <label for="pregunta95">Promoción de actividades de integración familiar en el trabajo, previo acuerdo con los trabajadores.
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
          <label for="pregunta96">El reconocimiento del desempeño sobresaliente (superior al esperado) de los trabajadores.
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
          <label for="pregunta97">La difusión de los logros de los trabajadores sobresalientes.
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
          <label for="pregunta98">En su caso, expresar al trabajador sus posibilidades de desarrollo.
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
          <label for="pregunta99">Difunde información para sensibilizar sobre la violencia laboral, tanto a trabajadores como a directivos, gerentes y supervisores.
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
          <label for="pregunta100">Establece procedimientos de actuación y seguimiento para tratar problemas relacionados con la violencia laboral, y capacitar al responsable de su implementación.
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
          <label for="pregunta101">Informa sobre la forma en que se tendrán que denunciar actos de violencia laboral.
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
          <label for="pregunta102">La comunicación directa y con frecuencia entre el patrón, supervisor o jefe inmediato y los trabajadores sobre cualquier problema que impida o retrase el desarrollo del trabajo. 
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

        <div class="conteiner">
          <label for="pregunta103">La difusión entre los trabajadores de los cambios en la organización o condiciones de trabajo.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p103-0" name="pregunta103" value="0">
            <label for="p103-0">0</label>
            <input type="radio" id="p103-1" name="pregunta103" value="1">
            <label for="p103-1">1</label>
            <input type="radio" id="p103-2" name="pregunta103" value="2">
            <label for="p103-2">2</label>
            <input type="radio" id="p103-3" name="pregunta103" value="3">
            <label for="p103-3">3</label>
            <input type="radio" id="p103-4" name="pregunta103" value="4">
            <label for="p103-4">4</label>
          </div>
          <textarea id="comentario103" name="comentario103" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta104">La oportunidad de que los trabajadores puedan expresar sus opiniones sobre la solución de los problemas o las mejoras de las condiciones de su trabajo para mejorar su desempeño.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p104-0" name="pregunta104" value="0">
            <label for="p104-0">0</label>
            <input type="radio" id="p104-1" name="pregunta104" value="1">
            <label for="p104-1">1</label>
            <input type="radio" id="p104-2" name="pregunta104" value="2">
            <label for="p104-2">2</label>
            <input type="radio" id="p104-3" name="pregunta104" value="3">
            <label for="p104-3">3</label>
            <input type="radio" id="p104-4" name="pregunta104" value="4">
            <label for="p104-4">4</label>
          </div>
          <textarea id="comentario104" name="comentario104" placeholder="Comentario"></textarea>
        </div>

        <div class="conteiner">
          <label for="pregunta105">Analiza la relación capacitación-tareas encomendadas.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p105-0" name="pregunta105" value="0">
            <label for="p105-0">0</label>
            <input type="radio" id="p105-1" name="pregunta105" value="1">
            <label for="p105-1">1</label>
            <input type="radio" id="p105-2" name="pregunta105" value="2">
            <label for="p105-2">2</label>
            <input type="radio" id="p105-3" name="pregunta105" value="3">
            <label for="p105-3">3</label>
            <input type="radio" id="p105-4" name="pregunta105" value="4">
            <label for="p105-4">4</label>
          </div>
          <textarea id="comentario105" name="comentario105" placeholder="Comentario"></textarea>
        </div>



        <div class="conteiner">
          <label for="pregunta106">Da oportunidad a los trabajadores para señalar sus necesidades de capacitación conforme a sus actividades.
          </label>
          <div class="radio-buttons">
            <input type="radio" id="p106-0" name="pregunta106" value="0">
            <label for="p106-0">0</label>
            <input type="radio" id="p106-1" name="pregunta106" value="1">
            <label for="p106-1">1</label>
            <input type="radio" id="p106-2" name="pregunta106" value="2">
            <label for="p106-2">2</label>
            <input type="radio" id="p106-3" name="pregunta106" value="3">
            <label for="p106-3">3</label>
            <input type="radio" id="p106-4" name="pregunta106" value="4">
            <label for="p106-4">4</label>
          </div>
          <textarea id="comentario106" name="comentario106" placeholder="Comentario"></textarea>
        </div>



        <div class="conteiner">
          <label for="pregunta107">Realiza una detección de necesidades de capacitación al menos cada dos años e integrar su resultado en el programa de capacitación.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p107-0" name="pregunta107" value="0">
            <label for="p107-0">0</label>
            <input type="radio" id="p107-1" name="pregunta107" value="1">
            <label for="p107-1">1</label>
            <input type="radio" id="p107-2" name="pregunta107" value="2">
            <label for="p107-2">2</label>
            <input type="radio" id="p107-3" name="pregunta107" value="3">
            <label for="p107-3">3</label>
            <input type="radio" id="p107-4" name="pregunta107" value="4">
            <label for="p107-4">4</label>
          </div>
          <textarea id="comentario107" name="comentario107" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.4 Adoptar las medidas para prevenir y controlar los factores de riesgo psicosocial, promover el entorno
                 organizacional favorable, así como para atender las prácticas opuestas al entorno organizacional favorable y los actos de violencia laboral.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta108">Cuenta con un Programa para la atención de los factores de riesgo psicosocial, y en su caso, para propiciar un entorno organizacional favorable y prevenir actos de violencia laboral, 
            cuando el resultado de la identificación y análisis de los factores de riesgo psicosocial y de la evaluación del entorno organizacional.
            </label>
          <div class="radio-buttons">
            <input type="radio" id="p108-0" name="pregunta108" value="0">
            <label for="p108-0">0</label>
            <input type="radio" id="p108-1" name="pregunta108" value="1">
            <label for="p108-1">1</label>
            <input type="radio" id="p108-2" name="pregunta108" value="2">
            <label for="p108-2">2</label>
            <input type="radio" id="p108-3" name="pregunta108" value="3">
            <label for="p108-3">3</label>
            <input type="radio" id="p108-4" name="pregunta108" value="4">
            <label for="p108-4">4</label>
          </div>
          <textarea id="comentario108" name="comentario108" placeholder="Comentario"></textarea>
        </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">8.3 Los centros de trabajo cuyo resultado de las evaluaciones que determinen la necesidad de desarrollar acciones de control.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

        <div class="conteiner">
            <label for="pregunta109">El Programa para la atención de los factores de riesgo psicosocial, y en su caso, para propiciar un entorno organizacional favorable y prevenir actos de violencia laboral.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p109-0" name="pregunta109" value="0">
              <label for="p109-0">0</label>
              <input type="radio" id="p109-1" name="pregunta109" value="1">
              <label for="p109-1">1</label>
              <input type="radio" id="p109-2" name="pregunta109" value="2">
              <label for="p109-2">2</label>
              <input type="radio" id="p109-3" name="pregunta109" value="3">
              <label for="p109-3">3</label>
              <input type="radio" id="p109-4" name="pregunta109" value="4">
              <label for="p109-4">4</label>
            </div>
            <textarea id="comentario109" name="comentario109" placeholder="Comentario"></textarea>
          </div>


        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">8.5 El tipo de acciones deberán realizarse.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta110">El tipo de acciones y las medidas de control que deberán adoptarse.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p110-0" name="pregunta110" value="0">
              <label for="p110-0">0</label>
              <input type="radio" id="p110-1" name="pregunta110" value="1">
              <label for="p110-1">1</label>
              <input type="radio" id="p110-2" name="pregunta110" value="2">
              <label for="p110-2">2</label>
              <input type="radio" id="p110-3" name="pregunta110" value="3">
              <label for="p110-3">3</label>
              <input type="radio" id="p110-4" name="pregunta110" value="4">
              <label for="p110-4">4</label>
            </div>
            <textarea id="comentario110" name="comentario110" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta111">Las fechas programadas para su realización.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p111-0" name="pregunta111" value="0">
              <label for="p111-0">0</label>
              <input type="radio" id="p111-1" name="pregunta111" value="1">
              <label for="p111-1">1</label>
              <input type="radio" id="p111-2" name="pregunta111" value="2">
              <label for="p111-2">2</label>
              <input type="radio" id="p111-3" name="pregunta111" value="3">
              <label for="p111-3">3</label>
              <input type="radio" id="p111-4" name="pregunta111" value="4">
              <label for="p111-4">4</label>
            </div>
            <textarea id="comentario111" name="comentario111" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta112">El control de los avances de la implementación del programa.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p112-0" name="pregunta112" value="0">
              <label for="p112-0">0</label>
              <input type="radio" id="p112-1" name="pregunta112" value="1">
              <label for="p112-1">1</label>
              <input type="radio" id="p112-2" name="pregunta112" value="2">
              <label for="p112-2">2</label>
              <input type="radio" id="p112-3" name="pregunta112" value="3">
              <label for="p112-3">3</label>
              <input type="radio" id="p112-4" name="pregunta112" value="4">
              <label for="p112-4">4</label>
            </div>
            <textarea id="comentario112" name="comentario112" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta113">La evaluación posterior a la aplicación de las medidas de control.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p113-0" name="pregunta113" value="0">
              <label for="p113-0">0</label>
              <input type="radio" id="p113-1" name="pregunta113" value="1">
              <label for="p113-1">1</label>
              <input type="radio" id="p113-2" name="pregunta113" value="2">
              <label for="p113-2">2</label>
              <input type="radio" id="p113-3" name="pregunta113" value="3">
              <label for="p113-3">3</label>
              <input type="radio" id="p113-4" name="pregunta113" value="4">
              <label for="p113-4">4</label>
            </div>
            <textarea id="comentario113" name="comentario113" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta114">El responsable de su ejecución
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p114-0" name="pregunta114" value="0">
              <label for="p114-0">0</label>
              <input type="radio" id="p114-1" name="pregunta114" value="1">
              <label for="p114-1">1</label>
              <input type="radio" id="p114-2" name="pregunta114" value="2">
              <label for="p114-2">2</label>
              <input type="radio" id="p114-3" name="pregunta114" value="3">
              <label for="p114-3">3</label>
              <input type="radio" id="p114-4" name="pregunta114" value="4">
              <label for="p114-4">4</label>
            </div>
            <textarea id="comentario114" name="comentario114" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta115">Primer nivel: Las acciones se centran en el plano organizacional e implican actuar sobre la política de prevención de riesgos psicosociales del centro de trabajo, la organización 
                del trabajo, las acciones o medios para: disminuir los efectos de los factores de riesgo psicosocial, prevenir la violencia laboral y propiciar el entorno organizacional favorable.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p115-0" name="pregunta115" value="0">
              <label for="p115-0">0</label>
              <input type="radio" id="p115-1" name="pregunta115" value="1">
              <label for="p115-1">1</label>
              <input type="radio" id="p115-2" name="pregunta115" value="2">
              <label for="p115-2">2</label>
              <input type="radio" id="p115-3" name="pregunta115" value="3">
              <label for="p115-3">3</label>
              <input type="radio" id="p115-4" name="pregunta115" value="4">
              <label for="p115-4">4</label>
            </div>
            <textarea id="comentario115" name="comentario115" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta116">Segundo nivel: Las acciones se orientan Las acciones se orientan al plano grupal e implica actuar en la interrelación de los trabajadores o grupos de ellos y la organización del trabajo; su 
                actuación se centra en el tiempo de trabajo, el comportamiento y las interacciones personales, se basan en proporcionar información al trabajador, así como en la sensibilización, (contempla 
                temas como: manejo de conflictos, trabajo en equipo, orientación a resultados, liderazgo, comunicación asertiva, administración del tiempo de trabajo, entre otros), así como reforzar el 
                apoyo social.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p116-0" name="pregunta116" value="0">
              <label for="p116-0">0</label>
              <input type="radio" id="p116-1" name="pregunta116" value="1">
              <label for="p116-1">1</label>
              <input type="radio" id="p116-2" name="pregunta116" value="2">
              <label for="p116-2">2</label>
              <input type="radio" id="p116-3" name="pregunta116" value="3">
              <label for="p116-3">3</label>
              <input type="radio" id="p116-4" name="pregunta116" value="4">
              <label for="p116-4">4</label>
            </div>
            <textarea id="comentario116" name="comentario116" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta117">Tercer nivel: Las acciones se enfocan al plano individual; es decir, se desarrolla cuando se comprueba que existen signos y/o síntomas que denotan alteraciones en la salud, se incluyen intervenciones 
                de tipo clínico o terapéutico.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p117-0" name="pregunta117" value="0">
              <label for="p117-0">0</label>
              <input type="radio" id="p117-1" name="pregunta117" value="1">
              <label for="p117-1">1</label>
              <input type="radio" id="p117-2" name="pregunta117" value="2">
              <label for="p117-2">2</label>
              <input type="radio" id="p117-3" name="pregunta117" value="3">
              <label for="p117-3">3</label>
              <input type="radio" id="p117-4" name="pregunta117" value="4">
              <label for="p117-4">4</label>
            </div>
            <textarea id="comentario117" name="comentario117" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta118">Las intervenciones de tercer nivel que sean de tipo clínico o terapéutico deberán ser realizadas invariablemente por un médico, psicólogo o psiquiatra según corresponda.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p118-0" name="pregunta118" value="0">
              <label for="p118-0">0</label>
              <input type="radio" id="p118-1" name="pregunta118" value="1">
              <label for="p118-1">1</label>
              <input type="radio" id="p118-2" name="pregunta118" value="2">
              <label for="p118-2">2</label>
              <input type="radio" id="p118-3" name="pregunta118" value="3">
              <label for="p118-3">3</label>
              <input type="radio" id="p118-4" name="pregunta118" value="4">
              <label for="p118-4">4</label>
            </div>
            <textarea id="comentario118" name="comentario118" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.5 Identificar a los trabajadores que fueron sujetos a acontecimientos 
                traumáticos severos durante o con motivo del trabajo y, canalizarlos para su atención a la institución de seguridad social o privada, o al médico del centro de trabajo o de la empresa.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta119">Identifica a los trabajadores que fueron sujetos a acontecimientos traumáticos severos durante o con motivo del trabajo.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p119-0" name="pregunta119" value="0">
              <label for="p119-0">0</label>
              <input type="radio" id="p119-1" name="pregunta119" value="1">
              <label for="p119-1">1</label>
              <input type="radio" id="p119-2" name="pregunta119" value="2">
              <label for="p119-2">2</label>
              <input type="radio" id="p119-3" name="pregunta119" value="3">
              <label for="p119-3">3</label>
              <input type="radio" id="p119-4" name="pregunta119" value="4">
              <label for="p119-4">4</label>
            </div>
            <textarea id="comentario119" name="comentario119" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta120">Canaliza a los trabajadores identificados para su atención, a la institución de seguridad social o privada, o con el médico del centro de trabajo o de la empresa.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p120-0" name="pregunta120" value="0">
              <label for="p120-0">0</label>
              <input type="radio" id="p120-1" name="pregunta120" value="1">
              <label for="p120-1">1</label>
              <input type="radio" id="p120-2" name="pregunta120" value="2">
              <label for="p120-2">2</label>
              <input type="radio" id="p120-3" name="pregunta120" value="3">
              <label for="p120-3">3</label>
              <input type="radio" id="p120-4" name="pregunta120" value="4">
              <label for="p120-4">4</label>
            </div>
            <textarea id="comentario120" name="comentario120" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.6 Practicar exámenes médicos y evaluaciones psicológicas a los trabajadores expuestos a violencia laboral y/o a los factores de 
                riesgo psicosocial, cuando existan signos o síntomas que denoten alguna alteración a su salud y el resultado de la identificación y análisis de los factores de riesgo psicosocial.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta121">Presenta evidencia de que practica exámenes médicos y evaluaciones psicológicas al trabajador o a los trabajadores expuestos a violencia laboral y a los factores de riesgo psicosocial, 
                cuando existan signos o síntomas que denoten alteración a su salud y el resultado de la identificación y análisis de los factores de riesgo psicosocial y/o existan quejas de violencia laboral
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p121-0" name="pregunta121" value="0">
              <label for="p121-0">0</label>
              <input type="radio" id="p121-1" name="pregunta121" value="1">
              <label for="p121-1">1</label>
              <input type="radio" id="p121-2" name="pregunta121" value="2">
              <label for="p121-2">2</label>
              <input type="radio" id="p121-3" name="pregunta121" value="3">
              <label for="p121-3">3</label>
              <input type="radio" id="p121-4" name="pregunta121" value="4">
              <label for="p121-4">4</label>
            </div>
            <textarea id="comentario121" name="comentario121" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.7 Difundir y proporcionar información a los trabajadores sobre:</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta122">La política de prevención de riesgos psicosociales.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p122-0" name="pregunta122" value="0">
              <label for="p122-0">0</label>
              <input type="radio" id="p122-1" name="pregunta122" value="1">
              <label for="p122-1">1</label>
              <input type="radio" id="p122-2" name="pregunta122" value="2">
              <label for="p122-2">2</label>
              <input type="radio" id="p122-3" name="pregunta122" value="3">
              <label for="p122-3">3</label>
              <input type="radio" id="p122-4" name="pregunta122" value="4">
              <label for="p122-4">4</label>
            </div>
            <textarea id="comentario122" name="comentario122" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">La política de prevención de riesgos psicosociales.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta123">Las medidas adoptadas para combatir las prácticas opuestas al entorno organizacional favorable y actos de violencia laboral.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p123-0" name="pregunta123" value="0">
              <label for="p123-0">0</label>
              <input type="radio" id="p123-1" name="pregunta123" value="1">
              <label for="p123-1">1</label>
              <input type="radio" id="p123-2" name="pregunta123" value="2">
              <label for="p123-2">2</label>
              <input type="radio" id="p123-3" name="pregunta123" value="3">
              <label for="p123-3">3</label>
              <input type="radio" id="p123-4" name="pregunta123" value="4">
              <label for="p123-4">4</label>
            </div>
            <textarea id="comentario123" name="comentario123" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Las medidas adoptadas para combatir las prácticas opuestas al entorno organizacional favorable y los actos de violencia laboral.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta124">Las medidas y acciones de prevención y, en su caso, las acciones de control de los factores de riesgo psicosocial.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p124-0" name="pregunta124" value="0">
              <label for="p124-0">0</label>
              <input type="radio" id="p124-1" name="pregunta124" value="1">
              <label for="p124-1">1</label>
              <input type="radio" id="p124-2" name="pregunta124" value="2">
              <label for="p124-2">2</label>
              <input type="radio" id="p124-3" name="pregunta124" value="3">
              <label for="p124-3">3</label>
              <input type="radio" id="p124-4" name="pregunta124" value="4">
              <label for="p124-4">4</label>
            </div>
            <textarea id="comentario124" name="comentario124" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Las medidas y acciones de prevención y, en su caso, las acciones de control de los factores de riesgo psicosocial.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta125">Los mecanismos para presentar quejas por prácticas opuestas al entorno organizacional favorable y para denunciar actos de violencia laboral.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p125-0" name="pregunta125" value="0">
              <label for="p125-0">0</label>
              <input type="radio" id="p125-1" name="pregunta125" value="1">
              <label for="p125-1">1</label>
              <input type="radio" id="p125-2" name="pregunta125" value="2">
              <label for="p125-2">2</label>
              <input type="radio" id="p125-3" name="pregunta125" value="3">
              <label for="p125-3">3</label>
              <input type="radio" id="p125-4" name="pregunta125" value="4">
              <label for="p125-4">4</label>
            </div>
            <textarea id="comentario125" name="comentario125" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Los mecanismos para presentar quejas por prácticas opuestas al entorno organizacional favorable y para denunciar actos de violencia laboral.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta126">Los resultados de la identificación y análisis de los factores de riesgo psicosocial para los centros de trabajo que tengan entre 16 y 50 trabajadores, y de la identificación y 
                análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional tratándose de centros de trabajo de más de 50 trabajadores.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p126-0" name="pregunta126" value="0">
              <label for="p126-0">0</label>
              <input type="radio" id="p126-1" name="pregunta126" value="1">
              <label for="p126-1">1</label>
              <input type="radio" id="p126-2" name="pregunta126" value="2">
              <label for="p126-2">2</label>
              <input type="radio" id="p126-3" name="pregunta126" value="3">
              <label for="p126-3">3</label>
              <input type="radio" id="p126-4" name="pregunta126" value="4">
              <label for="p126-4">4</label>
            </div>
            <textarea id="comentario126" name="comentario126" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Los resultados de la identificación y análisis de los factores de riesgo psicosocial para los centros de trabajo que tengan entre 16 y 50 trabajadores,
                 y de la identificación y análisis de los factores de riesgo psicosocial y la evaluación del entorno organizacional tratándose de centros de trabajo de más de 50 trabajadores.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta127">Las posibles alteraciones a la salud por la exposición a los factores de riesgo psicosocial.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p127-0" name="pregunta127" value="0">
              <label for="p127-0">0</label>
              <input type="radio" id="p127-1" name="pregunta127" value="1">
              <label for="p127-1">1</label>
              <input type="radio" id="p127-2" name="pregunta127" value="2">
              <label for="p127-2">2</label>
              <input type="radio" id="p127-3" name="pregunta127" value="3">
              <label for="p127-3">3</label>
              <input type="radio" id="p127-4" name="pregunta127" value="4">
              <label for="p127-4">4</label>
            </div>
            <textarea id="comentario127" name="comentario127" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta128">Las posibles alteraciones a la salud por la exposición a los factores de riesgo psicosocial.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p128-0" name="pregunta128" value="0">
              <label for="p128-0">0</label>
              <input type="radio" id="p128-1" name="pregunta128" value="1">
              <label for="p128-1">1</label>
              <input type="radio" id="p128-2" name="pregunta128" value="2">
              <label for="p128-2">2</label>
              <input type="radio" id="p128-3" name="pregunta128" value="3">
              <label for="p128-3">3</label>
              <input type="radio" id="p128-4" name="pregunta128" value="4">
              <label for="p128-4">4</label>
            </div>
            <textarea id="comentario128" name="comentario128" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.8 Llevar los registros sobre:</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta129">Los resultados de la identificación y análisis de los factores de riesgo psicosocial y, además, tratándose de centros de trabajo de más de 50 trabajadores, de las evaluaciones del 
                entorno organizacional.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p129-0" name="pregunta129" value="0">
              <label for="p129-0">0</label>
              <input type="radio" id="p129-1" name="pregunta129" value="1">
              <label for="p129-1">1</label>
              <input type="radio" id="p129-2" name="pregunta129" value="2">
              <label for="p129-2">2</label>
              <input type="radio" id="p129-3" name="pregunta129" value="3">
              <label for="p129-3">3</label>
              <input type="radio" id="p129-4" name="pregunta129" value="4">
              <label for="p129-4">4</label>
            </div>
            <textarea id="comentario129" name="comentario129" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Los resultados de la identificación y análisis de los factores de riesgo psicosocial y,
                 además, tratándose de centros de trabajo de más de 50 trabajadores, de las evaluaciones del entorno organizacional.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta130">Las medidas de control adoptadas cuando el resultado de la identificación y análisis de los factores de riesgo psicosocial y evaluación del entorno organizacional lo señale.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p130-0" name="pregunta130" value="0">
              <label for="p130-0">0</label>
              <input type="radio" id="p130-1" name="pregunta130" value="1">
              <label for="p130-1">1</label>
              <input type="radio" id="p130-2" name="pregunta130" value="2">
              <label for="p130-2">2</label>
              <input type="radio" id="p130-3" name="pregunta130" value="3">
              <label for="p130-3">3</label>
              <input type="radio" id="p130-4" name="pregunta130" value="4">
              <label for="p130-4">4</label>
            </div>
            <textarea id="comentario130" name="comentario130" placeholder="Comentario"></textarea>
          </div>

        <!-- Disposicion -->
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Las medidas de control adoptadas cuando el resultado de la identificación y análisis de los factores de riesgo psicosocial y evaluación del entorno organizacional lo señale.</label>
          </div>
             <hr class="styled-separator">
             <div>
                <h2>
                    Criterio de aceptación
                </h2>
            </div>
        <!-- Disposicion -->

          <div class="conteiner">
            <label for="pregunta131">Los nombres de los trabajadores a los que se les practicaron los exámenes o evaluaciones clínicas y que se comprobó la exposición a factores de riesgo psicosocial, a actos de violencia laboral o 
                acontecimientos traumáticos severos.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p131-0" name="pregunta131" value="0">
              <label for="p131-0">0</label>
              <input type="radio" id="p131-1" name="pregunta131" value="1">
              <label for="p131-1">1</label>
              <input type="radio" id="p131-2" name="pregunta131" value="2">
              <label for="p131-2">2</label>
              <input type="radio" id="p131-3" name="pregunta131" value="3">
              <label for="p131-3">3</label>
              <input type="radio" id="p131-4" name="pregunta131" value="4">
              <label for="p131-4">4</label>
            </div>
            <textarea id="comentario131" name="comentario131" placeholder="Comentario"></textarea>
          </div>

<!-- 
          <div class="conteiner">
            <label for="pregunta131">Primer nivel: Las acciones se centran en el plano organizacional e implican actuar sobre la política de prevención de riesgos psicosociales del centro de trabajo, la organización 
                del trabajo, las acciones o medios para: disminuir los efectos de los factores de riesgo psicosocial, prevenir la violencia laboral y propiciar el entorno organizacional favorable.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p131-0" name="pregunta131" value="0">
              <label for="p131-0">0</label>
              <input type="radio" id="p131-1" name="pregunta131" value="1">
              <label for="p131-1">1</label>
              <input type="radio" id="p131-2" name="pregunta131" value="2">
              <label for="p131-2">2</label>
              <input type="radio" id="p131-3" name="pregunta131" value="3">
              <label for="p131-3">3</label>
              <input type="radio" id="p131-4" name="pregunta131" value="4">
              <label for="p131-4">4</label>
            </div>
            <textarea id="comentario131" name="comentario131" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta132">Primer nivel: Las acciones se centran en el plano organizacional e implican actuar sobre la política de prevención de riesgos psicosociales del centro de trabajo, la organización 
                del trabajo, las acciones o medios para: disminuir los efectos de los factores de riesgo psicosocial, prevenir la violencia laboral y propiciar el entorno organizacional favorable.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p132-0" name="pregunta132" value="0">
              <label for="p132-0">0</label>
              <input type="radio" id="p132-1" name="pregunta132" value="1">
              <label for="p132-1">1</label>
              <input type="radio" id="p132-2" name="pregunta132" value="2">
              <label for="p132-2">2</label>
              <input type="radio" id="p132-3" name="pregunta132" value="3">
              <label for="p132-3">3</label>
              <input type="radio" id="p132-4" name="pregunta132" value="4">
              <label for="p132-4">4</label>
            </div>
            <textarea id="comentario132" name="comentario132" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta133">Primer nivel: Las acciones se centran en el plano organizacional e implican actuar sobre la política de prevención de riesgos psicosociales del centro de trabajo, la organización 
                del trabajo, las acciones o medios para: disminuir los efectos de los factores de riesgo psicosocial, prevenir la violencia laboral y propiciar el entorno organizacional favorable.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p133-0" name="pregunta133" value="0">
              <label for="p133-0">0</label>
              <input type="radio" id="p133-1" name="pregunta133" value="1">
              <label for="p133-1">1</label>
              <input type="radio" id="p133-2" name="pregunta133" value="2">
              <label for="p133-2">2</label>
              <input type="radio" id="p133-3" name="pregunta133" value="3">
              <label for="p133-3">3</label>
              <input type="radio" id="p133-4" name="pregunta133" value="4">
              <label for="p133-4">4</label>
            </div>
            <textarea id="comentario133" name="comentario133" placeholder="Comentario"></textarea>
          </div>

          <div class="conteiner">
            <label for="pregunta134">Primer nivel: Las acciones se centran en el plano organizacional e implican actuar sobre la política de prevención de riesgos psicosociales del centro de trabajo, la organización 
                del trabajo, las acciones o medios para: disminuir los efectos de los factores de riesgo psicosocial, prevenir la violencia laboral y propiciar el entorno organizacional favorable.
              </label>
            <div class="radio-buttons">
              <input type="radio" id="p134-0" name="pregunta134" value="0">
              <label for="p134-0">0</label>
              <input type="radio" id="p134-1" name="pregunta134" value="1">
              <label for="p134-1">1</label>
              <input type="radio" id="p134-2" name="pregunta134" value="2">
              <label for="p134-2">2</label>
              <input type="radio" id="p134-3" name="pregunta134" value="3">
              <label for="p134-3">3</label>
              <input type="radio" id="p134-4" name="pregunta134" value="4">
              <label for="p134-4">4</label>
            </div>
            <textarea id="comentario134" name="comentario134" placeholder="Comentario"></textarea>
          </div> -->

          



        <!-- TERMINA LOS CUESTIONARIOS -->
      
        <input type="submit" name="guardar_n0352018" value="Enviar">
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
var totalPreguntas = 131;


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
            name: "NOM-035-STPS-2018",
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