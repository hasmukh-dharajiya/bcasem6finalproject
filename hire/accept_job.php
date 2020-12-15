<?php
session_start();
	require "../dbcon.php";
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}

		/*----------------- Search categories ---------------*/
		
		$wid=$_POST['w_id'];
		$jid=$_POST['j_id'];
		$hid=$_SESSION['hire'];
		
				$query_hire="SELECT * FROM `hire` WHERE `h_email`='$hid'";																	
							
				$run_hire=mysqli_query($conn,$query_hire);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id'];
		
		/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `proposal_hire` WHERE `w_id`='$wid' AND `j_id`='$jid' AND `h_id`='$h_id' ";		
		$run_pro=mysqli_query($conn,$query_pro);				
		$job_row = mysqli_fetch_array($run_pro);
		$pid=$job_row['p_id']; //Proposal Id
				
		if($job_row['status']=="pending")
		{
			$status="conform";
			$query="UPDATE proposal_hire SET `status`='$status' WHERE p_id='$pid'";			
			$run=mysqli_query($conn,$query);
			
		//	$query_job="UPDATE jobs SET `status`='working',`w_id`='$wid' WHERE j_id='$jid'";
		//	$run=mysqli_query($conn,$query_job);
			
			/*---------- Worker SIDE NOTIFICATON----*/	
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="Accept Job Successfully.";
			$message="Worker You Are Successfully Recived Job Plaese Work Fast And Submit soon..";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id` ,`time`) VALUES ('$subject','$message','$wid','$time')";
			$run_1=mysqli_query($conn,$query_1);
			
			/* ------------- HIRE NOTIFICATION------------ */
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="congratulations.";
			$message="congratulations Your Proposal Accept Plaese Check SAVE/WORKING JOB";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$h_id','$time')";
			$run_1=mysqli_query($conn,$query_1);
			if($run)
			{
				$query="UPDATE jobs SET `status`='working',`w_id`='$wid' WHERE j_id='$jid'";
				$run=mysqli_query($conn,$query);
				echo '<script type="text/javascript">alert("Successfully Job Accept");window.location=\'working_jobs.php\';</script>';
			}
			
		}							
	?>

