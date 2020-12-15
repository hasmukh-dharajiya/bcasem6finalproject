<?php
session_start();
/* ----------------- DATABASE SELECT ------------------*/
require "../dbcon.php";
		if(!isset($_SESSION['hire']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
		
		
		$username=$_SESSION['hire'];
		$work=$_SESSION['work'];
		
		$query_work="SELECT * FROM `hire` WHERE `h_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
				
		$data=mysqli_fetch_assoc($run_work);
		$profile_status=$data['profile_status'];
		$profile_pics=$data['profile_pic'];	
		
		
		
	if(isset($_POST['submit']))
	{	
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];		
		$phone_no = $_POST['phone_no'];
		$city = $_POST['city'];
		$con_email = $_POST['con_email'];
		$location = $_POST['location'];
		
			if($profile_status=="pending")
			{
				$profile_pic=$_FILES["profile_pic"]["name"];
			}
			if($profile_status=="conform")
			{
				if($_FILES["c_pic"]["name"])
				{
					$profile_pic=$_FILES["c_pic"]["name"];
				}
				else
				{
					$profile_pic=$profile_pics;
				}
			}
		
		
		$profile_status = "conform";
			
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"../data_image/".$_FILES["profile_pic"]["name"]);
		if($_FILES["c_pic"]["name"])
				{
					move_uploaded_file($_FILES["c_pic"]["tmp_name"],"../data_image/".$_FILES["c_pic"]["name"]);
				}
		$query="UPDATE hire SET `h_fname`='$fname',`h_lname`='$lname',`phone_number`='$phone_no',`con_email`='$con_email',`city`='$city',`location`='$location',`profile_pic`='$profile_pic',`profile_status`='$profile_status' WHERE h_email='$id'";  
		$run=mysqli_query($conn,$query);
			
		echo '<script type="text/javascript">window.location=\'view_profile.php\';</script>';
	}				
?>