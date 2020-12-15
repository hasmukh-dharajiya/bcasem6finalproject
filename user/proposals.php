<?php
session_start();
		if(!isset($_SESSION['worker']))
		{
			header('location: ../login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
?>
<html lang="en">
<head>
  <title>Proposal</title>
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

/*----------------- NAVBAR -----------------*/
	include "../layout/user_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Proposal</h1>
		</div>
		
	</div>
</section>
	<?php

	$username=$_SESSION['worker'];		
	
	$query1="SELECT * FROM `work` WHERE `w_email`='$username'";
	$run=mysqli_query($conn,$query1);
	$row = mysqli_fetch_array($run);
	$w_id=$row['w_id'];
	
	/*------------ Proposal ----------*/
	$query_pro="SELECT * FROM `proposal` WHERE `w_id`='$w_id' && `status`='pending' ";
	$run_pro=mysqli_query($conn,$query_pro);

	while ($row_job = mysqli_fetch_array($run_pro))
	{
		$j_id=$row_job['j_id']; 
		$h_id=$row_job['h_id']; 
		$w_id=$row_job['w_id']; 
		
		$query="SELECT * FROM `jobs` WHERE `j_id`='$j_id' AND `status`='pending'";
		$run1=mysqli_query($conn,$query);
		
				
		
		
		/*$row_job['w_id'];
		
		
		$jid=$row['j_id'];*/
		
		
		while ($row1 = mysqli_fetch_array($run1))
		{
			$j_id=$row1['j_id']; 
			
	?>	
	
	<section class="container"> 
		<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<br><h5><strong class="job_title"><?php echo $row1['title'];?></strong></h5>				
				<p><?php echo $row1['description'];?></p>
						
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>	
				<?php
					$proposal="SELECT * FROM `proposal` WHERE `j_id`='$j_id' AND `status`='pending'";
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

				<section>
				<form action="view_proposal.php" method="POST" class="float-right">	
					<input type="hidden" value="<?php echo $w_id;?>" name="w_id">	
					<input type="hidden" value="<?php echo $j_id;?>" name="j_id">	
					<input type="submit" name="view" class="btn btn-success" value="View Or Accept Proposal">
				</form>
				
				<form action="reject.php" method="POST" class="float-right">	
					<input type="hidden" value="<?php echo $h_id;?>" name="h_id">	
					<input type="hidden" value="<?php echo $w_id;?>" name="w_id">	
					<input type="hidden" value="<?php echo $j_id;?>" name="j_id">	
					<input type="submit" name="reject" class="btn btn-danger" value="Reject">
				</form>	
			</section>				
				<br><br>
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