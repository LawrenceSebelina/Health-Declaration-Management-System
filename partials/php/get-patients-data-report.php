<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getPatientsDataReport();

    echo json_encode($returnMsg);
    
?>