<?php
session_start();
	require "../dbcon.php";
		if(!isset($_SESSION['worker']))
		{
			header('location: ../login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
		
	
?>
<html lang="en">
<head>
  <title>Complet Jobs || Freelance Work</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/userindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
	<!-- Favicon -->
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
			<h6 class="h1">Complete Jobs</h1>
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
	
			$jid=$row_job['j_id'];//JOB ID			
			
			$query2="SELECT * FROM `jobs` WHERE `w_id`='$w_id' AND `status`='complete'";
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
		
/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>

</body>
</html>