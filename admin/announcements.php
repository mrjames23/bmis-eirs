<?php
include_once('../includes/config.php');
$page = 'Announcements';
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
                            <h1 class="card-title">Announcements</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal_create_user">
                                <i class="fa fa-plus"></i> CREATE ANNOUNCEMENT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <h1 class="text-center text-bold m-3">What's New?</h1>
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch ">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Date : Oct 23, 2024
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-5 text-center">
                                                <img src="../images/brgylogo.png" alt="user-avatar" class="img-square img-fluid">
                                            </div>
                                            <div class="col-7">
                                                <h2 class="lead"><b>News Title</b></h2>
                                                <p class="text-muted text-sm">
                                                    <?php include('../loremipsum.txt') ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-sm btn-primary"> Edit</button>
                                        <button type="button" class="btn btn-sm btn-primary"> View More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch ">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Date : Oct 23, 2024
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-5 text-center">
                                                <img src="../images/brgylogo.png" alt="user-avatar" class="img-square img-fluid">
                                            </div>
                                            <div class="col-7">
                                                <h2 class="lead"><b>News Title</b></h2>
                                                <p class="text-muted text-sm">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-sm btn-primary"> Edit</button>
                                        <button type="button" class="btn btn-sm btn-primary"> View More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch ">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Date : Oct 23, 2024
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-5 text-center">
                                                <img src="../images/brgylogo.png" alt="user-avatar" class="img-square img-fluid">
                                            </div>
                                            <div class="col-7">
                                                <h2 class="lead"><b>News Title</b></h2>
                                                <p class="text-muted text-sm">
                                                    <?php include('../loremipsum.txt') ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-sm btn-primary"> Edit</button>
                                        <button type="button" class="btn btn-sm btn-primary"> View More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch ">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Date : Oct 23, 2024
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-5 text-center">
                                                <img src="../images/brgylogo.png" alt="user-avatar" class="img-square img-fluid">
                                            </div>
                                            <div class="col-7">
                                                <h2 class="lead"><b>News Title</b></h2>
                                                <p class="text-muted text-sm">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-sm btn-primary"> Edit</button>
                                        <button type="button" class="btn btn-sm btn-primary"> View More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>

    <?php include_once('../includes/script.php') ?>