<!DOCTYPE html>
<link rel="icon" href="images/WS_logo_2.png">
<?php

    session_start();
    include("includes/connection.php");

    if(!isset($_SESSION['user_email'])){
        header("location: index.php");
    }

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
						<span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
					</div>
                    <input type="password" name="pass" class="form-control" id="password" placeholder="New Password" required>
                </div>
                <br>
                <div class="input-group">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
					</div>
                    <input id="password" type="password" class="form-control" name="pass1" placeholder="Confirm Password" required>
                </div><br>
                <button id="signup" class="btn btn-primary btn-block" name="change">Save changes</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php

if (isset($_POST['change'])) {

    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_id = $row['user_id'];
    
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

    if ($pass == $pass1) {
        
        if(strlen($pass) >= 6 && strlen($pass) <= 60){
            
            $update = "update users set user_pass='$pass' where user_id='$user_id'";
            $run = mysqli_query($con, $update);
            echo "<script>alert('Password Reset Successful! You must login to confirm your new password')</script>";
            echo "<script>window.open('signin.php', '_self')</script>";
        }

        else {
            echo "<script>alert('Password must be atleast 6 characters long!')</script>";
        }
    }

    else {
        echo "<script>alert('Password did not much!')</script>";
        echo "<script>window.open('change_password.php', '_self')</script>";
    }

}

?>