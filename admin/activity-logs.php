<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Activity Logs</title>
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
                                <h1>Activity Logs</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Activity Logs</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "activity-logs") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-address-book me-2"></i>Activity Logs</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <table id="activityLogsTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Activity Unique Id</th>
                                                        <th>Name</th>
                                                        <th>User Type</th>
                                                        <th>Activity</th>
                                                        <th>Date</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div> 
                                        <?php $class->deleteActivityLog(); ?>
                                        <form action="" method="post">
                                            <div class="modal fade" id="deleteALModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border border-danger border-4">
                                                        <div class="modal-header alert alert-danger d-flex align-items-center">
                                                            <i class="fa-solid fa-circle-question fs-5 me-2"></i>
                                                            <strong>Delete Question</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="deleteActivityUniqueId" id="deleteActivityUniqueId">
                                                            <input type="hidden" value="<?php echo $info['userUniqueId'] ?? ""; ?>" name="userUniqueId">
                                                            
                                                            <div class="text-center mb-2">
                                                                <h4>Are you sure you want to delete this activity of <strong><span id="deleteActivity" class="text-danger"></span></strong>?</h4>
                                                            </div> 
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-flat d-flex align-items-center pe-3 px-3" name="deleteALBtn"><i class="fa-solid fa-circle-xmark me-2"></i><strong>Yes</strong></button>
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

            <script>
                $(document).ready(function () { 
                    // TODO Table First
                    var activityLogsTable = $('#activityLogsTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-activity-logs.php',
                        "columns": [
                            {data: "activityId"},
                            {data: "activityUniqueId"},
                            {data: "activityFullName"},
                            {data: "activityUserType"},
                            {data: "activityDone"},
                            {data: "activityDateCreated"},
                            {data: "action"}
                        ],
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 1 ] 
                            }
                        ],

                    });

                    setInterval( function () {
                        activityLogsTable.ajax.reload( null, false );
                    }, 3000 );

                    activityLogsTable.on('click', '.deleteALBtn', function() {
                        $('#deleteALModal').modal('show');

                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        $('#deleteActivityUniqueId').val(data[1]);   
                        $('#deleteActivity').text(data[2]);
                    });
                });
            </script>
        </div>

</body>
</html>
    