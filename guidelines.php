<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Guidelines</title>

    <style>
        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 400px;
            height: 300px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }

        .guidelines img {
            height: 300px;
            width: 300px;
        }
    </style>
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
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.php?route=my-home">My Home</a></li>
                            <li class="breadcrumb-item active">Guidelines</li>
                        </ol>
                    </nav>
                    <h2 class="text-center text-black text-uppercase mb-3">Guidelines<hr></h2>

                    
                    <div class="overflow-auto p-3 bg-light shadow" style="width: 100%; height: 400px;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="guidelines">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/guideline-fourth.jpg" class="border border-dark border-1 img-fluid"/>
                                    </div>
                                    <div class="m-2">
                                        <h3 class="text-center"><strong>Scan QR Code</strong></h3>
                                        <p class="text-justify mt-3 p-2">Scan the QR Code that links to the website.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="guidelines">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/guideline-fifth.jpg" class="border border-dark border-1 img-fluid"/>
                                    </div>   
                                    <div class="m-2">
                                        <h3 class="text-center"><strong>Health Declaration</strong></h3>
                                        <p class="text-justify mt-3 p-2">Filling out the health declaration form provided by the system. Before entering the clinic the patient and guest are required to fill out the form.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="guidelines">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/guideline-seventh.jpg" class="border border-dark border-1 img-fluid"/>
                                    </div>
                                    <div class="m-2">
                                        <h3 class="text-center"><strong>Data Privacy</strong></h3>
                                        <p class="text-justify mt-3 p-2">The data privacy act will display after filling out the health declaration form. The user should agree with the data privact act to be able to proceed.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="guidelines">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/guideline-sixth.jpg" class="border border-dark border-1 img-fluid"/>
                                    </div>
                                    <div class="m-2">
                                        <h3 class="text-center"><strong>Queue Number</strong></h3>
                                        <p class="text-justify mt-3 p-2">Wait for your queue number after filling out the health declaration form. Upon receiving your number do not go back to not disappear your number.</p>
                                        <p class="text-justify p-2">The secretary will call your number and show your number to him/her.</p> 
                                        <p class="text-justify p-2">The queue number is only alloted for the patient.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="guidelines">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/guideline-eighth.jpg" class="border border-dark border-1 img-fluid"/>
                                    </div>
                                    <div class="m-2">
                                        <h3 class="text-center"><strong>Settings</strong></h3>
                                        <p class="text-justify mt-3 p-2">Allows you to modify your personal information, contact information, username, and password.</p>
                                        <p class="text-justify p-2">Also, allows you to view and print all of your health declaration form.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <!-- <div class="row p-2">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-first.jpg" class="border border-dark border-1 img-fluid"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-second.jpg" class="border border-dark border-1 img-fluid"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-third.jpg" class="border border-dark border-1 img-fluid"/>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>
    
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true
            },
                pagination: {
                el: ".swiper-pagination"
            }
        });
    </script>

</body>
</html>