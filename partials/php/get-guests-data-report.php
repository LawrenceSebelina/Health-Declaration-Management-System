<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getGuestsDataReport();

    echo json_encode($returnMsg);
    
?>