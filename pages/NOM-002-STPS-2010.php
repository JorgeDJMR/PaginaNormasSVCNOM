<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma022010 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma022010 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-002-STPS-2010.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-002-STPS-2010</h1>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n022010.php" method="post">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1 Clasificar el riesgo de incendio del centro de trabajo o por áreas que lo integran, tales como plantas, edificios o niveles, de conformidad con lo establecido por el Apéndice A de la presente Norma.<br>
                A.1 Indicaciones para clasificar el riesgo de incendio.<br>
                A.2 Presentación de la clasificación del riesgo de incendio.
            </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
              Criterio de aceptación
          </h2>
      </div>
        <div class="conteiner">
            <label for="pregunta1">Presenta evidencia documental de la clasificación del riesgo de incendio del centro de trabajo, o por áreas que lo integran, la cual contiene:<br>
                - El nombre, denominación o razón social o identificación específica del centro de trabajo.<br>
                - El domicilio completo del centro de trabajo.<br>
                - La descripción general del proceso productivo, así como los materiales y cantidades que se emplean en dichos procesos.<br>
                - El número máximo de trabajadores por turnos de trabajo o, en su caso, los ubicados en locales, edificios o niveles del centro de trabajo.<br>
                - El número máximo estimado de personas externas al centro de trabajo que concurren a éste, tales como contratistas y visitantes.<br>
                - La superficie construida en metros cuadrados.<br>
                - El desglose del inventario máximo que se haya registrado en el transcurso de un año, de los materiales, sustancias o productos que se almacenen, procesen y manejen en el centro de trabajo, y la clasificación correspondiente en cada caso, según lo establecido en la Tabla A.1.<br>
                - El desglose de inventarios y la clasificación correspondiente para cada una de las áreas que integran el centro de trabajo, cuando la clasificación se haya efectuado de manera independiente.<br>
                - El cálculo desarrollado para la determinación final del riesgo de incendio.<br>
                - La fecha de realización de la determinación final del riesgo de incendio.<br>
                - El tipo de riesgo de incendio (ordinario o alto).<br>
                - El nombre(s) de la(s) persona(s) responsable(s) de la clasificación realizada.</label>
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
          <label class="conteiner">5.2 Contar con un croquis, plano o mapa general del centro de trabajo, o por áreas que lo integran, actualizado y colocado en los principales lugares de entrada, tránsito, reunión o puntos comunes de estancia o servicios para los trabajadores.
          </label>
      </div>
      <hr class="styled-separator">
      <div>
        <h2>
            Criterio de aceptación
        </h2>
    </div>
    
      <div class="conteiner">
        <label for="pregunta2">Se cuenta con un croquis, plano o mapa general del centro de trabajo, o por áreas que lo integran, tales como plantas, edificios o niveles, actualizado y colocado en los principales lugares de entrada, tránsito, reunión o puntos comunes de estancia o servicios para los trabajadores.</label>
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
        <label for="pregunta3">El croquis, plano o mapa contiene, al menos, los datos siguientes:<br>
          - El nombre, denominación o razón social del centro de trabajo y su domicilio.<br>
          - La identificación de los predios colindantes.<br>
          - La identificación de las principales áreas o zonas del centro de trabajo con riesgo de incendio, debido a la presencia de material inflamable, combustible, pirofórico o explosivo, entre otros.<br>
          - La ubicación de los medios de detección de incendio, así como de los equipos y sistemas contra incendio.<br>
          - Las rutas de evacuación, incluyendo, al menos, la ruta de salida y la descarga de salida, además de las salidas de emergencia, escaleras de emergencia y lugares seguros.<br>
          - La ubicación del equipo de protección personal para los integrantes de las brigadas contra incendio.<br>
          - La ubicación de materiales y equipo para prestar los primeros auxilios.</label>
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
      <label class="conteiner">5.3 Contar con las instrucciones de seguridad aplicables en cada área del centro de trabajo y difundirlas entre los trabajadores, contratistas y visitantes, según corresponda.
      </label>
  </div>
  <hr class="styled-separator">
  <div>
    <h2>
        Criterio de aceptación
    </h2>
</div>
      <div class="conteiner">
        <label for="pregunta4">Presenta evidencia documental de que cuenta con las instrucciones de seguridad aplicables en cada área del centro de trabajo.</label>
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
        <label for="pregunta5">Demuestra que difunde las instrucciones de seguridad aplicables en cada área del centro de trabajo, entre trabajadores, contratistas y visitantes, según corresponda.</label>
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
        <label for="pregunta6">El patrón cumple cuando al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 2, del numeral 13.4, se constata que éstos conocen las instrucciones aplicables en el centro de trabajo.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.4 Cumplir con las condiciones de prevención y protección contra incendios en el centro de trabajo, de acuerdo con lo establecido en el Capítulo 7 de la presente Norma.<br>
          7. Condiciones de prevención y protección contra incendios.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta7">Cuenta con instrucciones de seguridad aplicables en cada área del centro trabajo al alcance de los trabajadores, incluidas las relativas a la ejecución de trabajos en caliente en las áreas en las que se puedan presentar incendios, y supervisa que éstas se cumplan.</label>
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
        <label for="pregunta8">Elabora un programa anual de revisión mensual de los extintores, y vigila que los extintores cumplan con las condiciones siguientes:<br>
          - Que se encuentren en la ubicación asignada en el plano a que se refiere el numeral 5.2, inciso d).<br>
          - Que su ubicación sea en lugares visibles, de fácil acceso y libres de obstáculos.<br>
          - Que se encuentren señalizados, de conformidad con lo que establece la NOM-026-STPS-2008 o la NOM-003-SEGOB-2002, o las que las sustituyan.<br>
          - Que cuenten con el sello o fleje de garantía sin violar.<br> 
          - Que la aguja del manómetro indique la presión en la zona verde (operable), en el caso de extintores cuyo recipiente esté presurizado permanentemente y que contengan como agente extintor agua, agua con aditivos, espuma, polvo químico seco, halones, agentes limpios o químicos húmedos.<br>
          - Que mantengan la capacidad nominal indicada por el fabricante en la etiqueta, en el caso de extintores con bióxido de carbono como agente extintor.<br>
          - Que no hayan sido activados, de acuerdo con el dispositivo que el fabricante incluya en el extintor para detectar su activación, en el caso de extintores que contengan como agente extintor polvo químico seco, y que se presurizan al momento de operarlos por medio de gas proveniente de cartuchos o cápsulas, internas o externas.<br>
          - Que se verifiquen las condiciones de las ruedas de los extintores móviles.<br>
          - Que no existan daños físicos evidentes, tales como corrosión, escape de presión, obstrucción, golpes o deformaciones; Que no existan daños físicos, tales como roturas, desprendimientos,protuberancias o perforaciones, en mangueras, boquillas o palanca de accionamiento, que puedan propiciar su mal funcionamiento.<br>
          - Que el extintor sea puesto fuera de servicio cuando presente daño que afecte su operación, o dicho daño no pueda ser reparado, en cuyo caso sea sustituido por otro de las mismas características y condiciones de operación.<br>
          - Que la etiqueta, placa o grabado se encuentren legibles y sin alteraciones.<br>
          - Que la etiqueta cuente con la siguiente información vigente, después de cada mantenimiento.<br>
          * El nombre, denominación o razón social, domicilio y teléfono del prestador de servicios.<br>
          * La capacidad nominal en kilogramos o litros y el agente extintor.<br>
          * Las instrucciones de operación, breves y de fácil comprensión, apoyadas mediante figuras o símbolos.<br>
          * La clase de fuego a que está destinado el equipo.<br>
          * Las contraindicaciones de uso, cuando aplique.<br>
          * La contraseña oficial del cumplimiento con la normatividad vigente aplicable, de conformidad con lo dispuesto por la Norma Oficial Mexicana NOM-106-SCFI-2000, o las que la sustituyan, en su caso.<br>
          * El mes y año del último servicio de mantenimiento realizado.<br>
          * La contraseña oficial de cumplimiento con la Norma NOM-154-SCFI-2005, o las que la sustituyan, y el número de dictamen de cumplimiento con la misma.
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
        <label for="pregunta9">Cuenten los extintores de polvo químico seco con el collarín que establece la NOM-154-SCFI-2005, o las que la sustituyan.</label>
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
        <label for="pregunta10">Establezca y dé seguimiento a un programa anual de revisión y pruebas a los equipos contra incendio, a los medios de detección y, en su caso, a las alarmas de incendio y sistemas fijos contra incendio.</label>
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
        <label for="pregunta11">Someta a mantenimiento a los equipos, sistemas y medios de detección contra incendio, por personal capacitado para tal fin, cuando derivado de la revisión y pruebas, se encontrara que existe daño o deterioro en los mismos.</label>
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
        <label for="pregunta12">Establezca y dé seguimiento a un programa anual de revisión a las instalaciones eléctricas de las áreas del centro de trabajo, con énfasis en aquéllas clasificadas como de riesgo de incendio alto, a fin de identificar y corregir condiciones inseguras que puedan existir, el cual comprenda, al menos, los elementos siguientes:<br>
          - Tableros de distribución.<br>
          - Conductores.<br>
          - Canalizaciones, incluyendo los conductores y espacios libres en éstas.<br>
          - Cajas de conexiones.<br>
          - Contactos.<br>
          - Interruptores.<br>
          - Luminarias.<br>
          - Protecciones, incluyendo las de cortocircuito -fusibles, cuchillas desconectadoras, interruptor automático, dispositivos termo-magnéticos, entre otros-, en circuitos alimentadores y derivados.<br>
          - Puesta a tierra de equipos y circuitos.</label>
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
        <label for="pregunta13">Establezca y dé seguimiento a un programa anual de revisión a las instalaciones de gas licuado de petróleo y/o natural, a fin de identificar y corregir condiciones inseguras que puedan existir, mismo que contenga, al menos, los elementos siguientes:<br>
          - La integridad de los elementos que componen la instalación.<br>
          - La señalización de las tuberías de la instalación, conforme a lo establecido por la NOM-026-STPS-2008, o las que la sustituyan, la cual se conserva visible y legible.</label>
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
        <label for="pregunta14">El programa anual de revisión a las instalaciones de gas licuado de petróleo y/o natural:<br>
          - Sea elaborado y aplicado por personal previamente capacitado y autorizado por el patrón.<br>
          - Se sometan las instalaciones de gas licuado de petróleo y/o natural con daños o deterioro, al mantenimiento correspondiente, por personal capacitado para tal fin.</label>
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
        <label for="pregunta15">Los resultados de la revisión mensual a los extintores, que al menos contenga:<br>
          - La fecha de la revisión.<br>
          - El nombre o identificación del personal que realizó la revisión.<br>
          - Los resultados de la revisión mensual a los extintores.<br>
          - Las anomalías identificadas.<br>
          - El seguimiento de las anomalías identificadas.</label>
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
        <label for="pregunta16">Los resultados de los programas anuales de revisión a que se refieren los numerales 7.4, 7.5 y 7.6, que al menos contengan:<br>
          - El nombre, denominación o razón social y domicilio completo del centro de trabajo.<br>
          - La fecha de la revisión.<br>
          - Las áreas revisadas.<br>
          - Las anomalías detectadas y acciones determinadas para su corrección y seguimiento, en su caso.
          - El nombre y puesto de los responsables de la revisión.</label>
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
        <label for="pregunta17">Se cuenta, con la señalización que prohíba fumar, generar flama abierta o chispas e introducir objetos incandescentes, cerillos, cigarrillos o, en su caso, utilizar teléfonos celulares, aparatos de radiocomunicación, u otros que puedan provocar ignición por no ser intrínsecamente seguros, en las áreas en donde se produzcan, almacenen o manejen materiales inflamables o explosivos, así como que dicha señalización cumpla con lo establecido por la NOM-026-STPS-2008 o la NOM-003-SEGOB-2002, o las que las sustituyan.</label>
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
        <label for="pregunta18">Se cuenta, en su caso, con señalización en la proximidad de los elevadores, que prohíba su uso en caso de incendio, de conformidad con lo establecido en la NOM-003-SEGOB-2002, o las que la sustituyan.</label>
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
        <label for="pregunta19">Se prohíbe y evita el bloqueo, daño, inutilización o uso inadecuado de los equipos y sistemas contra incendio, los equipos de protección personal para la respuesta a emergencias, así como los señalamientos de evacuación, prevención y de equipos y sistemas contra incendio, entre otros.</label>
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
        <label for="pregunta20">Se establecen controles de acceso para los trabajadores y demás personas que ingresen a las áreas donde se almacenen, procesen o manejen materiales inflamables o explosivos.</label>
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
        <label for="pregunta21">Se adoptan las medidas de seguridad para prevenir la generación y acumulación de electricidad estática en las áreas donde se manejen materiales inflamables o explosivos, de conformidad con lo establecido en la NOM-022-STPS-2008, o las que la sustituyan.</label>
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
        <label for="pregunta22">Se controla en dichas áreas el uso de herramientas, ropa, zapatos y objetos personales que puedan generar chispa, flama abierta o altas temperaturas.</label>
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
        <label for="pregunta23">Se cuenta con las medidas o procedimientos de seguridad, para el uso de equipos de calefacción, calentadores, hornos, parrillas u otras fuentes de calor, en las áreas donde existan materiales inflamables o explosivos, y se supervisa que se cumplan.</label>
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
        <label for="pregunta24">Se prohíbe y evita que se almacenen materiales o coloquen objetos que obstruyan e interfieran el acceso al equipo contra incendio o a los dispositivos de alarma de incendio o activación manual de los sistemas fijos contra incendio.</label>
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
        <label for="pregunta25">Se cuenta con rutas de evacuación que cumplan con las condiciones siguientes:
          - Que estén señalizadas, en lugares visibles, de conformidad con lo dispuesto por la NOM-026-STPS-2008 o la NOM-003-SEGOB-2002, o las que las sustituyan.<br>
          - Que se encuentren libres de obstáculos que impidan la circulación de los trabajadores y demás ocupantes.<br>
          - Que dispongan de dispositivos de iluminación de emergencia que permitan percibir el piso y cualquier modificación en su superficie, cuando se interrumpa la energía eléctrica o falte iluminación natural.<br>
          - Que la distancia por recorrer desde el punto más alejado del interior de una edificación, hacia cualquier punto de la ruta de evacuación, no sea mayor de 40 m. En caso contrario, el tiempo máximo de evacuación de los ocupantes a un lugar seguro sea de tres minutos.<br>
          - Que las escaleras eléctricas sean consideradas parte de una ruta de evacuación, previo bloqueo de la energía que las alimenta y de su movimiento.<br>
          - Que los elevadores eléctricos no sean considerados parte de una ruta de evacuación y no se usen en caso de incendio.<br>
          - Que los desniveles o escalones en los pasillos y corredores de las rutas de evacuación estén señalizados de conformidad con la NOM-026-STPS-2008 o la NOM-003-SEGOB-2002, o las que las sustituyan.<br>
          - Que en el recorrido de las escaleras de emergencia exteriores de los centros de trabajo de nueva creación, las ventanas, fachadas de vidrio o cualquier otro tipo de aberturas, no representen un factor de riesgo en su uso durante una situación de emergencia de incendio.</label>
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
        <label for="pregunta26">Se cuenta con salidas normales y/o de emergencia que cumplan con las condiciones siguientes:<br>
          - Que estén identificadas conforme a lo señalado en la NOM-026-STPS-2008 o la NOM-003-SEGOB-2002, o las que las sustituyan.<br>
          - Que comuniquen a un descanso, en caso de acceder a una escalera.<br>
          - Que en las salidas de emergencia, las puertas abran en el sentido del flujo, salvo que sean automáticas y corredizas.<br>
          - Que las puertas sean de materiales resistentes al fuego y capaces de impedir el paso del humo entre áreas de trabajo, en caso de quedar clasificados el área o centro de trabajo como de riesgo de incendio alto, y se requiera impedir la propagación de un incendio hacia una ruta de evacuación o áreas contiguas por presencia de materiales inflamables o explosivos.<br>
          - Que las puertas de emergencia cuenten con un mecanismo que permita abrirlas desde el interior, mediante una operación simple de empuje.<br>
          - Que las puertas consideradas cómo salidas de emergencia estén libres de obstáculos, candados, picaportes o cerraduras con seguros puestos durante las horas laborales, que impidan su utilización en casos de emergencia.<br>
          - Que cuando sus puertas sean consideradas como salidas de emergencia, y funcionen en forma automática, o mediante dispositivos eléctricos o electrónicos, permitan la apertura manual, si llega a interrumpirse la energía eléctrica en situaciones de emergencia.</label>
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
        <label for="pregunta27">Se tienen instalados extintores en las áreas del centro de trabajo, conforme a lo siguiente:
          <br>- Acordes con la clase de fuego que se pueda presentar.
          <br>- Colocados al menos uno por cada 300 metros cuadrados de superficie o fracción, si su grado de riesgo es ordinario.
          <br>- Colocados al menos uno por cada 200 metros cuadrados de superficie o fracción, si su grado de riesgo es alto.
          <br>- Colocados sin exceder las distancias máximas de recorrido que se indican en la Tabla 1 del numeral 7.17, inciso d), de la presente Norma, por clase de fuego, para acceder a ellos, tomando en cuenta las vueltas y rodeos necesarios.
          <br>- Colocados a una altura no mayor de 1.50 m, medidos desde el nivel del piso hasta la parte más alta del extintor.
          <br>- Protegidos de daños y de las condiciones ambientales que puedan afectar su funcionamiento.</label>
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

      <div class="conteiner">
        <label for="pregunta28">Se tienen instalados al menos la mitad del número requerido de extintores que le correspondan, de acuerdo con lo señalado en el numeral 7.17, incisos b) y c), de la presente Norma, siempre y cuando tengan una capacidad nominal de al menos seis kilogramos o nueve litros, en el caso de que los centros de trabajo o las áreas que lo integran cuenten con sistemas automáticos de supresión.</label>
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
        <label for="pregunta29">Se proporciona mantenimiento a los extintores como resultado de las revisiones mensuales, garantizado conforme a lo establecido en la NOM-154-SCFI-2005, o las que la sustituyan, y al menos una vez por año.</label>
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
        <label for="pregunta30">Se reemplacen los extintores que se sometan a mantenimiento en su misma ubicación, por otros cuando menos del mismo tipo y capacidad.</label>
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
        <label for="pregunta31">Se proporcione la recarga a los extintores después de su uso y, en su caso, como resultado del mantenimiento, garantizada de acuerdo con lo establecido en la NOM-154-SCFI-2005, o las que la sustituyan.</label>
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
        <label class="conteiner">5.5 Contar con un plan de atención a emergencias de incendio, conforme al Capítulo 8 de esta Norma.<br>
          8. Plan de atención a emergencias de incendio.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta32">Presenta evidencia documental de que cuenta con el plan de atención a emergencias de incendio que contenga, según aplique, lo siguiente:
          <br>- La identificación y localización de áreas, locales o edificios y equipos de proceso, destinados a la fabricación, almacenamiento o manejo de materias primas, subproductos, productos y desechos o residuos que impliquen riesgo de incendio.
          <br>- La identificación de rutas de evacuación, salidas y escaleras de emergencia, zonas de menor riesgo y puntos de reunión, entre otros.
          <br>- El procedimiento de alertamiento, en caso de ocurrir una emergencia de incendio, con base en el mecanismo de detección implantado.
          <br>- Los procedimientos para la operación de los equipos, herramientas y sistemas fijos contra incendio, y de uso del equipo de protección personal para los integrantes de las brigadas contra incendio.
          <br>- El procedimiento para la evacuación de los trabajadores, contratistas, patrones, y visitantes, entre otros, considerando a las personas con capacidades diferentes.
          <br>- Los integrantes de las brigadas contra incendio con responsabilidades y funciones a desarrollar.
          <br>- El equipo de protección personal para los integrantes de las brigadas contra incendio.
          <br>- El plan de ayuda mutua que se tenga con otros centros de trabajo, en su caso.
          <br>- El procedimiento de solicitud de auxilio a cuerpos especializados para la atención a la emergencia contra incendios, considerando el directorio de dichos cuerpos especializados de la localidad.
          <br>- Los procedimientos para el retorno a actividades normales de operación, para eliminar los riesgos después de la emergencia, así como para la identificación de los daños.
          <br>- La periodicidad de los simulacros de emergencias de incendio por realizar.
          <br>- Los medios de difusión para todos los trabajadores sobre el contenido del plan de atención a emergencias de incendio y de la manera en que ellos participarán en su ejecución.
          <br>- Las instrucciones para atender emergencias de incendio.</label>
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
        <label for="pregunta33">En el caso de los centros de trabajo con riesgo de incendio alto, el plan de atención a emergencias de incendio, además de lo requerido en el punto anterior correspondiente al numeral 8.1, contiene lo siguiente:
          <br>- Las brigadas de primeros auxilios, de comunicación y de evacuación.
          <br>- Los procedimientos para realizar sus actividades.
          <br>- Los recursos para desempeñar las funciones de las brigadas.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.6 Contar con brigadas contra incendio en los centros de trabajo clasificados con riesgo de incendio alto, en los términos del Capítulo 9 de la presente Norma.<br>
          9. Brigadas contra incendio.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta34">Se consideró, para determinar el número de integrantes de la(s) brigada(s) del centro de trabajo, al menos:
          <br>- El número de trabajadores por turno del centro de trabajo.
          <br>- La asignación y rotación de trabajadores en los diferentes turnos.
          <br>- Los resultados de los simulacros con base en lo establecido en el numeral 10.3, incisos d), e), f) y g) de la presente Norma, considerando los accidentes previsibles más graves que puedan llegar a ocurrir en las diferentes áreas de las instalaciones.</label>
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
        <label for="pregunta35">Los integrantes de las brigadas se seleccionan entre los trabajadores que cuenten con disposición para participar y con aptitud física y mental para desarrollar las funciones que se les asignen en el plan de atención a emergencias de incendio.</label>
        <div class="radio-buttons">
          <input type="radio" id="p35-0" name="pregunta35" value="0">
          <label for="p35-0">0</label>
          <input type="radio" id="p35-1" name="pregunta35" value="1">
          <label for="p35-1">1</label>
          <input type="radio" id="p31-2" name="pregunta35" value="2">
          <label for="p35-2">2</label>
          <input type="radio" id="p35-3" name="pregunta35" value="3">
          <label for="p35-3">3</label>
          <input type="radio" id="p31-4" name="pregunta35" value="4">
          <label for="p35-4">4</label>
        </div>
        <textarea id="comentario35" name="comentario35" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta36">Las brigadas contra incendio tienen, al menos, las funciones siguientes:
          <br>- Evaluar los riesgos de la situación de emergencia por incendio, a fin de tomar las decisiones y acciones que correspondan, a través del responsable de la brigada o, quien tome el mando a falta de éste, de acuerdo con el plan de atención a emergencias de incendio.
          <br>- Reconocer y operar los equipos, herramientas y sistemas fijos contra incendio, así como saber utilizar el equipo de protección personal contra incendio, de acuerdo con las instrucciones del fabricante, los procedimientos establecidos y la capacitación impartida por el patrón o las personas capacitadas que éste designe.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.8 Elaborar un programa de capacitación anual teórico-práctico en materia de prevención de incendios y atención de emergencias, conforme a lo previsto en el Capítulo 11 de esta Norma, así como capacitar a los trabajadores y a los integrantes de las brigadas contra incendio, con base en dicho programa.<br>
          10. Capacitación.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta37">Cuenta con un programa de capacitación anual teórico-práctico en materia de prevención de incendios y atención de emergencias.</label>
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
        <label for="pregunta38">Capacita a los trabajadores en los aspectos básicos de riesgos de incendio y conceptos del fuego.</label>
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
        <label for="pregunta39">Proporciona a los trabajadores entrenamiento teórico-práctico, según aplique, para:
          <br>- Manejar los extintores y/o sistemas fijos contra incendio.
          <br>- Actuar y responder en casos de emergencia de incendio, así como para prevenir riesgos de incendio en las áreas de trabajo donde se almacenen, procesen y manejen materiales inflamables o explosivos, en lo referente a:
          <br>* Instalaciones eléctricas.
          <br>* Instalaciones de aprovechamiento de gas licuado de petróleo o natural.
          <br>* Prevención de actos inseguros que puedan propiciar incendios.
          <br>* Medidas de prevención de incendios.
          <br>* Orden y limpieza.
          <br>- Participar en el plan de ayuda mutua que se tenga con otros centros de trabajo, en su caso.
          <br>- Identificar un fuego incipiente y combatirlo, así como activar el procedimiento de alertamiento.
          <br>- Conducir a visitantes del centro de trabajo en simulacros o en casos de emergencia de incendios a un lugar seguro.</label>
        <div class="radio-buttons">
          <input type="radio" id="p39-0" name="pregunta39" value="0">
          <label for="p39-0">0</label>
          <input type="radio" id="p39-1" name="pregunta39" value="1">
          <label for="p39-1">1</label>
          <input type="radio" id="p39-2" name="pregunta39" value="2">
          <label for="p39-2">2</label>
          <input type="radio" id="p39-3" name="pregunta39" value="3">
          <label for="p31-3">3</label>
          <input type="radio" id="p39-4" name="pregunta39" value="4">
          <label for="p39-4">4</label>
        </div>
        <textarea id="comentario39" name="comentario39" placeholder="Comentario"></textarea>
      </div>

      <div class="conteiner">
        <label for="pregunta40">Proporciona a los brigadistas de los centros de trabajo clasificados con riesgo de incendio alto, capacitación adicional en la aplicación de las instrucciones para atender emergencias de incendio, en apego al plan de atención a emergencias de incendio, con los temas siguientes:
          <br>- El contenido del plan de atención a emergencias de incendio, establecido en el Capítulo 8 de la presente Norma.
          <br>- Las estrategias, tácticas y técnicas para la extinción de fuegos incipientes o, en su caso, incendios, de acuerdo con las emergencias potenciales del centro de trabajo y el plan de atención a emergencias de incendio.
          <br>- Los procedimientos básicos de rescate y de primeros auxilios.
          <br>- La comunicación interna con trabajadores y brigadistas, y externa con grupos de auxilio.
          <br>- La coordinación de las brigadas con grupos externos de auxilio para la atención de las situaciones de emergencia.
          <br>- El funcionamiento, uso y mantenimiento de los equipos contra incendio.
          <br>- Las verificaciones de equipos para protección y combate de incendios, así como para el equipo de primeros auxilios.
          <br>- El manejo seguro de materiales inflamables o explosivos, en casos de emergencias, considerando los aspectos siguientes:
          <br>* Las propiedades y características de dichos materiales, mismas que pueden ser consultadas en sus respectivas hojas de datos de seguridad.
          <br>* Los riesgos por reactividad.
          <br>* Los riesgos a la salud.
          <br>* Los medios, técnicas y precauciones especiales para la extinción.
          <br>* Las contraindicaciones del combate de incendios.
          <br>* Los métodos de mitigación para controlar la sustancia.
          <br>- El responsable de la brigada y quien sea designado para suplirle en sus ausencias, reciban además capacitación en la toma de decisiones y acciones por adoptar, dependiendo de la magnitud y clase de fuego.</label>
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
        <label for="pregunta41">El programa anual de capacitación contiene, al menos, la información siguiente:
          <br>- Los puestos de trabajo involucrados en la capacitación.
          <br>- Los temas de la capacitación, de acuerdo con los numerales 11.1, 11.2 y 11.3 de esta Norma.
          <br>- Los tiempos de duración de los cursos, pláticas o actividades de capacitación y su periodo de ejecución.
          <br>- El nombre del responsable del programa.</label>
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
        <label for="pregunta42">Al entrevistar a los trabajadores, seleccionados de acuerdo con el criterio muestral de la Tabla 2 del numeral 13.4, así como a dos integrantes de la(s) brigada(s) contra incendio, en su caso, se constata que poseen conocimientos sobre los temas en los que fueron capacitados.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.9 Dotar del equipo de protección personal a los integrantes de las brigadas contra incendio, considerando para tal efecto las funciones y riesgos a que estarán expuestos, de conformidad con lo previsto en la NOM-017-STPS-2008, o las que la sustituyan.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta43">Al realizar un recorrido por el centro de trabajo, se constata que los integrantes de la(s) brigada(s) contra incendio cuentan con el equipo de protección personal contra incendio, seleccionado de conformidad con lo previsto en la NOM-017-STPS-2008, o las que la sustituyan.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.10 Contar en las áreas de los centros de trabajo clasificadas con riesgo de incendio ordinario, con medios de detección y equipos contra incendio, y en las de riesgo de incendio alto, además de lo anteriormente señalado, con sistemas fijos de protección contra incendio y alarmas de incendio, para atender la posible dimensión de la emergencia de incendio, mismos que deberán ser acordes con la clase de fuego que pueda presentarse.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta44">Al realizar un recorrido por el centro de trabajo, se constata que en las áreas clasificadas con riesgo de incendio ordinario, se cuenta con medios de detección y equipo contra incendio, y en las de riesgo de incendio alto, además de lo anteriormente señalado, con sistemas fijos de protección contra incendio y alarmas de incendio, para atender la posible dimensión de la emergencia de incendio, mismos que son acordes con la clase de fuego que pueda presentarse.</label>
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.11 Contar con alguno de los documentos que enseguida se señalan, tratándose de centros de trabajo con riesgo de incendio alto:
          <br>a) El acta y la minuta correspondientes a la verificación satisfactoria del cumplimiento de la presente Norma, que emita la Secretaría del Trabajo y Previsión Social, en el marco de las evaluaciones integrales del Programa de Autogestión en Seguridad y Salud en el Trabajo.
          <br>b) El dictamen de cumplimiento de esta Norma expedido por una unidad de verificación acreditada y aprobada.
          <br>c) El acta circunstanciada que resulte de la revisión, verificación, inspección o vigilancia de las condiciones para la prevención y protección contra incendios en los centros de trabajo, por parte de la autoridad local de protección civil que corresponda al domicilio del centro de trabajo, en el marco de los programas internos, específicos o especiales de protección civil.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta45">El acta y la minuta correspondientes a la verificación satisfactoria del cumplimiento de la presente Norma, que emita la Secretaría del Trabajo y Previsión Social, en el marco de las evaluaciones integrales del Programa de Autogestión en Seguridad y Salud en el Trabajo.</label>
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
        <label for="pregunta46">El dictamen de cumplimiento de esta Norma expedido por una unidad de verificación acreditada y aprobada.</label>
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
        <label for="pregunta47">El acta circunstanciada que resulte de la revisión, verificación, inspección o vigilancia de las condiciones para la prevención y protección contra incendios en los centros de trabajo, por parte de la autoridad local de protección civil que corresponda al domicilio del centro de trabajo, en el marco de los programas internos, específicos o especiales de protección civil.</label>
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
      
        <!-- Repite el bloque anterior para cada pregunta -->
      
        <input type="submit" value="Enviar" name="guardar_n022010">
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
var totalPreguntas = 47;


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
            name: "NOM-002-STPS-2010",
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
</script>




<!-- Agrega el contenedor para la gráfica en tu HTML -->
<div id="graficaPastelContainer">
    <canvas id="graficaPastel"></canvas>
</div>

<!-- Incluye la biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Agrega el script de JavaScript para generar la gráfica -->
<script>
    // Obtén el número total de preguntas y el número de preguntas contestadas
    var totalPreguntas = <?php echo $result_usuarios->field_count - 2; ?>;
    var preguntasContestadas = <?php echo $numRespuestas; ?>;
    var porcentajeContestadas = (preguntasContestadas / totalPreguntas) * 100;
    var porcentajeNoContestadas = 100 - porcentajeContestadas;

    // Configura datos para la gráfica
    var datos = {
        labels: ['Contestadas', 'No Contestadas'],
        datasets: [{
            data: [porcentajeContestadas, porcentajeNoContestadas],
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