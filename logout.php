<?php


session_start();
		if(isset($_SESSION['worker']))
		{			
			session_unset();
			session_destroy();
			header("Location: login.php");
		}
		else if(isset($_SESSION['hire']))
		{
			session_unset();
			session_destroy();
			header("Location: login.php");
		}
		else
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: login.php');
		}
		



  
   
?>