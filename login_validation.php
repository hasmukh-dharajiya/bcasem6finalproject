<?php
session_start();

require "dbcon.php";
 
 if(isset($_POST['submit']))
 {
		$email=$_POST['email'];
		$password=$_POST['password'];

		/*-------------------- FEATH RECORD AS WORKER--------------------------*/
		
		$query_work="SELECT * FROM `work` WHERE `w_email`='$email' AND `w_password`='$password'";
		
		$run_work=mysqli_query($conn,$query_work);
		
		$row_work=mysqli_num_rows($run_work);
		/*------------------------ FETCH RECORD AS HIRE------------------*/		
		
		$query_hire="SELECT * FROM `hire` WHERE `h_email`='$email' AND `h_password`='$password'";
		
		$run_hire=mysqli_query($conn,$query_hire);
		
		$row_hire=mysqli_num_rows($run_hire);
		
		if($row_work==1)
		{
			$data=mysqli_fetch_assoc($run_work);
			$work=$data['work'];
			$_SESSION['worker']=$email;
			$_SESSION['work']=$work;	
			$subject="Login Sucessfully.";
			$message="Hiii Worker You Are Sucessfully Loging.";
			
			$t=time(); 
			$time=(date("d-m-Y",$t));
			
			$w_id=$_SESSION['worker'];
			$query="SELECT * FROM `work` WHERE `w_email`='$w_id'";																	
							
				$run_worker=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_worker);
				$w_id=$row2['w_id'];
			$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id`,`time`) VALUES ('$subject','$message','$w_id','$time')";
			$run_1=mysqli_query($conn,$query_1);
			
			echo '<script type="text/javascript">window.location=\'user/user_index.php\';</script>';	
		}
		
		else if($row_hire==1)
		{	$data=mysqli_fetch_assoc($run_hire);
			$work=$data['work'];	
			$_SESSION['hire']=$email;
			$_SESSION['work']=$work;
			
			$subject="Login Sucessfully";
			$message="Hiii Hire You Are Sucessfully Loging ";
			
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$h_id=$_SESSION['hire'];
				$query="SELECT * FROM `hire` WHERE `h_email`='$h_id'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				$h_id=$row2['h_id'];
			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `h_id`,`time`) VALUES ('$subject','$message','$h_id','$time')";
			$run_1=mysqli_query($conn,$query_1);
			echo '<script type="text/javascript">window.location=\'hire/hire_index.php\';</script>';	
			
		}
		/*------------------- Invalid Hire And Worker USERNAME AND PASSWORD------------*/
		
		else
		{
			$_SESSION['invalid']="Invalid Email Address And Password...!!";
			header('Location: login.php');
		}

}		
		
?>