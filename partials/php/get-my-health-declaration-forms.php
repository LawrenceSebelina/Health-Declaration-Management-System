<?php
    require_once('../class/allClass.php');
    $info = $class->getUserInfo();
    if (!empty($info)) {
        $userUniqueId = $info['userUniqueId']; 
    }
    $returnMsg = $class->getMyHealthDecForms($userUniqueId);

    echo json_encode($returnMsg);
    
?>