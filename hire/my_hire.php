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
  <title>My Hire </title>
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
		<div c1ass="col-lg-12">
			<h6 class="h1">My Hire</h1>
		</div>
	</div>
</section>

	<?php
	
	if($_COOKIE["alredy"])
	{
	?>
	<div class="alert alert-warning text-center">
	  <?php echo "Welcome ! Plaese First Create Profile ";			
	  ?>

	</div>
	<?php
	}
	
		$h_id=$_SESSION['hire'];
		/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `proposal` WHERE `h_id`='$h_id'";
		
		$run_pro=mysqli_query($conn,$query_pro);
				
		while ($work_row = mysqli_fetch_array($run_pro))
		{

		$w_id=$work_row['w_id'];
		$j_id=$work_row['j_id'];
		
		/* For Job Title */
		$job_title="SELECT * FROM `jobs` WHERE `j_id`='$j_id' AND `status`='pending'";
		$run_title=mysqli_query($conn,$job_title);
		$num_job=mysqli_num_rows($run_title);
		if($num_job==0)
		{	
		}
		else
		{	
			$row_title = mysqli_fetch_array($run_title);
		
		$job_title=$row_title['title'];
		$proposal_status=$work_row['status'];
		
		$query2="SELECT * FROM `work` WHERE `w_id`='$w_id'";
		$run2=mysqli_query($conn,$query2);
		
		while ($row1 = mysqli_fetch_array($run2))
		{
			$id=$row1['w_id']; 
			
		?>	

<section class="container"> 
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 shadow border_bottom text-center" id="shadow"><br>
			<img src="../data_image/<?php echo $row1['profile_pic']; ?>" height="80%" width="80%" class="img-fluid img-circle" />
			<br><br>
			<div class="text-center">
				<a href="view_freelancer.php?wid=<?php echo $id;?>" class="btn btn-success">View Profile</a>
			</div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
			<h5 class="text-success float-right">This Job:- <?php echo $job_title;?></h5>
				<h5 class="h5"><strong class="job_ title text-success"><?php echo $row1['w_fname']," ",$row1['w_lname']; ?></strong></h5>
				
				<h6 class="h6"><strong><?php echo $row1['location']; ?></strong></h6>
				<h5><strong><?php echo $row1['title']; ?></strong></h5>
				<div class="float-right"><i class="fa fa-clock h5 text-warning" aria-hidden="true"></i><span class="text-warning h4"> <?php echo $proposal_status; ?></span></div>
				
				<p><?php echo $row1['description']; ?></p>
				<strong>My Skill: </strong>
				<p class="skill"><?php echo $row1['skill']; ?><p>				
				<p><strong>Complet Jobs:</strong><?php echo $row1['complete_job']; ?></p>
				<p><strong>Total earned: </strong>$ <?php echo $row1['earning']; ?></p>						
				<a href="view_saved_freelancer.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">View Job</a>												
				<form action="remove_proposal.php" method="POST">
				
					<input type="hidden" value="<?php echo $w_id;?>" name="w_id">
					<input type="hidden" value="<?php echo $h_id;?>" name="h_id">
					<input type="hidden" value="<?php echo $j_id;?>" name="j_id">
					<input type="submit" value="Remove" name="remove" class="btn btn-danger float-right text-white">
				</form>
			</div>	
		</div>			
	</div>
</section>	
	<?php
	}
		}
		
}
	?>
<section>

</body>
</html>