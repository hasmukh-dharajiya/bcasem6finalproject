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
  <title>Payment</title>
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
	
/*------------ JOB LIST ------*/
		$username=$_SESSION['hire'];
		
		$query_hire="SELECT * FROM `jobs` WHERE `h_id`='$username'  AND `payment_status`='not_approval'";
	
		$run_hire=mysqli_query($conn,$query_hire);
?>
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Payment</h1>
		</div>		
	</div>
</section>
	<?php
	while ($row1 = mysqli_fetch_array($run_hire))
	{
		$id=$row1['j_id']; 
	?>	
<section class="container"> 
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<h5><strong class="job_title"><?php echo $row1['title'];?></strong></h5>
				<?php 
					$w_id=$row1['w_id'];
					$query="SELECT * FROM `work` WHERE `w_id`='$w_id'";
		
					$run=mysqli_query($conn,$query);										
							
					$data=mysqli_fetch_assoc($run);						
				?>
				<h5><strong class="text-warning float-right"><?php echo $row1['status']," with";?></strong></h5><br>								
				<h5><strong class="job_title float-right"><?php echo $data['w_fname']," ",$data['w_lname'];?></strong></h5>				
				
				<p><?php echo $row1['description'];?></p>
						
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>	
				
				<p>Submit Date<strong> (<?php echo $row1['time_duration'];?>)</strong></p>						
					<a href="view_submit_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right">Approve Submited Project</a>	<br>																							
				<br>					
			</div>	
			</div>			
		</div>
</section>	
	<?php
		}
	?>
</body>
</html>