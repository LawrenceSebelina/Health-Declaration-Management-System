<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Home</title>
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
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
                                    <h1>Manage Form (Edit Question)</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>
                                    <h1>Manage Form (Add Question)</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form") { ?>
                                    <h1>Manage Form</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=form">Manage Form</a></li>
                                        <li class="breadcrumb-item active">Edit Question</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>
                                        <li class="breadcrumb-item"><a href="index.php?route=form">Manage Form</a></li>
                                        <li class="breadcrumb-item active">Add Question</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form") { ?>
                                        <li class="breadcrumb-item active">Manage Form</li>
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
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title"><i class="fa-solid fa-circle-question me-2"></i>New Question</h3>
                                    </div>
                                    <div class="card-body overflow-auto">
                                        asdas
                                    </div> 
                                </div>      
                            </div>
                        </div>  
                    </div>
                </section>
            </div>
            
            <?php require_once('../assets/components/admin/footer.php'); ?>
        </div>

</body>
</html>
    