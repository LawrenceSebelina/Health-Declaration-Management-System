<?php
    require_once('../class/allClass.php');
    if (isset($_GET['buid']) && !empty($_GET['buid'])) {
        $buildingUniqueId = $_GET['buid'];
    }
    $returnMsg = $class->getQueues($buildingUniqueId);

    echo json_encode($returnMsg);
    
?>