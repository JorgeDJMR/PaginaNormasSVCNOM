<?php
include("../db.php");

if(isset($_POST['guardar_n262008'])){

    $comentario1 = isset($_POST['comentario1']) ? $_POST['comentario1'] : '';
    $respuesta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : '';
    $comentario2 = isset($_POST['comentario2']) ? $_POST['comentario2'] : '';
    $respuesta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : '';
    $comentario3 = isset($_POST['comentario3']) ? $_POST['comentario3'] : '';
    $respuesta3 = isset($_POST['pregunta3']) ? $_POST['pregunta3'] : '';
    $comentario4 = isset($_POST['comentario4']) ? $_POST['comentario4'] : '';
    $respuesta4 = isset($_POST['pregunta4']) ? $_POST['pregunta4'] : '';
    $comentario5 = isset($_POST['comentario5']) ? $_POST['comentario5'] : '';
    $respuesta5 = isset($_POST['pregunta5']) ? $_POST['pregunta5'] : '';
    $comentario6 = isset($_POST['comentario6']) ? $_POST['comentario6'] : '';
    $respuesta6 = isset($_POST['pregunta6']) ? $_POST['pregunta6'] : '';
    $comentario7 = isset($_POST['comentario7']) ? $_POST['comentario7'] : '';
    $respuesta7 = isset($_POST['pregunta7']) ? $_POST['pregunta7'] : '';
    $comentario8 = isset($_POST['comentario8']) ? $_POST['comentario8'] : '';
    $respuesta8 = isset($_POST['pregunta8']) ? $_POST['pregunta8'] : '';
    $comentario9 = isset($_POST['comentario9']) ? $_POST['comentario9'] : '';
    $respuesta9 = isset($_POST['pregunta9']) ? $_POST['pregunta9'] : '';
    $comentario10 = isset($_POST['comentario10']) ? $_POST['comentario10'] : '';
    $respuesta10 = isset($_POST['pregunta10']) ? $_POST['pregunta10'] : '';
    $comentario11 = isset($_POST['comentario11']) ? $_POST['comentario11'] : '';
    $respuesta11 = isset($_POST['pregunta11']) ? $_POST['pregunta11'] : '';
    $comentario12 = isset($_POST['comentario12']) ? $_POST['comentario12'] : '';
    $respuesta12 = isset($_POST['pregunta12']) ? $_POST['pregunta12'] : '';
    $comentario13 = isset($_POST['comentario13']) ? $_POST['comentario13'] : '';
    $respuesta13 = isset($_POST['pregunta13']) ? $_POST['pregunta13'] : '';
    $comentario14 = isset($_POST['comentario14']) ? $_POST['comentario14'] : '';
    $respuesta14 = isset($_POST['pregunta14']) ? $_POST['pregunta14'] : '';
    $comentario15 = isset($_POST['comentario15']) ? $_POST['comentario15'] : '';
    $respuesta15 = isset($_POST['pregunta15']) ? $_POST['pregunta15'] : '';
    $comentario16 = isset($_POST['comentario16']) ? $_POST['comentario16'] : '';
    $respuesta16 = isset($_POST['pregunta16']) ? $_POST['pregunta16'] : '';
    $comentario17 = isset($_POST['comentario17']) ? $_POST['comentario17'] : '';
    $respuesta17 = isset($_POST['pregunta17']) ? $_POST['pregunta17'] : '';
    $comentario18 = isset($_POST['comentario18']) ? $_POST['comentario18'] : '';
    $respuesta18 = isset($_POST['pregunta18']) ? $_POST['pregunta18'] : '';
    $comentario19 = isset($_POST['comentario19']) ? $_POST['comentario19'] : '';
    $respuesta19 = isset($_POST['pregunta19']) ? $_POST['pregunta19'] : '';
    $comentario20 = isset($_POST['comentario20']) ? $_POST['comentario20'] : '';
    $respuesta20 = isset($_POST['pregunta20']) ? $_POST['pregunta20'] : '';
    $comentario21 = isset($_POST['comentario21']) ? $_POST['comentario21'] : '';
    $respuesta21 = isset($_POST['pregunta21']) ? $_POST['pregunta21'] : '';
    $comentario22 = isset($_POST['comentario22']) ? $_POST['comentario22'] : '';
    $respuesta22 = isset($_POST['pregunta22']) ? $_POST['pregunta22'] : '';
    $comentario23 = isset($_POST['comentario23']) ? $_POST['comentario23'] : '';
    $respuesta23 = isset($_POST['pregunta23']) ? $_POST['pregunta23'] : '';
    $comentario24 = isset($_POST['comentario24']) ? $_POST['comentario24'] : '';
    $respuesta24 = isset($_POST['pregunta24']) ? $_POST['pregunta24'] : '';
    $comentario25 = isset($_POST['comentario25']) ? $_POST['comentario25'] : '';
    $respuesta25 = isset($_POST['pregunta25']) ? $_POST['pregunta25'] : '';
    $comentario26 = isset($_POST['comentario26']) ? $_POST['comentario26'] : '';
    $respuesta26 = isset($_POST['pregunta26']) ? $_POST['pregunta26'] : '';
    $comentario27 = isset($_POST['comentario27']) ? $_POST['comentario27'] : '';
    $respuesta27 = isset($_POST['pregunta27']) ? $_POST['pregunta27'] : '';
    $comentario28 = isset($_POST['comentario28']) ? $_POST['comentario28'] : '';
    $respuesta28 = isset($_POST['pregunta28']) ? $_POST['pregunta28'] : '';
    $comentario29 = isset($_POST['comentario29']) ? $_POST['comentario29'] : '';
    $respuesta29 = isset($_POST['pregunta29']) ? $_POST['pregunta29'] : '';
    $comentario30 = isset($_POST['comentario30']) ? $_POST['comentario30'] : '';
    $respuesta30 = isset($_POST['pregunta30']) ? $_POST['pregunta30'] : '';
    $comentario31 = isset($_POST['comentario31']) ? $_POST['comentario31'] : '';
    $respuesta31 = isset($_POST['pregunta31']) ? $_POST['pregunta31'] : '';
    $comentario32 = isset($_POST['comentario32']) ? $_POST['comentario32'] : '';
    $respuesta32 = isset($_POST['pregunta32']) ? $_POST['pregunta32'] : '';
    $comentario33 = isset($_POST['comentario33']) ? $_POST['comentario33'] : '';
    $respuesta33 = isset($_POST['pregunta33']) ? $_POST['pregunta33'] : '';
    $comentario34 = isset($_POST['comentario34']) ? $_POST['comentario34'] : '';
    $respuesta34 = isset($_POST['pregunta34']) ? $_POST['pregunta34'] : '';
    $comentario35 = isset($_POST['comentario35']) ? $_POST['comentario35'] : '';
    $respuesta35 = isset($_POST['pregunta35']) ? $_POST['pregunta35'] : '';

    $queryCheck = "SELECT * FROM norma262008 WHERE usuarioID = '{$_SESSION['usuarioID']}'";
    $resultCheck = mysqli_query($conn, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        $queryUpdate = "UPDATE norma262008 SET r1='$respuesta1,$comentario1', r2='$respuesta2,$comentario2', r3='$respuesta3,$comentario3', r4='$respuesta4,$comentario4', r5='$respuesta5,$comentario5', r6='$respuesta6,$comentario6', r7='$respuesta7,$comentario7', r8='$respuesta8,$comentario8', r9='$respuesta9,$comentario9', r10='$respuesta10,$comentario10', r11='$respuesta11,$comentario11', r12='$respuesta12,$comentario12', r13='$respuesta13,$comentario13', r14='$respuesta14,$comentario14', r15='$respuesta15,$comentario15', r16='$respuesta16,$comentario16', r17='$respuesta17,$comentario17', r18='$respuesta18,$comentario18', r19='$respuesta19,$comentario19', r20='$respuesta20,$comentario20', r21='$respuesta21,$comentario21', r22='$respuesta22,$comentario22', r23='$respuesta23,$comentario23', r24='$respuesta24,$comentario24', r25='$respuesta25,$comentario25', r26='$respuesta26,$comentario26', r27='$respuesta27,$comentario27', r28='$respuesta28,$comentario28', r29='$respuesta29,$comentario29', r30='$respuesta30,$comentario30', r31='$respuesta31,$comentario31', r32='$respuesta32,$comentario32', r33='$respuesta33,$comentario33', r34='$respuesta34,$comentario34', r35='$respuesta35,$comentario35' WHERE usuarioID = '{$_SESSION['usuarioID']}'";
        $resultUpdate = mysqli_query($conn, $queryUpdate);

        if (!$resultUpdate) {
            die("Update query failed: " . mysqli_error($conn));
        }
    } else {
        $query = "INSERT INTO norma262008 (registroID, usuarioID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, r13, r14, r15, r16, r17, r18, r19, r20, r21, r22, r23, r24, r25, r26, r27, r28, r29, r30, r31, r32, r33, r34, r35) 
        VALUES (NULL, '{$_SESSION['usuarioID']}', '$respuesta1,$comentario1','$respuesta2,$comentario2','$respuesta3,$comentario3','$respuesta4,$comentario4','$respuesta5,$comentario5','$respuesta6,$comentario6','$respuesta7,$comentario7','$respuesta8,$comentario8','$respuesta9,$comentario9','$respuesta10,$comentario10','$respuesta11,$comentario11','$respuesta12,$comentario12','$respuesta13,$comentario13','$respuesta14,$comentario14','$respuesta15,$comentario15','$respuesta16,$comentario16','$respuesta17,$comentario17','$respuesta18,$comentario18','$respuesta19,$comentario19','$respuesta20,$comentario20','$respuesta21,$comentario21','$respuesta22,$comentario22','$respuesta23,$comentario23','$respuesta24,$comentario24','$respuesta25,$comentario25','$respuesta26,$comentario26','$respuesta27,$comentario27','$respuesta28,$comentario28','$respuesta29,$comentario29','$respuesta30,$comentario30','$respuesta31,$comentario31','$respuesta32,$comentario32','$respuesta33,$comentario33','$respuesta34,$comentario34','$respuesta35,$comentario35')";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die("Query failed");
        }
    }

    $_SESSION['message'] = "Se ha guardo exitosamente!";
    
    header("Location: ../pages\NOM-026-STPS-2008.php");
}

?>