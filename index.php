<?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
<?php 
    if (!file_exists($route.'.php')) {
        include_once '404.php';
    } else {
        include_once $route.'.php';
    }
?>