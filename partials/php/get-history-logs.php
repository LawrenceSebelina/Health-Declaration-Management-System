<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getActivityLogs();

    echo json_encode($returnMsg);
    
?>