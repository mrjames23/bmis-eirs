<?php
$page = 'User Profiles';
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
                            <h1 class="card-title">User Profiles</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                <i class="fa fa-plus"></i> ADD RECORD
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
                                    <h4 class="card-title">Records</h4>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-hover table-head-fixed text-nowrap projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 5%">PHOTO</th>
                                                <th style="width: 20%">FULL NAME</th>
                                                <th style="width: 20%">NATIONAL ID</th>
                                                <th style="width: 20%">AGE</th>
                                                <th style="width: 20%">GENDER</th>
                                                <th style="width: 20%">CIVIL STATUS</th>
                                                <th style="width: 20%">VOTER STATUS</th>
                                                <th style="width: 20%">ACTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </section>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>
    <?php include_once('./modal/user_profiles.php') ?>
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
            const form2 = document.getElementById('form2');
            const form3 = document.getElementById('form3');
            const form4 = document.getElementById('form4');
            if (form4.checkValidity()) {
                // Here you can handle the form submission, e.g., send data to the server
                var data = new FormData()
                var form_data = $(form1).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                var form_data = $(form2).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                var form_data = $(form3).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                var form_data = $(form4).serializeArray()
                $.each(form_data, function(key, input) {
                    data.append(input.name, input.value)
                })
                data.append('file', $('#modal #file')[0].files[0])

                // Send the form data to the server using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php', // Replace with your server-side script
                    data: data,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        loading()
                    },
                    success: function(response) {
                        if (response.status == 'ok') {
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
                    error: function(xhr, status, error) {
                        error()
                    }
                });
            } else {
                form4.reportValidity();
            }
        }
        // Show add record modal
        $(document).on('click', '.create', function() {
            $('#modal #action').val('create_user_profile')
            $('#modal .img-content').attr('src', '../images/upload_image.png');
        });
        // Fetch and edit announcement on modal show
        $(document).on('click', '.edit', function() {
            $('#modal #action').val('edit_user_profile')
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    action: 'fetch_user_profile',
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
                    $('#modal .img-content').attr('src', response.image);
                    $('#modal #lname').val(response.lname)
                    $('#modal #fname').val(response.fname)
                    $('#modal #mname').val(response.mname)
                    $('#modal #suffix').val(response.suffix)
                    $('#modal #bdate').val(response.bdate)
                    $('#modal #age').val(response.age)
                    $('#modal #birth_place').val(response.birth_place)
                    $('#modal #gender').val(response.gender)
                    $('#modal #civil_status').val(response.civil_status)
                    $('#modal #citizenship').val(response.citizenship)
                    $('#modal #voter_status').val(response.voter_status)
                    $('#modal #occupation').val(response.occupation)

                    $('#modal #province').html(response.list_province)
                    $('#modal #city').html(response.list_city)
                    $('#modal #brgy').html(response.list_brgy)

                    $('#modal #region').val(response.region)
                    $('#modal #province').val(response.province)
                    $('#modal #city').val(response.city)
                    $('#modal #brgy').val(response.brgy)
                    $('#modal #street').val(response.street)
                    $('#modal #contact_no').val(response.contact_no)
                    $('#modal #email').val(response.email)
                },
                error: function() {
                    console.error()
                    error()
                }
            });
        });
        // Delete record
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('id')
            let data = $(this).data('val')
            Swal.fire({
                title: 'Confirm delete?',
                html: 'Delete profile : <b class="text-primary">' + data + '</b> from list?',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    var action = 'delete_user_profile'
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
        // Reset step tab on modal close
        $(document).ready(function() {
            var stepper = new Stepper($('.bs-stepper')[0])
            $('#modal').on('hidden.bs.modal', function() {
                // Reset the form fields
                $('#form1')[0].reset();
                $('#form2')[0].reset();
                $('#form3')[0].reset();
                $('#form4')[0].reset();
            });

        });
        //Fetch address selection
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

        function fetchAddress(tbl, val) {
            $.ajax({
                type: "post",
                url: "ajax",
                data: {
                    fetch: 'address',
                    val: val,
                    tbl: tbl
                },
                dataType: "json",
                success: function(response) {
                    return response.data
                }
            });
        }
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
                    table: 'user_profile'
                },
            }
        });
    </script>