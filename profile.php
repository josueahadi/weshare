<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
	<link rel="manifest" href="./images/favicon/site.webmanifest">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		session_start();
		include("includes/header.php");
	
		if(!isset($_SESSION['user_email'])){
			header("location: index.php");
		}

		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'"; 
		$run_user = mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);
		$user_name = $row['user_name'];
	?>

	<title><?php echo "$first_name "."$last_name"; ?> - WeShare</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="row container-fluid">

	<div class="col-sm-8">
		<?php
			echo"
			<div class='profile'>
				<div class='cover-img'>
					<img src='cover/$user_cover' title='Cover Photo'>
				</div>

				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

					<ul class='nav pull-left' id='cover'>
						<li class='dropdown'>
							<a class='dropdown-toggle' data-toggle='dropdown' title='Update Cover Photo'><i class='fa fa-camera fa-2x'></i></a>
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

				<form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>

					<label id='update_profile'> Edit Photo
						<input type='file' name='u_image' />
					</label><br>

					<button id='button_profile' name='update' class='btn btn-primary'>Save</button>

				</form>
			</div>
			";
		?>

		<?php

			if(isset($_POST['submit'])) {

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];

				if($u_cover=='')
				{
					// echo "<script>alert('You need to upload the cover photo first')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}
				else
				{
					move_uploaded_file($image_tmp, "cover/$u_cover");
					$update = "update users set user_cover='$u_cover' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run)
					{
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>


	</div>

	<?php

	if(isset($_POST['update'])) {

		$u_image = $_FILES['u_image']['name'];
		$image_tmp = $_FILES['u_image']['tmp_name'];

		if($u_image=='')
		{
			// echo "<script>alert('You need to upload the profile photo first')</script>";
			echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
			exit();
		}
		else
		{
			move_uploaded_file($image_tmp, "users/$u_image");
			$update = "update users set user_image='$u_image' where user_id='$user_id'";

			$run = mysqli_query($con, $update);

			if($run)
			{
				echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
			}
		}

	}  

	?>

	<div class="col-sm-3">
	</div>

</div><br>

<div class="row container-fluid">
	
	<div class="col-sm-3">
		<?php

		echo "
		<div class='intro'>
			<h5>Intro</strong></h5>				
			<h4>$first_name $last_name</h4>		
			<div class='bio'>
				<p> $describe_user <br> <a href='account_settings.php'>Edit Bio</a></p>
			</div>
			<p>Gender: <a href='#' class='description'>$user_gender</a></p>
			<p>Marital Status: <a href='#' class='description'>$Relationship_status</a></p>
			<p>Date of Birth: <a href='#' class='description'>$user_birthday</a></p>
			<p>Lives In: <a href='#' class='description'>$user_country</a></p>
			<p>Member Since: <a href='#' class='description'>$register_date</a></p>

			<a href='account_settings.php' class='btn btn-success'>Edit Profile</a>

		</div>
		";

		?>
	</div>

	<div class="user_posts col-sm-5" >
		<div id="insert_post">

			<?php include_once("includes/share_sth.php"); ?>
			<?php insertPost(); ?>
			
		</div>

		<div class="">
			<h5>Posts</h5>
		</div>
		<!-- Display user posts -->

		<?php

	global $con;

	if(isset($_GET['u_id'])) {
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

		// Now we display the posts

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
						<a href='edit_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-edit fa-lg'></i></a>
						<a href='functions/delete_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-trash fa-lg'></i></a>
					</div>

				</div><br><br>

			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1) {
			
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
						<p class='content'>$content</p>
						<img id='posts-img' src='uploads/images/$upload_image'>
					</div>
				</div>

				<div class='post-footer'>
					<a href='#' class='text-dark'><i class='fa fa-heart-o fa-lg'></i> Like</a>
					<a href='#' class='text-dark'><i class='fa fa-link fa-lg'></i> Share</a>
					<a href='single.php?post_id=$post_id' class='text-dark'><i class='fa fa-comment-o fa-lg'></i> Comment</a>
					<a href='edit_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-edit fa-lg'></i></a>
					<a href='functions/delete_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-trash fa-lg'></i></a>
				</div>
			
			</div><br><br>

			";
		}

		else {
			
			echo "

				<div id='posts' class='col-sm-5'>
					<div class='row'>
						<div class='col-sm-2'>
							<img src='users/$user_image' class='img-circle'></img>
						</div>

						<div id='postedby' class='col-sm-6'>
							<p><a href='user_profile.php?u_id=$user_id'>$f_name $l_name</a></p>
							<p><i class='fa fa-clock-o'></i> $post_date</small></p>
						</div>
					</div>

					<div class='row'>
						<div class='col-sm-12'>
							<h4><p>$content</p></h4>
						</div>
					</div>
				
				

			";

			global $con;

			if (isset($_GET['u_id'])) {
				$u_id = $_GET['u_id'];
			}

			$get_posts = "select user_email from users where user_id='$u_id'";
			$run_user = mysqli_query($con, $get_posts);
			$row = mysqli_fetch_array($run_user);

			$user_email = $row['user_email'];

			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$user_id = $row['user_id'];
			$u_email = $row['user_email'];

			if ($u_email != $user_email) {
				echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
			}else{
				echo "
					<div class='post-footer'>
						<a href='#' class='text-dark'><i class='fa fa-heart-o fa-lg'></i> Like</a>
						<a href='#' class='text-dark'><i class='fa fa-link fa-lg'></i> Share</a>
						<a href='single.php?post_id=$post_id' class='text-dark'><i class='fa fa-comment-o fa-lg'></i> Comment</a>
						<a href='edit_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-edit fa-lg'></i></a>
						<a href='functions/delete_post.php?post_id=$post_id' class='text-dark'><i class='fa fa-trash fa-lg'></i></a>
					</div>

				</div><br><br>
				";
			}
		}

		include("functions/delete_post.php");
		
	}

	?>
	</div>

	<div class="col-sm-3">
	</div>
	
</div> <br><br><br>
</body>

</html>