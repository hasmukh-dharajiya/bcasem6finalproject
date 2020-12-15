<?php
session_start();

require "../dbcon.php";

		if(!isset($_SESSION['worker']))
		{
			header('location: ../login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
		
		 $username=$_SESSION['worker'];
					$work=$_SESSION['work'];
		
				$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
				$run_work=mysqli_query($conn,$query_work);
		
				$row_work=mysqli_num_rows($run_work);
				
				$data=mysqli_fetch_assoc($run_work);
				$profile_status=$data['profile_status'];
				$profile_pics=$data['profile_pic'];				
/*-------- Insert Data on worker table (POST profile.php)--------*/

		if(isset($_POST['submit']))
		{
			 $id=$_SESSION['worker'];
			 $fname=$_POST['fname'];
			 $lname=$_POST['lname'];
		 	 $phone_no = $_POST['phone_no'];
			 $con_email = $_POST['con_email'];
			 $city = $_POST['city'];
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
			 $title = $_POST['title'];
			 $description = $_POST['description'];
			 $level = $_POST['level'];
			 $categories = $_POST['categories'];
			 $skill = $_POST['skill'];
			 $degree = $_POST['degree'];
			 $study_area = $_POST['study_area'];
			 $subject = $_POST['subject'];
			 $exp_description = $_POST['exp_description'];
			$profile_status="conform";
			
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"../data_image/".$_FILES["profile_pic"]["name"]);
				if($_FILES["c_pic"]["name"])
				{
					move_uploaded_file($_FILES["c_pic"]["tmp_name"],"../data_image/".$_FILES["c_pic"]["name"]);
				}
			$query="UPDATE work SET `w_fname`='$fname',`w_lname`='$lname',`phone_no`='$phone_no',`con_email`='$con_email',`city`='$city',`location`='$location',`title`='$title',`description`='$description',`profile_pic`='$profile_pic',`description`='$description',`level`='$level',`categories`='$categories',`skill`='$skill',`degree`='$degree',`study_area`='$study_area',`subject`='$subject',`exp_description`='$exp_description',`profile_status`='$profile_status' WHERE w_email='$id'";
			$run=mysqli_query($conn,$query);
			echo '<script type="text/javascript">window.location=\'view_profile.php\';</script>';

		}
		else
		{
					header('location: user_index.php');
		}


?>