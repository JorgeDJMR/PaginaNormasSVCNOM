<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma062014 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma062014 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-006-STPS-2014.HTML</title>
</head>
<body>
    <div class="barrasuperior">
        <h1>Norma NOM-006-STPS-2014</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    
    <form action="guardar_n062014.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1.  Contar con un programa específico para la revisión y mantenimiento de la maquinaria empleada en el manejo y almacenamiento de materiales.

                7.1. En los centros de trabajo se deberá contar con un programa específico para la revisión y mantenimiento de la maquinaria empleada para el manejo y almacenamiento de materiales, así como con los registros sobre su ejecución, que consideren
                
                7.2. El programa específico para la revisión y mantenimiento de la maquinaria se deberá establecer conforme a las recomendaciones que al respecto señale el fabricante, así como en las condiciones de operación -tiempo e intensidad de uso-, y del ambiente, a las que se encuentra sometida.
                
                
                </label>
        </div>
        <hr class="styled-separator">

          <div class="conteiner">
              <label for="pregunta1">Cuenta con un programa específico para la revisión y mantenimiento de la maquinaria empleada en el manejo y almacenamiento de materiales
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

        <div class="conteiner">
          <label for="pregunta2">El programa específico para la revisión y mantenimiento de la maquinaria se establece conforme a las recomendaciones que al respecto señala el fabricante, así como en las condiciones de 
            operación -tiempo e intensidad de uso-, y del ambiente, a las que se encuentre sometida.
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

        <div class="conteiner">
          <label for="pregunta3">Presenta evidencia de que cuenta con los registros sobre la ejecución del programa específico para la revisión y mantenimiento de la maquinaria y equipos empleados en el manejo y 
            almacenamiento 
            de materiales, que consideran, según aplique, lo siguiente:	
            - La maquinaria objeto de la revisión y mantenimiento y, en su caso, su número de identificación;
            - La actividad por llevar a cabo;
            - La periodicidad con que se desarrolla;
            - El tipo de revisión realizada y, en su caso, el tipo de mantenimiento efectuado;
            - Las fechas de ejecución,
            - El responsable de su realización.
            
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
        <label class="conteiner">5.2. Contar con procedimientos para la instalación, operación y mantenimiento de la maquinaria utilizada en el manejo y almacenamiento de materiales y para la atención a emergencias que ocurran durante su uso.

            7.3. En las actividades de manejo y almacenamiento de materiales en los centros de trabajo mediante el uso de maquinaria, se deberá contar con procedimientos de seguridad para su instalación, operación y mantenimiento, elaborados de acuerdo con los manuales, instructivos o recomendaciones del fabricante o proveedor.
            
            7.4. Los procedimientos para la instalación de la maquinaria empleada en el manejo y almacenamiento de materiales en los centros de trabajo deberán considerar, según aplique
            
            7.5. Los procedimientos de seguridad para la operación de la maquinaria utilizada en el manejo y almacenamiento de materiales deberán considerar, según aplique
            
            7.6. El procedimiento de seguridad para la revisión y mantenimiento de la maquinaria utilizada en el manejo y almacenamiento de materiales deberá considerar, según aplique
            
            7.7. En los centros de trabajo se deberá contar con un procedimiento general para la atención a emergencias por el manejo y almacenamiento de materiales, que contemple, según aplique
            
        </label>
      </div>
      <hr class="styled-separator">

      <div class="conteiner">
        <label for="pregunta4">Cuenta con procedimientos para la instalación, operación y mantenimiento de la maquinaria utilizada en el manejo y almacenamiento de materiales y para la atención a emergencias que ocurren 
            durante su uso.
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
        <label for="pregunta5">Los procedimientos de seguridad para la instalación, operación y mantenimiento de la maquinaria, están elaborados de acuerdo con los manuales, instructivos o recomendaciones del fabricante 
            o proveedor.
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
        <label for="pregunta6">Las condiciones de estabilidad y resistencia del terreno de la zona, área o lugar donde se ubicará
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
      <!-- <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.4.  Contar con sanitarios (retretes, mingitorios, lavabos, entre otros) limpios y seguros para el servicio de los trabajadores y, 
          en su caso, con lugares reservados para el consumo de alimentos.
        </label>
      </div>
      <hr class="styled-separator"> -->
        <!-- Disposicion -->

      <div class="conteiner">
        <label for="pregunta7">Las distancias mínimas de seguridad a conservar respecto de construcciones, estructuras, líneas eléctricas energizadas u otro tipo de maquinaria que operan en el lugar, para su funcionamiento 
            y mantenimiento. Las distancias mínimas que se deben conservar respecto a las líneas eléctricas energizadas, se indican en la Tabla 1;
            
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
        <label for="pregunta8">El tipo de combustible o energía que la alimentará, y las medidas de seguridad señaladas por el fabricante, según aplique para:<br>
            - El ensamble y desensamble de sus componentes<br>
            - La fijación de sus componentes<br>
            - El montaje y suspensión de cables, cadenas y partes en movimiento<br>
            - La alimentación de energía o suministro de combustibles<br>
            - La delimitación o señalización del área de operación<br>
            - La conexión a tierra, y<br>
            - El acceso seguro del operador
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
        <label for="pregunta9">Los procedimientos de seguridad para la operación de la maquinaria utilizada en el manejo y almacenamiento de materiales consideran, según aplique, lo siguiente:<br>
            - El estado y presentación de los materiales: A granel; Por pieza suelta; Envasada;	 Empacada, y/o En contenedores;<br>
            - Los riesgos inherentes a la maquinaria empleada, así como a los materiales por manejar;<br>
            - Los riesgos inherentes a la carga, descarga, traslado o transporte, y estiba o desestiba de los materiales;<br>
            - Los elementos de sujeción de los materiales o contenedores
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
        <label for="pregunta10">La ubicación de las zonas en que se encuentran o transitan los trabajadores, o personas ajenas a los trabajos de manejo de materiales, a fin de prevenir cualquier accidente;

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
        <label for="pregunta11">La identificación de las condiciones peligrosas y factores de riesgo como:	<br>
            - La ubicación de elementos estructurales u otros con los que puede haber colisión;<br>
            - La cercanía a instalaciones eléctricas;<br>
            - La operación simultánea de otra maquinaria utilizada para el manejo de materiales, y<br>
            - Las derivadas de fenómenos meteorológicos;<br>
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
        <label for="pregunta12">Las medidas de seguridad para manipular los materiales

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
        <label for="pregunta13">El uso de códigos de señales entre el operador de la maquinaria y su ayudante;

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
        <label for="pregunta14">Los criterios para evitar o interrumpir las operaciones de manejo de materiales a través de maquinaria, cuando se compromete la seguridad de los trabajadores, tales como:<br>
            - Deterioro o daños en la maquinaria, equipos de control, cables de acero, eslingas, cadenas, ganchos u otros accesorios complementarios;<br>
            - Condiciones meteorológicas y geológicas inapropiadas, tales como lluvia, vientos intensos, iluminación insuficiente, sismos, entre otras, para la realización de este tipo de trabajos;<br>
            - Condiciones de salud alteradas del personal involucrado en estos trabajos;
            
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
        <label for="pregunta15">Las posibles situaciones de emergencia que se pueden presentar y las medidas para prevenirlas, y las autorizaciones que deben obtener los operadores;

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
        <label for="pregunta16">El procedimiento de seguridad para la revisión y mantenimiento de la maquinaria utilizada en el manejo y almacenamiento de materiales considera, según aplique, lo siguiente:<br>
            - La señalización y delimitación del área donde se lleva a cabo la revisión y mantenimiento;<br>
            - El uso de las herramientas adecuadas;
            
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
          <label for="pregunta17">La aplicación, antes del inicio de las actividades, de medios de bloqueo de energía, por medio del uso de tarjetas y candados, de conformidad con lo señalado por la NOM-004-STPS-1999, 
                o las que la sustituyan;

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
          <label for="pregunta18">La constatación de que las conexiones de los cables de carga y terminales cumplan con las especificaciones del fabricante

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
          <label for="pregunta19">La comprobación del libre funcionamiento de las botoneras o controles de mando y que su identificación está marcada permanentemente en ellas;

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
          <label for="pregunta20">El manual de mantenimiento que proporciona el fabricante;

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
          <label for="pregunta21">La identificación de los factores de riesgo, y las medidas específicas de seguridad por adoptar.

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
          <label for="pregunta22">Cuenta con un procedimiento general para la atención a emergencias por el manejo y almacenamiento de materiales, que contempla, según aplique, lo siguiente:	<br>
            - Los tipos de emergencias que se pueden presentar;	<br>
            - La forma de activar la alarma para alertar sobre la situación de emergencia;	<br>
            - La instrucción de poner la maquinaria involucrada en posición segura;		<br>
            - El botiquín, manual y personal capacitado para prestar los primeros auxilios, con base en el tipo de riesgos a que se exponen los trabajadores que realicen el manejo de materiales		<br>
            - La intervención de las brigadas de emergencia, conforme al manual, en su caso;		<br>
            - El directorio de los cuerpos de socorro competentes;	<br>
            - Los medios de transporte disponibles para que se pueda trasladar a los lesionados a un centro de atención médica

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
          <label for="pregunta23">El(Los) responsable(s) de su ejecución y coordinación, quien(es) cuentan con la capacitación y adiestramiento necesarios para esta función.

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
          <label class="conteiner">5.4 a) A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma	<br>

            7.7.1. El botiquín de primeros auxilios deberá tener las características siguientes:<br>
            a)    Ser de fácil acceso y transporte;<br>
            b)    Estar ubicado en un lugar visible;<br>
            c)    Estar identificado y señalizada su ubicación, de acuerdo con lo que dispone la NOM-026-STPS-2008, o las que la sustituyan;<br>
            d)    Evitar que cuente con candados o dispositivos que dificulten el acceso a su contenido;<br>
            e)    Contar con los materiales de curación, de conformidad con los riesgos identificados y el número de trabajadores expuestos, y<br>
            f)     Poseer un listado de los materiales de curación que contiene.<br>
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta24">Al realizar un recorrido por el centro de trabajo, se constata que el botiquín de primeros auxilios tiene las características siguientes:<br>
            - Es de fácil acceso y transporte;<br>
            - Está ubicado en un lugar visible;<br>
            - Está identificado y señalizada su ubicación, de acuerdo con lo que dispone la NOM-026-STPS-2008, o las que la sustituyan;<br>
            - Está libre de candados o dispositivos que dificultan el acceso a su contenido;	<br>
            - Cuenta con los materiales de curación, de conformidad con los riesgos identificados y el número de trabajadores expuestos, <br>
            - Posee un listado de los materiales de curación que contiene.
            
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
          <label class="conteiner">7.4 Los centros de trabajo podrán utilizar para identificar y analizar los factores de riesgo psicosocial y evaluar el entorno organizacional.
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta25">Las cargas de trabajo.
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
          <label class="conteiner">5.4 a) A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma<br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
            
            7.8.1. Medidas generales de seguridad<br>
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta26">Al realizar un recorrido por el centro de trabajo, se constata que para realizar las actividades de manejo y almacenamiento de materiales mediante el uso de maquinaria, adopta, según corresponda, <br>
            las medidas de seguridad generales siguientes:<br>
            - Realiza al inicio de cada jornada una revisión visual y prueba funcional de la maquinaria, según aplique, para verificar el buen estado y funcionamiento de los elementos siguientes:<br>
            - Controles de operación y de emergencia;<br>
            - Dispositivos de seguridad;<br>
            - Sistemas neumáticos, hidráulicos, eléctricos y de combustión;<br>
            - Señales de alerta y control;<br>
            - Estado físico que guarda la estructura en general, y<br>
            - Cualquier otro elemento especificado por el fabricante;
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
          <label for="pregunta27">Cuenta con dispositivos de paro de emergencia de la maquinaria y con avisos sobre su capacidad máxima de carga;

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
          <label for="pregunta28">Dispone de al menos un extintor del tipo y capacidad específica a la clase de fuego que se puede presentar;

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
          <label for="pregunta29">Delimita y evita el acceso a las áreas de operación de la maquinaria a trabajadores o personas ajenas a los trabajos de manejo de materiales, y mantiene dichas áreas libres de obstáculos;

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
          <label for="pregunta30">Dispone de la señalización relativa a la velocidad máxima de circulación de la maquinaria empleada en el manejo de materiales, así como de precaución, particularmente en los cruces o vías con 
            pendientes;
            
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
          <label for="pregunta31">Delimita y evita el acceso a las áreas de operación de la maquinaria a trabajadores o personas ajenas a los trabajos de manejo de materiales, y mantiene dichas áreas libres de obstáculos;

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
          <label for="pregunta32">Dispone de la señalización relativa a la velocidad máxima de circulación de la maquinaria empleada en el manejo de materiales, así como de precaución, particularmente en los cruces o vías con 
            pendientes;
            
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
          <label for="pregunta33">Coloca espejos convexos en los cruces de corredores, pasillos o calles donde circula maquinaria empleada en el manejo de materiales y, en caso de ser necesarios, de medios físicos en el piso para 
            reducir su velocidad;
            
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
          <label for="pregunta34">Supervisa que los trabajadores usan el equipo de protección personal durante el desempeño de sus actividades;

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
          <label for="pregunta35">Da seguimiento al programa específico de revisión y mantenimiento para la maquinaria;

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


        <div class="conteiner">
          <label for="pregunta36">Revisa la maquinaria por personal capacitado, en los casos siguientes: <br>
            - Cuando se detectan condiciones anormales durante su operación, y<br>
            - Después de la sustitución o reparación de alguna pieza sometida a esfuerzos;
            
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


        <div class="conteiner">
          <label for="pregunta37">Cuenta con protecciones en las partes de la maquinaria que pueden generar riesgos a los trabajadores, de acuerdo con lo que prevé la NOM-004-STPS-1999, o las que la sustituyan;

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

        <div class="conteiner">
          <label for="pregunta38">Prohíbe que se exceda la carga máxima de utilización de la maquinaria empleada en el manejo de materiales;

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

        <div class="conteiner">
          <label for="pregunta39">Prohíbe que se deje una carga suspendida sin la presencia del operador;

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


        <div class="conteiner">
          <label for="pregunta40">Prohíbe que los trabajadores empleen la maquinaria destinada para el manejo de materiales como medio de transporte de personal

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
          <label for="pregunta41">Prohíbe que menores de 18 años y mujeres en estado de gestación realicen actividades de instalación, operación o mantenimiento de la maquinaria utilizada en el manejo de materiales.

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
          <label class="conteiner">5.4 a) A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>
            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales<br>
            7.8.1 i) 3) Con base en el programa específico de revisión y mantenimiento, establecido, conforme a la frecuencia indicada por el fabricante;
            
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta42">Presenta evidencia documental de que revisa la maquinaria por personal capacitado.

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
          <label for="pregunta43">Presenta evidencia de que cuenta con los registros sobre la revisión de la maquinaria, con base en el programa específico de revisión y mantenimiento, establecido conforme a la frecuencia 
            indicada por el fabricante.
            
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
          <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
            
            7.8.2. Medidas de seguridad para el uso de polipastos y malacates<br>
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta44">Evita que la ubicación y puntos de anclaje constituyan un factor de riesgo;

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
          <label for="pregunta45">Considera, según sea el caso, su fijación en el carro; su ensamble y desensamble; el montaje y suspensión del cable o cadena; la fijación de la caja receptora, y la alimentación de energía, 
            incluyendo los diagramas eléctricos;
            
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
          <label for="pregunta46">Comprueba que están instalados los topes en los límites del área de operación, cuando se monta un polipasto sobre un carro monorriel;

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
          <label for="pregunta47">Provee libre acceso y espacio necesario para su operación;

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
          <label for="pregunta48">Verifica que todo polipasto eléctrico está conectado a tierra;

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
          <label for="pregunta49">Cumple en los polipastos de cable que: <br>
            - El número de vueltas del cable alrededor del tambor, es al menos de dos al estar totalmente desenrollado, y<br>
            - El enrollamiento máximo del cable en el tambor no excede el 75% del diámetro lateral exterior del mismo, e<br>
            - Identifica en el polipasto, en un lugar visible para los operadores:<br>
            - La carga máxima de utilización, <br>
            - La tensión eléctrica o presión de aire especificada en la placa de datos, cuando se trata de polipastos eléctricos o neumáticos, respectivamente;"
            
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
          <label for="pregunta50">Revisa físicamente la integridad de sus componentes antes de iniciar la jornada, con el objeto de detectar signos de ruptura, fatiga, deformación u otra condición que pueda generar riesgos 
            a los trabajadores o a las instalaciones;
            
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
          <label for="pregunta51">Revisa el equipo y comprueba que no rebasan la carga máxima de utilización;

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
          <label for="pregunta52">Usa la presión de aire indicada en la placa de datos, tratándose de polipastos neumáticos;

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
          <label for="pregunta53">Verifica que el amarre sea de modo tal que la carga queda debidamente asegurada y equilibrada;

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
          <label for="pregunta54">Evita el levantamiento de una misma carga, cuando se emplean de manera simultánea dos o más polipastos. De ser necesario, calcula el centro de carga y se realiza en forma coordinada;

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
          <label for="pregunta55">Levanta la carga a la menor altura posible cuando se pone en marcha el polipasto, con la finalidad de verificar que ésta no se desliza y evita que se incline durante su desplazamiento;

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
          <label for="pregunta56">Verifica que el levantamiento de la carga se realiza de modo vertical o que el punto de anclaje y de sujeción están en la misma línea para no dañar el equipo;

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
          <label for="pregunta57">Asegura que el polipasto no se someta a un esfuerzo superior al 50% de la carga máxima de utilización, cuando la temperatura del medio ambiente es inferior a -15 ºC;

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
          <label for="pregunta58">Evita accionamientos involuntarios de malacates y polipastos, cuando éstos se ponen en reposo y se dejan suspendidos;

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
          <label for="pregunta59">Cuenta con un responsable para accionar el trinquete de retención en los malacates de tambor de accionamiento manual;

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
          <label for="pregunta60">Cumple en los malacates de tambor que el descenso de la carga sea asegurado accionando el freno, de manera que se evita un aceleramiento inesperado de ésta, así como toda maniobra fuera 
            de control;
            
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
          <label for="pregunta61">Limita el número de arranques por hora y el tiempo de operación a los especificados por el fabricante;

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
          <label for="pregunta62">Verifica que el cable de acero: <br>
            - No se utiliza como tierra física;<br>
            - Se mantiene adecuadamente lubricado;<br>
            - No roza con superficies que lo pueden cortar o dañar, cuando está sujeto a tensión, y<br>
            - Se protege y evita el contacto de éste con humedad, gases y sustancias que pueden corroerlo;
            
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
          <label for="pregunta63">Verifica que la cadena del polipasto: <br>
            - Se mantiene adecuadamente lubricada;<br>
            - No presenta deformaciones, golpes, torceduras, entre otras, y<br>
            - No tiene eslabones soldados,
            
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
          <label for="pregunta64">Suspende de inmediato el levantamiento de los materiales, cuando se presenta un esfuerzo manual excesivo en la operación de la cadena de maniobra, manivelas o palancas de tracción o se 
            detecta cualquier otro riesgo
            
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
          <label for="pregunta65">Comprueba que todos los tornillos y tuercas están correctamente apretados;

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
          <label for="pregunta66">Revisa que los ganchos de carga cuentan con un pestillo de seguridad en buen estado;

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
          <label for="pregunta67">Verifica que el cable de acero: <br>
            - Se lubrica periódicamente, conforme a las instrucciones del fabricante;<br>
            -  Se reemplaza únicamente por otro del mismo tipo y características, de acuerdo con las especificaciones del fabricante, cuando presenta cualquiera de las condiciones siguientes: <br>
            -· Doce alambres rotos en forma aleatoria en un mismo torón por cada caída del cable;	<br>
            - Desgaste de más de un 10% del diámetro original del cable;<br>
            - Retorcimiento, cocas, bucles, aplastamiento, evidencia de daño por calor, quemaduras por flama o corrosión, o<br>
            - Se forman ondas o se produce una torsión no balanceada del cable, y<br>
            - Se guarda bajo techo y se evita el contacto de éstos con humedad, gases y sustancias que pueden corroerlos;
            
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

        <div class="conteiner">
          <label for="pregunta69">Considera para la cadena de carga lo siguiente: <br>
            - Que se sustituya únicamente por otra que cumple con las especificaciones del fabricante<br>
            - Que se retire inmediatamente del servicio si:<br>
            * Existen uno o más eslabones aplastados, torcidos, alargados, rotos, desgastados o fisurados, o<br>
            * Se detecta en un tramo de 11 eslabones de una cadena de carga en servicio una elongación superior al 5% en equipos manuales y al 3% en motorizados, con respecto a una cadena nueva de <br>
            las mismas características;<br>
            - Que se reemplace todo gancho:<br>
            · *  Deformado, torcido o con fisuras;	<br>
            * Abierto en más del 5% de su garganta, o<br>
            · *  Con desgaste mayor al 10% en el área de contacto con la carga, y<br>
            - Que se prohíba que se añadan eslabones soldados o provisionales, así como cualquier modificación que altere las características originales de la cadena;

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


        <div class="conteiner">
          <label for="pregunta71">Revisa el estado de las mangueras y las conexiones, así como el bloque de conexiones hidráulicas;
 
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
          <label for="pregunta72"> Verifica las conexiones eléctricas y que el motor gire en el sentido de las manecillas del reloj;

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
          <label for="pregunta73">Mantiene engrasados tanto los engranes como el sistema de frenado y el trinquete, de los malacates de tambor, de conformidad con las especificaciones del fabricante

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
          <label for="pregunta74">Somete todo polipasto o malacate a una prueba de carga para su adecuado funcionamiento, después de cualquier reparación o mantenimiento, con base en las indicaciones del fabricante.

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
          <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
             
            7.8.2.3. a) Determinar la periodicidad de las revisiones a la cadena de carga y de mando o palanca; al sistema eléctrico; a las terminales; al interruptor de límite; a la caja receptora; a las nueces; a los frenos; a los ganchos; a los engranajes; al motor, y a la carcasa;<br>
            
            7.8.2.3. b) Establecer la periodicidad de los ajustes del freno y del embrague o de los interruptores límite en los polipastos motorizados, de conformidad con las indicaciones del fabricante;<br>
            
            7.8.2.3. c) Realizar revisiones a cables, bielas, bloques de las mordazas y ganchos de apoyo de los malacates de accionamiento manual y motorizado, con base en las indicaciones del fabricante;<br>
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta75">Determina la periodicidad de las revisiones a la cadena de carga y de mando o palanca; al sistema eléctrico; a las terminales; al interruptor de límite; a la caja receptora; a las nueces; a los frenos; 
            a los ganchos; a los engranajes; al motor, y a la carcasa;
            
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
          <label for="pregunta76">Establece la periodicidad de los ajustes del freno y del embrague o de los interruptores límite en los polipastos motorizados, de conformidad con las indicaciones del fabricante

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
          <label for="pregunta77">Realiza revisiones a cables, bielas, bloques de las mordazas y ganchos de apoyo de los malacates de accionamiento manual y motorizado, con base en las indicaciones del fabricante.

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
          <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda <br>
             
            7.8.3. Medidas de seguridad para el uso de eslingas<br>
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta78">Utiliza sólo eslingas marcadas o etiquetadas con los datos de capacidad de carga y se cerciora que ésta sea superior al peso de la carga por levantar;

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
          <label for="pregunta79">Evita que la eslinga se instale en la nariz o punta de los ganchos de anclaje y carga;

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
          <label for="pregunta80">Comprueba que la zona de cosido de la eslinga de cinta nunca entra en contacto con la carga;

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
          <label for="pregunta81">Emplea eslingas con guardacabos o arcos de protección en cargas que tienen aristas vivas;

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
          <label for="pregunta82">Consulta al fabricante, cuando es necesario, sobre la exposición de eslingas textiles a agentes químicos;

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
          <label for="pregunta83">Almacena las eslingas textiles en lugares limpios y secos y lejos de fuentes de calor, rayos ultravioleta o luz solar;

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
          <label for="pregunta84">Suspende la operación de carga si: <br>
            - Se produce la rotación de una de las extremidades de la eslinga con cable de acero, o<br>
            -  Se presentan deformaciones en las eslingas con cable de acero, que pueden generar la rotación de la carga
            
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
          <label for="pregunta85">Prohíbe que se utilicen eslingas dañadas; se realicen nudos en las eslingas; se arrastre la carga a izar sobre las eslingas, y se utilicen eslingas textiles por encima de 100 °C o por debajo de -40 °C,

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
          <label for="pregunta86"> Marca o etiqueta las que han sido revisadas para indicar que pueden ser utilizadas, con la vigencia de la revisión,

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
          <label for="pregunta87">Retira del servicio las eslingas que presentan signos de ruptura, fatiga, deformación u otra condición que puede generar daños a los trabajadores o a las instalaciones.

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
          <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
             
            7.8.3.2 a) Comprobar que la revisión se realiza periódicamente, conforme a las instrucciones del fabricante, a efecto de asegurar que conservan sus condiciones seguras de uso;
            
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta88">Presenta evidencia de que cuenta con los registros sobre la revisión periódica de las eslingas, conforme a las instrucciones del fabricante, a efecto de asegurar que conservan sus condiciones 
            seguras de uso.
            
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
          <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

            7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
            
            7.8.4. Medidas de seguridad para el uso de grúas
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta89">Comprueba que la cabina: <br>
            - Garantiza una buena visibilidad en la zona de trabajo y está ventilada; <br>
            - Posee vidrios inastillables; <br>
            - Cuenta con limpiaparabrisas eléctrico o neumático, en caso de que opere a la intemperie, en condiciones de funcionamiento; <br>
            - Dispone de escalas de mano u otro medio de acceso seguro a la cabina de mando; <br>
            - Tiene un asiento cómodo y cuenta con cinturón de seguridad; <br>
            - Posee mandos colocados de modo que el operario dispone de espacio suficiente para maniobrar los controles, y <br>
            - Mantiene las palancas de mando protegidas para evitar accionamientos involuntarios
            
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
          <label for="pregunta90">Cuenta con dispositivos de frenado automático, cuando el peso máximo es superado, los cuales no están desactivados,
 
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
          <label for="pregunta91">Dispone de lastres o contrapesos, acordes con las cargas que soportan y las especificaciones del fabricante

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
          <label for="pregunta92">Comprueba que el operador utiliza el cinturón de seguridad;

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
          <label for="pregunta93">Cuenta con un letrero visible tanto para el operador de la maquinaria como para el personal involucrado en la maniobra de carga, que indica la carga máxima de utilización, en kg si es de 
            1,000 kg o menos, y en toneladas si es mayor;
            
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
          <label for="pregunta94">Utiliza un código de señales o sistema de comunicación para los operadores y ayudantes involucrados en el manejo de materiales;

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
          <label for="pregunta95">Sitúa al ayudante en un lugar que permita la máxima visibilidad de todas las trayectorias de operación de la grúa, y realiza las operaciones de acuerdo con el código de señales o sistema de 
            comunicación, cuando así se requiera;
            
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
          <label for="pregunta96">Asegura que el operador no mueva la grúa hasta que haya entendido la señal o indicación de su ayudante;

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
          <label for="pregunta97">Revisa, según aplique, los neumáticos de las ruedas al inicio de cada jornada para verificar que están exentos de cualquier daño o defecto, y que se encuentran a la presión correcta, de 
            conformidad con las instrucciones del fabricante;
            
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
          <label for="pregunta98">Emplea, en su caso, brazos estabilizadores en las grúas móviles, con base en las instrucciones del fabricante;
 
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
          <label for="pregunta99">Corrobora que los brazos estabilizadores están en condiciones seguras para realizar la operación de carga;

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
          <label for="pregunta100">Verifica que la carga se encuentre asegurada antes de izarla;

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
          <label for="pregunta101">Cumple, cuando una grúa móvil se desplaza llevando la carga suspendida, con lo siguiente: <br>
            - El brazo se orienta en la dirección del eje longitudinal de la grúa, salvo que ésta haya sido diseñada para transportar la carga lateralmente; <br>
            - No se inclina o prolonga hasta el punto en que la carga suspendida sea igual o superior a la carga máxima de seguridad correspondiente a la inclinación del brazo, y <br>
            - Se mantiene a la altura mínima necesaria para que la carga no choque con el piso por efecto del balanceo del brazo, y si ésta es de difícil manejo por su tamaño, se le atan cabos de retención  <br>
            para mantenerla fija, especialmente en condiciones de viento;
            
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
          <label for="pregunta102">Desplaza las cargas a una altura superior a la que se encuentran o circulan los trabajadores y, en lo posible, no son suspendidas o trasladadas por encima de las zonas donde se ubican o transitan 
            los trabajadores, vehículos u otros transeúntes;
            
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
          <label for="pregunta103">Cuentan con materiales amortiguadores que entran en contacto, en caso de choque, cuando por la misma vía circulan varias grúas, o por el mismo puente más de un carro de grúa;

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
          <label for="pregunta104">Considera para su operación los riesgos con motivo de sobrecargas por lluvia o viento que pueden estar presentes en el manejo de materiales;

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
          <label for="pregunta105">Desconecta el interruptor principal y lo deja bloqueado, de manera que evita la operación no autorizada, al finalizar la operación de la grúa

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
          <label for="pregunta106">Prohíbe que los trabajadores suban o desciendan de una grúa mientras ésta se encuentra en movimiento

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
          <label for="pregunta107">Dispone de un interruptor de protección general que desconecta la corriente eléctrica de la grúa al realizar operaciones de revisión y mantenimiento, cuando aplique, conforme al procedimiento 
            de bloqueo de energía determinado por la NOM-004-STPS-1999, o las que la sustituyan.
            
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


        <div class="conteiner">
          <label for="pregunta108">Somete las grúas a las pruebas de carga correspondientes que indique el fabricante, después de que sea modificada su estructura, accesorios, mecanismos, contrapesos, elementos de 
            estabilización o cualquiera otra parte que altere las condiciones de funcionamiento y antes de volver a operarla.
            
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
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

                7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
                
                 7.8.4.2 a) Ser operadas únicamente por personal capacitado y autorizado por el patrón;
                
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

            <div class="conteiner">
                <label for="pregunta109">Presenta evidencia documental de que las grúas son operadas únicamente por personal capacitado y autorizado.

                  
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
                <textarea id="comentario108" name="comentario108" placeholder="Comentario"></textarea>
              </div>

              <!-- Disposicion -->
         <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma

                7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda
                
                7.8.5. Medidas de seguridad para el uso de montacargas
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

              <!-- Bloque 110 -->
            <div class="conteiner">
                <label for="pregunta110">Constata que la cabina: <br>
                    - Proporciona protección al operador contra objetos que lleguen a caer, cuando la altura de elevación de la carga sea superior a 1.80 metros;<br>
                    - Provee protección contra la intemperie;<br>
                    - Garantiza una buena visión de la zona de trabajo;<br>
                    - Cuenta con espejo retrovisor;<br>
                    - Permite un fácil acceso al puesto de trabajo;<br>
                    - Dispone de piso antiderrapante;	<br>
                    - Está ventilada;<br>
                    - Tiene un asiento cómodo y cuenta con cinturón de seguridad, y<br>
                    - Es resistente al fuego en sus materiales de construcción;
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

            <!-- Bloque 111 -->
            <div class="conteiner">
                <label for="pregunta111">Cuenta con claxón y un dispositivo sonoro que se activa automáticamente durante su operación en reversa;
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

            <!-- Bloque 112 -->
            <div class="conteiner">
                <label for="pregunta112">Dispone de un dispositivo que emite una luz centellante o giratoria, color ámbar, que opera cuando el equipo está en movimiento, colocado de tal forma que no deslumbra al operador,

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

            <!-- Bloque 113 -->
            <div class="conteiner">
                <label for="pregunta113">Cuenta con luces delanteras y traseras que iluminan hacia la dirección en que se desplazan;
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

            <!-- Bloque 114 -->
            <div class="conteiner">
                <label for="pregunta114">Comprueba que el operador utiliza el cinturón de seguridad;
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

            <!-- Bloque 115 -->
            <div class="conteiner">
                <label for="pregunta115">Para operación de monta carga:  Frena y bloquea las ruedas de los vehículos que están siendo cargados o descargados;
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

            <!-- Bloque 116 -->
            <div class="conteiner">
                <label for="pregunta116">Asegura que no se sobrepasa la carga máxima de utilización indicada en la placa del fabricante;
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

            <!-- Bloque 117 -->
            <div class="conteiner">
                <label for="pregunta117">Opera el montacargas bajo un procedimiento de trabajo seguro;
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

            <!-- Bloque 118 -->
            <div class="conteiner">
                <label for="pregunta118">Enciende las luces delanteras y traseras, o la torreta durante su operación, cuando así se requiere;
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

            <!-- Bloque 119 -->
            <div class="conteiner">
                <label for="pregunta119">Circula con los brazos de la horquilla a una altura máxima entre 0.15 y 0.20 metros por encima del suelo, o de acuerdo con las indicaciones del fabricante;
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

            <!-- Bloque 120 -->
            <div class="conteiner">
                <label for="pregunta120">Respeta los límites de velocidad de la zona donde transita;
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

            <!-- Bloque 121 -->
            <div class="conteiner">
                <label for="pregunta121">Utiliza barreras de protección o topes en las plataformas o muelles en las que se operan, para evitar riesgos de caída;
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

            <!-- Bloque 122 -->
            <div class="conteiner">
                <label for="pregunta122">Efectúa el llenado de combustible o cambio y carga de baterías, en una zona ventilada y dispone de equipo para la atención de emergencias por incendio que pueden presentarse;
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

            <!-- Bloque 123 -->
            <div class="conteiner">
                <label for="pregunta123">Dispone de un área específica para la manipulación de baterías y cuenta con procedimientos de seguridad para manejarlas, en su caso;
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

            <!-- Bloque 124 -->
            <div class="conteiner">
                <label for="pregunta124">Estaciona el montacargas con los brazos de la horquilla descansando sobre el suelo, o de conformidad con las indicaciones del fabricante
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

            <!-- Bloque 125 -->
            <div class="conteiner">
                <label for="pregunta125">Desactiva el mecanismo de encendido al finalizar su operación para evitar el uso no autorizado,
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

            <!-- Bloque 126 -->
            <div class="conteiner">
                <label for="pregunta126">Para la revisión y mantenimiento de montacargas: Retira del servicio los montacargas que presentan anomalías en su funcionamiento.
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
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma <br>

                7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda<br>
                
                7.8.5.2 a)  Ser operados únicamente por personal capacitado y autorizado por el patrón;
                
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

            <!-- Bloque 127 -->
            <div class="conteiner">
                <label for="pregunta127">Presenta evidencia documental de que los montacargas son operados únicamente por personal capacitado y autorizado.
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

            <!-- Disposicion -->
         <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma

7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda

7.8.5.3 a) Realizar la revisión y mantenimiento con la periodicidad indicada por el fabricante, y con base en el programa específico que para tal efecto se elabore
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

            <div class="conteiner">
              <label for="pregunta128">Presenta evidencia de que cuenta con los registros sobre la revisión y mantenimiento de los montacargas y de que se realizan con la periodicidad indicada por el fabricante, y con base en el 
programa específico que para tal efecto se elaboró.
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
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma

7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda

7.8.6. Medidas de seguridad para el uso de electroimanes

            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

    <div class="conteiner">
        <label for="pregunta129">Cuenta con una fuente de energía eléctrica auxiliar para garantizar que ésta entra en servicio automáticamente, en caso de falla de la fuente principal de alimentación, de modo que la carga 
puede mantenerse suspendida por el tiempo que sea necesario hasta descenderla de manera segura, 
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

    <div class="conteiner">
    <label for="pregunta130">Para la operación de electroimanes: <br>
- Aplica la tensión eléctrica hasta que el electroimán está en contacto con la carga a levantar;<br>
- Coloca candados o tarjetas de seguridad que advierten el peligro de desconectar o, en su caso, conectar el interruptor de alimentación del electroimán durante la operación o un paro temporal, 
según corresponda;<br>
- Asegura que el electroimán cuenta con conexión a tierra eficaz;	<br>
- Desconecta la alimentación de energía cuando no se utiliza, y<br>
- Prohíbe su uso cerca de máquinas, de elementos de acero y de materiales ferrosos, para que no afecte la operación por la atracción magnética imprevista de tales elementos y materiales.
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
            <label class="conteiner">5.4 a)  A través del uso de maquinaria, de conformidad con lo establecido por el Capítulo 7 de esta Norma

7.8. En los centros de trabajo se deberá cumplir con las medidas de seguridad de la maquinaria empleada para realizar las actividades de manejo y almacenamiento de materiales, según corresponda

7.8.6.2 a) Ser operados únicamente por personal capacitado y autorizado por el patrón;

            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

<!-- Bloque 4 -->
<div class="conteiner">
    <label for="pregunta131">Presenta evidencia documental de que los electroimanes son operados únicamente por personal capacitado y autorizado.
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


        <!-- TERMINA LOS CUESTIONARIOS -->
      
        <input type="submit" name="guardar_n062014" value="Enviar">
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
            name: "NOM-006-STPS-2014",
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