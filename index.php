<?php
session_start();
		if(isset($_SESSION['hire']))
		{
				if($_SESSION['work']=="hire")
				{
					header('location: hire/hire_index.php');
				}
		}
		if(isset($_SESSION['worker']))
		{
				if($_SESSION['work']=="work")
				{
					header('location: user/user_index.php');	
				}	
		}
		if(isset($_SESSION['admin']))
		{
				
					header('location: admin/index.php');	
				
		}
			
?>
<html>
<html lang="en">
<head>
  <title>Freelance Work | Hire Freelancers. Make things happen.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
	<!-- Favicon -->
	<link rel="shortcut icon" href="image/favicon.ico">
</head>
<body>

<!--------------------------- NAVBAR MENU ---------------------------->

<nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="#">Freelance Work</a>	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-body" href="login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-body" href="register.php">Sign Up</a>
				</li>
				<li class="nav-item">
					<div class="col-xs-2">
						     
						</div>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-success " href="register.php" id="btn">Post a Job</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!--------------------- BANNER WITH IMAGE ------------------------->
<div class="container-fluid" id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-white" id="headerset">
				<h2>Hire freelancers.<br>
				Make things happen.</h2>
				<p>Get matched to top talent in minutes through our global network of skilled 	freelancers and professional agencies.
				</p>
				<a href="register.php" class="btn btn-success" id="btn">Get Started</a>
			</div>
			<div class="col-md-6" >                       
					<div class="col-xs-2">
						     
						</div>
			</div>
		</div>
	</div>	
</div>
<!------------------ JOB CATEGORY----------------->
<section>
<div class="container text-center job_card">
	<h3>Browse freelancer</h3>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img1.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h6 class="card-title">Web, Mobile & Software Dev</h6>					
  			</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img2.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Design & Creative</h5>					
  			</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img4.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Writing</h5>					
				</div>
			</div>
		</div>	
				<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img8.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Sales & Marketing</h5>					
  			</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img3.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Admin Support</h5>					
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img5.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Customer Service</h5>					
				</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img6.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Data Science & Analytics</h5>					
				</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img7.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Engineering & Architecture</h5>					
				</div>
			</div>
		</div>	
	</div>
	
	<div class="row" id="hide">
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img3.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Admin Support</h5>					
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img5.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Customer Service</h5>					
				</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img6.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Data Science & Analytics</h5>					
				</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-6 d-block m-auto">
			<div class="card">
				<img src="image/img7.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Engineering & Architecture</h5>					
				</div>
			</div>
		</div>	
	</div>
	
</div>
</section>

<!------------------------- SEE ALL ----------------------->

<p class="text-center">Don’t see what you’re looking for? <span class="text-success" id="all">See all categories</span>  <span class="text-success" id="less">Less categories</span></p>

<!------------------------- How It Work --------------------------->

<section>
<div class="container">
	<h3 class="text-center" style="margin-top:30px;">How It Work</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-block m-auto">
			<div class="card">
			  <div class="card-body justify-content-center ">
			    <h5 class="card-title">1. Post a job (it’s free)</h5>					
			    <p>It's easy. Simply post a job you need completed and receive competitive proposals from freelancers within minutes.</p>			    
  			</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-block m-auto">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">2. Choose freelancers</h5>					
			    <p>Whatever your needs, there will be a freelancer to get it done: from web design, mobile app development and graphic design(and a whole lot more).</p>			    
  			</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-block m-auto">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">3. Collaborate easily</h5>					
			    <p>Use Upwork to chat or notification, share files, and track project milestones from your desktop or mobile.</p>			    
  			</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-block m-auto">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">4. Payment simplified</h5>					
			    <p>Pay fixed-price and receive invoices through freelance work. Pay for work you authorize.</p>
  			</div>
			</div>
		</div>
	</div>
</section>
<!----------------------- FOOTER ------------------------->

<footer id="footer" class="footer">
	<div class="container">
		
	</div>
	<p class="text-center text-white">Copyright © 2019 Freelance Work Technology Global Inc.</p>
</footer>
</body>
<script>
$(document).ready(function(){
	$("#hide").hide();
	$("#less").hide();
  $("#all").click(function(){
    $("#hide").show();
	$("#all").hide();
	$("#less").show();
	
  });
  $("#less").click(function(){
    $("#hide").hide();
	$("#all").show();
	$("#less").hide();
  });
});
</script>
</html>