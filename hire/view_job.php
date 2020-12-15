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
		$jid=$_GET['jid'];
		$jid=$_GET['jid'];
		
		$query="SELECT * FROM `jobs` WHERE `j_id`='$jid'";
		
		$run=mysqli_query($conn,$query);
		
		$row_work=mysqli_num_rows($run);
				
		$data=mysqli_fetch_assoc($run);		
?>

<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="h1">View Job</h1>			
		</div>
		<div class="col-lg-2" >			
		</div>			
	</div>
</section>
<!---------------- List Of View Job ------------------>	
<section class="container"> 
		<div class="row">	
			<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			
			<div class="container">		
				<div class="row">					
				
					<div class="col-lg-10 col-md-10 col-sm-10"><br><br>
						<h2 class="h2"><?php echo $data['title'];?></h2>	
						<p><?php echo $data['description'];?></p>
			
						<p><span class="h6">Job category: </span><?php echo $data['category'];?></p>
						<p><span class="h6">expertise: </span><?php echo $data['expertise'];?></p>
						<p><span class="h6">time duration: </span><?php echo $data['time_duration'];?></p>
						<p><span class="h6">budget: </span><?php echo $data['budget'];?></p>
						<a href="../data_image\<?php echo $data['project_file'];?>" class="btn btn-success" download>Dowonlod File</a>
					</div>										
				</div>												
				<br><br>					
					<div class="text-center">
						<a href="all_job_post.php" class="btn btn-success "><--Back</a>
					</div><br><br><br>												

				</div>
			</div>			
		</div>
</section>	
<section>
<footer>
	<?php 
		include "../layout/user_footer.php";
	?>
</footer>
</section>
</body>
</html>