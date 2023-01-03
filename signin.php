<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
	<link rel="manifest" href="./images/favicon/site.webmanifest">
	<title>WeShare - Sign In</title>
 	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm header-section">
		<h5 class="my-0 mr-md-auto font-weight-normal"><a class="header-logo text-dark" href="index.php"><img class="logo" src="./images/logo.png">WeShare</a></h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="#">About</a>
			<a class="p-2 text-dark" href="#">Donate</a>
		</nav>
	</div>

	<div class="container">
		<div class="col-sm-4 float-right form">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" autocomplete="on" required class="form-control input-md"><br>

					<div class="overlap-text">
						<input type="password" name="pass" placeholder="Password" required class="form-control input-md">
						<a data-toggle="tooltip" title="Reset Password" href="forgot_password.php">Forgot Password?</a>
					</div>

					<span>
						New to WeShare?<a data-toggle="tooltip" title="Create Account" href="signup.php"> Sign up for an account.</a>
					</span>
					<br><br>

					<span><input type="checkbox"> Remember me</span>
					<button id="signin" class="btn btn-primary btn-block" name="login">Login</button>
				
					<?php include("login.php"); ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>