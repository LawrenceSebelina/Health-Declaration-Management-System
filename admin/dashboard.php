<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed"> <!-- sidebar-collapse layout-fixed -->
    <div class="wrapper">
        
        <?php require_once('../assets/components/admin/header.php'); ?>
        <?php require_once('../assets/components/admin/sidebar.php'); ?>
        <?php 
            $totalHealthDecForms = count($class->getHealthDecFormsDash());
            $healthDecResultsPie = $class->getHealthDecFormsDash();
            $healthDecResultsLine = $class->getHealthDecFormsSevenDaysDash();
            $buildingCount = count($class->getBuilding());
            $allUsers = $class->getAllUsersDash();
            $allQuestions = count($class->getAllQuestionsDash());

            if (!empty($healthDecResultsPie)) {
                $healthDecPositiveCounterPie = 0;
                $healthDecNegativeCounterPie = 0;
                foreach ($healthDecResultsPie as $healthDecResultPie) {
                    if ($healthDecResultPie['declarationResult'] == "Positive") {
                        $healthDecPositiveCounterPie += 1;
                        $healthDecPositiveLabelPie = "Positive";
                    } else if ($healthDecResultPie['declarationResult'] == "Negative") {
                        $healthDecNegativeCounterPie += 1;
                        $healthDecNegativeLabelPie = "Negative";
                    }
                }
                $healthDecResultDataPie = [$healthDecPositiveCounterPie, $healthDecNegativeCounterPie];
                $healthDecResultLabelPie = [$healthDecPositiveLabelPie, $healthDecNegativeLabelPie];
            }

            if (!empty($healthDecResultsLine)) {
                foreach ($healthDecResultsLine as $healthDecResultLine) {
                    $healthDecDaysLine[] = $healthDecResultLine['healthDecDays'];
                    $healthDecTotalPerDaysLine[] = $healthDecResultLine['healthDecTotalDays'];
                    $healthDecPositiveCounterLine = 0;
                    $healthDecNegativeCounterLine = 0;
                    foreach ($healthDecResultsPie as $healthDecResultPie) {
                        if (date('M. d, Y', strtotime($healthDecResultPie['declarationDateCreated'])) == $healthDecResultLine['healthDecDays']) {
                            if ($healthDecResultPie['declarationResult'] == "Positive") {
                                $healthDecPositiveCounterLine += 1;
                            } else if ($healthDecResultPie['declarationResult'] == "Negative") {
                                $healthDecNegativeCounterLine += 1;
                            }
                        }
                    }
                    $healthDecPositiveResultDataLine[] = $healthDecPositiveCounterLine;
                    $healthDecNegativeResultDataLine[] = $healthDecNegativeCounterLine;
                }
            }

            if (!empty($allUsers)) {
                $userPatientCounter = 0;
                $userGuestCounter = 0;
                foreach ($allUsers as $allUser) {
                    if ($allUser['userType'] == "Patient") {
                        $userPatientCounter += 1;
                    } else if ($allUser['userType'] == "Guest") {
                        $userGuestCounter += 1;
                    }
                }
            }

        ?>
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-newspaper"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Health Declarations</span>
                                        <span class="info-box-number">
                                        <?php echo $totalHealthDecForms ?? "" ?>
                                        <!-- <small>%</small> -->
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-hospital"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Buildings</span>
                                        <span class="info-box-number"><?php echo $buildingCount ?? "" ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-circle-question"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Questions</span>
                                        <span class="info-box-number"><?php echo $allQuestions ?? "" ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Patients/Guests</span>
                                        <span class="info-box-number"><?php echo $userPatientCounter ?? "" ?>/<?php echo $userGuestCounter ?? "" ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h5 class="card-title"><i class="fa-solid fa-chart-line me-2"></i>Health Declaration Summary</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-center">
                                                    <strong>Number of Health Declaration (7 Days)</strong>
                                                </p>

                                                <div class="chart">
                                                    <canvas id="salesChart" style="height: 330px;"></canvas>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <p class="text-center">
                                                    <strong>Health Declaration Result</strong>
                                                </p>

                                                <div class="card-body bg-dark shadow">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="chart-responsive">
                                                                <canvas id="pieChart" style="height: 130px;"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <ul class="chart-legend clearfix">
                                                                <li><i class="fa-solid fa-circle text-success"></i> Positive Health Declaration Result</li>
                                                                <li><i class="fa-solid fa-circle text-danger"></i> Negative Health Declaration Result</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer p-0 shadow">
                                                    <ul class="nav nav-pills flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link text-black fw-bold">
                                                                Positive
                                                                <span class="float-right text-success">
                                                                    <i class="fa-solid fa-plus text-sm"></i>
                                                                    <?php echo $healthDecPositiveCounterPie ?? ""; ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-black fw-bold">
                                                                Negative
                                                                <span class="float-right text-danger">
                                                                    <i class="fa-solid fa-minus text-sm"></i> 
                                                                    <?php echo $healthDecNegativeCounterPie ?? ""; ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <?php require_once('../assets/components/admin/footer.php'); ?>
            <!-- Chart JS -->
            <script type="text/javascript" src="../assets/js/chart.min.js"></script>
            <!-- Building Function JS -->
           
            <script>
                // TODO Line Chart

                var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

                var salesChartData = {
                    labels: <?php echo json_encode(array_reverse($healthDecDaysLine)); ?>,
                    datasets: [
                        {
                            label: 'Total Per Day',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data:  <?php echo json_encode(array_reverse($healthDecTotalPerDaysLine)); ?>
                        },
                        {
                            label: 'Positive',
                            backgroundColor: '#00a65a',
                            borderColor: '#00a65a',
                            pointRadius: false,
                            pointColor: '#00a65a',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: <?php echo json_encode(array_reverse($healthDecPositiveResultDataLine)); ?>
                        },
                        {
                            label: 'Negative',
                            backgroundColor: '#f56954',
                            borderColor: '#f56954',
                            pointRadius: false,
                            pointColor: '#f56954',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: <?php echo json_encode(array_reverse($healthDecNegativeResultDataLine)); ?>
                        }
                    ]
                }

                var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }

                var salesChart = new Chart(salesChartCanvas, {
                    type: 'line',
                    data: salesChartData,
                    options: salesChartOptions
                })

                // TODO Pie Chart

                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = {
                    labels: <?php echo json_encode($healthDecResultLabelPie); ?>,
                    datasets: [
                    {
                        data: <?php echo json_encode($healthDecResultDataPie); ?>,
                        backgroundColor: ['#00a65a','#f56954']
                    }
                    ]
                }
                var pieOptions = {
                    legend: {
                        display: false
                    }
                }   
                var pieChart = new Chart(pieChartCanvas, {
                    type: 'doughnut',
                    data: pieData,
                    options: pieOptions
                })
            </script>
            
        </div>
        <!-- ./wrapper -->

</body>
</html>
    