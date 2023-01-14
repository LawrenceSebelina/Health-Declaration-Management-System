<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>
        <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
            Manage Form (Edit Question)
        <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>
            Manage Form (Add Question)
        <?php } else { ?>
            Manage Form
        <?php } ?>
    </title>
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
                                <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
                                    <h1>Manage Form (Edit Question)</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>
                                    <h1>Manage Form (Add Question)</h1>
                                <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions") { ?>
                                    <h1>Manage Form</h1>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
                                        <li class="breadcrumb-item active"><a href="index.php?route=questions">Manage Form</a></li>
                                        <li class="breadcrumb-item">Edit Question</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>
                                        <li class="breadcrumb-item active"><a href="index.php?route=questions">Manage Form</a></li>
                                        <li class="breadcrumb-item">Add Question</li>
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions") { ?>
                                        <li class="breadcrumb-item">Manage Form</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "edit-question" && isset($_GET['qid']) && !empty($_GET['qid'])) { ?>
                                        <?php 
                                            $questionUniqueId = $_GET['qid']; 
                                            $editQDatas = $class->getQuestionsEdit($questionUniqueId);

                                            if (!empty($editQDatas)) {
                                                foreach ($editQDatas as $editQData) {
                                                    $editQuestionUniqueId = $editQData['questionUniqueId'];
                                                    $editQuestion = $editQData['questionText'];
                                                }
                                            } else {
                                                echo "<script>
                                                    window.location.assign('index.php?route=404');
                                                </script>";
                                            }
                                        ?>
                                        
                                            <div class="card-header bg-dark">
                                                <h3 class="card-title"><i class="fa-solid fa-circle-question me-2"></i>Edit Question</h3>
                                            </div>
                                            <div class="card-body overflow-auto">
                                                <form action="" method="post" class="edit-question-form">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <div><h5 class="form-title"><span>Question</span></h5></div>
                                                    <input type="hidden" name="editQuestionUniqueId" value="<?php echo $editQuestionUniqueId ?? ""; ?>">
                                                    <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? ""; ?>">
                                                    <div class="input-group d-flex justify-content-center mb-5">
                                                        <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                                                        <div class="form-floating">
                                                            <textarea name="editQuestion" class="form-control" placeholder="Question" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required><?php echo $editQuestion ?? ""; ?></textarea>
                                                            <label for="editQuestion">Question</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div><h5 class="form-title"><span>Choices</span></h5></div>
                                                    <?php if (!empty($editQDatas)) { ?>
                                                        <?php foreach ($editQDatas as $editQData) { ?>
                                                            <input type="hidden" name="editChoicesId[]" value="<?php echo $editQData['choiceId'] ?? ""; ?>">
                                                            <div class="input-group d-flex justify-content-center mb-2">
                                                                <span class="input-group-text bg-success bg-opacity-25">
                                                                    <!-- <i class="fa-solid fa-list-check fa-fw fs-4"></i> -->
                                                                    <span class="fa-fw fs-4"><?php echo $editQData['choiceNum'] ?? ""; ?></span>
                                                                </span>
                                                                <div class="form-floating">
                                                                    <?php if ($editQData['questionType'] == 1) { ?>
                                                                        <textarea name="editChoices[]" class="form-control" placeholder="Choice" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required><?php echo $editQData['choiceText'] ?? ""; ?></textarea>
                                                                    <?php } else { ?>
                                                                        <textarea name="editChoices[]" class="form-control" placeholder="Choice" readonly><?php echo $editQData['choiceText'] ?? ""; ?></textarea>
                                                                    <?php } ?>
                                                                    <label for="choice">Choice</label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-end mt-4">
                                                        <button type="submit" class="btn btn-primary btn-flat w-25 editQBtn" name="editQBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Save</strong></button>
                                                    </div>
                                                </form>
                                            </div>
                                        
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-question") { ?>

                                        <?php if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "d60ecb9edcdfd8ab0222ddd158bbbdc3" || $_GET['type'] == "c310d750ebfc431206b6585aafbbb56f") { ?>
                                        
                                            <div class="card-header bg-dark">
                                                <h3 class="card-title"><i class="fa-solid fa-circle-question me-2"></i>New Question</h3>
                                            </div>
                                            <div class="card-body overflow-auto">
                                                <form action="" method="post" class="add-question-form">
                                                    <div class="alert alert-danger alert-messages"></div>
                                                    <div><h5 class="form-title"><span>Question</span></h5></div>
                                                    <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? ""; ?>">
                                                    <div class="input-group d-flex justify-content-center mb-5">
                                                        <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-circle-question fa-fw fs-4"></i></span>
                                                        <div class="form-floating">
                                                            <textarea name="question" class="form-control" placeholder="Question" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required></textarea>
                                                            <label for="question">Question</label>
                                                        </div>
                                                    </div>
                                                    <div><h5 class="form-title"><span>Choices</span></h5></div>
                                                    <?php if ($_GET['type'] == "d60ecb9edcdfd8ab0222ddd158bbbdc3") { ?>
                                                        <input type="hidden" name="questionType" value="d60ecb9edcdfd8ab0222ddd158bbbdc3">
                                                        <div class="d-flex justify-content-start">
                                                            <button type="button" class="btn btn-success btn-flat fw-bold mb-2" id="addRow"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Choice</button>
                                                        </div>
                                                        <table id="choicesTable" class="display table table-bordered" style="width:100%">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th></th>
                                                                    <th class="w-100">Choices Description</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>  
                                                        </table>
                                                    <?php } else if ($_GET['type'] == "c310d750ebfc431206b6585aafbbb56f") { ?>
                                                        <input type="hidden" name="questionType" value="c310d750ebfc431206b6585aafbbb56f">
                                                        <div class="input-group d-flex justify-content-center mb-2">
                                                            <span class="input-group-text bg-success bg-opacity-25">
                                                                <i class="fa-solid fa-list-check fa-fw fs-4"></i>
                                                            </span>
                                                            <div class="form-floating">
                                                                <input type="text" name="choices[]" class="form-control" placeholder="Choice" value="Yes" readonly>
                                                                <label for="choice">Choice</label>
                                                            </div>
                                                            <div class="form-floating">
                                                                <input type="text" name="choices[]" class="form-control" placeholder="Choice" value="No" readonly>
                                                                <label for="choice">Choice</label>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-end mt-2">
                                                        <button type="submit" class="btn btn-primary btn-flat submitNewQBtn" name="submitNewQBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit New Question</strong></button>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php } else { 
                                            echo "<script>
                                                window.location.assign('index.php?route=questions');
                                            </script>";
                                        } ?>
                                    
                                    <?php } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "questions") { ?>
                                    
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-circle-question me-2"></i>Manage Questions</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <div class="d-flex justify-content-start">
                                                <!-- <a class="btn btn-success btn-flat fw-bold mb-2" href="index.php?route=questions&action=add-question" role="button"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Question</a> -->

                                                <button type="button" class="btn btn-success btn-flat fw-bold mb-2" data-bs-toggle="modal" data-bs-target="#addQModal"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Question</button>
                                            </div>

                                            <table id="questionsTable" class="table table-bordered" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Question Unique Id</th>
                                                        <th>Question</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php $class->deleteQuestion(); ?>
                                        <form action="" method="post">
                                            <div class="modal fade" id="deleteQModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border border-danger border-4">
                                                        <div class="modal-header alert alert-danger d-flex align-items-center">
                                                            <i class="fa-solid fa-circle-question fs-5 me-2"></i>
                                                            <strong>Delete Question</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="deleteQuestionUniqueId" id="deleteQuestionUniqueId">
                                                            <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? ""; ?>">
                                                            
                                                            <div class="text-center mb-2">
                                                                <h4>Are you sure you want to delete question: <strong><span id="deleteQuestion" class="text-danger"></span></strong>?</h4>
                                                            </div> 
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-flat d-flex align-items-center pe-3 px-3" name="deleteQBtn"><i class="fa-solid fa-circle-xmark me-2"></i><strong>Yes</strong></button>
                                                            <button type="button" class="btn btn-danger btn-flat d-flex align-items-center pe-3 px-3" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i><strong>No</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal fade" id="addQModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border border-success border-4">
                                                    <div class="modal-header alert alert-success d-flex align-items-center">
                                                        <i class="fa-solid fa-circle-question fs-5 me-2"></i>
                                                        <strong>Select Question Type</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="vstack gap-2 p-3">
                                                            <a class="btn btn-success btn-flat fw-bold mb-2" href="index.php?route=questions&action=add-question&type=d60ecb9edcdfd8ab0222ddd158bbbdc3" role="button">Multiple Choice Select</a>
                                                            <a class="btn btn-success btn-flat fw-bold mb-2" href="index.php?route=questions&action=add-question&type=c310d750ebfc431206b6585aafbbb56f" role="button">Yes or No</a>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-flat" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i>Close</button>
                                                    </div> 
                                                </div>
                                            </div>
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
            <!-- Question Function JS -->
            <script src="../partials/js/add-question.js"></script>
            <script src="../partials/js/edit-question.js"></script>

            <script>
                $(document).ready(function () {
                    // TODO Table First
                    var questionTable = $('#questionsTable').DataTable({
                        "ordering": false,
                        // 'processing': true,
                        // 'serverSide': true,
                        // 'serverMethod': 'post',
                        // 'ajax': {
                        //     'url':'../partials/php/get-questions.php'
                        // },
                        "ajax": '../partials/php/get-questions.php',
                        "columns": [
                            {data: "questionNo"},
                            {data: "questionUniqueId"},
                            {data: "questionText"},
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
                        questionTable.ajax.reload( null, false );
                    }, 3000 );

                    questionTable.on('click', '.deleteQBtn', function() {
                        $('#deleteQModal').modal('show');

                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        $('#deleteQuestionUniqueId').val(data[1]);   
                        $('#deleteQuestion').text(data[2]);
                    });

                    // TODO Table Second
                    var table = $('#choicesTable').DataTable({
                        "ordering": false,
                        "searching": false,
                        "paging": false,
                        "info": false,
                        "language": {
                            "emptyTable": "Please click the 'Add' choice button to choices!"
                        },
                        "columnDefs": [
                            {
                                target: 0,
                                visible: false,
                                searchable: false,
                            },
                        ]
                    });

                    var counter = 1;
                
                    $('#addRow').on('click', function () {
                        table.row.add([counter, '<div class="input-group d-flex justify-content-center mb-2"><span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-list-check fa-fw fs-4"></i></span><div class="form-floating"><textarea name="choices[]" class="form-control" placeholder="Choice" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required></textarea><label for="choice">Choice</label></div></div>', '<div class="d-flex justify-content-center"><button type="button" id="removeRow" class="btn btn-danger btn-flat fs-5"><i class="fa-solid fa-trash-can p-1"></i></button></div>']).draw(false);
                
                        counter++;
                    });

                    table.on('click', '#removeRow', function () {
                        table.row($(this).parents('tr')).remove().draw();
                    });
                
                    $('#addRow').click();
                
                });
                
            </script>
        </div>
        <!-- ./wrapper -->

</body>
</html>
    