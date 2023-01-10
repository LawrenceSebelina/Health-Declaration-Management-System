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

                    <div class="row p-2">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-first.jpg" class="border border-dark border-1"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-second.jpg" class="border border-dark border-1"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="assets/images/guideline-third.jpg" class="border border-dark border-1"/>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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