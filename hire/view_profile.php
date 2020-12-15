<?php
session_start();
/* ----------------- DATABASE SELECT ------------------*/
require "../dbcon.php";
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}		
?>		
<html lang="en">
<head>
  <title>My Profle</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/hireindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="../image/favicon.ico">
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php
/*--------------- NAVBAR -------------------*/
	include "../layout/hire_navbar.php";
	
	$username=$_SESSION['hire'];
	$work=$_SESSION['work'];
		
	$query_hire="SELECT * FROM `hire` WHERE `h_email`='$username'";
		
	$run_hire=mysqli_query($conn,$query_hire);
		
	$row_hire=mysqli_num_rows($run_hire);
				
	$data=mysqli_fetch_assoc($run_hire);
				
	$fname=$data['h_fname'];
 	$lname=$data['h_lname'];				 								  
	$phone_no = $data['phone_number'];
	$city =$data['city'];
	$con_email = $data['con_email'];
 echo	$location = $data['location'];
	$profile_pic = $data['profile_pic'];
 	$profile_status=$data['profile_status'];
		
	if($profile_status=="pending")
	{			
		echo '<script type="text/javascript">window.location=\'profile.php\';</script>';
	}		
?>
<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="h3">View Freelaner Profile</h3>			
		</div>
		<div class="col-lg-2" >
			<a href="profile.php" class="btn btn-success">Edit Profile</a>
		</div>		
	</div>
</section>
	
<section class="container"> 
<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12 shadow " id="shadow" >
			
		<div class="container">		
			<div class="row">
				
				<div class="col-lg-2 col-md-2 col-sm-2"><br><br>
					<img src="../data_image/<?php echo $profile_pic;?>" width="80%" height="80%" class="img-fluid img-circle" />				
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10"><br><br>
					<h3 class="h3" class="job_ title"><?php echo $fname," ",$lname;?></h3>		
					<h6><strong><?php echo $location;?></strong></h6><br>		
				</div>
					
			</div>												
			<br><br>	
			<div>
				<h5><strong><?php echo $title;?></strong></h5><br>
				<p><?php echo $description;?></p>
				<div class="row">
				</div>				
											
				<p><strong>phone number:</strong> <?php echo $phone_no;?><p>				
				<p><strong>City: </strong><?php echo $city;?></p>
				<p><strong>Contact Id: </strong><?php echo $con_email;?></p>							
			</div>	<br><br>
			<div class="text-center">
				<a href="profile.php" class="btn btn-success ">Edit Profile</a>
			</div><br><br><br>
		</div>
	</div>			
</div>
</section>	
</body>
</html>