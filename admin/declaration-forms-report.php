<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
            View Declaration Form
        <?php } else { ?>
            Declaration Forms Report
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
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                    <h1>View Declaration Form</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report") { ?>
                                    <h1>Declaration Forms Report</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=declaration-forms-report">Declaration Forms Report</a></li>
                                        <li class="breadcrumb-item active">View Declaration Form</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report") { ?>
                                        <li class="breadcrumb-item active">Declaration Forms Report</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                        <?php 
                                            $declarationUniqueId = $_GET['view']; 
                                            $getDFDatas = $class->getDeclarationForm($declarationUniqueId);
                                            
                                            if (!empty($getDFDatas)) {
                                                foreach ($getDFDatas as $getDFData) {
                                                    $viewDFUniqueId = $getDFData['declarationUniqueId'];
                                                    $viewDFUserType = $getDFData['userType'];
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

                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-newspaper me-2"></i>Declaration Form (<?php echo $viewUserFullName; ?>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="mt-2"><h5 class="form-title"><span>Personal Information</span></h5></div>
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
                                                <?php if ($viewDFUserType == "Patient") { ?>
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
                                                                <input type="text" class="form-control" id="userDFDate" value="<?php echo $viewDFDate?? ""; ?>" placeholder="Date" readonly>
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
                                            <div class="mt-5"><h5 class="form-title"><span>Health Declaration Form</span></h5></div>
                                            <div class="row p-2">
                                                <?php if (!empty($getDFDatas)) { $questionCounter = 1; ?>
                                                    <?php foreach (array_unique($questions) as $question) { ?>
                                                        <div class="col-md-8 bg-dark border d-flex align-items-center">
                                                            <span class="m-3"><?php echo $questionCounter ?? ""; ?>. <?php echo $question ?? ""; ?></span>
                                                        </div>
                                                        <div class="col-md-4 bg-secondary border">
                                                            <?php foreach ($getDFDatas as $getDFData) { ?>
                                                                <?php if ($question == $getDFData['questionText']) { ?>
                                                                    <?php if ($getDFData['questionType'] == 1) { ?>
                                                                        <div class="d-flex align-items-center mb-3 mt-3">
                                                                            <span class="mx-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span>
                                                                        </div>
                                                                    <?php } else { ?> 
                                                                        <div class="d-flex align-items-center h-100">
                                                                            <span class="m-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span>
                                                                        </div>
                                                                    <?php } ?> 
                                                                <?php } ?> 
                                                            <?php } ?> 
                                                        </div>
                                                    <?php $questionCounter++; } ?> 
                                                <?php } ?> 
                                            </div>
                                        </div>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-newspaper me-2"></i>Health Declaration Forms</h3>
                                        </div>
                                        <div class="card-body overflow-auto">

                                            <table id="healthDecReportTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Result</th>
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
                    var healthDecReportTable = $('#healthDecReportTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-health-declaration-forms-report.php',
                        "columns": [
                            {data: "declarationId"},
                            {data: "userFullName"},
                            {data: "userType"},
                            {data: "declarationResult"},
                            {data: "declarationDateCreated"},
                            {data: "actions"}
                        ],
                        "createdRow": (row, data) => {
                            if (data.declarationResult == "Positive") {
                                $('td:eq(3)', row).addClass("bg-success text-white");
                            } else {
                                $('td:eq(3)', row).addClass("bg-danger text-white");
                            }
                        },
                        "searchPanes": {
                            layout: 'columns-1'
                        },
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 1 ] 
                            },
                            {
                                searchPanes: {
                                    show: false
                                },
                                targets: [0, 1, 2, 4, 5]
                            }
                        ],
                        dom:
                            "<'row'<'col-sm-12'B>>" + 
                            "<'row'<'col-sm-12'P>>" + 
                            "<'row'<'col-sm-5'l><'col-sm-7'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                            buttons: [
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 ]
                                },
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Health Declaration Forms</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',
                                title: '',
                            },
                        ], 

                    });

                    setInterval( function () {
                        healthDecReportTable.ajax.reload( null, false );
                    }, 3000 );

                    
                    $('#healthDecInfos').DataTable( {
                        "ordering": false,
                        dom: 'B',
                        buttons: [
                        
                            {
                                extend: 'print',
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Health Declaration Form</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',

                                messageBottom: '<div class="row g-2 mb-1 mt-5 p-2"><?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "declaration-forms-report" && isset($_GET['view']) && !empty($_GET['view']) && $viewDFUserType == "Patient") { ?><div class="col-md-2"><h6 class="d-inline me-2">Result:</h6><p class="d-inline"><?php echo $viewDFUserResult ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Building:</h6><p class="d-inline"><?php echo $viewDFBuildingNo ?? "NA"; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Queue No.:</h6><p class="d-inline"><?php echo $viewDFQueueNo ?? "NA"; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"><?php echo $viewDFDate ?? ""; ?></p></div><?php } else { ?><div class="col-md-6"><h6 class="d-inline me-2">Result:</h6><p class="d-inline"><?php echo $viewDFUserResult ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"><?php echo $viewDFDate ?? ""; ?></p></div><?php } ?><div class="col-md-6"><h6 class="d-inline me-2">Name:</h6><p class="d-inline"><?php echo $viewUserFullName ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Age:</h6><p class="d-inline"><?php echo $viewUserAge ?? ""; ?></p></div><div class="col-md-3"><h6 class="d-inline me-2">Gender:</h6><p class="d-inline"><?php echo $viewUserGender ?? ""; ?></p></div><div class="col-md-8"><h6 class="d-inline me-2">Address:</h6><p class="d-inline"><?php echo $viewUserAddress ?? ""; ?></p></div><div class="col-md-4"><h6 class="d-inline me-2">Contact No:</h6><p class="d-inline"><?php echo $viewUserContactNo ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Comorbidity:</h6><p class="d-inline"><?php echo $viewDFUserComorbidity ?? ""; ?></p></div><div class="col-md-6"><h6 class="d-inline me-2">Temperature:</h6><p class="d-inline"><?php echo $viewDFUserTemp ?? ""; ?></p></div></div><div class="row p-2"><?php if (!empty($getDFDatas)) { $questionCounter = 1; ?><?php foreach (array_unique($questions) as $question) { ?><div class="col-md-8 border d-flex align-items-center"><span class="m-3"><?php echo $questionCounter ?? ""; ?>. <?php echo $question ?? ""; ?></span></div><div class="col-md-4 border"><?php foreach ($getDFDatas as $getDFData) { ?><?php if ($question == $getDFData['questionText']) { ?><?php if ($getDFData['questionType'] == 1) { ?><div class="d-flex align-items-center mb-3 mt-3"><span class="mx-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span></div><?php } else { ?> <div class="d-flex align-items-center h-100"><span class="m-3">• <?php echo $getDFData['choiceText'] ?? ""; ?></span></div><?php } ?><?php } ?><?php } ?></div><?php $questionCounter++; } ?><?php } ?></div>',
                                title: '',
                            },
                        ],
                    } );
               

                });
            </script>
        </div>

</body>
</html>
    