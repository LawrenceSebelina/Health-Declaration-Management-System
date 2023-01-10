<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Sign Up</title>
</head>
<body>
    <?php require_once('assets/components/header.php'); ?>
    <?php 
        if (isset($_GET['type']) && !empty($_GET['type'])) { 
            if ($_GET['type'] == "01122a97dca927210827560cb7d76af8" || $_GET['type'] == "adb831a7fdd83dd1e2a309ce7591dff8") {
                if ($_GET['type'] == "01122a97dca927210827560cb7d76af8") {
                    $userType = "Patient";
                } else if ($_GET['type'] == "adb831a7fdd83dd1e2a309ce7591dff8") {
                    $userType = "Guest";
                }
                $userTypeLink =  $_GET['type'];
            } else {
                echo "<script>
                    window.location.assign('index.php?route=404');
                </script>";
            }
        } else {
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        }
    ?>
    <section id="main-content">
        <main>
            <div class="container">
                <div class="row g-1">
                    <div class="col-md-12 col-lg-4 bg-dark p-3">
                        <h2 class="text-center text-white mb-3">Anti COVID-19 Measures</h2>
                        <p class="text-justify text-white">The PHMC-B has the safety of its patiesnts, employees, and visitors as its top priority. To ensure this, we have a Health and Safety Team and an Infection Prevention and Control Unit and monitors doctors', employees', and visitors' health declaration forms daily. This entails all individuals who enter the hospital premises to undergo temperature monitoring, symptoms monitoring, and identifying any possible history of exposure. Enhanced sanitation measures are also employed at PHMC-B. Rigorous fogging of patients rooms, common areas, and facilities frequented by patients are often wiped down from floor to ceiling to eliminate any infectious material are just some of the practices done to prevent hospital acquired infections. All these measures are in place to safeguard those who enter the hospital.</p>
                    </div>
                    <div class="col-md-12 col-lg-8 bg-success p-3">
                        <h2 class="text-center text-white mb-3">Sign Up<hr></h2>
                        <form action="" method="post" class="signup-form">
                            <div class="row g-2">
                                <div class="alert alert-danger alert-messages"></div>
                                <input type="hidden" name="userType" value="<?php echo $userType ?? ""; ?>">
                                <input type="hidden" id="userTypeLink" value="<?php echo $userTypeLink ?? ""; ?>">
                                <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Personal Information</span></h5></div>
                                <div class="col-md-12 col-xl-5">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="First Name">
                                            <label for="userFirstName">First Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-5">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="Last Name">
                                            <label for="userLastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-2">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userMiddle" name="userMiddle" placeholder="M.I.">
                                            <label for="userMiddle">M.I.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-house p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userAddress" name="userAddress" placeholder="Address">
                                            <label for="userAddress">Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-5">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="userBirthday" name="userBirthday" placeholder="Birthday">
                                            <label for="userBirthday">Birthday</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-3">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userAge" name="userAge" placeholder="Age">
                                            <label for="userAge">Age</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-4 mb-2">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-venus-mars p-2"></i></span>
                                        <div class="form-floating">
                                            <select class="form-select" style="height: 3.6rem;" id="userGender" name="userGender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="userGender">Gender</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Contact Information</span></h5></div>
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userContactNo" name="userContactNo" placeholder="Contact No.:">
                                            <label for="userContactNo">Contact No.:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="Email">
                                            <label for="userEmail">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Set Username & Password</span></h5></div>
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userUsername" name="userUsername" placeholder="Username">
                                            <label for="userUsername">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                        <div class="form-floating userPassword">
                                            <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password">
                                            <i class="fa-solid fa-eye"></i>
                                            <label for="userPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                        <div class="form-floating userCPassword">
                                            <input type="password" class="form-control" id="userCPassword" name="userCPassword" placeholder="Confirm Password">
                                            <i class="fa-solid fa-eye"></i>
                                            <label for="userCPassword">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 signupBtn" name="signupBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit</strong></button>
                                    <span class="d-flex justify-content-center text-white fw-bold mt-2">Already have an account?<a href="index.php?route=home" class="text-white mx-2">Sign in here!</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>

    <!-- Signin Function JS -->
    <script src="partials/js/signup.js"></script>
</body>
</html>