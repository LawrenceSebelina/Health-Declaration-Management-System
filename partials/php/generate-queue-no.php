<?php
    require_once('../class/allClass.php');
    
    $queueUniqueId = md5(uniqid(mt_rand() . time(), true));
    $declarationUniqueId = $_POST['declarationUniqueId'];
    $userBuildingUID = substr($_POST['userBuilding'],0,32);
    $userBuilding = substr($_POST['userBuilding'],32);
    // $userBuilding = $_POST['userBuilding'];
    $dataAgreement = $_POST['dataAgreement'];

    date_default_timezone_set('Asia/Manila');
    $queueDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $class->generateQueueNo($queueUniqueId, $declarationUniqueId, $userBuildingUID, $userBuilding, $dataAgreement, $queueDateCreated);

    echo json_encode($returnMsg);
    
?>