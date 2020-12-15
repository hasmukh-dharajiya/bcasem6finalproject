<?php
session_start();
/* ----------------- DATABASE SELECT ------------------*/
require "../dbcon.php";
		if(!isset($_SESSION['admin']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	

			$query_admin="SELECT * FROM `admin` WHERE `a_id`='1'";
			$run_admin=mysqli_query($conn,$query_admin);	
			$row3 = mysqli_fetch_array($run_admin);	

			$query2="SELECT * FROM `jobs` WHERE `status`='complete'";
			$run2=mysqli_query($conn,$query2);											
			$row_job=mysqli_num_rows($run2);
			
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
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php
/*--------------- NAVBAR -------------------*/
	include "layout/admin_navbar.php"; 		
?>	
<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="h3">Admin Earnings</h3>			
		</div>
		<div class="col-lg-2" >			
		</div>		
	</div>
</section>

<section class="container"> 
<div class="row">
	<div class="card-deck mb-3 text-center col-lg-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Total Earnings </h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$<?php echo $row3['earning'];?></h1>        
      </div>
    </div>
	</div>
	<div class="card-deck mb-3 text-center col-lg-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Total Complete Jobs</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$<?php echo $row_job;?></h1>        
      </div>
    </div>
	</div>
</div>
	<div class="row">
							<div class="card-deck mb-3 text-center col-lg-12">
							<div class="card mb-4 shadow-sm">
								<div class="card-header bg-secondary text-white">
								<h4 class="my-0 font-weight-normal text-left">List Earnings Job</h4>
							  </div>
							  <div class="card-body text-left">
							<?php	$query2="SELECT * FROM `jobs` WHERE `status`='complete'";
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
												<?php
													$profit_current=((($row1['budget'])*20)/100);
												?>
												<h1 align="right" class="text-success"><?php echo "$".$profit_current;?></h1>
												<strong>Requre Skill: </strong>
												<p class="skill"><?php echo $row1['expertise'];?></p>				
																								
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
</section>



</body>
</html>