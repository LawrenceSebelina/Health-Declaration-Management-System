<?php
    require_once('../class/allClass.php');

    $adminUniqueId = md5(uniqid(mt_rand() . time(), true));
    $adminFirstName = ucwords($_POST['adminFirstName']);
    $adminLastName = ucwords($_POST['adminLastName']);
    $adminMiddle = ucwords($_POST['adminMiddle']);
    $adminAddress = ucwords($_POST['adminAddress']);
    $adminBirthday = $_POST['adminBirthday'];
    $adminAge = $_POST['adminAge'];
    $adminGender = $_POST['adminGender'];
    $adminContactNo = $_POST['adminContactNo'];
    $adminEmail = $_POST['adminEmail'];
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = md5($_POST['adminPassword']);
    $adminCPassword = md5($_POST['adminCPassword']);
    $userType = "Admin";

    date_default_timezone_set('Asia/Manila');
    $adminDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $class->addAdminAccount($adminUniqueId, $adminFirstName, $adminLastName, $adminMiddle, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail, $adminUsername, $adminPassword, $adminCPassword, $userType, $adminDateCreated);

    echo $returnMsg;
    
?>