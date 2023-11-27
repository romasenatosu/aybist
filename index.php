<?php
    require_once __DIR__ . '/inc/Core.php';

/* 
    // update language definitions
    include_once __DIR__ . '/language_en.php';
    foreach ($lang_defaults_en as $key => $value) {
        $stmt = $pdo->prepare("INSERT INTO languages_def (language_id, keyword, value) VALUES (:language_id, :keyword, :value)");
        $stmt->bindValue(':language_id', 2, PDO::PARAM_INT);
        $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
        $stmt->bindParam(':value', $value, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    } */

    // Helpers::dump($_SESSION);
    // Helpers::dump($_SERVER);
    // die();
?>

<!DOCTYPE html>
<html lang="<?= $locale ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="/node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="/node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css">

    <!-- flatpickr -->
    <link rel="stylesheet" href="/node_modules/flatpickr/dist/flatpickr.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="/assets/css/style.min.css" />

    <!-- my css -->
    <link rel="stylesheet" href="/assets/css/stylesheet.css">

    <title>
        <?= $_ENV['APP_TITLE'] . " | " . ($lang["page_" . $page] ?? "") ?>
    </title>
</head>

<!-- INFO: what about encoding and decoding all data with htmlspecialchars? -->

<!-- TODO: fix error redirection in htaccess -->
<!-- TODO: think about zip codes which can start with zero -->
<!-- TODO: create try catch for pdo statements -> flash messages -->

<body>
    <!-- TODO: file uploading (delete file after deleting a row) -->
    <!-- TODO: check for unique fields -->
    <!-- TODO: create flash messages after updating/deleting/errors -->
    <!-- TODO: remember me and user token -->
    <!-- TODO: create custom pagination and show rows function -->
    <!-- TODO: create analytics charts -->

    <!-- Preloader -->
    <div class="preloader">
        <img src="/assets/images/logos/logo.png" alt="loader" class="img-fluid" />
    </div>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
            if ($page != 'login' and !str_starts_with($page, "error_")) {
                include_once __DIR__ . '/header.php';
            }

            require_once __DIR__ . '/router.php';
            include_once __DIR__ . '/footer.php';
        ?>
    </div> <!-- NOTE: Body Wrapper ends here -->

    <!-- idk :D -->
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>

    <?php
        ob_end_flush();
    ?>

    <!--  Customizer -->
    <!--  Import Js Files -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/simplebar/dist/simplebar.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/js/app.init.js"></script>
    <script src="/assets/js/app-style-switcher.js"></script>
    <script src="/assets/js/sidebarmenu.js"></script>
    <script src="/assets/js/custom.js"></script>
    <!--  current page js files -->
    <script src="/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/assets/js/dashboard.js"></script>

    <!-- datatable -->
    <script src="/node_modules/jszip/dist/jszip.min.js"></script>
    <script src="/node_modules/pdfmake/build/pdfmake.min.js"></script>
    <script src="/node_modules/pdfmake/build/vfs_fonts.js"></script>
    <script src="/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/node_modules/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/node_modules/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="/node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/node_modules/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- flatpickr -->
    <script src="/node_modules/flatpickr/dist/flatpickr.min.js"></script>
    <script src="/node_modules/flatpickr/dist/l10n/<?= $locale ?>.js"></script>

    <!-- Sweetalert -->
    <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- inputmask -->
    <script src="/node_modules/inputmask/dist/jquery.inputmask.min.js"></script>

    <!-- ckEditor5 -->
    <script src="/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script src="/node_modules/@ckeditor/ckeditor5-build-classic/build/translations/<?= $locale ?>.js"></script>

    <!-- myscript -->
    <script type="text/javascript">
        'use strict'

        $(function() {
            // launch datatables

            // TODO: fix bugs about datatable

            $(".datatable").DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['colvis', 'pdf', 'excel', 'print'],
                language: {
                    decimal: "",
                    emptyTable: "<?= $lang['datatable_emptyTable'] ?>",
                    info: "<?= sprintf($lang['datatable_info'], '_TOTAL_', '_START_', '_END_') ?>",
                    infoEmpty: "<?= $lang['datatable_infoEmpty'] ?>",
                    infoFiltered: "<?= sprintf($lang['datatable_infoFiltered'], '_MAX_') ?>",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "<?= sprintf($lang['datatable_lengthMenu'], '_MENU_') ?>",
                    loadingRecords: "<?= $lang['datatable_loadingRecords'] ?>",
                    processing: "<?= $lang['datatable_processing'] ?>",
                    search: "<?= $lang['datatable_search'] ?>",
                    zeroRecords: "<?= $lang['datatable_zeroRecords'] ?>",
                    paginate: {
                        first: "<?= $lang['datatable_paginate_first'] ?>",
                        last: "<?= $lang['datatable_paginate_last'] ?>",
                        next: "<?= $lang['datatable_paginate_next'] ?>",
                        previous: "<?= $lang['datatable_paginate_previous'] ?>"
                    },
                    buttons: {
                        colvis: "<?= $lang['datatable_buttons_colvis'] ?>",
                        copy: "<?= $lang['datatable_buttons_copy'] ?>",
                        csv: "<?= $lang['datatable_buttons_csv'] ?>",
                        excel: "<?= $lang['datatable_buttons_excel'] ?>",
                        pdf: "<?= $lang['datatable_buttons_pdf'] ?>",
                        print: "<?= $lang['datatable_buttons_print'] ?>"
                    },
                },
            });

            /* launch flatpickr */

            let flatpickr_config = {
                enableTime: false,
                dateFormat: "<?= $date_format ?>",
                locale: "<?= $locale ?>",
            }

            $(".flatpickr").flatpickr(flatpickr_config)

            // date range

            let range_flatpickr_config = Object.assign({}, flatpickr_config)
            range_flatpickr_config.mode = 'range' // reference bug
            $('.range_flatpickr').flatpickr(range_flatpickr_config)

            // fire swal when delete button is clicked
            $('.delete-form').on('click', function () {
                console.log("clicked")
                Swal.fire({
                    "title": "<?= $lang['swal_title_delete_confirm'] ?>",
                    "icon": "warning",
                    showConfirmButton: true,
                    showDenyButton: true,
                    confirmButtonText: "<?= $lang['text_yes'] ?>",
                    denyButtonText: "<?= $lang['text_no'] ?>",
                }).then(r => {
                    if (r.isConfirmed) {
                        $(this).trigger('submit')
                    }
                })
            })

            /* input mask */
            $("input[type='tel']").inputmask('999 999 99 99')

            /* ckeditor */
            const ck_field = document.querySelector('.ck_field')

            if (ck_field) {
                ClassicEditor
                    .create(ck_field, {
                        language: "<?= $locale ?>",
                    })
                    .then(editor => {
                        const updateConfigs = () => {
                            editor.ui.view.editable.element.style.height = '300px';
                            editor.ui.view.editable.element.style.maxHeight = '500px';
                            editor.ui.view.editable.element.style.overflowY = 'auto';
                        }

                        // when user focuses on the editor then update the configs to prevent the reset
                        editor.editing.view.document.on('focus', updateConfigs)

                        // run configs after the editor was launched
                        updateConfigs()
                    })
                    .catch(error => {
                        console.error(error)
                    })
            }
        })
    </script>
</body>

</html>
