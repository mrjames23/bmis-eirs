<?php
include_once('../includes/config.php');
$page = 'Baranggay Information';
?>

<?php include_once('../includes/head.php') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once('../includes/preloader.php') ?>
        <?php include_once('../includes/navbar.php') ?>
        <?php include_once('../includes/aside.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="card-title">Barangay Information</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal_create_user">
                                <i class="fa fa-edit"></i> EDIT INFORMATION
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <h1 class="text-center text-bold m-5">TITLE INFORMATION</h1>
                <div class="container-fluid">
                    <div class="h3 justify-content-center text-center m-5">
                        This is were barangay information or details placeholder.
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>

    <?php include_once('../includes/script.php') ?>