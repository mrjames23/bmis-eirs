<?php
$page = 'Officials';
include_once('session.php');
?>

<?php include_once('../includes/head.php') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once('../includes/preloader.php') ?>
        <?php include_once('../includes/navbar.php') ?>
        <?php include_once('../includes/aside.php') ?>

        <div class="content-wrapper">
            <?php if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF') { ?>
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="card-title">Barangay Officials</h1>
                                <button class="btn btn-primary btn-sm card-title float-right create_official" data-toggle="modal" data-target="#modal">
                                    <i class="fa fa-plus"></i> ADD OFFICAL
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
                                        <h4 class="card-title">Official List</h4>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">#</th>
                                                    <th style="width: 20%">POSITION TITLE</th>
                                                    <th style="width: 20%">FULLNAME</th>
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
            <?php } ?>
            <?php if ($user['user_type'] == 'ADMIN') { ?>
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="card-title">Barangay Positions</h1>
                                <button class="btn btn-primary btn-sm card-title float-right create_position" data-toggle="modal" data-target="#modal_position">
                                    <i class="fa fa-plus"></i> ADD POSITION
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
                                        <h4 class="card-title">Positions List</h4>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="tablePositions" class="table table-hover table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">#</th>
                                                    <th style="width: 20%">POSITION TITLE</th>
                                                    <th style="width: 20%">PRIORITY LEVEL</th>
                                                    <th style="width: 20%">MEMBER COUNT</th>
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
            <?php } ?>
            <?php if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF' || $user['user_type'] == 'USER') { ?>
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="container image-container d-flex justify-content-center align-items-center" style="max-width: 700px;align-items: center;">
                            <div class="row">
                                <div class="col text-center ">
                                    <img src="../images/logo.png" class="img-fluid shadow-image p-2" alt="Image 1">
                                </div>
                                <div class="text-center m-5">
                                    <h1>BARANGAY OFFICIALS</h1>
                                </div>
                                <div class="col text-center">
                                    <img src="../images/lungsod.png" class="img-fluid shadow-image p-2" alt="Image 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="text-center mt-5" id="barangay_officials_list">
                            <h1>CANDIDATE NAME</h1>
                            <span class="h4">POSITION TITLE</span>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>
    <?php include_once('./modal/officials.php') ?>
    <?php include_once('../includes/script.php') ?>
    <script>
        $(function() {
            brgyOfficialList()

            $('#modal #form').submit(function(e) {
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
                            $('#modal form')[0].reset();
                            brgyOfficialList()
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
            $('#modal_position #form').submit(function(e) {
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
                            $('#modal_position').modal('hide')
                            $('#modal_position form')[0].reset();
                            table.ajax.reload(null, false)
                            tablePositions.ajax.reload(null, false)
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
            // Add official on modal show
            $(document).on('click', '.create_official', function() {
                $('#modal #action').val('create_official')
            });
            // Add position on modal show
            $(document).on('click', '.create_position', function() {
                $('#modal_position #action').val('create_position')
            });
            // Fetch and edit officials on modal show
            $(document).on('click', '#dataTable .edit', function() {
                $('#modal #action').val('edit_official')
                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        action: 'fetch_official',
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
                        $('#modal #fullname').val(response.fullname)
                        $('#modal #position_id').val(response.position_id)
                    },
                    error: function() {
                        error()
                    }
                });
            });
            // Fetch and edit positions on modal show
            $(document).on('click', '#tablePositions .edit', function() {
                $('#modal_position #action').val('edit_position')
                $.ajax({
                    type: "post",
                    url: "ajax",
                    data: {
                        action: 'fetch_position',
                        id: $(this).attr('id')
                    },
                    dataType: "json",
                    beforeSend: function() {
                        loading()
                    },
                    success: function(response) {
                        Swal.close();
                        $('#modal_position').modal('show')
                        $('#modal_position #id').val(response.id)
                        $('#modal_position #position_name').val(response.position_name)
                        $('#modal_position #level_priority').val(response.level_priority)
                        $('#modal_position #max_count').val(response.max_count)
                    },
                    error: function() {
                        error()
                    }
                });
            });
            // Delete officials
            $(document).on('click', '#dataTable .delete', function() {
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
                        var action = 'delete_official'
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
            // Delete positions
            $(document).on('click', '#tablePositions .delete', function() {
                let id = $(this).attr('id')
                let data = $(this).data('id')
                Swal.fire({
                    title: 'Confirm delete?',
                    html: 'Delete <b class="text-primary">' + data + '</b> from list?',
                    icon: 'question',
                    footer: '<b class="text-danger">Warning!&nbsp;</b>Deleting this position will also delete all it\'s members.',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var action = 'delete_position'
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
                    table: 'officials'
                },
            }
        });
        var tablePositions = $('#tablePositions').DataTable({
            "responsive": false,
            "autoWidth": false,
            'ordering': false,
            "scrollX": true,
            "ajax": {
                type: 'post',
                url: 'ajax',
                data: {
                    table: 'positions'
                },
            }
        });

        function brgyOfficialList() {
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'barangay_officials_list'
                },
                dataType: "json",
                success: function(response) {
                    $('#barangay_officials_list').html(response)
                }
            });
        }
    </script>