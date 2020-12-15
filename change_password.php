<?php
	session_start();
	require "dbcon.php";
		
	if(!$_SESSION['userchange'])
	{
		echo '<script type="text/javascript">window.location=\'forgot_password.php\';</script>';	
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
  <script type="text/javascript">
  
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

</head>
<body class="jumbotron">


<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Change Password</h1>
		</div>
		
	</div>
</section>
	
<section class="container"> 
		
<div class="login-container  align-items-center justify-content-center">
	<form class="login-form text-center shadow"  action="#" method="post">
	<h4 class="mb-5 font-weight-light text-uppercase" >Change Password</h4>
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" id="txtPassword"  required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Conform Password" name="conf_password" id="txtConfirmPassword" required>
		</div><br><br>
		<input type="submit" class="btn btn-success mt-5 btn-block success rounded-pill form-control-lg" value="Change Password" name="submit" id="btnSubmit">
	</form>
</div>
</section>	
</body>
</html>
<?php
if($_POST)
{
	echo $password=$_POST['password'];
	
	if($_SESSION['userchange']=='work')
	{
		$w_email=$_SESSION['email'];
		$query="UPDATE work SET `w_password`='$password' WHERE w_email='$w_email'";
		$run=mysqli_query($conn,$query);
		if($run)
		{
			echo '<script type="text/javascript">alert("password change successfully");window.location=\'login.php\';</script>';
		}
	}
	if($_SESSION['userchange']=='hire')
	{
		$h_email=$_SESSION['email'];
		$query="UPDATE hire SET `h_password`='$password' WHERE h_email='$h_email'";
		$run=mysqli_query($conn,$query);
		if($run)
		{
			echo '<script type="text/javascript">alert("password change successfully");window.location=\'login.php\';</script>';
		}
	}
}
?>