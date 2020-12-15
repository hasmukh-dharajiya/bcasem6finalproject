<?php

 session_start();
		if(!isset($_SESSION['hire']))
		{		
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
		
?>
<html>
<html lang="en">
<head>
  <title>My Proposal</title>
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
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Proposal</h1>
		</div>	
	</div>
</section>
<?php

	$username=$_SESSION['hire'];
	$h_id=$_SESSION['hire'];
	/*----------HIRE--------------*/
	
				$query="SELECT * FROM `hire` WHERE `h_email`='$h_id'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id'];
	$query1="SELECT * FROM `proposal_hire` WHERE `h_id`='$h_id' AND `status`='pending'";
	$run=mysqli_query($conn,$query1);

	while ($row = mysqli_fetch_array($run))
	{
		$w_id=$row['w_id']; 
		$j_id=$row['j_id']; 
		$h_id=$row['h_id']; 
		
		$query="SELECT * FROM `work` WHERE `w_id`='$w_id'";
		$run1=mysqli_query($conn,$query);
		
		
		$row_job['w_id'];
		
		
		$jid=$row['j_id'];
		
		$query_job="SELECT * FROM `jobs` WHERE `j_id`='$jid' AND `status`='pending'";
	
		$run_job=mysqli_query($conn,$query_job);
		$num_job=mysqli_num_rows($run_job);
		$job_row = mysqli_fetch_array($run_job);
		$job_row['title'];	

		if($num_job==0)
		{			
		}
		else
		{
			while ($row1 = mysqli_fetch_array($run1))
		{
			$w_id=$row1['w_id']; 
			
	?>	

<section class="container"> 
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 shadow border_bottom text-center" id="shadow"><br>
			<img src="../data_image/<?php echo $row1['profile_pic']; ?>" height="80%" width="80%" class="img-fluid img-circle" />
			<br><br>
			<div class="text-center">
				<form action="view_proposal.php" method="POST">				
				<input type="hidden" value="<?php echo $w_id;?>" name="w_id">	
				<input type="hidden" value="<?php echo $job_row['j_id'];?>" name="j_id">	
				<input type="submit" name="view" class="btn btn-success" value="View Profile">
				</form>
			</div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<h5 class="h5"><strong class="job_ title text-success"><?php echo $row1['w_fname']," ",$row1['w_lname']; ?></strong></h5>
				
				<h5 class="h5"><strong class="job_ title text-success float-right"><?php echo $job_row['title']; ?></strong></h5>
				<h6 class="h6"><strong><?php echo $row1['location']; ?></strong></h6>
				<h5><strong><?php echo $row1['title']; ?></strong></h5><br>
				<p><?php echo $row1['description']; ?></p>
				<strong>My Skill: </strong>
				<p class="skill"><?php echo $row1['skill']; ?><p>				
				<p><strong>Complet Jobs: </strong><?php echo $row1['complete_job']; ?></p>
				<p><strong>Total earned: </strong>$ <?php echo $row1['earning']; ?></p>						
				<form action="view_proposal.php" method="POST" class="float-right">	
					<input type="hidden" value="<?php echo $w_id;?>" name="w_id">	
					<input type="hidden" value="<?php echo $job_row['j_id'];?>" name="j_id">	
					<input type="submit" name="view" class="btn btn-success" value="View Or Accept Proposal">
				</form>
				
				<form action="reject.php" method="POST" class="float-right">	
					<input type="hidden" value="<?php echo $h_id;?>" name="h_id">	
					<input type="hidden" value="<?php echo $w_id;?>" name="w_id">	
					<input type="hidden" value="<?php echo $j_id;?>" name="j_id">	
					<input type="submit" name="reject" class="btn btn-danger" value="Reject">
				</form>				
				<br><br>
			</div>	
		</div>			
	</div>
</section>	
	<?php
	}
		}
		
		
	}
	?>

</body>
</html>