<?php
require "../dbcon.php";
session_start();

		if(!isset($_SESSION['worker']))
		{
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
?>
<html lang="en">
<head>
  <title>Jobs are Working</title>
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

/*--------------------- NAVBAR ------------------------*/
	include "../layout/user_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div c1ass="col-lg-12">
			<h6 class="h1">Working Jobs</h1>
		</div>
		
	</div>
</section>
	<?php
		$username=$_SESSION['worker'];		
		/*------ Worker ---------*/
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
			
		$data=mysqli_fetch_assoc($run_work);
		$w_id=$data['w_id'];//worker ID
		
		
		/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `jobs` WHERE `w_id`='$w_id' AND `status`='working'";
		
		$run_pro=mysqli_query($conn,$query_pro);
		
		
		while ($row_job = mysqli_fetch_array($run_pro))
		{
			$jid=$row_job['j_id'];//JOB ID			
			
			$query2="SELECT * FROM `jobs` WHERE `j_id`='$jid' AND `status`='working'";
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
				<h5><strong class="job_title "><?php echo $row1['title'];?></strong></h5>																	
			<?php	
			$t=time(); 
			$time1=(date("Y-m-d",$t));	
			$current_date_time_sec=strtotime($time1);
			$future_date_time_sec=strtotime($row1['time_duration']);
			$difference=$future_date_time_sec-$current_date_time_sec;
			$hours=($difference / 3600);
			$days=($hours/24);			
			if($days<0)
			{
			  $d=ceil($days). " days ";
			}
			else
			{
			  $d=floor($days). " days ";
			}
			
			
			if($d>0)
			{ ?>
				<div class="float-right"><i class="fa fa-clock h5 text-warning" aria-hidden="true"></i><span class="text-warning h5"> <?php echo $d." Left";?></span></div><br>
				<p><?php echo $row1['description'];?></p>
				<?php
					if($row1['payment_status']=="not_approval")
					{ ?>
						<div class="float-right"><i class="fa fa-search h5 text-warning" aria-hidden="true"></i><span class="text-warning h6"> Submited Project Under Review</span></div>
				<?php	}
				?>
				
				<?php
					if($row1['payment_status']=="reject")
					{ ?>
						<div class="float-right"><i class="fa fa-exclamation-triangle h5 text-danger" aria-hidden="true"></i><span class="text-danger h6"> Re-Submit Project</span></div>
				<?php	}
				?>
	
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>				
				
				<a href="../data_image\<?php echo $row1['project_file'];?>" class="text-success" download>Dowonlod File</a><br>		
				
				<a href="submit_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">Submit Job</a><br><br>
		<?php	}
		else
		{ ?>
				<div class="float-right"><span class="text-danger h5">Job Time duration Left</span></div><br>
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>
	<?php	}
?>			
			
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
		}
/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>

</body>
</html>