<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BMIS-EIRS | Registration Page</title>
	<link rel="icon" href="../images/icon.ico" type="image/ico">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<style>
	.loader {
		position: fixed;
		top: calc(50% - 25px);
		left: calc(50% - 25px);
		width: 50px;
		aspect-ratio: 1;
		box-sizing: content-box;
		animation: ll 1s infinite linear;
		border-radius: 50%;
		border: 8px solid lightgray;
		border-right-color: black;
	}

	@keyframes ll {
		to {
			transform: rotate(1turn)
		}
	}
</style>

<body class="hold-transition register-page">
	<div class="loader"></div>
	<!-- <div class="register-box">
		<div class="register-logo">
			<a href="index.php">
				<img src="./images/logo.png" alt="">
			</a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">

				<h4 class="login-box-msg"><b>BMIS-EIRS</b></h4>
				<p class="login-box-msg">Register a new membership</p>

				<form action="../../index.html" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Full name">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Retype password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="agreeTerms" name="terms" value="agree">
								<label for="agreeTerms">
									I agree to the <a href="#">terms</a>
								</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
					</div>
				</form>
				<a href="login.php" class="text-center">I already have a membership</a>
			</div>
		</div>
	</div> -->

	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>