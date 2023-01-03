<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="css/main.css">

    <?php
        session_start();
        include("includes/header.php");
    
        if(!isset($_SESSION['user_email'])){
            header("location: index.php");
        }
        
	?>

	<title><?php echo "$first_name "."$last_name"; ?> - WeShare</title>

</head>
<body>
<div class="row">
    <div class="col-sm-3">
    </div>

	<div class="col-sm-5 container-fluid main">
        <div id="insert_post">

            <?php include_once("includes/share_sth.php"); ?>
            <?php insertPost(); ?>
            
        </div>

        <script>
            var textarea = document.querySelector('form');
            textarea.addEventListener('keydown', autosize);

            function autoSize() {
                var el = this;
                setTimeout(function () {
                    el.style.cssText = 'height:auto; padding:0;';
                    // for box sizing other than "content-box" use: 
                    el.style.cssText = '-moz-box-sizing:content-box';
                    el.style.cssText = 'height' + el.scrollHeight + 'px';
                }, 0);
            }
        </script>
    
        <div class="all_posts">
            <center>
                <h2 class="text-dark">News Feed</h2>
            </center>
            <?php echo get_posts(); ?>
        </div>
    </div>

    <div class="col-sm-4">
    </div>

</div><br><br>
</body>
</html>