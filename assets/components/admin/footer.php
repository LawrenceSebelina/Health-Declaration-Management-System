<footer class="main-footer text-center bg-success">
    <strong> © 2022 Copyright: University of Perpertual Help Medical Center - Biñan</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- JQuery JS  -->
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="../assets/vendor/bootstrap/js/bootstrap.popper.min.js"></script>
<script type="text/javascript" src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Datatables Links JS (Bootstrap) -->
<script type="text/javascript" src="../assets/vendor/DataTables/datatables.min.js"></script>
<!-- Print JS -->
<script type="text/javascript" src="../assets/vendor/printJS/print.min.js"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="../assets/vendor/bootstrap/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="../assets/vendor/adminLTE/js/adminlte.min.js"></script>
<!-- Swiper JS -->
<script type="text/javascript" src="../assets/vendor/swiper/js/swiper-bundle.min.js"></script>

<script>
    // TODO Add active class on the selected route
        <?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
        $('.nav-<?php echo $route; ?>').addClass('active');
    // TODO End of adding active class on the selected route
</script>