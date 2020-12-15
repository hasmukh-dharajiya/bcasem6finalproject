<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		$jid=$_GET['jid'];
		/*---------- Worker ------*/
		$w_id=$_SESSION['worker'];
		
		$query_work="SELECT * FROM `work` WHERE `w_email`='$w_id'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
				
		$data=mysqli_fetch_assoc($run_work);
		$w_id=$data['w_id'];
		
		/*---------- JOB ------*/
		
		$query="SELECT * FROM `jobs` WHERE `j_id`='$jid'";
		$run1=mysqli_query($conn,$query);		
		$row1 = mysqli_fetch_array($run1);		
		$h_id=$row1['h_id']; 
		$title_job=$row1['title']; 
		$t=time(); 
		$time=(date("d-m-Y",$t));
		
		/*-------- HIRE -----*/
				$query="SELECT * FROM `hire` WHERE `h_email`='$h_id'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id']; 
		
		
		$query="INSERT INTO `proposal_hire` (`w_id`, `j_id`, `h_id`, `time`) VALUES ('$w_id','$jid','$h_id','$time')";
		$run=mysqli_query($conn,$query);
		if($run)
		{	
			/*---------- Worker SIDE NOTIFICATON----*/	
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="Proposal Send Successfully.";
			$message="Worker You Are Successfully Proposal Send Of This Job--> $title_job";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id` ,`time`) VALUES ('$subject','$message','$w_id','$time')";
			$run_1=mysqli_query($conn,$query_1);	
			
			
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="New Proposal Recived.";
			$message="New Proposal Recived Of This Job--> $title_job";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$h_id','$time')";
			$run_1=mysqli_query($conn,$query_1);	
			echo '<script type="text/javascript">alert("Proposal Send Successfully");window.location=\'saved_jobs.php\';</script>';
		}
		else
		{
			echo "Not INSERT";
		}		
?>