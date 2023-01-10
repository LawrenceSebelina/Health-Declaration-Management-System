<?php
    require_once('../class/allClass.php');

    $verifyUserUniqueId = $_POST['verifyUserUniqueId'];

    $returnMsg = $class->verifyUserAccount($verifyUserUniqueId);

    echo $returnMsg;
    
?>