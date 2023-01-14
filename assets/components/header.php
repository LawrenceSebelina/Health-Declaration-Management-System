<?php 
    require_once('partials/class/allClass.php'); 
    $info = $class->getUserInfo();

    if (!empty($info)) {
        if ($info['userType'] !== "Patient" && $info['userType'] !== "Guest") {
            echo "<script>
                window.location.assign('index.php?route=signout');
            </script>";
        }
    } else {
        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] != "home" && $_GET['route'] != "about" && $_GET['route'] != "contact-us" && $_GET['route'] != "location" && $_GET['route'] != "signup" && $_GET['route'] != "verification") {
            echo "<script>
                window.location.assign('index.php?route=signout');
            </script>";
        }
    }
?>
<section id="header">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" disabled><img src="assets/images/my-logo.png" class="img-fluid" alt="Logo"><span class="mx-3 fs-5 d-none d-xl-inline-block d-lg-inline-block align-middle text-center fw-bold">University of Perpertual Help<br/><span>Medical Center - Biñan</span></span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3 mt-xl-0 mt-lg-0 justify-content-lg-end" id="navbarNav">
                        <!-- <span class="text-start text-white mb-4 d-block d-lg-none">Lawrence Sebelina</span> -->
                        <ul class="navbar-nav text-center">
                            <li class="nav-item p-2">
                                <?php if (!empty($info)) { ?>
                                    <a class="nav-link nav-my-home" href="index.php?route=my-home"><i class="d-lg-none d-xl-none fa-solid fa-house me-2"></i>Home</a>
                                <?php } else { ?>
                                    <a class="nav-link nav-home" href="index.php?route=home"><i class="d-lg-none d-xl-none fa-solid fa-house me-2"></i>Home</a>
                                <?php } ?>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link nav-about" href="index.php?route=about"><i class="d-lg-none d-xl-none fa-solid fa-circle-info me-2"></i>About</a>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link nav-contact-us" href="index.php?route=contact-us"><i class="d-lg-none d-xl-none fa-solid fa-id-card me-2"></i>Contact Us</a>
                            </li>
                            <li class="nav-item p-2">
                                <a class="nav-link nav-location" href="index.php?route=location"><i class="d-lg-none d-xl-none fa-solid fa-map me-2"></i>Location</a>
                            </li>
                            <!-- <li class="nav-item p-2">
                                <a class="nav-link" href="#"><i class="d-lg-none d-xl-none fa-solid fa-address-book me-2"></i>Log Out</a>
                            </li> -->
                        </ul>
                        <?php if (!empty($info)) { ?>
                            <div class="sign-out">
                                <a class="btn btn-success btn-flat" href="signout.php" role="button"><strong><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</strong></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</section>