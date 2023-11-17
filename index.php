<?php
    require_once __DIR__ . '/inc/core.php';

    // dump($_SERVER);
    // die();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css">

    <!-- flatpickr -->
    <link rel="stylesheet" href="node_modules/flatpickr/dist/flatpickr.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="assets/css/style.min.css" />

    <!-- my css -->
    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <title>
        <?= $title ?>
    </title>
</head>

<!-- ASK: error redirection and codes for server -->

<body>
    <!-- TODO: crud operations using PDO -->
    <!-- TODO: authentication -->
    <!-- TODO: get page title from database -->
    <!-- TODO: php.ini settings must be derived from database -->
    <!-- TODO: method listener for GET, POST, etc. -->
    <!-- TODO: check error redirections -->
    <!-- TODO: regex etc. -->
    <!-- TODO: create analytics charts -->
    <!-- TODO: mesajlar -->

    <!-- Preloader -->
<!--     <div class="preloader">
        <img src="/assets/images/logos/logo.png" alt="loader" class="img-fluid" />
    </div> -->

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
            if ($page == 'login') {
                include_once __DIR__ . '/login.php';
            } else {
                include_once __DIR__ . '/header.php';
                require_once __DIR__ . '/router.php';
                include_once __DIR__ . '/footer.php';
            }
        ?>
    </div> <!-- NOTE: Body Wrapper ends here -->

    <!-- idk :D -->
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>

    <!--  Customizer -->
    <!--  Import Js Files -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/app.init.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--  current page js files -->
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/js/dashboard.js"></script>

    <!-- datatable -->
    <script src="node_modules/jszip/dist/jszip.min.js"></script>
    <script src="node_modules/pdfmake/build/pdfmake.min.js"></script>
    <script src="node_modules/pdfmake/build/vfs_fonts.js"></script>
    <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="node_modules/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="node_modules/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- flatpickr -->
    <script src="node_modules/flatpickr/dist/flatpickr.min.js"></script>
    <script src="node_modules/flatpickr/dist/l10n/tr.js"></script>

    <!-- Sweetalert -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- myscript -->
    <script src="assets/js/script.js"></script>
</body>

</html>
