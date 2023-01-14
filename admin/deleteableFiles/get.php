<div class="d-flex justify-content-start">
    <button type="button" class="btn btn-success btn-flat fw-bold mb-2" id="addRow"><i class="fa-solid fa-square-plus fa-xl me-2"></i>Add Choice</button>
</div>

<table id="editChoicesTable" class="display table table-bordered" style="width:100%">
    <thead class="table-dark">
        <tr>
            <th>Choices Description</th>
            <th>Action</th>
        </tr>
    </thead> 
    <tbody>
        <?php if(!empty($editQDatas)) { ?>
            <?php foreach ($editQDatas as $editQData) { ?>
                <tr>
                    <td class="w-100"><?php echo $editQData['choiceText']; ?></td>
                    <td>
                        <div class="justify-content-center hstack gap-2">
                            <button type="button" class="btn btn-primary btn-flat fs-5">
                                <i class="fa-solid fa-pen-to-square p-1"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-flat fs-5">
                                <i class="fa-solid fa-trash-can p-1"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody> 
</table>

popper.min.js
//# sourceMappingURL=popper.min.js.map
pdfmake.min.js
//# sourceMappingURL=pdfmake.min.js.map
highcharts.js
//# sourceMappingURL=highcharts.js.map
accessibility
//# sourceMappingURL=accessibility.js.map


<?php if (!empty($getDFDatas)) { ?>
    <?php foreach (array_unique($questions) as $question) {  ?>
        <thead class="table-dark">
            <tr>
                <th class="bg-dark"><?php echo $question; ?></th>
            </tr>
        </thead>
        <?php foreach ($getDFDatas as $getDFData) { ?>
            <?php if ($question == $getDFData['questionText']) { ?>
            <tbody>
                <tr>
                    <td class="bg-warning">
                        <span class="d-block">Answer: <?php echo $getDFData['choiceText']; ?></span>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        <?php } ?>
    <?php } ?> 
<?php } ?> 


<table id="example" class="table table-borderless" style="width:100%">
    <?php if (!empty($getDFDatas)) { ?>
        <?php foreach (array_unique($questions) as $question) {  ?>
            <thead class="table-dark">
                <tr>
                    <th class="bg-dark"><?php echo $question; ?></th>
                </tr>
            </thead>
            <?php foreach ($getDFDatas as $getDFData) { ?>
                <?php if ($question == $getDFData['questionText']) { ?>
                <tbody>
                    <tr>
                        <td class="bg-secondary">
                            <span class="d-block">Answer: <?php echo $getDFData['choiceText']; ?></span>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            <?php } ?>
        <?php } ?> 
    <?php } ?> 
</table>















<div class="row">

                                            <div class="col-md-4 d-flex justify-content-end align-items-center">
                                                <img class="img-fluid" width="100" height="100" src="../assets/images/my-logo.png" alt="UPHMC-B Logo" alt="">
                                            </div>

                                            <div class="col-md-5 text-center mt-2 mb-2">
                                                <strong>University of Perpertual Help Medical Center - Biñan</strong><br>
                                                <h6>National Hi-way Biñan Laguna</h6>
                                                <h6>☏ 09123456</h6>
                                                <h6>✉ email@email.com</h6>
                                            </div>

                                            <div class="mb-2 mt-3 col-md-12 d-flex justify-content-center align-items-center">
                                                <h3><strong>Declaration Form</strong></h3>
                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                <h6>Prepared By: AdminName</h6>
                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                <h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6>
                                            </div>

                                        </div>