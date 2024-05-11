<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma292011 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma292011 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-029-STPS-2011.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-029-STPS-2011</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n292011.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">Prohibir que menores de 16 años y mujeres gestantes realicen actividades de mantenimiento 
                de las instalaciones electricas.
            </label>
        </div>
        <hr class="styled-separator">

        <div class="conteiner">
            <label for="pregunta1">¿El patrón cumple cuando, al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 1, del numeral 16.4, se constata que en el centro de trabajo se prohíbe 
                que menores de 16 años y mujeres gestantes realicen actividades de mantenimiento de las instalaciones eléctricas?</label>
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
        <label for="pregunta2">¿El patrón cumple cuando, al realizar un recorrido por el centro de trabajo, se constata que no existen menores de 16 años y mujeres gestantes realizando actividades de mantenimiento de las 
            instalaciones eléctricas?</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.2 Contar con el plan de trabajo para los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, de conformidad con lo dispuesto en el Capítulo 7 de la presente Norma.                                                          
          <br>7.1 Por cada actividad de mantenimiento de las instalaciones eléctricas se deberá contar con un plan de trabajo que considere:
            <br>a)    La descripción de la actividad por desarrollar;
            <br>b)    El nombre del jefe de trabajo;
            <br>c)    El nombre de los trabajadores que intervienen en la actividad;
            <br>d)    El tiempo estimado para realizar la actividad;
            <br>e)    El lugar donde se desarrollará la actividad;
            <br>f)     En su caso, la autorización, la cual deberá contener al menos:
            <br>1)   El nombre del trabajador autorizado;
            <br>2)   El nombre y firma del patrón o de la persona que éste designe para otorgar la autorización;
            <br>3)   El tipo de trabajo por desarrollar;
            <br>4)   El área o lugar donde se desarrollará la actividad;
            <br>5)   La fecha y hora de inicio de las actividades, y
            <br>6)   El tiempo estimado de terminación;
            <br>g)    Los riesgos potenciales determinados con base en lo dispuesto en el numeral 7.2;
            <br>h)    El equipo de protección personal y los equipos de trabajo, maquinaria, herramientas e implementos de protección aislante que se requieran para realizar la actividad;
            <br>i)     Las medidas de seguridad que se requieran, de acuerdo con los riesgos que se puedan presentar al desarrollar el trabajo, y
            <br>j)     Los procedimientos de seguridad para realizar las actividades            
        </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
      </div>
      <div class="conteiner">
          <label for="pregunta3">¿El patrón cumple cuando:
            <br>-  El plan de trabajo considera:La descripción de la actividad por desarrollar; El nombre del jefe de trabajo; El nombre de los trabajadores que intervienen en la actividad; El tiempo estimado 
            para realizar la actividad; El lugar donde se desarrollará la actividad?</label>
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
          <label for="pregunta4">¿El patrón cumple cuando:
            <br>En su caso, la autorización, misma que contiene al menos: El nombre del trabajador autorizado; El nombre y firma del patrón o de la persona que éste designe para otorgar la autorización; El tipo 
            de trabajo por desarrollar; El área o lugar donde se desarrollará la actividad; La fecha y hora de inicio de las actividades, y El tiempo estimado de terminación; Los riesgos potenciales determinados 
            con base en lo dispuesto en el numeral 7.2; El equipo de protección personal y los equipos de trabajo, maquinaria, herramientas e implementos de protección aislante que se requieren para 
            realizar la actividad?</label>
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
          <label for="pregunta5">¿El patrón cumple cuando:
            <br>Las medidas de seguridad que se requieren, de acuerdo con los riesgos que se pueden presentar al desarrollar el trabajo, y Los procedimientos de seguridad para realizar las actividades?</label>
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
          <label class="conteiner">5.2 Contar con el plan de trabajo para los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, de conformidad con lo dispuesto en el Capítulo 7 de la presente Norma.                                                          
            <br>7.2 Para la determinación de los riesgos potenciales se deberá considerar, según aplique, lo siguiente:
            <br>a)    La exposición del trabajador a los peligros relacionados con:
            <br>1)   Las instalaciones inmediatas a la zona de trabajo;
            <br>2)   Los peligros identificados fuera de la zona de trabajo, y
            <br>3)   Los peligros originados por otro tipo de actividades en las inmediaciones del lugar donde se realizará el trabajo;
            <br>b)    Las consecuencias por las actividades a realizar en las inmediaciones del lugar donde se realizará el trabajo;
            <br>c)    La ubicación del equipo eléctrico, la zona y distancias de seguridad, de acuerdo con la tensión eléctrica y las fallas probables;
            <br>d)    Las características de los equipos de trabajo, maquinaria, herramientas e implementos de protección aislante a utilizar, y los movimientos a realizar para evitar actos o condiciones inseguras;
            <br>e)    Las partes del equipo que requieran protección física para evitar el contacto con partes vivas, tales como líneas energizadas y bancos de capacitores, entre otros;
            <br>f)     Las maniobras necesarias a realizar antes y después del mantenimiento de las instalaciones eléctricas, en especial las relacionadas con la apertura o cierre de los dispositivos de protección y/o de los medios de conexión y desconexión;
            <br>g)    El equipo de protección personal y los equipos de trabajo, maquinaria, herramientas e implementos de protección aislante con que se cuenta y los que se requieran para el tipo de instalaciones eléctricas a las que se dará mantenimiento;
            <br>h)    Los procedimientos de seguridad con que se cuenta para realizar las actividades;
            <br>i)     Las instalaciones temporales y su impacto en las operaciones y actividades a realizar, en su caso, y
            <br>j)     La frecuencia con la que se ejecuta la actividad.
          </label>
        </div>
      <div>
        <h2>
            Disposición
        </h2>
      </div>
      <hr class="styled-separator">

        <div class="conteiner">
          <label for="pregunta6">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente: La exposición del trabajador a los peligros 
            relacionados con: Las instalaciones inmediatas a la zona de trabajo; Los peligros identificados fuera de la zona de trabajo, y Los peligros originados por otro tipo de actividades en las inmediaciones 
            del lugar donde se realiza el trabajo?</label>
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
          <label for="pregunta7">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente: Las consecuencias por las actividades 
            a realizar en las inmediaciones del lugar donde se realiza el trabajo?</label>
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
          <label for="pregunta8">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente: La ubicación del equipo eléctrico, 
            la zona y distancias de seguridad, de acuerdo con la tensión eléctrica y las fallas probables?</label>
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
          <label for="pregunta9">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente: Las características de los equipos de 
            trabajo, maquinaria, herramientas e implementos de protección aislante a utilizar, y los movimientos a realizar para evitar actos o condiciones inseguras; Las partes del equipo que requieren 
            protección física para evitar el contacto con partes vivas, tales como líneas energizadas y bancos de  apacitares, entre otros?</label>
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
          <label for="pregunta10">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente:  Las maniobras necesarias a realizar antes 
            y después del mantenimiento de las instalaciones eléctricas, en especial las relacionadas con la apertura o cierre de los dispositivos de protección y/o de los medios de conexión y desconexión; 
            El equipo de protección personal y los equipos de trabajo, maquinaria, herramientas e implementos de protección aislante con que se cuente y los que se requieren para el tipo de instalaciones 
            eléctricas a las que se de mantenimiento?</label>
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
          <label for="pregunta11">¿El patrón cumple cuando presenta evidencia documental de que para la determinación de los riesgos potenciales considera, según aplique, lo siguiente: Los procedimientos de seguridad con 
            que se cuente para realizar las actividades; Las instalaciones temporales y su impacto en las operaciones y actividades a realizar, en su caso, y La frecuencia con la que se ejecuta la actividad?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.2 Contar con el plan de trabajo para los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, de conformidad con lo dispuesto en el Capítulo 7 de la presente Norma.                                                             
            <br>7.3 a) Proporcionarse al trabajador que realizará la actividad.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta12">¿El patrón cumple cuando al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 1, del numeral 16.4, se constata que el plan de trabajo se proporciona 
            al trabajador que realiza la actividad?</label>
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
          <label for="pregunta13">¿El patrón cumple cuando, al realizar un recorrido por el centro laboral, se constata que el plan de trabajo se proporciona al trabajador que realiza la actividad?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.2 Contar con el plan de trabajo para los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, de conformidad con lo dispuesto en el Capítulo 7 de la presente Norma.                                                             
            <br>7.3 b) Ser aprobado por el patrón o por el responsable de los servicios preventivos de seguridad y salud en el trabajo o por el jefe de trabajo.                                            
            <br>7.4. El plan de trabajo se deberá revisar y, en su caso, actualizar cuando se modifiquen los procedimientos de seguridad, o se realice cualquier cambio en su contenido que altere las condiciones en las que se ejecuta el mantenimiento de las instalaciones eléctricas.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta14">¿El patrón cumple cuando presenta evidencia documental de que el plan de trabajo:
            Es aprobado por el patrón o por el responsable de los servicios preventivos de seguridad y salud en el trabajo o por el jefe de trabajo, y Se revisa y, en su caso, actualiza cuando se modifican 
            los procedimientos de seguridad, o se realiza cualquier cambio en su contenido que altera las condiciones en las que se ejecuta el mantenimiento de las instalaciones eléctricas.?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.3. Contar con el diagrama unifilar actualizado de la instalación eléctrica del centro de trabajo, con base en lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan, y con el cuadro general de cargas instaladas por circuito derivado, el cual deberá estar disponible para el personal que realice el mantenimiento de dichas instalaciones.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta15">¿El patrón cumple cuando:
            Presenta evidencia documental de que cuenta con el diagrama unifilar actualizado de la instalación eléctrica del centro de trabajo, con base en lo dispuesto por la NOM-001-SEDE-2005, 
            o las que la sustituyan, y con el cuadro general de cargas instaladas por circuito derivado?</label>
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
          <label for="pregunta16">¿El patrón cumple cuando:
            <br>El diagrama unifilar contiene lo siguiente: La superficie en metros cuadrados del edificio u otra estructura alimentada por cada alimentador; La carga total conectada antes de aplicar los factores 
            de demanda; Los factores de demanda aplicados; La carga calculada después de aplicar los factores de demanda;El tipo, tamaño nominal y longitud de los conductores utilizados, y La caída de 
            tensión de cada circuito derivado y circuito alimentador?</label>
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
          <label for="pregunta17">¿El patrón cumple cuando al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 1, del numeral 16.4, se constata que el diagrama unifilar está disponible 
            para el personal que realiza el mantenimiento de las instalaciones eléctricas?</label>
          <div class="radio-buttons">
            <input type="radio" id="p17-0" name="pregunta17" value="0">
            <label for="p17-0">0</label>
            <input type="radio" id="p17-1" name="pregunta17" value="1">
            <label for="p17-1">1</label>
            <input type="radio" id="p17-2" 18ame="pregunta17" value="2">
            <label for="p17-2">2</label>
            <input type="radio" id="p17-3" name="pregunta17" value="3">
            <label for="p17-3">3</label>
            <input type="radio" id="p17-4" name="pregunta17" value="4">
            <label for="p17-4">4</label>
          </div>
          <textarea id="comentario17" name="comentario17" placeholder="Comentario"></textarea>
        </div>
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.4 Contar con los procedimientos de seguridad para las actividades de mantenimiento de las instalaciones eléctricas; la selección y uso del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante, y la colocación del sistema de puesta a tierra temporal, de acuerdo con lo establecido en el Capítulo 8 de esta Norma.                                                                    8. Procedimientos de seguridad para realizar actividades de mantenimiento de las instalaciones eléctricas
            <br>8.1 Los procedimientos de seguridad para realizar las actividades de mantenimiento de las instalaciones eléctricas deberán contemplar, según aplique, lo siguiente:
            <br>a)    La indicación para que toda instalación eléctrica se considere energizada hasta que se realice la comprobación de ausencia de tensión eléctrica, mediante equipos o instrumentos de medición destinados para tal efecto; se efectúe la puesta a tierra para la liberación de energía almacenada, y la instalación eléctrica sea puesta a tierra eficaz;
            <br>b)    Las instrucciones para comprobar de forma segura la presencia o ausencia de la tensión eléctrica en equipos o instalaciones eléctricas a revisar, por medio del equipo de medición o instrumentos que se requieran;
            <br>c)    La indicación para la revisión y ajuste de la coordinación de protecciones;
            <br>d)    Las instrucciones para bloquear equipos o colocar señalización, candados, o cualquier otro dispositivo, a efecto de garantizar que el circuito permanezca desenergizado cuando se realizan actividades de mantenimiento;
            <br>e)    Las instrucciones para verificar, antes de realizar actividades de mantenimiento, que los dispositivos de protección, en su caso, estén en condiciones de funcionamiento;
            <br>f)     Las instrucciones para verificar que la puesta a tierra fija cumple con su función, o para colocar puestas a tierra temporales, antes de realizar actividades de mantenimiento;
            <br>g)    Las medidas de seguridad por aplicar, en su caso, cuando no se concluyan las actividades de mantenimiento de las instalaciones eléctricas en la jornada laboral, a fin de evitar lesiones al
            <br>personal;
            <br>h)    Las instrucciones para realizar una revisión del área de trabajo donde se efectuó el mantenimiento, después de haber realizado los trabajos, con el objeto de asegurarse que ha quedado libre de equipo de trabajo, maquinaria, herramientas e implementos de protección aislante, e
            <br>i)     Las instrucciones para que al término de dicha revisión, se retiren, en su caso, los candados, señales o cualquier otro dispositivo utilizado para bloquear la energía y finalmente cerrar el circuito.
            <br>8.2 Los procedimientos de seguridad para el desarrollo de las actividades de mantenimiento de las instalaciones eléctricas, deberán contener lo siguiente:
            <br>a)    El diagrama unifilar con el cuadro general de cargas correspondiente a la zona donde se realizará el mantenimiento, y
            <br>b)    La autorización por escrito otorgada a los trabajadores, en su caso.
            <br>8.3 Los procedimientos para la selección y uso del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante, deberán contemplar lo siguiente:
            <br>a)    La selección de acuerdo con las tensiones eléctricas de operación del circuito, en caso de trabajar con partes vivas;
            <br>b)    La forma de entregarlos a los trabajadores y/o que estén disponibles para su consulta;
            <br>c)    Las instrucciones para su uso en forma segura;
            <br>d)    Las instrucciones para su almacenamiento, transporte o reemplazo, y
            <br>e)    Las instrucciones para su revisión y mantenimiento.
            <br>8.4 El procedimiento para la colocación del sistema de puesta a tierra temporal deberá contemplar, al menos, que:
            <br>a)    Se empleen conductores, elementos y dispositivos específicamente diseñados para este fin y de la capacidad de conducción adecuada;
            <br>b)    Se conecte la puesta a tierra lo más cerca posible del lugar de trabajo y en ambas partes del mismo para que sea más efectiva;
            <br>c)    Se respete la secuencia para conectar y desconectar la puesta a tierra de la manera siguiente:
            <br>1)   Conexión: Se conecten los conductores de puesta a tierra al sistema de tierras y, a continuación, a la instalación por proteger, mediante pértigas o dispositivos especiales, tales como conductores de líneas, electroductos, entre otros, y
            <br>2)   Desconexión: Se proceda a la inversa, es decir, primeramente se retiren de la instalación los conductores de la puesta a tierra y a continuación se desconecten del electrodo de puesta a tierra;
            <br>d)    Se asegure que todas las cuchillas de seccionadores de puesta a tierra queden en posición de cerrado, cuando la puesta a tierra se hace por medio de estos equipos;
            <br>e)    Se compruebe que la puesta a tierra temporal tenga contacto eléctrico, tanto con las partes metálicas que se deseen poner a tierra, como con el sistema de puesta a tierra;
            <br>f)     Se impida que en el transcurso de las actividades de conexión de la puesta a tierra, el trabajador esté en contacto simultáneo con dos circuitos de puesta a tierra que no estén unidos eléctricamente, ya que éstos pueden encontrarse a potenciales diferentes;
            <br>g)    Se verifique que las partes metálicas no conductoras de máquinas, equipos y aparatos con las que pueda tener contacto el trabajador de manera accidental, estén puestas a tierra, especialmente las de tipo móvil;
            <br>h)    Se coloque un puente conductor puesto a tierra en la zona de trabajo antes de efectuar la
            desconexión de la puesta a tierra en servicio. El trabajador que realice esta actividad deberá estar aislado para evitar formar parte del circuito eléctrico, e
            <br>i)     Se suspenda el trabajo durante el tiempo de tormentas eléctricas y pruebas de líneas, cuando se trabaje en el sistema de tierras de una instalación.          
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta18">¿El patrón cumple cuando presenta evidencia documental de que:
            Cuenta con los procedimientos de seguridad para: Las actividades de mantenimiento de las instalaciones eléctricas; La selección y uso del equipo de trabajo, maquinaria, herramientas e 
            implementos de protección aislante, y La colocación del sistema de puesta a tierra temporal?</label>
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
          <label for="pregunta19">¿El patrón cumple cuando presenta evidencia documental de que:
            Los procedimientos de seguridad para realizar las actividades de mantenimiento de las instalaciones eléctricas contemplan, según aplique, lo siguiente: La indicación para que toda instalación 
            eléctrica se considera energizada hasta que se realice la comprobación de ausencia de tensión eléctrica, mediante equipos o instrumentos de medición destinados para tal efecto; se efectúa la 
            puesta a tierra para la liberación de energía almacenada, y la instalación eléctrica es puesta a tierra eficaz; Las instrucciones para comprobar de forma segura la presencia o ausencia de la tensión 
            eléctrica en equipos o instalaciones eléctricas a revisar, por medio del equipo de medición o instrumentos que se requieran; La indicación para la revisión y ajuste de la coordinación de protecciones; 
            Las instrucciones para bloquear equipos o colocar señalización, candados, o cualquier otro dispositivo, a efecto de garantizar que el circuito permanezca desenergizado cuando se realizan 
            actividades de mantenimiento?</label>
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
          <label for="pregunta20">¿El patrón cumple cuando presenta evidencia documental de que:
            Los procedimientos de seguridad para realizar las actividades de mantenimiento de las instalaciones eléctricas contemplan, según aplique, lo siguiente: Las instrucciones para verificar, antes 
            de realizar actividades de mantenimiento, que los dispositivos de protección, en su caso, están en condiciones de funcionamiento; Las instrucciones para verificar que la puesta a tierra fija 
            cumple con su función, o para colocar puestas a tierra temporales, antes de realizar actividades de mantenimiento; Las medidas de seguridad por aplicar, en su caso, cuando no se concluyen 
            las actividades de mantenimiento de las instalaciones eléctricas en la jornada laboral, a fin de evitar lesiones al personal; Las instrucciones para realizar una revisión del área de trabajo donde se 
            efectuó el mantenimiento, después de haber realizado los trabajos, con el objeto de asegurarse que ha quedado libre de equipo de trabajo, maquinaria, herramientas e implementos de protección 
            aislante, y Las instrucciones para que al término de dicha revisión, se retiren, en su caso, los candados, señales o cualquier otro dispositivo utilizado para bloquear la energía y, finalmente, cerrar el 
            circuito?</label>
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
          <label for="pregunta21">¿El patrón cumple cuando presenta evidencia documental de que:
            El procedimiento para la colocación del sistema de puesta a tierra temporal contempla, al menos, que: Se emplean conductores, elementos y dispositivos específicamente diseñados para este fin 
            y de la capacidad de conducción adecuada; Se conecta la puesta a tierra lo más cerca posible del lugar de trabajo y en ambas partes del mismo para que sea más efectiva; Se respeta la secuencia 
            para conectar y desconectar la puesta a tierra de la manera siguiente: Conexión: Se conectan los conductores de puesta a tierra al sistema de tierras y, a continuación, a la instalación por proteger, 
            mediante pértigas o dispositivos especiales a la instalación a proteger, tales como conductores de líneas o electroductos, entre otros, y Desconexión: Se procede a la inversa, es decir, primeramente 
            se retiran de la instalación los conductores de la puesta a tierra y a continuación se desconectan del electrodo de puesta a tierra?</label>
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
          <label for="pregunta22">¿El patrón cumple cuando presenta evidencia documental de que:
            El procedimiento para la colocación del sistema de puesta a tierra temporal contempla, al menos, que: Se emplean conductores, elementos y dispositivos específicamente diseñados para este fin 
            y de la capacidad de conducción adecuada; Se conecta la puesta a tierra lo más cerca posible del lugar de trabajo y en ambas partes del mismo para que sea más efectiva; Se respeta la secuencia 
            para conectar y desconectar la puesta a tierra de la manera siguiente: Conexión: Se conectan los conductores de puesta a tierra al sistema de tierras y, a continuación, a la instalación por proteger, 
            mediante pértigas o dispositivos especiales a la instalación a proteger, tales como conductores de líneas o electroductos, entre otros, y Desconexión: Se procede a la inversa, es decir, primeramente 
            se retiran de la instalación los conductores de la puesta a tierra y a continuación se desconectan del electrodo de puesta a tierra?</label>
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
          <label class="conteiner">5.5 Realizar las actividades de mantenimiento de las instalaciones eléctricas sólo con personal capacitado.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta23">¿El patrón cumple cuando presenta evidencia documental de que realiza las actividades de mantenimiento de las instalaciones eléctricas sólo con personal capacitado?</label>
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
          <label class="conteiner">5.6 Proporcionar al personal que desarrolle las actividades de mantenimiento de las instalaciones eléctricas, el equipo de trabajo, maquinaria, herramientas e implementos de protección aislante que garanticen su seguridad, según el nivel de tensión o corriente de alimentación de la instalación eléctrica.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta24">¿El patrón cumple cuando:                                                      
            <br>-  Al realizar un recorrido por el centro de trabajo, se constata que proporciona al personal que desarrolla las actividades de mantenimiento de las instalaciones eléctricas, el equipo de trabajo, 
            maquinaria, herramientas e implementos de protección aislante que garanticen su seguridad, según el nivel de tensión o corriente de alimentación de la instalación eléctrica?</label>
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
          <label for="pregunta25">¿Al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 1, del numeral 16.4, se constata que proporciona al personal que desarrolla las actividades de 
            mantenimiento de las instalaciones eléctricas, el equipo de trabajo, maquinaria, herramientas e implementos de protección aislante que garanticen su seguridad, según el nivel de tensión 
            o corriente de alimentación de la instalación eléctrica?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.7 Elaborar y dar seguimiento a un programa de revisión y conservación del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante utilizados en las actividades de mantenimiento de las instalaciones eléctricas, el cual deberá contener al menos, las fechas de realización, el responsable de su cumplimiento y el resultado de su ejecución.</label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>

        <div class="conteiner">
          <label for="pregunta26">¿Elabora y da seguimiento a un programa de revisión y conservación del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante utilizados en las actividades de 
            mantenimiento de las instalaciones eléctricas?</label>
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
          <label for="pregunta27">¿El programa de revisión y conservación del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante contiene al menos:   Las fechas de realización, El responsable 
            de su cumplimiento, El resultado de su ejecución?</label>
          <div class="radio-buttons">
            <input type="radio" id="p27-0" name="pregunta27" value="0">
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.8 Contar con procedimientos de revisión, conservación, almacenamiento y reemplazo del equipo de trabajo, maquinaria, herramientas e implementos de protección aislante, para realizar las actividades de mantenimiento de las instalaciones eléctricas.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>

        <div class="conteiner">
          <label for="pregunta28">¿El patrón cumple cuando presenta evidencia documental de que cuenta con procedimientos de revisión, conservación, almacenamiento y reemplazo del equipo de trabajo, maquinaria, 
            herramientas e implementos de protección aislante, para realizar las actividades de mantenimiento de las instalaciones eléctricas?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.9 Proporcionar a los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, el equipo de protección personal, conforme a lo dispuesto por la NOM-017-STPS-2008, o las que la sustituyan.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>

        <div class="conteiner">
          <label for="pregunta29">¿El patrón cumple cuando:
            Al realizar un recorrido por el centro de trabajo, se constata que se proporciona a los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, el equipo de protección 
            personal, conforme a lo dispuesto por la NOM-017-STPS-2008, o las que la sustituyan?</label>
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
          <label for="pregunta30">¿Al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 1, del numeral 16.4, se constata que proporciona a los trabajadores que realizan actividades de 
            mantenimiento de las instalaciones eléctricas, el equipo de protección personal conforme a lo dispuesto por la NOM-017-STPS-2008, o las que la sustituyan?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.9 Proporcionar a los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, el equipo de protección personal, conforme a lo dispuesto por la NOM-017-STPS-2008, o las que la sustituyan.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>

        <div class="conteiner">
          <label for="pregunta31">¿El patrón cumple cuando:
            Al realizar un recorrido por el centro de trabajo, se constata que se proporciona a los trabajadores que realizan actividades de mantenimiento de las instalaciones eléctricas, el equipo de protección 
            personal, conforme a lo dispuesto por la NOM-017-STPS-2008, o las que la sustituyan?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.10 Contar con procedimientos para el uso, revisión, reposición, limpieza, limitaciones, resguardo y disposición final del equipo de protección personal, basados en la información del fabricante, y de conformidad con lo que señala la NOM-017-STPS-2008, o las que la sustituyan.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
            Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta32">¿El patrón cumple cuando presenta evidencia documental de que cuenta con procedimientos para el uso, revisión, reposición, limpieza, limitaciones, resguardo y disposición final del equipo 
            de protección personal, basados en la información del fabricante, y de conformidad con lo que señala la NOM-017-STPS-2008, o las que la sustituyan?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas. 
            <br>9. Medidas de seguridad generales para realizar trabajos de mantenimiento de las instalaciones eléctricas
            <br>9.1 Efectuar con personal autorizado y capacitado los trabajos de mantenimiento de las instalaciones eléctricas en lugares peligrosos, tales como altura, espacios confinados, subestaciones y líneas energizadas.
            <br>9.2 Delimitar la zona de trabajo para realizar actividades de mantenimiento de las instalaciones eléctricas, o sus proximidades, y colocar señales de seguridad que:
            <br>a)    Indiquen a personas no autorizadas la prohibición de:
            <br>1)   Entrar a la subestación o energizar el equipo o máquinas eléctricas, y
            <br>2)   Operar, manejar o tocar los dispositivos eléctricos;
            <br>b)    Identifiquen los dispositivos de enclavamiento de uno a cuatro candados, y
            <br>c)    Definan el área en mantenimiento mediante la colocación de:
            <br>1)   Cintas, cuerdas o cadenas de plástico de color rojo o anaranjado y mosquetones para su enganche;
            <br>2)   Barreras extendibles de color rojo o anaranjado provistas de cuerdas en sus extremos para su sujeción;
            <br>3)   Banderolas;
            <br>4)   Estandartes;
            <br>5)   Distintivos de color rojo para la señalización de la zona de trabajo, o
            <br>6)   Tarjetas de libranza con información de quién realiza, quién autoriza, cuándo se inició y cuándo finalizará el trabajo por realizar.
            <br>9.3 Utilizar para el mantenimiento de las instalaciones eléctricas, conforme al trabajo por desarrollar, según aplique, equipo de trabajo, maquinaria, herramientas e implementos de protección aislante y, de ser necesario, uno o más de los equipos o materiales siguientes:
            <br>a)    Tarimas o alfombras aislantes;
            <br>b)    Vainas y caperuzas aislantes;
            <br>c)    Comprobadores o discriminadores de tensión eléctrica, de la clase y tensión adecuadas al sistema;
            <br>d)    Herramientas aisladas;
            <br>e)    Material de señalización, tales como discos, barreras o banderines, entre otros;
            <br>f)     Lámparas portátiles, o
            <br>g)    Transformadores de aislamiento.
            <br>9.4 Comprobar, para la realización de trabajos de mantenimiento de las instalaciones eléctricas, al menos que:
            <br>a)    Las instalaciones eléctricas se encuentren de conformidad con el diagrama unifilar y el plan de trabajo;
            <br>b)    Se evite trabajar con conductores o equipos energizados y, en caso de que sea estrictamente necesario, realizarlo si se cuenta con el equipo de protección personal y las herramientas o implementos de trabajo requeridos;
            <br> 
            <br>c)    Se prohíba a los trabajadores usar alhajas o elementos metálicos durante la ejecución de las actividades;
            <br>d)    Se aplique el procedimiento correspondiente a conductores o equipo energizado, antes de efectuar cualquier operación para:
            <br>1)   Interrumpir el flujo de corriente eléctrica;
            <br>2)   Verificar con equipo de medición la ausencia de tensión eléctrica en los conductores o equipo eléctrico;
            <br>3)   Poner a tierra y en cortocircuito los conductores y equipo eléctrico;
            <br>4)   Aplicar otras medidas preventivas necesarias, como la colocación de candados o avisos, que impidan el restablecimiento de la corriente eléctrica, y
            <br>5)   Proteger los elementos con tensión situados en las inmediaciones, contra el contacto accidental;
            <br>e)    Se mantenga legible la identificación de tableros, gabinetes, interruptores, transformadores, entre otros, así como sus características eléctricas;
            <br>f)     Se cuente con las herramientas y equipo de protección personal adecuados a cada tarea, tales como: guantes dieléctricos, esteras y mantas aislantes, en número suficiente y de acuerdo con el potencial eléctrico en el que se va a trabajar;
            <br>g)    Se impida desplazar los aparatos eléctricos portátiles mientras estén conectados a la fuente de energía;
            <br>h)    Se evite emplear herramientas y aparatos eléctricos portátiles en atmósferas inflamables o explosivas, a menos que cumplan con las especificaciones del equipo a prueba de explosión;
            <br>i)     Se apliquen los procedimientos de seguridad que se requieran, con base en lo establecido en el Capítulo 8 de esta Norma;
            <br>j)     Se cumpla, cuando se empleen a la intemperie aparatos de conexión de tipo abierto, con lo siguiente:
            <br>1)   Proteger a todos los elementos bajo tensión eléctrica contra contactos accidentales, mediante cubiertas o bien colocándolos a una altura tal que no represente un riesgo de contacto accidental;
            <br>2)   Conservar las distancias de seguridad del espacio de trabajo en torno a los elementos con tensión o energizados, según lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan, y
            <br>3)   Proteger los aparatos de conexión, transformadores y demás aparatos eléctricos energizados, con cercas metálicas que se encuentren puestas a tierra;
            <br>k)    Sean puestos a tierra el armazón de las herramientas y los aparatos de mano y portátiles, excepto el de las herramientas con doble aislamiento;
            <br>l)     Se someta el sistema de puesta a tierra de toda la instalación eléctrica a la prueba de resistencia a tierra y de continuidad, al menos una vez por año, y se registren sus valores;
            <br>m)   Se realice una revisión en todo el circuito o red eléctrica en el que se efectuó el mantenimiento, después de haber realizado los trabajos;
            <br>n)    Se energicen los circuitos, conductores o equipos, después de haber efectuado cualquier trabajo, únicamente por orden del jefe de trabajo, y
            <br>o)    Se provea de un interruptor de protección de falla a tierra para proteger a los trabajadores, cuando realicen actividades de mantenimiento.
            <br>9.5 Cumplir, cuando se utilicen herramientas o lámparas portátiles en el mantenimiento de las instalaciones eléctricas de baja tensión, con las condiciones de seguridad siguientes:
            <br>a)    Se cuente con cables de alimentación de las herramientas o lámparas portátiles perfectamente
            <br>aislados y en buen estado;
            <br>b)    Se utilicen tensiones de alimentación de 24 volts o menos, en el caso de las herramientas y lámparas portátiles para los trabajos en zanjas, pozos, galerías y calderas, entre otros;
            <br>c)    Se provean las lámparas portátiles con mango aislante, dispositivo protector de la bombilla y conductor de aislamiento de uso rudo o extra rudo, y
            <br>d)    Se cumpla con al menos una de las condiciones siguientes, en aquellos casos en que la herramienta portátil tenga que funcionar con una tensión eléctrica superior a los 24 volts:
            <br>1)   Usar guantes dieléctricos aislantes;
            <br>2)   Disponer de doble aislamiento en la herramienta portátil;
            <br>3)   Contar con conexión de puesta a tierra;
            <br>4)   Contar con protección de los defectos de aislamiento de la herramienta, mediante relevadores diferenciales, o
            <br>5)   Utilizar transformadores de aislamiento.          
          </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
      </div>
        <div class="conteiner">
          <label for="pregunta33">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Efectúa con personal autorizado y capacitado los trabajos de mantenimiento de las instalaciones eléctricas en lugares peligrosos, tales como altura, espacios 
            confinados, subestaciones y líneas energizadas?</label>
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
          <label for="pregunta34">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Delimita la zona de trabajo para realizar actividades de mantenimiento de las instalaciones eléctricas, o en sus proximidades, y coloca señales de seguridad 
            que: Indican a personas no autorizadas la prohibición de: Entrar a la subestación o energizar el equipo o máquinas eléctricas, y Operar, manejar o tocar los dispositivos eléctricos;?</label>
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
          <label for="pregunta35">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Identifican los dispositivos de enclavamiento de uno a cuatro candados, y Definen el área en mantenimiento mediante la colocación de: Cintas, cuerdas o 
            cadenas de plástico de color rojo o anaranjado y mosquetones para su enganche; Barreras extendibles de color rojo o anaranjado provistas de cuerdas en sus extremos para su sujeción; Banderolas; 
            Estandartes; Distintivos de color rojo para la señalización de la zona de trabajo, o Tarjetas de libranza con información de quién realiza, quién autoriza, cuándo se inició y cuándo finalizará el trabajo 
            por realizar?</label>
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

        <div class="conteiner">
          <label for="pregunta36">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Utiliza para el mantenimiento de las instalaciones eléctricas, conforme al trabajo por desarrollar, según aplique, equipo de trabajo, maquinaria, herramientas 
            e implementos de protección aislante y, de ser necesario, uno o más de los equipos o materiales siguientes: Tarimas o alfombras aislantes; Vainas y caperuzas aislantes; Comprobadores o 
            discriminadores de tensión eléctrica, de la clase y tensión adecuadas al sistema; Herramientas aisladas; Material de señalización, tales como discos, barreras o banderines, entre otros; Lámparas 
            portátiles, o Transformadores de aislamiento?</label>
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

        <div class="conteiner">
          <label for="pregunta37">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Utiliza para el mantenimiento de las instalaciones eléctricas, conforme al trabajo por desarrollar, según aplique, equipo de trabajo, maquinaria, herramientas 
            e implementos de protección aislante y, de ser necesario, uno o más de los equipos o materiales siguientes: Tarimas o alfombras aislantes; Vainas y caperuzas aislantes; Comprobadores o 
            discriminadores de tensión eléctrica, de la clase y tensión adecuadas al sistema; Herramientas aisladas; Material de señalización, tales como discos, barreras o banderines, entre otros; Lámparas 
            portátiles, o Transformadores de aislamiento?</label>
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

        <div class="conteiner">
          <label for="pregunta38">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Comprueba, para la realización de trabajos de mantenimiento de las instalaciones eléctricas, al menos que: Las instalaciones eléctricas se encuentran de 
            conformidad con el diagrama unifilar y el plan de trabajo; Se evita trabajar con conductores o equipos energizados y, en caso de que sea estrictamente necesario, se realiza si se cuenta con el 
            equipo de protección personal y las herramientas o implementos de trabajo requeridos; Se prohíbe a los trabajadores que usen alhajas o elementos metálicos durante la ejecución de las actividades?</label>
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

        <div class="conteiner">
          <label for="pregunta39">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se aplica el procedimiento correspondiente a conductores o equipo energizado, antes de efectuar cualquier operación para: Interrumpir el flujo de corriente 
            eléctrica; Verificar con equipo de medición la ausencia de tensión eléctrica en los conductores o equipo eléctrico; Poner a tierra y en cortocircuito los conductores y equipo eléctrico; Aplicar otras 
            medidas preventivas necesarias, como la colocación de candados o avisos, que impidan el restablecimiento de la corriente eléctrica, y Proteger los elementos con tensión situados en las 
            inmediaciones, contra el contacto accidental?</label>
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

        <div class="conteiner">
          <label for="pregunta40">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se mantiene legible la identificación de tableros, gabinetes, interruptores, transformadores, entre otros, así como sus características eléctricas; Se cuenta 
            con las herramientas y equipo de protección personal adecuados a cada tarea, tales como: guantes dieléctricos, esteras y mantas aislantes, en número suficiente y de acuerdo con el potencial 
            eléctrico en el que se va a trabajar; Se impide desplazar los aparatos eléctricos portátiles mientras están conectados a la fuente de energía?</label>
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
          <label for="pregunta41">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se evita emplear herramientas y aparatos eléctricos portátiles en atmósferas inflamables o explosivas, a menos que cumplan con las especificaciones del 
            equipo a prueba de explosión; Se aplican los procedimientos de seguridad que se requieren, con base en lo establecido en el Capítulo 8 de esta Norma?</label>
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
          <label for="pregunta42">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se cumple, cuando se emplean a la intemperie aparatos de conexión de tipo abierto, con lo siguiente: Protegen a todos los elementos bajo tensión eléctrica 
            contra contactos accidentales, mediante cubiertas o bien colocándolos a una altura tal que no representa un riesgo de contacto accidental; Conservan las distancias de seguridad del espacio de 
            trabajo en torno a los elementos con tensión o energizados, según lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan, y Protegen los aparatos de conexión, transformadores y demás 
            aparatos eléctricos energizados, con cercas metálicas que se encuentran puestas a tierra?</label>
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
          <label for="pregunta43">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Están puestos a tierra el armazón de las herramientas y los aparatos de mano y portátiles, excepto el de las herramientas con doble aislamiento; Se somete 
            el sistema de puesta a tierra de toda la instalación eléctrica a la prueba de resistencia a tierra y de continuidad, al menos una vez por año, y se registran su valores; Se realiza una revisión en todo 
            el circuito o red eléctrica en el que se efectuó el mantenimiento, después de haber realizado los trabajos?</label>
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
          <label for="pregunta44">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se energizan los circuitos, conductores o equipos, después de haber efectuado cualquier trabajo, únicamente por orden del jefe de trabajo, y Se provee de 
            un interruptor de protección de falla a tierra para proteger a los trabajadores, cuando realicen actividades de mantenimiento?</label>
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
          <label for="pregunta45">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Cumple, cuando se utilizan herramientas o lámparas portátiles en el mantenimiento de las instalaciones eléctricas de baja tensión, con las condiciones de 
            seguridad siguientes: Se cuenta con cables de alimentación de las herramientas o lámparas portátiles perfectamente aislados y en buen estado; Se utilizan tensiones de alimentación de 24 volts 
            o menos, en el caso de las herramientas y lámparas portátiles para los trabajos en zanjas, pozos, galerías y calderas, entre otros?</label>
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
          <label for="pregunta46">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se proveen las lámparas portátiles con mango aislante, dispositivo protector de la bombilla y conductor de aislamiento de uso rudo o extra rudo?</label>
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
          <label for="pregunta47">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se adoptan, según aplique, 
            las medidas de seguridad siguientes: Se cumple con al menos una de las condiciones siguientes, en aquellos casos en que la herramienta portátil tenga que funcionar con una tensión eléctrica 
            superior a los 24 volts: Usar guantes dieléctricos aislantes; Disponer de doble aislamiento en la herramienta portátil; Contar con conexión de puesta a tierra; Contar con protección de los 
            defectos de aislamiento de la herramienta, mediante relevadores diferenciales, o  Utilizar transformadores de aislamiento?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas.
            <br> 10. Condiciones de seguridad en el mantenimiento de las instalaciones eléctricas
            <br> 10.1 En el equipo eléctrico motivo del mantenimiento se deberá cumplir, según aplique, que:
            <br> a)    Los interruptores estén contenidos en envolventes que imposibiliten, en cualquier caso, el contacto accidental de personas y objetos;
            <br> b)    Se realice la apertura y cierre de cuchillas, seccionadores, cuchillas-fusibles y otros dispositivos similares, por personal autorizado, utilizando equipo de protección personal y de seguridad, de acuerdo con los riesgos potenciales identificados.
            <br>        Ejemplo del equipo de protección personal son: guantes dieléctricos, según la clase y de acuerdo con la tensión eléctrica; protección ocular; casco de seguridad; ropa de trabajo, y botas dieléctricas, entre otros, y
            <br> c)    Se efectúe la conexión de alguna instalación eléctrica -nueva o provisional-, o equipo a líneas o circuitos energizados, invariablemente con el circuito desenergizado. En caso de no poder desenergizar el circuito, se deberá aplicar el procedimiento para trabajos con línea energizada que para tal efecto se elabore.
            <br> 10.2 En las instalaciones eléctricas se deberá verificar, según aplique, que:
            <br> a)    Todos los equipos destinados al uso y distribución de la energía eléctrica cuenten con información para identificar las características eléctricas y la distancia de seguridad para las tensiones eléctricas presentes, ya sea en una placa, en etiquetas adheridas o marcada sobre el equipo;
            <br> b)    En lugares en los que el contacto con equipos eléctricos o la proximidad de éstos pueda entrañar peligro para los trabajadores, se cuente con las señalizaciones de seguridad, conforme a lo dispuesto por la NOM-026-STPS-2008, o las que la sustituyan, para indicar los riesgos y para el uso del equipo de protección personal;
            <br> c)    Los elementos energizados se encuentren fuera del alcance de los trabajadores;
            <br> d)    Se delimite la zona de trabajo mediante la utilización, entre otros, de los medios siguientes:
            <br> 1)   Barreras protectoras;
            <br> 2)   Resguardos;
            <br> 3)   Cintas delimitadoras, y
            <br> 4)   Control de acceso;
            <br> e)    Se manipulen los conductores energizados con guantes dieléctricos o con herramienta aislada, diseñada para el nivel de tensión eléctrica que se maneje;
            <br> f)     Se proteja contra daños a todos los cables, especialmente los expuestos a cargas de vehículos o equipos mecánicos pesados;
            <br> g)    Se cumpla, en las cubiertas del equipo o de los dispositivos fijos, que su apertura interrumpa la tensión eléctrica, por medio de una herramienta o llave especial;
            <br> h)    Se protejan eficazmente los cables desnudos y otros elementos descubiertos energizados, cuando se instalen, mediante cercas o pantallas de protección, o se cumpla con las distancias de seguridad a que se refiere la NOM-001-SEDE-2005, o las que la sustituyan;
            <br> i)     Se prohíba el uso de elementos metálicos tales como flexómetros, varillas, tubos, perfiles, así como de equipos de radiocomunicación con antena, en las inmediaciones de las instalaciones eléctricas energizadas;
            <br> j)     Se evite almacenar materiales de cualquier tipo sobre las instalaciones eléctricas, y
            <br> k)    Se mantenga libre de obstáculos el acceso a los tableros o puntos de conexión o desconexión de la instalación eléctrica.
            <br> 10.3 En las subestaciones eléctricas se deberán adoptar, al menos, las medidas de seguridad siguientes:
            <br> a)    Se obtenga la autorización para realizar trabajos en la subestación;
            <br> b)    Se use el equipo de protección personal necesario para realizar los trabajos en la subestación;
            <br> c)    Se realicen las actividades de mantenimiento en la subestación eléctrica, al menos con dos trabajadores;
            <br> d)    Se considere que todo el equipo que se localice en la subestación eléctrica está energizado, hasta que no se compruebe la ausencia de tensión eléctrica y que esté puesto a tierra efectivamente, antes de iniciar el mantenimiento;
            <br> e)    Se apliquen los procedimientos de seguridad establecidos para el mantenimiento y los que se requieran, de conformidad con lo establecido en el Capítulo 8 de la presente Norma;
            <br> f)     Se respeten los avisos de seguridad;
            <br> g)    Se manejen equipos de calibración y prueba que cuenten con certificado vigente de calibración;
            <br> h)    Se mantengan las palancas de acción manual, puertas de acceso, gabinetes de equipo de control, entre otros, según sea el caso, con candado o con una etiqueta de seguridad que indique que están siendo operados o se está ejecutando en ellos algún trabajo;
            <br> i)     Se asegure que las partes vivas de la subestación eléctrica están fuera del alcance del personal o protegidas por pantallas, enrejados, rejillas u otros medios similares, y
            <br> j)     Se identifique la salida de emergencia y asegure que las puertas abran:
            <br> 1)   Hacia afuera o sean corredizas;
            <br> 2)   Fácilmente desde el interior, y que se encuentren libres de obstáculos, y
            <br> 3)   Desde el exterior únicamente con una llave especial o controlada.
            <br> 10.4 En los equipos o dispositivos de las instalaciones eléctricas provisionales objeto del mantenimiento, se deberá comprobar que:
            <br> a)    Se apliquen las medidas de seguridad, en caso de contar con líneas energizadas sin aislar próximas a muros;
            <br> b)    Se revise que estén desenergizados y puestos a tierra;
            <br> c)    Se verifique que no existen daños en los aislamientos de los conductores;
            <br> d)    Cuenten los empalmes con la resistencia mecánica para mantener la continuidad del circuito, y
            <br> e)    Se mantenga la continuidad eléctrica en todas las soldaduras o uniones.
            <br> 10.5 Para la realización de trabajos dentro del perímetro de las instalaciones eléctricas, se deberá comprobar que:
            <br> a)    Se conserve la distancia de seguridad que corresponda a la tensión eléctrica de la instalación, antes de efectuar cualquier maniobra de mantenimiento a los conductores o instalaciones eléctricas. Para establecer la distancia de seguridad, se deberá aplicar lo establecido en la NOM-001-SEDE-2005, o las que la sustituyan;
            <br> b)    Se impida hacer maniobras de mantenimiento a una distancia menor de trabajo en un conductor o instalación eléctrica, mientras no se tenga desenergizado dicho conductor o instalación eléctrica, o no sean aplicadas las medidas de seguridad indicadas en esta Norma, y
            <br> c)    Se adopten las medidas de seguridad e indiquen las instrucciones específicas para prevenir los riesgos de trabajo, cuando no sea posible desconectar un conductor o equipo de una instalación eléctrica, en cuya proximidad se vayan a efectuar maniobras de mantenimiento. Dichas medidas deberán incluir al menos lo siguiente:
            <br> 1)   Colocar protecciones aislantes, candados o etiquetas de seguridad en los conductores e instalaciones energizados, según corresponda, y
            <br> 2)   Controlar, en su caso, el desplazamiento del equipo móvil empleado para dar mantenimiento en las inmediaciones de conductores o equipos de una instalación eléctrica que no puedan ser desconectados, a fin de evitar el riesgo por contacto.
            <br> 10.6 Para instalaciones eléctricas provisionales, se deberán seguir, al menos, las medidas de seguridad siguientes:
            <br> a)    Solicitar por escrito al jefe de trabajo del centro de maniobras o despacho, autorización para colocar instalaciones eléctricas provisionales;
            <br> b)    Informar por escrito al jefe de trabajo del centro de maniobras o despacho, de todas aquellas modificaciones provisionales efectuadas y etiquetas colocadas, con el propósito de que sean retiradas o convertidas en instalaciones permanentes;
            <br> c)    Emplear las instalaciones eléctricas provisionales únicamente para el fin que fueron diseñadas;
            <br> d)    Retirar las instalaciones provisionales al término del propósito para el cual fueron colocadas, conforme a lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan, y
            <br> e)    Retirar las puestas a tierra conforme a lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
        <h2>
            Criterio de aceptación
        </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta48">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: En el equipo eléctrico motivo del mantenimiento, según aplique: Los interruptores están contenidos en envolventes que imposibilitan, en cualquier caso, el contacto 
            accidental de personas y objetos; Se realiza la apertura y cierre de cuchillas, seccionadores, cuchillas-fusibles y otros dispositivos similares, por personal autorizado, utilizando equipo de protección 
            personal y de seguridad, de acuerdo con los riesgos potenciales identificados?</label>
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
          <label for="pregunta49">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se efectúa la conexión de alguna instalación eléctrica nueva o provisional-, o equipo a líneas o circuitos energizados, invariablemente con el circuito desenergizado. 
            En caso de no poder desenergizar el circuito, se aplica el procedimiento para trabajos con línea energizada que para tal efecto se elabore?</label>
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
          <label for="pregunta50">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: En las instalaciones eléctricas se verifica, según aplique, que: Todos los equipos destinados al uso y distribución de la energía eléctrica cuentan con información para 
            identificar las características eléctricas y la distancia de seguridad para las tensiones eléctricas presentes, en una placa, en etiquetas adheridas o marcada sobre el equipo?</label>
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
          <label for="pregunta51">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Los lugares en los que el contacto con equipos eléctricos o la proximidad de éstos puede entrañar peligro para los trabajadores, se cuenta con las señalizaciones de 
            seguridad, conforme a lo dispuesto por la NOM-026-STPS-2008, o las que la sustituyan, para indicar los riesgos y para el uso del equipo de protección personal?</label>
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
          <label for="pregunta52">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Los elementos energizados se encuentran fuera del alcance de los trabajadores; Se delimita la zona de trabajo mediante la utilización, entre otros, de los medios siguientes: 
            Barreras protectoras; Resguardos; Cintas delimitadoras, y Control de acceso?</label>
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
          <label for="pregunta53">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se manipulan los conductores energizados con guantes dieléctricos o con herramienta aislada, diseñada para el nivel de tensión eléctrica que se maneje; Se protege contra 
            daños a todos los cables, especialmente los expuestos a cargas de vehículos o equipos mecánicos pesados; Se cumple, en las cubiertas del equipo o de los dispositivos fijos, que su apertura 
            interrumpa la tensión eléctrica, por medio de una herramienta o llave especial?</label>
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
          <label for="pregunta54">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se protegen eficazmente los cables desnudos y otros elementos descubiertos energizados, cuando se instalan, mediante cercas o pantallas de protección, o se cumple con 
            las distancias de seguridad a que se refiere la NOM-001-SEDE-2005, o las que la sustituyan; Se prohíbe el uso de elementos metálicos tales como flexómetros, varillas, tubos, perfiles, así como de 
            equipos de radiocomunicación con antena, en las inmediaciones de las instalaciones eléctricas energizadas?</label>
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
          <label for="pregunta55">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: En las subestaciones eléctricas adopta, al menos, las medidas de seguridad siguientes: Se obtiene la autorización para realizar trabajos en la subestación; Se usa el equipo 
            de protección personal necesario para realizar los trabajos en la subestación; Se realizan las actividades de mantenimiento en la subestación eléctrica, al menos con dos trabajadores?</label>
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
          <label for="pregunta56">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se considera que todo el equipo que se localice en la subestación eléctrica está energizado, hasta que no se compruebe la ausencia de tensión eléctrica y que está puesto 
            a tierra efectivamente, antes de iniciar el mantenimiento; Se aplican los procedimientos de seguridad establecidos para el mantenimiento y los que se requieran, de conformidad con lo establecido 
            en el Capítulo 8 de la presente Norma?</label>
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
          <label for="pregunta57">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se respetan los avisos de seguridad; Se manejan equipos de calibración y prueba que cuentan con certificado vigente de calibración; Se mantienen las palancas de acción 
            manual, puertas de acceso, gabinetes de equipo de control, entre otros, según sea el caso, con candado o con una etiqueta de seguridad que indica que están siendo operados o se está ejecutando 
            en ellos algún trabajo?</label>
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
          <label for="pregunta58">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: Se asegura que las partes vivas de la subestación eléctrica están fuera del alcance del personal o protegidas por pantallas, enrejados, rejillas u otros medios similares, y Se 
            identifica la salida de emergencia y asegura que las puertas abren: Hacia fuera o son corredizas; Fácilmente desde el interior, y que se encuentran libres de obstáculos, y Desde el exterior 
            únicamente con una llave especial o controlada?</label>
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
          <label for="pregunta59">¿El patrón cumple cuando, al efectuar un recorrido por el centro de trabajo, se constata que para realizar actividades de mantenimiento de las instalaciones eléctricas se cuenta con las condiciones 
            de seguridad siguientes: En los equipos o dispositivos de las instalaciones eléctricas provisionales objeto del mantenimiento, comprueba que: Se aplican las medidas de seguridad, en caso de 
            contar con líneas energizadas sin aislar próximas a muros;  Se revisa que están desenergizados y puestos a tierra; Se verifica que no existan daños en los aislamientos de los conductores; Cuentan 
            los empalmes con la resistencia mecánica para mantener la continuidad del circuito, y Se mantiene la continuidad eléctrica en todas las soldaduras o uniones?</label>
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
          <label for="pregunta60">¿Para la realización de trabajos dentro del perímetro de las instalaciones eléctricas, comprueba que:
            Se conserva la distancia de seguridad que corresponda a la tensión eléctrica de la instalación, antes de efectuar cualquier maniobra de mantenimiento a los conductores o instalaciones eléctricas. 
            Para establecer la distancia de seguridad, aplica lo establecido en la NOM-001-SEDE-2005, o las que la sustituyan; Se impide hacer maniobras de mantenimiento a una distancia menor de trabajo 
            en un conductor o instalación eléctrica, mientras no se tenga desenergizado dicho conductor o instalación eléctrica, o no sean aplicadas las medidas de seguridad indicadas en esta Norma?</label>
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
          <label for="pregunta61">¿Para la realización de trabajos dentro del perímetro de las instalaciones eléctricas, comprueba que:
            Se adoptan las medidas de seguridad e indican las instrucciones específicas para prevenir los riesgos de trabajo, cuando no sea posible desconectar un conductor o equipo de una instalación 
            eléctrica, en cuya proximidad se vayan a efectuar maniobras de mantenimiento. Dichas medidas incluyen al menos lo siguiente: Colocar protecciones aislantes, candados o etiquetas de 
            seguridad en los conductores e instalaciones energizados, según corresponda, y Controlar, en su caso, el desplazamiento del equipo móvil empleado para dar mantenimiento en las 
            inmediaciones de conductores o equipos de una instalación eléctrica que no puedan ser desconectados, a fin de evitar el riesgo por contacto?</label>
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
          <label for="pregunta62">¿Para instalaciones eléctricas provisionales, sigue, al menos, las medidas de seguridad siguientes: Se solicita por escrito al jefe de trabajo del centro de maniobras o despacho, autorización para 
            colocar instalaciones eléctricas provisionales; Se informa por escrito al jefe de trabajo del centro de maniobras o despacho, de todas aquellas modificaciones provisionales efectuadas y etiquetas 
            colocadas, con el propósito de que sean retiradas o convertidas en instalaciones permanentes?</label>
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
          <label for="pregunta63">¿Para instalaciones eléctricas provisionales, sigue, al menos, las medidas de seguridad siguientes: 
            Emplea las instalaciones eléctricas provisionales únicamente para el fin que fueron diseñadas; Retira las instalaciones provisionales al término del propósito para el cual fueron colocadas, conforme 
            a lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan, y Retira las puestas a tierra conforme a lo dispuesto por la NOM-001-SEDE-2005, o las que la sustituyan?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas.
            <br>11.1 Aplicar los procedimientos que correspondan con base en lo dispuesto en el Capítulo 8 de la presente Norma.
          </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
      </div>
        <div class="conteiner">
          <label for="pregunta64">¿El patrón cumple cuando demuestra que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se aplican los procedimientos que correspondan con base 
            en lo dispuesto en el Capítulo 8 de la presente Norma?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas.
            <br>11.2 Verificar que se cumpla, además de las medidas generales de seguridad establecidas en el Capítulo 9 de esta Norma, que se:
            <br>a)    Realicen las actividades de mantenimiento de las instalaciones eléctricas únicamente con personal autorizado y capacitado para tal fin;
            <br>b)    Efectúe la desconexión de líneas o equipos de la fuente de energía eléctrica, abriendo primero los equipos diseñados para operar con carga;
            <br>c)    Ejecute para la apertura o cierre de cuchillas energizadas de operación en grupo, lo siguiente:
            <br>1)   Verificar que el maneral se encuentre conmutado a tierra;
            <br>2)   Usar equipo de protección personal adecuado a la actividad, y
            <br>3)   Utilizar tapetes aislantes, mantas o cubiertas aislantes, en caso de que exista humedad excesiva en el suelo;
            <br>d)    Verifique la ausencia de tensión eléctrica antes de iniciar el trabajo; se pongan en corto circuito y a tierra, ambos lados de las líneas, lo más cerca posible del lugar de trabajo, y se asegure que las puestas a tierra tengan el calibre adecuado para conducir con seguridad una falla a tierra, mantengan continuidad eléctrica y una impedancia suficientemente baja;
            <br>e)    Coloquen barreras de protección y señales o avisos de seguridad en la zona de trabajo donde se ubiquen los dispositivos de conexión/desconexión y/o protección;
            <br>f)     Coloque, a la altura del dispositivo de seccionamiento o sobre la manija del dispositivo, un aviso preventivo con la leyenda: ""Peligro, no energizar"", y bloqueos físicos como candados, cuando se abran interruptores, restauradores y cuchillas que se localicen en vía pública o se trate de equipo operable a distancia;
            <br>g)    Verifique que todas las posibles fuentes de alimentación en la zona de trabajo estén abiertas;
            <br>h)    Coloquen cubiertas protectoras para el poste y/o para el conductor, de acuerdo con el nivel de tensión eléctrica que corresponda, en caso de instalar o remover un poste entre líneas energizadas o cerca de ellas. Los trabajadores deberán usar guantes dieléctricos para la tensión eléctrica requerida, además de guantes de carnaza o de piel para manipular el poste;
            <br>i)     Ponga a tierra la estructura metálica del camión utilizado para colocar o remover un poste entre líneas energizadas o cerca de ellas. Los trabajadores no deberán tocar el vehículo mientras estén parados en el suelo, a menos que se hayan terminado las maniobras o se detenga la actividad;
            <br>j)     Realice, para reemplazar los fusibles en las líneas de alta tensión, lo siguiente:
            <br>1)   Se verifique la ausencia de tensión eléctrica antes de iniciar el trabajo y, en su caso, se pongan en corto circuito y a tierra, ambos lados de las líneas, lo más cerca posible del lugar de trabajo;
            <br>2)   Se verifique que se haya corregido la falla;
            <br>3)   Se mantenga la distancia de seguridad. Los cortacircuitos fusibles al estar abiertos del lado de la carga se consideran energizados y para reemplazarlos se requiere que sean puestos a tierra;
            <br>4)   Se incline la cabeza ligeramente hacia abajo al momento de cerrar un cortacircuito fusible, para protegerse del arco eléctrico y posibles proyecciones de partículas que puedan producirse. Se deberá utilizar para esta actividad casco de seguridad con barboquejo para usos eléctricos, botas de seguridad sin casquillo metálico, guantes dieléctricos, ropa de trabajo de algodón y lentes de seguridad, y
            <br>5)   Se verifique la continuidad de las conexiones de puesta a tierra y de los conductores de puesta a tierra;
            <br>k)    Cuente en el carrete que suministra el conductor, con una puesta a tierra, en caso de tender un conductor cerca de otro(s) conductor(es) energizado(s). El trabajador que atiende el carrete deberá trabajar en una plataforma aislada y usar guantes aislantes, de acuerdo con el nivel de tensión;
            <br>l)     Verifique en las líneas montadas sobre los mismos apoyos, en todo o parte de su recorrido, que:
            <br>1)   Se prohíba realizar trabajos y maniobras en una línea por el procedimiento llamado de ""hora convenida"";
            <br>2)   Se evite realizar trabajos o éstos se suspendan cuando haya tormentas eléctricas, y
            <br>3)   Se impida realizar trabajos en una línea con dos o más circuitos estando uno de ellos con tensión eléctrica, si para su ejecución es necesario mover los conductores, aisladores o soportes mecánicos, de forma que se pudiera entrar en contacto con el otro circuito, y
            <br>m)   Asegure que no quede ningún trabajador en la línea, ni depositadas herramientas en el lugar de trabajo al terminar las actividades y antes de retirar las conexiones de puesta a tierra. Después se deberá proceder a quitar las conexiones de puesta a tierra, en sentido inverso al seguido en su colocación.
          </label>
          </div>
          <hr class="styled-separator">
          <div>
            <h2>
                Criterio de aceptación
            </h2>
        </div>
            <div class="conteiner">
              <label for="pregunta65">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple 
                con las medidas de seguridad siguientes: Se verifica que se cumple, además de las medidas generales de seguridad establecidas en el Capítulo 9 de esta Norma, que se: Realizan las actividades 
                de mantenimiento de las instalaciones eléctricas únicamente con personal autorizado y capacitado para tal fin; Efectúa la desconexión de líneas o equipos de la fuente de energía eléctrica, 
                abriendo primero los equipos diseñados para operar con carga?</label>
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
          <label for="pregunta65">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple 
            con las medidas de seguridad siguientes: Se verifica que se cumple, además de las medidas generales de seguridad establecidas en el Capítulo 9 de esta Norma, que se: Realizan las actividades 
            de mantenimiento de las instalaciones eléctricas únicamente con personal autorizado y capacitado para tal fin; Efectúa la desconexión de líneas o equipos de la fuente de energía eléctrica, 
            abriendo primero los equipos diseñados para operar con carga?</label>
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
          <label for="pregunta67">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Ejecuta para la apertura o cierre de cuchillas energizadas de operación en grupo, lo siguiente: Se verifica que el maneral se encuentra conmutado a tierra; Se 
            usa equipo de protección personal adecuado a la actividad, y Se utilizan tapetes aislantes, mantas o cubiertas aislantes, en caso de que exista humedad excesiva en el suelo?</label>
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
          <label for="pregunta68">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Verifica la ausencia de tensión eléctrica antes de iniciar el trabajo; se ponen en corto circuito y a tierra, ambos lados de las líneas, lo más cerca posible del lugar 
            de trabajo, y se asegura que las puestas a tierra tienen el calibre adecuado para conducir con seguridad una falla a tierra, mantienen continuidad eléctrica y una impedancia suficientemente baja; 
            Colocan barreras de protección y señales o avisos de seguridad en la zona de trabajo donde se ubican los dispositivos de conexión/desconexión, y/o protección?</label>
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
          <label for="pregunta69">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Coloca, a la altura del dispositivo de seccionamiento o sobre la manija del dispositivo, un aviso preventivo con la leyenda: ""Peligro, no energizar"", y bloqueos 
            físicos como candados, cuando se abren interruptores, restauradores y cuchillas que se localizan en vía pública o se trata de equipo operable a distancia; Verifica que todas las posibles fuentes de 
            alimentación en la zona de trabajo están abiertas; Colocan cubiertas protectoras para el poste y/o para el conductor, de acuerdo con el nivel de tensión eléctrica que corresponda, en caso de 
            instalar o remover un poste entre líneas energizadas o cerca de ellas?</label>
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
          <label for="pregunta70">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Pone a tierra la estructura metálica del camión utilizado para colocar o remover un poste entre líneas energizadas o cerca de ellas?</label>
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
          <label for="pregunta71">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Realiza para reemplazar los fusibles en las líneas de alta tensión, lo siguiente: Se verifica la ausencia de tensión eléctrica antes de iniciar el trabajo y, en su caso, 
            se ponen en corto circuito y a tierra, ambos lados de las líneas, lo más cerca posible del lugar de trabajo; Se verifica que se haya corregido la falla; Se mantiene la distancia de seguridad. Los 
            cortacircuitos fusibles al estar abiertos del lado de la carga se consideran energizados y para reemplazarlos se ponen a tierra; Se inclina la cabeza ligeramente hacia abajo al momento de cerrar un 
            cortacircuito fusible, para protegerse del arco eléctrico y posibles proyecciones de partículas que puedan producirse, y Se verifica la continuidad de las conexiones de puesta a tierra y de los 
            conductores de puesta a tierra?</label>
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
          <label for="pregunta72">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que para realizar trabajos de mantenimiento de las instalaciones eléctricas aéreas y subterráneas se cumple con 
            las medidas de seguridad siguientes: Cuenta en el carrete que suministra el conductor, con una puesta a tierra, en caso de tender un conductor cerca de otro(s) conductor(es) energizado(s); 
            Verifica en las líneas montadas sobre los mismos apoyos, en todo o parte de su recorrido, que: Se prohíbe realizar trabajos y maniobras en una línea por el procedimiento llamado de 
            "hora convenida"; Se evita realizar trabajos o éstos se suspenden cuando existen tormentas eléctricas, y Se impide realizar trabajos en una línea con dos o más circuitos estando uno de ellos con 
            tensión eléctrica, si para su ejecución es necesario mover los conductores, aisladores o soportes mecánicos, de forma que se pueda entrar en contacto con el otro circuito, y Asegura que no queda 
            ningún trabajador en la línea, ni depositadas herramientas en el lugar de trabajo, al terminar las actividades y antes de retirar las conexiones de puesta a tierra, y que posteriormente se procede a 
            quitar las conexiones de puesta a tierra, en sentido inverso al seguido en su colocación?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas.
            <br>11.3 Para los trabajos de mantenimiento en líneas subterráneas se deberán adoptar, según aplique, las medidas de seguridad previstas en el numeral 11.2 de la presente Norma, así como las siguientes:
            <br>a)    Identificar la ubicación de los equipos conforme lo indiquen los planos;
            <br>b)    Ubicar las trayectorias, circuitos de alimentación, transformadores, seccionadores e interruptores;
            <br>c)    Determinar las medidas preventivas para realizar las tareas en función de los riesgos presentes al momento de efectuar los trabajos, y
            <br>d)    Verificar el estado y la continuidad eléctrica de las conexiones de puesta a tierra y de los conductores de puesta a tierra.          
          </label>
            </div>
            <hr class="styled-separator">
            <div>
              <h2>
                  Criterio de aceptación
              </h2>
          </div>
              <div class="conteiner">
                <label for="pregunta73">¿El patrón cumple cuando demuestra que para trabajos de mantenimiento de líneas subterráneas se cumple con las medidas de seguridad siguientes:
                  Según aplique, se emplean las previstas en el numeral 11.2 de la presente Norma; Se identifica la ubicación de los equipos conforme lo indican los planos; Se ubican las trayectorias, circuitos 
                  de alimentación, transformadores, seccionadores e interruptores?</label>
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
          <label for="pregunta74">¿El patrón cumple cuando demuestra que para trabajos de mantenimiento de líneas subterráneas se cumple con las medidas de seguridad siguientes:
            Se determinan las medidas preventivas para realizar las tareas en función de los riesgos presentes al momento de efectuar los trabajos, y Se verifica el estado y la continuidad eléctrica de las 
            conexiones de puesta a tierra y de los conductores de puesta a tierra?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.11 Cumplir, según aplique, con las medidas y condiciones de seguridad establecidas en los capítulos del 9 al 12 de la presente Norma, para realizar actividades de mantenimiento de las instalaciones eléctricas.
            <br>12. Medidas de seguridad para realizar trabajos de mantenimiento de las instalaciones eléctricas energizadas
            <br>12.1 Cumplir con lo establecido en los procedimientos de seguridad a que se refieren los numerales 8.1 al 8.3 de esta Norma, para realizar trabajos de mantenimiento de las instalaciones eléctricas energizadas, así como con las instrucciones de seguridad siguientes:
            <br>a)    Efectuar la actividad por trabajadores autorizados y capacitados;
            <br>b)    Cumplir con la técnica descrita en los procedimientos del plan de trabajo y utilizar las herramientas e implementos necesarios para efectuar la actividad, así como el equipo de protección personal adecuado al riesgo;
            <br>c)    Seguir la secuencia de ejecución de las maniobras, tales como la conexión y/o desconexión de dispositivos de seccionamiento y protección, el traslado de líneas, la colocación de puentes provisionales, el aislamiento de redes, entre otras;
            <br>d)    Utilizar los medios de comunicación, en su caso, con la subestación, el centro de maniobras o el jefe de trabajo;
            <br>e)    Realizar la entrega y recepción de la zona de trabajo para el inicio y término de las actividades, respectivamente, y
            <br>f)     Contar con supervisión permanente en la ejecución de los trabajos.
            <br>12.2 Cumplir, para la ejecución de los trabajos de mantenimiento de las instalaciones eléctricas energizadas, con lo siguiente:
            <br>a)    Realizar una reunión previa al inicio de las actividades, en la zona de trabajo, a fin de efectuar un análisis de las condiciones del lugar, considerando, al menos lo siguiente:
            <br>1)   Las redes cercanas a la zona de trabajo;
            <br>2)   La ubicación correcta del vehículo, y
            <br>3)   La puesta a tierra del vehículo;
            <br>b)    Prohibir efectuar trabajos de línea energizada en circuitos en falla, en días lluviosos o cuando no se cuente con el material y equipo necesario;
            <br>c)    Contar con un programa para la revisión y mantenimiento de vehículos, equipos y herramientas, a fin de comprobar que cumplen con el nivel de aislamiento requerido;
            <br>d)    Verificar que los equipos de protección y/o seccionamiento automático o los operables a distancia se encuentren, de manera tal, que se puedan efectuar trabajos con línea energizada;
            <br>e)    Utilizar siempre el equipo de protección personal y equipo para trabajo de línea energizada de la clase que corresponda de acuerdo con el nivel de tensión eléctrica de la instalación donde se efectuará el trabajo, y
            <br>f)     Efectuar el trabajo en una fase a la vez manteniendo las demás alejadas y/o cubiertas.
          </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
      </div>
        <div class="conteiner">
          <label for="pregunta75">¿El patrón cumple cuando, al efectuar un recorrido por el centro laboral, se constata que los trabajos de mantenimiento de las instalaciones eléctricas energizadas, se realizan con las medidas de 
            seguridad siguientes:  Se cumple con lo establecido en los procedimientos de seguridad a que se refieren los numerales 8.1 al 8.3 de esta Norma?</label>
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
        <div>
          <h2>
              Disposición
          </h2>
          <label class="conteiner">5.19 Contar con registros de los resultados del mantenimiento llevado a cabo a las instalaciones eléctricas, que al menos consideren el nombre del responsable de realizar el trabajo; las actividades desarrolladas y sus resultados, así como las fechas en que se realizaron dichos trabajos.
          </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
              Criterio de aceptación
          </h2>
        </div>
        <div class="conteiner">
          <label for="pregunta76">¿El patrón cumple cuando cuenta con los registros de los resultados del mantenimiento llevado a cabo a las instalaciones eléctricas, que al menos consideren el nombre del responsable de realizar el 
            trabajo; las actividades desarrolladas y sus resultados, así como las fechas en que se realizaron dichos trabajos?</label>
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
          <label for="pregunta77">¿Proporciona capacitación, adiestramiento e información, de acuerdo con las tareas asignadas y el plan de atención a emergencias?</label>
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
          <label for="pregunta78">¿La capacitación considera, al menos lo siguiente: La información sobre los riesgos de trabajo relacionados con el mantenimiento de las instalaciones eléctricas; La descripción general sobre los efectos 
            en el organismo ocasionados por una descarga eléctrica o sus efectos, como consecuencia de un contacto, falla o aproximación a elementos energizados, con énfasis en las condiciones que deberán 
            evitarse para prevenir lesiones o daños a la salud; Los procedimientos de seguridad para realizar el mantenimiento de las instalaciones eléctricas, a que se refiere el Capítulo 8 de la presente Norma?</label>
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
          <label for="pregunta79">¿Las medidas de seguridad establecidas en esta Norma aplicables a las actividades por realizar, y en la ejecución de los trabajos de mantenimiento de las instalaciones eléctricas; El uso,
            mantenimiento, conservación, almacenamiento y reposición del equipo de protección personal, de acuerdo con lo establecido en la NOM-017-STPS-2008, o las que la sustituyan; Los 
            temas teórico-prácticos sobre la forma segura de manejar, dar mantenimiento, revisar y almacenar la maquinaria, equipo, herramientas, materiales e implementos de trabajo?</label>
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
          <label for="pregunta80">¿Las condiciones bajo las cuales la maquinaria, equipo, herramientas, materiales e implementos de trabajo serán puestos fuera de servicio para su reparación o reemplazo; Las condiciones 
            climáticas u otros factores desfavorables que obligarían a interrumpir los trabajos, y El contenido del plan de atención a emergencias y otras acciones que se desprendan de las situaciones 
            de emergencia, que pudieran presentarse durante la realización de los trabajos de mantenimiento de las instalaciones eléctricas?</label>
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
          <label for="pregunta81">¿Se verifica que los equipos de protección y/o seccionamiento automático o los operables a distancia se encuentran, de manera tal, que se pueden efectuar trabajos con línea energizada?        </label>
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
          <label for="pregunta82">¿Se utiliza siempre el equipo de protección personal y equipo para trabajo de línea energizada de la clase que corresponda de acuerdo con el nivel de tensión eléctrica de la instalación donde se 
            efectúa el trabajo?</label>
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
          <label for="pregunta83">¿Se efectúa el trabajo en una fase a la vez manteniendo las demás alejadas y/o cubiertas?</label>
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

        <!-- Repite el bloque anterior para cada pregunta -->
      
        <input type="submit" name="guardar_n292011" value="Enviar">
  </form>
  

          <div style="text-align: right; margin-top: 20px;">
            <button onclick="generatePDF()" id="botonDescarga" disabled style="background-color: #4CAF50; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Generar PDF</button>
            <button onclick="openGraphPDF()" style="background-color: #008CBA; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s; margin-left: 10px;">Abrir Gráfica</button>
          </div>

          <!-- Incluye la biblioteca jsPDF -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

          <div>
              <!-- Nuevo botón para abrir el PDF de la gráfica -->
            
          </div>

          <p>El número de cumplimiento es: <?php echo json_encode($numeroCumplimiento); ?></p>

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
          var totalPreguntas = 83;



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
                      name: "NOM-029-STPS-2011",
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