<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Monitor Queues</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed">
    <div class="wrapper">
        
        <?php require_once('../assets/components/admin/header.php'); ?>
        <?php require_once('../assets/components/admin/sidebar.php'); ?>
        <?php 
            if (isset($_GET['buid']) && !empty($_GET['buid'])) {
                $buildingUniqueId = $_GET['buid'];
            }
        ?>

        <input type="hidden" value="<?php echo $buildingUniqueId ?? "" ?>" id="buildingUniqueId">
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                    <h1>View Declaration Form</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues") { ?>
                                    <h1>Monitor Queues (<span id="selectedBuildingName"></span>)</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
                                        <li class="breadcrumb-item active"><a href="index.php?route=queues&buid=<?php echo $_GET['vbuid'] ?>">Monitor Queues (<?php echo $_GET['bn'] ?>)</a></li>
                                        <li class="breadcrumb-item">View Declaration Form</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues") { ?>
                                        <li class="breadcrumb-item">Monitor Queues (<span id="selectedBuildingName"></span>)</li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>

                        <?php if (isset($_GET['buid']) && !empty($_GET['buid'])) {  ?>
                            <div class="mt-4"><h5 class="form-title"><span class="bg-light text-white">Select Building</span></h5></div>
                            <div class="input-group mb-3">       
                                <span class="input-group-text bg-success text-white"><i class="fa-solid fa-hospital p-2"></i></span>
                                <div class="form-floating">
                                    <select class="form-select" style="height: 3.6rem;" id="userBuilding" name="userBuilding" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <!-- <option value="">Select...</option> -->
                                        <?php if (!empty($buildings)) { ?>
                                            <?php foreach ($buildings as $building) { ?>
                                                <?php if ($buildingUniqueId == $building['buildingUniqueId']) { ?>
                                                    <option selected><?php echo $building['buildingName'] ?? "";  ?></option>
                                                <?php } else { ?>  
                                                    <option value="<?php echo "index?route=queues&buid=".$building['buildingUniqueId'] ?? "";  ?>"><?php echo $building['buildingName'] ?? "";  ?></option>
                                                    <!-- <option value="2">MAB-1/ Building 2</option> -->
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <label for="userBuilding">Select Building</label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </section>
                
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues" && isset($_GET['view']) && !empty($_GET['view'])) { ?>
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
                                            <h3 class="card-title"><i class="fa-solid fa-newspaper me-2"></i>Health Declaration Form (<?php echo $viewUserFullName; ?>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="mt-2"><h5 class="form-title"><span>Personal Information</span></h5></div>
                                            <div class="row g-2 mb-4">
                                                <?php if ($viewDFUserType == "Patient") { ?>
                                                    <div class="col-md-3">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-hospital p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="userDFBuilding" value="<?php echo $viewDFBuildingNo ?? ""; ?>" placeholder="Date" readonly>
                                                                <label for="userDFBuilding">Building</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group">       
                                                            <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-arrow-up-9-1 p-2"></i></span>
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="userDFQueueNo" value="<?php echo $viewDFQueueNo?? ""; ?>" placeholder="Queue No.:" readonly>
                                                                <label for="userDFQueueNo">Queue No.:</label>
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
                                                <?php } else { ?>
                                                    <div class="col-md-12">
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
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-hospital me-2"></i> 
                                                <span id="selectedBuildingName"></span>
                                            </h3>
                                        </div>
                                        <div class="card-body overflow-auto">

                                            <table id="queuesTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Queue No.</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th class="text-center">Action</th>
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
                    const buildingUniqueId = $('#buildingUniqueId').val(); 
                    const buildingName = $('#userBuilding').find(":selected").text();
                    $('span[id="selectedBuildingName"]').text(buildingName);

                    var queuesTable = $('#queuesTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-queues.php?buid='+buildingUniqueId,
                        "columns": [
                            {data: "declarationId"},
                            {data: "userFullName"},
                            {data: "declarationDateCreated"},
                            {data: "action"}
                        ],

                    });

                    setInterval( function () {
                        queuesTable.ajax.reload( null, false );
                    }, 3000 );
                });
            </script>
        </div>

</body>
</html>
    