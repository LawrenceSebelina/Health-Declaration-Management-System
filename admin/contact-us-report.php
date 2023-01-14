<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Contact Us Report</title>
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
                                <h1>Contact Us</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Contact Us Report</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "contact-us-report") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-phone me-2"></i>Contact Us Report</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <table id="contactUsTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Contact Unique Id</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Message</th>
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
                    var contactUsTable = $('#contactUsTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-contact-us.php',
                        "columns": [
                            {data: "contactusId"},
                            {data: "contactusUniqueId"},
                            {data: "contactusFullName"},
                            {data: "contactusContact"},
                            {data: "contactusEmail"},
                            {data: "contactusMessage"},
                            {data: "contactusDateCreated"},
                            {data: "action"}
                        ],
                        "columnDefs": [
                            { 
                                className: "d-none", "targets": [ 1 ]
                            },
                            { 
                                className: "d-none", "targets": [ 7 ]
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
                                    columns: [ 2, 3, 4, 5 ]
                                },
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Health Declaration Forms</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',
                                title: '',
                            },
                        ],

                    });

                    setInterval( function () {
                        contactUsTable.ajax.reload( null, false );
                    }, 3000 );
                });
            </script>
        </div>

</body>
</html>
    