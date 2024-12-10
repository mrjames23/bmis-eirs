<?php
$page = 'Settings';
include_once('session.php');
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
                                    <h4>Upload Logo</h4><span class="text-muted">(JPEG/JPG image only)</span>
                                    <div class="text-center">
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <img class="img-thumbnail img-profile img-circle" id="logo" src="<?= $system_logo ?>" title="Upload logo" style="cursor:pointer; width: 160px; height: 160px;" />
                                            </label>
                                            <input id="file-input" type="file" accept=".jpg,.png" onchange="readURL(this);" name="file" id="file" hidden />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmpId">System Name</label>
                                        <input type="text" class="form-control" name="sys_name" id="sys_name" value="<?= $settings['sys_name'] ?? '' ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Barangay Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $settings['email'] ?? '' ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Barangay Address</label>
                                        <input type="address" class="form-control" name="address" id="address" value="<?= $settings['address'] ?? '' ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Barangay Mobile No.</label>
                                        <input type="text" class="form-control" name="contact" id="contact" value="<?= $settings['contact'] ?? '' ?>" required data-inputmask='"mask": "(9999)999-9999"' data-mask />
                                    </div>
                                    <div class="form-group">
                                        <label for="vision">Vision</label>
                                        <textarea class="form-control" name="vision" id="vision" rows="3" required><?= $settings['vision'] ?? '' ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="mission">Mission</label>
                                        <textarea class="form-control" name="mission" id="mission" rows="3" required><?= $settings['mission'] ?? '' ?></textarea>
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

                var contact = $('[name="contact"]').val().replace(/[^0-9]/gi, '');
                if (contact.length != 11) {
                    $('[name="contact"]').addClass('is-invalid')
                } else {
                    $('[name="contact"]').removeClass('is-invalid')
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
                            if (response.icon == 'success') {
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
                }
            });

            $(document).on('change keypress', '[name="contact"]', function(e) {
                e.preventDefault();
                var contact = $(this).val().replace(/[^0-9]/gi, '');
                if (contact.length != 11) {
                    $('[name="contact"]').addClass('is-invalid')
                } else {
                    $('[name="contact"]').removeClass('is-invalid')
                }
            });

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