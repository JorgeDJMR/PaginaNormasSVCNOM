<?php
include("../db.php");


if(isset($_POST['guardar_n112001'])){
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
    $comentario36 = isset($_POST['comentario36']) ? $_POST['comentario36'] : '';
    $respuesta36 = isset($_POST['pregunta36']) ? $_POST['pregunta36'] : '';
    $comentario37 = isset($_POST['comentario37']) ? $_POST['comentario37'] : '';
    $respuesta37 = isset($_POST['pregunta37']) ? $_POST['pregunta37'] : '';
    $comentario38 = isset($_POST['comentario38']) ? $_POST['comentario38'] : '';
    $respuesta38 = isset($_POST['pregunta38']) ? $_POST['pregunta38'] : '';
    $comentario39 = isset($_POST['comentario39']) ? $_POST['comentario39'] : '';
    $respuesta39 = isset($_POST['pregunta39']) ? $_POST['pregunta39'] : '';
    $comentario40 = isset($_POST['comentario40']) ? $_POST['comentario40'] : '';
    $respuesta40 = isset($_POST['pregunta40']) ? $_POST['pregunta40'] : '';
    $comentario41 = isset($_POST['comentario41']) ? $_POST['comentario41'] : '';
    $respuesta41 = isset($_POST['pregunta41']) ? $_POST['pregunta41'] : '';
    $comentario42 = isset($_POST['comentario42']) ? $_POST['comentario42'] : '';
    $respuesta42 = isset($_POST['pregunta42']) ? $_POST['pregunta42'] : '';
    $comentario43 = isset($_POST['comentario43']) ? $_POST['comentario43'] : '';
    $respuesta43 = isset($_POST['pregunta43']) ? $_POST['pregunta43'] : '';
    $comentario44 = isset($_POST['comentario44']) ? $_POST['comentario44'] : '';
    $respuesta44 = isset($_POST['pregunta44']) ? $_POST['pregunta44'] : '';
    $comentario45 = isset($_POST['comentario45']) ? $_POST['comentario45'] : '';
    $respuesta45 = isset($_POST['pregunta45']) ? $_POST['pregunta45'] : '';
    $comentario46 = isset($_POST['comentario46']) ? $_POST['comentario46'] : '';
    $respuesta46 = isset($_POST['pregunta46']) ? $_POST['pregunta46'] : '';
    $comentario47 = isset($_POST['comentario47']) ? $_POST['comentario47'] : '';
    $respuesta47 = isset($_POST['pregunta47']) ? $_POST['pregunta47'] : '';
    $comentario48 = isset($_POST['comentario48']) ? $_POST['comentario48'] : '';
    $respuesta48 = isset($_POST['pregunta48']) ? $_POST['pregunta48'] : '';
    $comentario49 = isset($_POST['comentario49']) ? $_POST['comentario49'] : '';
    $respuesta49 = isset($_POST['pregunta49']) ? $_POST['pregunta49'] : '';
    $comentario50 = isset($_POST['comentario50']) ? $_POST['comentario50'] : '';
    $respuesta50 = isset($_POST['pregunta50']) ? $_POST['pregunta50'] : '';
    $comentario51 = isset($_POST['comentario51']) ? $_POST['comentario51'] : '';
    $respuesta51 = isset($_POST['pregunta51']) ? $_POST['pregunta51'] : '';
    $comentario52 = isset($_POST['comentario52']) ? $_POST['comentario52'] : '';
    $respuesta52 = isset($_POST['pregunta52']) ? $_POST['pregunta52'] : '';
    $comentario53 = isset($_POST['comentario53']) ? $_POST['comentario53'] : '';
    $respuesta53 = isset($_POST['pregunta53']) ? $_POST['pregunta53'] : '';
    $comentario54 = isset($_POST['comentario54']) ? $_POST['comentario54'] : '';
    $respuesta54 = isset($_POST['pregunta54']) ? $_POST['pregunta54'] : '';
    $comentario55 = isset($_POST['comentario55']) ? $_POST['comentario55'] : '';
    $respuesta55 = isset($_POST['pregunta55']) ? $_POST['pregunta55'] : '';
    $comentario56 = isset($_POST['comentario56']) ? $_POST['comentario56'] : '';
    $respuesta56 = isset($_POST['pregunta56']) ? $_POST['pregunta56'] : '';
    $comentario57 = isset($_POST['comentario57']) ? $_POST['comentario57'] : '';
    $respuesta57 = isset($_POST['pregunta57']) ? $_POST['pregunta57'] : '';
    $comentario58 = isset($_POST['comentario58']) ? $_POST['comentario58'] : '';
    $respuesta58 = isset($_POST['pregunta58']) ? $_POST['pregunta58'] : '';
    $comentario59 = isset($_POST['comentario59']) ? $_POST['comentario59'] : '';
    $respuesta59 = isset($_POST['pregunta59']) ? $_POST['pregunta59'] : '';
    $comentario60 = isset($_POST['comentario60']) ? $_POST['comentario60'] : '';
    $respuesta60 = isset($_POST['pregunta60']) ? $_POST['pregunta60'] : '';
    $comentario61 = isset($_POST['comentario61']) ? $_POST['comentario61'] : '';
    $respuesta61 = isset($_POST['pregunta61']) ? $_POST['pregunta61'] : '';
    $comentario62 = isset($_POST['comentario62']) ? $_POST['comentario62'] : '';
    $respuesta62 = isset($_POST['pregunta62']) ? $_POST['pregunta62'] : '';
    $comentario63 = isset($_POST['comentario63']) ? $_POST['comentario63'] : '';
    $respuesta63 = isset($_POST['pregunta63']) ? $_POST['pregunta63'] : '';
    $comentario64 = isset($_POST['comentario64']) ? $_POST['comentario64'] : '';
    $respuesta64 = isset($_POST['pregunta64']) ? $_POST['pregunta64'] : '';
    $comentario65 = isset($_POST['comentario65']) ? $_POST['comentario65'] : '';
    $respuesta65 = isset($_POST['pregunta65']) ? $_POST['pregunta65'] : '';
    $comentario66 = isset($_POST['comentario66']) ? $_POST['comentario66'] : '';
    $respuesta66 = isset($_POST['pregunta66']) ? $_POST['pregunta66'] : '';
    $comentario67 = isset($_POST['comentario67']) ? $_POST['comentario67'] : '';
    $respuesta67 = isset($_POST['pregunta67']) ? $_POST['pregunta67'] : '';
    $comentario68 = isset($_POST['comentario68']) ? $_POST['comentario68'] : '';
    $respuesta68 = isset($_POST['pregunta68']) ? $_POST['pregunta68'] : '';
    $comentario69 = isset($_POST['comentario69']) ? $_POST['comentario69'] : '';
    $respuesta69 = isset($_POST['pregunta69']) ? $_POST['pregunta69'] : '';
    $comentario70 = isset($_POST['comentario70']) ? $_POST['comentario70'] : '';
    $respuesta70 = isset($_POST['pregunta70']) ? $_POST['pregunta70'] : '';
    $comentario71 = isset($_POST['comentario71']) ? $_POST['comentario71'] : '';
    $respuesta71 = isset($_POST['pregunta71']) ? $_POST['pregunta71'] : '';
    $comentario72 = isset($_POST['comentario72']) ? $_POST['comentario72'] : '';
    $respuesta72 = isset($_POST['pregunta72']) ? $_POST['pregunta72'] : '';
    $comentario73 = isset($_POST['comentario73']) ? $_POST['comentario73'] : '';
    $respuesta73 = isset($_POST['pregunta73']) ? $_POST['pregunta73'] : '';
    $comentario74 = isset($_POST['comentario74']) ? $_POST['comentario74'] : '';
    $respuesta74 = isset($_POST['pregunta74']) ? $_POST['pregunta74'] : '';
    $comentario75 = isset($_POST['comentario75']) ? $_POST['comentario75'] : '';
    $respuesta75 = isset($_POST['pregunta75']) ? $_POST['pregunta75'] : '';
    $comentario76 = isset($_POST['comentario76']) ? $_POST['comentario76'] : '';
    $respuesta76 = isset($_POST['pregunta76']) ? $_POST['pregunta76'] : '';
    $comentario77 = isset($_POST['comentario77']) ? $_POST['comentario77'] : '';
    $respuesta77 = isset($_POST['pregunta77']) ? $_POST['pregunta77'] : '';
    $comentario78 = isset($_POST['comentario78']) ? $_POST['comentario78'] : '';
    $respuesta78 = isset($_POST['pregunta78']) ? $_POST['pregunta78'] : '';
    $comentario79 = isset($_POST['comentario79']) ? $_POST['comentario79'] : '';
    $respuesta79 = isset($_POST['pregunta79']) ? $_POST['pregunta79'] : '';
    $comentario80 = isset($_POST['comentario80']) ? $_POST['comentario80'] : '';
    $respuesta80 = isset($_POST['pregunta80']) ? $_POST['pregunta80'] : '';
    $comentario81 = isset($_POST['comentario81']) ? $_POST['comentario81'] : '';
    $respuesta81 = isset($_POST['pregunta81']) ? $_POST['pregunta81'] : '';
    $comentario82 = isset($_POST['comentario82']) ? $_POST['comentario82'] : '';
    $respuesta82 = isset($_POST['pregunta82']) ? $_POST['pregunta82'] : '';
    $comentario83 = isset($_POST['comentario83']) ? $_POST['comentario83'] : '';
    $respuesta83 = isset($_POST['pregunta83']) ? $_POST['pregunta83'] : '';
    $comentario84 = isset($_POST['comentario84']) ? $_POST['comentario84'] : '';
    $respuesta84 = isset($_POST['pregunta84']) ? $_POST['pregunta84'] : '';
    $comentario85 = isset($_POST['comentario85']) ? $_POST['comentario85'] : '';
    $respuesta85 = isset($_POST['pregunta85']) ? $_POST['pregunta85'] : '';
    $comentario86 = isset($_POST['comentario86']) ? $_POST['comentario86'] : '';
    $respuesta86 = isset($_POST['pregunta86']) ? $_POST['pregunta86'] : '';
    $comentario87 = isset($_POST['comentario87']) ? $_POST['comentario87'] : '';
    $respuesta87 = isset($_POST['pregunta87']) ? $_POST['pregunta87'] : '';
    $comentario88 = isset($_POST['comentario88']) ? $_POST['comentario88'] : '';
    $respuesta88 = isset($_POST['pregunta88']) ? $_POST['pregunta88'] : '';
    $comentario89 = isset($_POST['comentario89']) ? $_POST['comentario89'] : '';
    $respuesta89 = isset($_POST['pregunta89']) ? $_POST['pregunta89'] : '';

    $queryCheck = "SELECT * FROM norma112001 WHERE usuarioID = '{$_SESSION['usuarioID']}'";
    $resultCheck = mysqli_query($conn, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        $queryUpdate = "UPDATE norma112001 SET r1='$respuesta1,$comentario1', r2='$respuesta2,$comentario2', r3='$respuesta3,$comentario3', r4='$respuesta4,$comentario4', r5='$respuesta5,$comentario5', r6='$respuesta6,$comentario6', r7='$respuesta7,$comentario7', r8='$respuesta8,$comentario8', r9='$respuesta9,$comentario9', r10='$respuesta10,$comentario10', r11='$respuesta11,$comentario11', r12='$respuesta12,$comentario12', r13='$respuesta13,$comentario13', r14='$respuesta14,$comentario14', r15='$respuesta15,$comentario15', r16='$respuesta16,$comentario16', r17='$respuesta17,$comentario17', r18='$respuesta18,$comentario18', r19='$respuesta19,$comentario19', r20='$respuesta20,$comentario20', r21='$respuesta21,$comentario21', r22='$respuesta22,$comentario22', r23='$respuesta23,$comentario23', r24='$respuesta24,$comentario24', r25='$respuesta25,$comentario25', r26='$respuesta26,$comentario26', r27='$respuesta27,$comentario27', r28='$respuesta28,$comentario28', r29='$respuesta29,$comentario29', r30='$respuesta30,$comentario30', r31='$respuesta31,$comentario31', r32='$respuesta32,$comentario32', r33='$respuesta33,$comentario33', r34='$respuesta34,$comentario34', r35='$respuesta35,$comentario35', r36='$respuesta36,$comentario36', r37='$respuesta37,$comentario37', r38='$respuesta38,$comentario38', r39='$respuesta39,$comentario39', r40='$respuesta40,$comentario40', r41='$respuesta41,$comentario41', r42='$respuesta42,$comentario42', r43='$respuesta43,$comentario43', r44='$respuesta44,$comentario44', r45='$respuesta45,$comentario45' WHERE usuarioID = '{$_SESSION['usuarioID']}'";
        $resultUpdate = mysqli_query($conn, $queryUpdate);

        if (!$resultUpdate) {
            die("Update query failed: " . mysqli_error($conn));
        }
    } else {
        $query = "INSERT INTO norma112001 (registroID, usuarioID, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, r13, r14, r15, r16, r17, r18, r19, r20, r21, r22, r23, r24, r25, r26, r27, r28, r29, r30, r31, r32, r33, r34, r35, r36, r37, r38, r39, r40, r41, r42, r43, r44, r45) 
        VALUES (NULL, '{$_SESSION['usuarioID']}', '$respuesta1,$comentario1','$respuesta2,$comentario2','$respuesta3,$comentario3','$respuesta4,$comentario4','$respuesta5,$comentario5','$respuesta6,$comentario6','$respuesta7,$comentario7','$respuesta8,$comentario8','$respuesta9,$comentario9','$respuesta10,$comentario10','$respuesta11,$comentario11','$respuesta12,$comentario12','$respuesta13,$comentario13','$respuesta14,$comentario14','$respuesta15,$comentario15','$respuesta16,$comentario16','$respuesta17,$comentario17','$respuesta18,$comentario18','$respuesta19,$comentario19','$respuesta20,$comentario20','$respuesta21,$comentario21','$respuesta22,$comentario22','$respuesta23,$comentario23','$respuesta24,$comentario24','$respuesta25,$comentario25','$respuesta26,$comentario26','$respuesta27,$comentario27','$respuesta28,$comentario28','$respuesta29,$comentario29','$respuesta30,$comentario30','$respuesta31,$comentario31','$respuesta32,$comentario32','$respuesta33,$comentario33','$respuesta34,$comentario34','$respuesta35,$comentario35','$respuesta36,$comentario36','$respuesta37,$comentario37','$respuesta38,$comentario38','$respuesta39,$comentario39','$respuesta40,$comentario40','$respuesta41,$comentario41','$respuesta42,$comentario42','$respuesta43,$comentario43','$respuesta44,$comentario44','$respuesta45,$comentario45')";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            die("Query failed");
        }
    }
    $_SESSION['message'] = "Se ha guardo exitosamente!";
    
    header("Location: ../pages\NOM-011-STPS-2001.php");
}

?>