<?php
include_once('../includes/config.php');
$page = 'User Profiles';
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
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal_create_user">
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
                                    <table id="dataTable" class="table table-hover table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>FULL NAME</th>
                                                <th>NATIONAL ID</th>
                                                <th>AGE</th>
                                                <th>GENDER</th>
                                                <th>CIVIL STATUS</th>
                                                <th>IS VOTER</th>
                                                <th class="text-center">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Dela Cruz, John Doe</td>
                                                <td>1234</td>
                                                <td>23</td>
                                                <td>Male</td>
                                                <td>Single</td>
                                                <td>Yes</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Dela Cruz, John Doe</td>
                                                <td>1234</td>
                                                <td>23</td>
                                                <td>Male</td>
                                                <td>Single</td>
                                                <td>Yes</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
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
    <?php include_once('../includes/script.php') ?>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "responsive": false,
                "autoWidth": false,
                'ordering': false,
                "scrollX": true,
                // "ajax": {
                //     type: 'post',
                //     url: 'ajax',
                //     data: {
                //         table: ''
                //     },
                // }
            });
        })
    </script>