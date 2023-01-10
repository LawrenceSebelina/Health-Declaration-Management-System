<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-profile" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
            Change Password
        <?php } else { ?>
            Update Profile
        <?php } ?>  
    </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed">
    <div class="wrapper">
        
        <?php require_once('../assets/components/admin/header.php'); ?>
        <?php require_once('../assets/components/admin/sidebar.php'); ?>
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-profile" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
                                    <h1>Change Password</h1>
                                <?php } else { ?>
                                    <h1>Update Profile</h1>
                                <?php } ?>  
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-profile" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=my-profile">Update Profile</a></li>
                                        <li class="breadcrumb-item active">Set New Password</li>
                                    <?php } else { ?>
                                        <li class="breadcrumb-item active">Update Profile</li>
                                        <li class="breadcrumb-item"><a href="index.php?route=my-profile&action=change-password&uid=<?php echo $info['userUniqueId'] ?? ""; ?>">Set New Password</a></li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-profile" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
                                        <?php 
                                            $adminUniqueId = $info['userUniqueId']; 
                                            $adminDatas = $class->getAdminAccountInfos($adminUniqueId);

                                            if (!empty($adminDatas)) {
                                                foreach ($adminDatas as $adminData) {
                                                    $adminDataUniqueId = $adminData['userUniqueId'];
                                                    $adminFullName = $adminData['userFName'] . " " . $adminData['userLName'];
                                                    $adminPassword = $adminData['userPassword'];
                                                }
                                            } else {
                                                echo "<script>
                                                    window.location.assign('index.php?route=404');
                                                </script>";
                                            }
                                        ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-user-lock me-2"></i>Change Password</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <nav>
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.php?route=my-profile">Update Profile</a></li>
                                                    <li class="breadcrumb-item active">Set New Password</li>
                                                </ol>
                                            </nav>

                                            <form action="" method="post" class="admin-cpassword-form">
                                                <div class="row g-2 pe-5 px-5 mt-2">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <div class="mt-4"><h3 class="form-title"><span>Set New Password</span></h3></div>
                                                    <input type="hidden" value="<?php echo $adminDataUniqueId ?? ""; ?>" name="adminUniqueId">
                                                    <input type="hidden" value="<?php echo $adminPassword ?? ""; ?>" name="adminCurrentPass">
                                                    <div class="col-md-12 mb-1">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                            <div class="form-floating adminCurPassword">
                                                                <input type="password" class="form-control" id="adminCurPassword" name="adminCurPassword" placeholder="Password">
                                                                <i class="fa-solid fa-eye"></i>
                                                                <label for="adminCurPassword">Current Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-1">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                            <div class="form-floating adminPassword">
                                                                <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Confirm Password">
                                                                <i class="fa-solid fa-eye"></i>
                                                                <label for="adminPassword">New Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-1">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                            <div class="form-floating adminCPassword">
                                                                <input type="password" class="form-control" id="adminCPassword" name="adminCPassword" placeholder="Confirm Password">
                                                                <i class="fa-solid fa-eye"></i>
                                                                <label for="adminCPassword">Confirm New Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 adminChangePassBtn" name="adminChangePassBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Save</strong></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-profile" ) { ?>
                                        <!-- && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-account" -->
                                        <?php 
                                            $adminUniqueId = $info['userUniqueId']; 
                                            $adminDatas = $class->getAdminAccountInfos($adminUniqueId);

                                            if (!empty($adminDatas)) {
                                                foreach ($adminDatas as $adminData) {
                                                    $adminDataUniqueId = $adminData['userUniqueId'];
                                                    $adminFullName = $adminData['userFName'] . " " . $adminData['userLName'];
                                                    $adminFName = $adminData['userFName'];
                                                    $adminMI = $adminData['userMI'];
                                                    $adminLName = $adminData['userLName'];
                                                    $adminAddress = $adminData['userAddress'];
                                                    $adminBDay = date('Y-m-d', strtotime($adminData['userBDay']));
                                                    $adminAge = $adminData['userAge'];
                                                    $adminGender = $adminData['userGender'];
                                                    $adminContact = $adminData['userContact'];
                                                    $adminEmail = $adminData['userEmail'];
                                                }
                                            } else {
                                                echo "<script>
                                                    window.location.assign('index.php?route=404');
                                                </script>";
                                            }
                                        ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-user-pen me-2"></i>Update Profile</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <nav>
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item active">Update Profile</li>
                                                    <li class="breadcrumb-item"><a href="index.php?route=my-profile&action=change-password&uid=<?php echo $adminDataUniqueId ?? ""; ?>">Set New Password</a></li>
                                                </ol>
                                            </nav>
                                            <form action="" method="post" class="admin-uprofile-form">
                                                <div class="row g-2">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <input type="hidden" value="<?php echo $adminDataUniqueId ?? ""; ?>" name="adminUniqueId">
                                                    <div class="mt-4"><h5 class="form-title"><span>My Personal Information</span></h5></div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminFirstName" name="adminFirstName" placeholder="First Name" value="<?php echo $adminFName ?? ""; ?>">
                                                                <label for="adminFirstName">First Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminLastName" name="adminLastName" placeholder="Last Name" value="<?php echo $adminLName ?? ""; ?>">
                                                                <label for="adminLastName">Last Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminMiddle" name="adminMiddle" placeholder="M.I." value="<?php echo $adminMI ?? ""; ?>">
                                                                <label for="adminMiddle">M.I.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-house p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminAddress" name="adminAddress" placeholder="Address" value="<?php echo $adminAddress ?? ""; ?>">
                                                                <label for="adminAddress">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="adminBirthday" name="adminBirthday" placeholder="Birthday" value="<?php echo $adminBDay ?? ""; ?>">
                                                                <label for="adminBirthday">Birthday</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-3">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminAge" name="adminAge" placeholder="Age" value="<?php echo $adminAge ?? ""; ?>">
                                                                <label for="adminAge">Age</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-4 mb-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-venus-mars p-2"></i></span>
                                                            <div class="form-floating">
                                                                <select class="form-select" style="height: 3.6rem;" id="adminGender" name="adminGender">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                <label for="adminGender">Gender</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4"><h5 class="form-title"><span>My Contact Information</span></h5></div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminContactNo" name="adminContactNo" placeholder="Contact No.:" value="<?php echo $adminContact ?? ""; ?>">
                                                                <label for="adminContactNo">Contact No.:</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminEmail" name="adminEmail" placeholder="Email" value="<?php echo $adminEmail ?? ""; ?>">
                                                                <label for="adminEmail">Email</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 adminUpdateProfBtn" name="adminUpdateProfBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit</strong></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } else { 
                                        echo "<script>
                                            window.location.assign('index.php?route=404');
                                        </script>";
                                    } ?>
                                </div>      
                            </div>
                        </div>  
                    </div>
                </section>
            </div>
            
            <?php require_once('../assets/components/admin/footer.php'); ?>

            <!-- My Profile Function JS -->
            <script src="../partials/js/admin-update-profile.js"></script>
            <script src="../partials/js/admin-change-password.js"></script>
        </div>

</body>
</html>
    