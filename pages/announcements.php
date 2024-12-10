<?php
$page = 'Announcements';
include_once('session.php');
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
                            <h1 class="card-title">Events & Announcements</h1>
                            <?php if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF') { ?>
                                <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                    <i class="fa fa-plus"></i> CREATE
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <h1 class="text-center text-bold m-3">What's New?</h1>
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row justify-content-center" id="announcements">
                            <?php
                            switch ($user['user_type']) {
                                case 'ADMIN':
                                    $sql = "SELECT * FROM announcement ORDER BY created_at DESC";
                                    break;

                                default:
                                    $sql = "SELECT * FROM announcement WHERE is_published = 1 ORDER BY created_at DESC";
                                    break;
                            }


                            $result = $conn->query($sql);
                            if ($result->rowCount() > 0) {
                                foreach ($result as $row) {

                                    if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF') {
                                        switch ($row['is_published']) {
                                            case 1:
                                                $is_published = 'checked';
                                                break;
                                            default:
                                                $is_published = '';
                                                break;
                                        }

                                        $btn_published = '<label for="publish">Publish&nbsp;</label>
                                                        <input type="checkbox" name="publish" data-bootstrap-switch data-on-color="success"  id="' . $row['id'] . '"' . $is_published . ' data-val="' . $row['news_title'] . '">';
                                        $btn_action = '<button type="button" class="btn btn-sm btn-primary edit" id="' . $row['id'] . '">
                                                            <i class="fa fa-edit"></i>&nbsp;Edit
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger delete" id="' . $row['id'] . '" data-id="' . $row['news_title'] . '">
                                                            <i class="fa fa-trash"></i>&nbsp;Delete
                                                        </button>';
                                    } else {
                                        $btn_published = '<label for="publish">Published</label>';
                                        $btn_action    = '';
                                    }


                                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch" id="news_data">
                                                <div class="card bg-light d-flex flex-fill">
                                                    <div class="card-header text-muted border-bottom-0">
                                                        Date : ' . date('M d, Y', strtotime($row['date_content'])) . '
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="col-5 text-center">
                                                                <img src="' . $row['content_image'] . '" alt="user-avatar" class="img-square img-fluid">
                                                            </div>
                                                            <div class="col-7">
                                                                <h2 class="lead"><b>' . $row['news_title'] . '</b></h2>
                                                                <p class="text-muted text-sm">
                                                                    ' . $row['content'] . '
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <div>' . $btn_published . '</div>
                                                        <div>' . $btn_action . '</div>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                }
                            } else {
                                echo '<div class="m-5">
                                        <h3 class="text-center">No news or announcements found!</h3>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>
    <?php include_once('./modal/announcements.php') ?>
    <?php include_once('../includes/script.php') ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('.img-content').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.img-content').attr('src', '../images/upload_image.png');
            }
        }

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
            });
            // Add announcement on modal show
            $(document).on('click', '.create', function() {
                $('#modal #action').val('create_announcement')
            });
            // Fetch and edit announcement on modal show
            $(document).on('click', '.edit', function() {
                $('#modal #action').val('edit_announcement')
                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        action: 'fetch_announcement',
                        id: $(this).attr('id')
                    },
                    dataType: "json",
                    beforeSend: function() {
                        loading()
                    },
                    success: function(response) {
                        Swal.close();
                        $('#modal').modal('show')
                        $('#modal #id').val(response.id)
                        $('#modal #date').val(response.date)
                        $('#modal #title').val(response.title)
                        $('#modal #content').val(response.content)
                        $('#modal .img-content').attr('src', response.image);
                    },
                    error: function() {
                        console.error()
                        // error()
                    }
                });
            });
            // Delete announcement
            $(document).on('click', '.delete', function() {
                let id = $(this).attr('id')
                let data = $(this).data('id')
                Swal.fire({
                    title: 'Confirm delete?',
                    html: 'Delete <b class="text-primary">' + data + '</b> from list?',
                    icon: 'question',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var action = 'delete_announcement'
                        $.ajax({
                            type: "post",
                            url: "ajax",
                            data: {
                                action: action,
                                id: id
                            },
                            dataType: "json",
                            beforeSend: function() {
                                loading()
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: response.title,
                                    html: response.html,
                                    text: response.text,
                                    icon: response.icon,
                                    allowOutsideClick: false,
                                })
                                window.location.reload()
                            },
                            error: function() {
                                error()
                            }
                        });
                    }
                })
            });
            //Change publish status
            $('input[name="publish"]').on('switchChange.bootstrapSwitch', function(event, state) {
                var switchValue = $(this).bootstrapSwitch('state');
                var switchid = $(this).attr('id');
                var title = $(this).data('val');
                console.log('Switch state:', switchValue); // Output: Switch state: true or false
                console.log('Switch Id:', switchid); // Output: Switch ID

                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        action: 'change_publish_status',
                        id: switchid,
                        switchValue: switchValue
                    },
                    dataType: "json",
                    beforeSend: function() {
                        loading()
                    },
                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            html: '<b>' + title + '</b> ' + response.html,
                            icon: response.icon
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
            $('#modal').on('hidden.bs.modal', function() {
                // Reset the form fields
                $('#form1')[0].reset();
            });
        })
    </script>