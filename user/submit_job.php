<?php
session_start();
	require "../dbcon.php";
	
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
		$jid=$_GET['jid'];
		
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
			<h3 class="h3">Simbit work or request payment </h3>			
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
					
						<i><p class="h6">Use this form to request approval for the work you've completed. Your payment will be released upon approval.</p></i><br>
						<p><strong class="h3">Job Title</strong></p>
						<p class="h5"><?php echo $data['title'];?></p><br>
						<div class="row">
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Job Amount</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php echo "$ ",$data['budget'];?></h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Admin Charge</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title">20%</h1>        
							  </div>
							</div>
						</div>
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Reciverd</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php $admin_profit=((($data['budget'])*20)/100); 
					echo	"$ ",$total=($data['budget'])-$admin_profit; ?></h1>        
							  </div>
							</div>
						</div>
					</div>							

						
					<p class="h3">Attach file</p>
					<strong>Plese Attach Complet job file.</strong>
				<form action="submit_validation.php" method="POST" enctype="multipart/form-data">	
					<input type="hidden" value="<?php echo $jid;?>" name="jid">	
					
					<input type="file" class="form-control col-lg-5" name="project_file"  required><br><br>
					<center><input type="submit" name="submit" class="btn btn-success"></center>
				</form>	
					</div>										
				</div>												
				<br><br><br><br>												

				</div>
			</div>			
		</div>
</section>	
</body>
</html>
