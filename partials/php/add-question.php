<?php
    require_once('../class/allClass.php');
    
    if (!empty($_POST['choices']) && $_POST['choices'] !== null) {
        // $questionUniqueId = md5(uniqid(mt_rand() . time(), true));
        date_default_timezone_set('Asia/Manila');
        $questionUniqueId = "Q-".date("ymd").substr(md5(uniqid(mt_rand() . time(), true)), 0, 13);

        $userUniqueId = $_POST['userUniqueId'];
        $question = $_POST['question'];
        $choices = $_POST['choices'];
        $questionType = $_POST['questionType'];

        date_default_timezone_set('Asia/Manila');
        $questionDateCreated = date('Y-m-d H:i:s');

        $returnMsg = $class->addQuestion($questionUniqueId, $userUniqueId, $question, $choices, $questionType, $questionDateCreated);

        echo $returnMsg;
    } else {
        echo "Please filled up all fields!";
    }
?>