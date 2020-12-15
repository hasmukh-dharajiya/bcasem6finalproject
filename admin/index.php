<?php
session_start();
	require "../dbcon.php";

		if(!isset($_SESSION['admin']))
		{
					header('location: login.php');
		}		
?>
<html lang="en">
<head>
  <title>Admin Dashbord</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/adminindex.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body class="jumbotron">
<?php

/*--------------------- NAVBAR -------------------------*/
	include "layout/admin_navbar.php";	
	
?>
<!-------------- JOB LIST--------------------------->
<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 text-center">
			<h2 class="">Welcome Admin</h2>
		</div>	
	</div>
</section>
<section>

<div class="container text-center job_card">
<?php
	$query="SELECT * FROM `work` where profile_status='conform'";
	
	$run=mysqli_query($conn,$query);
?>
<h2 align="left">List Of Freelancer</h2>
<div class="table-responsive">	
    <table class="table table-bordered">
	
        <tr>
		<?php while ($row1 = mysqli_fetch_array($run))
		{
		?>
          <td>
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="../data_image/<?php echo $row1['profile_pic']; ?>" alt="Card image cap" height="200">
			  <div class="card-body">
				<h5 class="card-title"><?php  echo $row1['w_fname']," ",$row1['w_lname'];?></h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="view_freelancer.php?wid=<?php echo $row1['w_id'];?>" class="btn btn-success">View Profile</a>
			  </div>
			</div>
		  </td>
		<?php 
		}
		?>		
		 </tr>      

    </table>
  </div>  
  
</div><br><br><br>



<div class="container text-center job_card">
<?php
	$query="SELECT * FROM `hire` where profile_status='conform'";
	
	$run=mysqli_query($conn,$query);	
?>
<h2 align="left">List Of Hire</h2>
<div class="table-responsive">	
    <table class="table table-bordered">
	
        <tr>
		<?php while ($row1 = mysqli_fetch_array($run))
		{
		?>
          <td>
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="../data_image/<?php echo $row1['profile_pic']; ?>" alt="Card image cap" height="200">
			  <div class="card-body">
				<h5 class="card-title"><?php  echo $row1['h_fname']," ",$row1['h_lname'];?></h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="view_hire.php?hid=<?php echo $row1['h_id'];?>" class="btn btn-success">View Profile</a>
			  </div>
			</div>
		  </td>
		<?php 
		}
		?>		
		 </tr>      

    </table>
  </div>

</div>
</section>
</body>
</html>