<?php
    require_once('../class/allClass.php');

    if (!empty($_POST['userComorbidity']) && !empty($_POST['userTemperature'])) {
        date_default_timezone_set('Asia/Manila');
        $declarationUniqueId = date("ymd") . md5(uniqid(mt_rand() . time(), true)); 
        // $question1Ans = $_POST['question1Ans'];
        // $question2Ans = $_POST['question2Ans'];
        // $question3Ans = $_POST['question3Ans'];
        // $question4Ans = $_POST['question4Ans'];
        // $question5Ans = $_POST['question5Ans'];
    
        $userUniqueId = $_POST['userUniqueId'];
        $userType = $_POST['userType'];
        // $questions = $_POST['questionsUniqueId'];
        $questionsUniqueIds = $_POST['questionsUniqueId'];
        $questionsType = $_POST['questionsType'];
        $answersQT1 = $_POST['answersQT1'];
        $answersQT2 = $_POST['answersQT2'];
        $userComorbidity = $_POST['userComorbidity'];
        $otherUserComorbidity = $_POST['otherUserComorbidity'];
        $userTemperature = $_POST['userTemperature'];

        date_default_timezone_set('Asia/Manila');
        $declarationDateCreated = date('Y-m-d H:i:s');
    
        // $returnMsg = $class->submitHealthDec($declarationUniqueId, $userUniqueId, $userType, $questions, $questionsUniqueIds, $questionsType, $answersQT1, $answersQT2, $userComorbidity, $otherUserComorbidity, $userTemperature);

        $returnMsg = $class->submitHealthDec($declarationUniqueId, $userUniqueId, $userType, $questionsUniqueIds, $questionsType, $answersQT1, $answersQT2, $userComorbidity, $otherUserComorbidity, $userTemperature, $declarationDateCreated);
    
        echo json_encode($returnMsg);
    } else {
        echo json_encode("Please filled up all fields!");
    }
    
    
?>