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
                                        10
                                        <small>%</small>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-thumbs-up"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Likes</span>
                                        <span class="info-box-number">41,410</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Patients</span>
                                        <span class="info-box-number">760</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box bg-dark mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Guest</span>
                                        <span class="info-box-number">2,000</span>
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
                                                    <strong>Number of Health Declaration (Last 7 Days)</strong>
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
                                                                <li><i class="fa-solid fa-circle text-danger"></i> Positive Health Declaration Result</li>
                                                                <li><i class="fa-solid fa-circle text-success"></i> Negative Health Declaration Result</li>
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
                                                                    <!-- <i class="fa-solid fa-arrow-down text-sm"></i> -->
                                                                    12
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-black fw-bold">
                                                                Negative
                                                                <span class="float-right text-danger">
                                                                    <!-- <i class="fa-solid fa-arrow-up text-sm"></i>  -->
                                                                    4
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
                var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

                var salesChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
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

                // This will get the first returned node in the jQuery collection.
                // eslint-disable-next-line no-unused-vars
                var salesChart = new Chart(salesChartCanvas, {
                    type: 'line',
                    data: salesChartData,
                    options: salesChartOptions
                })

                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = {
                    labels: [
                        'Chrome',
                        'IE'
                    ],
                    datasets: [
                    {
                        data: [700, 500],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
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
    