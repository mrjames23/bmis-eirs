<?php
include_once('session.php');
$page = 'Announcements';
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
                            <h1 class="card-title">Announcements</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                <i class="fa fa-plus"></i> CREATE
                            </button>
                        </div>
                    </div>


                    <!-- <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Logins</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Various information</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="container mt-5">
                        <div id="stepper" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#test-l-1">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="test-l-1" id="stepperTrigger1">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Step 1</span>
                                    </button>
                                </div>
                                <div class="step" data-target="#test-l-2">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="test-l-2" id="stepperTrigger2">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Step 2</span>
                                    </button>
                                </div>
                                <div class="step" data-target="#test-l-3">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="test-l-3" id="stepperTrigger3">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Step 3</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="test-l-1" class="content" role="tabpanel" aria-labelledby="stepperTrigger1">
                                    <form id="form1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" required>
                                        </div>
                                        <button class="btn btn-primary" type="button" onclick="nextStep(1)">Next</button>
                                    </form>
                                </div>
                                <div id="test-l-2" class="content" role="tabpanel" aria-labelledby="stepperTrigger2">
                                    <form id="form2">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(2)">Previous</button>
                                        <button class="btn btn-primary" type="button" onclick="nextStep(2)">Next</button>
                                    </form>
                                </div>
                                <div id="test-l-3" class="content" role="tabpanel" aria-labelledby="stepperTrigger3">
                                    <form id="form3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" required>
                                        </div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(3)">Previous</button>
                                        <button class="btn btn-success" type="submit" onclick="submitForm(event)">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <section class="content">
                <h1 class="text-center text-bold m-3">What's New?</h1>
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row justify-content-center">
                            <?php
                            $sql = "SELECT * FROM announcement ORDER BY created_at DESC";
                            $result = $conn->query($sql);
                            if ($result->rowCount() > 0) {
                                foreach ($result as $row) {
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
                                                        <div>
                                                            <label for="publish">Publish&nbsp;</label>
                                                            <input type="checkbox" name="publish" id="publish" data-bootstrap-switch data-on-color="success">
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-primary edit" id="' . $row['id'] . '">
                                                                <i class="fa fa-edit"></i>&nbsp;Edit
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger delete" id="' . $row['id'] . '" data-id="' . $row['news_title'] . '">
                                                                <i class="fa fa-trash"></i>&nbsp;Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       ';
                                }
                            ?>
                            <?php } else { ?>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex align-items-stretch">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            Date : Dec 25, 2024
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-5 text-center">
                                                    <img src="../images/logo.png" alt="image" class="img-square img-fluid">
                                                </div>
                                                <div class="col-7">
                                                    <h2 class="lead"><b>News Title (Sample Only)</b></h2>
                                                    <p class="text-muted text-sm">
                                                        <?php include('../loremipsum.txt'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <div>
                                                <label for="publish">Publish&nbsp;</label>
                                                <input type="checkbox" name="publish" id="publish" data-bootstrap-switch data-on-color="success">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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
                    $('.img-content')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('.img-content')
                    .attr('src', '../images/upload_image.png');
            }
        }
        // BS-Stepper Init
        // document.addEventListener('DOMContentLoaded', function() {
        //     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        // })

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

            $(document).on('click', '.create', function() {
                $('#modal #action').val('create_announcement')
            });
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
                        $('#modal #date').val(response.date)
                        $('#modal #title').val(response.title)
                        $('#modal #content').val(response.content)

                    },
                    error: function() {
                        console.error()
                        // error()
                    }
                });
            });
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
            $(document).on('click', 'input[data-bootstrap-switch]', function() {

            })






            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        })
    </script>
    <script>
        const stepper = new Stepper(document.querySelector('#stepper'));

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
            const form = document.getElementById('form3');
            if (form.checkValidity()) {
                alert('Form submitted successfully!');
                // Here you can handle the form submission, e.g., send data to the server
                const formData = $(form).serialize();

                // Send the form data to the server using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php', // Replace with your server-side script
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Form submitted successfully!');
                        // Handle the server response as needed
                    },
                    error: function(xhr, status, error) {
                        alert('Error submitting the form. Please try again.');
                        // Handle the error response
                    }
                });
            } else {
                form.reportValidity();
            }
        }
    </script>