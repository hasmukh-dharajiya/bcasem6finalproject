<?php
session_start();
		if(!isset($_SESSION['worker']))
		{			
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
?>

<html lang="en">
<head>
  <title>Massage Box</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/userindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="../image/favicon.ico">
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php

/*----------------- NAVBAR --------------*/
	include "../layout/user_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div class="col-lg-12">
			<h6 class="h1">Massage</h1>
		</div>
		
	</div>
</section>
<?php
		$username=$_SESSION['worker'];		
		/*------ Worker ---------*/
		$query_work="SELECT * FROM `work` WHERE `w_email`='$username'";
		
		$run_work=mysqli_query($conn,$query_work);
			
		$data=mysqli_fetch_assoc($run_work);
		$w_id=$data['w_id'];//worker ID
		$pic_worker=$data['profile_pic'];//pic
		
		
			
	?>	
	
<main role="main" class="container">
  <?php
		$query_sms="SELECT * FROM `massage` WHERE `w_id`='$w_id'";
		
		$run_sms=mysqli_query($conn,$query_sms);
	?>
	 <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent Massage</h6>
<?php	
			
			while ($data1=mysqli_fetch_assoc($run_sms))
			{
  ?>
     <?php
	 if($data1['status']=="send by worker")
	 {
	 ?>
        <div class="media text-muted pt-3 text-right">
          
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><?php echo strtoupper($fname)," ",strtoupper($lname);?></strong>
				<?php echo $data1['sms'];?>
          </p>
        </div>
		
	 <?php
	 
	 } 
	 
	 if($data1['status']=="send by hire")
	 {
		 $hire_id=$data1['h_id'];
		 $query="SELECT * FROM `hire` WHERE `h_id`='$hire_id'";																	
							
				$run_hire=mysqli_query($conn,$query);
				$row2 = mysqli_fetch_array($run_hire);
				
					
					$hire_fname=$row2['h_fname']; 
					$hire_lname=$row2['h_lname']; 																 
																									 
				
	
	 ?>
        <div class="media text-muted pt-3">
          
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><?php echo strtoupper($hire_fname)," ",strtoupper($hire_lname);?></strong>
				<?php echo $data1['sms'];?>
          </p>
        </div>
		
	 	
        
		
	 <?php
	 
	 }
	 }

	 ?> 
      </div>
<?php
			
			/*------------ Proposal ------*/
		$query_pro="SELECT * FROM `jobs` WHERE `w_id`='$w_id' AND `status`='working'";
		
		$run_pro=mysqli_query($conn,$query_pro);
		
		?>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Send New Massage</h6>
<?php
		while ($row_job = mysqli_fetch_array($run_pro))
		{
			$jid=$row_job['j_id'];//JOB ID			
			
			$query2="SELECT * FROM `jobs` WHERE `j_id`='$jid' AND `status`='working'";
			$run2=mysqli_query($conn,$query2);		
			
			/*------------ JOB LIST ------*/
			
			while ($row1 = mysqli_fetch_array($run2))
			{
				$id=$row1['j_id'];	
			?>	
				<h5><strong class="job_title "><?php echo $row1['title'];?></strong></h5>																	
			
				<?php
				/*-------SELECT client name and id -------*/
				$hire_id=$row1['h_id'];						
				$query="SELECT * FROM `hire` WHERE `h_email`='$hire_id'";																	
							
				$run_hire=mysqli_query($conn,$query);
				while ($row2 = mysqli_fetch_array($run_hire))
				{
					$hire_con_email=$row2['con_email']; 
					$hire_fname=$row2['h_fname']; 
					$hire_lname=$row2['h_lname']; 																 
					$pic=$row2['profile_pic']; 	
					$h_id=$row2['h_id']; 																						 
				}									
				?>
			

        <div class="media text-muted pt-3">
          <img src="../data_image/<?php echo $pic;?>" alt="" class="mr-2 rounded" height="40" width="40">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><?php echo strtoupper($hire_fname)," ",strtoupper($hire_lname);?></strong>
			
				<form action="send_massage.php" method="POST" enctype="multipart/form-data">	
					<input type="hidden" value="<?php echo $h_id;?>" name="hid">	
					<input type="hidden" value="<?php echo $id;?>" name="jid">	
					<input type="hidden" value="<?php echo $w_id;?>" name="wid">									
					<input type="submit" name="submit" class="btn btn-success btn-sm float-right" value="Send Massage">
				</form>
        </div>
     <?php
			}
		}
		
		?>
        
      </div>
	  
    </main>
</body>
</html>