<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeShare - View Profile</title>
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
    <div class="row container-fluid">

        <div class="col-sm-8">
        <?php

            global $con;

            if (isset($_GET['u_id'])) {
                $u_id = $_GET['u_id'];
            

                $user = "select * from users where user_id='$u_id' AND posts='yes'";

                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                $f_name = $row_user['f_name'];
                $l_name = $row_user['l_name'];
                $user_cover = $row_user['user_cover'];
                $user_image = $row_user['user_image'];
        
            }

            

			echo"
			<div class='profile'>
				<div class='cover-img'>
					<img src='cover/$user_cover' title='Cover Photo'>
				</div>

				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

					<ul class='nav pull-left' id='cover'>
						<li class='dropdown'>
							<div class='dropdown-menu'>
								<center>
									<p><strong>Select Photo</strong> to upload <br> <strong>Save</strong> to update cover</p>
									<label>Select Cover
									<input type='file' name='u_cover'/>
									</label>

									<button name='submit' class='btn btn-primary text-1'>Save</button>
								</center>
							</div>
						</li>
					</ul>

				</form>
			</div>

			<div id='profile'>
				<img src='users/$user_image'>
			</div>
            ";
        
        ?>

        </div>

        <div class="col-sm-3">
        </div>

    </div><br>

    <div class="row container-fluid">

    <?php

        if (isset($_GET['u_id'])) {
            $u_id = $_GET['u_id'];
        }

        if ($u_id < 0 || $u_id == "") {
            echo "<script>window.open('home.php', '_self')</script>";
        }

        // To show them all the data
        else {

    ?>

    <?php

        if (isset($_GET['u_id'])) {

            global $con;

            $user_id = $_GET['u_id'];

            $select = "select * from users where user_id='$user_id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_fetch_array($run);

            // what we want from the database is the name of the user

            $name = $row['user_name'];
        }

    ?>

    <?php

        if (isset($_GET['u_id'])) {
            global $con;

            $user_id = $_GET['u_id'];

            $select = "select * from users where user_id='$user_id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_fetch_array($run);

            $id = $row['user_id'];
            $image = $row['user_image'];
            $name = $row['user_name'];
            $f_name = $row['f_name'];
            $l_name = $row['l_name'];
            $describe_user = $row['describe_user'];
            $country = $row['user_country'];
            $gender = $row['user_gender'];
            $register_date = $row['user_reg_date'];

            echo "
            
                    <div class='col-sm-3'>
                    <div class='user-profile'>
                        <h4>$f_name $l_name</h4>

                        <ul class='list-group'>
                            <li class='list-group-item' title='Bio'>Bio: <strong'>$describe_user</strong'></li>
                            <li class='list-group-item' title='Gender'>Gender: <strong>$gender</strong></li>
                            <li class='list-group-item' title='Country'>Lives In <strong>$country</strong></li>
                        </ul>
            ";
                        $user = $_SESSION['user_email'];
                        $get_user = "select * from users where user_email='$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $userown_id = $row['user_id'];

                        // if the user clicks on his own account then we redirect him to profile.php


                        if ($user_id == $userown_id) {
                            echo "<p>This is what your profile looks like to the audience</p>";
                            echo "<a href='profile.php?u_id=$userown_id' class='btn btn-success'>Open Your Dashboard</a>";
                        } 
                        else {
                            echo "<a href='messages.php?u_id=$user_id' class='btn btn-primary'>Message</a>";
                        }

                echo "
                    </div>
                    </div>
                    ";

        }

    ?>

        <div class="col-sm-5">
            <div class="">
                <h4>Posts</h4>
            </div>

            <?php

            global $con;

            if (isset($_GET['u_id'])) {
                $u_id = $_GET['u_id'];
            }

            $get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC";

            $run_posts = mysqli_query($con, $get_posts);

            while ($row_posts = mysqli_fetch_array($run_posts)) {
                
                $post_id = $row_posts['post_id'];
                $user_id = $row_posts['user_id'];
                $content = $row_posts['post_content'];
                $upload_image = $row_posts['upload_image'];
                $post_date = $row_posts['post_date'];

                $user = "select * from users where user_id='$user_id' AND posts='yes'";

                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                $f_name = $row_user['f_name'];
                $l_name = $row_user['l_name'];
                $user_image = $row_user['user_image'];


                if ($content=="No" && strlen($upload_image) >= 1) {
        
                    echo "
                    <div id='posts' class='col-sm-5'>

                        <div class='row'>
                            <div class='col-sm-2'>
                                <img src='users/$user_image' class='img-circle'></<img>
                            </div>

                            <div id='postedby' class='col-sm-6'>
                                <p><a href='user_profile.php?u_id=$user_id'>$f_name $l_name</a></p>
                                <p><i class='fa fa-clock-o'></i> $post_date</p>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='posts-img' src='uploads/images/$upload_image'>
                            </div>
                        </div>
                
                        <div class='post-footer'>
                            <a href='#' class='text-dark'><i class='fa fa-heart-o fa-lg'></i> Like</a>
                            <a href='#' class='text-dark'><i class='fa fa-link fa-lg'></i> Share</a>
                            <a href='single.php?post_id=$post_id' class='text-dark'><i class='fa fa-comment-o fa-lg'></i> Comment</a>
                        </div>   
                    
                    </div><br><br>
                   ";
                }

                else if(strlen($content) >= 1 && strlen($upload_image) >= 1) {
                    
                    echo "
                    <div id='posts' class='col-sm-5'>

                        <div class='row'>
                            <div class='col-sm-2'>
                                <img src='users/$user_image' class='img-circle'></<img>
                            </div>
                            
                            <div id='postedby' class='col-sm-6'>
                                <p><a href='user_profile.php?u_id=$user_id'>$f_name $l_name</a></p>
                                <p><i class='fa fa-clock-o'></i> $post_date</p>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='posts-img' src='uploads/images/$upload_image'>
                            </div>
                        </div>   

                        <div class='post-footer'>
                            <a href='#' class='text-dark'><i class='fa fa-heart-o fa-lg'></i> Like</a>
                            <a href='#' class='text-dark'><i class='fa fa-link fa-lg'></i> Share</a>
                            <a href='single.php?post_id=$post_id' class='text-dark'><i class='fa fa-comment-o fa-lg'></i> Comment</a>
                        </div>

                    </div><br><br>
                    ";

                }

                else {
                    
                    echo "
                        <div id='posts' class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <img src='users/$user_image' class='img-circle'></img>
                                </div>
            
                                <div id='postedby' class='col-sm-6'>
                                    <p><a href='user_profile.php?u_id=$user_id'>$f_name $l_name</a></p>
                                    <p><i class='fa fa-clock-o'></i> $post_date</p>
                                </div>
                            </div>
            
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <h4><p>$content</p></h4>                                  
                                </div>
                            </div>
                
                            <div class='post-footer'>
                                <a href='#' class='text-dark'><i class='fa fa-heart-o fa-lg'></i> Like</a>
                                <a href='#' class='text-dark'><i class='fa fa-link fa-lg'></i> Share</a>
                                <a href='single.php?post_id=$post_id' class='text-dark'><i class='fa fa-comment-o fa-lg'></i> Comment</a>
                            </div>
                        </div><br><br>
                    ";
                }


            }

            ?>
        </div>

        <div class="col-sm-3">

        </div>

    </div><br><br>
    <?php   } ?>
</body>

</html>