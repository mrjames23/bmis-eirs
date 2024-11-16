<?php
include_once('../includes/config.php');
$page = 'Settings';
?>

<?php include_once('../includes/head.php') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once('../includes/preloader.php') ?>
        <?php include_once('../includes/navbar.php') ?>
        <?php include_once('../includes/aside.php') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Settings</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h1 class="card-title">System Settings</h1>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form id="response_settings_form" action="">
                            <div class="card-body">
                                <div class="">
                                    <h4>Upload Logo</h4>
                                    <div class="text-center">
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <img class="img-thumbnail img-profile img-circle" src="../images/default-150x150.png" title="Upload logo" style="cursor:pointer; width: 160px; height: 160px;" />
                                            </label>
                                            <input id="file-input" type="file" accept=".png, .jpg" onchange="readURL(this);" name="img" id="img" hidden />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmpId">System Name</label>
                                        <input type="text" class="form-control" name="sys_name" id="sys_name" />
                                    </div>
                                    <h4>Chat Defaults</h4>
                                    <div class="form-group">
                                        <label for="inputEmpId">Welcome Message</label>
                                        <textarea type="text" name="sys_msg_welcome" id="sys_msg_welcome" class="form-control form-control-sm rounded-0"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmpId">No Answer Message</label>
                                        <textarea type="text" name="sys_msg_noanswer" id="sys_msg_noanswer" class="form-control form-control-sm rounded-0"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" id="action">
                                <button type="submit" class="btn btn-success" id="btn_submit">
                                    <li class="fa fa-save"></li>&nbsp;&nbsp;SAVE DETAILS
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>

    <?php include_once('../includes/script.php') ?>