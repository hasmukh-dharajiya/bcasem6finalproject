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
		

?>
<html lang="en">
<head>
  <title>Post Job</title>
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

/*---------------------------- NAVBAR -----------------------------------*/
	include "../layout/hire_navbar.php";  
?>


<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12" id="title">
			<h6 class="h1">New Post Job</h1>
		</div>
		
	</div>
</section>
<section class="container"> 
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow2">
			<div class="justify-content-center">
				<form action="#" method="POST"  enctype="multipart/form-data">
					<h3>Title</h3><br>
					<strong>Enter the name of your job post</strong>
					<div class="form-group" id="form_control">
						<input type="tetx" class="form-control"	placeholder="eg. Software developer" name="title"  required>
					</div>
					<strong>Job Category</strong>
					<div class="form-group">
						<select class="form-control" name="categoty"> 	 
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

					<h3>Description</h3><br>
					<strong>A good description includes</strong>
					<div class="form-group" id="form_control">
						<textarea name="description" class="form-control">				
								
						</textarea>										
					</div>					  	
					<strong>Additional project files</strong>
					<div class="form-group" id="form_control">
						<input type="file" class="form-control"	name="project_file"  required>
					</div><br>
					<h3>Expertise</h3>							
					<strong>What skills and Expertise are most important to you in project?</strong>							
					<div class="form-group" id="form_control">
						<input type="tetx" class="form-control"	name="skill" placeholder="eg: data Entry | PHP developer" required>
					</div>	<br>							
					<h3>Budget</h3>								
					<strong>Amount</strong>						
						<span>$<span><input type="number" class="form-control"	name="budget" placeholder="eg.$10" required>
					<strong>Project Time Duration</strong>
					<input type="date" class="form-control col-lg-5"	name="time" required><br><br>
					<center><input type="submit" name="submit" class="btn btn-success" value="Post Job Now"></center><br>
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
<?php

require "../dbcon.php";
 
 if(isset($_POST['submit']))
 {
 	$h_id=$_SESSION['hire'];
	$title=$_POST['title'];	
	
	
	/*---------  Job Already Use ----------*/
	
	  	
		$query_jobs="SELECT * FROM `jobs` WHERE `title`='$title' ";	
		$run_jobs=mysqli_query($conn,$query_jobs);		
		$row_jobs=mysqli_num_rows($run_jobs);
		if(!$row_jobs==1)
		{
			$categoty=$_POST['categoty'];	
			$description=$_POST['description'];	
			$project_file=$_FILES["project_file"]["name"];
			$skill=$_POST['skill'];	
			$budget=$_POST['budget'];	
			$time=$_POST['time'];
			/* ------- Hire Not select Past Date ------- */
			$t=time(); 
			$time1=(date("Y-m-d",$t));	
			$current_date_time_sec=strtotime($time1);
			$future_date_time_sec=strtotime($time);
			$difference=$future_date_time_sec-$current_date_time_sec;
			$hours=($difference / 3600);
			$days=($hours/24);
			
			if($days<0)
			{
			  $d=ceil($days). " days ";
			}
			else
			{
			  $d=floor($days). " days ";
			}
			echo $d;
			
			if($d>0)
			{
				move_uploaded_file($_FILES["project_file"]["tmp_name"],"../data_image/".$_FILES["project_file"]["name"]);
					
						
				$query="INSERT INTO `jobs` (`title`, `category`, `description`, `project_file`, `expertise`,`budget`,`time_duration`, `h_id`, `payment_status`, `submit_file`) VALUES ('$title','$categoty','$description','$project_file','$skill','$budget','$time','$h_id','pending','pending')";
				$run=mysqli_query($conn,$query);							
				if($run)
				{
					$subject="Job Post Sucessfully.";
					$message="Hiii $fname,$lname You Are Sucessfully Posted Job --> $title.";			
					$t=time(); 
					$time1=(date("d-m-Y",$t));
					
					$h_id=$_SESSION['hire'];
						$query_hire="SELECT * FROM `hire` WHERE `h_email`='$h_id'";																	
									
						$run_hire=mysqli_query($conn,$query_hire);
						$row2 = mysqli_fetch_array($run_hire);
						$h_id=$row2['h_id'];
					$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$h_id','$time1')";
					$run_1=mysqli_query($conn,$query_1);

				}
				echo '<script type="text/javascript">window.location=\'all_job_post.php\';</script>';		
			}
			else
			{
				echo '<script type="text/javascript">alert("please Enter currect Date !");</script>';
			}	
		}
		else
		{
			echo '<script type="text/javascript">alert("Job Title Already Use please change job title !");</script>';
		}
}

?>