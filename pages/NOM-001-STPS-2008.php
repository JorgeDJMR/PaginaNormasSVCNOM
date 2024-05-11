<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma012008 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma012008 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    
    
    <title>Normas/NOM-001-STPS-2008.HTML</title>
</head>
<body>
    <div class="barrasuperior">
        <h1>Norma NOM-001-STPS-2008</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    
    <form action="guardar_n0012008.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Realizar verificaciones oculares cada doce meses al centro de trabajo, pudiendo hacerse por áreas, 
                para identificar condiciones inseguras y reparar los daños encontrados. Los resultados de las verificaciones 
                deben registrarse a través de bitácoras, medios magnéticos o en las actas de verificación de la comisión de 
                seguridad e higiene, mismos que deben conservarse por un año y contener al menos las fechas en que se 
                realizaron las verificaciones, el nombre del área del centro de trabajo que fue revisada y, en su caso, el tipo de 
                condición insegura encontrada, así como el tipo de reparación realizada.</label>
        </div>
        <hr class="styled-separator">

          <div class="conteiner">
              <label for="pregunta1">Exhibe los registros de las verificaciones oculares realizadas al centro de trabajo, para identificar condiciones inseguras y reparar daños encontrados.</label>
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
          <label for="pregunta2">Los registros de las verificaciones oculares realizadas al centro de trabajo, para identificar condiciones inseguras y reparar daños encontrados, tienen una 
            periodicidad máxima de un año.</label>
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
          <label for="pregunta3">Los registros de las verificaciones oculares realizadas al centro de trabajo, para identificar condiciones inseguras y reparar daños encontrados contienen, 
            al menos, las fechas en que realizaron las verificaciones, el nombre del área donde se realizó la verificación y, en su caso, el tipo de condición insegura 
            detectada, así como el tipo de reparación realizada. 
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
        <label class="conteiner">5.3. Efectuar verificaciones oculares posteriores a la ocurrencia de un evento que pudiera generarle daños al centro de trabajo y, en su caso, realizar las adecuaciones, 
          modificaciones o reparaciones que garanticen la seguridad de sus ocupantes. De tales acciones registrar los resultados en bitácoras o medios magnéticos. Los registros deben conservarse por un año 
          y contener al menos la fecha de la verificación, el tipo de evento, los resultados de las verificaciones y las acciones correctivas realizadas.
        </label>
      </div>
      <hr class="styled-separator">

      <div class="conteiner">
        <label for="pregunta4">Exhibe el registro de la última verificación ocular realizada al  centro de trabajo, con motivo de la ocurrencia de algún evento que pudiera generarle daños.
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
        <label for="pregunta5">El registro de la última verificación ocular realizada al centro de trabajo, con motivo de la ocurrencia de algún evento que pudiera generarle daños, contiene 
          al menos: la fecha de la verificación, el tipo de evento suscitado, los resultados obtenidos y, en su caso, las acciones correctivas realizadas.
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

      <div class="conteiner">
        <label for="pregunta6">El registro de la última verificación ocular realizada al centro de trabajo, con motivo de la ocurrencia de algún evento que pudiera generarle daños, se 
          conserva por un año.
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
        <label class="conteiner">5.4.  Contar con sanitarios (retretes, mingitorios, lavabos, entre otros) limpios y seguros para el servicio de los trabajadores y, 
          en su caso, con lugares reservados para el consumo de alimentos.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta7">Derivado del recorrido por las instalaciones del centro de trabajo, se constate que los sanitarios, retretes, mingitorios y lavabos se encuentran en condiciones de uso, limpios y seguros.
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
        <label for="pregunta8">Derivado del recorrido por las instalaciones del centro de trabajo, se constate que cuando se cuente con lugares reservados para el consumo de alimentos, 
          éstos se encuentren en condiciones de uso, limpios y seguros. 
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
        <label class="conteiner">5.5. Contar, en su caso, con regaderas y vestidores, de acuerdo con la actividad que se desarrolle en el centro 
          de trabajo o cuando se requiera la descontaminación del trabajador. Es responsabilidad del patrón establecer el tipo, características y cantidad de los servicios.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta9">De acuerdo con la actividad que se desarrolle en el centro de trabajo o cuando se requiera la descontaminación del trabajador, se constate físicamente que existen regaderas y vestidores. 
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
          <label class="conteiner">5.6. Proporcionar información a todos los trabajadores para el uso y conservación de las áreas donde realicen sus actividades en el centro de 
            trabajo, incluidas las destinadas para el servicio de los trabajadores. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta10">Demuestre con evidencias documentales que proporcionó a los trabajadores información para el uso y conservación de las áreas donde realicen sus actividades, incluidas las destinadas 
          para su servicio.
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
        <label for="pregunta11">Se constate físicamente que proporcionó a los trabajadores información para el uso y conservación de las 
          áreas donde realicen sus actividades, incluidas las destinadas para su servicio.
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
        <label class="conteiner">7.1.1. Contar con orden y limpieza permanentes en las áreas de trabajo, así como en pasillos exteriores a los 
          edificios, estacionamientos y otras áreas comunes del centro de trabajo, de acuerdo al tipo de actividades que se desarrollen. 
          . 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta12">Derivado del recorrido por el centro de trabajo, se constate físicamente que las áreas donde los trabajadores realizan sus actividades laborales se encuentran 
          ordenadas y limpias, de acuerdo al tipo  de actividades que en ellas se desarrollen.
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
        <label class="conteiner">7.1.2.  Las áreas de producción, de mantenimiento, de circulación de personas y vehículos, las zonas de riesgo,
           de almacenamiento y de servicios para los trabajadores del centro de trabajo, se deben delimitar de tal manera que se disponga de espacios
            seguros para la realización de las actividades de los trabajadores que en ellas se encuentran. Tal delimitación puede realizarse con barandales;
             con cualquier elemento estructural; con franjas amarillas de al menos 5 cm de ancho, pintadas o adheridas al piso, o por una distancia de separación física. 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta13">Derivado del  recorrido por el centro de trabajo, se constate físicamente que las áreas del centro de trabajo se encuentran delimitadas.
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

      <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.1.3. Cuando laboren trabajadores discapacitados en los centros de trabajo, las puertas,
           vías de acceso y de circulación, escaleras, lugares de servicio y puestos de trabajo, deben facilitar sus actividades 
           y desplazamientos. 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta14">Derivado del recorrido por el centro de trabajo, en caso de que en él laboren trabajadores discapacitados, se constate que las puertas, vías de acceso y de circulación, escaleras, 
          lugares de servicio y puestos de trabajo, faciliten las actividades y desplazamientos de esos trabajadores.
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

      <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.1.4. Las escaleras, rampas, escaleras manuales, puentes y plataformas elevadas deben, además 
          de cumplir con lo que se indica en la presente Norma, mantenerse en condiciones tales que eviten que el trabajador 
          resbale al usarlas.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta15">Derivado del recorrido por el centro de trabajo, se constate físicamente que las escaleras, rampas, escaleras manuales, puentes y plataformas elevadas se encuentran en condiciones 
          tales que en condiciones normales de uso los trabajadores no podrían resbalar. 
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

      <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.1.5. Los elementos estructurales tales como pisos, puentes o plataformas, entre otros, 
          destinados a soportar cargas fijas o móviles, deben ser utilizados para los fines a que fueron destinados. En caso
           de requerir un cambio de uso, se debe evaluar si los elementos estructurales tienen la capacidad de soportar las 
           nuevas cargas y, en su caso, hacer las adecuaciones necesarias para evitar riesgos de trabajo.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta16">Derivado del recorrido por el centro de trabajo, se constate físicamente que los elementos estructurales que en él existan, no presentan deformaciones o daños por las cargas que soportan, 
          sin importar si han sido o no remodelados. 
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

      <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.1.6. Los edificios y elementos estructurales deben soportar las cargas fijas o móviles de acuerdo
           a la naturaleza de las actividades que en ellos se desarrollen, de tal manera que su resistencia evite posibles fallas
            estructurales y riegos de impacto, para lo cual deben considerarse las condiciones normales de operación y los eventos
             tanto naturales como incidentales que puedan afectarlos. 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

      
        <!-- Pregunta 17 -->
        <div class="conteiner">
          <label for="pregunta17">Derivado del recorrido por el centro de trabajo, se constate físicamente que los elementos estructurales y edificios, cuentan con la resistencia suficiente para soportar las cargas que en ellas 
            se encuentran, es decir que, no se observan deformaciones o daños de acuerdo al tipo de sus actividades. 
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

        <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.2 a) Ser de materiales que protejen de las condiciones ambientales externas. 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->
      
        <!-- Pregunta 18 -->
        <div class="conteiner">
          <label for="pregunta18">Derivado del recorrido por el centro de trabajo, se observe que los techos de las diferentes áreas protegen a los  trabajadores contra lluvia y otras  condiciones ambientales externas.
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

      <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.2 b) Utilizarse para soportar cargas fijas o móviles, sólo si fueron diseñados o reconstruidos para estos fines. 
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->
      
        <!-- Pregunta 19 -->
        <div class="conteiner">
          <label for="pregunta19">Derivado del recorrido por el centro de trabajo, se observe que en caso de que existan cargas fijas soportadas por los techos, éstos no presentan deformaciones o fracturas 
            que pudieran representar riesgos. 
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
      
                <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.2 c) Permitir salida de liquidos.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

        <!-- Pregunta 20 -->
        <div class="conteiner">
          <label for="pregunta20">Derivado del recorrido por el centro de trabajo, se observe que los techos permiten la salida de líquidos que en ellos pudieran estar en el piso.
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

                <!-- Disposicion -->
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">7.2 d) Soportar las condiciones normales de operación.
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

        <!-- Pregunta 21 -->
        <div class="conteiner">
          <label for="pregunta21">Derivado del recorrido por el centro de trabajo, se observe que los techos se encuentran en condiciones tales que soporten las condiciones normales de operación.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.3 a) Mantenerse con colores tales que eviten la reflexión de la luz, cuando se trate de las caras interiores, para no afectar la visión del trabajador.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta22">Derivado del recorrido por el centro de trabajo, se observe que las paredes que soportan cargas, no presentan deformaciones, agrietamientos u otra condición de riesgo. 
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
          <label class="conteiner">7.3 b) Utilizarse para soportar cargas sólo si fueron destinadas para estos fines.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->
        
        <div class="conteiner">
          <label for="pregunta23">Derivado del recorrido por el centro de trabajo, se observe que las paredes que soportan cargas, no presentan deformaciones, agrietamientos u otra condición de riesgo.
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
          <label class="conteiner">7.3 c) Contar con medidas de seguridad, tales como protección y señalización de las zonas de riesgo, sobre todo cuando en ellas existan aberturas de más de dos metros de altura hacia el otro lado de la pared, por las que haya peligro de caídas para el trabajador.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta24">Derivado del recorrido por el centro de trabajo, se observe que, en caso de existir aberturas en las paredes, a alturas superiores a dos metros, por donde exista riesgo de caída a través de ellos, 
            cuentan con: 
            <br>- Elementos de protección para evitar las caídas de personas y objetos 
            <br>- Señalamientos que indiquen el riesgo
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
          <label class="conteiner">7.4 a) Mantenerse en condiciones tales que de acuerdo al tipo de actividades que se desarrollen, no generen riesgos de trabajo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta25">Derivado del recorrido por el centro de trabajo, se observe que en los pisos de las diferentes áreas no se encuentren objetos, materiales o sustancias que sean un factor de riesgo 
            para los trabajadores, de acuerdo a la naturaleza de las actividades que ahí se desarrollan. 
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
          <label class="conteiner">7.4 b) Mantenerse de tal manera que los posibles estancamientos de líquidos no generen riesgos de caídas o resbalones;
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta26">Derivado del recorrido por el centro de trabajo, se observe que, en su caso, los líquidos en los pisos no son factor de riesgo para los trabajadores por caídas o 
            resbalones.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.4 c) Ser llanos en las zonas para el trafico de personas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta27">Derivado del recorrido por el centro de trabajo, se observa que los pisos de los lugares por donde circulan los trabajadores son llanos (planos).
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.4 d) Contar con protecciones tales como cercas provisionales o barandales desmontables, 
            de una altura mínima de 90 cm u otro medio que proporcione protección, cuando tengan aberturas temporales de escotillas, conductos, pozos y trampas, durante el tiempo que se requiera la abertura.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta28">Derivado del recorrido por el centro de trabajo, las aberturas temporales en los pisos que se identifiquen, cuenten con protecciones que señalen su localización y peligro, 
            para prevenir caídas de los trabajadores. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.4 e) Contar con señalización de acuerdo con la NOM-026-STPS-1998, donde existan riesgos por cambio de nivel, o por las características de la actividad o proceso que en él se desarrolle.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

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
          <label for="pregunta30">Derivado del recorrido por el centro de trabajo, se identifiquen con señalamientos los riesgos de caída o resbalamiento en pisos, por efecto de la actividad que en ellos se realiza 
            (limpieza, reparaciones, entre otros). 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5 a) Tener un ancho constante de al menos 56 cm en cada tramo recto y, en ese caso,
             se debe señalizar que se prohíbe la circulación simultánea en contraflujo. Las señales deben cumplir con lo establecido en la NOM-026-STPS-1998.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta31">Derivado del recorrido por el centro de trabajo, se observa que para las escaleras angostas de tramos rectos se cumplen las siguientes condiciones: 
            <br>- Tienen un ancho constante en sus tramos rectos de al menos 56 cm. 
            <br>- Existe señalización para prohibir la circulación de más de una persona a la vez, en contra flujo.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5 b) Cuando tengan descansos, éstos deberán tener al menos 56 cm para las de tramos rectos utilizados en un solo sentido de flujo a la vez, y de al menos 90 cm para las de ancho superior.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta32">Derivado del recorrido por el centro de trabajo, se observa que la huella de los descansos de las escaleras de tramos rectos utilizadas en un solo sentido de flujo a la vez, 
            es al menos de 56 cm, y de almenos 90 cm para las de ancho superior.
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
          <label class="conteiner">7.5 c) Todas las huellas de las escaleras rectas deben tener el mismo ancho y todos los peraltes la misma altura, con una variación máxima de ± 0.5 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta33">Derivado del recorrido por el centro de trabajo, se observe que todos los peraltes y todas las huellas, respectivamente, de las escaleras de tramos rectos, 
            cuentan con las mismas dimensiones. 
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
          <label class="conteiner">7.5 d) En las escaleras con cambios de dirección o en las denominadas de caracol, el peralte debe ser siempre de la misma altura.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta34">Derivado del recorrido por el centro de trabajo, se observe que los peraltes de las escaleras con cambios de dirección, siempre tienen la misma altura. 
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
          <label class="conteiner">7.5 e) Las huellas de los escalones en sus tramos rectos deben tener una longitud mínima de 25 cm (área de contacto) y el peralte una
             altura no mayor a 23 cm. Las orillas de los escalones deben ser redondeadas (sección roma o nariz roma). 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta35">Derivado del recorrido por el centro de trabajo, se constate que: 
            <br>- Las huellas de las escaleras, en sus secciones rectas, tienen dimensiones mínimas de 25 cm.
            <br>- Los peraltes de las escaleras en sus secciones rectas tienen una altura máxima de 23 cm.
            <br>- Las orillas de los escalones son redondeadas.
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
          <label class="conteiner">7.5 f) La distancia libre medida desde la huella de cualquier escalón, contemplando los niveles inferior y
             superior de la escalera y el techo, o cualquier superficie superior, debe ser mayor a 200 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta36">Derivado del recorrido por el centro de trabajo, se observe que en las escaleras, las alturas verticales medidas desde la huella de cualquier escalón, 
            contemplando los niveles inferior y superior de la escalera y el techo o cualquier superficie superior, es mayor a 200 cm.
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
          <label class="conteiner">7.5 g)  Las huellas de los escalones deben contar con materiales antiderrapantes. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta37">Derivado del recorrido por el centro de trabajo, se observe que los escalones de las escaleras son antiderrapantes.
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
          <label class="conteiner">7.5.1 a) Ser de diseño recto en sus secciones o tramos.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta38">Derivado del recorrido por el centro de trabajo, se observe que las escaleras de emergencia exteriores son de tramos rectos.
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
          <label class="conteiner">7.5.1 b) En todo momento, ser operadas sin que existan medios que obstruyan u obstaculicen su accionamiento.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta39">Derivado del recorrido por el centro de trabajo, se observe que las puertas de las escaleras de emergencia exteriores se encuentran libres de objetos y obstáculos para su accionamiento.
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
          <label class="conteiner">7.5.1 c) Por cada piso, tener un acceso directo a ellas a través de una puerta de salida que se encuentre al mismo nivel
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta40">Derivado del recorrido por el centro de trabajo, se observe que las escaleras de emergencia exteriores cuentan en cada piso del edificio con un acceso al mismo nivel.
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
          <label class="conteiner">7.5.1 d) Ser diseñadas de tal forma que drenen con facilidad los líquidos que en ellas pudieran caer y eviten su acumulación.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta41">Derivado del recorrido por el centro de trabajo, se observe que en las escaleras de emergencia exteriores, los líquidos derramados
             en sus descansos o escalones, no se acumulan. 
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
          <label class="conteiner">7.5.1 e) Que los pisos y huellas sean resistentes y de material antiderrapante y, en su caso, contar con descansos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta42">Derivado del recorrido por el centro de trabajo, se observe que los pisos y huellas de las escaleras de emergencia exteriores son resistentes y de materiales antiderrapantes y que, 
            en su caso, cuentan con descansos.
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
          <label class="conteiner">7.5.1 f) Estar fijas en forma permanente en todos los pisos excepto en el inferior, 
            en el que se pueden instalar plegables. En este último caso, deben ser de diseño tal que al accionarlas bajen hasta el suelo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta43">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- Las escaleras de emergencia se encuentran fijas a la estructura del edificio en todos sus niveles. 
            <br>- Cuando sean escaleras plegables, dicha característica sólo la tenga en el primer piso.
            <br>- Cuando se constate, para escaleras plegables, que al accionarlas bajan hasta el suelo.
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
          <label class="conteiner">7.5.1 g) Estar señalizadas en sus accesos conforme a lo establecido en la NOM-026-STPS-1998.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta44">Derivado del recorrido por el centro de trabajo, se observe que en cada uno de los accesos a las escaleras
             de emergencia exteriores se cuenta con la señal que indique su ubicación
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
          <label class="conteiner">7.5.1 h) Contar con puertas de acceso, a las que se les dé mantenimiento periódico para evitar su deterioro por
             el transcurso del tiempo y para garantizar su operación en cualquier momento. Se deben registrar los mantenimientos realizados a las puertas de acceso al menos una vez cada seis meses. 
            Los registros deben contener al menos las fechas de realización del mantenimiento, el tipo de mantenimiento realizado, y los nombres y firmas de las personas involucradas en tal actividad. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta45">Derivado del recorrido por el centro de trabajo, se observe que las puertas de acceso a las escaleras de emergencia se encuentran en condiciones operativas. 
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
          <label for="pregunta46">Exhiba una bitácora o cualquier otro tipo de registro de los mantenimientos, y se constata que se realizan al menos cada seis meses.
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
          <label for="pregunta47">Los registros indiquen, al menos, las fechas de realización del mantenimiento, el tipo de mantenimiento realizado, además de los nombres y firmas de las personas involucradas en tal actividad. 
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
          <label class="conteiner">7.5.1 i) Sus puertas de acceso deben abrir en la dirección normal de salida de las personas.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta48">Derivado del recorrido por el centro de trabajo, se constate que las puertas de acceso de las escaleras de emergencia exteriores abren hacia fuera, es decir en el sentido de la salida del 
            edificio hacia la escalera.
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
          <label class="conteiner">7.5.1 j) Sus cerrojos deben ser de naturaleza tal que abran fácilmente desde adentro.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta49">Derivado del recorrido por el centro de trabajo, se observe que los cerrojos de las puertas de las escaleras de emergencia exteriores son de fácil accionamiento y abren desde adentro.
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
          <label class="conteiner">7.5.1 k) Contar, en cada puerta, con su respectivo cierre automático y que permita el libre flujo de las personas durante una emergencia.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta50">Derivado del recorrido por el centro de trabajo, se observe que las puertas de las escaleras de emergencia exteriores cuentan con dispositivos de cierre automático y 
            permiten el libre flujo de las personas durante una emergencia. 
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
          <label class="conteiner">7.5.2. Escaleras con barandales con espacios abiertos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta51">Derivado del recorrido por el centro de trabajo, se observe que las escaleras con barandales con espacios abiertos por debajo de ellos, cuentan al menos con 
            una baranda paralela al barandal. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 a) El pasamanos debe estar a una altura de 90 cm ± 10 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta52">Para las escaleras con pasamanos, se constate que tales pasamanos tienen una altura de 90 cm ± 10 cm. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 b) Las barandas deben estar colocadas a una distancia 
            intermedia entre el barandal y la paralela formada con la altura media del peralte 
            de los escalones. Los balaustres deben estar colocados, en este caso, cada cuatro escalones.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta53">Derivado del recorrido por el centro de trabajo, se observe que para las escaleras con pasamanos, las barandas se encuentran a una distancia intermedia entre el barandal 
            y la paralela formada con la altura media del peralte de los escalones
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
          <label for="pregunta54">Los balaustres, en este caso, se encuentran a no más de cuatro escalones de distancia uno de otro.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 c) En caso de no colocar baranda, colocar balaustres en cada escalón.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta55">Derivado del recorrido por el centro de trabajo, se observe que en las escaleras que no cuentan con barandas existe un balaustre por cada uno de los escalones.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 d) Los pasamanos deben ser continuos, lisos y pulidos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta56">Derivado del recorrido por el centro de trabajo, se observe que los pasamanos de las escaleras son continuos, lisos y pulidos.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 e) En caso de contar con pasamanos sujetos a la pared, éstos deben estar fijados por medio de anclas aseguradas en la parte inferior.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta57">Derivado del recorrido por el centro de trabajo, se observe que los pasamanos de las escaleras, cuando éstos están fijados a la pared, se encuentran empotrados por medio 
            de anclas ubicadas en su parte inferior y éstos no impiden que la mano se desplace libremente. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 f) Las anclas referidas en el inciso anterior deben estar
             empotradas en la pared y tener la longitud suficiente para que exista un espacio libre de por
              lo menos 4 cm entre los pasamanos y la pared o cualquier saliente, y no se interrumpa la continuidad de la cara superior y el costado del pasamanos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta58">Derivado del recorrido por el centro de trabajo, se observe que las distancias entre las paredes y los pasamanos empotrados son continuas y tienen al menos cuatro 
            centímetros de separación, y que no se interrumpe la continuidad del pasamanos.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 g) Cuando las escaleras tengan un ancho de 3 m o más, deben contar con un barandal intermedio y uno en los extremos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta59">Derivado del recorrido por el centro de trabajo, se observe que para las escaleras con más de tres metros de ancho, existe un barandal intermedio y al menos un barandal en sus extremos. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 h) Cuando las escaleras estén cubiertas con muros en sus dos costados, deben contar al menos con un pasamanos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta60">Derivado del recorrido por el centro de trabajo, se observe que en las escaleras que están cubiertas con muros en sus dos costados, al menos uno de ellos tenga pasamanos. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.5.2 i) Las edificaciones deben tener siempre escaleras o rampas peatonales que comuniquen entre nivel y nivel todos
             sus niveles, aun cuando existan elevadores o escaleras eléctricas. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta61">Derivado del recorrido por el centro de trabajo, se observe que siempre existe comunicación entre dos niveles diferentes ya sea con escaleras o rampas peatonales, aun cuando 
            existan escaleras eléctricas o elevadores que comuniquen a los dos niveles consecutivos.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 a) Las cargas que por ellas circulen no deben sobrepasar la resistencia para la que fueron destinadas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta62">Derivado del recorrido por el centro de trabajo, se observe que las rampas no se encuentran en condiciones deterioradas para su uso, es decir que no se observen pandeos 
            o fracturas que denoten que se rebasó su resistencia. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 b) No deben tener deformaciones que generen riesgos a los 
            transeúntes o vehículos que por ellas circulen, sin importar si son fijas o móviles. En las rampas móviles se deberá indicar la capacidad de carga máxima.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta63">Derivado del recorrido por el centro de trabajo, se observe que las rampas fijas y las móviles no tienen deformaciones evidentes que generen riesgos a los transeúntes o a los vehículos 
            que por ellas circulan.
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
          <label for="pregunta64">En las rampas móviles se indica la capacidad de carga máxima.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 c) Las que se utilicen para el tránsito de trabajadores, deben tener una pendiente máxima de 10%; si son para mantenimiento deben tener una pendiente máxima de 17%, de acuerdo con la siguiente ecuación: 
            <br>P = (H/L) x 100 
            <br>donde: 
            <br>P = pendiente, en tanto por ciento. 
            <br>H = altura desde el nivel inferior hasta el superior, medida sobre la vertical, en cm. 
            <br>L = longitud de la proyección horizontal del plano de la rampa, en cm."
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta65">Derivado del recorrido por el centro de trabajo, se constata que: 
            <br>- La pendiente de las rampas para el tránsito de los trabajadores no rebasa el 10%.
            <br>- La pendiente de las rampas de mantenimiento no rebasa el 17%.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 d) Deben tener el ancho suficiente para ascender y descender sin que se presenten obstrucciones en el tránsito de los trabajadores.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta66">Derivado del recorrido por el centro de trabajo, se observe que por las rampas para personas el ancho es suficiente para que circulen a la vez 
            dos personas en sentidos opuestos. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 e) Cuando estén destinadas al tránsito de vehículos, deben ser igual al ancho del vehículo más grande que circule por la rampa más 60 cm.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta67">Derivado del recorrido por el centro de trabajo, se constate que el ancho de las rampas destinadas al tránsito de vehículos, cuenta con al menos 60 cm adicionales 
            al ancho del vehículo más grande que circule por ellas.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 f) Cuando la altura entre el nivel superior e inferior exceda de 150 cm, deben contar con barandal de protección lateral.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta68">Derivado del recorrido por el centro de trabajo, se observe que en las rampas que comunican a dos niveles con alturas superiores a metro y medio, se cuenta con barandales. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.6.1 g) Cuando se encuentren cubiertas por muros en sus dos costados, deben
             tener al menos un pasamanos. No aplica esta disposición cuando la rampa se destine sólo a tránsito de vehículos.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta69">Derivado del recorrido por el centro de trabajo, se observe que las rampas cubiertas en sus costados por paredes destinadas al tránsito de los trabajadores, cuentan al menos con un 
            pasamanos en uno de sus costados. 
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
          <label class="conteiner">7.6.1 h) La distancia libre medida desde cualquier punto de la rampa al techo, o 
            cualquier otra superficie superior sobre la vertical del punto de medición, debe ser mayor a 200 cm. Cuando 
            estén destinados al tránsito de vehículos, debe ser igual a la altura del vehículo más alto que 
            circule por la rampa más 30 cm, como mínimo. Se debe contar con señalamientos que indiquen estas alturas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta70">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- Las rampas por las que circulan trabajadores cuentan con una altura mínima libre por encima de ellas de dos metros.
            <br>- Las rampas destinadas al tránsito de vehículos tienen al menos una altura libre de 30 cm por encima del vehículo más alto que por ellas circule. 
            <br>- La altura de las rampas se encuentra señalizada.
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
          <label class="conteiner">7.6.1 i) En las partes abiertas deben contar con zoclos de al menos 10 cm o cualquier otro elemento físico que cumpla con la función de protección.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta71">Derivado del recorrido por el centro de trabajo, se observe que en las rampas abiertas se cuenta con barreras tales como zoclos de 10 cm 
            de altura u otro elemento físico que cumpla con esa función. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 a) Deben ser de materiales cuya resistencia 
            mecánica sea capaz de soportar las cargas de las actividades para las que son destinadas y estar protegidas, en su caso, de las condiciones ambientales.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta72">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- Las escalas fijas no presentan deformaciones por las cargas a las que se someten.
            <br>- Las escalas fijas están protegidas, en su caso, de los efectos del sol y la lluvia.
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
          <label class="conteiner">7.7.1 b) Los anclajes deben ser suficientes para soportar el peso de los trabajadores que las utilicen.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta73">Derivado del recorrido por el centro de trabajo, se observe que los anclajes de las escalas fijas se mantienen firmemente sujetos a los elementos estructurales. 
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
          <label class="conteiner">7.7.1 c) Cuando se requiera, deben existir indicaciones sobre restricciones de su uso.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta74">derivado del recorrido por el centro de trabajo, se observe que existen señalamientos o indicaciones con restricciones para el uso de las escalas fijas. 
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
          <label class="conteiner">7.7.1 d) Deben tener un ancho mínimo de 40 cm, y cuando su altura sea mayor a 250 cm el ancho mínimo será de 50 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta75">Derivado del recorrido por el centro de trabajo, se constate que: 
            <br>- Las escalas fijas tienen un ancho mínimo de 40 cm cuando su altura es menor o igual a 2 metros.
            <br>- Las escalas fijas tienen un ancho mínimo de medio metro para cuando su altura es mayor a 2 metros.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 e)  La distancia entre peldaños no debe ser mayor de 38 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta76">Derivado del recorrido por el centro de trabajo, se constate que en las escalas fijas la distancia entre peldaño y peldaño es menor de 38 cm. 
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
          <label class="conteiner">7.7.1 f) La separación entre el frente de los peldaños y los objetos más próximos al lado del ascenso, debe ser por lo menos de 75 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta77">Derivado del recorrido por el centro de trabajo, se constate que en las escalas fijas existen al menos 75 cm libres entre el frente de los peldaños y los objetos más 
            próximos al lado del ascenso. 
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
          <label class="conteiner">7.7.1 g) En el lado opuesto al de ascenso, la distancia entre los peldaños y objetos sobresalientes debe ser por lo menos de 20 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta78">Derivado del recorrido por el centro de trabajo, se constate que en las escalas fijas la distancia entre los peldaños y cualquier objeto del lado opuesto a su ascenso 
            y descenso es de al menos 20 cm. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 h) Deben tener espacios libres de por lo menos 18 cm, medidos en sentido transversal y hacia afuera en ambos lados de la escala.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta79">Derivado del recorrido por el centro de trabajo, se constate que en las escalas fijas existen al menos 18 cm libres entre sus costados y cualquier 
            estructura al costado de ellas.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 i) Al medir la inclinación de la escala desde la parte opuesta a la de ascenso, con respecto al piso, ésta debe estar comprendida entre 75 y 90 grados.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta80">Derivado del recorrido por el centro de trabajo, se observe que la inclinación de las escalas fijas está comprendida entre 75 y 90 grados.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 j) Deben contar con protección circundante de un diámetro de dimensiones tales que permita el ascenso y descenso de los trabajadores
             de forma segura a partir de 200 cm ± 20 cm del piso y, al menos, hasta 90 cm por encima del último nivel o peldaño al que se asciende.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta81">Derivado del recorrido por el centro de trabajo, se observe que las escalas fijas de más de dos metros de altura: 
            <br>- Cuentan con protecciones circundantes en la parte superior de la escala a partir de los dos metros con una tolerancia de ± 20 cm. 
            <br>- Las protecciones cubren hasta 90 cm por encima del último peldaño.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 k) Cuando la altura sea mayor a 6 m, debe permitir el uso de dispositivos de seguridad, tales como línea de vida.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta82">Derivado del recorrido por el centro de trabajo, se observe que en las escalas fijas de más seis metros de altura, se cuenta con dispositivos de seguridad que brinden protección contra caídas. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 l) Deben tener descansos por lo menos cada 10m de altura y
             éstos deben contar con barandal de protección lateral, con una altura mínima de 90 cm, intercalando las secciones, a excepción de las escalas de las chimeneas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta83">Derivado del recorrido por el centro de trabajo, se observe que las escalas fijas de más de diez metros de altura cuentan con: 
            <br>- Descansos intercalados al menos cada 10 metros.
            <br>- Que tales descansos cuentan con barandales de al menos 90 cm de altura.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 m) En caso de contar con estructuras laterales para el soporte de los peldaños, éstas deben prolongarse por encima del último nivel de acceso de la 
            escala por lo menos 90 cm, ser continuas y mantenerse en tal estado que no causen lesiones en las manos de los trabajadores, y permitir el ascenso y descenso seguro.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta84">Derivado del recorrido por el centro de trabajo, se observe que las escalas fijas cuyos peldaños sean soportados por estructuras laterales: 
            <br>- Tales estructuras se prolongan al menos 90 cm por encima de último nivel de acceso.
            <br>- Las prolongaciones de las estructuras son continuas y lisas.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.1 n) Las escalas fijas, cuyos peldaños son alcayatas incrustadas o soldadas de forma alternada a ambos costados en los postes que soportan cables de telefonía o de energía eléctrica, deben cumplir con las siguientes condiciones: 
            <br>i. Los peldaños deben ser de materiales con resistencia a la corrosión y resistencia mecánica suficiente para soportar el peso del trabajador; 
            <br>ii. Las distancias entre alcayatas de un mismo costado no deben ser superiores a 90 cm, de tal manera que entre alcayatas alternadas las distancias sean iguales o menores a 45 cm; 
            <br>iii. La alcayata debe sobresalir al menos 20 cm del lugar empotrado o soldado, para soportar al trabajador.
            <br>iv. La alcayata debe ser lisa para evitar daños en las manos de los trabajadores. 
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta85">Derivado del recorrido por el centro de trabajo, se observe que las escalas fijas cuyos peldaños son alcayatas incrustadas o soldadas de forma alternada a ambos costados en los postes que soportan cables de telefonía o de energía eléctrica: 
            <br>- Los peldaños son de materiales resistentes a la corrosión. 
            <br>- Los peldaños tienen una resistencia mecánica que soporta el peso del trabajador sin deformarse. 
            <br>- Las distancias entre alcayatas de un mismo costado no son superiores a 90 cm, de tal manera que entre alcayatas alternadas la distancia es igual o menor a 45 cm. 
            <br>- Las alcayatas sobresalgan al menos 20 cm del lugar empotrado o soldado. 
            <br>- Las alcayatas son lisas.
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
          <label class="conteiner">7.7.2.1. Las escalas móviles deben cumplir con los requerimientos de dimensiones establecidos para escalas fijas, 
            en lo que se refiere al ancho, espacios libres y distancias entre peldaños. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta86">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- El ancho de las escalas portátiles con menos de 2 metros y medio de altura, es mayor o igual a 40 cm, y que para las que son más grandes a 2 metros y medio, la distancia es de al menos 50 cm; 
            <br>- La distancia entre peldaño y peldaño, medido en la parte central es menor de 38 cm.
            <br>- La distancia para la operación segura del trabajador es al menos de 75 cm libres.
            <br>- La distancia entre los peldaños y cualquier objeto del lado opuesto a su ascenso y descenso es de al menos 20 cm.
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
          <label class="conteiner">7.7.2.2. Las correderas y guías sobre las que se desplacen las escalas móviles que cuenten con ellas, así como los materiales utilizados en 
            su construcción, deben ser capaces de soportar las cargas máximas a las que serán sometidos y ser compatibles con la operación a la que se destinen. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta87">Derivado del recorrido por el centro de trabajo, se observe que las correderas y guías de las escaleras portátiles que cuenten con ellas, estén en buen estado a simple vista.
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
          <label class="conteiner">7.7.2.3. Para las escalas portátiles, debe preverse en su uso que la inclinación cumpla con la siguiente condición: que la separación del punto de apoyo de la\
             escalera en su base con respecto a la vertical, corresponda a una distancia mínima equivalente de un peldaño por cada cuatro peldaños de altura. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta88">Derivado del recorrido por el centro de trabajo, se observe que en la inclinación de las escalas portátiles medida desde el punto de apoyo de la escalera en su base con respecto a la vertical, 
            es al menos la equivalente a un peldaño por cada cuatro peldaños de altura. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.2.4. Sólo se debe permitir el uso de escalas móviles cuando presenten: 
            <br>a) Condiciones de seguridad en su estructura; 
            <br>b) Peldaños completos y fijos.
            <br>c) Materiales o características antiderrapantes en los apoyos y peldaños (travesaños). 
            <br>d) Peldaños libres de grasa, aceite u otro producto que los haga resbalosos. 
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta89">Derivado del recorrido por el centro de trabajo, se observe que sólo usan las escalas móviles cuando presenten: 
            <br>- Condiciones de seguridad en su estructura. 
            <br>- Peldaños completos y fijos; 
            <br>- Materiales o características antiderrapantes en los apoyos y peldaños. 
            <br>- Peldaños libres de grasa, aceite u otro producto que los haga resbalosos.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.2.5. En la realización de trabajos eléctricos, se permite el
             uso de escalas móviles de material metálico, si están aisladas en sus apoyos y peldaños (travesaños). 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta90">Derivado del recorrido por el centro de trabajo, se observe, en su caso, que las escalas móviles metálicas usadas para realizar trabajos con equipos o líneas eléctricas, están 
            aisladas en sus apoyos y peldaños. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.7.2.6. Las escalas móviles deben contar con elementos que eviten el deslizamiento de su punto de apoyo o, en su caso, anclarse o sujetarse.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta91">Derivado del recorrido por el centro de trabajo, se observe que las escalas móviles cuentan con elementos que evitan el deslizamiento de su punto de apoyo o,en su caso, están 
            ancladas o sujetadas para evitar que se muevan. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.8.1. Cuando estén abiertos en sus costados, deben contar con barandales de al menos 90 cm ± 10 cm de altura.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta92">Derivado del recorrido por el centro de trabajo, se observe que en los costados abiertos de los puentes y plataformas elevadas por las que circulan trabajadores, se cuenta con 
            barandales de al menos 90 cm ± 10 cm de altura. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">7.8.2. La distancia libre medida sobre la superficie del piso de
             los pasadizos o plataformas elevadas por los que circulan trabajadores y el techo, o cualquier superficie superior, no debe ser menor de 200 cm.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta93">Derivado del recorrido por el centro de trabajo, se observe que la distancia entre los pisos de los pasadizos o plataformas elevadas por donde circulen trabajadores y el techo 
            o cualquier otra superficie superior, son iguales o mayores a dos metros. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.1. El aire que se extrae no debe contaminar otras áreas en donde se encuentren laborando otros trabajadores.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta94">Derivado del recorrido por el centro de trabajo, se observe que, en caso de existir sistemas de ventilación artificial, la salida del aire viciado no está dirigida hacia las áreas
            donde laboran trabajadores. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.2. El sistema debe iniciar su operación antes de que ingresen los trabajadores al área correspondiente para permitir la purga de los contaminantes.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta95">Derivado del recorrido por el centro de trabajo, se constate que los sistemas de ventilación artificial son puestos en operación antes de que los trabajadores 
            ingresen al área donde se encuentran las salidas de aire.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">8.3. Contar con un programa anual de mantenimiento preventivo o correctivo, a fin de que el sistema esté en condiciones de uso. El contenido del programa
             y los resultados de su ejecución deben conservarse por un año y estar registrados en bitácoras o cualquier otro medio, incluyendo los magnéticos. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta96">Un programa de mantenimiento para el sistema de ventilación artificial, ya sea preventivo o correctivo.
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
          <label for="pregunta97">El programa de mantenimiento tenga una programación de actividades al menos de un año
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
          <label for="pregunta98">El programa cuente con registros de su ejecución. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.1. El ancho de las puertas donde circulen vehículos deberá ser superior al ancho del vehículo más grande que circule por ellas. 
            Cuando éstas se destinen simultáneamente al tránsito de vehículos y trabajadores,
             deben contar con un pasillo que permita el tránsito seguro del trabajador, delimitado o señalado mediante franjas amarillas en el piso o en guarniciones.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta99">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- El ancho de las puertas de circulación de vehículos es superior al vehículo más grande que por ellas circule. 
            <br>- Si por el ancho de las puertas de circulación de vehículos también circulan trabajadores, existen delimitaciones para su tránsito.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.2. En caso de no contar con el espacio a que se refiere el inciso anterior, se debe colocar al menos un señalamiento de prohibición para el tránsito simultáneo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta100">Derivado del recorrido por el centro de trabajo, se observe que cuando no existan las delimitaciones a que se refiere el apartado 9.1, se cuenta con señalización que prohíba el
            tránsito simultáneo del vehículo y cualquier trabajador.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.3. Las áreas internas de tránsito de vehículos deben estar delimitadas o señalizadas. Las externas deben estar identificadas o señalizadas.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta101">Derivado del recorrido por el centro de trabajo, se observe que: 
            <br>- Las áreas internas de circulación de los vehículos -al interior de edificaciones techadas- se encuentran delimitadas o 
            señalizadas. 
            <br>- Las áreas externas de circulación de los vehículos se encuentran identificadas o señalizadas.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.4. Las áreas de carga y descarga deben estar delimitadas o señalizadas. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta102">Derivado del recorrido por el centro de trabajo, se observe que las áreas de carga y descarga de cualquier tipo de materiales o sustancias de vehículos,
            se encuentran delimitadas o señalizadas. 
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.5. Las vías de ferrocarril que se encuentren dentro de los centros de trabajo, deben contar con señalizaciones. Para los cruces de las vías 
            debe existir algún control del riesgo a través de señalamientos, barreras, guardabarreras o sistemas de aviso audibles o visibles. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta103">Derivado del recorrido por el centro de trabajo, se observe que en los cruces de vías de ferrocarril dentro del centro de trabajo, se cuenta con: 
            <br>- Señales. 
            <br>- Barreras.
            <br>- Guardabarreras.
            <br>- Sistemas de avisos audibles o visibles.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.6. El nivel de piso en ambos lados de los cruceros de las vías
             de ferrocarril, debe permitir el cruce libre de los vehículos para evitar que queden detenidos sobre la misma. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta104">Derivado del recorrido por el centro de trabajo, se observe que los pisos para el tránsito de vehículos en el cruce de las vías de ferrocarril, localizado 
            en el interior del centro de trabajo, se encuentran al mismo nivel.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.7. En su caso, los cambiavías deben contar con la señalización correspondiente para
             ubicar su posición; asimismo, los árboles de cambio deben contar con los dispositivos de seguridad para que sólo personal autorizado pueda operarlo. 
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta105">Derivado del recorrido por el centro de trabajo, se observe que de existir cambiavías en el interior del centro de trabajo, éstos cuentan con: 
            - Señalización para ubicar la posición que guardan.    - Dispositivos de seguridad para los árboles de cambio de vía, para que sólo personal autorizado pueda operarlos.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.8 a) Frenar y bloquear las ruedas de los vehículos, cuando éstos se encuentren detenidos.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta106">Derivado del recorrido por el centro de trabajo, se observe que las ruedas (llantas, neumáticos) de los vehículos que realizan operaciones de carga y descarga se encuentran bloqueadas.
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

        <!-- Disposicion -->
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">9.8 b) En el caso de muelles para carga y descarga de tráileres o autotanques, bloquear por lo menos una de las llantas en ambos lados del vehículo y colocar un yaque para inmovilizarlo cuando esté siendo cargado o descargado.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta107">Derivado del recorrido por el centro de trabajo, se observa que los tráileres o autotanques ubicados en los muelles de carga y descarga cuentan al menos con una de sus llantas 
            inmovilizada con un yaque. 
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
          <label class="conteiner">9.9. La velocidad máxima de circulación de los vehículos debe estar señalizada en las zonas de carga y descarga, en patios de maniobras, 
            en establecimientos y en otras áreas de acuerdo al tipo de actividades que en ellas se desarrollen para que sea segura la circulación de trabajadores, personal externo y vehículos. 
            Es responsabilidad del patrón fijar los límites de velocidad de los vehículos para que su circulación no sea un factor de riesgo en el centro de trabajo.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta108">Derivado del recorrido por el centro de trabajo, se observe que la velocidad máxima de circulación de los vehículos está señalizada, de acuerdo con el tipo de actividades que en 
            cada área se desarrolle, en: Zonas de carga y descarga. Patios de maniobras. Establecimientos entre otras áreas.
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



        <!-- TERMINA LOS CUESTIONARIOS -->
      
        <input type="submit" name="guardar_n0012008" value="Enviar" >
      </form>

      <!-- Creacion del boton para descargar el PDF -->

<div style="text-align: right; margin-top: 20px;">
  <button onclick="generatePDF()" id="botonDescarga" disabled style="background-color: #4CAF50; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Generar PDF</button>
  <button onclick="openGraphPDF()" style="background-color: #008CBA; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s; margin-left: 10px;">Abrir Gráfica</button>
</div>

<!-- Incluye la biblioteca jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<div>
    <!-- Nuevo botón para abrir el PDF de la gráfica -->
   
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
var totalPreguntas = 108;



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
            name: "NOM-001-STPS-2008",
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

<!-- aqui Termina-->







</body>
</html>