<?php
session_start();
/* ----------------- DATABASE SELECT ------------------*/
require "dbcon.php";
 
 if(isset($_POST['submit']))
 {
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$password=$_POST['password'];			
			$work=$_POST['work'];
			$question=$_POST['question'];
			$answer=$_POST['answer'];
		
	/* ------------------- CHECK HIRE USERNAME -------------------*/	
		$query_hire="SELECT * FROM `hire` WHERE `h_email`='$email'";																	
		$run_hire=mysqli_query($conn,$query_hire);		
		$row_hire=mysqli_num_rows($run_hire);		
		
			
  	/* ------------------- CHECK	WORKER USERNAME -------------------*/	
		$query_work="SELECT * FROM `work` WHERE `w_email`='$email' ";	
		$run_work=mysqli_query($conn,$query_work);		
		$row_work=mysqli_num_rows($run_work);


		if($row_hire==1)

		{
			$_SESSION['invalid']="Email Address Already Use !";
			header('location: register.php');
		}								
		else if($row_work==1)
		{
			$_SESSION['invalid']="Email address Already Use !";
			header('location: register.php');
		}
		else
		{
			/*--------------INSER RECORD CHECK USER SELECT HIRE-----------*/
			if($work=="hire")
			{
					$work="hire";
					$query="INSERT INTO `hire` (`h_fname`, `h_lname`, `h_email`, `h_password`,`work`,`question`,`answer`) VALUES ('$fname','$lname','$email','$password','$work','$question','$answer')";
					$run=mysqli_query($conn,$query);
					header('location:login.php');			
			}
			/*--------------INSER RECORD CHECK USER SELECT WORK-----------*/
			else if($work=="work")
			{
					$work="work";
					$query="INSERT INTO `work` (`w_fname`, `w_lname`, `w_email`, `w_password`, `work`,`question`,`answer`) VALUES ('$fname','$lname','$email','$password','$work','$question','$answer')";
					$run=mysqli_query($conn,$query);
					header("location:login.php");				
			}	
		}				
}
?>