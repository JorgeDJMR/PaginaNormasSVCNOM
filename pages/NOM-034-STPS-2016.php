<?php include("../db.php"); ?>

<?php 
    $query = "SELECT * FROM norma342016 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
        $query2 = "SELECT " . implode(", ", $respuestasArray) . " FROM norma342016 WHERE usuarioID = '{$_SESSION['usuarioID']}'";

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
    <title>Normas/NOM-034-STPS-2016.HTML</title>
</head>
<body>
    <div>
        <h1>Norma NOM-034-STPS-2016</h1>
        <h3>Selecciona el nivel que mejor describa el grado de cumplimiento para cada pregunta. La escala va desde 0 hasta 4, donde 0 significa que no se cumple en absoluto, 1 indica un cumplimiento bajo, 2 representa un cumplimiento moderado, 3 denota un cumplimiento alto y 4 significa un cumplimiento completo. </h3>
    </div>
    <form action="guardar_n342016.php" method="POST">
        <div>
            <h2>
                Disposición
            </h2>
            <label class="conteiner">5.1. Realizar un análisis para determinar la compatibilidad del puesto de trabajo con la discapacidad que presenta el trabajador, de conformidad con lo que establece el Capítulo 7 de la presente Norma.
              <br>7. Análisis para determinar la compatibilidad de los trabajadores con discapacidad, con el puesto de trabajo             
            </label>
        </div>
        <hr class="styled-separator">

        <div class="conteiner">
            <label for="pregunta1">¿Para realizar el análisis, a fin de determinar la compatibilidad de cada trabajador con su puesto
              de trabajo, el patrón deberá considerar las variables siguientes:
              <br>- Las características de la discapacidad del trabajador;
              <br>- La descripción del puesto de trabajo;
              <br>- La demanda física, mental, intelectual o sensorial del puesto y de la actividad;
              <br>- El lugar de trabajo, que deberá considerar, ensu caso, elementos tales como: Factores ergonómicos; Iluminación; Señalización; Distribución de rutas de circulación con accesos y salidas; Pasillos 
              circundantes al lugar de trabajo, o Accesorios de trabajo que manipula (materiales, equipo, maquinaria, herramientas, entre otros).?</label>
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
        <label for="pregunta2">¿El análisis para determinar la compatibilidad del trabajador con el puesto y lugar de trabajo,
          debe arrojar la información siguiente:
          - La identificación de los peligros y riesgos potenciales a los que está expuesto el trabajador con discapacidad
          - Las medidas a desarrollar para eliminar, reducir o controlar los peligros y riesgos a trabajadores con discapacidad y, en su caso, la adecuación del puesto y lugar de trabajo?</label>
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
        <label for="pregunta3">¿La actualización del análisis, debe hacerse cuando:
          <br>- Exista modificación de las características de la discapacidad del trabajador;
          <br>- Se incorporen nuevas herramientas, maquinarias, equipos, o accesorios;
          <br>- Se modifique el lugar y puesto de trabajo que ocupa el trabajador con discapacidad;
          <br>- Se modifique la actividad que desarrolla y el procedimiento que sigue el trabajador con discapacidad, o
          <br>- Se modifique el entorno de trabajo del trabajador con discapacidad, por ejemplo: iluminación, señalización, distribución de las áreas del centro de trabajo, salidas, pasillos, entre otros?</label>
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
      <label class="conteiner">5.2. Contar en los centros de trabajo con más de 50 trabajadores, con instalaciones que permitan la accesibilidad de trabajadores con discapacidad al centro de trabajo, o realizar, los ajustes, a fin de permitir el libre desplazamiento para librar desniveles; facilitar el acceso, y manipular objetos y controles, entre otras, de acuerdo a las actividades a desarrollar, con base en lo que prevé el Capítulo 8 de esta Norma. En su caso, proporcionar asistencia con elementos mecánicos o auxilio con personas, para la movilidad del trabajador con discapacidad y de su perro guía cuando éste lo auxilie, si las escaleras o rampas presentan dificultades durante su desplazamiento.
        <br>8. Requerimientos físicos de las áreas de los centros de trabajo
      </label>
  </div>
  <div>
    <h2>
        Disposición
    </h2>
  </div>
  <hr class="styled-separator">
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
        <label for="pregunta5">¿La accesibilidad al centro de trabajo para trabajadores con discapacidad cumple, al menos,
          con los requerimientos siguientes:
          <br>- Cuenta, en su caso, con elementos para comunicar la entrada y salida del centro de trabajo con la vía pública, a fin de facilitar la circulación;
          <br>- Tiene señalización visual, auditiva y táctil, según aplique, para el desplazamiento y estancia en el centro de trabajo, y
          <br>- Dispone de espacios que faciliten la circulación de trabajadores de acuerdo a su discapacidad hasta el lugar de trabajo y/o áreas de servicio?</label>
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
        <label for="pregunta6">¿Los medios de circulación, tales como pasillos, escaleras, rampas, entre otros:
          <br>- Tienen un ancho igual o mayor de 120 cm;
          <br>- Son de materiales que permitan el desplazamiento en silla de ruedas, bastones o muletas tanto en seco como en húmedo;
          <br>- Evitan los desniveles o bordes iguales o mayores a 1 cm de altura;
          <br>- Evitan los encharcamientos;
          <br>- Cuentan en el piso, pasillos y rampas con guía táctil para la circulación de trabajadores con discapacidad visual,
          <br>- Permitir la circulación de trabajadores con discapacidad visual, acompañados de perros guía o de alguien que los apoye.?</label>
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
        <label for="pregunta7">¿El espacio libre para maniobrar con sillas de ruedas, es de al menos de 150 cm de diámetro?</label>
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
        <label for="pregunta8">¿Los dispositivos de sujeción y/o apoyo (barandales, pasamanos, agarraderas, entre
          otros), para el trabajador con discapacidad tienen:
          <br>- Una altura de 90 a 105 cm;
          <br>- Un diámetro entre 3.5 a 4.5 cm;
          <br>- Una separación de 3.5 a 4.5 cm del muro o elemento constructivo;
          <br>- Continuidad en toda su longitud y superficies libres de elementos que pueden provocar un accidente o daño al trabajador con discapacidad, y
          <br>- Un anclaje que les permite estar estables y soportar el peso o fuerza ejercida por el trabajador con discapacidad?</label>
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
        <label for="pregunta9">¿La señalización visible está:
          <br>- Colocada a una altura, lugar y posición que no represente un factor de riesgo para los
          trabajadores y que no esté obstruida, y
          <br>- Enfocada a la discapacidad del trabajador?</label>
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
        <label for="pregunta10">¿La señalización táctil:
          <br>- Está ubicada a una altura de entre 90 a 120cm del nivel del piso;
          <br>- Es elaborada en código Braille;
          <br>- Es accesible y está libre de obstáculos;
          <br>- Proporciona información al trabajador con discapacidad visual que le permite: Ubicarse en el centro de trabajo, y/o Ubicar e identificar las rutas de evacuación y salidas de emergencia?</label>
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
        <label for="pregunta11">¿La señalización audible:
          <br>- Está ubicada de tal manera que se escucha en la zona, área o lugar de trabajo;
          <br>- Emite sonidos o instrucciones cortas, y
          <br>- Tiene un sonido por medio de frecuencias diferentes a los sonidos generados en el lugar de trabajo?</label>
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
        <label class="conteiner">5.3. Establecer por escrito las acciones preventivas y correctivas que se deben instrumentar en el centro de trabajo, dentro del programa de seguridad y salud en el trabajo a que se refiere la Norma Oficial Mexicana NOM-030-STPS-2009, para prevenir riesgos a los trabajadores con discapacidad
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta12">¿Presenta evidencia documental de que las acciones preventivas y correctivas que se deben instrumentar en el centro de trabajo, están dentro del programa de seguridad y salud en el trabajo a que 
          se refiere la Norma Oficial Mexicana NOM-030-STPS-2009, para prevenir riesgos a los trabajadores con discapacidad, considerando, además, para cada puesto de trabajo:
          <br>- La discapacidad de cada trabajador;
          <br>- El área del puesto de trabajo;
          <br>- Los riesgos específicos asociados con la discapacidad de los trabajadores;
          <br>- Las medidas de control técnicas o administrativas existentes, así como la evaluación de su efectividad, y
          <br>- En su caso, las medidas de control adicionales que el patrón determine implementar para minimizar los riesgos?</label>
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
      <div>
        <h2>
            Disposición
        </h2>
        <label class="conteiner">5.4. Instalar en las áreas del centro de trabajo que lo requieran, las señalizaciones para el desplazamiento, la estadía y las acciones a seguir en caso de emergencia, según corresponda, de acuerdo con la discapacidad de los trabajadores, conforme a lo señalado en la NOM-026-STPS-2008, o las que la sustituyan
        </label>
    </div>
    <hr class="styled-separator">

      <div class="conteiner">
        <label for="pregunta13">¿Después de un recorrido se constata que instala en las áreas del centro de trabajo que lo requieran, las señalizaciones para el desplazamiento, la estadía y emergencia, según corresponda, de 
          acuerdo con la discapacidad de los trabajadores, de conformidad con lo establecido en la NOM-026-STPS-2008, o las que la sustituyan?</label>
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
        <label class="conteiner">5.5. Contar con un plan de atención a emergencias, de acuerdo con lo previsto por el Capítulo 9 de la presente Norma.
          <br>9. Plan de atención a emergencias
        </label>
    </div>
    <hr class="styled-separator">
    <div>
      <h2>
          Criterio de aceptación
      </h2>
  </div>
      <div class="conteiner">
        <label for="pregunta14">¿La identificación, ubicación y señalización de rutas de evacuación, salidas y escaleras de emergencia, zonas de menor riesgo y puntos de reunión, entre otros?</label>
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
        <label for="pregunta15">¿El procedimiento de alertamiento en caso de emergencia, que se implante en el centro de trabajo, deberá estar acorde con la discapacidad del trabajador?</label>
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
        <label for="pregunta16">¿Considera el uso de señales estroboscópicas, (que parpadean), luminosas y otros dispositivos de alerta visuales o vibratorios para complementar las alarmas sonoras, entre otras?</label>
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
        <label for="pregunta17">¿El procedimiento o instrucciones para actuaren caso de emergencias, de acuerdo con las diferentes discapacidades?</label>
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
      
      <div class="conteiner">
        <label for="pregunta18">¿Los procedimientos o instrucciones para la operación del equipo de evacuación necesario, para movilizar a los trabajadores con discapacidad, en específico de miembros inferiores?</label>
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
        <label for="pregunta19">¿El procedimiento o instrucciones para la evacuación de los trabajadores con discapacidad, considera al trabajador o brigadista designado para avisar y ayudar a los trabajadores con discapacidad 
          durante la evacuación?</label>
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
        <label for="pregunta20">Para la elaboración del procedimiento o instrucciones para la evacuación de los trabajadores con discapacidad, se les debe consultar a ellos sobre el mejor modo de proporcionarles ayuda?</label>
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
        <label for="pregunta21">¿Los medios de difusión, sobre el contenido del plan de atención a emergencias y de la manera en que todos los trabajadores participan en su ejecución?</label>
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
        <label for="pregunta22">¿Los dispositivos o ayudas que se utilizan para la evacuación de los trabajadores con discapacidad?</label>
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
        <label for="pregunta23">¿La pertinencia de contar con uno o más brigadistas o trabajadores para que auxilien al trabajador con discapacidad durante cualquier evento?</label>
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
        <label for="pregunta24">¿El plan de atención a emergencias se pone en práctica para que todos los trabajadores lo entiendan y sepan cómo actuar?</label>
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
        <label class="conteiner">5.6. Informar a los trabajadores con discapacidad sobre los riesgos, las medidas de seguridad y las acciones a seguir en caso de emergencia.
        </label>
      </div>
      <hr class="styled-separator">
      <div>
      <h2>
          Criterio de aceptación
      </h2>
      </div>

      <div class="conteiner">
        <label for="pregunta25">¿Presenta evidencia documental de que informa a los trabajadores con discapacidad sobre los riesgos y las medidas de seguridad y las acciones a seguir en caso de emergencia?</label>
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
        <label for="pregunta26">¿Al entrevistar a los trabajadores con discapacidad se constata que son informados de los riesgos, las medidas de seguridad y las acciones a seguir en caso de emergencia?</label>
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
      <div>
      <h2>
        Disposición
       </h2>
        <label class="conteiner">5.7.  Capacitar a los trabajadores con discapacidad para su desarrollo en el puesto de trabajo y actuación en caso de emergencia, con base en lo referido en el Capítulo 10 de esta Norma
          <br>10. Capacitacion 
        </label>
      </div>
       <hr class="styled-separator">
       <div>
       <h2>
          Criterio de aceptación
       </h2>
      </div>

      <div class="conteiner">
        <label for="pregunta27">¿La capacitación y adiestramiento que se proporciona al trabajador con discapacidad considera, al menos, los temas siguientes:
          <br>- La información de los riesgos específicos a que puede estar expuesto en el lugar de trabajo y en las áreas cercanas al mismo;
          <br>- Las acciones y medidas preventivas para el desempeño de sus actividades en el lugar;
          <br>- Las diferentes señalizaciones utilizadas en el centro de trabajo, que proporcionan información para el traslado, estadía y emergencia, y
          <br>- El contenido del plan de atención a emergencias y la manera en que ellos participan en su ejecución?</label>
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
        <label for="pregunta28">¿Los brigadistas y trabajadores que atenderán la emergencia, además deberán recibir capacitación para auxiliar a los trabajadores con discapacidad?</label>
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
        <label for="pregunta29">¿La capacitación y adiestramiento se proporciona al menos cada doce meses, siempre y cuando permanezcan los mismos brigadistas y trabajadores que atiendan la emergencia y los trabajadores 
          con discapacidad que deban de ser auxiliados?</label>
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
      
        <!-- Repite el bloque anterior para cada pregunta -->
      
        <input type="submit" name="guardar_n342016" value="Enviar">
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
var totalPreguntas = 29;


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
            name: "NOM-034-STPS-2016",
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