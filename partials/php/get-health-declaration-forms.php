<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getHealthDecForms();

    echo json_encode($returnMsg);
    
?>