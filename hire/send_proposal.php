<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		
	$w_id=$_POST['w_id'];
	$h_id=$_SESSION['hire'];
	$job_title=$_POST['job_title'];
	
	
	/*--------- Find Job Id ----------*/
	
		$query="SELECT * FROM `jobs` WHERE `title`='$job_title'";
		$run=mysqli_query($conn,$query);

		$row1 = mysqli_fetch_array($run);	
		 $j_id=$row1['j_id'];		
		
	/*--------- Find Hire Email ----------*/		
		$query_hire="SELECT * FROM `hire` WHERE `h_email`='$h_id'";
	
		$run_hire=mysqli_query($conn,$query_hire);								
		$data=mysqli_fetch_assoc($run_hire);
		$hire_id=$data['h_id'];
	/*--------- Check Hire All ready Send Proposal  ----------*/				
		$query_pro="SELECT * FROM `proposal` WHERE `w_id`='$w_id' AND `h_id`='$h_id' AND `j_id`='$j_id' ";		
		$run_pro=mysqli_query($conn,$query_pro);
		if($work_row = mysqli_fetch_array($run_pro) )
		{
			echo '<script type="text/javascript">window.location=\'my_hire.php\';</script>';
		}
		else
		{					
			$t=time(); 
			$time=(date("d-m-Y",$t));
			
			$query="INSERT INTO `proposal` (`w_id`, `j_id`, `h_id`,`time`) VALUES ('$w_id','$j_id','$h_id','$time')";
			$run=mysqli_query($conn,$query);
			if($run)
			{	
				/*---------- Worker SIDE NOTIFICATON----*/	
				$t=time(); 
				$time=(date("d-m-Y",$t));
				$subject="New Proposal Recived.....";
				$message="New Proposal Recived By This Job--> $job_title";			
				$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id` ,`time`) VALUES ('$subject','$message','$w_id','$time')";
				$run_1=mysqli_query($conn,$query_1);	
				
				/*---------- HIRE SIDE NOTIFICATON----*/

				$t=time(); 
				$time=(date("d-m-Y",$t));
				$subject="Proposal Successfully Send.";
				$message="Proposal Successfully Send by this Job --> $job_title";			
				$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$hire_id','$time')";
				$run_1=mysqli_query($conn,$query_1);	
				echo '<script type="text/javascript">alert("Proposal Send Successfully");window.location=\'my_hire.php\';</script>';
			}
			else
			{
				echo "Not INSERT";
			}
		}		
?>
