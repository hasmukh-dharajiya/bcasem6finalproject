<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['worker']))
		{
			header('location: ../login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
	
?>
<html lang="en">
<head>
  <title>My Profle</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/userindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="../image/favicon.ico">
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php
/*------------- NAVBAR ------------------*/
	include "../layout/user_navbar.php";  
	
		/*------ Check Profile Complet or Not ---------*/
		$username=$_SESSION['worker'];
		$work=$_SESSION['work'];
		
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
				
		$data=mysqli_fetch_assoc($run_work);
			
			
			 $id=$_SESSION['worker'];
			 $fname=$data['w_fname'];
			 $lname=$data['w_lname'];
			 $phone_no = $data['phone_no'];
			 $con_email = $data['con_email'];
			 $city = $data['city'];
			 $location = $data['location'];
			 $profile_pic = $data['profile_pic'];
			 $title = $data['title'];
			 $description = $data['description'];
			 $level = $data['level'];
			 $categories = $data['categories'];
			 $skill = $data['skill'];
			 $degree = $data['degree'];
			 $study_area = $data['study_area'];
			 $subject = $data['subject'];
			 $exp_description = $data['exp_description'];
			 $comp_job= $data['complete_job'];
			 $earning= $data['earning'];
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
			<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			
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
						<h5><strong><?php echo $title;?></strong></h5><br>
						<p><?php echo $description;?></p>
						<div class="row">
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Complete Jobs</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php echo $comp_job;?></h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Earning</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title">$<?php echo $earning;?></h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Experience level</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php echo $level;?></h1>        
							  </div>
							</div>
						</div>
					</div>						
						<div class="row">
						<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header ">
								<h4 class="my-0 font-weight-normal" align="left">My Skill</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title h3" align="left"><?php echo $skill;?></h1>        
							  </div>
							</div>
						</div>


					</div>
					
					
					<div class="row">
						<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header ">
								<h4 class="my-0 font-weight-normal" align="left">Education</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title h3" align="left"><?php echo $degree;?><br>
								<?php echo $study_area;?>	</h1>
							  </div>
							</div>
						</div>


					</div>
				
					
					<div class="row">
						<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal" align="left">Other experiences</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title h3" align="left"><?php echo $subject;?><br>
								<?php echo $exp_description;?>	</h1>
							  </div>
							</div>
						</div>


					</div><br><br>
					<div class="text-center">
						<a href="profile.php" class="btn btn-success ">Edit Profile</a>
					</div><br><br><br>												

				</div>
			</div>			
		</div>
</section>	
</body>
</html>