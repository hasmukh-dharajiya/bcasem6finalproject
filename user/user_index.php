<?php
session_start();
	require "../dbcon.php";
			/*------ invalid massage ---------*/
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			echo '<script type="text/javascript">window.location=\'../login.php\';</script>';		
		}	
		
		/*------ Check Profile Complet or Not ---------*/
		$username=$_SESSION['worker'];
		$work=$_SESSION['work'];
		
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
				
		$data=mysqli_fetch_assoc($run_work);
	 	$profile_status=$data['profile_status'];
	 	$w_id=$data['w_id'];
		
		if($profile_status=="pending")
		{			
			echo '<script type="text/javascript">window.location=\'profile.php\';</script>';
		}		
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Worker Dash Board <?php echo $_SESSION['worker'];?></title>
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

/*------------------- NAVBAR ----------------------*/
include "../layout/user_navbar.php";

?>
<!-------------- JOB LIST--------------------------->
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2" >
			<h4 class="">Find Work</h4>
		</div>
		
		<div class="col-lg-8 col-md-8 col-sm-8">
					<form action="#" method="POST"> 
			  <div class="form-group">
			  <select class="form-control" name="categories"> 
				  <option value="<?php echo $_POST['categories'];	?>"><?php echo $_POST['categories'];	?></option>
				  <option value="Accounting & Consulting">Accounting & Consulting</option>
				  <option value="Admin Support">Admin Support</option>
				  <option value="Customer Service">Customer Service</option>
				  <option value="Data Science & Analytics">Data Science & Analytics</option>
				  <option value="Design & Creative">Design & Creative</option>
				  <option value="Engineering & Architecture">Engineering & Architecture</option>
				  <option value="IT & Networking">IT & Networking</option>
				  <option value="Legal">Legal</option>
				  <option value="Sales & Marketing">Sales & Marketing</option>
				  <option value="Translation">Translation</option>
				  <option value="Web, Mobile & Software Dev">Web, Mobile & Software Dev</option>
				  <option value="Writing">Writing</option> 
			  </select>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2">
			<input type="submit" value="Search" class="btn btn-success" name="search">
				</form>
		</div>
	</div>
</section>
	<?php
		$a=0;
		/*
		
		===========
		Select Job Filter Like Pending job , Proposal not show
		==========
		*/
		
		/*----------------- Search categories ---------------*/
		$categories=$_POST['categories'];	
		$query="SELECT * FROM `jobs` WHERE `category`='$categories' AND `status`='pending'";
		$run=mysqli_query($conn,$query);
		$row_job=mysqli_num_rows($run);
		
		/*------------ JOB LIST ------*/
		
		while ($row1 = mysqli_fetch_array($run))
		{
			$id=$row1['j_id']; 
			/*------------ Proposal ------*/
			$query_pro="SELECT * FROM `proposal_hire` WHERE `j_id`='$id' AND `w_id`='$w_id'";
			
			$run_pro=mysqli_query($conn,$query_pro);
				if(!mysqli_fetch_array($run_pro))
				{
					
								
	?>	
	
<section class="container"> 
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-0">
		</div>
		<div class="col-lg-10 col-md-10 col-sm-12 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<h5><strong class="job_title"><?php echo $row1['title'];?></strong></h5>
				<a href="view_job.php?jid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">Send Proposal</a>
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
				</div>
						
			</div>	
			</div>			
		</div>
</section>	
			<?php
				}
}
	
	if($row_job==0)	
	{
		?>		
		<section class="container"> 
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-0">
			</div>
			<div class="col-lg-10 col-md-10 col-sm-12 shadow border_bottom" id="shadow" >
						<div class="justify-content-center not text-center" id="job_contaner">
							Currenty Job Not Avalilable <span class="text-success">Search categories</span>
						</div>	
			</div>			
		</div>
</section>					
		<?php
		}
		?>

<?php

/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>

</body>
</html>