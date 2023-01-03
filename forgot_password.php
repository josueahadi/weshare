<!DOCTYPE html>
<link rel="icon" href="images/WS_logo_2.png">
<?php

    session_start();
    include("includes/connection.php");

    // if(!isset($_SESSION['user_email'])){
    //     header("location: index.php");
    // }

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
	<link rel="manifest" href="./images/favicon/site.webmanifest">
	<title>WeShare - Forgort Password</title>
 	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a class="header-logo text-dark" href="index.php"><img class="logo" src="./images/logo.png">WeShare</a></h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="#">About</a>
			<a class="p-2 text-dark" href="#">Donate</a>
		</nav>
	</div>

    <div class="container">
		<div class="col-sm-4 float-right form">
            <form action="" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"></i></span>
					</div>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                </div>
                <br>
                <pre class="text">Enter your best friend name below</pre>
                <div class="input-group">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping"><i class="fa fa-edit"></i></span>
                    </div>
                    <input id="msg" type="text" class="form-control" name="recovery_code" placeholder="ex. Someone" required>
                </div><br>
                Back to<a href="signin.php" data-toggle="tooltip" title="Signin"> Sign in?</a><br><br>
                 <button id="signup" class="btn btn-primary btn-block" name="submit">Continue...</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php


if (isset($_POST['submit'])) {
    
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $recovery_code = htmlentities(mysqli_real_escape_string($con, $_POST['recovery_code']));
    
    $select_user = "select * from users where user_email = '$email' AND recovery_account = '$recovery_code'";

    $query = mysqli_query($con, $select_user);

    $check_user = mysqli_num_rows($query);

    if ($check_user == 1) {
        
        $_SESSION['user_email'] = $email;

        echo "<script>window.open('reset_password.php', '_self')</script>";

    }
    else {
        
        echo "<script>alert('Your Email or Best Friend name is incorrect!')</script>";

    }

}

?>