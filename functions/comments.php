<?php

	$get_id = $_GET['post_id'];

	$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";

	$run_com = mysqli_query($con, $get_com);

	while($row = mysqli_fetch_array($run_com)) {

		$com = $row['comment'];
		$f_name = $row['author_f_name'];
		$l_name = $row['author_l_name'];
		$date = $row['date'];

		echo"
			<div class='row'>
				<div class='col-md-6 col-md-offset-3'>
					<div class='panel panel-info'>
        				<div class='panel-body'>
	        				<div>
	        					<h5><strong>$f_name $l_name</strong> commented on $date</div></h5>
	        					<p class='text-primary' style='margin-left:5px;font-size:14px'>$com</p>
	        				</div>
        				</div>
        			</div>
				</div>
			</div>
		";

	}


?>