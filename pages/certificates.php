<?php
$page = 'Certificates';
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
                            <h1 class="card-title">Certificates</h1>
                            <?php if ($user['user_type'] == 'USER') { ?>
                                <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                    <i class="fa fa-plus"></i> REQUEST CERTIFICATE
                                </button>
                            <?php } ?>
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
                                        <select class="custom-select" name="select_cert_type" id="select_cert_type">
                                            <option value="" selected hidden disabled>All Certificate Request</option>
                                            <option value="">All Certificate Request</option>
                                            <?php
                                            $sql = "SELECT DISTINCT certificates.cert_type FROM certificates";
                                            $result = $conn->query($sql);
                                            if ($result->rowCount() > 0) {
                                                foreach ($result as $row) {
                                                    echo '<option value="' . $row['cert_type'] . '">' . $row['cert_type'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </h4>
                                    <div class="card-tools">
                                        <?php if ($user['user_type'] == 'ADMIN' || $user['user_type'] == 'STAFF') { ?>
                                            <button class="btn btn-info btn-sm notification" data-toggle="modal" data-target="#modal_notification">
                                                <i class="fa fa-envelope"></i>&nbsp;EMAIL NOTIFICATION
                                            </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 20%">STATUS</th>
                                                <th style="width: 20%">DATE REQUEST</th>
                                                <th style="width: 20%">FULL NAME</th>
                                                <th style="width: 20%">CERTIFICATE REQUEST</th>
                                                <th style="width: 20%">DETAILS</th>
                                                <th style="width: 20%">REMARKS STATUS</th>
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
    <?php include_once('./modal/certificate.php') ?>
    <?php include_once('./modal/email_notification.php') ?>
    <?php include_once('../includes/script.php') ?>
    <script>
        // Initialize the stepper
        const stepper = new Stepper(document.querySelector('#stepper'), {
            linear: true,
            animation: true,
        });

        function nextStep(currentStep) {
            const form = document.getElementById(`form${currentStep}`);
            if (form.checkValidity()) {
                stepper.next();
            } else {
                form.reportValidity();
            }
        }

        function prevStep(currentStep) {
            stepper.previous();
        }

        function submitForm(event) {
            event.preventDefault();
            const form1 = document.getElementById('form1');
            const form = document.getElementById('form2');
            if (form.checkValidity()) {
                // Here you can handle the form submission, e.g., send data to the server
                var data = new FormData()
                var form_data = $(form1).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                var form_data = $(form).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                // Send the form data to the server using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'ajax', // Replace with your server-side script
                    data: data,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        loading()
                    },
                    success: function(response) {
                        if (response.icon == 'success') {
                            $('#modal').modal('hide')
                            $('#modal form').trigger('reset')
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                html: response.html,
                                icon: response.icon,
                                allowOutsideClick: false,
                            })
                            table.ajax.reload(null, false)
                            stepper.reset()
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
                        error()
                    }
                });
            } else {
                form.reportValidity();
            }
        }

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
        // Select certificate purpose
        $(document).on('change', '[name="cert_type"]', function() {
            var cert_type = $(this).val();
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'cert_purpose',
                    cert_type: cert_type
                },
                dataType: "json",
                success: function(response) {
                    $('#modal #form2 .form-group').html(response)
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
                    table: 'certificates',
                    filter: ''
                },
            }
        });
    </script>