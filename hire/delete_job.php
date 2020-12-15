
<?php
session_start();
	require "../dbcon.php";
	
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}	
		
		$jid=$_GET['jid'];
				
 
		$query_work="DELETE FROM `jobs` WHERE `j_id`='$jid'";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'all_job_post.php\';</script>';	
		}
		
		
?>
