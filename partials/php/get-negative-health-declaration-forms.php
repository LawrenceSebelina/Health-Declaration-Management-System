<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getNegativeHealthDecFormsDash();

    echo json_encode($returnMsg);
    
?>