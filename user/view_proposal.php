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
  <title>View Jobs</title>
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
/*------------------ NAVBAR --------------*/
	include "../layout/user_navbar.php";  
	
		/*------ Check Profile Complet or Not ---------*/
		$jid=$_POST['j_id'];
		
		$query="SELECT * FROM `jobs` WHERE `j_id`='$jid'";
		
		$run=mysqli_query($conn,$query);
		
		$row_work=mysqli_num_rows($run);
				
		$data=mysqli_fetch_assoc($run);		
		
		if($profile_status=="pending")
		{			
			echo '<script type="text/javascript">window.location=\'profile.php\';</script>';
		}		
?>

<!---------------- Header ------------------>
<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="h3">View Job</h3>			
		</div>
		
		
		
	</div>
<!---------------- View Freelancer ------------------>	
<section class="container"> 
		<div class="row">	
			<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			<div class="container">		
				<div class="row">									
					<div class="col-lg-10 col-md-10 col-sm-10"><br><br>
						<h2 class="h2 text-success"><?php echo $data['title'];?></h2>	
						<p><?php echo $data['description'];?></p>
						<p><strong>Category: </strong><?php echo $data['category'];?></p>
						<p><strong>Expertise: </strong><?php echo $data['expertise'];?></p>
						<p><strong>Time Duration: </strong><?php echo $data['time_duration'];?></p>
						<p><strong>Budget: </strong><?php echo $data['budget'];?></p>
						<i class="fa fa-download text-success" aria-hidden="true"></i> <a href="../data_image\<?php echo $data['project_file'];?>" class="text-success" download>Dowonlod File</a>
					</div>										
				</div>												
				<br><br>					
					<div class="text-center">
						<a href="accept_job.php?jid=<?php echo $data['j_id'];?>" class="btn btn-success ">Accept jobs</a>
					</div><br><br><br>												

				</div>
			</div>			
		</div>
</section>	
</body>
</html>