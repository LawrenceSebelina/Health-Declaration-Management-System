<?php
    require_once('../class/allClass.php');
    
    // $buildingUniqueId = md5(uniqid(mt_rand() . time(), true));
    $buildingUniqueId = md5($_POST['buildingName']);
    $userUniqueId = $_POST['userUniqueId'];
    $buildingName = $_POST['buildingName'];

    $buildingQRLink = "HDMS/index.php?mab=".$buildingUniqueId; // Can change/ or may vary depending on Domain Name

    date_default_timezone_set('Asia/Manila');
    $buildingDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $class->addBuilding($buildingUniqueId, $userUniqueId, $buildingName, $buildingQRLink, $buildingDateCreated);

    echo $returnMsg;
?>