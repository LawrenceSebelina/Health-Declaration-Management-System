<?php
    require_once('../class/allClass.php');

    $userUniqueIdFP = $_POST['userUniqueIdFP'];
    $newPasswordFP = md5($_POST['newPasswordFP']);
    $cNewPasswordFP = md5($_POST['cNewPasswordFP']);

    $returnMsg = $class->changePasswordFP($userUniqueIdFP, $newPasswordFP, $cNewPasswordFP);

    echo $returnMsg;
    
?>