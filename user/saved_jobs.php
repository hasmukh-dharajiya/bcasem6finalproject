<?php
session_start();
	require "../dbcon.php";
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
		
?>
<html lang="en">
<head>
  <title>Saved Job</title>
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

/*---------------------------- NAVBAR -----------------------------------*/
	include "../layout/user_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Saved Jobs</h1>
		</div>
		
	</div>
</section>


<?php
		/*----------------- Search categories ---------------*/		
		$username=$_SESSION['worker'];
		
		/*------ Worker ---------*/
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
			
		$data=mysqli_fetch_assoc($run_work);
		$w_id=$data['w_id'];
		
		
		/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `proposal_hire` WHERE `w_id`='$w_id'";
		
		$run_pro=mysqli_query($conn,$query_pro);
				
		while ($job_row = mysqli_fetch_array($run_pro))
		{

		$jid=$job_row['j_id'];
		$proposal_status=$job_row['status'];
		
		$query2="SELECT * FROM `jobs` WHERE `j_id`='$jid' AND `status`='pending'";
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
				<div class="float-right">
					<i class="fa fa-clock h5 text-warning" aria-hidden="true"></i><span class="text-warning h4"> <?php echo $proposal_status;?></span>
				</div>
				
				<p><?php echo $row1['description'];?></p>
						
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>				
				<?php
					$proposal="SELECT * FROM `proposal_hire` WHERE `j_id`='$id' AND `status`='pending'";
					$run_proposal=mysqli_query($conn,$proposal);	
					$num_porposal=mysqli_num_rows($run_proposal);
				?>
				<p>Proposal<strong> (<?php echo $num_porposal;?>)</strong></p>				
				<p>Submit Date<strong> (<?php echo $row1['time_duration'];?>)</strong></p>						
				
						
				
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
				$query_hid="SELECT * FROM `jobs` WHERE `h_id`='$hire_id'";
				$run_hid=mysqli_query($conn,$query_hid);
				$row_hid=mysqli_num_rows($run_hid);				
				?>
				
				<p><strong><?php echo $row_hid;?></strong> Jobs Post</p>											
				<br>
				<div class="text-dark">
					<p class="float-left"><strong><?php echo $hire_fname," ",$hire_lname;?></strong> </p>
					<p class="float-right"><strong><?php echo $hire_con_email;?></strong></p>
				</div><br><br>
				<a href="view_saved_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">View Job</a>												
				<form action="remove_job.php" method="POST">
				
					<input type="hidden" value="<?php echo $id;?>" name="j_id">
					<input type="hidden" value="<?php echo $job_row['w_id']?>" name="w_id">
					<input type="submit" value="Remove" name="remove" class="btn btn-danger float-right text-white">
				</form>
				
			</div>	
			</div>			
		</div>
</section>	
	<?php
	}
		}
	?>
	
<?php

/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>

</body>
</html>