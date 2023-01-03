<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeShare - Messages</title>
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
<style>
    #scroll_messages {
        min-height: 460px;
        max-height: 460px;
        overflow-y: scroll;
        scroll-behavior: smooth;
        padding: 0 20px 10px; 
        /* border-top: 1px solid #E6E6E6;
        border-right: 1px solid #E6E6E6;
        border-left: 1px solid #E6E6E6; */
        box-shadow: 0px 0px 1px #000036;
    }

    #btn-msg {
        width: 20%; 
        height: 30px;
        border-radius: 5px;
        margin: 5px 0 5px 5px;
        border: none;
        color: #fff;
        float: right;
        background-color: #2ECC71;
    }

    #select_user {
        min-height: 560px;
        /* max-height: 560px; */
        overflow-y: scroll;
        scroll-behavior: smooth;
        border-right: 1px solid #e6e6e6;
    }

    #away,
    #home {
        font-size: 14px;
        width: inherit;
        border-radius: 20px;
        padding: 5px 10px;
    }

    #away {
        background-color: lightgrey;
        border-color: grey; 
        float: left;  
    }

    #home {
        background-color: #3498DB;
        border-color: #2980B9;
        color: white;
        float: right;
    }

    form h3 {
        margin-top: -5%;
    }
</style>
<body>
	<div class="row">
        <?php

            if (isset($_GET['u_id'])) {
                global $con;

                $get_id = $_GET['u_id'];

                $get_user = "select * from users where user_id='$get_id'";

                $run_user = mysqli_query($con, $get_user);
                $row_user = mysqli_fetch_array($run_user);

                $user_to_msg = $row_user['user_id'];
                $user_to_name = $row_user['user_name'];
            }

            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row_user = mysqli_fetch_array($run_user);

            $user_from_msg = $row['user_id'];
            $user_from_name = $row['user_name'];

        ?>

        <div class="col-sm-3" id="select_user">
            <?php 

                $user = "select * from users";

                $run_user = mysqli_query($con, $user);

                while ($row_user = mysqli_fetch_array($run_user)) {
                    $user_id = $row_user['user_id'];
                    $user_name = $row_user['user_name'];
                    $first_name = $row_user['f_name'];
                    $last_name = $row_user['l_name'];
                    $user_image = $row_user['user_image'];

                    echo "
                        <div class='container-fluid'>
                            <a style='text-decoration: none; cursor:pointer; color#3897F0;' href='messages.php?u_id=$user_id'>
                                <img class='img-circle' src='users/$user_image' width='80px' height='80px' title='$user_name'>
                                <strong>&nbsp; $first_name $last_name</strong><br><br>
                            </a>
                        </div>
                    ";
                }

             ?>   
        </div>

        <div class="col-sm-6">
            <div class="load_msg" id="scroll_messages">
                <?php  

                    $sel_msg = "select * from user_messages where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
                    $run_msg = mysqli_query($con, $sel_msg);

                    while ($row_msg = mysqli_fetch_array($run_msg)) {
                        
                        $user_to = $row_msg['user_to'];
                        $user_from = $row_msg['user_from'];
                        $msg_body = $row_msg['msg_body'];
                        $msg_date = $row_msg['date'];

                        ?>

                        <div class="loaded_msg">
                            <p>
                                <?php 

                                    if ($user_to == $user_to_msg AND $user_from == $user_from_msg) {
                                        echo "
                                            <div class='message' id='home' data-toggle='tooltip' title='$msg_date'>
                                                $msg_body
                                            </div><br><br>
                                        ";                           
                                    } 
                                    else if ($user_from == $user_to_msg AND $user_to == $user_from_msg) {
                                        
                                        echo "
                                            <div class='message' id='away' data-toggle='tooltip' title='$msg_date'>
                                                $msg_body
                                            </div><br><br>
                                        ";
                                    }

                                ?>
                                
                            </p>
                        </div>

                        <?php

                    }

                ?>
            </div>
            <?php 

                if (isset($_GET['u_id'])) {
                    $u_id = $_GET['u_id'];

                    if ($u_id == "new") {
                        echo "

                            <form>
                                <center>
                                    <h3>Select a friend to start a new conversation</h3>
                                </center>
                                    <textarea disabled class='form-control' placeholder='Type your message'></textarea>
                                    <input type='submit' class='btn btn-default' disabled value='Send'/>
                            </form><br><br>

                        ";
                    }

                    else {
                        echo "

                            <form action='' method='POST'>
                                    <textarea class='form-control' placeholder='Jot down your message' name='msg_box' id='message_textarea'></textarea>
                                    <input type='submit' name='send_msg' id='btn-msg' class='btn btn-success' value='Send'/>
                            </form><br><br>

                        ";
                    }

                }

            ?>

            <?php

                if (isset($_POST['send_msg'])) {
                    $msg = htmlentities($_POST['msg_box']);

                    if ($msg == "") {
                        echo "<h4 style='color:red;text-align:center;'>Empty Message!</h4>";
                    } 
                    else if(strlen($msg) > 250) {
                        echo "<h4 style='color:red;text-align:center;'>Message too long!</h4>";
                    }
                    else {
                        $insert = "insert into user_messages(user_to, user_from, msg_body, date, msg_seen) values ('$user_to_msg', '$user_from_msg', '$msg', NOW(), 'no')";

                        $run_insert = mysqli_query($con, $insert);
                        echo "<script>window.open('messages.php?u_id=$u_id' , '_self')</script>";
                    }
                }

            ?>

        </div>

        <div class="col-sm-3">
            <?php

                if (isset($_GET['u_id'])) {
                    global $con;

                    $get_id = $_GET['u_id'];

                    $get_user = "select * from users where user_id='$get_id'";

                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $f_name = $row['f_name'];
                    $l_name = $row['l_name'];
                    $describe_user = $row['describe_user'];
                    $user_country = $row['user_country'];
                    $user_image = $row['user_image'];
                    $register_date = $row['user_reg_date'];
                    $gender = $row['user_gender'];

                }

                if ($get_id == "new") {
                    
                }
                else {
                    echo "
                        <div class='row'>
                            <div class='col-sm-1'>
                            </div>
                            <center>
                                <div class='messaging col-sm-9'>                                    
                                    <img src='users/$user_image'>                                    
                                    <a href='user_profile.php?u_id=$user_id'><h2>$f_name $l_name</h2></a>
                                    <ul class='list-group'>
                                        <li class='list-group-item' title='User Status'>Bio: $describe_user</li>
                                        <li class='list-group-item' title='Gender'>Gender: <strong>$gender</strong></li>
                                        <li class='list-group-item' title='Country'>Lives In <strong>$user_country</strong></li>                                        
                                    </ul>
                                </div>                                
                            </center>
                            <div class='col-sm-1'>
                            </div>
                        </div>
                    ";
                }

            ?>
        </div>

    </div>

    <script>
        var div = document.getElementById("scroll_messages");
        div.scrollTop = div.scrollHeight;
    </script>

</body>
</html>