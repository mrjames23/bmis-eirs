<?php
$page = 'User Accounts';
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
                            <h1 class="card-title">User Accounts</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                <i class="fa fa-plus"></i> ADD USER
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h4 class="card-title">User List</h4>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">EMAIL</th>
                                                <th style="width: 20%">USER TYPE</th>
                                                <th style="width: 20%">DATE REGISTERED</th>
                                                <th style="width: 20%">ACCOUNT STATUS</th>
                                                <th style="width: 20%">IS ACTIVE</th>
                                                <th style="width: 20%">ACTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>
    <?php include_once('./modal/user_accounts.php') ?>
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
                        if (response.icon == 'success') {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                            table.ajax.reload(null, false)
                            $('#modal').modal('hide')
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
                    error: function() {
                        error();
                    }
                });
            });
            // Add announcement on modal show
            $(document).on('click', '.create', function() {
                $('#modal #action').val('create_account')
            });
            // Fetch and edit announcement on modal show
            $(document).on('click', '.edit', function() {
                $('#modal #action').val('edit_account')
                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        action: 'fetch_account',
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
                        $('#modal #email').val(response.email)
                        $('#modal #pass').val(response.pass)
                        $('#modal #pass2').val(response.pass)
                        $('#modal #user_type').val(response.user_type)
                    },
                    error: function() {
                        error()
                    }
                });
            });
            // Delete Account
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
                        var action = 'delete_account'
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
                                table.ajax.reload(null, false)
                            },
                            error: function() {
                                error()
                            }
                        });
                    }
                })
            });
            // set active/inactive
            $(document).on('click', '.custom-switch input[type="checkbox"]', function() {
                let id = $(this).data('id');
                let status = $(this).is(':checked')
                let table = 'users'

                if (status == 0) {
                    $("label[for='" + $(this).attr('id') + "']").text('OFF')
                } else {
                    $("label[for='" + $(this).attr('id') + "']").text('ON ')
                }

                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        fetch: 'set_active',
                        id: id,
                        status: status,
                        tbl: table
                    },
                    dataType: "json",
                    success: function(response) {
                        Toast.fire({
                            title: response.title,
                            icon: response.icon,
                        });
                    },
                    error: function() {
                        error()
                    }
                });
                console.log(status)

            });
            // VALIDATE USER PASS INPUT
            $('#modal #pass').focusout(function() {
                var pass1 = $('#pass')
                var pass2 = $('#pass2')
                validatePass(pass1, pass2)
            });
            $('#modal #pass2').focusout(function() {
                var pass1 = $('#pass')
                var pass2 = $('#pass2')
                validatePass(pass1, pass2)
            });
            $('#modal').on('hidden.bs.modal', function() {
                $('#form')[0].reset()
                $('[name="pass"]').removeClass('is-valid')
                $('[name="pass2"]').removeClass('is-valid')
            })

            function validatePass(pass1, pass2) {
                if (pass1.val() != '' & pass2.val() != '') {
                    if (pass1.val() == pass2.val()) {
                        $(pass1).addClass('is-valid')
                        $(pass1).removeClass('is-invalid')
                        $(pass2).addClass('is-valid')
                        $(pass2).removeClass('is-invalid')
                        return true
                    } else {
                        $(pass1).addClass('is-invalid')
                        $(pass2).addClass('is-invalid')
                        return false
                    }
                } else {
                    $(pass1).removeClass('is-valid is-invalid')
                    $(pass2).removeClass('is-valid is-invalid')
                    return false
                }
            }
        })
    </script>
    <script>
        var table = $('#dataTable').DataTable({
            "responsive": false,
            "autoWidth": false,
            'ordering': false,
            "scrollX": true,
            "ajax": {
                type: 'post',
                url: 'ajax',
                data: {
                    table: 'user_accounts'
                },
            }
        });
    </script>