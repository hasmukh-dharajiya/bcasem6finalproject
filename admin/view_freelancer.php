<?php
require "../dbcon.php";
 session_start();
		if(!isset($_SESSION['admin']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: login.php');
		}
?>
<html lang="en">
<head>
  <title>View Jobs</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/userindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php
/*------------------ NAVBAR --------------*/
	include "layout/admin_navbar.php"; 			
		/*------ Check Profile Complet or Not ---------*/
		$wid=$_GET['wid'];
		
		$query="SELECT * FROM `work` WHERE `w_id`='$wid'";
		
		$run=mysqli_query($conn,$query);
		
		$row_work=mysqli_num_rows($run);
				
		$data=mysqli_fetch_assoc($run);	
		
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
?>		

<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="h3">View Freelance</h3>			
		</div>
		<div class="col-lg-2" >
			
		</div>
	</div>
</section>
<!---------------- View Freelancer ------------------>	
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
								<div class="card-header bg-secondary text-white">
								<h4 class="my-0 font-weight-normal text-left">Profile</h4>
							  </div>
							  <div class="card-body text-left">
								<div class="row">
									<div class="col-lg-6">
										<strong>Phone Number</strong>
										<p><?php echo $data['phone_no'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Contact Email Id</strong>
										<p><?php echo $data['con_email'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>City</strong>
										<p><?php echo $data['city'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Location</strong>
										<p><?php echo $data['location'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Categories</strong>
										<p><?php echo $data['categories'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>skills</strong>
										<p><?php echo $data['skill'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Education</strong>
										<p><?php echo $data['degree'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Area of Study (Optional)</strong>
										<p><?php echo $data['study_area'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>Other experiences</strong>
										<p><?php echo $data['subject'];?></p>
									</div>
									<div class="col-lg-6">
										<strong>experiences Description</strong>
										<p><?php echo $data['exp_description'];?></p>
									</div>
								</div>
							  </div>
								</div>
							</div>
						</div>
					<div class="row">
							<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
								<div class="card-header bg-secondary text-white">
								<h4 class="my-0 font-weight-normal text-left">Complet Job</h4>
							  </div>
							  <div class="card-body text-left">
							<?php	$query2="SELECT * FROM `jobs` WHERE `w_id`='$wid' AND `status`='complete'";
								$run2=mysqli_query($conn,$query2);		
								
								/*------------ JOB LIST ------*/
								
								while ($row1 = mysqli_fetch_array($run2))
								{
									$id=$row1['j_id'];	
									
										
							?>	
	
								<section class="container"> 
									<div class="row">
										
										<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
											<div class="justify-content-center" id="job_contaner">
												<h5><strong class="job_title"><?php echo $row1['title'];?></strong></h5>				
												<p><?php echo $row1['description'];?></p>
												<h1 align="right" class="text-success"><?php echo "$".$row1['budget'];?></h1>
												<strong>Requre Skill: </strong>
												<p class="skill"><?php echo $row1['expertise'];?></p>				
												<div class="float-right"><i class="fa fa-check-circle text-success h3" aria-hidden="true"></i><span class="text-success h3"> Payment Success<span></div>
												<a href="../data_image\<?php echo $data['submit_file'];?>" class="text-success" download>Dowonlod File</a><br>										
												<?php
												/*-------SELECT client name and id -------*/
												$hire_id=$row1['h_id'];						
												$query="SELECT * FROM `hire` WHERE `h_email`='$hire_id'";																	
															
												$run_hire=mysqli_query($conn,$query);
												while ($row2 = mysqli_fetch_array($run_hire))
												{
													$hire_con_email=$row2['con_email']; 
													$hire_fname=$row2['h_fname']; 
													$hire_lname=$row2['h_lname']; 																 
																								 
												}									
												?>	
												
												<br>
												<div class="text-dark">
													<p class="float-left"><strong><?php echo $hire_fname," ",$hire_lname;?></strong> </p>
													<p class="float-right"><strong><?php echo $hire_con_email;?></strong></p>
												</div><br>			
											</div>	
											</div>			
										</div>
									</section>	
									<?php
									} 
									?>
								</div>
							  </div>
								</div>
					</div>
								<div class="row">
							<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
								<div class="card-header bg-secondary text-white">
								<h4 class="my-0 font-weight-normal text-left">Working Job</h4>
							  </div>
							  <div class="card-body text-left">
							<?php	$query2="SELECT * FROM `jobs` WHERE `w_id`='$wid' AND `status`='working'";
								$run2=mysqli_query($conn,$query2);		
								
								/*------------ JOB LIST ------*/
								
								while ($row1 = mysqli_fetch_array($run2))
								{
									$id=$row1['j_id'];	
									
										
							?>	
	
								<section class="container"> 
									<div class="row">
										
										<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
											<div class="justify-content-center" id="job_contaner">
												<h5><strong class="job_title"><?php echo $row1['title'];?></strong></h5>				
												<p><?php echo $row1['description'];?></p>
												
												<strong>Requre Skill: </strong>
												<p class="skill"><?php echo $row1['expertise'];?></p>				
												
												<a href="../data_image\<?php echo $data['submit_file'];?>" class="text-success" download>Dowonlod File</a><br>										
												<?php
												/*-------SELECT client name and id -------*/
												$hire_id=$row1['h_id'];						
												$query="SELECT * FROM `hire` WHERE `h_email`='$hire_id'";																	
															
												$run_hire=mysqli_query($conn,$query);
												while ($row2 = mysqli_fetch_array($run_hire))
												{
													$hire_con_email=$row2['con_email']; 
													$hire_fname=$row2['h_fname']; 
													$hire_lname=$row2['h_lname']; 																 
																								 
												}									
												?>	
												
												<br>
												<div class="text-dark">
													<p class="float-left"><strong><?php echo $hire_fname," ",$hire_lname;?></strong> </p>
													<p class="float-right"><strong><?php echo $hire_con_email;?></strong></p>
												</div><br>			
											</div>	
											</div>			
										</div>
									</section>	
									<?php
									} 
									?>
								</div>
							  </div>
								</div>
					</div>
					</div>																						
					<div class="text-center float-left">
						<a href="index.php" class="btn btn-success h5"><--Back</a>
					</div>																	
						<form action="#" method="POST" class="text-center">
							<input type="hidden"  name="wid" value="<?php echo $wid;?>">
							<input type="submit" value="Delete Freelancer" name="submit" class="btn btn-danger">
						</form>
					
				</div>
			</div>			
		</div>
</section>	


</body>
</html>
<?php

	if($_POST['submit'])
	{
		$wid=$_POST['wid'];
		$query_work="DELETE FROM `work` WHERE `w_id`='$wid'";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'index.php\';</script>';	
		}
	}
 

?>