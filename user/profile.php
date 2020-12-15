<?php
session_start();
	require "../dbcon.php";
		/*------ invalid massage ---------*/
		if(!isset($_SESSION['worker']))
		{
			header('location: ../login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}	
?>
<html lang="en">
<head>
  <title>Edit Profile</title>
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


	
	/*--------- Worker Fname and Lname in textbox ---------*/
			 $username=$_SESSION['worker'];
					$work=$_SESSION['work'];
		
				$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
				$run_work=mysqli_query($conn,$query_work);
		
				$row_work=mysqli_num_rows($run_work);
				
				$data=mysqli_fetch_assoc($run_work);
				$fname=$data['w_fname'];
				$lname=$data['w_lname'];
				$email=$data['w_email'];
				$profile_status=$data['profile_status'];				
				$profile_pics=$data['profile_pic'];				
?>

	<?php
	/*------------- Check Profile Creaet or not ----------*/
	if($profile_status=="pending")
	{
		?>
	<div class="alert alert-success text-center">
	  <?php echo "Welcome ",$fname," ",$lname," ! Plaese First Create Profile ";
	  ?>
	</div>
		<?php
		}
	?>
<!-------------- PROFILE Title --------------->
<section class=" container find_work">
	<div class="row">
		<div c1ass="col-lg-12" id="title">
			<h6 class="h1">My Profile</h1>
		</div>		
	</div>
</section>

<!-------------- PROFILE CONTAINER --------------->

<section class="container"> 
		<div class="row" >	
			<div class="col-lg-12 col-md-12 col-sm-12  shadow border_bottom" id="shadow2">
					<div class="justify-content-center">
					
						<form action="edit_profile.php" method="POST" enctype="multipart/form-data">		
						<?php
						if($profile_status=="conform")
						{
						?>
						<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4">
								
								
								<img src="../data_image/<?php echo $data['profile_pic'];?>" height="100" width="100" alt="Profile Pic" class="img-circle">								
									<div class="form-group" id="form_control">
										<input type="file" class="btn btn-success" name="c_pic">
									</div><br>	
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<strong class="h3"><?php echo $fname," ",$lname;?></strong>	<br>
									
								<strong class="h6"><?php echo $data['location'];?></strong>		
								
								</div>
								
							</div>
						<?php
						}
						?>						
						
						
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>First Name</strong>
									<div class="form-group" id="form_control">
										<input type="text" class="form-control"	value="<?php echo $fname;?>" name="fname" 			 required>
									</div><br>	
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>Last Name</strong>
									<div class="form-group" id="form_control">
										<input type="text" class="form-control"	value="<?php echo $lname;?>" name="lname"  name="lname" 			 required>
									</div><br>									
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>Phone Number</strong>
									<div class="form-group" id="form_control">
										<input type="number" class="form-control"	name="phone_no" 	value="<?php echo $data['phone_no'];?>"	placeholder="Enter Your Phone text" required>
									</div><br>	
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>Contact Email Id</strong>
									<div class="form-group" id="form_control">
										<input type="email" class="form-control"	name="con_email" 	value="<?php echo $data['con_email'];?>" required>
									</div><br>									
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>City</strong>
									<div class="form-group" id="form_control">
										<input type="text" class="form-control"	name="city" 	value="<?php echo $data['city'];?>"		placeholder="Enter Your city" required>
									</div><br>	 
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<strong>Location</strong>
									<div class="form-group" id="form_control">
										<input type="text" class="form-control"	name="location" 	value="<?php echo $data['location'];?>"		placeholder="Enter Your current location" required>
									</div><br>														
								</div>
							</div>
							
							<?php
								if($profile_status=="pending")
								{
									?>
										<strong>Select Profile picture</strong>
										<div class="form-group" id="form_control">
											<input type="file" class="form-control"	name="profile_pic" value="<?php echo $data['profile_pic'];?>"		required>
										</div><br>
									<?php
								}
								
							?>									
									
							<h3>Your Title</h3><br>
							<strong>Enter a single sentence description of your professional skills/experience.</strong><br>
							<div class="form-group" id="form_control">
								<input type="text" class="form-control"	name="title" value="<?php echo $data['title'];?>" placeholder="e.g.Expert Web developer" required>
							</div>	<br>														
							
							<h3>Description</h3><br>							
							<strong>describe youre strenghts,skills,education and highlight projects.</strong><br>
							<div class="form-group" id="form_control">
								<textarea name="description" class="form-control">				
								<?php echo $data['description'];?>
								</textarea>
							</div><br>
						
							<h3>Experience level</h3><br>						
							<strong>Choose your Experience</strong><br>															
							<div class="radio">
							<?php
								if($data['level']=="Entry level")
								{
									$checked1="checked";
								}
								else if($data['level']=="Intermediate")
								{
									$checked2="checked";
								}
								else if($data['level']=="Expert")
								{
									$checked3="checked";
								}
									
							?>
							  <label><input type="radio" name="level" value="Entry level" <?php echo $checked1;?> >Entry level</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="level" value="Intermediate" <?php echo $checked2;?> >Intermediate</label>
							</div>
								<div class="radio disabled">
							  <label><input type="radio" name="level" value="Expert" <?php echo $checked3;?> >Expert</label>
							</div><br>
							
							<h3>Categories</h3><br>						
							<strong>Select Your Job Categories	</strong><br>															
						  <div class="form-group">
							  <select class="form-control" name="categories"> 
								 <option value="<?php echo $data['categories'];?>"><?php echo $data['categories'];?></option>
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
					</div><br>

							<h3>skills</h3><br>						
							<strong>Enter skills and Expertise include</strong><br>							
							<div class="form-group" id="form_control">
								<input type="text" class="form-control" value="<?php echo $data['skill'];?>"	name="skill" placeholder="e.g. data Entry | Data Analytics" required>
							</div>	<br>			

							<h3>Education</h3><br>						
							<strong>Degree</strong><br>							
							<div class="form-group" id="form_control">
								<input type="text" class="form-control"	name="degree" value="<?php echo $data['degree'];?>" placeholder="e.g. B.C.A | M.C.A" required>
							</div>	<br>
							<strong>Area of Study (Optional)</strong><br>							
							<div class="form-group" id="form_control">
								<input type="text" class="form-control" value="<?php echo $data['study_area'];?>"	 name="study_area">
							</div>	<br>			

							<h3>Other experiences</h3>		
							<strong>Subject</strong><br>							
							<div class="form-group" id="form_control">
								<input type="text" class="form-control" value="<?php echo $data['subject'];?>"	name="subject">
							</div>	<br>				
							<strong>Description</strong><br>							
							<div class="form-group" id="form_control">
								<input type="text" class="form-control" value="<?php echo $data['exp_description'];?>"	name="exp_description">
							</div>	<br>				
							<input type="hidden" value="<?php echo $_SESSION['worker'];?>"	name="id">
							<center><input type="submit" class="btn btn-success"	name="submit" value="Submit" required></center>
							
							</form>
					</div>	
			</div>			
		</div>
</section>	

<footer>
	<?php

/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>

</footer>

</body>
</html>