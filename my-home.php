<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body>
    <?php require_once('assets/components/header.php'); ?>
    <?php 
        if (empty($info)) { 
            header ("location: index.php");
        }
    ?>
    <section id="main-content">
        <main>
            <div class="container">
                <div class="bg-white p-3">
                    <h2 class="text-center text-black text-uppercase mb-3">Welcome <span class="text-success"><?php echo $info['userFName'] ?? ""; ?>!</span></h2>
                    <h6 class="text-center text-black text-uppercase mb-3">Alagang ospital, alagang Perpetual, Safe kayo dito.<hr></h6>
                    <div class="row g-2 main-functions">
                        <div class="col-lg-4 col-md-12">
                            <a data-bs-toggle="modal" data-bs-target="#hdFormModal" class="text-black" role="button">
                                <div class="text-center p-3 function">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                    <h3 class="mt-3"><strong>Health Declaration</strong></h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="index.php?route=guidelines" class="text-black" role="button">
                                <div class="text-center p-3 function">
                                    <i class="fa-solid fa-hospital-user"></i>
                                    <h3 class="mt-3"><strong>Guidelines</strong></h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="index.php?route=my-settings" class="text-black" role="button">
                                <div class="text-center p-3 function">
                                    <i class="fa-solid fa-gear"></i>
                                    <h3 class="mt-3"><strong>Settings</strong></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </section>

    <section id="modal-content">
        <form action="" method="post" class="healthdec-form">
            <div class="modal fade" id="hdFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content border border-success border-5 rounded">
                        <div class="modal-header mx-auto me-auto gap-3">
                            <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                            <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                        </div>
                        <div class="modal-body bg-success">
                            <h3 class="text-center text-white mb-3">Health Declaration Form</h3>
                            <h6 class="text-white">Please place a check mark (✓) under your response. (Lagyan ng tsek (✓) sa angkop na sagot)</h6>
                            <h6 class="text-white mb-3"><em>Reminder:</em> Please filled up all fields.</h6>
                            <div class="alert alert-danger alert-messages"></div>
                            <input type="hidden" name="userUniqueId" value="<?php echo $info['userUniqueId'] ?? "" ?>">
                            <input type="hidden" name="userType" value="<?php echo $info['userType'] ?? "" ?>">
                            <!-- <div class="health-declaration-content">
                                
                            </div> -->

                            <?php $questions = $class->getHealthDecQuestions(); ?>
                            <?php if (!empty($questions)) { $questionCounter = 1; ?>
                                <?php foreach ($questions as $question) { ?>
                                    <div class="p-3">
                                        <h6 class="text-white mb-3"><?php echo $questionCounter. ". " .$question['questionText'] ?? ""; ?></h6>
                                            <input type="hidden" name="questions[]" value="<?php echo $questionCounter ?? ""; ?>">
                                            <input type="hidden" name="questionsUniqueId[]" value="<?php echo $question['questionUniqueId']; ?>">
                                            <input type="hidden" name="questionsType[]" value="<?php echo $question['questionType'] ?? ""; ?>">

                                            <?php 
                                                $questionUniqueId = $question['questionUniqueId'];
                                                $choices = $class->getHealthDecChoices($questionUniqueId); 
                                            ?>
                                        
                                            <?php if ($question['questionType'] == 1) { ?>
                                                <div class="vstack gap-1 px-5 text-white">
                                                    <?php if (!empty($choices)) { ?>
                                                        <?php foreach ($choices as $choice) { ?>
                                                            <div class="form-check" id="question-<?php echo $questionUniqueId; ?>">
                                                                <?php if ($choice['choiceText'] == "None of the Above") { ?>
                                                                    <input class="form-check-input" type="checkbox" id="answersQT1N" name="answersQT1[]" value="<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>">
                                                                <?php } else { ?>
                                                                    <input class="form-check-input" type="checkbox" id="answersQT1" name="answersQT1[]" value="<?php echo $questionUniqueId.$choice['choiceUniqueId'] ?? ""; ?>">
                                                                <?php } ?>
                                                                <label class="form-check-label" for="answersQT1">
                                                                    <?php echo $choice['choiceText'] ?? ""; ?>
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            <?php } else if ($question['questionType'] == 2) { ?>
                                                <div class="d-flex justify-content-center" id="choice-<?php echo $questionUniqueId ?? ""; ?>">
                                                    <?php if (!empty($choices)) { ?>
                                                        <?php foreach ($choices as $choice) { ?>      
                                                            <div class="text-center text-white d-inline">
                                                                <div class="form-check form-check-inline">
                                                                    <?php if ($choice['choiceText'] == "Yes") { ?>
                                                                        <input class="form-check-input" type="checkbox" id="choice-<?php echo $questionUniqueId ?? ""; ?>" name="answersQT2[]" value="<?php echo $questionUniqueId.$choice['choiceUniqueId']."Yes" ?? ""; ?>">
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input" type="checkbox" id="choice-<?php echo $questionUniqueId ?? ""; ?>" name="answersQT2[]" value="<?php echo $questionUniqueId.$choice['choiceUniqueId'] ?? ""; ?>">
                                                                    <?php } ?>
                                                                    <label class="form-check-label" for="choice-<?php echo $questionUniqueId ?? ""; ?>"><?php echo $choice['choiceText'] ?? ""; ?></label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>    
                                    </div>
                                <?php $questionCounter++; } ?>

                                <hr>
                                <div class="container">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="row g-2">
                                                <div class="col-md-12">
                                                    <div class="input-group"> 
                                                        <span class="input-group-text bg-light text-success"><i class="fa-solid fa-head-side-mask p-2"></i></span>
                                                        <div class="form-floating">
                                                            <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="userComorbidity" name="userComorbidity" onchange="others(this.value);">
                                                                <option value="None">None</option>
                                                                <option value="Chronic Respiratory Disease">Chronic Respiratory Disease</option>
                                                                <option value="Hypertension">Hypertension</option>
                                                                <option value="Cardiovascular Disease">Cardiovascular Disease</option>
                                                                <option value="Chronic Kidney Disease">Chronic Kidney Disease</option>
                                                                <option value="Cerebrovascular">Cerebrovascular</option>
                                                                <option value="Accident Malignancy">Accident Malignancy</option>
                                                                <option value="Diabetes Obesity">Diabetes Obesity</option>
                                                                <option value="Neurologic Disease">Neurologic Disease</option>
                                                                <option value="Chronic Liver Disease">Chronic Liver Disease</option>
                                                                <option value="Tuberculosis Chronic">Tuberculosis Chronic</option>
                                                                <option value="Respiratory Tract">Respiratory Tract</option>
                                                                <option value="Infection">Infection</option>
                                                                <option value="Immunodeficiency">Immunodeficiency</option>
                                                                <option value="Other">Others...</option>
                                                            </select>
                                                            <label for="userComorbidity">Comorbidity</label>        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" name="otherUserComorbidity" id="otherUserComorbidity" class="form-control" placeholder="State Other Comorbidity:" style="display: none;">
                                                        <label for="otherUserComorbidityLabel" id="otherUserComorbidityLabel" style="display: none;">State Other Comorbidity:</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">       
                                                <span class="input-group-text bg-light text-success"><i class="fa-solid fa-thermometer p-2"></i></span>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="userTemperature" name="userTemperature" placeholder="Temperature:">
                                                    <label for="userTemperature">Temperature</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-flat btn-lg submitHealthDec" name="submitHealthDec"><strong><i class="fa-solid fa-paper-plane me-3"></i>Submit</strong></button>
                            
                            <!-- <button type="button" class="btn btn-success btn-flat fw-bold mb-2" data-bs-toggle="modal" data-bs-target="#dataPAgreementModal"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Question</button> -->

                            <button type="reset" class="btn btn-secondary btn-flat btn-lg closeBtn" data-bs-dismiss="modal"><strong><i class="fa-solid fa-xmark me-3"></i>Close</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="" method="post" class="generate-queueno-form">
            <div class="modal fade" id="dataPAgreementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border border-success border-4">
                        <div class="modal-header">
                            <i class="fa-solid fa-user-shield fs-5 me-2"></i>
                            <strong>Data Privacy</strong>
                            <button type="button" class="btn-close resetHDContentIcon" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-success">
                            <div class="alert alert-danger alert-messages"></div>
                            <input type="hidden" id="declarationUniqueId" name="declarationUniqueId">
                            
                            <?php 
                                $buildings = $class->getBuilding(); 
                            ?>

                            <?php if ($info['userMab'] == "Default") { ?>
                                <div class="mt-2"><h5 class="form-title"><span class="bg-success text-white">Select Building</span></h5></div>
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-success text-white"><i class="fa-solid fa-hospital p-2"></i></span>
                                    <div class="form-floating">
                                        <select class="form-select" style="height: 3.6rem;" id="userBuilding" name="userBuilding">
                                            <?php if (!empty($buildings)) { ?>
                                                <?php foreach ($buildings as $building) { ?>
                                                    <option value="<?php echo $building['buildingUniqueId'].$building['buildingName'] ?? "";  ?>"><?php echo $building['buildingName'] ?? "";  ?></option>
                                                    <!-- <option value="2">MAB-1/ Building 2</option> -->
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <label for="userBuilding">Select Building</label>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="mt-2">
                                    <h5 class="form-title">
                                        <span class="bg-success text-white">
                                            Your Building (<?php echo $info['userMab']; ?>) 
                                        </span>


                                        <?php //if (!empty($buildings)) { ?>
                                                <?php //foreach ($buildings as $building) { ?>
                                                    <?php //if ($info['userMab'] == $building['buildingUniqueId']) { ?>
                                                        <!-- <span class="bg-success text-white">
                                                            Your Building (<?php //echo $building['buildingName']; ?>) 
                                                        </span> -->
                                                 <?php //} ?>
                                            <?php// } ?>
                                        <?php //} ?>
                                    </h5>
                                </div>
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-success text-white"><i class="fa-solid fa-hospital p-2"></i></span>
                                    <div class="form-floating">
                                        <?php if (!empty($buildings)) { ?>
                                            <?php foreach ($buildings as $building) { ?>
                                                <?php if (md5($info['userMab']) == $building['buildingUniqueId']) { ?>
                                                    <input type="hidden" id="userBuilding" name="userBuilding" value="<?php echo $building['buildingUniqueId'].$building['buildingName'] ?? "";  ?>">

                                                    <input type="text" class="form-control" id="myBuilding" name="myBuilding" placeholder="Your Building" value="<?php echo $building['buildingName'] ?? "";  ?>" readonly>
                                                    <label for="userBuilding">Your Building</label>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr>
                            <div class="text-center mb-2">
                                <p class="text-justify text-white">I hereby authorized, PERPETUAL HELP MEDICAL CENTER - BIÑan (PHMC-B), to collect and process the data indicated herein for the purpose of effecting control of COVID-19 transmission.</p>
                                <p class="text-justify text-white">I understand that my personal information is protected by Act 10173, Data Privacy Act of 2012, and that this form will be destroyed after 30 days from the date of accomplishment, following the National Archives of the Philippines Protocol.</p>
                            </div> 
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dataAgreement" value="1" id="dataAgree">
                                <label class="form-check-label text-white" for="dataAgree">
                                    I Agree
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-flat generateQueueNoBtn" name="generateQueueNoBtn" style="display:none"><strong><i class="fa-solid fa-paper-plane me-3"></i>Generate Queue No.:</strong></button>

                            <!-- <button type="button" class="btn btn-primary btn-flat generateQueueNoBtn" data-bs-toggle="modal" data-bs-target="#generateQNModal" style="display:none"><i class="fa-solid fa-paper-plane me-3"></i>Generate Queue No.:</button> -->

                            <button type="button" class="btn btn-secondary btn-flat resetHDContentBtn" data-bs-dismiss="modal"><strong><i class="fa-solid fa-xmark me-3"></i>Close</strong></button>
                        </div> 
                    </div>
                </div>
            </div>
        </form>

        <form action="">
            <div class="modal fade" id="generateQNModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border border-success border-5 rounded">
                        <div class="modal-header mx-auto me-auto gap-3">
                            <img src="assets/images/my-logo.png" class="img-fluid" alt="Logo">
                            <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">University of Perpertual Help<br/>Medical Center - Biñan</h1>
                        </div>
                        <div class="modal-body bg-success">
                            <div class="row">
                                <div class="col-md-5 bg-white">
                                    <div class="text-center p-1">
                                        <h5 class="mt-2"><span class="buildingNumber">0</span></h5>
                                        <p class="text-break"><span style="font-size: 7rem;" class="text-wrap queueNumber">0</span></p>
                                        <h6>Queue No.:</h6>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="text-center mb-2">
                                        <p class="text-justify text-white">Upon receiving this Queue Number please click the <strong class="text-warning">"Done"</strong> button and print (or save as PDF) your health declaration form that will serve as your pass to enter into the establishment.</p>
                                        <p class="text-justify text-white"><strong><em class="text-warning">Reminder:</em></strong> After you finished your appointment/ consultation with your Physician, please click <strong class="text-warning">"Mark As Done"</strong> button corresponding into your finished health declaration form <strong class="text-warning">(from: Settings → My Health Declaration Forms → "Your finished health declaration form" → "Click Mark As Done button").</strong></p>
                                    </div> 
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="submit" class="btn btn-primary btn-flat btn-lg submitHealthDec" name="submitHealthDec"><strong><i class="fa-solid fa-paper-plane me-3"></i>Submit</strong></button> -->
                            
                            <a class="btn btn-success btn-flat fw-bold btn-lg doneBtn" role="button"><i class="fa-solid fa-circle-check me-3"></i>Finish</a>

                            <!-- <button type="reset" class="btn btn-secondary btn-flat btn-lg closeBtn" data-bs-dismiss="modal"><strong><i class="fa-solid fa-xmark me-3"></i>Close</strong></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <?php require_once('assets/components/footer.php'); ?>
    <?php if (!empty($questions)) { ?>
        <?php foreach($questions as $question) {  ?>
            <script>
                $('#choice-<?php echo $question['questionUniqueId'] ?? ""; ?> input[type="checkbox"]').on('change', function() {
                    $('#choice-<?php echo $question['questionUniqueId'] ?? ""; ?> input[type="checkbox"]').not(this).prop('checked', false);
                });
            </script>
        <?php } ?>
    <?php } ?>

    <?php if (!empty($questions)) { ?>
        <?php foreach ($questions as $question) { ?>
            <?php if ($question['questionType'] == 1) { ?>
                <?php if (!empty($choices)) { ?>
                    <?php foreach ($choices as $choice) { ?>
                        <?php 
                            $questionUniqueId = $question['questionUniqueId'];
                            $choices = $class->getHealthDecChoices($questionUniqueId); 
                        ?>
                        <?php if ($question['questionType'] == 1) { ?>
                            <?php if (!empty($choices)) { ?>
                                <?php foreach ($choices as $choice) { ?>
                                    <?php if ($choice['choiceText'] == "None of the Above") { ?>
                                        <input type="hidden" id="answersQT1N-<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>" value="<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>">
                                        <script>
                                            (function () {
                                                var getChecked = function () {
                                                    return $("#question-<?php echo $questionUniqueId; ?> input[name='answersQT1[]']:checked");
                                                }

                                                var getValues = function () {
                                                    return getChecked().map(function () {
                                                        return this.value; 
                                                    }).get();
                                                };

                                                var noneOfTheAbove = function (initiator) {
                                                    var checked = getChecked();
                                                    return checked.each(function () {
                                                        var userClickedNone = initiator.value ===  $("#answersQT1N-<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>").val();
                                                        var currentElIsNone = this.value ===  $("#answersQT1N-<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>").val();
                                                        var uncheck = userClickedNone^currentElIsNone;
                                                        
                                                        if(uncheck) {
                                                            $(this).prop('checked', false);
                                                        }
                                                    })
                                                };

                                                var output = function (e) {
                                                    var initiator = typeof e !== 'undefined' ? e.target : {};
                                                    var arr = getValues();
                                                    if(arr.length > 0) {
                                                        if(arr.indexOf($("#answersQT1N-<?php echo $questionUniqueId.$choice['choiceUniqueId']."None" ?? ""; ?>").val()) > -1) {
                                                            noneOfTheAbove(initiator);
                                                        }
                                                    } 
                                                }

                                                $("#question-<?php echo $questionUniqueId; ?> input[name='answersQT1[]']").change(output);

                                            }());
                                        </script>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>

    <!-- Health Declaration Function JS -->
    <script src="partials/js/submit-health-declaration.js"></script>
    <script src="partials/js/generate-queue-no.js"></script>
</body>
</html>