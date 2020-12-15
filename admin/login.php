<?php 
session_start();
		if(isset($_SESSION['admin']))
		{
					header('location: index.php');	
		}							
?>	
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/login.css">
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</head>
<body>

<!------------------ NAVBAR ---------------->
<nav class="navbar navbar-light bg-light shadow">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="../index.php">Freelance Work</a>	
 	</div>
</nav>
<!-------------------- LOGIN -------------------------->
<section>
<div class="login-container  align-items-center justify-content-center">
	<form class="login-form text-center shadow"  action="login_validation.php" method="post">
		<h1 class="mb-5 font-weight-light text-uppercase" >Admin Login</h1>	
		<?php
					/*--------------- SHOW INVALID  MASSEGE ----------------*/					
					if(isset($_SESSION['invalid']))
					{
					?><pre class="text-danger text-left h5">  <?php echo $_SESSION['invalid'];?></pre><?php						
					}					
		?>
		<div class="form-group">
			<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" name="username" required >
		</div>
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" required>
		</div>
				
			<input type="submit" class="btn btn-success mt-5 btn-block success rounded-pill form-control-lg" value="Login" name="submit">
		</form>
</div>
	</section>
<!----------------------- FOOTER ------------------------->

	<footer id="footer">
		<div class="container">
			<h4 class="text-white">Admin Footer</h4>
		</div>
		<h4 class="text-center text-white">Copyright &copy 2019 	</h4>
	</footer>
	
</body>
</html>