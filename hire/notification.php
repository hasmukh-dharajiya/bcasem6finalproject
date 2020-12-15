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
  <title>Notification</title>
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
/*---------------- NAVBAR ---------------*/
	include "../layout/hire_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Notification</h1>
		</div>		
	</div>
</section>

<?php
		$username=$_SESSION['hire'];
				$query="SELECT * FROM `hire` WHERE `h_email`='$username'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id'];
		$query_work="SELECT * FROM `notification` WHERE `h_id`='$h_id'";
		
		$run_work=mysqli_query($conn,$query_work);
		$row_job=mysqli_num_rows($run_work);		
		/*------------ JOB LIST ------*/
		while ($job_row = mysqli_fetch_array($run_work))
		{
		
	$nid=$job_row['n_id'];
							
	?>	
	
<section class="container"> 
	<div class="row">
		
		<div class="col-lg-10 col-md-10 col-sm-10 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<h5><strong class="job_title"><?php echo $job_row['subject'];?></strong></h5>				
				<p><strong><?php echo $job_row['message'];?></strong></p>				
				<a href="clear_notification.php?nid=<?php echo $nid;?>" class="btn btn-success float-right">Cleare</a>
				<p class="float-left"><?php echo $job_row['time'];?></p>	
			</div>
						
		</div>	
	</div>			
		
</section>	
	<?php
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
							Currenty Notification Not Avalilable
						</div>	
			</div>			
		</div>
</section>					
		<?php
		}
		?>



</body>
</html>