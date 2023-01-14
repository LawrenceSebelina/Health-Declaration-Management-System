<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getPositiveHealthDecFormsDash();

    echo json_encode($returnMsg);
    
?>