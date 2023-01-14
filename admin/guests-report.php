<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
            View Guest Personal Data
        <?php } else { ?>
            Guests Data Report
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
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                    <h1>View Guest Personal Data</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report") { ?>
                                    <h1>Guests Data Report</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=guests-report">Guests Data Report</a></li>
                                        <li class="breadcrumb-item active">View Guest Personal Data</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report") { ?>
                                        <li class="breadcrumb-item active">Guests Data Report</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                        <?php 
                                            $userUniqueId = $_GET['view']; 
                                            $guestDatas = $class->getGuestsGuestsDataReport($userUniqueId);
                                            
                                            if (!empty($guestDatas)) {
                                                foreach ($guestDatas as $guestData) {
                                                    $userUniqueId = $guestData['userUniqueId'];
                                                    $userFullName = $guestData['userFName'] . " " . $guestData['userMI'] . ". " . $guestData['userLName'];
                                                    $userType = $guestData['userType'];
                                                    $userAge = $guestData['userAge'];
                                                    $userGender = $guestData['userGender'];
                                                    $userAddress = $guestData['userAddress'];
                                                    $userContactNo = $guestData['userContact'];
                                                    $userUsername = $guestData['userUsername'];
                                                    $userEmail = $guestData['userEmail'];
                                                    $userBirthday = date('F d, Y', strtotime($guestData['userBDay']));
                                                    $userDateCreated = date('F d, Y', strtotime($guestData['userDateCreated']));
                                                   
                                                    
                                                }
                                            } else {
                                                echo "<script>
                                                    window.location.assign('index.php?route=404');
                                                </script>";
                                            }
                                        ?>

                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-address-book me-2"></i>Guest Data (<?php echo $userFullName; ?>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="mt-2"><h5 class="form-title"><span>Personal Information</span></h5></div>
                                            <table id="guestDataTable" class="table table-borderless d-none" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th class="bg-dark"><?php echo $userUniqueId; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="bg-secondary"><?php echo $userUniqueId; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row g-2 mb-4">
                                                <div class="col-md-6">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-user p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userFullName" value="<?php echo $userFullName ?? ""; ?>" placeholder="User Full Name" readonly>
                                                            <label for="userFullName">Full Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-arrow-up-1-9 p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userAge" value="<?php echo $userAge ?? ""; ?>" placeholder="User Age" readonly>
                                                            <label for="userAge">Age</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-venus-mars p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userGender" value="<?php echo $userGender ?? ""; ?>" placeholder="User Gender" readonly>
                                                            <label for="userGender">Gender</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-home p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userAddress" value="<?php echo $userAddress ?? ""; ?>" placeholder="User Address" readonly>
                                                            <label for="userAddress">Address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userContactNo" value="<?php echo $userContactNo ?? ""; ?>" placeholder="User Contact No.:" readonly>
                                                            <label for="userContactNo">Contact No.:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userBirthday" value="<?php echo $userBirthday ?? ""; ?>" placeholder="User Birthday" readonly>
                                                            <label for="userBirthday">Birthday</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userUsername" value="<?php echo $userUsername ?? ""; ?>" placeholder="User Username" readonly>
                                                            <label for="userUsername">Username</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-envelope p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userEmail" value="<?php echo $userEmail ?? ""; ?>" placeholder="User Email" readonly>
                                                            <label for="userEmail">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-user p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userType" value="<?php echo $userType ?? ""; ?>" placeholder="User Type" readonly>
                                                            <label for="userType">Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-calendar-days p-2"></i></span>
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="userDateCreated" value="<?php echo $userDateCreated ?? ""; ?>" placeholder="Sign Up Date" readonly>
                                                            <label for="userDateCreated">Sign Up Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "guests-report") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-person-walking me-2"></i>Guests Data</h3>
                                        </div>
                                        <div class="card-body overflow-auto">

                                            <table id="guestsDataTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
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
            <script>
                $(document).ready(function () { 
                    // TODO Table First
                    var guestsDataTable = $('#guestsDataTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-guests-data-report.php',
                        "columns": [
                            {data: "userId"},
                            {data: "userFullName"},
                            {data: "userDateCreated"},
                            {data: "actions"}
                        ],
                        dom:
                            "<'row'<'col-sm-12'B>>" + 
                            "<'row'<'col-sm-5'l><'col-sm-7'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                            buttons: [
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2 ]
                                },
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Guests Data Reports</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',
                                title: '',
                            },
                        ], 

                    });

                    setInterval( function () {
                        guestsDataTable.ajax.reload( null, false );
                    }, 3000 );

                    
                    $('#guestDataTable').DataTable( {
                        "ordering": false,
                        dom: 'B',
                        buttons: [
                        
                            {
                                extend: 'print',
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Guest Data (<?php echo $userFullName ?? ""; ?>)</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',

                                messageBottom: '<div class="row g-2 mb-1 mt-5 p-2"><div class="col-md-6"><h6 class="d-inline me-2">Name:</h6><p class="d-inline"><?php echo $userFullName ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Age:</h6><p class="d-inline"><?php echo $userAge ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Gender:</h6><p class="d-inline"><?php echo $userGender ?? ""; ?></p></div><div class="col-md-8"><h6 class="d-inline me-2">Address:</h6><p class="d-inline"><?php echo $userAddress ?? ""; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Contact No:</h6><p class="d-inline"><?php echo $userContactNo ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Birthday:</h6><p class="d-inline"><?php echo $userBirthday ?? ""; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Username:</h6><p class="d-inline"><?php echo $userUsername ?? ""; ?></p></div><div class="col-md-5"><h6 class="d-inline me-2">Email:</h6><p class="d-inline"><?php echo $userEmail ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Type:</h6><p class="d-inline"><?php echo $userType ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Sign Up Date:</h6><p class="d-inline"><?php echo $userDateCreated ?? ""; ?></p></div></div>',
                                title: '',
                            },
                        ],
                    } );
               

                });
            </script>
        </div>

</body>
</html>
    