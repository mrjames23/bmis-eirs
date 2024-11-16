<?php
include_once('../includes/config.php');
$page = 'Baranggay Information';
?>

<?php include_once('../includes/head.php') ?>
<style>
    .content-wrapper {
        height: 100%;
        /* Full viewport height */
        background-image: url('../images/barangay.jpg');
        /* Add your background image here */
        background-size: cover;
        /* Cover the entire container */
        background-position: center;
        /* Center the background image */
        /* display: flex; */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        background-color: #333;
        /* Dark background for contrast */
        /* background-color: #f8f9fa; */
        /* Light background for contrast */
    }

    .centered-image {
        max-width: 100%;
        /* Responsive width */
        max-height: 100%;
        /* Responsive height */
        object-fit: contain;
        /* Maintain aspect ratio */
    }

    .shadow-image {
        /* filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.5)); */
        /* Shadow effect */
        filter: drop-shadow(5px 5px 20px rgba(255, 255, 255, 0.7));
        /* White shadow effect */
        max-width: 100%;
        /* Responsive width */
        height: auto;
        /* Maintain aspect ratio */
    }

    .stroke-image {
        position: relative;
        max-width: 100%;
        /* Responsive width */
        height: auto;
        /* Maintain aspect ratio */
        z-index: 1;
        /* Ensure image is above the pseudo-element */
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
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="card-title text-white">Barangay Information</h1>
                            <button class="btn btn-primary btn-sm card-title float-right create" data-toggle="modal" data-target="#modal">
                                <i class="fa fa-edit"></i> EDIT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="container image-container d-flex justify-content-center align-items-center" style="max-width: 800px;">
                        <div class="row">
                            <div class="col text-center">
                                <img src="../images/logo.png" class="img-fluid shadow-image p-2" alt="Image 1">
                            </div>
                            <div class="col text-center">
                                <img src="../images/lungsod.png" class="img-fluid shadow-image p-2" alt="Image 2">
                            </div>
                            <div class="col text-center">
                                <img src="../images/bagong pilipinas.png" class="img-fluid shadow-image p-2" alt="Image 3">
                            </div>
                        </div>
                    </div>
                    <div class="text-white">
                        <div class="text-center text-bold m-5 h1"><span style="text-shadow: 4px 1px 7px rgba(0, 0, 0, 0.9);">BARANGAY 775, ZONE 84, DISTRICT V, CITY OF MANILA</span></div>
                        <div class="text-center text-bold m-0 h2"><span style="text-shadow: 4px 1px 7px rgba(0, 0, 0, 0.9);">ALLAN G. PACHECO</span></div>
                        <div class="text-center text-bold h4">PUNONG BARANGAY</div>
                        <p class="text-center text-bold mt-5 h4">
                            San Andres, also known as San Andres Bukid, is a neighborhood in Manila, Philippines. 
                            Its name is derived from Saint Andrew, the patron saint of the city, 
                            and the Tagalog word "bukid," meaning "farm" or "rice field." Barangay 775 is a subdivision within San Andres, 
                            with a population of 12,084 according to the 2020 census, representing approximately 0.65% of Manila's total population.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <img src="../images/Facebook_Logo_(2019).png" class=" p-2" alt="Image 1" style="width: 80px; height: 80px">
                            <a href="#" class="h4 text-white">Barangay 775 Zone 84 | Facebook</a>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <?php include_once('./modal/main_page.php') ?>
    <?php include_once('../includes/script.php') ?>