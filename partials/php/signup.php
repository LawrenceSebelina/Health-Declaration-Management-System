<?php
    require_once('../class/allClass.php');
    require_once('../../assets/vendor/PHPMailer/src/Exception.php');
    require_once('../../assets/vendor/PHPMailer/src/PHPMailer.php');
    require_once('../../assets/vendor/PHPMailer/src/SMTP.php');

    $userUniqueId = md5(uniqid(mt_rand() . time(), true));
    $userFirstName = ucwords($_POST['userFirstName']);
    $userLastName = ucwords($_POST['userLastName']);
    $userMiddle = ucwords($_POST['userMiddle']);
    $userAddress = ucwords($_POST['userAddress']);
    $userBirthday = $_POST['userBirthday'];
    $userAge = $_POST['userAge'];
    $userGender = $_POST['userGender'];
    $userContactNo = $_POST['userContactNo'];
    $userEmail = $_POST['userEmail'];
    $userUsername = $_POST['userUsername'];
    $userPassword = md5($_POST['userPassword']);
    $userCPassword = md5($_POST['userCPassword']);
    $userType = $_POST['userType'];

    date_default_timezone_set('Asia/Manila');
    $userDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $class->signUp($userUniqueId, $userFirstName, $userLastName, $userMiddle, $userAddress, $userBirthday, $userAge, $userGender, $userContactNo, $userEmail, $userUsername, $userPassword, $userCPassword, $userType, $userDateCreated);

    echo $returnMsg;
    
?>