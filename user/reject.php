<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		
		$h_id=$_POST['h_id'];
	 	$w_id=$_POST['w_id'];
	 	$j_id=$_POST['j_id'];
				
 
		$query_work="DELETE FROM `proposal` WHERE `h_id`='$h_id' AND `w_id`='$w_id' AND `j_id`='$j_id' ";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'proposals.php\';</script>';	
		}
		
		
?>
