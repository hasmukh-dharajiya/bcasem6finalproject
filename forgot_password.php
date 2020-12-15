<?php
	session_start();
	require "dbcon.php";
	
?>
<html>
<html lang="en">
<head>
  <title>Freelance Work | Hire Freelancers. Make things happen.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/login.css">
	<link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
	<!-- Favicon -->
	<link rel="shortcut icon" href="image/favicon.ico">
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</head>
<body class="jumbotron">


<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Forgot Password</h1>
		</div>
		
	</div>
</section>
	
<section class="container"> 
		
<div class="login-container  align-items-center justify-content-center">
	<form class="login-form text-center shadow"  action="#" method="post">
		<h4 class="mb-5 font-weight-light text-uppercase" >Security Question</h4>

		<div class="form-group">
			<input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Address" name="email" required>
		</div>
		<div class="form-group">
				<select name="question"  class="form-control">
                        <option>What is Your Pet Name?</option>
                        <option selected="selected">Who is Your Favourite Person?</option>
                        <option>What is the Name of Your First School?</option>
                </select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Answer" name="answer" required>
		</div>
		<div class="align-items-center justify-content-between">
			<div class="form-radio">
				<input type="radio" class="form-radio-input"  name="work" value="hire" required><span class="h5">HIRE</span>
				<input type="radio" class="form-radio-input" name="work" value="work" required>WORK				
			</div>			
		</div>
																  
			<input type="submit" class="btn btn-success mt-5 btn-block success rounded-pill form-control-lg" value="Forgot Password" name="submit">
			<p class="mt-3 font-weight-normal"> Don't have an account <a href="register.php"><strong>Register Now</strong></a></p>
		</form>
</div>
</section>	
</body>
</html>

<?php

if(isset($_POST['submit']))
 {
	echo	$email=$_POST['email'];
	echo	$question=$_POST['question'];
	echo	$answer=$_POST['answer'];
	echo	$work=$_POST['work'];
	
			if($work=="hire")
			{
				$query_hire="SELECT * FROM `hire` WHERE `h_email`='$email' AND `question`='$question'  AND `answer`='$answer' AND `work`='$work'";
		
				$run_hire=mysqli_query($conn,$query_hire);
				$row_hire=mysqli_num_rows($run_hire);
				if($row_hire)
				{
					$_SESSION['userchange']=$work;
					$_SESSION['email']=$email;
					
					echo '<script type="text/javascript">window.location=\'change_password.php\';</script>';	
				}
				else
				{
					echo '<script type="text/javascript">alert("Invalid Forgot password Detail...!!");window.location=\'forgot_password.php\';</script>';
				}
					
			}			
			else if($work=="work")
			{
				$query_work="SELECT * FROM `work` WHERE `w_email`='$email' AND `question`='$question'  AND `answer`='$answer' AND `work`='$work'";
		
				$run_work=mysqli_query($conn,$query_work);
				$row_work=mysqli_num_rows($run_work);
				if($row_work)
				{
					$_SESSION['userchange']=$work;	
					$_SESSION['email']=$email;
					echo '<script type="text/javascript">window.location=\'change_password.php\';</script>';	
				}
				else
				{
					echo '<script type="text/javascript">alert("Invalid Forgot password Detail...!!");window.location=\'forgot_password.php\';</script>';
				}
			}		
		
 }
 
 
?>