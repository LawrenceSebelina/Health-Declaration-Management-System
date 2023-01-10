<?php
    require_once('../class/allClass.php');

    if (!empty($_POST['adminPassword']) && !empty($_POST['adminCPassword'])) {
        $userUniqueId = $_POST['userUniqueId'];
        $adminFullName = $_POST['adminFullName'];
        $adminUniqueId = $_POST['adminUniqueId'];
        // $adminCurrentPass = $_POST['adminCurrentPass'];
        // $adminCurPassword = md5($_POST['adminCurPassword']);
        $adminPassword = md5($_POST['adminPassword']);
        $adminCPassword = md5($_POST['adminCPassword']);
        // $returnMsg = $class->updateAdminPass($adminUniqueId, $adminCurrentPass, $adminCurPassword, $adminPassword, $adminCPassword);
    
        $returnMsg = $class->updateAdminPass($userUniqueId, $adminFullName, $adminUniqueId, $adminPassword, $adminCPassword);
    
        echo $returnMsg;
    } else {
        echo "Please filled up all fields!";
    }
?>