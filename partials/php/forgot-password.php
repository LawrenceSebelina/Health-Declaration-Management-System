<?php
    require_once('../class/allClass.php');
    require_once('../class/PHPMailer/src/Exception.php');
    require_once('../class/PHPMailer/src/PHPMailer.php');
    require_once('../class/PHPMailer/src/SMTP.php');

    $userUsernameFP = $_POST['userUsernameFP'];
    $userEmailFP = $_POST['userEmailFP'];

    $returnMsg = $class->forgotPassword($userUsernameFP, $userEmailFP);

    echo $returnMsg;
    
?>