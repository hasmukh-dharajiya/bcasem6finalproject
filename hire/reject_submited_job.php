<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		$jid=$_GET['jid'];		 
				
		$query="UPDATE jobs SET `payment_status`='reject'   WHERE j_id='$jid'";
		$run=mysqli_query($conn,$query);

		
		if($run)
		{
			echo '<script type="text/javascript">window.location=\'working_jobs.php\';</script>';	
		}
		
		
?>
