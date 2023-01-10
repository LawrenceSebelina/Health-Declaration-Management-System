<?php
    require_once('../class/allClass.php');

    if (!empty($_POST['adminCurPassword']) && !empty($_POST['adminPassword']) && !empty($_POST['adminCPassword'])) {
        $adminUniqueId = $_POST['adminUniqueId'];
        $adminCurrentPass = $_POST['adminCurrentPass'];
        $adminCurPassword = md5($_POST['adminCurPassword']);
        $adminPassword = md5($_POST['adminPassword']);
        $adminCPassword = md5($_POST['adminCPassword']);
    
        $returnMsg = $class->adminChangePass($adminUniqueId, $adminCurrentPass, $adminCurPassword, $adminPassword, $adminCPassword);
    
        echo $returnMsg;

    } else {
        echo "Please filled up all fields!";
    }
?>