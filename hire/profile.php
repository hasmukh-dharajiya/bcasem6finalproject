<?php
session_start();
	require "../dbcon.php";	
		if(!isset($_SESSION['hire']))
		{
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
?>
<html lang="en">
<head>
  <title>Edit Profile</title>
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
	
		/*--------- Worker Fname and Lname in textbox ---------*/
		$username=$_SESSION['hire'];
		$work=$_SESSION['work'];
		
		$query_work="SELECT * FROM `hire` WHERE `h_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
				
		$data=mysqli_fetch_assoc($run_work);
		$fname=$data['h_fname'];
		$lname=$data['h_lname'];
		$phone_no=$data['phone_number'];
		$con_email=$data['con_email'];
		$city=$data['city'];
		$location=$data['location'];
		$profile_pic=$data['profile_pic'];				
		$profile_status=$data['profile_status'];	
		
	/*------------- Check Profile Creaet or not ----------*/
		
	if($profile_status=="pending")
	{
	?>
	<div class="alert alert-success text-center">
	  <?php echo "Welcome ",$fname," ",$lname," ! Plaese First Create Profile ";?>
	</div>
	<?php
	}
	?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12" id="title">
			<h6 class="h1">Create Profile</h1>
		</div>		
	</div>
</section>
<section class="container"> 
	<div class="row" >	
		<div class="col-lg-12 col-md-12 col-sm-12  shadow border_bottom" id="shadow2">
			<div class="justify-content-center">
				<form action="edit_profile.php" method="POST" enctype="multipart/form-data">
						
					<h3>Basic Detail</h3><br>
						<?php
						if($profile_status=="conform")
						{
						?>
						<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4">
								
								
								<img src="../data_image/<?php echo $data['profile_pic'];?>" height="100" width="100" alt="Profile Pic" class="img-circle">								
									<div class="form-group" id="form_control">
										<input type="file" class="btn btn-success" name="c_pic">
									</div><br>	
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<strong class="h3"><?php echo $fname," ",$lname;?></strong>	<br>
									
								<strong class="h6"><?php echo $data['location'];?></strong>		
								
								</div>
								
							</div>
						<?php
						}
						?>									
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<strong>First Name</strong>
							<div class="form-group" id="form_control">
								<input type="text" class="form-control"	name="fname" value="<?php echo $fname;?>" required>
							</div><br>	
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<strong>Last Name</strong>
							<div class="form-group" id="form_control">
								<input type="text" class="form-control"	name="lname" value="<?php echo $lname;?>" required>
							</div><br>									
						</div>
					</div><br>
							
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<strong>Phone Number</strong>
							<div class="form-group" id="form_control">
								<input type="number" class="form-control"	name="phone_no" value="<?php echo $phone_no;?>"			placeholder="Enter Your Phone Number" required>
							</div><br>	
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<strong>Contact Email Id</strong>
								<div class="form-group" id="form_control">
									<input type="email" class="form-control"	name="con_email" 		value="<?php echo $con_email;?>" 	placeholder="Enter Your Email Address" required>
								</div><br>									
							</div>
						</div>
								
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<strong>City</strong>
								<div class="form-group" id="form_control">
									<input type="text" class="form-control"	name="city" 		value="<?php echo $city;?>" 	placeholder="Enter Your city" required>
								</div><br>	
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<strong>Location</strong>
								<div class="form-group" id="form_control">
									<input type="text" class="form-control"	name="location" 		value="<?php echo $location;?>" 	placeholder="Enter Your current location" required>
								</div><br>														
							</div>
						</div>
					
							<?php
								if($profile_status=="pending")
								{
									?>
										<strong>Select Profile picture</strong>
										<div class="form-group" id="form_control">
											<input type="file" class="form-control"	name="profile_pic" value="<?php echo $data['profile_pic'];?>"		required>
										</div><br>
									<?php
								}
								
							?>											
						<input type="hidden" value="<?php echo $_SESSION['hire'];?>"	name="id">
						<center><input type="submit" name="submit" class="btn btn-success" value="Submit"></center><br>
				</form>
			</div>	
		</div>			
	</div>
</section>
	
<footer>
	<?php
/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>
</footer>
</body>
</html>
