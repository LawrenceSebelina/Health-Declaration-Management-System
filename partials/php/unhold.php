<?php
    require_once('../class/allClass.php');

    $usersAccountsHold = $_POST['usersAccountsHold'];
    $dateNow = $_POST['dateNow'];

    $returnMsg = $class->unholdUserAccount($usersAccountsHold, $dateNow);

    echo $returnMsg;
    
?>