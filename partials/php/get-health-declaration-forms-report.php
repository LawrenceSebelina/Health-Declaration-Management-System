<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getHealthDecFormsReport();

    echo json_encode($returnMsg);
    
?>