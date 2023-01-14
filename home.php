<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body>

    <?php require_once('assets/components/header.php'); ?>

    <?php 
        if (isset($_GET['mab']) && !empty($_GET['mab']) )  { //&& $_GET['mab'] == 1
            $myMab = $_GET['mab'];
            $hasBuilding = $class->getBuildingMyMab($myMab);

            if (!empty($hasBuilding)) {
                foreach ($hasBuilding as $building) {
                    $buildingName = $building['buildingName'];
                }
            } else {
                echo "<script>
                    swal('There is no building found!', 'Please re-scan the QR Code!', 'warning').then(function() {
                        window.location.href = 'index.php?route=home';
                    });
                </script>";
            }
        } else {
            $myMab = "Default";
        }

        if (isset($_GET['uuid']) && !empty($_GET['uuid'])) {
            $userUniqueIdFP = $_GET['uuid'];
        }
    ?>

    <section id="main-content">
        <main>
            <div class="container">
                <div class="row g-1">
                    <div class="col-md-12 col-lg-6 bg-dark p-1">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="assets/images/carousel-first.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-second.png" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-third.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-fourth.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-fifth.png" class="img-fluid" alt="..."></div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 bg-white p-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center mt-4">
                                    <img src="assets/images/we-care.png" class="img-fluid h-50 w-50" alt="...">
                                </div>
                            </div>
                            <h4 class="text-center text-black mt-3"><strong>More than 40 years of Excellent Patient Care</strong></h4>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center mt-4 gap-2">

                                    <?php if (!empty($info)) { ?>
                                        <a class="btn btn-primary btn-flat btn-lg" href="index.php?route=my-home" role="button"><strong><i class="fa-solid fa-home me-3"></i>My Home</strong></a>
                                        <a class="btn btn-warning btn-flat btn-lg" href="index.php?route=signout" role="button"><strong><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</strong></a>
                                    <?php } else { ?>
                                        <!-- <a class="btn btn-primary btn-flat btn-lg" href="index.php?route=signup" role="button"><strong><i class="fa-solid fa-user-plus me-3"></i>Sign Up</strong></a> -->
                                        <button type="button" class="btn btn-primary btn-flat btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">
                                            <strong><i class="fa-solid fa-user-pen me-3"></i>Sign Up</strong>
                                        </button>
                                        <button type="button" class="btn btn-success btn-flat btn-lg" data-bs-toggle="modal" data-bs-target="#signinModal">
                                            <strong><i class="fa-solid fa-right-to-bracket me-3"></i>Sign In</strong>
                                        </button>
                                    <?php } ?>

                                    <div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border border-success border-5 rounded">
                                                <div class="modal-header mx-auto me-auto gap-3">
                                                    <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                                                    <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                                                </div>
                                                <div class="modal-body bg-success">
                                                    <h3 class="text-center text-white mb-3">Select User Type</h3>
                                                    <div class="vstack gap-2 p-3">
                                                        <a class="btn btn-primary btn-flat fw-bold mb-2" href="index.php?route=signup&type=01122a97dca927210827560cb7d76af8" role="button">As Patient</a>
                                                        <a class="btn btn-primary btn-flat fw-bold mb-2" href="index.php?route=signup&type=adb831a7fdd83dd1e2a309ce7591dff8" role="button">As Guest</a>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-flat btn-lg" data-bs-dismiss="modal"><strong><i class="fa-solid fa-xmark me-3"></i>Close</strong></button>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                    <form action="" method="post" class="user-account-unhold-form">
                                        <input type="hidden" name="usersAccountsHold" class="usersAccountsHold" value="1">
                                        <input type="hidden" name="dateNow" class="dateNow" value="<?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d'); ?>">
                                        <input type="hidden" class="unholdReturnMessage">
                                    </form>
                                                
                                    <form action="" method="post" class="signin-form">
                                        <div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border border-success border-5 rounded">
                                                    <div class="modal-header mx-auto me-auto gap-3">
                                                        <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                                                        <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                                                    </div>
                                                    <div class="modal-body bg-success">
                                                        <h3 class="text-center text-white mb-4">Sign In Your Account!</h3>
                                                        <div class="vstack gap-2 px-3 pe-3 pb-3">
                                                            <div class="alert alert-danger alert-messages"></div>

                                                            <input type="hidden" name="myMab" value="<?php echo  $buildingName ?? ""?>">

                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="userUsername" name="userUsername" placeholder="Username" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" required>

                                                                    <!-- maxlenght="15" -->

                                                                    <label for="userUsername">Username</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-lock p-2"></i></span>
                                                                <div class="form-floating userPassword">
                                                                    <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" required>
                                                                    <i class="fa-solid fa-eye"></i>
                                                                    <label for="userPassword">Password</label>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal"><em>Forgot Password?</em></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg signinBtn" name="signinBtn"><strong><i class="fa-solid fa-right-to-bracket me-3"></i>Sign In</strong></button>
                                                        <button type="reset" class="btn btn-secondary btn-flat btn-lg closeBtn" data-bs-dismiss="modal"><strong><i class="fa-solid fa-xmark me-3"></i>Close</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <form action="" method="post" class="forgot-password-form">
                                        <div class="modal fade" id="forgotPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border border-success border-5 rounded">
                                                    <div class="modal-header mx-auto me-auto gap-3">
                                                        <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                                                        <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                                                    </div>
                                                    <div class="modal-body bg-success">
                                                        <h3 class="text-center text-white mb-3">Forgot Password?</h3>
                                                        <p class="text-white text-justify">Please insert your username and email to verify your account and a verification will sent to your email for password reset.</p>
                                                        <div class="vstack gap-2 px-3 pe-3 pb-3">
                                                            <div class="alert alert-danger alert-messages"></div>

                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="userUsernameFP" name="userUsernameFP" placeholder="Username" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)" required>
                                                                    <label for="userUsernameFP">Username</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="userEmailFP" name="userEmailFP" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                                                                    <label for="userEmailFP">Email</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-danger btn-flat btn-lg closeBtn" data-bs-toggle="modal" data-bs-target="#signinModal"><strong><i class="fa-solid fa-arrow-left me-3"></i>Back</strong></button>
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg submitBtn" name="submitBtn"><strong><i class="fa-solid fa-paper-plane me-3"></i>Submit</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="" method="post" class="change-password-form">
                                        <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border border-success border-5 rounded">
                                                    <div class="modal-header mx-auto me-auto gap-3">
                                                        <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                                                        <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                                                    </div>
                                                    <div class="modal-body bg-success">
                                                        <h3 class="text-center text-white mb-3">Reset Password!</h3>
                                                        <p class="text-white text-center">Please insert your new password.</p>
                                                        <div class="vstack gap-2 px-3 pe-3 pb-3">
                                                            <div class="alert alert-danger alert-messages"></div>

                                                            <input type="hidden" name="userUniqueIdFP" class="userUniqueIdFP" value="<?php echo $userUniqueIdFP ?? ""; ?>">

                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-lock p-2"></i></span>
                                                                <div class="form-floating">
                                                                    <input type="password" class="form-control passwordFP" id="newPasswordFP" name="newPasswordFP" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                                    <label for="newPasswordFP">Password</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">       
                                                                <span class="input-group-text bg-white text-success"><i class="fa-solid fa-lock p-2"></i></span>
                                                                <div class="form-floating">
                                                                    <input type="password" class="form-control passwordFP" id="cNewPasswordFP" name="cNewPasswordFP" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                                    <label for="cNewPasswordFP">Confirm Password</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="reset" class="btn btn-danger btn-flat btn-lg closeBtn" data-bs-toggle="modal" data-bs-target="#signinModal"><strong><i class="fa-solid fa-arrow-left me-3"></i>Back</strong></button> -->
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg resetBtn" name="resetBtn" style="display: none;"><strong><i class="fa-solid fa-paper-plane me-3"></i>Submit New Password</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>

    <!-- Signin Function JS -->
    <script src="partials/js/signin.js"></script>
    
    <script>
        // TODO Slider Using Swiper
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        // TODO End of Slider Using Swiper
    </script>
</body>
</html>