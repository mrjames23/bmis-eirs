<?php
$page = 'Inventory ';
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
                    <div class="row mb-1">
                        <div class="col-sm-12">
                            <h1 class="card-title m-0">Inventory</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                <i class="fa fa-plus"></i> CREATE ITEM
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
                                    <h4 class="card-title">
                                        <select class="custom-select" name="select_category" id="select_category">
                                            <option value="" selected hidden disabled>ALL CATEGORY</option>
                                            <option value="">All CATEGORY</option>
                                            <option value="VEHICLE">VEHICLES</option>
                                            <option value="EQUIPMENT">EQUIPMENTS</option>
                                            <option value="VENUE">VENUES</option>
                                        </select>
                                    </h4>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">IMAGE</th>
                                                <th style="width: 20%">CONTROL #</th>
                                                <th style="width: 20%">CATEGORY</th>
                                                <th style="width: 20%">ITEM NAME</th>
                                                <th style="width: 20%">DESCRIPTION</th>
                                                <th style="width: 20%">QUANTITY</th>
                                                <th style="width: 20%">STATUS</th>
                                                <th style="width: 20%" class="text-center">ACTION</th>
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
    <?php include_once('./modal/inventory.php') ?>
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
                $('#modal #file').prop('required', 1)
            }
        }
        // Submit Create Item
        $('#modal #form').submit(function(e) {
            e.preventDefault();
            if ($('#summernote').summernote('isEmpty')) {
                $('.note-editor').css('border', '1px solid red');
                $('.note-editable').focus()
                alert_toast('Item description is required.', 'error');
                e.preventDefault();
                return false;
            }
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
                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        html: response.html,
                        icon: response.icon,
                        allowOutsideClick: false,
                    })
                    $('#modal').modal('hide')
                    table.ajax.reload(null, false)
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
            $('#modal #action').val('create_inventory_item')
            $('#modal .modal-title').val('Create Item')
        });
        // Fetch and edit announcement on modal show
        $(document).on('click', '.edit', function() {
            $('#modal .modal-title').val('Edit Item')
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    action: 'fetch_inventory_item',
                    id: $(this).attr('id')
                },
                dataType: "json",
                beforeSend: function() {
                    loading()
                },
                success: function(response) {
                    Swal.close();
                    $('#modal').modal('show')
                    $('#modal #action').val('edit_inventory_item')
                    $('#modal #id').val(response.id)
                    $('#modal #category').val(response.category)
                    $('#modal #item_name').val(response.item_name)
                    $('#modal #qty').val(response.qty)
                    $('#modal #summernote').summernote('code', response.desc);
                    $('#modal #item_status').val(response.item_status);
                    $('#modal img').attr('src', response.photo);
                    $('#modal #file').prop('required', 0)
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
                html: 'Delete Item Control No. <b class="text-primary">' + data + '</b> from list?',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    var action = 'delete_inventory_item'
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
        // Select inventory category filter
        $(document).on('change', '#select_category', function() {
            $('#dataTable').DataTable({
                "responsive": false,
                "autoWidth": false,
                'ordering': false,
                "scrollX": true,
                "destroy": true,
                "ajax": {
                    type: 'post',
                    url: 'ajax',
                    data: {
                        table: 'inventory',
                        filter: $(this).val()
                    },
                }
            });
        });
        // Reset form fields on modal close
        $('#modal').on('hidden.bs.modal', function() {
            $('#modal #form')[0].reset();
            $('#modal #summernote').summernote('code', '');
            $('#modal img').attr('src', '../images/upload_image.png');
        });
    </script>
    <script>
        var table = $('#dataTable').DataTable({
            "responsive": false,
            "autoWidth": false,
            'ordering': false,
            "scrollX": true,
            "destroy": true,
            "ajax": {
                type: 'post',
                url: 'ajax',
                data: {
                    table: 'inventory',
                    filter: ''
                },
            }
        });
    </script>