<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma041999 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma041999 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-004-STPS-1999.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-004-STPS-1999</h1>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n041999.php" method="post">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5. Obligaciones del patrón.
            </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
              Criterio de aceptación
          </h2>
      </div>
        <div class="conteiner">
            <label for="pregunta1">Mostrar a la autoridad laboral, cuando así lo solicite, los documentos que la presente Norma le obligue a elaborar.</label>
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
        <label for="pregunta2">Elaborar un estudio para analizar el riesgo potencial generado por la maquinaria y equipo en el que se debe hacer un inventario de todos los factores y condiciones peligrosas que afecten a la salud del trabajador.</label>
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
        <label for="pregunta3">En base al estudio para analizar el riesgo potencial, el patrón debe:
            <br>a) elaborar el Programa Específico de Seguridad e Higiene para la Operación y Mantenimiento de la Maquinaria y Equipo, darlo a conocer a los trabajadores y asegurarse de su cumplimiento.
            <br>b) contar con personal capacitado y un manual de primeros auxilios en el que se definan los procedimientos para la atención de emergencias. Se puede tomar como referencia la guía no obligatoria de la Norma Oficial Mexicana NOM-005-STPS-1998.
            <br>c) señalar las áreas de tránsito y de operación de acuerdo a lo establecido en las NOM-001-STPS-1993 y NOM-026-STPS-1998.
            <br>d) dotar a los trabajadores del equipo de protección personal de acuerdo a lo establecido en la NOM-017-STPS-1993.</label>
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
        <label for="pregunta4">Capacitar a los trabajadores para la operación segura de la maquinaria y equipo, así como de las herramientas que utilicen para desarrollar su actividad.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">6. Obligaciones de los trabajadores
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta5">Participar en la capacitación que proporcione el patrón.</label>
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
        <label for="pregunta6">Cumplir con las medidas que señale el Programa Específico de Seguridad e Higiene para la Operación y Mantenimiento de la Maquinaria y Equipo.</label>
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
        <label for="pregunta7">Reportar al patrón cuando los sistemas de protección y dispositivos de seguridad de la maquinaria y equipo se encuentren deteriorados, fuera de funcionamiento o bloqueados.</label>
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
        <label for="pregunta8">Utilizar el equipo de protección personal de acuerdo a las instrucciones de uso y mantenimiento proporcionadas por el patrón.
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
        <label for="pregunta9">Reportar al patrón cualquier anomalía de la maquinaria y equipo que pueda implicar riesgo.</label>
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
        <label class="conteiner">7. Programa específico de Seguridad para la Operación y Mantenimiento de la Maquinaria y Equipo.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta10">La capacitación que se debe otorgar a los trabajadores que realicen las actividades de mantenimiento.</label>
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
        <label for="pregunta11">La periodicidad y el procedimiento para realizar el mantenimiento preventivo, y en su caso el correctivo, a fin de garantizar que todos los componentes de la maquinaria y equipo estén en condiciones seguras de operación.</label>
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
        <label for="pregunta12">Al concluir el mantenimiento, los protectores y dispositivos deben estar en su lugar y en condiciones de funcionamiento.</label>
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
        <label for="pregunta13">Cuando se modifique o reconstruya una maquinaria o equipo, se deben preservar las condiciones de seguridad.</label>
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
        <label for="pregunta14">El bloqueo de energía se realizará antes y durante el mantenimiento de la maquinaria y equipo,
            cumpliendo además con lo siguiente:
            <br>1) deberá realizarse por el encargado del mantenimiento.
            <br>2) deberá avisarse previamente a los trabajadores involucrados, cuando se realice el bloqueo de energía.
            <br>3) identificar los interruptores, válvulas y puntos que requieran inmovilización.
            <br>4) bloquear la energía en tableros, controles o equipos, a fin de desenergizar, desactivar o impedir la operación de la maquinaria y equipo.
            <br>5) colocar tarjetas de aviso, cumpliendo con lo establecido en el apéndice A.
            <br>6) colocar los candados de seguridad.
            <br>7) asegurarse que se realizó el bloqueo.
            <br>8) avisar a los trabajadores involucrados cuando haya sido retirado el bloqueo. El trabajador que colocó las tarjetas de aviso, debe ser el que las retire.</label>
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
        <label for="pregunta15">Se debe llevar un registro del mantenimiento preventivo y correctivo que se le aplique a la maquinaria y equipo, indicando en que fecha se realizó; mantener este registro, al menos, durante doce meses.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8. Protectores y dispositivos de seguridad.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta16">Se debe verificar que los protectores cumplan con las siguientes condiciones:
            <br>a) proporcionar una protección total al trabajador.
            <br>b) permitir los ajustes necesarios en el punto de operación.
            <br>c) permitir el movimiento libre del trabajador.
            <br>d) impedir el acceso a la zona de riesgo a los trabajadores no autorizados.
            <br>e) evitar que interfieran con la operación de la maquinaria y equipo.
            <br>f) no ser un factor de riesgo por sí mismos.
            <br>g) permitir la visibilidad necesaria para efectuar la operación.
            <br>h) señalarse cuando su funcionamiento no sea evidente por sí mismo, de acuerdo a lo establecido en la NOM-026-STPS-1998.
            <br>i) de ser posible estar integrados a la maquinaria y equipo.
            <br>j) estar fijos y ser resistentes para hacer su función segura.
            <br>k) no obstaculizar el desalojo del material de desperdicio.</label>
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

      <div class="conteiner">
        <label for="pregunta17">Se debe incorporar una protección al control de mando para evitar un funcionamiento accidental.</label>
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

      <div class="conteiner">
        <label for="pregunta18">La maquinaria y equipo deben estar provistos de dispositivos de seguridad para paro de urgencia de fácil activación.</label>
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
        <label for="pregunta19">La maquinaria y equipo deben contar con dispositivos de seguridad para que las fallas de energía no generen condiciones de riesgo.</label>
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
        <label for="pregunta20">En el caso de las electroerosionadoras, adicionalmente a lo establecido en el punto anterior, se debe:
            <br>a) contar con un sistema indicador y controlador de freno.
            <br>b) prevenir un incremento significativo en el tiempo normal de paro en las electroerosionadoras con embrague de aire e inhibir una operación posterior en el caso de una falla del mecanismo de operación.</label>
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

      <div class="conteiner">
        <label for="pregunta21">En la maquinaria y equipo que cuente con interruptor final de carrera se debe cumplir que:
            <br>a) el interruptor final de carrera, esté protegido contra una operación no deseada.
            <br>b) el embrague de accionamiento mecánico, pueda desacoplarse al completar un ciclo.
            <br>c) el funcionamiento sólo se pueda restablecer a voluntad del trabajador.</label>
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
        <!-- Repite el bloque anterior para cada pregunta -->
        
        <input type="submit" value="Enviar" name="guardar_n041999">

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
var totalPreguntas = 21;


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
            name: "NOM-004-STPS-1999",
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