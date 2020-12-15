<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
?>

<?php

		/*------ Check Profile Complet or Not ---------*/
	echo	$jid=$_POST['j_id'];
	echo	$wid=$_POST['w_id'];
		
		
		$query_work="DELETE FROM `proposal_hire` WHERE `w_id`='$wid' AND `j_id`='$jid'";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'saved_jobs.php\';</script>';	
		}
	
	
?>