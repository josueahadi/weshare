<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeShare - Find People</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="css/main.css">
</head>
<style>

form.example button {
  float: left;
  width: 10%;
  padding: 5px;
  background: #fff;
  color: #2196F3;
  font-size: 15px;
  border: 1px solid #2196F3;
  cursor: pointer;
  border-radius: 3px;
}

form.example button:hover{
    background-color: #007bff;
    color:#fff;
}

</style>

<?php

	session_start();
	include("includes/header.php");

	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}

?>

<body>
	<div class="row">
        <div class="col-sm-3">
        </div>

        <div class="col-sm-5">
            <center>
                <h3 class="text-dark">Find People</h3>
            </center>

            <center>
                <div class="search-container">
                    <form action="" class="example">

                    <div class="active-cyan-4 mb-4" style="display:flex;">
                         <input class="form-control" type="text" placeholder="Search by name" name="search_user" aria-label="Search">
                         <button type="submit" name="search_user_btn"><i class="fa fa-search"></i></button>
                    </div>
                    </form>
                </div>
            </center><br><br>

            <div>
                    <div class='recommended text-center'>
						<h5> Do you know... </h5>
					</div>
                <?php search_user(); ?>
            </div>

        </div>

        <div class="col-sm-3">
        </div>
    </div>
</body>
</html>