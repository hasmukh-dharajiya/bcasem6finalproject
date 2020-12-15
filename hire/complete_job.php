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
  <title>Complete Jobs</title>
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
		$query_hire="SELECT * FROM `jobs` WHERE `h_id`='$username' AND `status`='complete' ";
	
		$run_hire=mysqli_query($conn,$query_hire);
			
				
		$row=mysqli_num_rows($run_hire);
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Complete Jobs</h1>
		</div>	
	</div>
</section>
<section>
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
				<h1 align="right" class="text-success"><?php echo "$".$row1['budget'];?></h1>
				<?php
					if($row1['payment_status']=="pending")
					{
						?><h5 align="right"><strong class="text-warning">Payment Pending</strong></h5>		
						<?php
					}
					
				?>
				
				<strong>Requre Skill: </strong>
				<p class="skill"><?php echo $row1['expertise'];?></p>						
				<div class="float-right"><i class="fa fa-check-circle text-success h3" aria-hidden="true"></i><span class="text-success h3"> Payment Success<span></div>
			</div>	
			</div>			
		</div>
</section>	
	<?php
		}
	?>
</section>
</body>
</html>