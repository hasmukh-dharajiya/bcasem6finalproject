<?php
require "../dbcon.php";
session_start();

		if(!isset($_SESSION['admin']))
		{
			header('location: login.php');
			$_SESSION['invalid']="First Login After Use...!";
		}
?>
<!------------------------------------ NAVBAR -------------------------------->

<nav class="navbar navbar-expand-md navbar-light bg-light shadow">
	<div class="container">
		<a class="navbar-brand font-weight-bold" href="index.php">Freelance Work</a>	
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	 </button>
  <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">

   <!-- <li class="nav-item">
      <a class="nav-link text-body" href="#">REPORTS</a>
    </li>
    -->
    <li class="nav-item dropdown">
      <a class="nav-link text-body h5" href="earning.php">Earning</a>
    </li>    
    <li class="nav-item dropdown">      
	  <a class="nav-link text-body h5" href="logout.php">Logout</a>
    </li>   
  </ul>
  </div>
  </div>
</nav>