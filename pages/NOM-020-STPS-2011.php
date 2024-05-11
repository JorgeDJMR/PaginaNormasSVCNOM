<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma202011 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma202011 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-020-STPS-2011.HTML</title>
</head>
<body>
    <div class="barrasuperior">
        <h1>Norma NOM-020-STPS-2011</h1>
        <h3>INSTRUCCIONES:</h3><BR>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    
    <form action="guardar_n202011.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1 Clasificar a los equipos instalados en el centro de trabajo en las categorías I, II ó III, de conformidad con lo previsto en el Capítulo 7 de la presente Norma. <br>
7. Clasificación de los equipos
                </label>
        </div>
        <hr class="styled-separator">

          <div class="conteiner">
              <label for="pregunta1">El patrón cumple cuando presenta evidencia documental de que clasifica como recipientes sujetos a presión dentro de la: 
Aquéllos que contienen agua, aire y/o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, menor o igual a 490.33 kPa y un volume

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
          <label for="pregunta2">El patrón cumple cuando presenta evidencia documental de que clasifica como recipientes sujetos a presión dentro de la: 
Aquéllos que contienen agua, aire y/o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, menor o igual a 490.33 kPa y un volumen mayor a 0.5 m3

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
          <label for="pregunta3">El patrón cumple cuando presenta evidencia documental de que clasifica como recipientes sujetos a presión dentro de la: 
Aquéllos que contienen agua, aire y/o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, mayor a 490.33 kPa pero menor o igual a 784.53 kPa, y un 
volumen menor o igual a 1 m3

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
        <label class="conteiner">Aquéllos que manejan fluidos peligrosos, con presión de calibración en su(s) dispositivo(s) de relevo de presión, menor o igual a 686.47 kPa y un volumen menor o igual a 1 m3
        </label>
      </div>
      <hr class="styled-separator">

      <div class="conteiner">
        <label for="pregunta4">Aquéllos que contienen agua, aire y/o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, mayor a 490.33 kPa pero menor o igual a 784.53 kPa, y 
volumen mayor a 1 m3
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
        <label for="pregunta5">Aquéllos que contienen agua, aire o cualquier fluido no peligroso, con presión de calibración en su(s) dispositivo(s) de relevo de presión, mayor a 784.53 kPa y cualquier volumen
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
        <label for="pregunta6">Aquéllos que manejan fluidos peligrosos, con presión de calibración en su(s) dispositivo(s) de relevo de presión, menor o igual a 686.47 kPa y volumen mayor a 1 m 3
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

       

      <div class="conteiner">
        <label for="pregunta7">Aquéllos que tienen una presión de calibración sobre la primera válvula de seguridad, menor o igual a 490.33 kPa y una capacidad térmica menor o igual a 1 674.72 MJ/hr
            
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
        <label for="pregunta8">El patrón cumple cuando presenta evidencia documental de que clasifica como generadores de vapor o calderas dentro de la: 
Aquéllos que tienen una presión de calibración sobre la primera válvula de seguridad, menor o igual a 490.33 kPa y una capacidad térmica mayor a 1 674.72 MJ/h
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
        <label for="pregunta9">El patrón cumple cuando presenta evidencia documental de que clasifica como generadores de vapor o calderas dentro de la:
Aquéllos que tienen una presión de calibración sobre la primera válvula de seguridad, mayor a 490.33 kPa y cualquier capacidad térmica.
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
        <label for="pregunta10">El patrón cumple cuando presenta evidencia documental de que clasifica como generadores de vapor o calderas dentro de la:
 Aquéllos que tienen una presión de calibración sobre la primera válvula de seguridad, menor o igual a 490.33 kPa y una capacidad térmica mayor a 1 674.72 MJ/hr
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
        <label for="pregunta11">El patrón cumple cuando presenta evidencia documental de que clasifica como generadores de vapor o calderas dentro de la:
Aquéllos que tienen una presión de calibración sobre la primera válvula de seguridad, mayor a 490.33 kPa y cualquier capacidad térmica.
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
        <label class="conteiner">5.2 Contar con un listado actualizado de los equipos que se encuentren instalados en el centro de trabajo, de acuerdo con lo dispuesto en el Capítulo 8 de esta Norma.
8. Listado de los equipos
        </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

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
        <label for="pregunta13">El patrón cumple cuando presenta evidencia documental de que: <br>
Cuenta con un listado actualizado de los equipos que se encuentren instalados en el centro de trabajo;

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
        <label for="pregunta14">El patrón cumple cuando presenta evidencia documental de que: <br>
        El nombre genérico del equipo;  <br>
        El número de serie o único de identificación, la clave del equipo o número de TAG;  <br>
        La clasificación que corresponde a cada equipo, conforme al Capítulo 7 de esta Norma;  <br>
El(los) fluido(s) manejado(s)
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
        <label for="pregunta15">El patrón cumple cuando presenta evidencia
documental de que: <br>
La presión de calibración, en su caso; <br>
La capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes criogénicos; <br>
La capacidad térmica, en el caso de generadores de vapor o calderas; <br>
El área de ubicación del equipo;
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
        <label for="pregunta16">El patrón cumple cuando presenta evidencia
documental de que: <br>
El área de ubicación del equipo; <br>
El número de dictamen o dictamencon reporte de servicios, emitido
por una unidad de verificación, cuando se trate de los equipos clasificados en la Categoría III, y
El número de control asignado por la Secretaría, a que se refiere el numeral 16.5 de la presente Norma, tratándose de los equipos clasificados en la Categoría III
            
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
            <label class="conteiner">5.3 Disponer de un expediente por cada equipo que esté instalado en el centro de trabajo, conforme a lo establecido en el Capítulo 9 de la presente Norma.
9. Expediente de los equipos
            </label>
      </div>
      <hr class="styled-separator">
        <!-- Disposicion -->

        <!-- Pregunta 17 -->
        <div class="conteiner">
          <label for="pregunta17">El patrón cumple cuando presenta evidencia
documental de que: <br>
Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría I, que contenga lo siguiente: <br>
El nombre genérico del equipo; <br>
El número de serie o único de identificación, la clave del equipo o número de TAG; 

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
          <label for="pregunta18">El patrón cumple cuando presenta evidencia
documental de que: <br>
Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría I, que contenga lo siguiente: <br>
La ficha técnica del equipo, que al menos considere: <br>
El(los) fluido(s) manejado(s) y su tipo de riesgo, en su caso; <br>
La(s) presión(es) de diseño; <br>
La(s) presión(es) de operación;<br>
La(s) presión(es) de calibración, en su caso;<br>
La(s) presión(es) de trabajo máxima(s) permitida(s);<br>
La capacidad volumétrica;<br>
La(s) temperatura(s) de diseño, y<br>
La(s) temperatura(s) de operación;<br>
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
          <label for="pregunta19">El patrón cumple cuando presenta evidencia 
documental de que: <br>
Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría I, que contenga lo siguiente: <br>
La descripción breve de su operación; <br>
El registro de los resultados de las revisiones y mantenimientos efectuados, y <br>
La ubicación del equipo
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
          <label for="pregunta20">Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría III, que  contenga lo siguiente: <br>
El nombre genérico del equipo;   <br>
El número de serie o único de identificación, la clave del equipo o número de TAG; <br>
El número de control asignado porla Secretaría;El año de fabricación; <br>
El código o norma de construcciónaplicable; <br>
El certificado de fabricación,cuando exista; <br>
La fotografía o calca de la placa de datos del equipo, adherida o estampada por el fabricante; <br>
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
          <label for="pregunta21">Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría III, que contenga lo siguiente: <br>
El (los) fluido(s) manejado(s) y su tipo de riesgo, en su caso; <br>
La(s) presión(es) de diseño; <br>
La(s) presión(es) de operación; <br>
La(s) presión(es) de calibración, en su caso; <br>
La(s) presión(es) de trabajo máxima(s) permitida(s); <br>
La(s) presión(es) de prueba hidrostática; <br>
La capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes criogénicos;
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
          <label for="pregunta22">Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría III, que contenga lo siguiente: <br>
La capacidad térmica, en el caso de generadores de vapor calderas; <br>
La(s) temperatura(s) de diseño; <br>
La(s) temperatura(s) de operación; <br>
El tipo de dispositivos de relevo de presión, y <br>
El número de dispositivos de relevo de presión;

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
          <label for="pregunta23">La descripción breve de su operación; <br>
La descripción de los riesgos relacionados con su operación;<br>
Los elementos de seguridad para elcontrol de las principales variables de su operación;<br>
El resumen cronológico de lasrevisiones y mantenimientosefectuados, de acuerdo con el programa que para tal efecto se elabore, debidamente registrados y documentados, avalados por escrito 
y firmados por el responsable de mantenimiento u operación de los equipos en el centro de trabajo;
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
          <label for="pregunta24">Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría III, que contenga lo siguiente: <br>
El resumen cronológico de las pruebas de presión o exámenes no destructivos practicados a los equipos;<br>
El resumen cronológico de las modificaciones y alteraciones efectuadas debidamente registradas y documentadas, avaladas por escrito y firmadas por el responsable de mantenimiento u operación
de los equipos en el centro de trabajo;<br>
El resumen cronológico de las reparaciones que implicaron soldadura, avalados por escrito y firmados por el responsable de mantenimiento, operación o inspección del centro de trabajo;

            
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
          <label for="pregunta25">Dispone de un expediente por cada uno de los equipos que se encuentren instalados en el centro de trabajo, clasificados en la Categoría III, que contenga lo siguiente: <br>
Los cortes del equipo, transversal y longitudinal;<br>
Las dimensiones del equipo, como diámetro, longitudes y espesores de fabricación;<br>
Los detalles relevantes, como ubicación de boquillas, accesorios y tipos de tapas, entre otros;<br>
La ubicación de los dispositivos de relevo de presión, ya sea en el propio equipo, en tuberías o en otro(s) equipo(s) con el (los) que se encuentre(n) interconectado(s), y el arreglo básico del sistema 
de soporte o cimentación;
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
          <label for="pregunta26">La memoria de cálculo actualizada, respaldada con la firma, el número de cédula profesional y el nombre de un ingeniero con conocimientos en la materia, que contenga lo siguiente: <br>
La presión interna máxima que soporte el equipo, en sus partes críticas, tales como envolventes, tapas, hogar, espejos y tubos, entre otros, según aplique; <br>
Los espesores mínimos requeridos, en sus partes; <br>
El área de desfogue de los dispositivos de seguridad para las condiciones de operación. En caso de no contar con este dispositivo, se justifica la manera en que se protege al equipo por sobrepresión; <br>
La superficie de calefacción, cuando se trate de generadores de vapor o calderas; <br>
La capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes criogénicos, y <br>
La capacidad generativa, cuando se trate de generadores de vapor o calderas;
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
          <label for="pregunta27">El croquis de localización del (los) equipo(s) fijo(s) dentro del centro de trabajo, y tratándose de equipos móviles la bitácora de ubicación

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
          <label for="pregunta28">El dictamen de evaluación de la conformidad o el dictamen de evaluación de la conformidad con reporte de servicios emitido por una unidad de verificación.

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
          <label class="conteiner">5.4 Elaborar y aplicar programas específicos de revisión y mantenimiento para los equipos clasificados en las categorías II y III, con base en lo señalado en el Capítulo 10 de esta Norma.
10. Programas específicos de revisión y mantenimiento a los equipos

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta29">El patrón cumple cuando presenta evidencia documental de que: Elabora y aplica programas específicos de revisión y mantenimiento para los equipos clasificados en las categorías II y III

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
          <label for="pregunta30">El patrón cumple cuando presenta evidencia documental de que: <br>
Las fechas de ejecución; <br>
El período de ejecución; <br>
El tipo y la descripción general de las actividades por realizar, y <br>
El nombre del (de los) responsable(s) de la programación y ejecución de las actividades.
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
          <label class="conteiner">5.5 Elaborar y aplicar programas de revisión y calibración a los instrumentos de control y dispositivos de relevo de presión de los equipos, según aplique.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->


        <div class="conteiner">
          <label for="pregunta31">El patrón cumple cuando presenta evidencia documental de que elabora y aplica programas de revisión y calibración a los instrumentos de control y dispositivos de relevo de presión de los equipos, 
según aplique.

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
          <label class="conteiner">5.6 Contar y aplicar procedimientos de operación, revisión y mantenimiento de los equipos, en idioma español, de conformidad con lo dispuesto por el Capítulo 11 de la presente Norma. Los procedimientos podrán ser elaborados por equipo o por conjunto de equipos interconectados o de aplicación común.
11. Procedimientos para la operación, revisión y mantenimiento de los equipos

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->


        <div class="conteiner">
          <label for="pregunta32">El patrón cumple cuando presenta evidencia 
documental de que: <br>
Cuenta y aplica procedimientos de operación, revisión y mantenimiento de los equipos, en idioma español; <br>
Para la operación de equipos clasificados en la Categoría I, cuenta con las instrucciones o procedimientos correspondientes;
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
          <label for="pregunta33">El patrón cumple cuando presenta evidencia documental de que: <br>
El arranque y paro seguro de los equipos;<br>
Las medidas de seguridad por adoptar durante su funcionamiento;<br>
La atención de situaciones de emergencia, y el registro de las variables de operación de los equipos;
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
          <label for="pregunta34">Para los equipos clasificados en la Categoría III, cuenta con el manual de operación que considera, al menos, lo siguiente:  <br>
El arranque y paro seguro de los equipos; <br>
El uso de los instrumentos de medición; <br>
La interpretación de los valores de los límites seguros de operación y los transitorios relevantes; <br>
Las medidas de seguridad por adoptar durante su funcionamiento; <br>
El equipo de protección personal específico para las actividades a desarrollar; <br>
La atención de situaciones de emergencia, y el registro de las variables de operación de los equipos;
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
          <label for="pregunta35">Para la revisión de los equipos clasificados en la Categoría I, cuenta con las instrucciones o procedimientos correspondientes;

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
          <label for="pregunta36">Para la revisión de los equipos clasificados en las categorías II y III,
cuenta con el manual de revisión que contiene, al menos, lo siguiente: <br>
La comprobación de la ejecución de las pruebas a los dispositivos de relevo de presión, así como pruebas de presión o exámenes no destructivos y pruebas de funcionamiento a los equipos, cada cinco <br>
años o después de realizada una reparación o alteración, y los criterios para determinar si el equipo puede continuar o no en operación;
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
          <label for="pregunta37">Para el mantenimiento de los equipos clasificados en la Categoría I, cuenta con las instrucciones o procedimientos correspondientes;

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
          <label for="pregunta38">Para el mantenimiento de los equipos clasificados en la Categoría II, cuenta con el manual de mantenimiento que considera, al menos, lo siguiente: <br>
El alcance del mantenimiento; <br>
Las medidas de seguridad por adoptar durante su ejecución; <br>
El equipo de protección personal o colectiva a utilizarse para cada tipo de actividad de trabajo; <br>
Los aparatos, instrumentos y herramientas por utilizar, y los permisos de trabajo requeridos, en su caso
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
          <label for="pregunta39">Para el mantenimiento de los equiposclasificados en la Categoría III, cuenta con el manual de mantenimiento que considera, al menos, lo siguiente: <br>
El alcance del mantenimiento; <br>
La descripción de las principales actividades, por orden de ejecución; <br>
Las medidas de seguridad por adoptar durante su ejecución;<br>
El equipo de protección personal o colectiva a utilizarse para cada tipo de actividad de trabajo;<br>
Los aparatos, instrumentos y herramientas por utilizar;<br>
Los permisos de trabajo requeridos, y las instrucciones de respuesta a emergencias
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
          <label class="conteiner">5.7 Realizar el mantenimiento y reparación de los equipos que no requieran soldadura, con personal capacitado en la materia.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta40">El patrón cumple cuando presenta evidencia documental de que realiza el mantenimiento y reparación de los equipos que no requieren soldadura, con personal capacitado en la materia.

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
          <label class="conteiner">5.8 Realizar las reparaciones de los equipos que requieran soldadura o alteraciones, de acuerdo con los procedimientos desarrollados para tal fin y con personal calificado.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta41">El patrón cumple cuando presenta evidencia documental de que realiza las reparaciones de los equipos que requieren soldadura o alteraciones, de acuerdo con los procedimientos desarrollados para 
tal fin y con personal calificado.

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
          <label class="conteiner">5.9 Cumplir con las condiciones de seguridad de los equipos, según aplique, de acuerdo con lo establecido en el Capítulo 12 de esta Norma.
12. Condiciones de seguridad de los equipos
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta42">El patrón cumple cuando demuestra que: <br>
Para los equipos clasificados en la Categoría I, se cumple con lo siguiente:<br>
Se tiene marcado o pintado el número de serie o único
de identificación, clave o número de TAG;<br>
Se cuenta con el manómetro y, en su caso, con los instrumentos de control; Se mantienen sus instrumentos de control en condiciones seguras de operación;<br>
Se cuenta con el dispositivo de relevo de presión, y<br>
Se dispone de espacio suficiente para su operación, revisión y, en su caso, realización de las maniobras de mantenimiento, de conformidad con el manual de fabricación o recomendaciones del 
instalador;
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
          <label for="pregunta43">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se tiene marcado o pintado el número de serie o único de identificación, clave o número de TAG;<br>
Se cuenta con protecciones físicas, como barreras de contención o cercas perimetrales, entre otras, en el caso de los que se encuentren en áreas o zonas en donde puedan estar expuestos a golpes 
de vehículos;<br>
Se mantiene su sistema de soporte o de cimentación en condiciones tales que no se afecte su operación;
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
          <label for="pregunta44">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se dispone del espacio requerido para la operación de los equipos y, en su caso, la realización de las maniobras de mantenimiento, pruebas de presión y/o exámenes no destructivos. <br>Las dimensiones 
mínimas son equivalentes a las del elemento que más espacio requiera (tubos, tapas, mamparas, quemadores u otros componentes), y a las maniobras consideradas en el mantenimiento, pruebas de
presión y/o exámenes no destructivos;<br>
Se cuenta con elementos de protección física o aislamiento, para evitar riesgos en los trabajadores por contacto con temperaturas extremas;

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
          <label for="pregunta45">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Están señalizados para identificar los fluidos que contienen, deconformidad con lo dispuesto porlas normas oficiales mexicanas NOM-018-STPS-2000 y NOM-026- STPS-2008, o las que las sustituyan;<br>
Están conectados a una tierra física, cuando se trate de equipos que contengan o manejen líquidos y/o gases inflamables, de acuerdo con lo previsto por la NOM-022- STPS-2008, o las que la sustituyan;<br>
Se mantienen sus instrumentos de control en condiciones seguras de operación;
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
          <label for="pregunta46">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con elementos que dirijan el desahogo de sus fluidos a través de dispositivos de relevo de presión, acordes con el estado de los fluidos -gases, vapores o líquidos-, a lugares donde no dañen 
a trabajadores ni al centro de trabajo, de conformidad con lo establecido en el Apéndice B, inciso B6, de la NOM-093-SCFI1994, o las que la sustituyan;<br>
Se cuenta con medios de extinción de incendios, en los equipos que contengan o manejen líquidos o gases inflamables, o sustancias combustibles, conforme a lo establecido por la NOM-002-STPS2010, 
o las que la sustituyan;<br>
Están sujetos a los programas de revisión y mantenimiento;

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
          <label for="pregunta48">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se dispone de las hojas de datos de seguridad de los fluidos contenidos en los equipos, con base en lo previsto en la NOM-018- STPS-2000, o las que la sustituyan, y
Se mantienen las condiciones originales de diseño de los sistemas de calentamiento, tales como quemador y/o combustible, en el caso de intercambiadores de calor, y generadores.

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
          <label for="pregunta50">Para los recipientes sujetos a presión clasificados en las categorías II y III, se cumple con las condiciones específicas siguientes: <br>
Se cuenta con dispositivos de relevo de presión o elementos que controlen que la presión de operación sea menor o igual a la presión máxima de trabajo;<br>
Se tienen calibrados sus dispositivos de seguridad de acuerdo con lo previsto por el numeral 14.1 de la presente Norma;<br>
Se cuenta con instrumentos de medición de presión, y el rango de medición se encuentra entre 1.5 y 4 veces la presión de operación, o en el segundo tercio de la escala de la carátula;
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
          <label for="pregunta51">Para los recipientes sujetos a presión clasificados en las categorías II y III, se cumple con las condiciones específicas siguientes: <br>
Se colocan válvulas de cierre entre el equipo y los dispositivos de relevo de presión, únicamente en los casos previstos en el Apéndice B, incisos B3 y B3.1, de la NOM093-SCFI-1994, 
Se mantiene al menos uno de los dispositivos de relevo de presión en servicio, cuando exista una conexión de tres vías, y Se calibra el primer dispositivo de
relevo de presión (disco de ruptura) a un valor inferior del segundo o último dispositivo de relevo de presión, cuando se encuentren instalados en serie;

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
          <label for="pregunta52">Para los recipientes criogénicos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se instalan en el exterior de los locales sobre una base de concreto y con cercas perimetrales;<br>
Se evita el almacenamiento de materiales y objetos ajenos al área donde se instalen;<br>
Se permite el acceso únicamente al personal autorizado al área donde se ubiquen;<br>
Se dispone de señalización en elárea donde se ubican conforme ala NOM-026-STPS-2008, o las que la sustituyan;
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
          <label for="pregunta53">Para los recipientes criogénicos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se dispone de al menos dos válvulas de relevo de presión, conectadas al recipiente interior en la parte de fase gaseosa. Una de estas válvulas puede estar sustituida por un disco de ruptura;<br>
Se mantiene calibrada la primera válvula de seguridad a presión de diseño y la segunda válvula o el disco de ruptura 10% arriba de la presión de diseño. Ambos dispositivos son capaces de aliviar 
la sobre presión;<br>
Se tienen los gasificadores exteriores al depósito, anclados a la cimentación;
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
          <label for="pregunta54">Para los recipientes criogénicos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con tuberías de conexión lo suficientemente flexibles para evitar los efectos de dilatación y contracción causados por los cambios de temperatura;<br>
Se aplica el procedimiento de emergencia correspondiente al fluido contenido, en su caso;<br>
Se evita el contacto con aceites, grasas u otros materiales inflamables, y Se rotula la información en el
tanque (nombre y teléfono) del propietario del recipiente criogénico para comunicarse en caso de emergencia
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
          <label for="pregunta55">Para los generadores de vapor o calderas clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con los dispositivos de relevo de presión e instrumentos de control que registren los límites de operación segura;<br>
Se tienen calibrados sus dispositivos de seguridad de acuerdo con el programa de calibración, y se sujetan a los de revisión y mantenimiento;
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
          <label for="pregunta57">Para los generadores de vapor o calderas clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con los dispositivos de relevo de presión e instrumentos de control que registren los límites de operación segura;<br>
Se tienen calibrados sus dispositivos de seguridad de acuerdo con el programa de calibración, y se sujetan a los de revisión y mantenimiento;<br>
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
          <label for="pregunta58">Para los generadores de vapor o calderas clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con instrumentos de medición de presión, y el rango de medición se encuentra entre 1.5 y 4 veces la presión de operación, o en el segundo tercio de la escala de la carátula; <br>
Se cuenta con dispositivos de relevo de presión instalados en el cuerpo y no en conexiones remotas; <br>
Se prohíbe la colocación de válvulas de cierre entre el equipo y los dispositivos de relevo de presión; 
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
          <label for="pregunta59">Para los generadores de vapor o calderas clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con los elementos de seguridad para evitar que operen en condiciones críticas por combustión, presión y/o nivel de agua; <br>
Se mantienen los instrumentos de control en condiciones que garanticen una operación segura; <br>
Se revisa y prueba periódicamente su funcionamiento; <br>
Se verifica que el sistema de arranque y control de combustión se encuentre en buen estado para realizar el barrido de gases, previo al arranque, p
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
          <label for="pregunta60">Para los generadores de vapor o calderas clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se verifica que en el sistema de arranque y control de combustión, en caso de falla por combustión, se bloquee automáticamente el suministro de combustible, se accione la alarma de falla por 
combustión, se evite un reencendido automático y se mantenga el monitoreo continuo de flama;
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
          <label for="pregunta61">Se constata, según aplique, el adecuado funcionamiento de los elementos de seguridad para el nivel de agua, a fin de que: o Se cubra como nivel mínimo de agua el especificado por el fabricante;
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
          <label for="pregunta62">Se constata, según aplique, el adecuado funcionamiento de los elementos de seguridad para el nivel de agua, a fin de que:  <br>
Los sistemas de protección mecánica sean los adecuados para los indicadores de nivel, y Estén provistos de purgas con conexión para el desagüe seguro, cuando los sistemas de protección sean 
externos al cuerpo de la caldera o generador de vapor;
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
          <label for="pregunta64">Se verifica en los dispositivos de relevo de presión, según aplique, lo siguiente: <br>
Que estén accesibles y libres de obstáculos que impidan las maniobras del operador;<br>
Que la presión de calibración nunca sea mayor a la presión máxima de trabajo permitida;<br>
Que el área de desfogue calculada para la descarga sea igual o menor a la suma de las áreas de desfogue de los dispositivos de relevo de presión instalados;
            
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
          <label for="pregunta65">Se verifica en los dispositivos de relevo de presión, según aplique, lo siguiente: <br>
Que sus conexiones sean independientes a cualquier otra conexión de vapor;<br>
Que estén colocados lo más cerca posible del generador de vapor o caldera y que, en ningún caso, se cuente con válvulas de cierre entre ambos;<br>
Que el tubo de descarga de los dispositivos de relevo de presión no descargue a zonas de tránsito, de maniobras o de andamios de trabajo;<br>
Que el tubo de descarga tenga un área igual o mayor a la del dispositivo de relevo de presión;
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
          <label for="pregunta66">Se verifica en los dispositivos de relevo de presión, según aplique, lo siguiente: <br>
Que estén equipados con dispositivos de desagüe que eviten la acumulación de sedimentos en la parte superior del dispositivo de relevo de presión; <br>
Que cuando se coloque un codo para la descarga del dispositivo de relevo de presión se encuentre a una distancia no mayor de 60 cm de éste, y el tubo esté fijo de forma independiente al dispositivo, 
y Que cuando se usen silenciadores en la válvula, su área de salida sea amplia para evitar que la contrapresión entorpezca la operación o disminuya la capacidad de descarga;
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
          <label for="pregunta67">Se verifica de los sistemas de purgas, lo siguiente: <br>
Que permanezcan limpios los accesorios y elementos de control/seguridad, con la finalidad de evitar acumulaciones de residuos o formación de sedimentos que obstaculicen su operación, 
y Que la descarga de las purgas se dirija a fosas de purgas y/o sistemas que permitan la reducción y amortiguación de la presión de descarga y el enfriamiento de los fluidos
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
          <label for="pregunta68">Se previene la formación de incrustaciones, oxidación o corrosión progresiva por la formación de zonas térmicas críticas que debiliten materiales o uniones en el cuerpo del equipo.

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
          <label class="conteiner">5.10 Determinar y practicar pruebas de presión o exámenes no destructivos a los equipos clasificados en las categorías II y III, conforme a lo señalado en el Capítulo 13 de la presente Norma.
13. Pruebas de presión y exámenes no destructivos
          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta69">El patrón cumple cuando presenta evidencia documental de que: <br>
Para los equipos clasificados en las categorías II y III, determina y practica pruebas de presión o exámenes no destructivos;
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
          <label for="pregunta70">El patrón cumple cuando presenta evidencia documental de que: <br>
Para los equipos nuevos clasificados en las categorías II y III, que cuenten con certificado de fabricación o el estampado de cumplimiento con el código o norma de construcción, la primera prueba 
de presión o los primeros exámenes no destructivos se practican antes de que se cumplan diez años de la emisión de dicho certificado o de haber obtenido el estampado, y las siguientes pruebas o 
exámenes al menos cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada quinquenio;
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
          <label for="pregunta71">El patrón cumple cuando presenta evidencia documental de que: <br>
Para los equipos nuevos clasificados en las categorías II y III, que no cuenten con el certificado de fabricación o el estampado de cumplimiento con el código o norma de construcción, o los equipos 
usados de las mismas categorías, con o sin el certificado o el estampado antes citados, la primera prueba de presión o los primeros  exámenes no destructivos se practican antes de su puesta en 
funcionamiento y, posteriormente, al menos cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada quinquenio;
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
          <label for="pregunta72">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Están señalizados para identificar los fluidos que contienen, deconformidad con lo dispuesto porlas normas oficiales mexicanas NOM-018-STPS-2000 y NOM-026- STPS-2008, o las que las sustituyan; <br>
Están conectados a una tierra física, cuando se trate de equipos que contengan o manejen líquidos y/o gases inflamables, de acuerdo con lo previsto por la NOM-022- STPS-2008, o las que la sustituyan; <br>
Se mantienen sus instrumentos de control en condiciones seguras de operación;
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
          <label for="pregunta73">Para los equipos clasificados en las categorías II y III, se cumple con lo siguiente: <br>
Se cuenta con elementos que dirijan el desahogo de sus fluidos a través de dispositivos de relevo de presión, acordes con el estado de los fluidos -gases, vapores o líquidos-, a lugares donde no dañen 
a trabajadores ni al centro de trabajo, de conformidad con lo establecido en el Apéndice B, inciso B6, de la NOM-093-SCFI1994, o las que la sustituyan; <br>
Se cuenta con medios de extinción de incendios, en los equipos que contengan o manejen líquidos o gases inflamables, o sustancias combustibles, conforme a lo establecido por la 
NOM-002-STPS2010, o las que la sustituyan; <br>
Están sujetos a los programas de revisión y mantenimiento;
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
          <label for="pregunta74">El patrón cumple cuando presenta evidencia documental de que: <br>
Para los equipos nuevos clasificados en las categorías II y III, que no cuenten con el certificado de fabricación o el estampado de cumplimiento con el código o norma de construcción, o los equipos 
usados de las mismas categorías, con o sin el certificado o el estampado antes citados, la primera prueba de presión o los primeros  exámenes no destructivos se practican antes de su puesta en 
funcionamiento y, posteriormente, al menos cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada quinquenio;
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
          <label for="pregunta75">Las pruebas hidrostáticas, neumáticas, hidrostáticas-neumáticas, exámenes no destructivos y métodos alternativos aprobados por la Secretaría, que se efectúan a los equipos clasificados en las 
categorías II y III, cumplen con los requerimientos siguientes: <br>
Se realizan con la periodicidad que determine el personal calificado en la materia designado por el patrón, la cual no es en ningún caso mayor de cinco años;
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
          <label for="pregunta76">Las pruebas hidrostáticas, neumáticas, hidrostáticas-neumáticas, exámenes no destructivos y métodos alternativos aprobados por la Secretaría, que se efectúan a los equipos clasificados en las 
categorías II y III, cumplen con los requerimientos siguientes: <br>
Los resultados de las revisiones a los equipos; Las características de los fluidos que manejan, y La factibilidad de su aplicación;
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
          <label for="pregunta77">Las pruebas hidrostáticas, neumáticas, hidrostáticas-neumáticas, exámenes no destructivos y métodos alternativos aprobados por la Secretaría, que se efectúan a los equipos clasificados en las 
categorías II y III, cumplen con los requerimientos siguientes: <br>
Son efectuados con apego a los requisitos y/o lineamientos establecidos en códigos o normas aceptados nacional o internacionalmente;
Son ejecutados con las medidas de seguridad requeridas antes, durante y después de su realización, según aplique;
Son desarrollados paso a paso con base en los procedimientos diseñados para su ejecución;
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
          <label for="pregunta78">Las pruebas hidrostáticas, neumáticas, hidrostáticas-neumáticas, exámenes no destructivos y métodos alternativos aprobados por la Secretaría, que se efectúan a los equipos clasificados en las 
categorías II y III, cumplen con los requerimientos siguientes: <br>
Son ejecutados por personal certificado, cuando se trata de ensayos no destructivos, y por un ingeniero con conocimientos en la materia, cuando se trata de pruebas de presión;
Son aplicados los criterios de aceptación/rechazo, a los resultados de las pruebas de presión y/o ensayos no destructivos;
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
          <label for="pregunta79">Las pruebas hidrostáticas, neumáticas, hidrostáticas-neumáticas, exámenes no destructivos y métodos alternativos aprobados por la Secretaría, que se efectúan a los equipos clasificados en las 
categorías II y III, cumplen con los requerimientos siguientes: <br>
Sirven de base para determinar, después de su ejecución, si los equipos evaluados pueden o no continuar en funcionamiento;<br>
Están avalados sus resultados por personal certificado, mediante su nombre y firma, cuando se trata de exámenes no destructivos, y por un ingeniero con conocimientos en la materia, tratándose 
de pruebas de presión;<br>
Se realizan en presencia de una unidad de verificación tipo “A”, “B” o “C”, tratándose de los equipos clasificados en la Categoría III, y Se registran sus resultados;
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
          <label for="pregunta80">Las pruebas de presión neumáticas, sólo se aplican a presiones menores de 1 961.33 kPa, cuando los recipientes sujetos a presión cumplen con las características siguientes:<br>
Tienen una presión de calibración de su dispositivo de seguridad igual o menor a 980.67 kPa;<br>
Cuentan con una capacidad volumétrica menor a 10 m3 ;<br>
Tienen una presión interna máxima mayor de 1 961.33 kPa, tomando como referencia los espesores actuales del equipo, y Contienen como fluido únicamente aire;
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
          <label for="pregunta81">Las pruebas de presión hidrostáticaneumática, sólo se aplican a los recipientes criogénicos, bajo las condiciones siguientes: <br>
Cuando están desconectados de la línea que suministra el fluido al proceso;<br>
Cuando contienen el mismo fluido criogénico con el que operan;<br>
Cuando están al menos al 60% de su capacidad en estado líquido, y Cuando cuentan con diagramas de control de flujo del recipiente;
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
          <label for="pregunta82">Para la aplicación de exámenes no destructivos, se seleccionan y realizan en el mismo período, como resultado de una revisión visual, al menos una combinación de un examen volumétrico 
y otro superficial o de pérdida de flujo, de entre los siguientes: Volumétricos: Radiografía industrial, o Ultrasonido industrial, o Neutrografía, o Emisión acústica, y Superficiales: Líquidos 
penetrantes, o Partículas magnéticas, o Electromagnetismo (corrientes de Eddy), o De pérdida de flujo: Detector de halógenos, o Espectrómetro de masas, o Cámara de burbujas;
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
          <label for="pregunta83">En caso de que se apliquen métodos alternativos que sustituyan a las pruebas de presión o a los exámenes no destructivos previstos por la presente Norma, se cuenta con la autorización que, en 
su caso, otorga la Dirección General de Seguridad y Salud en el Trabajo, de conformidad con lo dispuesto por la Ley Federal sobre Metrología y Normalización y su Reglamento, y el Reglamento 
Federal de Seguridad, Higiene y Medio Ambiente de Trabajo

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
          <label for="pregunta84">La autorización de métodos alternativos contiene, al menos, lo siguiente: <br>
La justificación técnica para solicitar la práctica de métodos alternativos al equipo;
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
          <label for="pregunta85">La autorización de métodos alternativos contiene, al menos, lo siguiente: <br>
Los procedimientos, paso a paso, para llevar a cabo las pruebas; <br>
La descripción de los utensilios, materiales, accesorios y características de los aparatos e instrumentos -con certificados vigentes de calibración-, que se usarán en el desarrollo del procedimiento; <br>
El dibujo del equipo, con indicación gráfica de las zonas puntos a inspeccionar cuando sea necesario, y El personal designado por el patrón para desarrollar las pruebas e interpretar y evaluar 
los resultados, con la justificación de la experiencia o capacitación recibida para dichos trabajos;
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
          <label for="pregunta86">Los criterios para aceptar o rechazar los resultados obtenidos y que servirán de base para determinar si el método alternativo practicado resulta satisfactorio, y Las medidas de seguridad 
necesarias para desarrollar los procedimientos, en su caso.

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
          <label for="pregunta87">El patrón cumple cuando demuestra que: Los dispositivos de relevo de presión de los equipos se encuentran en condiciones de funcionamiento porque:
Se les realizó la prueba de funcionamiento con instrumentos que cuentan con trazabilidad, de acuerdo con la Ley Federal sobre Metrología y Normalización, según aplique, en: El propio equipo, 
o Un banco de pruebas, cuando por las características de operación de los equipos o los fluidos contenidos en ellos puedan generar un riesgo
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
          <label for="pregunta88">Cuentan con un registro de calidad del fabricante o certificado de calibración emitido en términos de la Ley Federal sobre Metrología y Normalización;

            
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
          <label for="pregunta89">El (los) dispositivo(s) de relevo de presión protege(n) al (a los) equipo(s) que se encuentra(n) interconectado(s) con otros en un proceso, cuando el valor de la presión de calibración de dicho(s) 
dispositivo(s) está por debajo del valor de la presión de operación de alguno de ellos, y Cuentan con una justificación técnicaen su memoria de cálculo, los equipos clasificados en las categorías 
II y III que carezcan de dispositivos de relevo de presión.

            
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
          <label for="pregunta90">El patrón cumple cuando presenta evidencia documental de que: Cuenta con un plan de atención a emergencias para los equipos clasificados en las categorías II y III

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
          <label for="pregunta91">El patrón cumple cuando presenta evidencia documental de que: El plan de atención a emergencias para los equipos clasificados en las categorías II y III contempla, al menos, lo siguiente:  <br>
El mecanismo de solicitud de auxilio a cuerpos especializados para la atención a la emergencia, considerando el directorio de dichos cuerpos especializados de la localidad; <br>
Las instrucciones para el retorno a actividades normales de operación, después de la emergencia, y Los medios de difusión del plan de atención a emergencias para los equipos.
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
          <label class="conteiner">5.13 Dar aviso a la Secretaría de que los equipos que funcionen en su centro de trabajo, clasificados en la Categoría III, cumplen con esta Norma, de acuerdo con las modalidades previstas en el Capítulo 16 de la misma.
16.1 El aviso de que los equipos clasificados en la Categoría III, cumplen con la presente Norma, deberá ser realizado por el patrón a la Secretaría, antes de la fecha de inicio de su puesta en funcionamiento. Tratándose de equipos nuevos, el patrón deberá efectuar el aviso a los diez años de haber realizado el primero, y posteriormente cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada período. En el caso de los equipos usados, el patrón deberá efectuar el aviso a los cinco años de haber realizado el primero, y posteriormente cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada período.
16.2 Cuando se realice una alteración o se reubiquen los equipos clasificados en la Categoría III, el patrón deberá dar aviso a la Secretaría que los mismos mantienen el cumplimiento con lo dispuesto en esta Norma, antes de ponerlos nuevamente en funcionamiento con las nuevas condiciones de operación o las modificaciones realizadas.
16.3 Los avisos a que se refieren los numerales 16.1 y 16.2, deberán contener lo siguiente: <br>
a) Datos del centro de trabajo:<br>
1) El nombre, denominación o razón social;<br>
2) El domicilio completo, y<br>
3) El nombre y firma del representante legal;<br>
b) Datos del equipo:<br>
1) El nombre genérico del equipo;<br>
2) El número de serie o único de identificación, la clave del equipo y/o número de TAG;<br>
3) El número de control asignado por la Secretaría, en su caso;<br>
4) El (los) fluido(s) manejado(s);<br>
5) La(s) presión(es) de operación;<br>
6) La(s) presión(es) de calibración, en su caso;<br>
7) La capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes criogénicos;<br>
8) La capacidad térmica, en el caso de generadores de vapor o calderas;<br>
9) La(s) temperatura(s) de operación;<br>
10) El tipo de dispositivos de relevo de presión;<br>
11) El número de dispositivos de relevo de presión, en su caso, y<br>
12) El área de ubicación del equipo;<br>
c) Datos del certificado de fabricación, en su caso:<br>
1) El nombre del fabricante;<br>
2) El número de certificado de fabricación;<br>
3) La fecha de emisión del certificado, y<br>
4) El código o norma de construcción aplicable;<br>
d) Datos del dictamen:<br>
1) El nombre, denominación o razón social de la unidad de verificación;<br>
2) El número de acreditación otorgado por la entidad de acreditación a la unidad de verificación;<br>
3) La fecha de otorgamiento de la acreditación;<br>
4) El número de registro otorgado al dictamen por la Secretaría, y<br>
5) El nombre del responsable de emitir el dictamen, y<br>
e) Reporte de servicios con el resumen de los temas o capítulos atendidos de la presente Norma, en su caso.<br>
16.4 Los avisos a que se refiere el numeral anterior, se deberán acompañar del dictamen de evaluación de la conformidad expedido por una unidad de verificación tipo “A”, “B” o “C”, o del dictamen de evaluación de la conformidad con reporte de servicios emitido por una unidad de verificación tipo “C”. El patrón dispondrá de sesenta días, contados a partir de la fecha de emisión del dictamen de verificación o del dictamen con reporte de servicios, correspondientes a los equipos clasificados en la Categoría III, para dar aviso a la Secretaría que cumplen con lo establecido en la presente Norma.

          </label>
        </div>
        <hr class="styled-separator">
          <!-- Disposicion -->


        <div class="conteiner">
          <label for="pregunta92">El patrón cumple cuando presenta evidencia documental de que: <br>
Da aviso a la Secretaría de que los equipos clasificados en la Categoría III, cumplen con la presente Norma, antes de la fecha de inicio de su puesta en funcionamiento; <br>
Tratándose de equipos nuevos, efectúael aviso a los diez años de haber realizado el primero, y posteriormente cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada 
período; <br>
En el caso de los equipos usados, efectúa el aviso a los cinco años de haber realizado el primero, y posteriormente cada cinco años, dentro de los sesenta días naturales previos a la conclusión de cada 
período;
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
          <label for="pregunta94">El patrón cumple cuando presenta evidencia documental de que: <br>
Cuando realiza una alteración o se reubican los equipos clasificados en la Categoría III, da aviso a la Secretaría que los mismos mantienen el cumplimiento con lo dispuesto en esta Norma, antes de 
ponerlos nuevamente en funcionamiento con las nuevas condiciones de operación o las modificaciones realizadas; <br>
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
          <label for="pregunta95">Los avisos a que se refieren los numerales 16.1 y 16.2 de la presente Norma, contienen lo siguiente: Datos del centro de trabajo:El nombre, denominación o razón social;  <br>
El domicilio completo, y El nombre y firma del representante legal; <br>Datos del equipo: El nombre genérico del equipo; <br>El número de serie o único de identificación, la 
clave del equipo y/o número de TAG;<br> El número de control asignado por la Secretaría, en su caso;<br> El (los) fluido(s) manejado(s); <br>La(s) presión(es) de operación;<br> La(s) 
presión(es) de calibración, en su caso; <br>La capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes criogénicos;<br> La capacidad térmica, en el caso 
de generadores de vapor o calderas; <br>La(s) temperatura(s) de operación;<br> El tipo de dispositivos de relevo de presión;<br> El número de dispositivos de relevo de presión, en 
su caso, y El área de ubicación del equipo;

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
          <label for="pregunta96">Los avisos a que se refieren los numerales 16.1 y 16.2 de la presente Norma, contienen lo siguiente: <br>
Datos del certificado de fabricación, en su caso: El nombre del fabricante; El número de certificado de fabricación; La fecha de emisión del certificado, y El código o norma de construcción aplicable; <br>
Datos del dictamen: El nombre, denominación o razón social de la unidad de verificación; El número de acreditación otorgado por la entidad de acreditación a la unidad de verificación; La fecha de 
otorgamiento de la acreditación; El número de registro otorgado al dictamen por la Secretaría, y El nombre del responsable de emitir el dictamen
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
          <label for="pregunta97">Los avisos a que se refiere el numeral 16.3, se acompañan del dictamen de evaluación de la conformidad expedido por una unidad de verificación tipo “A”, “B” o “C”, o del dictamen de evaluación 
de la conformidad con reporte de servicios emitido por una unidad de verificación tipo “C”, y da aviso a la Secretaría, dentro de los sesenta días siguientes a la fecha de emisión del dictamen de
verificación o del dictamen con reporte de servicios, que los equipos clasificados en la Categoría III, cumplen con lo establecido en la presente Norma.

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

       <!-- Disposicion -->
       <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.14 Informar a los trabajadores y a la comisión de seguridad e higiene sobre los peligros y riesgos inherentes a los equipos y a los fluidos que contienen.

            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta98">El patrón cumple cuando presenta evidencia documental de que informa a los trabajadores y a la comisión de seguridad e higiene sobre los peligros y riesgos inherentes a los equipos y a los fluidos 
que contienen.

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
            <label class="conteiner">5.15 Capacitar al personal que realiza actividades de operación, mantenimiento, reparación y pruebas de presión o exámenes no destructivos a equipos clasificados en las categorías II y III, en las materias que les sean aplicables, conforme a lo establecido en el Capítulo 17 de la presente Norma.
17. Capacitación
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta99">El patrón cumple cuando presenta evidencia documental de que capacita al personal que realiza actividades de operación, mantenimiento, reparación y pruebas de presión o exámenes no destructivos 
a equipos clasificados en las categorías II y III, en las materias que les son aplicables
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
          <label for="pregunta100">El patrón cumple cuando al entrevistar a los trabajadores que realizan actividades deoperación, mantenimiento, reparación y pruebas de presión o exámenes no destructivos a equipos clasificados en 
las categorías II y III, seleccionados de acuerdo con el criterio muestral de la Tabla 4, del numeral 20.3, se constata que reciben entrenamiento teórico-práctico, según aplique, para:<br>
La definición e interpretación de los conceptos siguientes: <br>
Presión y temperatura de diseño y de operación; Presión de trabajo máxima permitida; Presión de calibración; Capacidad volumétrica, en el caso de recipientes sujetos a presión y recipientes 
criogénicos;  Capacidad térmica, en el caso de generadores de vapor o calderas; Dibujos o planos de los equipos, cortes principales del equipo, detalles relevantes, acotaciones básicas y arreglo 
básico del sistema de soporte; Sistema de señalización para los equipos y tuberías; Instrumentos de medición; Dispositivos de relevo de presión; Valores de los límites seguros de operación, 
y Transitorios relevantes;
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
          <label for="pregunta101">El patrón cumple cuando al entrevistar a los trabajadores que realizan actividades de operación, mantenimiento, reparación y pruebas de presión o exámenes no destructivos a equipos clasificados 
en las categorías II y III, seleccionados de acuerdo con el criterio muestral de la Tabla 4, del numeral 20.3, se constata que reciben entrenamiento teórico-práctico, según aplique, para: <br>
El funcionamiento del equipo y de cualquier dispositivo de relevo de presión o elemento de seguridad, dentro del valor establecido en los límites de operación, así como de aquellas variables que 
los puedan afectar;
            
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
          <label for="pregunta103">El patrón cumple cuando al entrevistar a los trabajadores que realizan actividades de operación, mantenimiento, reparación y pruebas de presión o exámenes no destructivos a equipos clasificados 
en las categorías II y III, seleccionados de acuerdo con el criterio muestral de la Tabla 4, del numeral 20.3, se constata que reciben entrenamiento teórico-práctico, según aplique, para: <br>
La aplicación de los procedimientos de operación, revisión, mantenimiento, reparación, alteración y pruebas de presión o exámenes no destructivos de los equipos, según aplique; <br>La aplicación de 
los procedimientos de revisión de los dispositivos de relevo de presión, elementos de seguridad e instrumentos de control, según aplique, incluyendo las operaciones de paro de emergencia, y El 
control de los cambios de las condiciones de operación del equipo y/o de los fluidos que manejan.
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
            <label class="conteiner">5.16 Contar con los registros de operación de los equipos instalados en el centro de trabajo, clasificados en las categorías II y III, de acuerdo con lo que determina el Capítulo 18 de esta Norma.
18.1 Los registros sobre la operación de los equipos clasificados en las categorías II y III deberán contener, según aplique, la información siguiente:<br>
a) El nombre genérico del equipo; <br>
b) El número de control asignado por la Secretaría, en su caso;<br>
c) Las presiones de operación;<br>
d) Las temperaturas de operación;<br>
e) Las observaciones a que haya lugar, en su caso;<br>
f) La fecha y hora de los registros sobre la operación, y<br>
g) El nombre y firma del responsable.
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta104">El patrón cumple cuando cuenta con los registros de: <br>
La operación de los equipos instalados en el centro de trabajo clasificados en las categorías II y III, y La operación de los equipos clasificados en las categorías II y III, mismos que contienen, según 
aplique, la información siguiente:  <br>El nombre genérico del equipo;  <br>El número de control asignado por la Secretaría, en su caso; Las presiones de operación; <br> Las temperaturas de operación; <br> Las 
observaciones a que hayalugar, en su caso; <br> La fecha y hora de los registros sobre la operación, y El nombre y firma del responsable 
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
            <label class="conteiner">5.17 Contar con los registros de resultados de la revisión, mantenimiento y pruebas de presión o exámenes no destructivos realizados a los equipos clasificados en las categorías II y III, con base en lo dispuesto en el Capítulo 18 de la presente Norma.
18.2 Los registros sobre los resultados de la revisión a los equipos deberán comprender, según aplique, la información siguiente: <br>
a) El nombre genérico del equipo;<br>
b) El número de control asignado por la Secretaría, en su caso;<br>
c) Los elementos revisados;<br>
d) El resultado de la revisión;<br>
e) La fecha y hora de los registros sobre los resultados de la revisión, y<br>
f) El nombre y firma del responsable de la revisión.<br>
18.3 Los registros sobre los resultados del mantenimiento a los equipos deberán comprender, según aplique, la información siguiente:<br>
a) El nombre genérico del equipo;<br>
b) El número de control asignado por la Secretaría, en su caso;<br>
c) Los elementos sometidos a mantenimiento y las acciones realizadas;<br>
d) La fecha y hora de los registros sobre los resultados del mantenimiento, y<br>
e) El nombre y firma del responsable del mantenimiento.<br>
18.4 Los registros sobre los resultados de las pruebas de presión y/o exámenes no destructivos a los equipos deberán comprender, según aplique, la información siguiente:<br>
a) El nombre genérico del equipo;<br>
b) El número de control asignado por la Secretaría, en su caso;<br>
c) El tipo de prueba de presión o de exámenes no destructivos realizados;<br>
d) Los equipos utilizados y sus características;<br>
e) Los resultados de la prueba de presión o de los exámenes no destructivos realizados;<br>
f) La fecha y hora de los registros sobre los resultados de las pruebas de presión o de los exámenes no destructivos realizados, y<br>
g) El nombre y firma del responsable de avalar los resultados de las pruebas de presión o exámenes no destructivos.
            </label>
          </div>
          <hr class="styled-separator">
            <!-- Disposicion -->

        <div class="conteiner">
          <label for="pregunta105">El patrón cumple cuando cuenta con los registros de: Los resultados de la revisión, mantenimiento y pruebas de presión o exámenes no destructivos realizados a los equipos clasificados en las 
categorías II y III;
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
          <label for="pregunta106">Los resultados de la revisión a los equipos, mismos que comprenden, según aplique, la información siguiente: <br>
El nombre genérico del equipo; El número de control asignado por la Secretaría, en su caso; Los elementos revisados; El resultado de la revisión; La fecha y hora de los registros sobre los resultados 
de la revisión, y El nombre y firma del responsablede la revisión;
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
          <label for="pregunta107">Los resultados del mantenimiento a los equipos, mismos que comprenden, según aplique, la información siguiente:  <br>
El nombre genérico del equipo; El número de control asignado por la Secretaría, en su caso; Los elementos sometidos a mantenimiento, y las acciones realizadas; La fecha y hora de los registros sobre 
los resultados del mantenimiento, y El nombre y firma del responsable del mantenimiento
            
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
          <label for="pregunta108">Los resultados de las pruebas de presión y/o exámenes no destructivos a los equipos, mismos que comprenden, según aplique, la información siguiente: <br>
El nombre genérico del equipo; El número de control asignado por la Secretaría, en su caso; El tipo de prueba de presión o de exámenes no destructivos realizados; Los equipos utilizados y sus 
características; Los resultados de la prueba de presión o de los exámenes no destructivos realizados; La fecha y hora de los registros sobre los resultados de las pruebas de presión o de los exámenes 
no destructivos realizados, y El nombre y firma del responsable de avalar los resultados de las pruebas de presión o exámenes no destructivos.
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
      
        <input type="submit" name="guardar_n202011" value="Enviar">
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
            name: "NOM-020-STPS-2011",
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