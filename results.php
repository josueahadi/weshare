<!DOCTYPE html>
<link rel="icon" href="images/WS_logo_2.png">
<?php

	session_start();
	include("includes/header.php");

	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeShare - Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="row">
        <div class="col-sm-3">
        </div>

        <div class=" col-sm-5 all_posts">
            <center>
			    <h3 class="text-dark">Search Results</h3>
            </center>
            <?php results(); ?>
        </div>

        <div class="col-sm-4">
        </div>
    </div>
</body>
</html>