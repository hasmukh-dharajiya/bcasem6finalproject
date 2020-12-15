<?php
session_start();

require "dbcon.php";
 
 if(isset($_POST['submit']))
 {		

		/*---------------- FEATH RECORD AS ADMIN----------------*/
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
		
		$run=mysqli_query($conn,$query);
		
		$row=mysqli_num_rows($run);

		if($row==1)
		{
			$data=mysqli_fetch_assoc($run);
			$_SESSION['admin']=$username;
			header('location: index.php');			
		}
		
		/*------ Invalid Admin USERNAME AND PASSWORD----------*/
		
		else
		{
			$_SESSION['invalid']="Invalid Username And Password...!!";
			header('Location: login.php');
		}

}
else
{
	header('Location: login.php');	
}
?>