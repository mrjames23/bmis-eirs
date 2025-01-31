<?php
$page = 'Reservations';
include_once('session.php');
?>

<?php include_once('../includes/head.php') ?>
<style>
    .card-inventory {
        transition: box-shadow 0.3s ease;
        /* Smooth transition */
    }

    .card-inventory:hover {
        box-shadow: 0 4px 20px rgb(23 162 184 / 57%)
            /* Shadow effect */
    }

    .card-inventory img {
        mix-blend-mode: multiply;
    }

    .card-body {
        max-height: 700px;
        /* Set the maximum height */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }
</style>

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
                            <h1 class="card-title m-0">Equipments and Reservations</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-header border-0">
                            <h4 class="card-title">LIST OF EQUIPMENT INVENTORY / VEHICLE / VENUE</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                            <div class="card-tools mr-1">
                                <select class="custom-select" name="select_inventory_type" id="select_inventory_type">
                                    <option value="" selected hidden disabled>ALL CATEGORY</option>
                                    <option value="">ALL CATEGORY</option>
                                    <?php
                                    $sql = "SELECT DISTINCT category FROM equipments";
                                    $result = $conn->query($sql);
                                    if ($result->rowCount() > 0) {
                                        foreach ($result as $row) {
                                            echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="inventory_list_overlay">

                        </div>
                        <div class="card-body">
                            <div class="row" id="inventory_list">
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Vehicle
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>AMBULANCE</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/ambulance.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-gray-light">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>
                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Vehicle
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>RESCUE VEHICLE</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/rescue.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Equipment
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>LADDER</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/ladder.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>2
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Equipment
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>TOLDA</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/tolda.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>6
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Venue
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>BASKETBALL COURT</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/basketballcourt.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Vehicle
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>AMBULANCE</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/ambulance.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-gray-light">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Vehicle
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>RESCUE VEHICLE</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/rescue.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Equipment
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>LADDER</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/ladder.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>2
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Equipment
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>TOLDA</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/tolda.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>6
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill card-inventory">
                                        <div class="card-header text-muted border-bottom-0">
                                            Venue
                                        </div>
                                        <div class="card-body pt-0 pb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="lead"><b>BASKETBALL COURT</b></h2>
                                                    <p class="text-muted text-sm"><b>Details: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <img src="../images/inventory/basketballcourt.jpg" alt="image" class="img-box img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <span>
                                                <b class="text-success">Available: </b>1
                                            </span>
                                            <span>

                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus"></i> RESERVE
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid mt-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">RESERVATION LIST</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                            <div class="card-tools mr-1">
                                <select class="custom-select" name="select_cert_type" id="select_cert_type">
                                    <option value="" selected hidden disabled>ALL CATEGORY</option>
                                    <option value="">ALL CATEGORY</option>
                                    <?php
                                    $sql = "SELECT DISTINCT category FROM equipments";
                                    $result = $conn->query($sql);
                                    if ($result->rowCount() > 0) {
                                        foreach ($result as $row) {
                                            echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="width: 20%">REQUEST STATUS</th>
                                        <th style="width: 20%">DATE REQUEST</th>
                                        <th style="width: 20%">CONTROL NO.</th>
                                        <th style="width: 20%">ITEM RESERVATIONS</th>
                                        <th style="width: 20%">RESERVATION DATE</th>
                                        <th style="width: 20%">RETURNING DATE</th>
                                        <th style="width: 20%" class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>
    <?php include_once('./modal/certificate.php') ?>
    <?php include_once('./modal/email_notification.php') ?>
    <?php include_once('../includes/script.php') ?>
    <script>
        // Select certificate purpose
        $(document).on('change', '[name="select_inventory_type"]', function() {
            var category = $(this).val();
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'inventory_list',
                    category: category
                },
                dataType: "json",
                beforeSend: function() {
                    cardLoadingOn('#inventory_list_overlay')
                },
                success: function(response) {
                    cardLoadingOff('#inventory_list_overlay')
                    $('#inventory_list').html(response)
                },
                error: function() {
                    cardLoadingOff('#inventory_list_overlay')
                    error()
                }
            });
        });





        // Add announcement on modal show
        $(document).on('click', '.create', function() {
            $('#modal #action').val('create_request_certificate')
        });
        // Fetch and edit announcement on modal show
        $(document).on('click', '.edit', function() {
            $('#modal #action').val('edit_request_certificate')
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
                    var action = 'delete_request_certificate'
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
        // Process request
        $(document).on('click', '.process', function() {
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    id: $(this).attr('id'),
                    status: $(this).data('id'),
                    action: 'process_request_certificate'
                },
                dataType: "json",
                beforeSend: function() {
                    loading()
                },
                success: function(response) {
                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        html: response.html,
                        icon: response.icon,
                        allowOutsideClick: false,
                    })
                    table.ajax.reload(null, false)
                },
                error: () => {
                    error()
                }
            });
        });
        // Decline request
        $(document).on('click', '.decline', function() {
            let id = $(this).attr('id')
            let data = $(this).data('id')
            let val = $(this).data('val')
            Swal.fire({
                title: 'Decline request?',
                html: 'Confirm decline request for<b class="text-primary">&nbsp;' + data + '</b>.',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                input: 'text',
                inputPlaceholder: 'Enter reason for declining request',
                preConfirm: (result) => {
                    if (result === '') {
                        Swal.showValidationMessage('Please enter decline remarks')
                    }
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "ajax",
                        data: {
                            id: $(this).attr('id'),
                            email: val,
                            remarks: result.value,
                            action: 'decline_request_certificate'
                        },
                        dataType: "json",
                        beforeSend: function() {
                            loading()
                        },
                        success: function(response) {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                            table.ajax.reload(null, false)
                        },
                        error: () => {
                            error()
                        }
                    });
                }
            });
        });
        // Undo decline request
        $(document).on('click', '.undo', function() {
            let id = $(this).attr('id')
            let data = $(this).data('id')
            Swal.fire({
                title: 'Confirm Undo?',
                html: 'Remove decline request for<b class="text-primary">&nbsp;' + data + '</b>.',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "ajax",
                        data: {
                            id: $(this).attr('id'),
                            action: 'undo_request_certificate'
                        },
                        dataType: "json",
                        beforeSend: function() {
                            loading()
                        },
                        success: function(response) {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                            table.ajax.reload(null, false)
                        },
                        error: () => {
                            error()
                        }
                    });
                }
            });
        });
        // Approve request
        $(document).on('click', '.approve', function() {
            let id = $(this).attr('id')
            let data = $(this).data('id')
            let val = $(this).data('val')
            const today = (new Date()).toISOString();
            Swal.fire({
                title: 'Approve request?',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                text: '123',
                html: `<br>Confirm and enter claiming date for certificate request of</br><b class="text-primary">&nbsp;` + data + `</b></p>.
                        <input id="date" class="swal2-input" type="date" min="` + today.split("T")[0] + `">`,
                focusConfirm: false,

                preConfirm: () => {
                    const date = Swal.getPopup().querySelector('#date').value
                    if (!date) {
                        Swal.showValidationMessage('Please select claiming date!')
                    }
                    return {
                        date: date,
                    }
                }
            }).then((result) => {
                var date = $('#date').val()
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "ajax",
                        data: {
                            id: $(this).attr('id'),
                            date: date,
                            email: val,
                            action: 'approve_request_certificate'
                        },
                        dataType: "json",
                        beforeSend: function() {
                            loading()
                        },
                        success: function(response) {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                            table.ajax.reload(null, false)
                        },
                        error: () => {
                            error()
                        }
                    });
                }
            });
        });
        // Claim request
        $(document).on('click', '.claim', function() {
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    id: $(this).attr('id'),
                    email: $(this).data('val'),
                    action: 'claim_request_certificate'
                },
                dataType: "json",
                beforeSend: function() {
                    loading()
                },
                success: function(response) {
                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        html: response.html,
                        icon: response.icon,
                        allowOutsideClick: false,
                    })
                    table.ajax.reload(null, false)
                },
                error: () => {
                    error()
                }
            });
        });
        $(document).on('change', '#select_cert_type', function() {

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
                        table: 'certificates',
                        filter: $(this).val()
                    },
                }
            });
        });

        // Condition if selected Cert Purpose is OTHERS
        $(document).on('change', '[name="purpose"]', function() {
            if ($(this).val() == 'Others') {
                $('#form2 #specify').prop('disabled', 0)
                $('#form2 #specify').prop('required', 1)
            } else {
                $('#form2 #specify').prop('disabled', 1)
                $('#form2 #specify').prop('required', 0)
                $('#form2 #specify').val('')
            }
        });
        // Condition if selected Proof of residency
        $(document).on('change', '[name="purpose"]', function() {
            if ($(this).val() == 'Proof for Barangay Residency') {
                $('#form2 #years').prop('disabled', 0)
                $('#form2 #years').prop('required', 1)
            } else {
                $('#form2 #years').prop('disabled', 1)
                $('#form2 #years').prop('required', 0)
                $('#form2 #years').val('')
            }
        });
        // Fetch address selection
        $(document).on('change', '.address', function() {
            var id = $(this).attr('id')
            var data = $(this).data('id')
            var col = $(this).data('val')
            var code = $(this).data('code')
            var val = $(this).val()

            switch (data) {
                case 'refprovince':
                    $('#city').html('<option value="" selected hidden disabled>Pumili ng City</option><option value="" disabled>Pumili muna ng Probinsya</option>')
                    $('#brgy').html('<option value="" selected hidden disabled>Pumili ng Barangay</option><option value="" disabled>Pumili muna ng City</option>')
                    break;
                case 'refcitymun':
                    $('#brgy').html('<option value="" selected hidden disabled>Pumili ng Barangay</option><option value="" disabled>Pumili muna ng City</option>')
                    break;
                case 'refcitymun':
                    $('#brgy').html('<option value="" selected hidden disabled>Pumili ng Barangay</option><option value="" disabled>Pumili muna ng City</option>')
                    break;
                default:
                    break;
            }

            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'address',
                    id: id,
                    data: data,
                    col: col,
                    code: code,
                    val: val
                },
                dataType: "json",
                success: function(response) {
                    $(response.id).html(response.data)
                },
                error: function() {
                    error()
                }
            });
        });
        // Email Notification
        $(document).on('click', '.notification', function() {
            var type = 'Certificate Request'
            $('#modal_notification #type').val(type)
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'email_notification',
                    type: type
                },
                dataType: "json",
                success: function(response) {
                    $('#modal_notification #subject_title').val(response.subject_title)
                    $('#modal_notification #message_content').val(response.message_content)
                },
                error: function() {
                    error()
                }
            });
        });
        // Submit Email notification
        $('#modal_notification #form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "ajax",
                data: $(this).serialize(),
                dataType: "json",
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
                    $('#modal_notification').modal('hide')
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
    </script>
    <script>
        // var table = $('#dataTable').DataTable({
        //     "responsive": false,
        //     "autoWidth": false,
        //     'ordering': false,
        //     "scrollX": true,
        //     "destroy": true,
        //     "ajax": {
        //         type: 'post',
        //         url: 'ajax',
        //         data: {
        //             table: 'certificates',
        //             filter: ''
        //         },
        //     }
        // });
    </script>