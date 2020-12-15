<?php


session_start();
		if(!isset($_SESSION['admin']))
		{
			header('location: login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
		else
		{
			 session_unset();
			 session_destroy();
			header("Location: login.php");
			
		}
		



  
   
?>