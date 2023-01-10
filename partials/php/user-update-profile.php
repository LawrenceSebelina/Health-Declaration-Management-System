<?php
    require_once('../class/allClass.php');

    $userUniqueId = $_POST['userUniqueId'];
    $updateUserFName = ucwords($_POST['updateUserFName']);
    $updateUserLName = ucwords($_POST['updateUserLName']);
    $updateUserMI = ucwords($_POST['updateUserMI']);
    $updateUserAddress = ucwords($_POST['updateUserAddress']);
    $updateUserBDay = $_POST['updateUserBDay'];
    $updateUserAge = $_POST['updateUserAge'];
    $updateUserGender = $_POST['updateUserGender'];
    $updateContactNo = $_POST['updateContactNo'];
    $updateUserEmail = $_POST['updateUserEmail'];

    $returnMsg = $class->userUpdateProfile($userUniqueId, $updateUserFName, $updateUserLName, $updateUserMI, $updateUserAddress, $updateUserBDay, $updateUserAge, $updateUserGender, $updateContactNo, $updateUserEmail);

    echo $returnMsg;
    
?>