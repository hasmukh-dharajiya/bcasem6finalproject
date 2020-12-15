<?php
session_start();
	require "dbcon.php";

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

<section>
<div class="container text-center job_card">
	<h3>Find your freelancer</h3>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img1.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h6 class="card-title">Web, Mobile & Software Dev</h6>					
				</div>
			</div>
		</div>

	</div>
	
</div>
</section>


</body>
</html>