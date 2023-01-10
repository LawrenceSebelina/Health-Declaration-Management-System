<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/my-logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/fontawesome.min.css">
    <title>404 | Error</title>
</head>
<body>
    <?php 
        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] != "404") { 
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";   
        } 
    ?>

    <section id="">
        <main>
            <div class="container shadow">
                <div class="row g-1" style=" width: 95%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <div class="col-md-12 bg-light p-1 shadow">
                        <div class="">
                            <img src="../assets/images/four-zero-four.jpg" class="img-fluid" style="height: 500px; width: 100%;" alt="...">
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-primary btn-flat btn-lg" href="index.php?route=buildings" role="button"><strong><i class="fa-solid fa-hospital me-3"></i>Back to Buildings</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
</body>
</html>