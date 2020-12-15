<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		
		$nid=$_GET['nid'];
		 
		$query_work="DELETE FROM `notification` WHERE `n_id`='$nid'";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'notification.php\';</script>';	
		}
		
		
?>
