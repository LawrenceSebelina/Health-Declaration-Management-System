<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getContactUs();

    echo json_encode($returnMsg);
    
?>