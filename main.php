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
	<title>WeShare</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/styles.css">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
	.bs-example {
		margin: 20px;
	}

	.modal-content iframe {
		margin: 0 auto;
		display: block;
	}

	.play {
		text-decoration: none;
		background-color: #CDFAEC;
		color: blue;
	}

	.play:hover {
		color: blue;
	}
</style>

<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<h5 class="my-0 mr-md-auto font-weight-normal"><a class="header-logo text-dark" href="index.php"><img class="logo" src="./images/logo.png">WeShare</a></h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="#">About</a>
			<a class="p-2 text-dark" href="#">Donate</a>
		</nav>
		<a class="btn btn-outline-primary" href="signin.php">Sign in</a>
	</div>

	<div class="main">
		<img src="images/bg-img.svg" alt="">
		<h3>Build you life to the next level with WeShare</h3>
		<p>"Wherever you're whatever you're doing always look for new oppotunities"<br>We Think, We Create, We Share</p>
	</div>

	<br><br><br><br><br><br><br>

	<div class="bs-example">
		<!-- Button HTML (to Trigger Modal) -->
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="signup.php" class="btn btn-lg btn-primary">Get
			started</a>&nbsp;&nbsp;<a href="#myModal" class="play btn" data-toggle="modal">Play demo <img
				src="images/play-v.png" width="30px" alt=""> </a>
		<!-- Modal HTML -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">How to use WeShare</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

					</div>
					<div class="modal-body">
						<iframe id="demo" width="470" height="300"
							src="//www.youtube.com/embed/od5nla42Jvc?autoplay=1" frameborder="0"
							allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<div class="whytouse">
		<h1 class="text-center">Meet Our Awesome Team</h1>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>

	<footer class="pt-4 my-md-5 pt-md-5 border-top container">
		<div class="row">
			<div class="col-12 col-md copyright">
				<img class="mb-2" src="images/logo.png">
				<small class="d-block mb-3 text-muted">&copy;WeShare 2020</small>
			</div>
			<div class="col-6 col-md">
				<h5>Features</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Amazing </a></li>
					<li><a class="text-muted" href="#">Random feature</a></li>
					<li><a class="text-muted" href="#">Team feature</a></li>
					<li><a class="text-muted" href="#">Last item</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Resources</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Users API</a></li>
					<li><a class="text-muted" href="#">Developers API</a></li>
					<li><a class="text-muted" href="#">Another resource</a></li>
					<li><a class="text-muted" href="#">Final resource</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>About</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Team</a></li>
					<li><a class="text-muted" href="#">Locations</a></li>
					<li><a class="text-muted" href="#">Privacy</a></li>
					<li><a class="text-muted" href="#">Terms</a></li>
				</ul>
			</div>
		</div>
	</footer>


	<script>
		$(document).ready(function () {
			/* Get iframe src attribute value i.e. YouTube video url
			and store it in a variable */
			var url = $("#cartoonVideo").attr('src');

			/* Remove iframe src attribute on page load to
			prevent autoplay in background */
			$("#cartoonVideo").attr('src', '');

			/* Assign the initially stored url back to the iframe src
    		attribute when modal is displayed */
			$("#myModal").on('shown.bs.modal', function () {
				$("#cartoonVideo").attr('src', url);
			});

			/* Assign empty url value to the iframe src attribute when
			modal hide, which stop the video playing */
			$("#myModal").on('hide.bs.modal', function () {
				$("#cartoonVideo").attr('src', '');
			});
		});
	</script>
</body>

</html>