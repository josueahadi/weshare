<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
	<link rel="manifest" href="./images/favicon/site.webmanifest">
    <title>WeShare - Edit Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
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

        <div class="col-sm-6">
            <?php
                if(isset($_GET['post_id'])){
                    $get_id = $_GET['post_id'];

                    $get_post = "select * from posts where post_id='$get_id'";
                    $run_post = mysqli_query($con, $get_post);
                    $row = mysqli_fetch_array($run_post);

                    $post_con = $row['post_content'];
                }
            ?>

            <form action="" method="post" id="f">
                <center><h2>Edit Post: </h2></center><br>
                <textarea class="form-control" col="83" row="4" name="content"><?php echo $post_con;?></textarea><br>
                <input type="submit" name="update" value="Save Changes" class="btn btn-info" />
            </form>

            <?php

               if(isset($_POST['update'])){

                    $content = $_POST['content'];

                    $update_post = "update posts set post_content='$content' where post_id='$get_id'";
                    $run_update = mysqli_query($con, $update_post);

                    if ($run_update) {
                        echo "<script>window.open('home.php', '_self')</script>";
                    }
                } 

            ?>
        </div>

        <div class="col-sm-3">
        </div>

    </div>
</body>
</html>