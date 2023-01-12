<?php 
    require_once('../partials/class/allClass.php'); 
    $info = $class->getUserInfo();

    // if (empty($info)) {
    //     echo "<script>
    //         window.location.assign('../index.php?route=home');
    //     </script>";
    // }

    if (!empty($info)) {
        if ($info['userType'] !== "Admin") {
            echo "<script>
                    window.location.assign('../index.php?route=signout');
                </script>";
        }
    } else {
        echo "<script>
                window.location.assign('../index.php?route=signout');
            </script>";
    }
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-success navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="index.php?route=form" role="button"><i class="fa-solid fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php?route=form" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php?route=form" class="nav-link">Manage Form</a>
        </li> -->
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fa-solid fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
    <div class="sign-out">
        <a class="btn btn-warning btn-flat" href="../signout.php" role="button"><strong><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</strong></a>
    </div>
</nav>
<!-- /.navbar -->