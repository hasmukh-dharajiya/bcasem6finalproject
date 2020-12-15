<?php
session_start();
	require "../dbcon.php";
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}

		/*----------------- Search categories ---------------*/
		
		$username=$_SESSION['worker'];
		$jid=$_GET['jid'];//Job ID
		/*------ Worker ---------*/
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
			
		$data=mysqli_fetch_assoc($run_work);
	 	$w_id=$data['w_id'];//worker ID
		
		
		/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `proposal` WHERE `w_id`='$w_id' AND `j_id`='$jid'";
		
		$run_pro=mysqli_query($conn,$query_pro);
				
		$job_row = mysqli_fetch_array($run_pro);
		

		$hid=$job_row['h_id']; //Hire Id
		
			$query="SELECT * FROM `hire` WHERE `h_email`='$hid'";																	
							
			$run_hire=mysqli_query($conn,$query);
			$row2 = mysqli_fetch_array($run_hire);
			$hid=$row2['h_id'];
		
		$pid=$job_row['p_id']; //Proposal Id
				
		if($job_row['status']=="pending")
		{
			$status="conform";
			$query="UPDATE proposal SET `status`='$status' WHERE p_id='$pid'";
			$run=mysqli_query($conn,$query);
			
			/*---------- Worker SIDE NOTIFICATON----*/	
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="Accept Job Successfully.";
			$message="Worker You Are Successfully Recived Job Plaese Work Fast And Submit soon..";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id` ,`time`) VALUES ('$subject','$message','$w_id','$time')";
			$run_1=mysqli_query($conn,$query_1);
			
			/* ------------- HIRE NOTIFICATION------------ */
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="congratulations.";
			$message="congratulations Your Proposal Accept Plaese Check SAVE/MYHIRE";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$hid','$time')";
			$run_1=mysqli_query($conn,$query_1);
			if($run)
			{
				$query="UPDATE jobs SET `status`='working' ,`w_id`='$w_id' WHERE j_id='$jid'";
				$run=mysqli_query($conn,$query);
				echo '<script type="text/javascript">alert("Successfully Job Accept");window.location=\'myjobs.php\';</script>';
			}
			
		}
		
		
			
	?>

