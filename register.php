<?php 

session_start();
if(isset($_SESSION['user']))
		{
			if($_SESSION['work']=="hire")
				{
					header('location: hire/hire_index.php');
				}
				if($_SESSION['work']=="work")
				{
					header('location: user/user_index.php');	
				}	
		}
			

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Freelance Work | Hire Freelancers. Make things happen.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/register.css">
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
<body>

<!------------------ NAVBAR ---------------->

<nav class="navbar navbar-light bg-light shadow">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="index.php">Freelance Work</a>	
 	</div>
</nav>

<!-------------------- REGISTER -------------------------->

<div class="login-container align-items-center justify-content-center" style="height:auto;">
	<form class="login-form text-center shadow" method="post" action="validation.php">
		<h1 class="mb-5 font-weight-light text-uppercase" >Register</h1>
		<div class="form-group">
			<input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name" name="fname" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="lname" required>
		</div>
		<div class="form-group">
			<input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Id" name="email" required>
			
					<?php
					/*--------------- SHOW INVALID  MASSEGE ----------------*/					
					if(isset($_SESSION['invalid']))
					{
						?><pre class="text-danger text-left h6">  <?php echo $_SESSION['invalid'];?></pre><?php
					}
					session_unset();
					?>
		</div>		
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" id="txtPassword"  required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control rounded-pill form-control-lg" placeholder="Conform Password" name="conf_password" id="txtConfirmPassword" required>
		</div><br><br>


 		<div class="form-group">
			<label>Security Question</label>
		
			<select name="question" id="cmbQue" class="form-control">
                        <option>What is Your Pet Name?</option>
                        <option selected="selected">Who is Your Favourite Person?</option>
                        <option>What is the Name of Your First School?</option>
                                                                  </select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control rounded-pill form-control-lg" placeholder="Answer" name="answer" required>
		</div> 
		<!--
		=====

                                        <td>Security Question:</td>
                      <td><select name="cmbQue" id="cmbQue">
                        <option>What is Your Pet Name?</option>
                        <option selected="selected">Who is Your Favourite Person?</option>
                        <option>What is the Name of Your First School?</option>
                                                                  </select></td>
                    </tr>
                    <tr>
                      <td>Answer:</td>
                      <td><span id="sprytextfield11">
                      <label>
                      <input type="text" name="txtAnswer" id="txtAnswer" />
                      </label>
                      <span class="textfieldRequiredMsg">Enter Answer.</span></span></td>
                    </tr>
====
		-->
		
		
		<div class="align-items-center justify-content-between">
			<div class="form-radio">
				<input type="radio" class="form-radio-input"  name="work" value="hire" required><span class="h5">HIRE</span>
				<input type="radio" class="form-radio-input" name="work" value="work" required>WORK				
			</div>			
		</div>
			<input type="submit" class="btn btn-success mt-5 btn-block success rounded-pill form-control-lg" value="Register" name="submit" id="btnSubmit">
			<p class="mt-3 font-weight-normal"> Alredy have an account <a href="login.php"><strong>Login Now</strong></a></p>
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
