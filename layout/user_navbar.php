<?php
session_start();
	require "../dbcon.php";

		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";		
			header('location: ../login.php');
		}
		else
		{
			$username=$_SESSION['worker'];
			$work=$_SESSION['work'];
		
			$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
			$run_work=mysqli_query($conn,$query_work);
		
			$row_work=mysqli_num_rows($run_work);
				
			$data=mysqli_fetch_assoc($run_work);
			$fname=$data['w_fname'];
			$lname=$data['w_lname'];
			$pic=$data['profile_pic'];				
		}		
		/*----------NOTIFICATION-------------*/
		$username=$_SESSION['worker'];
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
							
		$data=mysqli_fetch_assoc($run_work);
		$w_id=$data['w_id'];
		$query_work="SELECT * FROM `notification` WHERE `w_id`='$w_id'";
		
		$run=mysqli_query($conn,$query_work);
		$number=mysqli_num_rows($run);		

?>
<!------------------------------------ NAVBAR -------------------------------->

<nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="../user/user_index.php">Freelance Work</a>	
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	 </button>
  <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown">
        FIND WORK
      </a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../user/user_index.php">Find Work</a>
        <a class="dropdown-item" href="../user/saved_jobs.php">Saved Jobs</a>        
		<a class="dropdown-item" href="../user/proposals.php">Proposals</a>        
        <a class="dropdown-item" href="../user/view_profile.php">My Profile</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown">MY JOBS</a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../user/myjobs.php">My Jobs</a>
        <a class="dropdown-item" href="../user/complet_jobs.php">Complet Jobs</a>        
      </div>
    </li>
	  <li class="nav-item">
      <a class="nav-link text-body" href="../user/report.php">REPORTS</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link text-body" href="../user/massage.php">MESSAGES</a>
    </li>
	<li class="nav-item">
      <a class="nav-link text-body" href="../user/notification.php"><i class="fas fa-bell" style="font-size:25px;color:green; line-height:22px;"></i><!-- uses solid style --><sup><span class="badge bg-dark text-white" id="bell"><?php echo $number;?></span></sup></a>
    </li>       
    <li class="nav-item">
    	<a href="../user/profile.php"><img src="../data_image/<?php echo $pic;?>" height="40" width="40" alt="Profile Pic" class="img-circle"></a>				
    </li>            
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-body" href="#" id="navbardrop" data-toggle="dropdown"><?php echo strtoupper($fname)," ",strtoupper($lname);?></a>
      <div class="dropdown-menu">
      	<a class="dropdown-item" href="../user/view_profile.php">My Profile</a>    
		<a class="dropdown-item" href="../logout.php">Logout</a>         
      </div>
    </li>   
  </ul>
  </div>
  </div>
</nav>