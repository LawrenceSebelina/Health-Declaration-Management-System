<section id="footer">
    <div class="container">
        <footer>
            <div class="row bg-success">
                <div class="col-md-12 col-lg-4 p-4 pb-0">
                    <div class="text-white">
                        <!-- <h5>Contacts:</h5> -->
                        <div class="mt-2"><h5 class="form-title"><span class="bg-success text-white">Contacts:</span></h5></div>
                        <h6 class="text-center"><i class="fa-solid fa-phone me-2"></i>(632) 8779-5310</h6>
                        <h6 class="text-center"><i class="fa-solid fa-phone me-2"></i>(6349) 544-5150</h5>
                        <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Email Address:</span></h5></div>
                        <h6 class="text-center"><i class="fa-solid fa-envelope me-2"></i>hospital@phmcb.com</h5>
                        <div class="mt-4"><h5 class="form-title"><span class="bg-success text-white">Check our socials:</span></h5></div>
                    </div>
                    <div class="text-center mb-3 socials-icons">
                        <a class="btn btn-outline-light" href="https://www.facebook.com/perpetualhelpmedicalcenterbinan/" target="_blank"><i class="fa-brands fa-facebook-f"></i
                        ></a>
                        <a class="btn btn-outline-light" href="https://twitter.com/uphsl_binan?lang=en" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a class="btn btn-outline-light" href="https://www.youtube.com/channel/UC4Y5RYy9SisHnLgsy1fNTSg" target="_blank"><i class="fa-brands fa-youtube"></i
                        ></a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 p-4 pb-0 footer-promises">
                    <div class="text-white">
                        <div class="mt-2"><h5 class="form-title"><span class="bg-success text-white">Our Promises</span></h5></div>
                        <p class="text-justify">We care for our patients, we comfort the sick and put your needs first.</p>
                        <p class="text-justify">We take care of our health care teams and empower them with what they need to provide quality care.</p>
                        <p class="text-justify">We care for our community and provide an avenue for healing and growth.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 p-4 pb-0">
                    <div class="text-white">
                        <div class="mt-2"><h5 class="form-title"><span class="bg-success text-white">Our Our Vision</span></h5></div>
                        <p class="text-justify">PERPETUAL HELP MEDICAL CENTER – BIÑAN shall be the premier healthcare provider, training institution and the hospital of choice in the Southern Tagalog Region by the year 2022. Equipped with state-of-the-art healthcare technology and staffed with top caliber healthcare professionals we shall provide a highly satisfying customer experience.</p>
                        <!-- <h5>Our Mission</h5>
                        <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, eaque!</p> -->
                    </div>
                </div>
                <div class="col-md-12 bg-dark p-3">
                    <div class="text-white text-center">
                        © 2022 Copyright: University of Perpertual Help Medical Center - Biñan
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>

<!-- JQuery JS  -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.popper.min.js"></script>
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Datatables Links JS (Bootstrap) -->
<script type="text/javascript" src="assets/vendor/DataTables/datatables.min.js"></script>
<!-- Swiper JS -->
<script type="text/javascript" src="assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<!-- Custom JS  -->
<script type="text/javascript" src="assets/js/script.js"></script>

<script>
    // TODO Add active class on the selected route
        <?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
        $('.nav-<?php echo $route; ?>').addClass('active');
    // TODO End of adding active class on the selected route
</script>