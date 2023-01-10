<?php
    require_once('../class/allClass.php');

    $contactUsUniqueId = md5(uniqid(mt_rand() . time(), true));
    $userFirstName = ucwords($_POST['userFirstName']);
    $userLastName = ucwords($_POST['userLastName']);
    $userContact = $_POST['userContact'];
    $userEmail = $_POST['userEmail'];
    $userMessage = $_POST['userMessage'];

    date_default_timezone_set('Asia/Manila');
    $contactusDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $class->submitContactUs($contactUsUniqueId, $userFirstName, $userLastName, $userContact, $userEmail, $userMessage, $contactusDateCreated);

    echo $returnMsg;
    
?>