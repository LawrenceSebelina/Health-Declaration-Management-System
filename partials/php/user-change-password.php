<?php
    require_once('../class/allClass.php');

    if (!empty($_POST['userCurPassword']) && !empty($_POST['userPassword']) && !empty($_POST['userCPassword'])) {
        $userUniqueId = $_POST['userUniqueId'];
        $userCurrentPass = $_POST['userCurrentPass'];
        $userCurPassword = md5($_POST['userCurPassword']);
        $userPassword = md5($_POST['userPassword']);
        $userCPassword = md5($_POST['userCPassword']);
    
        $returnMsg = $class->userChangePass($userUniqueId, $userCurrentPass, $userCurPassword, $userPassword, $userCPassword);
    
        echo $returnMsg;

    } else {
        echo "Please filled up all fields!";
    }
?>