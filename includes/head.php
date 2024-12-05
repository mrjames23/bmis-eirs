<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/icon.ico" type="image/ico">
    <title><?= SITE_TITLE ?> | <?= $page ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/sweetalert2/sweetalert2.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= ASSETS ?>/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?= ASSETS ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= ASSETS ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <style>
        /* css input type number: remove button */
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input[type=checkbox] {
            cursor: pointer;
        }

        .custom-control-label {
            cursor: pointer;
        }
    </style>

    <!-- Active Script -->
    <script>
        $(window).on('load', function() {
            $('.preloader').addClass('fade-out')
            /** add active class and stay opened when selected */
            var url = window.location;
            // for sidebar menu entirely but not cover treeview
            $('li.nav-item a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-item > .nav-link a").children().addClass('active');
            // for treeview
            $('li.nav-item a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-item > .nav-link").addClass('menu-open');
        });

        function error() {
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                confirmButtonText: 'Exit'
            })
        }

        function loading() {
            Swal.fire({
                title: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
        }
    </script>
</head>