<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Manage Building</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed"> <!-- sidebar-collapse layout-fixed -->
    <div class="wrapper">
        
        <?php require_once('../assets/components/admin/header.php'); ?>
        <?php require_once('../assets/components/admin/sidebar.php'); ?>
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Manage Building</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">Manage Building</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "buildings") { ?>
                                    
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-hospital me-2"></i>Manage Buildings</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="d-flex justify-content-start">
                                                <button type="button" class="btn btn-success btn-flat fw-bold mb-2" data-bs-toggle="modal" data-bs-target="#addBModal"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Building</button>
                                            </div>

                                            <table id="buildingsTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Building Unique Id</th>
                                                        <th>Building Name</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php $class->deleteBuilding(); ?>
                                        <form action="" method="post">
                                            <div class="modal fade" id="deleteBModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border border-danger border-4">
                                                        <div class="modal-header alert alert-danger d-flex align-items-center">
                                                            <i class="fa-solid fa-hospital fs-5 me-2"></i>
                                                            <strong>Delete Building</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="deleteBuildingUniqueId" id="deleteBuildingUniqueId">
                                                            <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? ""; ?>">
                                                            
                                                            <div class="text-center mb-2">
                                                                <h4>Are you sure you want to delete building: <strong><span id="deleteBuilding" class="text-danger"></span></strong>?</h4>
                                                            </div> 
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-flat d-flex align-items-center pe-3 px-3" name="deleteBBtn"><i class="fa-solid fa-circle-xmark me-2"></i><strong>Yes</strong></button>
                                                            <button type="button" class="btn btn-danger btn-flat d-flex align-items-center pe-3 px-3" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i><strong>No</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form action="" method="post" class="add-building-form">
                                            <div class="modal fade" id="addBModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border border-success border-4">
                                                        <div class="modal-header alert alert-success d-flex align-items-center">
                                                            <i class="fa-solid fa-hospital fs-5 me-2"></i>
                                                            <strong>Add New Building</strong>
                                                            <button type="reset" class="btn-close addBCloseIcon" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger alert-messages"></div>
                                                            <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? ""; ?>">
                                                            <div class="row g-2">
                                                                <div class="col-md-12">
                                                                    <div class="input-group">       
                                                                        <span class="input-group-text bg-success text-success"><i class="fa-solid fa-hospital p-2"></i></span>
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control" id="buildingName" name="buildingName" placeholder="Building Name:">
                                                                            <label for="buildingName">Building Name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row g-2" id="generateQRCode" style="display:none;">
                                                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                                        <div class="qr-code">
                                                                            <img src="" alt="qr-code" width="200" height="200">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <input type="hidden" class="qr-url" required>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-flat pe-3 px-3 generateQRBtn" name="generateQRBtn"><i class="fa-solid fa-qrcode me-2"></i><strong>Generate QR Code</strong></button>

                                                            <button type="submit" class="btn btn-primary btn-flat pe-3 px-3 addBBtn" name="addBBtn" style="display:none"><i class="fa-solid fa-qrcode me-2"></i><strong>Download QR Code</strong></button>

                                                            <button type="reset" class="btn btn-secondary btn-flat d-flex align-items-center pe-3 px-3 addBCloseBtn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i><strong>Close</strong></button>
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
            <!-- Building Function JS -->
            <script src="../partials/js/add-building.js"></script>

            <script>
                $(document).ready(function () {
                    // TODO Table First
                    var buildingsTable = $('#buildingsTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-buildings.php',
                        "columns": [
                            {data: "buildingNo"},
                            {data: "buildingUniqueId"},
                            {data: "buildingName"},
                            {data: "actions"}
                        ],
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 1 ] 
                            }
                            // {
                            //     target: 1,
                            //     visible: false,
                            //     searchable: false,
                            // },
                        ],

                    });

                    setInterval( function () {
                        buildingsTable.ajax.reload( null, false );
                    }, 3000 );

                    buildingsTable.on('click', '.deleteBBtn', function() {
                        $('#deleteBModal').modal('show');

                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        $('#deleteBuildingUniqueId').val(data[1]);   
                        $('#deleteBuilding').text(data[2]);
                    });
            
                });
            </script>
            
        </div>
        <!-- ./wrapper -->

</body>
</html>
    