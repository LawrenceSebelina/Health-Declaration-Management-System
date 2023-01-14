<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>MAB-2 Report</title>
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
                                <h1>Queues Report (<span id="selectedBuildingName"></span>)</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Queues Report (<span id="selectedBuildingName"></span>)</li>
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
                                                    <option value="<?php echo "index?route=queues-report&buid=".$building['buildingUniqueId'] ?? "";  ?>"><?php echo $building['buildingName'] ?? "";  ?></option>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "queues-report") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-newspaper me-2"></i>Monitor Queues (<span id="selectedBuildingName"></span>)</h3>
                                        </div>
                                        <div class="card-body overflow-auto">

                                            <table id="queuesReportsTable" class="table table-bordered" style="width:100%">
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
                    
                    var queuesReportsTable = $('#queuesReportsTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-queues.php?buid='+buildingUniqueId,
                        "columns": [
                            {data: "declarationId"},
                            {data: "userFullName"},
                            {data: "declarationDateCreated"},
                            {data: "action"}
                        ],
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 3 ]  
                            }
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
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Health Declaration Forms</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',
                                title: '',
                            },
                        ],

                    });

                    setInterval( function () {
                        healthDecTable.ajax.reload( null, false );
                    }, 3000 );
                });
            </script>
        </div>

</body>
</html>
    