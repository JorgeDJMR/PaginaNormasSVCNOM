<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma2132002 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma2132002 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-213-SSA1-2002.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-213-SSA1-2002</h1>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n2132002.php" method="post">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5. Especificaciones sanitarias. Además de cumplir con lo establecido en la NOM-120-SSA1-1994, citada en el apartado de referencias, los establecimientos productores de productos cárnicos y los puntos de venta deben cumplir con lo siguiente.
            </label>
        </div>
        <hr class="styled-separator">
        <div>
          <h2>
              Criterio de aceptación
          </h2>
      </div>
        <div class="conteiner">
            <label for="pregunta1">El agua que se utilice en el proceso de los productos objeto de esta Norma debe cumplir con
              las especificaciones microbiológicas establecidas en la NOM-127-SSA1-1994, citada en el apartado de
              referencias.</label>
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
        <label for="pregunta2">El agua no apta para consumo humano u otros líquidos, deben circular por tuberías separadas e identificadas de acuerdo con lo señalado en la NOM-026-STPS-1993, citada en el apartado de referencias. Las tuberías de los fluidos que no estén considerados en dicha Norma, deben
          identificarse conforme al código que determine cada empresa, el cual se colocará en un lugar visible para el personal.</label>
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
        <label for="pregunta3">Los productos de importación, además de cumplir con esta Norma, deben cumplir con lo señalado en la NOM-030-ZOO-1995, citada en el apartado de referencias.</label>
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
        <label for="pregunta4">Se debe contar con programas y procedimientos escritos de limpieza y desinfección, de las  instalaciones y equipo, así como del mantenimiento de los dispositivos para el registro de tiempos y
          temperaturas, según corresponda.</label>
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
        <label for="pregunta5">Cuando no se encuentren en uso, el equipo, los detergentes, desinfectantes y otras sustancias que se utilicen para la limpieza y desinfección del establecimiento, deben resguardarse en un área exclusiva, identificada y aislada del área de proceso. Debe evitarse que los equipos o
          sustancias que se encuentren en uso dentro del área de producción entren en contacto con materias primas, productos o instalaciones que los contengan. En el caso de los plaguicidas deben mantenerseen un área aislada bajo resguardo de personal autorizado por la Secretaría de Salud.</label>
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
        <label for="pregunta6">Cualquier producto, materia prima o ingrediente debe colocarse en mesas, estibas, tarimas, anaqueles, estantes, entrepaños o cualquier estructura que evite el contacto directo con el piso, paredes o techo.</label>
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
        <label for="pregunta7">Los productos cárnicos cocidos y los crudos, cuyo porcentaje de humedad sea mayor de 35%, deben almacenarse de manera que su temperatura en el centro térmico sea de 7°C como máximo.</label>
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
        <label for="pregunta8">Los productos congelados deben mantener una temperatura mínima en su centro térmico suficiente para alcanzar el tiempo de vida de anaquel que establezca el fabricante.
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
        <label for="pregunta9">El personal del área de producción debe usar ropa de trabajo, calzado de hule o industrial y cubrepelo. El personal que entre en contacto directo con el producto, además debe utilizar cubrebocas. Los mandiles y el calzado de hule deben lavarse y desinfectarse como mínimo al inicio, al reingresar a
          las áreas de proceso y al final de la jornada. El establecimiento debe proporcionar la ropa de trabajo limpia.</label>
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
        <label for="pregunta10">El personal debe lavarse y desinfectarse las manos y antebrazos, así como cepillarse las uñas antes de ingresar a las áreas de proceso, después de entrar en contacto con tejidos o partes no aptas y antes de manipular productos cocidos si ha entrado en contacto con materias primas,
          productos crudos o madurados.</label>
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
        <label for="pregunta11">Se debe retirar o reubicar de las áreas de producción al personal que presente alguno de los siguientes signos clínicos: tos frecuente, secreción nasal, vómito, diarrea, fiebre o lesiones en la piel. El personal que haya presentado alguno de los signos anteriores sólo podrá reintegrarse a sus
          actividades hasta haber sanado.</label>
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
        <label for="pregunta12">Los responsables de los establecimientos productores de productos cárnicos, deben proporcionar ropa de trabajo limpia y canastillas o casilleros para que el personal pueda guardar la ropa de calle y artículos personales, dichos casilleros o canastillas deben ubicarse fuera de las áreas de
          producción.</label>
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
        <label for="pregunta13">No debe entrar en contacto directo con dinero.</label>
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
        <label class="conteiner">5. Especificaciones sanitarias. Además de cumplir con lo establecido en la NOM-120-SSA1-1994, citada en el apartado de referencias, los establecimientos productores de productos cárnicos y los puntos de venta deben cumplir con lo siguiente. 5.1.3 Específicas
          Los establecimientos productores de productos cárnicos, además de lo anterior, deben cumplir con lo siguiente:
          
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta14">En las áreas donde se realicen las operaciones que van desde la recepción de animales hasta el faenado, corte o deshuese, se debe cumplir con lo señalado en la norma NOM-194-SSA1-2004, señalada en el apartado de referencias.</label>
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
        <label for="pregunta15">El proceso debe ser lineal y fluido, de forma que no existan retrocesos ni contaminación cruzada con los productos en distintas etapas de proceso.</label>
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
        <label for="pregunta16">A la entrada de las áreas de proceso, excepto en las cámaras de almacenamiento, refrigeración o congelación, debe existir un tapete sanitario con solución desinfectante; así como lavamanos, jabón sólido o líquido, cepillos para uñas, solución desinfectante, toallas desechables o
          secador de aire caliente, un recipiente con tapa para los papeles, de accionamiento de pedal y una protección que evite salpicaduras a las materias primas o a los productos. Se debe contar con letreros en los que se señale a los trabajadores la obligación y la importancia del lavado y desinfección.</label>
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
        <label for="pregunta17">Todo el material y equipo que entre en contacto directo con el producto, debe lavarse y desinfectarse antes del inicio de la jornada, al final de ésta o cuando se vayan a procesar materias
          primas o diferentes tipos de productos.</label>
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
        <label for="pregunta18">Se debe contar con iluminación natural o artificial en todas las áreas, ésta no debe dar lugar a confusión en tonalidades o colores.</label>
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
        <label for="pregunta19">A partir de su recepción, las canales, medias canales y cuartos de canal deben mantenerse suspendidas mediante un sistema de rieles. El traslado de vísceras y estructuras anatómicas debe hacerse en envases de material sanitario. Cuando se opte por mantener suspendida la materia prima o
          los productos, esto debe hacerse de manera que exista una distancia no menor de 30 cm entre el piso, paredes y techo y la parte más cercana de la materia prima o los productos.</label>
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
        <label for="pregunta20">En el caso de cajas de plástico, las que entren en contacto directo con el piso, no se deben apilar, estibar o usar para contener productos y deben identificarse con un color distinto.</label>
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
        <label for="pregunta21">La materia prima debe inspeccionarse durante la recepción, a fin de eliminar toda aquella no apta para consumo humano, debiéndose contar con recipientes específicos y rotulados para su almacenamiento. Estos recipientes sólo podrán llenarse hasta el punto en que las tapas no entren en
          contacto con el producto contenido en ellos y deben ser enviados a un área de confinamiento o destrucción por lo menos en cuanto se llenen.</label>
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
        <label for="pregunta22">La materia prima, ingredientes y producto terminado, no deben entrar en contacto directo con pisos, paredes o techos.</label>
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
        <label for="pregunta23">Cuando se utilicen vísceras y estructuras anatómicas, éstas deben ser lavadas en el establecimiento de origen y almacenadas a temperatura de refrigeración o congelación, excepto las saladas, no debiendo entrar en contacto directo con otras materias primas.</label>
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
        <label for="pregunta24">En el caso de las vísceras, deben lavarse interna y externamente, antes del retiro de las mucosas, conservarse en refrigeración o congelación y someterse a lavado y desinfección antes de su uso. Las mucosas y contenidos deben ser manejados de conformidad con lo señalado en el punto
          5.1.3.8.</label>
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
        <label for="pregunta25">La materia prima perecedera debe mantenerse durante su almacenamiento a temperaturas no mayores a 7ºC en su centro térmico.</label>
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
        <label for="pregunta26">Deben existir recipientes de desinfección con agua a una temperatura de 82,5°C para instrumentos de corte o contar con un procedimiento equivalente. Los instrumentos de corte deben desinfectarse cada vez en entren en contacto con el piso, tejidos o partes no aptas, cada vez que haya
          alguna interrupción de las actividades o antes de utilizarse en productos cocidos, si fueron utilizados en materias primas o productos crudos o madurados.</label>
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
        <label for="pregunta27">La sal que se utilice para la elaboración de los productos objeto de esta Norma, debe cumplir con las especificaciones establecidas en la Modificación a la NOM-040-SSA1-2001, citada en el apartado de referencias.</label>
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
        <label for="pregunta28">El hielo que se utilice para la elaboración de los productos objeto de esta Norma, debe cumplir con las especificaciones microbiológicas establecidas en la NOM-201-SSA1-2002, citada en el apartado de referencias.</label>
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
        <label for="pregunta29">En aquellos productos en los que se adicionen aditivos, se debe contar con un manual o instrucciones claramente visibles para el personal en las que se establezcan los procedimientos para dosificar. Los recipientes en los que se almacenen los aditivos deben estar rotulados de manera que se
          identifique su nombre, manejo y las instrucciones de conservación.</label>
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
        <label for="pregunta30">En el caso de los productos en los que se utilice sangre, los recipientes utilizados deben lavarse inmediatamente después de su vaciado y mantenerse en áreas limpias y protegidas del polvo y fauna nociva.</label>
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
        <label for="pregunta31">Los productos cocidos deben alcanzar como mínimo una temperatura de 70°C en su centro térmico, o una relación tiempo-temperatura equivalente.</label>
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
        <label for="pregunta32">Los productos cárnicos sometidos a un proceso de esterilidad comercial, además de cumplir con lo señalado en esta Norma a excepción de las especificaciones microbiológicas, deben cumplir con las disposiciones sanitarias y especificaciones microbiológicas establecidas en la NOM-130-SSA1-
          1995, citada en el apartado de referencias.</label>
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
        <label for="pregunta33">En el caso de los productos cárnicos envasados, el recubrimiento interno de los envases metálicos debe cumplir con lo que se establece en la NOM-130-SSA-1995, citada en el apartado de referencias.</label>
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
        <label for="pregunta34">Cuando se utilicen telas para cubrir las carnes durante su secado o cocción, deben lavarse y desinfectarse previamente con agua a una concentración máxima de cloro de 20 mg/L y mantenerse protegidas de polvo y fauna nociva.</label>
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
        <label for="pregunta35">El diseño de las cámaras de congelación, debe permitir la recolección del agua de desescarche y evitar la condensación. Debe contar con suficiente capacidad de almacenamiento para permitir la circulación de aire frío por todos los productos.</label>
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
        <label for="pregunta36">Cuando se realice el ahumado natural, la madera empleada no debe ser oleosa, resinosa ni pintada o barnizada.</label>
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
        <label for="pregunta37">Las áreas destinadas al almacenamiento de los productos objeto de esta Norma, deben contar con una separación física de otros productos alimenticios a fin de evitar la contaminación cruzada.</label>
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
        <label for="pregunta38">No deben permanecer en esta área productos abiertos o con la envoltura rota.</label>
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
        <label for="pregunta39">La estiba en cualquier área, debe realizarse de manera que se evite el rompimiento y exudación de empaques y envolturas.</label>
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
        <label for="pregunta40">Las unidades de refrigeración deben contar con termómetros en lugar visible y con graficadores o bitácoras que permitan verificar el mantenimiento y continuidad de la temperatura a 7°C como máximo.</label>
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
        <label for="pregunta41">La estiba en cualquier área debe realizarse evitando el rompimiento y exudación de empaques y envolturas .</label>
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
        <label for="pregunta42">La cantidad del producto a exhibirse debe permitir una ventilación adecuada.</label>
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
        <label for="pregunta43">Los productos que se encuentren en esta área, no deben entrar en contacto directo con techos, paredes, mesas o básculas.</label>
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

  </div>
      <div class="conteiner">
        <label for="pregunta44">Los productos a granel deben ser rebanados únicamente en presencia del consumidor.</label>
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
        <label for="pregunta45">Las unidades de corte deben limpiarse al inicio de la labor y desinfectarse por lo menos cada 4 horas de trabajo, en especial cuando en la misma unidad se realice el rebanado de productos
          distintos a los objetos de esta Norma, no deben usarse franelas o telas semejantes para ejecutar la limpieza.</label>
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
        <label for="pregunta46">Los productos cárnicos cocidos deben mantenerse a una temperatura máxima en su centro térmico de 7°C.</label>
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
        <label for="pregunta47">Las unidades de refrigeración deben mantenerse a una temperatura no mayor a 7ºC en forma constante y deben contar con termómetros en lugar visible.</label>
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
        <label for="pregunta48">Debe existir un área específica para el manejo y depósito de desechos sólidos.
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
        <label for="pregunta49">Los productos cárnicos cocidos deben mantenerse a una temperatura máxima en su centro térmico de 7ºC.
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
        <label for="pregunta50">Los vehículos de trasporte deben someterse a lavado al inicio de la jornada de trabajo.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.2.1 Límites máximos para microorganismos y parásitos
          
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta51">Los productos objeto de esta Norma deben estar exentos de materia extraña. Las astillas de hueso no deben tener una longitud mayor a 2 mm.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.3.1 El proceso de los productos objeto de esta Norma debe documentarse en bitácoras o registros, de manera que garantice los requisitos establecidos en la Tabla 4. 
          Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben:
          
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta52">Contar con respaldos que aseguren la veracidad de la información y un procedimiento para la prevención de acceso y correcciones no controladas.
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
        <label for="pregunta53">Conservarse por lo menos durante 1 año y estar a disposición de la autoridad sanitaria cuando así lo requiera.
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
        <label for="pregunta54">El diseño del formato queda bajo la responsabilidad del particular.
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
        <label for="pregunta55">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Almacenamiento de materias primas: Datos completos y actualizados de los proveedores; Primeras 
          entradas-primeras salidas; pH y temperatura de recepción y almacenamiento (en su caso); Identificación de cámaras de refrigeración o congelación; Fecha; Personal encargado de la 
          operación o de la supervisión.
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
        <label for="pregunta56">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Almacenamiento de producto terminado; Primeras entradas-primeras salidas (en su caso); Temperatura en centro térmico; 
          Temperatura del área de almacenamiento; Identificación de cámaras de refrigeración o congelación; Fecha; Personal encargado de la operación o de la supervisión.
          
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
        <label for="pregunta57">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Análisis de parámetros sanitarios de la materia prima. Resultados de los análisis del agua y hielo; 
          Laboratorio; Fecha; Personal encargado de la operación o de la supervisión.
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
        <label for="pregunta58">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Análisis de parámetros sanitarios del producto terminado. Lote: Resultados, Fecha, Personal encargado 
          de la operación o de la supervisión.
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
        <label for="pregunta59">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Limpieza y desinfección del equipo, utensilios, Instalaciones y vehículos de transporte. Procedimiento: 
          Fecha y hora, Turno, Sustancias usadas, Dosificación, Enjuagues, Tiempos de contacto, Temperatura (en su caso), Personal encargado de la operación o de la supervisión.
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
        <label for="pregunta60"> Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Proceso Causas de rechazo y destino de materias primas y productos rechazados Aditivos: Nombre, 
          Dosificación, Fecha, Personal encargado de la operación o de la supervisión.
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
        <label for="pregunta61">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Proceso Tratamiento térmico:Lote, Temperatura en el centro térmico o relación tiempo-temperatura 
          equivalente, Fecha/hora, Personal encargado de la operación o de la supervisión.
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
        <label for="pregunta62">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Proceso Temperatura de transporte: Lote, Temperatura ambiente al inicio y al final del recorrido, 
          Fecha/hora, Personal encargado de la operación o de la supervisión.
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
        <label for="pregunta63">Los registros o bitácoras incluyendo los que se elaboren por medios electrónicos deben: Proceso Mantenimiento de los instrumentos de control de proceso: Operación realizada, Fecha, 
          Personal encargado de la operación o de la supervisión.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">6.1 El procedimiento de muestreo de los productos objeto de esta Norma, se debe sujetar a lo siguiente:
          
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta64">Cuando existan productos envasados en presentaciones menores a 1 kg deben tomarse con el envase original sin violación tomando unidades que correspondan a dicha cantidad.
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
        <label for="pregunta65">Cuando las presentaciones de productos preenvasados sean mayores a 1 kg o venta a granel, la muestra debe ser proporcionada por el personal del área de venta al público.
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
        <label for="pregunta66">Se debe depositar la muestra en un recipiente estéril y transportar en refrigeración.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">6.2 Identificación de la muestra.
          
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta67">En caso de productos en presentación mayor a 1 kg o de venta a granel la muestra debe ser identificada con la siguiente leyenda: "producto manipulado en punto de venta".
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
        <label for="pregunta68">Toda muestra debe indicar la temperatura a la cual fue tomada.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8.1.1 Cuando en las etiquetas se declaren u ostenten en forma escrita, gráfica o descriptiva que los
          productos, su uso, ingredientes o cualquier otra característica, están recomendados, respaldados o
          aceptados por centros de investigación, asociaciones, entre otros, los cuales deberán contar con
          reconocimiento nacional o internacional de su experiencia y estar calificados para dar opinión sobre la
          información declarada. Se deberá contar con el sustento técnico respectivo, el que estará a la
          disposición de la Secretaría en el momento que lo solicite. Dichas declaraciones deben sujetarse a lo
          siguiente:
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta69">La leyenda debe describir claramente la característica referida.
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
        <label for="pregunta70">Estar precedida por el símbolo o nombre del organismo
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
        <label for="pregunta71">Figurar con caracteres claros y fácilmente legibles.
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
        <label for="pregunta72">Cuando se trate de productos con modificaciones en su composición, referentes a menor
          contenido de sodio, grasa, grasa saturada, colesterol, calorías o adicionados, deben ostentar las
          denominaciones establecidas en la NOM-086-SSA1-1994, citada en el apartado de referencias.
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
        <label for="pregunta73"> En el caso de que el producto haya sido objeto de algún tipo de tratamiento, se puede indicar el nombre de éste.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8.3 Lista de ingredientes.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta74">En la lista de ingredientes debe emplearse el nombre específico de los mismos, incluyendo la especie o especies.
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
        <label for="pregunta75">Los aditivos empleados en la elaboración de los productos objeto de esta Norma, deben
          reportarse con el nombre común o los sinónimos establecidos en el Acuerdo y sus modificaciones, a
          excepción de los saborizantes y las enzimas, los cuales pueden figurar con la denominación genérica.
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
        <label class="conteiner">8.4 Fecha de caducidad.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta76">En el caso de los productos cárnicos cocidos y crudos con un porcentaje de humedad igual o mayor de 35%, debe aparecer la fecha de caducidad.
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
        <label for="pregunta77">Cuando se conserven en refrigeración, debe aparecer la fecha de caducidad, señalando día, mes y año.
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
        <label for="pregunta78">Cuando se conserven en congelación, debe aparecer la fecha de caducidad, señalando cuando menos mes y año.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8.5 Leyendas de conservación.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta79">En el caso de los productos cárnicos cocidos y crudos con un porcentaje de humedad igual o
          mayor de 35%, debe aparecer la leyenda: "consérvese en refrigeración o congelación", según sea el caso.
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
        <label for="pregunta80">Para el caso de los productos congelados, debe aparecer la leyenda: "Una vez descongelado, no debe volverse a congelar".
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8.6 Leyendas precautorias o de advertencia.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta81">En el caso de los productos cárnicos crudos, debe aparecer la leyenda: "este producto debe
          consumirse bien cocido" o equivalente.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">8.7 Envases múltiples o colectivos.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta82">Cuando los productos objeto de este ordenamiento se encuentren en un envase múltiple o
          colectivo para su venta al consumidor, éste debe contar con la información que se refiere la presente
          Norma Oficial Mexicana, en tanto que los envases individuales podrán ostentar en sus etiquetas la
          misma información o sólo la indicación de lote; fecha de caducidad, en su caso; además de la leyenda
          "No etiquetado para su venta individual".
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
        <label for="pregunta83">Cuando el envase esté cubierto por una envoltura, debe figurar en ésta toda la información
          necesaria, excepto en los casos en que la etiqueta aplicada al envase pueda leerse fácilmente a través
          de la envoltura exterior.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">9.1 Envase.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta84">Los productos objeto de esta Norma se deben envasar en recipientes de tipo sanitario,
          elaborados con materiales inocuos y resistentes a distintas etapas del proceso, de tal manera que no
          reaccionen con el producto o alteren sus características microbiológicas, físicas, químicas y
          sensoriales.
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

      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">9.2 Embalaje.
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta85">Se debe usar material resistente que ofrezca la protección a los envases para impedir su
          deterioro exterior a la vez que faciliten su manipulación, almacenamiento y distribución.
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

        <!-- Repite el bloque anterior para cada pregunta -->
      
        <input type="submit" value="Enviar" name="guardar_n2132002">
      </form>

      <div style="text-align: right; margin-top: 20px;">
        <button onclick="generatePDF()" id="botonDescarga" disabled style="background-color: #4CAF50; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s;" onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">Generar PDF</button>
        <button onclick="openGraphPDF()" style="background-color: #008CBA; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s, color 0.3s; margin-left: 10px;">Abrir Gráfica</button>
      </div>

      <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
      
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
var totalPreguntas = 85;


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
            name: "NOM-213-STPS-2002",
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

function generarPDF() {
    // Crear un nuevo objeto jsPDF
    var pdfObject = new jsPDF();

    // Función para crear la gráfica de pastel como una imagen base64
    function createPieChartImage() {
        // Datos de ejemplo para la gráfica de pastel
        var pieData = {
            labels: ["Label 1", "Label 2", "Label 3"],
            datasets: [{
                data: [30, 50, 20],
                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
                hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
            }]
        };

        // Configuración de la gráfica de pastel
        var pieOptions = {
            responsive: true,
            maintainAspectRatio: false
        };

        // Crear un elemento canvas para la gráfica
        var canvas = document.createElement("canvas");
        canvas.width = 200; // Ajusta el ancho según tus necesidades
        canvas.height = 200; // Ajusta la altura según tus necesidades

        // Agregar el elemento canvas al cuerpo del documento (invisible)
        document.body.appendChild(canvas);

        // Crear la gráfica de pastel en el canvas
        var ctx = canvas.getContext("2d");
        new Chart(ctx, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });

        // Obtener la imagen base64 del canvas
        var chartImageBase64 = canvas.toDataURL("image/png");

        // Eliminar el canvas del cuerpo del documento
        document.body.removeChild(canvas);

        return chartImageBase64;
    }

    // Agregar el resto del contenido del PDF
    // ...

    // Agregar la gráfica de pastel al final del contenido del PDF
    var chartImageBase64 = createPieChartImage();
    pdfObject.addImage(chartImageBase64, 'PNG', 10, 250, 100, 100); // Ajusta las coordenadas y dimensiones según tus necesidades

    // Guardar o mostrar el PDF según sea necesario
    pdfObject.save('invoice.pdf');
}

// Resto del código...


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

<!-- aqui Termina-->


</body>
</html>