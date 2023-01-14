<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        Health Declration Form Questionnaire
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
                                <h1>Health Declration Form Questionnaire</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Health Declration Form Questionnaire</li>
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
                                    
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "form-questionnaire-report") { ?> 
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-newspaper me-2"></i>Health Declration Form Questionnaire</h3>
                                        </div>
                                        <div class="card-body overflow-auto">

                                            <table id="healthDecFormRerpotTable" class="table table-borderless d-none" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th class="bg-dark">None</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="bg-secondary">None</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <h3 class="text-center text-black mb-3">Health Declaration Form</h3>
                                            <h6 class="text-black">Please place a check mark (✓) under your response. (Lagyan ng tsek (✓) sa angkop na sagot)</h6>
                                            <h6 class="text-black mb-3"><em>Reminder:</em> Please filled up all fields.</h6>

                                            <?php $questions = $class->getHealthDecQuestions(); ?>
                                            <?php if (!empty($questions)) { $questionCounter = 1; ?>
                                                <?php foreach ($questions as $question) { ?>
                                                    <div class="p-3">
                                                        <h6 class="text-black mb-3"><?php echo $questionCounter. ". " .$question['questionText'] ?? ""; ?></h6>

                                                            <?php 
                                                                $questionUniqueId = $question['questionUniqueId'];
                                                                $choices = $class->getHealthDecChoices($questionUniqueId); 
                                                            ?>
                                                        
                                                            <?php if ($question['questionType'] == 1) { ?>
                                                                <div class="vstack gap-1 px-5 text-black">
                                                                    <?php if (!empty($choices)) { ?>
                                                                        <?php foreach ($choices as $choice) { ?>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="answersQT1">
                                                                                <label class="form-check-label" for="answersQT1">
                                                                                    <?php echo $choice['choiceText'] ?? ""; ?>
                                                                                </label>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } else if ($question['questionType'] == 2) { ?>
                                                                <div class="d-flex justify-content-center">
                                                                    <?php if (!empty($choices)) { ?>
                                                                        <?php foreach ($choices as $choice) { ?>      
                                                                            <div class="text-center text-black d-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="answersQT2">
                                                                                    <label class="form-check-label" for="answersQT2"><?php echo $choice['choiceText'] ?? ""; ?></label>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>    
                                                    </div>
                                                <?php $questionCounter++; } ?>
                                            <?php } ?>
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
                    var healthDecTable = $('#healthDecTable').DataTable({
                        "ordering": false,
                        "ajax": '../partials/php/get-health-declaration-forms.php',
                        "columns": [
                            {data: "declarationId"},
                            {data: "userFullName"},
                            {data: "declarationDateCreated"},
                            {data: "action"}
                        ],

                    });

                    setInterval( function () {
                        healthDecTable.ajax.reload( null, false );
                    }, 3000 );

                    
                    $('#healthDecFormRerpotTable').DataTable( {
                        "ordering": false,
                        dom: 'B',
                        buttons: [
                        
                            {
                                extend: 'print',
                                className: 'btn btn-success btn-flat btn-lg mb-3',
                                text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                                messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>University of Perpertual Help Medical Center - Biñan</strong><br><h6>National Hi-way Biñan Laguna</h6><h6>☏ (632) 8779-5310 / (6349) 544-5150</h6><h6>✉ hospital@phmcb.com</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Health Declaration Form</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $info['userFName'] . " " . $info['userLName'] ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',

                                messageBottom: '<div class="row g-2 mb-1 mt-5 p-2"><div class="col-md-3"><h6 class="d-inline me-2">Building:</h6><p class="d-inline">MAB-</p></div><div class="col-md-3"><h6 class="d-inline me-2">Queue No.:</h6><p class="d-inline"></p></div><div class="col-md-6"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"></p></div<div class="col-md-12"><h6 class="d-inline me-2">Date:</h6><p class="d-inline"></p></div><div class="col-md-6"><h6 class="d-inline me-2">Name:</h6><p class="d-inline"></p></div><div class="col-md-3"><h6 class="d-inline me-2">Age:</h6><p class="d-inline"></p></div><div class="col-md-3"><h6 class="d-inline me-2">Gender:</h6><p class="d-inline"></p></div><div class="col-md-8"><h6 class="d-inline me-2">Address:</h6><p class="d-inline"</p></div><div class="col-md-4"><h6 class="d-inline me-2">Contact No:</h6><p class="d-inline"></p></div><div class="col-md-6"><h6 class="d-inline me-2">Comorbidity:</h6><p class="d-inline"></p></div><div class="col-md-6"><h6 class="d-inline me-2">Temperature:</h6><p class="d-inline"></p></div></div><div class="row p-2 mt-5"><h6 class="text-black">Please place a check mark (✓) under your response. (Lagyan ng tsek (✓) sa angkop na sagot)</h6><h6 class="text-black mb-3"><em>Reminder:</em> Please filled up all fields.</h6><?php if (!empty($questions)) { $questionCounter = 1; ?><?php foreach ($questions as $question) { ?><div class="p-3"><h6 class="text-black mb-3"><?php echo $questionCounter. ". " .$question['questionText'] ?? ""; ?></h6><?php $questionUniqueId = $question['questionUniqueId']; $choices = $class->getHealthDecChoices($questionUniqueId); ?><?php if ($question['questionType'] == 1) { ?><div class="vstack gap-1 px-5 text-black"><?php if (!empty($choices)) { ?><?php foreach ($choices as $choice) { ?><div class="form-check"><input class="form-check-input" type="checkbox" id="answersQT1"><label class="form-check-label" for="answersQT1"><?php echo $choice['choiceText'] ?? ""; ?></label></div><?php } ?><?php } ?></div><?php } else if ($question['questionType'] == 2) { ?><div class="d-flex justify-content-center"><?php if (!empty($choices)) { ?><?php foreach ($choices as $choice) { ?><div class="text-center text-black d-inline"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="answersQT2"><label class="form-check-label" for="answersQT2"><?php echo $choice['choiceText'] ?? ""; ?></label></div></div><?php } ?><?php } ?></div><?php } ?></div><?php $questionCounter++; } ?><?php } ?></div>',
                                title: '',
                            },
                        ],
                    } );
               

                });
            </script>
        </div>

</body>
</html>
    