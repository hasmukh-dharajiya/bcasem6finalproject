<?php
session_start();	
	require "../dbcon.php";
		
	if(!isset($_SESSION['hire']))
	{
		$_SESSION['invalid']="First Login After Use...!";
		header('location: ../login.php');
	}
	$username=$_SESSION['hire'];
	$work=$_SESSION['work'];
		
	$query_hire="SELECT * FROM `hire` WHERE `h_email`='$username'";
	
	$run_hire=mysqli_query($conn,$query_hire);
		
	$row_hire=mysqli_num_rows($run_hire);
				
	$data=mysqli_fetch_assoc($run_hire);
	$fname=$data['h_fname'];
	$lname=$data['h_lname'];				 								  
	$profile_status=$data['profile_status'];
						
	if($profile_status=="pending")
	{			
		echo '<script type="text/javascript">window.location=\'profile.php\';</script>';
	}		

?>
<html lang="en">
<head>
  <title>Hire Dashboard <?php echo $_SESSION['hire']?></title>
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

/*------------- NAVBAR ----------------*/
	include "../layout/hire_navbar.php";  
?>
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3" >
			<h4 class="">Find Freelancer</h4>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-7">
			<form action="#" method="POST"> 
				<div class="form-group">
				<select class="form-control" name="categories"> 
				  <option value="<?php echo $_POST['categories'];?>"><?php echo $_POST['categories'];	?></option>
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
			<input type="submit" value="Search" class="btn btn-success " name="search">
		</form>
		</div>
	</div>
</section>

	<?php

	$categories=$_POST['categories'];	
	$query="SELECT * FROM `work` WHERE `categories`='$categories'";
	$run=mysqli_query($conn,$query);
	$row_work=mysqli_num_rows($run);
	while ($row1 = mysqli_fetch_array($run))
	{
		$id=$row1['w_id']; 
	?>	

<section class="container"> 
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 shadow border_bottom text-center" id="shadow"><br>
			<img src="../data_image/<?php echo $row1['profile_pic']; ?>" height="80%" width="80%" class="img-fluid img-circle" />
			<br><br>
			<div class="text-center">
				<a href="view_freelancer.php?wid=<?php echo $id;?>" class="btn btn-success ">View Profile</a>
			</div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 shadow border_bottom" id="shadow" >
			<div class="justify-content-center" id="job_contaner">
				<h5 class="h5"><strong class="job_ title text-success"><?php echo $row1['w_fname']," ",$row1['w_lname']; ?></strong></h5>
				<h6 class="h6"><strong><?php echo $row1['location']; ?></strong></h6>
				<h5><strong><?php echo $row1['title']; ?></strong></h5><br>
				<p><?php echo $row1['description']; ?></p>
				<strong>My Skill: </strong>
				<p class="skill"><?php echo $row1['skill']; ?><p>				
				<p><strong>Complet Jobs:</strong><?php echo $row1['complete_job']; ?></p>
				<p><strong>Total earned: </strong>$ <?php echo $row1['earning']; ?></p>						
				<a href="view_freelancer.php?wid=<?php echo $id;?>" class="btn btn-success float-right text-white" id="send_praposal">View Or Invite to Job</a>
			</div>	
		</div>			
	</div>
</section>	
	<?php
	}
	if($row_work==0)
	{
	?>
<section class="container"> 
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 shadow border_bottom" id="shadow" >
			<div class="justify-content-center not text-center" id="job_contaner" >
				Currenty Freelancer Not Avalilable <span class="text-success">Search categories</span>
			</div>	
		</div>			
	</div>
</section>	
	<?php
	}	
	?>
<section>

</section>

</body>
</html>