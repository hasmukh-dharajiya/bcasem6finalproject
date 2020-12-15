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
  	<link rel="stylesheet" href="css/login.css">
	<link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
	<!-- Favicon -->
	<link rel="shortcut icon" href="image/favicon.ico">
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</head>
<body>

<!------------------ NAVBAR ---------------->

<nav class="navbar navbar-light bg-light shadow">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="index.php">Freelance Work</a>	
 	</div>
</nav>

<!-------------------- LOGIN -------------------------->

<div class="login-container  align-items-center justify-content-center">
	<form class="login-form text-center shadow"  action="login_validation.php" method="post">
		<h1 class="mb-5 font-weight-light text-uppercase" >Login</h1>
	
		<?php
					/*--------------- SHOW INVALID  MASSEGE ----------------*/					
					if(isset($_SESSION['invalid']))
					{
					?><pre class="text-danger text-left h5">  <?php echo $_SESSION['invalid'];?></pre><?php
						
					}
					
		?>
		<div class="form-group">
			<input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Address" name="email" required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" required>
		</div>
		<div class="forgot-link d-flex align-items-center justify-content-between">
			<div class="form-check">
				<input type="checkbox" class="form-check-input " id="remember">
				<label for="remember">Remember Password</label>
			</div>
				<a href="forgot_password.php">Forgot Password</a>
			
		</div>
			<input type="submit" class="btn btn-success mt-5 btn-block success rounded-pill form-control-lg" value="Login" name="submit">
			<p class="mt-3 font-weight-normal"> Don't have an account <a href="register.php"><strong>Register Now</strong></a></p>
		</form>
</div>
	
<!----------------------- FOOTER ------------------------->
	
	<footer id="footer">
		<div class="container">
			<h4 class="text-white">HIGHEST IN-DEMAND TALENT</h4>
		</div>
		<h4 class="text-center text-white">Copyright &copy 2019 	</h4>
	</footer>
	
</body>
</html>