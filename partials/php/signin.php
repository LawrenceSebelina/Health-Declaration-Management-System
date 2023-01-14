<?php
    require_once('../class/allClass.php');

    $userUsername = $_POST['userUsername'];
    if (!empty($_POST['userPassword'])) {
        $userPassword = md5($_POST['userPassword']);
    } else {
        $userPassword = $_POST['userPassword'];
    }
    $myMab = $_POST['myMab'];

    $returnMsg = $class->signIn($userUsername, $userPassword, $myMab);

    echo $returnMsg;
    
?>