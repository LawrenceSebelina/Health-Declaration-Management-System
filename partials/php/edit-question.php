<?php
    require_once('../class/allClass.php');
    
    // if (!empty($_POST['editChoices']) && $_POST['editChoices'] !== null) {
        $editQuestionUniqueId = $_POST['editQuestionUniqueId'];
        $userUniqueId = $_POST['userUniqueId'];
        $editQuestion = $_POST['editQuestion'];
        $editChoicesId = $_POST['editChoicesId'];
        $editChoices = $_POST['editChoices'];
        $returnMsg = $class->editQuestion($editQuestionUniqueId, $userUniqueId, $editChoicesId, $editQuestion, $editChoices);

        echo $returnMsg;
    // } else {
    //     echo "Please filled up all fields!";
    // }
?>