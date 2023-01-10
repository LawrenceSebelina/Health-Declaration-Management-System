<?php
    require_once('../class/allClass.php');

    $userUsername = $_POST['userUsername'];
    $userPassword = md5($_POST['userPassword']);
    $myMab = $_POST['myMab'];

    $returnMsg = $class->signIn($userUsername, $userPassword, $myMab);

    echo $returnMsg;
    
?>