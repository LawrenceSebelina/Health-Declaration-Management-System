<?php
    require_once('../class/allClass.php');

    $userUniqueId = $_POST['userUniqueId'];
    $adminUniqueId = $_POST['adminUniqueId'];
    $adminFirstName = ucwords($_POST['adminFirstName']);
    $adminLastName = ucwords($_POST['adminLastName']);
    $adminMiddle = ucwords($_POST['adminMiddle']);
    $adminAddress = ucwords($_POST['adminAddress']);
    $adminBirthday = $_POST['adminBirthday'];
    $adminAge = $_POST['adminAge'];
    $adminGender = $_POST['adminGender'];
    $adminContactNo = $_POST['adminContactNo'];
    $adminEmail = $_POST['adminEmail'];

    $returnMsg = $class->updateAdminProfile($userUniqueId, $adminUniqueId, $adminFirstName, $adminLastName, $adminMiddle, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail);

    echo $returnMsg;
    
?>