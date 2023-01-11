<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-password" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
            Update Admin Password
        <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-account" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
            Update Admin Profile
        <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-account") { ?>
            Add Admin Account
        <?php } else { ?>
            Manage Accounts
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
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-password" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                    <h1>Update Admin Password</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-account" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                    <h1>Update Admin Profile</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-account") { ?>
                                    <h1>Add Admin Account</h1>
                                <?php } else { ?>
                                    <h1>Manage Accounts</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-password" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=manage-accounts">Manage Accounts</a></li>
                                        <li class="breadcrumb-item active">Update Admin Password</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-account" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=manage-accounts">Manage Accounts</a></li>
                                        <li class="breadcrumb-item active">Update Admin Profile</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-account") { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=manage-accounts">Manage Accounts</a></li>
                                        <li class="breadcrumb-item active">Add Admin Account</li>
                                    <?php } else { ?>
                                        <li class="breadcrumb-item active">Manage Accounts</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-password" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                        <?php 
                                            $adminUniqueId = $_GET['uid']; 
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
                                            <h3 class="card-title"><i class="fa-solid fa-user-lock me-2"></i>Update Admin Password (<?php echo $adminFullName ?? ""; ?>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <nav>
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.php?route=manage-accounts&action=edit-account&uid=<?php echo $adminDataUniqueId ?? ""; ?>">Update Profile</a></li>
                                                    <li class="breadcrumb-item active">Set New Password</li>
                                                </ol>
                                            </nav>

                                            <form action="" method="post" class="update-admin-password-form">
                                                <div class="row g-2 pe-5 px-5 mt-2">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <div class="mt-4"><h3 class="form-title"><span>Set New Password</span></h3></div>
                                                    <input type="hidden" value="<?php echo $adminDataUniqueId ?? ""; ?>" name="adminUniqueId">
                                                    <input type="hidden" value="<?php echo $adminFullName ?? ""; ?>" name="adminFullName">
                                                    <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">

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
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 changeAdminPassBtn" name="changeAdminPassBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Save</strong></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-account" && isset($_GET['uid']) && !empty($_GET['uid'])) { ?>
                                        <?php 
                                            $adminUniqueId = $_GET['uid']; 
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
                                            <h3 class="card-title"><i class="fa-solid fa-user-pen me-2"></i>Update Admin Profile (<?php echo $adminFullName ?? ""; ?>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <nav>
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item active">Update Profile</li>
                                                    <li class="breadcrumb-item"><a href="index.php?route=manage-accounts&action=edit-password&uid=<?php echo $adminDataUniqueId ?? ""; ?>">Set New Password</a></li>
                                                </ol>
                                            </nav>
                                            <form action="" method="post" class="update-admin-form">
                                                <div class="row g-2">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <input type="hidden" value="<?php echo $adminDataUniqueId ?? ""; ?>" name="adminUniqueId">
                                                    <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">
                                                    <div class="mt-4"><h5 class="form-title"><span>Admin Personal Information</span></h5></div>
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
                                                    <div class="mt-4"><h5 class="form-title"><span>Admin Contact Information</span></h5></div>
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
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 updateAdminAccount" name="updateAdminAccount"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit</strong></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-account") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-user-plus me-2"></i>Add Admin Account</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <form action="" method="post" class="add-admin-form">
                                                <div class="row g-2">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <div class="mt-4"><h5 class="form-title"><span>Admin Personal Information</span></h5></div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminFirstName" name="adminFirstName" placeholder="First Name">
                                                                <label for="adminFirstName">First Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminLastName" name="adminLastName" placeholder="Last Name">
                                                                <label for="adminLastName">Last Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminMiddle" name="adminMiddle" placeholder="M.I.">
                                                                <label for="adminMiddle">M.I.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-house p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminAddress" name="adminAddress" placeholder="Address">
                                                                <label for="adminAddress">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-5">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="adminBirthday" name="adminBirthday" placeholder="Birthday">
                                                                <label for="adminBirthday">Birthday</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-3">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminAge" name="adminAge" placeholder="Age">
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
                                                    <div class="mt-4"><h5 class="form-title"><span>Admin Contact Information</span></h5></div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminContactNo" name="adminContactNo" placeholder="Contact No.:">
                                                                <label for="adminContactNo">Contact No.:</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminEmail" name="adminEmail" placeholder="Email">
                                                                <label for="adminEmail">Email</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4"><h5 class="form-title"><span>Admin Set Username & Password</span></h5></div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="adminUsername" name="adminUsername" placeholder="Username">
                                                                <label for="adminUsername">Username</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                            <div class="form-floating adminPassword">
                                                                <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password">
                                                                <i class="fa-solid fa-eye"></i>
                                                                <label for="adminPassword">Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                            <div class="form-floating adminCPassword">
                                                                <input type="password" class="form-control" id="adminCPassword" name="adminCPassword" placeholder="Confirm Password">
                                                                <i class="fa-solid fa-eye"></i>
                                                                <label for="adminCPassword">Confirm Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 addAdminAccount" name="addAdminAccount"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit</strong></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "manage-accounts") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-users-gear me-2"></i>Manage Accounts</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="d-flex justify-content-start">
                                                <a class="btn btn-success btn-flat fw-bold mb-2" href="index.php?route=manage-accounts&action=add-account" role="button"><i class="fa-solid fa-user-plus fa-xl me-2"></i>Add New Admin</a>
                                            </div>

                                            <table id="accountsTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User Unique Id</th>
                                                        <th>Name</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div> 
                                        <?php $class->deleteAdminAccount(); ?>
                                        <form action="" method="post">
                                            <div class="modal fade" id="deleteQModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border border-danger border-4">
                                                        <div class="modal-header alert alert-danger d-flex align-items-center">
                                                            <i class="fa-solid fa-user-xmark fs-5 me-2"></i>
                                                            <strong>Delete Question</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="deleteUserUniqueId" id="deleteUserUniqueId">
                                                            <input type="hidden" id="deleteAdminFullName" value="<?php echo $adminFullName ?? ""; ?>" name="adminFullName">
                                                            <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">

                                                            <div class="text-center mb-2">
                                                                <h4>Are you sure you want to delete question: <strong><span id="deleteAdminAccount" class="text-danger"></span></strong>?</h4>
                                                            </div> 
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-flat d-flex align-items-center pe-3 px-3" name="deleteAABtn"><i class="fa-solid fa-circle-xmark me-2"></i><strong>Yes</strong></button>
                                                            <button type="button" class="btn btn-danger btn-flat d-flex align-items-center pe-3 px-3" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i><strong>No</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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

            <!-- Signin Function JS -->
            <script src="../partials/js/add-admin-account.js"></script>
            <script src="../partials/js/update-admin-profile.js"></script>
            <script src="../partials/js/update-admin-password.js"></script>

            <script>
                $(document).ready(function () {
                    // TODO Table First
                    var accountsTable = $('#accountsTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-admin-accounts.php',
                        "columns": [
                            {data: "userId"},
                            {data: "userUniqueId"},
                            {data: "userFullName"},
                            {data: "action"}
                        ],
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 1 ] 
                            }
                        ],
                    });

                    setInterval( function () {
                        accountsTable.ajax.reload( null, false );
                        $('[data-bs-toggle="tooltip"]').tooltip('hide');
                    }, 3000 );

                    accountsTable.on('click', '.deleteAABtn', function() {
                        $('#deleteQModal').modal('show');

                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        $('#deleteUserUniqueId').val(data[1]);   
                        $('#deleteAdminFullName').val(data[2]);
                        $('#deleteAdminAccount').text(data[2]);
                    });
                
                });
            </script>
        </div>

</body>
</html>
    