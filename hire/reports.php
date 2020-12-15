<?php

 session_start();
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
?>
<html lang="en">
<head>
  <title>Report</title>
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
/*---------------------------- NAVBAR -----------------------------------*/
	include "../layout/hire_navbar.php";  
?>
<?php
		
	$username=$_SESSION['hire'];	
	$query_hire="SELECT * FROM `hire` WHERE `h_email`='$username'";
		
	$run_hire=mysqli_query($conn,$query_hire);
		
	
				
	$data_hire=mysqli_fetch_assoc($run_hire);
	
	$hid=$data_hire['h_id'];
	
	$query_hire="SELECT * FROM `hire` where `h_id`='$hid' ";
		
	$run_hire=mysqli_query($conn,$query_hire);
		
	$row_hire=mysqli_num_rows($run_hire);
				
	$data=mysqli_fetch_assoc($run_hire);
				
	$fname=$data['h_fname'];
 	$lname=$data['h_lname'];				 								  
	$phone_no = $data['phone_number'];
	$city =$data['city'];
	$con_email = $data['con_email'];
 	$location = $data['location'];
	$profile_pic = $data['profile_pic'];
 	$profile_status=$data['profile_status'];
?>
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Report</h1>
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
								<h4 class="my-0 font-weight-normal">Total Job Post</h4>
							  </div>
							  <div class="card-body">
							  <?php 
							  
								$query="SELECT * FROM `hire` WHERE `h_id`='$hid'";																	
							
								$run_id=mysqli_query($conn,$query);
								$row2 = mysqli_fetch_array($run_id);
								$h_id=$row2['h_email'];
								
								$query_hire="SELECT * FROM `jobs` WHERE `h_id`='$h_id'";
	
								$run_hire=mysqli_query($conn,$query_hire);
									
										
								$row=mysqli_num_rows($run_hire);
							  ?>
								<h1 class="card-title pricing-card-title"><?php echo $row;?></h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-3">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Complet Job</h4>
							  </div>
							  <div class="card-body">
							  <?php
							  
							  $query_hire="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='complete'";
	
								$run_hire=mysqli_query($conn,$query_hire);
									
										
								$row1=mysqli_num_rows($run_hire);
							  ?>
								<h1 class="card-title pricing-card-title"><?php echo $row1;?></h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-3">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Working Job</h4>
							  </div>
							  <div class="card-body">
							  <?php
							  
							  $query_hire="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='working'";
	
								$run_hire=mysqli_query($conn,$query_hire);
									
										
								$row1=mysqli_num_rows($run_hire);
							  ?>
								<h1 class="card-title pricing-card-title"><?php echo $row1;?></h1>        
							  </div>
							</div>
						</div>
							<div class="card-deck mb-3 text-center col-lg-3">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Pending Job</h4>
							  </div>
							  <div class="card-body">
							  <?php
							  
							  $query_hire="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='pending'";
	
								$run_hire=mysqli_query($conn,$query_hire);
									
										
								$row1=mysqli_num_rows($run_hire);
							  ?>
								<h1 class="card-title pricing-card-title"><?php echo $row1;?></h1>        
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
										<p><?php echo $phone_no;?></p>
									</div>
									<div class="col-lg-6">
										<strong>Contact Email Id</strong>
										<p><?php echo $con_email;?></p>
									</div>
									<div class="col-lg-6">
										<strong>City</strong>
										<p><?php echo $city;?></p>
									</div>
									<div class="col-lg-6">
										<strong>Location</strong>
										<p><?php echo $location;?></p>
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
								<h4 class="my-0 font-weight-normal text-left">Complete Job</h4>
							  </div>
							  <div class="card-body text-left">
							<?php	$query2="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='complete'";
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
							<?php	$query2="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='working'";
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
												<div class="float-right"><i class="fa fa-clock h5 text-warning" aria-hidden="true"></i><span class="text-warning h4"> <?php echo $row1['status']; ?></span></div>
												
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
						<div class="row">
							<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
								<div class="card-header bg-secondary text-white">
								<h4 class="my-0 font-weight-normal text-left">Pending Job</h4>
							  </div>
							  <div class="card-body text-left">
							<?php	$query2="SELECT * FROM `jobs` WHERE `h_id`='$h_id' AND `status`='pending'";
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
												<h5><strong class="text-warning float-right"><i class="fa fa-clock"></i> <?php echo $row1['status'];?></strong></h5>
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
						<a href="hire_index.php" class="btn btn-success h5"><--Back</a>
					</div>																	
						
					
				</div>
			</div>			
		</div>
</section>	


</body>
</html>