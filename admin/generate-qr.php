<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../assets/components/admin/head.php'); ?>
    <title>Generate QR Code</title>
    <style>
        .qr-code {
            opacity: 0;
            display: flex;
            /* padding: 33px 0; */
            /* border-radius: 5px; */
            align-items: center;
            pointer-events: none;
            justify-content: center;
            /* border: 1px solid #ccc; */
        }
        
        .active .qr-code {
            opacity: 1;
            pointer-events: auto;
            transition: opacity 0.5s 0.05s ease;
        }

        .qr-code img {
            width: 20rem;
        }

        .qr-url,
        .qr-download-btn {
            display: none;
        }
    </style>
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
                                <h1>Generate QR Code</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Generate QR Code</li>
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
                                    <?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "generate-qr") { ?>
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title"><i class="fa-solid fa-qrcode me-2"></i>Generate QR Code</h3>
                                        </div>
                                        <div class="card-body overflow-auto">
                                            <h1>Generate QR Code</h1>
                                            <p>Paste a url or enter text to create QR code</p>
                                            <div class="row g-3" id="generateQRCode">
                                                <div class="col-md-12">
                                                    <div class="input-group">       
                                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-qrcode fa-fw fs-4"></i></span>
                                                        <div class="form-floating">
                                                            <textarea class="form-control" id="qrCodeInput" placeholder="Enter text or url" spellcheck="false" style="height: 7rem;" required></textarea>
                                                            <label for="userMessage">Enter text or url</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <button class="btn btn-success btn-flat btn-lg fw-bold mb-2 w-100 generateQRBtn"><strong><i class="fa-solid fa-square-plus me-2"></i>Generate QR Code</strong></button>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="qr-code">
                                                        <img src="" alt="qr-code">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <form action="#">
                                                        <input type="text" placeholder="Paste file url" class="qr-url" required>
                                                        <button class="btn btn-primary btn-flat btn-lg fw-bold w-100 qr-download-btn"><strong><i class="fa-solid fa-download me-2"></i>Download QR Code</strong></button>
                                                    </form>
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

            <!-- Generate QR Code Function JS -->
            <script src="../partials/js/generate-qr-code.js"></script>

        </div>

</body>
</html>
    