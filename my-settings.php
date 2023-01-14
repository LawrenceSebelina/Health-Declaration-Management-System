<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body>
    <?php require_once('assets/components/header.php'); ?>
    <?php 
        if (empty($info)) { 
            header ("location: index.php");
        }
    ?>
    <section id="main-content">
        <main>
            <div class="container">
                <div class="bg-white p-3">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.php?route=my-home">My Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </nav>
                    <h2 class="text-center text-black text-uppercase mb-3">
                        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "my-hdf") { ?>
                            My Health Declaration Form<hr>
                        <?php } else { ?>
                            Settings<hr>
                        <?php } ?>
                    </h2>

                    <div class="p-2">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb d-flex align-items-center">
                                <li class="fs-5 fw-bold me-3">Settings Menu: </li>
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "my-hdf" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings">Update Profile</a></li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=change-password">Change Password</a></li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=my-hdf">My Health Declaration Forms</a></li>
                                    <li class="breadcrumb-item active">My Health Declaration Form</li>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "my-hdf") { ?>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings">Update Profile</a></li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=change-password">Change Password</a></li>
                                    <li class="breadcrumb-item active">My Health Declaration Forms</li>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings">Update Profile</a></li>
                                    <li class="breadcrumb-item active">Change Password</li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=my-hdf">My Health Declaration Forms</a></li>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings") { ?>
                                    <li class="breadcrumb-item active">Update Profile</li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=change-password">Change Password</a></li>
                                    <li class="breadcrumb-item"><a href="index.php?route=my-settings&action=my-hdf">My Health Declaration Forms</a></li>
                                <?php } ?>
                            </ol>
                        </nav>
                    </div>
                
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "my-hdf" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                    <div class="card-header bg-dark">
                                        <span class="card-title text-white">
                                            <i class="fa-solid fa-newspaper me-2"></i>My Health Declaration Form
                                        </span>
                                    </div>
                                    <div class="card-body bg-success overflow-auto">
                                        <?php 
                                            $declarationUniqueId = $_GET['view']; 
                                            $getDFDatas = $class->getDeclarationForm($declarationUniqueId);
                                            
                                            if (!empty($getDFDatas)) {
                                                foreach ($getDFDatas as $getDFData) {
                                                    $viewDFUniqueId = $getDFData['declarationUniqueId'];
                                                    $viewDFBuildingNo = $getDFData['queueBuilding'];
                                                    $viewDFQueueNo = $getDFData['queueNo'];
                                                    $viewDFDate = date('F d, Y | h:i a', strtotime($getDFData['declarationDateCreated']));
                                                    $viewUserFullName = $getDFData['userFName'] . " " . $getDFData['userMI'] . ". " . $getDFData['userLName'];
                                                    $viewUserAge = $getDFData['userAge'];
                                                    $viewUserGender = $getDFData['userGender'];
                                                    $viewUserAddress = $getDFData['userAddress'];
                                                    $viewUserContactNo = $getDFData['userContact'];
                                                    $viewDFUserComorbidity = $getDFData['userComorbidity'];
                                                    $viewDFUserTemp = $getDFData['userTemperature'];
                                                    $viewDFUserResult = $getDFData['declarationResult'];
                                                    $questionUniqueId[] = $getDFData['questionUniqueId'];
                                                    $questions[] = $getDFData['questionText'];
                                                }
                                            } else {
                                                echo "<script>
                                                    window.location.assign('index.php?route=404');
                                                </script>";
                                            }
                                        ?>
                                        <div class="mt-2"><h5 class="form-title"><span class="bg-success text-white">Personal Information</span></h5></div>
                                        <table id="healthDecInfos" class="table table-borderless d-none" style="width:100%">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th class="bg-dark"><?php echo $viewDFUniqueId; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="bg-secondary"><?php echo $viewDFUniqueId; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row g-2 mb-4">
                                            <?php if ($info['userType'] == "Patient") { ?>
                                                <div class="col-md-2">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-clipboard-list p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="viewDFUserResult" value="<?php echo $viewDFUserResult ?? ""; ?>" placeholder="Result:" readonly>
                                                                <label for="viewDFUserResult">Result:</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-hospital p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userDFBuilding" value="<?php echo $viewDFBuildingNo ?? "NA"; ?>" placeholder="Date" readonly>
                                                            <label for="userDFBuilding">Building</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-arrow-up-9-1 p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userDFQueueNo" value="<?php echo $viewDFQueueNo ?? "NA"; ?>" placeholder="Queue No.:" readonly>
                                                            <label for="userDFQueueNo">Queue No.:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userDFDate" value="<?php echo $viewDFDate ?? ""; ?>" placeholder="Date" readonly>
                                                            <label for="userDFDate">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-md-6">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-clipboard-list p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="viewDFUserResult" value="<?php echo $viewDFUserResult?? ""; ?>" placeholder="Result:" readonly>
                                                            <label for="viewDFUserResult">Result:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userDFDate" value="<?php echo $viewDFDate ?? ""; ?>" placeholder="Date" readonly>
                                                            <label for="userDFDate">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-user p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userFullName" value="<?php echo $viewUserFullName ?? ""; ?>" placeholder="User Full Name" readonly>
                                                        <label for="userFullName">Full Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userAge" value="<?php echo $viewUserAge ?? ""; ?>" placeholder="User Age" readonly>
                                                        <label for="userAge">Age</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-venus-mars p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userGender" value="<?php echo $viewUserGender ?? ""; ?>" placeholder="User Gender" readonly>
                                                        <label for="userGender">Gender</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-home p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userAddress" value="<?php echo $viewUserAddress ?? ""; ?>" placeholder="User Address" readonly>
                                                        <label for="userAddress">Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userContactNo" value="<?php echo $viewUserContactNo ?? ""; ?>" placeholder="User Contact No.:" readonly>
                                                        <label for="userContactNo">Contact No.:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-thermometer p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userComorbidity" value="<?php echo $viewDFUserComorbidity ?? ""; ?>" placeholder="User Comorbidity" readonly>
                                                        <label for="userComorbidity">Comorbidity</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">       
                                                    <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-thermometer p-2"></i></span>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="userTemperature" value="<?php echo $viewDFUserTemp ?? ""; ?>" placeholder="User Temperature" readonly>
                                                        <label for="userTemperature">Temperature</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"><h5 class="form-title"><span class="bg-success text-white">Health Declaration Form</span></h5></div>
                                        <div class="row p-2">
                                            <?php if (!empty($getDFDatas)) { $questionCounter = 1; ?>
                                                <?php foreach (array_unique($questions) as $question) { ?>
                                                    <div class="col-md-8 bg-dark border d-flex align-items-center">
                                                        <span class="m-3 text-white"><?php echo $questionCounter ?? ""; ?>. <?php echo $question ?? ""; ?></span>
                                                    </div>
                                                    <div class="col-md-4 bg-secondary border">
                                                        <?php foreach ($getDFDatas as $getDFData) { ?>
                                                            <?php if ($question == $getDFData['questionText']) { ?>
                                                                <?php if ($getDFData['questionType'] == 1) { ?>
                                                                    <div class="d-flex align-items-center mb-3 mt-3">
                                                                        <span class="mx-3 text-white">• <?php echo $getDFData['choiceText'] ?? ""; ?></span>
                                                                    </div>
                                                                <?php } else { ?> 
                                                                    <div class="d-flex align-items-center h-100">
                                                                        <span class="m-3 text-white">• <?php echo $getDFData['choiceText'] ?? ""; ?></span>
                                                                    </div>
                                                                <?php } ?> 
                                                            <?php } ?> 
                                                        <?php } ?> 
                                                    </div>
                                                <?php $questionCounter++; } ?> 
                                            <?php } ?> 
                                        </div>
                                    </div>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "my-hdf") { ?>
                                    <div class="card-header bg-dark">
                                        <span class="card-title text-white">
                                            <i class="fa-solid fa-newspaper me-2"></i>My Health Declaration Forms
                                        </span>
                                    </div>
                                    <div class="card-body bg-success bg-opacity-50 overflow-auto">
                                        <table id="healthDecTable" class="table table-bordered" style="width:100%">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Result</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "change-password") { ?>
                                    <div class="card-header bg-dark">
                                        <span class="card-title text-white">
                                            <i class="fa-solid fa-cog me-2"></i>Change Password
                                        </span>
                                    </div>
                                    <div class="card-body bg-success overflow-auto">
                                        <form action="" method="post" class="change-password-form">
                                            <div class="row g-2 pe-5 px-5 mt-2">
                                                <div class="alert alert-danger alert-messages"></div>
                                                <div class="mt-4"><h3 class="form-title"><span class="bg-success text-white">Change Password</span></h3></div>
                                                <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">
                                                <input type="hidden" value="<?php echo $info['userPassword'] ?? ""; ?>" name="userCurrentPass">
                                                <div class="col-md-12 mb-1">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                        <div class="form-floating userCurPassword">
                                                            <input type="password" class="form-control" id="userCurPassword" name="userCurPassword" placeholder="Password" required>
                                                            <i class="fa-solid fa-eye"></i>
                                                            <label for="userCurPassword">Current Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                        <div class="form-floating userPassword">
                                                            <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                            <i class="fa-solid fa-eye"></i>
                                                            <label for="userPassword">New Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                                        <div class="form-floating userCPassword">
                                                            <input type="password" class="form-control" id="userCPassword" name="userCPassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                            <i class="fa-solid fa-eye"></i>
                                                            <label for="userCPassword">Confirm New Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 changePassInfoBtn" name="changePassInfoBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Save</strong></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "my-settings") { ?>
                                    <div class="card-header bg-dark">
                                        <span class="card-title text-white">
                                            <i class="fa-solid fa-user me-2"></i>Update Profile
                                        </span>
                                    </div>
                                    <div class="card-body bg-success overflow-auto">
                                        <form action="" method="post" class="update-profile-form">
                                            <div class="row g-2 pe-4 px-4 mt-2">
                                                <div class="alert alert-danger alert-messages"></div>
                                                <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Personal Information</span></h5></div>
                                                <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">
                                                <div class="col-md-12 col-xl-5">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserFName" name="updateUserFName" placeholder="First Name" value="<?php echo $info['userFName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers">
                                                            <label for="updateUserFName">First Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-5">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserLName" name="updateUserLName" placeholder="Last Name" value="<?php echo $info['userLName'] ?? ""; ?>" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers">
                                                            <label for="updateUserLName">Last Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-2">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserMI" name="updateUserMI" placeholder="M.I." value="<?php echo $info['userMI'] ?? ""; ?>" pattern="[a-zA-Z-ñ\s]{1}" title="Must contain one letter">
                                                            <label for="updateUserMI">M.I.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-house p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserAddress" name="updateUserAddress" placeholder="Address" value="<?php echo $info['userAddress'] ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())">
                                                            <label for="updateUserAddress">Address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-5">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" max="<?= date('Y-m-d'); ?>" id="updateUserBDay" name="updateUserBDay" placeholder="Birthday" value="<?php echo date('Y-m-d', strtotime($info['userBDay'])) ?? ""; ?>">
                                                            <label for="updateUserBDay">Birthday</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserAge" name="updateUserAge" placeholder="Age" value="<?php echo $info['userAge'] ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                                            <label for="updateUserAge">Age</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-4 mb-2">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-venus-mars p-2"></i></span>
                                                        <div class="form-floating">
                                                            <select class="form-select" style="height: 3.6rem;" id="updateUserGender" name="updateUserGender">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                            <label for="updateUserGender">Gender</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Contact Information</span></h5></div>
                                                <div class="col-md-12">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateContactNo" name="updateContactNo" placeholder="Contact No.:" value="<?php echo $info['userContact'] ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                                            <label for="updateContactNo">Contact No.:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="updateUserEmail" name="updateUserEmail" placeholder="Email" value="<?php echo $info['userEmail'] ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)">
                                                            <label for="updateUserEmail">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 updateUserInfoBtn" name="updateUserInfoBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Save</strong></button>
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
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>
    
    <!-- My Settigns Function JS -->
    <script src="partials/js/user-update-profile.js"></script>
    <script src="partials/js/user-change-password.js"></script>

    <script>
        $(document).ready(function () { 
            // TODO Table First
            var healthDecTable = $('#healthDecTable').DataTable({
                "ordering": false,
                "ajax": 'partials/php/get-my-health-declaration-forms.php',
                "columns": [
                    {data: "declarationId"},
                    {data: "userFullName"},
                    {data: "declarationResult"},
                    {data: "declarationDateCreated"},
                    {data: "action"}
                ],
                "searchPanes": {
                    layout: 'columns-1'
                },
                "dom": 'Plfrtip',
                "columnDefs": [
                    {
                        searchPanes: {
                            show: false
                        },
                        targets: [0, 1, 3, 4]
                    }
                ],
                "createdRow": (row, data) => {
                    if (data.declarationResult == "Positive") {
                        $('td:eq(2)', row).addClass("bg-success text-white");
                    } else {
                        $('td:eq(2)', row).addClass("bg-danger text-white");
                    }
                },

            });

            setInterval( function () {
                healthDecTable.ajax.reload( null, false );
            }, 3000 );

            
            $('#healthDecInfos').DataTable( {
                "ordering": false,
                dom: 'B',
                buttons: [
                
                    {
                        extend: 'print',
                        className: 'btn btn-warning btn-flat btn-lg mb-3',
                        text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                        messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Declaration Form</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',

                        messageBottom: '<div class="row g-2 mb-1 mt-5 p-2"><?php if ($info['userType'] == "Patient") { ?><div class="col-md-2"><h6 class="d-inline me-2">Result:</h6><p class="d-inline"><?php echo $viewDFUserResult ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Building:</h6><p class="d-inline"><?php echo $viewDFBuildingNo ?? "NA"; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Queue No.:</h6><p class="d-inline"><?php echo $viewDFQueueNo ?? "NA"; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"><?php echo $viewDFDate ?? ""; ?></p></div><?php } else { ?><div class="col-md-6"><h6 class="d-inline me-2">Result:</h6><p class="d-inline"><?php echo $viewDFUserResult ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"><?php echo $viewDFDate ?? ""; ?></p></div><?php } ?><div class="col-md-6"><h6 class="d-inline me-2">Name:</h6><p class="d-inline"><?php echo $viewUserFullName ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Age:</h6><p class="d-inline"><?php echo $viewUserAge ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Gender:</h6><p class="d-inline"><?php echo $viewUserGender ?? ""; ?></p></div><div class="col-md-8"><h6 class="d-inline me-2">Address:</h6><p class="d-inline"><?php echo $viewUserAddress ?? ""; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Contact No:</h6><p class="d-inline"><?php echo $viewUserContactNo ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Comorbidity:</h6><p class="d-inline"><?php echo $viewDFUserComorbidity ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Temperature:</h6><p class="d-inline"><?php echo $viewDFUserTemp ?? ""; ?></p></div></div><div class="row p-2"><?php if (!empty($getDFDatas)) { $questionCounter = 1; ?><?php foreach (array_unique($questions) as $question) { ?><div class="col-md-8 border d-flex align-items-center"><span class="m-3"><?php echo $questionCounter ?? ""; ?>. <?php echo $question ?? ""; ?></span></div><div class="col-md-4 border"><?php foreach ($getDFDatas as $getDFData) { ?><?php if ($question == $getDFData['questionText']) { ?><?php if ($getDFData['questionType'] == 1) { ?><div class="d-flex align-items-center mb-3 mt-3"><span class="mx-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span></div><?php } else { ?> <div class="d-flex align-items-center h-100"><span class="m-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span></div><?php } ?><?php } ?><?php } ?></div><?php $questionCounter++; } ?><?php } ?></div>',
                        title: '',
                    },
                ],
            } );
        

        });
    </script>
</body>
</html>