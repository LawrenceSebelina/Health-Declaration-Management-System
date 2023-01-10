<?php
    require_once('../class/allClass.php');

    $returnMsg = $class->getBuildings();

    echo json_encode($returnMsg);
    
?>