<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getQueueMab1();

    echo json_encode($returnMsg);
    
?>