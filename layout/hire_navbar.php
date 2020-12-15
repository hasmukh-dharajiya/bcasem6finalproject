<?php
session_start();
	require "../dbcon.php";
		
	if(!isset($_SESSION['hire']))
	{		
		$_SESSION['invalid']="First Login After Use...!";
		header('location: ../login.php');
	}
	else
	{
		$username=$_SESSION['hire'];
		$work=$_SESSION['work'];
	
		$query_hire="SELECT * FROM `hire` WHERE `h_email`='$username'";
	
		$run_hire=mysqli_query($conn,$query_hire);
		
		$row_hire=mysqli_num_rows($run_hire);
				
		$data=mysqli_fetch_assoc($run_hire);
		$fname=$data['h_fname'];
		$lname=$data['h_lname'];
		$pic=$data['profile_pic'];
		
		/*----------NOTIFICATION-------------*/
		$username=$_SESSION['hire'];
				$query="SELECT * FROM `hire` WHERE `h_email`='$username'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id'];
		$query_work="SELECT * FROM `notification` WHERE `h_id`='$h_id'";
		
		$run=mysqli_query($conn,$query_work);
		$number=mysqli_num_rows($run);		
	}
?>
<!------------------------------------ NAVBAR -------------------------------->

<nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="../hire/hire_index.php">Freelance Work</a>	
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	 </button>
  <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown">
        JOBS
      </a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../hire/hire_index.php">Find Freelancer</a>
        <a class="dropdown-item" href="../hire/all_job_post.php">All Jobs Post</a>        
		<a class="dropdown-item" href="../hire/proposals.php">Proposals</a>        
        <a class="dropdown-item" href="../hire/post_job.php">Post Job</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown">SAVE</a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../hire/my_hire.php">My Hire</a>
        <a class="dropdown-item" href="../hire/working_jobs.php">Working Jobs</a>        
		<a class="dropdown-item" href="../hire/complete_job.php">Complete Job</a>        
		<a class="dropdown-item" href="../hire/payment.php">Payment</a>        
      </div>
    </li>
   <li class="nav-item">
      <a class="nav-link text-body" href="../hire/reports.php">REPORTS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-body" href="../hire/massages.php">MESSAGES</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link text-body" href="../hire/notification.php"><i class="fas fa-bell" style="font-size:25px;color:green; line-height:22px;"></i><sup><span class="badge bg-dark text-white" id="bell"><?php echo $number;?></span></sup></a>
    </li>    
	     <li class="nav-item">
    	<a href="../user/profile.php"><img src="../data_image/<?php echo $pic;?>" height="40" width="40" alt="Profile Pic" class="img-circle"></a>				
    </li>            
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown"><?php echo strtoupper($fname)," ",strtoupper($lname);?></a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../hire/view_profile.php">My Profile</a>    
		<a class="dropdown-item" href="../logout.php">Logout</a>         
      </div>
    </li>        
  </ul>
  </div>
  </div>
</nav>