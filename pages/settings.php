<?php
include_once('session.php');
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
                        <form id="form" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="">
                                    <h4>Upload Logo</h4>
                                    <div class="text-center">
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <img class="img-thumbnail img-profile img-circle" id="logo" src="<?= $system_logo ?>" title="Upload logo" style="cursor:pointer; width: 160px; height: 160px;" />
                                            </label>
                                            <input id="file-input" type="file" accept=".png, .jpg" onchange="readURL(this);" name="file" id="file" hidden  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmpId">System Name</label>
                                        <input type="text" class="form-control" name="sys_name" id="sys_name" value="<?= $system_name ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" id="action" value="update_settings">
                                <button type="submit" class="btn btn-primary" id="btn_submit">
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
    <script>
        $(function() {
            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax",
                    data: new FormData($(this)[0]),
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        loading();
                    },
                    success: function(response) {
                        Swal.close()
                        if (response.status == 'ok') {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload()
                                }
                            })

                        } else {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                        }
                    },
                    error: function(error) {
                        console.error();
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong!',
                            icon: 'error',
                            confirmButtonText: 'Exit'
                        })
                    }
                });
            })

            $(document).on('click', '.create', function() {
                $('#modal #action').val('create_barangay_info')
            })
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#logo')
                    .attr('src', '../images/default-150x150.png');
            }
        }
    </script>