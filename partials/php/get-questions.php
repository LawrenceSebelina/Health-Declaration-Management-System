<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getQuestions();

    echo json_encode($returnMsg);
    
?>