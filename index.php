<?php include_once('includes/conn.php') ?>
<?php
session_start();
//Redirect page if user is in session
if (isset($_SESSION['id'])) {
    header("Location: ./pages/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMIS-EIRS | Log in</title>
    <link rel="icon" href="./images/icon.ico" type="image/ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./assets/plugins/sweetalert2/sweetalert2.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full height of the viewport */
        }

        body {
            height: 100%;
            /* Full viewport height */
            background-image: url('images/barangay.jpg');
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
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <a href="index.php">
                    <img src="./images/logo.png" alt="">
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">

                    <h4 class="login-box-msg"><b>BMIS-EIRS</b></h4>
                    <p class="login-box-msg">Login Account</p>
                    <form id="form_login" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </form>

                    <p class="mb-1 mt-2">
                        <a href="forgotpass.php">I forgot my password</a>
                    </p>
                    <!-- <p class="mb-0">
                        <a href="register.php" class="text-center">Register a new membership</a>
                    </p> -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="./assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function() {
            function loading() {
                Swal.fire({
                    title: 'Please wait!',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
            }

            $('#form_login').submit(function(e) {
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
                        Swal.close()
                        if (response.status == 'ok') {
                            window.location = response.redirect;
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
            })
        })
    </script>
</body>

</html>