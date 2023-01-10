<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Verification</title>
</head>
<body>
    <?php 
        if (isset($_GET['uuid']) && !empty($_GET['uuid'])) {
            $verifyUserUniqueId = $_GET['uuid'];
        } else {
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        }
    ?>

    <?php require_once('assets/components/header.php'); ?>

    <section id="main-content">
        <main>
            <div class="container">
                <div class="row g-1">
                    <div class="col-md-12 col-lg-6 bg-dark p-3">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="assets/images/carousel-first.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-second.png" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-third.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-fourth.jpg" class="img-fluid" alt="..."></div>
                                <div class="swiper-slide"><img src="assets/images/carousel-fifth.png" class="img-fluid" alt="..."></div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 bg-white p-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center mt-5">
                                    <img src="assets/images/we-care.png" class="img-fluid h-50 w-50" alt="...">
                                </div>
                            </div>
                            <h4 class="text-center text-black mt-5"><strong>More than 40 years of Excellent Patient Care</strong></h4>
                           
                            <form action="" method="post" class="verification-form">
                                <input type="hidden" name="verifyUserUniqueId" class="verifyUserUniqueId" value="<?php echo $verifyUserUniqueId ?? ""; ?>">
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>

    <!-- Signin Function JS -->
    <script src="partials/js/verification.js"></script>

    <script>
        // TODO Slider Using Swiper
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        // TODO End of Slider Using Swiper
    </script>
</body>
</html>