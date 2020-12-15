<?php

 session_start();
 require "../dbcon.php";
		if(!isset($_SESSION['hire']))
		{
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
	

?>
<?php

		/*------ Check Profile Complet or Not ---------*/
		$wid=$_POST['w_id'];
		$hid=$_POST['h_id'];
		$jid=$_POST['j_id'];
		
		$query_work="DELETE FROM `proposal` WHERE `w_id`='$wid' AND `h_id`='$hid' AND `j_id`='$jid' ";		
		$run_work=mysqli_query($conn,$query_work);
		
		if($run_work)
		{
			echo '<script type="text/javascript">window.location=\'my_hire.php\';</script>';	
		}
	
?>