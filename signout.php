<?php
    require_once('partials/class/allClass.php');
    $info = $class->getUserInfo();
    $userUniqueId = $info['userUniqueId'];
    $class->signOut($userUniqueId);
    header ("location: index.php");
?>