<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMIS-EIRS | Forgot Password</title>

    <link rel="icon" href="./images/icon.ico" type="image/ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
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
                    <p class="login-box-msg">Forgot Password</p>

                    <form action="recover-password.html" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="index.php">Login</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>

    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.min.js"></script>

</body>

</html>