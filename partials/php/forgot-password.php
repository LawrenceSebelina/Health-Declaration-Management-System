<?php
    require_once('../class/allClass.php');
    require_once('../../assets/vendor/PHPMailer/src/Exception.php');
    require_once('../../assets/vendor/PHPMailer/src/PHPMailer.php');
    require_once('../../assets/vendor/PHPMailer/src/SMTP.php');

    $userUsernameFP = $_POST['userUsernameFP'];
    $userEmailFP = $_POST['userEmailFP'];

    $returnMsg = $class->forgotPassword($userUsernameFP, $userEmailFP);

    echo $returnMsg;
    
?>