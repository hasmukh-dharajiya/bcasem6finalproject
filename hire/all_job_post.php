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
  <title>All Job Posts</title>
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
		$query_hire="SELECT * FROM `jobs` WHERE `h_id`='$username'";
	
		$run_hire=mysqli_query($conn,$query_hire);
			
				
		$row=mysqli_num_rows($run_hire);
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">All Jobs Post</h1>
		</div>		
	</div>
</section>
<section class="container"> 
	<div class="card-deck mb-3 text-center col-lg-6">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Total Job Posts</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $row;?></h1>        
      </div>
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
				<p><?php echo $row1['description'];?></p>
				<?php
				
					if($row1['status']=="pending")
					{ ?>
				<h5><strong class="text-warning float-right"><i class="fa fa-clock"></i> <?php echo $row1['status'];?></strong></h5><br>
				<?php	}
					
				?>	
				<?php
				
					if($row1['status']=="complete")
					{ ?>
				<h5><strong class="text-success float-right"><i class="fa fa-check-circle"></i> <?php echo $row1['status'];?></strong></h5><br>
				<?php	}
					
				?>
				<?php
				
					if($row1['status']=="working")
					{ ?>
				<h5><strong class="text-secondary float-right"><i class="fas fa-hourglass"></i> <?php echo $row1['status'];?></strong></h5><br>
				<?php	}
					
				?>
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>								
				<p>Submit Date<strong> (<?php echo $row1['time_duration'];?>)</strong></p>						
				<p>Job status<strong> (<?php echo $row1['status'];?>)</strong></p>																												
				<br>
				<?php
				
					if($row1['status']=="pending" OR $row1['status']=="working")
					{ ?>
				<a href="edit_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal edit-btn">Edit Job</a>				
				<?php	}
				?>	
				
				
				<a href="view_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">View Jobs</a>
				<?php
				
					if($row1['status']=="pending")
					{ ?>
				<a href="delete_job.php?jid=<?php echo $id;?>" class="btn btn-danger float-right text-white" id="send_praposal edit-btn">Delete Job</a>				<br><br>		
				<?php	}
				?>	
				
			</div>	
			</div>			
		</div>
</section>	
	<?php
		}
	?>
<section>
<footer>
	<?php 
		include "../layout/user_footer.php";
	?>
</footer>
</section>
</body>
</html>