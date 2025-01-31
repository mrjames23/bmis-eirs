<?php
$page = 'Dashboard';
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
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <div class="breadcrumb float-sm-right">
                                <select class="custom-select" name="" id="">
                                    <option selected>Latest report summary (2025)</option>
                                    <option value="">Year 2024 report summary</option>
                                    <option value="">Year 2023 report summary</option>
                                    <option value="">Year 2022 report summary</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <!-- Count Summary -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>3</h3>
                                    <p>VEHICLES</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-ambulance"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>202</h3>
                                    <p>EQUIPMENTS</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>3</h3>
                                    <p>VENUES</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-warehouse"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>5,205</h3>
                                    <p>RESERVATIONS</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list-ol"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Graphs Report-->
                    <div class="row">
                        <div class="col-lg-7">
                            <!-- Bar Graph -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Monthly Reservation Summary</h3>
                                        <a href="javascript:void(0);">View Report</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">5,205</span>
                                            <span>Reservation Count</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> 33.1%
                                            </span>
                                            <span class="text-muted">Since last year</span>
                                        </p>
                                    </div>
                                    <div class="position-relative mb-4">
                                        <canvas id="sales-chart" height="200"></canvas>
                                    </div>

                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> This year
                                        </span>

                                        <span>
                                            <i class="fas fa-square text-gray"></i> Last year
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Line Graph -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Monthly Reservation Rate</h3>
                                        <a href="javascript:void(0);">View Report</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">820</span>
                                            <span>Rate Per Category Item</span>
                                        </p>
                                    </div>
                                    <div class="position-relative mb-4">
                                        <canvas id="visitors-chart" height="200"></canvas>
                                    </div>

                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-info"></i> Vehicles
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-square text-success"></i> Equipments
                                        </span>
                                        <span>
                                            <i class="fas fa-square text-warning"></i> Venues
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- PIE CHART -->
                            <div class="card">
                                <div class="card-header border-0 mt-1">
                                    <h3 class="card-title">Most Borrowed Category</h3>
                                    <div class="card-tools">
                                        <div class="btn btn-tool">
                                            <select class="custom-select" name="" id="">
                                                <option selected>Select Month</option>
                                                <option value="">January</option>
                                                <option value="">February</option>
                                                <option value="">March</option>
                                                <option value="">April</option>
                                                <option value="">May</option>
                                                <option value="">June</option>
                                                <option value="">July</option>
                                                <option value="">August</option>
                                                <option value="">September</option>
                                                <option value="">November</option>
                                                <option value="">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- Rate Overview -->
                            <div class="card">
                                <div class="card-header border-0 mt-1">
                                    <h3 class="card-title">Reservations Overview</h3>
                                    <div class="card-tools">
                                        <div class="btn btn-tool">
                                            <select class="custom-select" name="" id="">
                                                <option selected>Select Month</option>
                                                <option value="">January</option>
                                                <option value="">February</option>
                                                <option value="">March</option>
                                                <option value="">April</option>
                                                <option value="">May</option>
                                                <option value="">June</option>
                                                <option value="">July</option>
                                                <option value="">August</option>
                                                <option value="">September</option>
                                                <option value="">November</option>
                                                <option value="">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-info text-xl">
                                            <i class="fas fa-ambulance"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-up text-success"></i> 12%
                                            </span>
                                            <span class="text-muted">VEHICLE RATE</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-success text-xl">
                                            <i class="fas fa-tools"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                            </span>
                                            <span class="text-muted">EQUIPMENT RATE</span>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <p class="text-warning text-xl">
                                            <i class="fas fa-warehouse"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                            </span>
                                            <span class="text-muted">VENUE RATE</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Inventory List -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Inventory Summary</h3>
                                    <div class="card-tools"></div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Inventory Items or Descriptions</th>
                                                <th>Quantity</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Vehicles</td>
                                                <td>Ambulance, Rescue Vehicle, Tricycle</td>
                                                <td>3</td>
                                                <td><a href="#" class="text-muted"><i class="fas fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Equipments</td>
                                                <td>Ladder, Tolda, Chairs, Tables, Projector, Kariton</td>
                                                <td>202</td>
                                                <td>
                                                    <a href="#" class="text-muted">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Venues</td>
                                                <td>Barangay Hall, Barangay Basketball Court, Amadome</td>
                                                <td>3</td>
                                                <td>
                                                    <a href="#" class="text-muted">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dashboard.js"></script>