<?php
 session_start();
	require "../dbcon.php";
		if(!isset($_SESSION['hire']))
		{
			$_SESSION['invalid']="First Login After Use...!";
			header('location: ../login.php');
		}
		
?>
<html lang="en">
<head>
  <title>All Job Posts</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/hireindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="../image/favicon.ico">
  <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body class="jumbotron">
<?php
/*---------------------------- NAVBAR -----------------------------------*/
	include "../layout/hire_navbar.php";  
	
		/*------------ JOB LIST ------*/
		$jid=$_GET['jid'];		
		
		$query="SELECT * FROM `jobs` WHERE `j_id`='$jid' AND `status`='working' ";
		
		$run=mysqli_query($conn,$query);
		
		$row_work=mysqli_num_rows($run);
				
		$data=mysqli_fetch_assoc($run);		
?>

<section class="container find_work">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="h1">Payment Job</h1>			
		</div>
		<div class="col-lg-2" >			
		</div>			
	</div>
</section>
<!---------------- List Of View Job ------------------>	
<section class="container"> 
	<div class="row">	
		<div class="col-lg-12 col-md-12 col-sm-12 shadow border_bottom" id="shadow" >
			
			<div class="container">		
				<div class="row">					
				
					<div class="col-lg-10 col-md-10 col-sm-10"><br><br>
						<h2 class="h2 text-success"><?php echo $data['title'];?></h2>	
						
					  <div class="row">	
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Total Amount</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php echo $data['budget'];?></h1>        
							  </div>
							</div>
						</div>	
						<div class="card-deck mb-3 text-center col-lg-4">
							
							  
							  <div class="card-body">
								<h1 class="card-title pricing-card-title">Pay From</h1>        
							  </div>
							
						</div>
						<div class="card-deck mb-3 text-center col-lg-4">
							<div class="card mb-4 shadow-sm">
							  <div class="card-header">
								<h4 class="my-0 font-weight-normal">Reciver Email Id</h4>
							  </div>
							  <div class="card-body">
								<h1 class="card-title pricing-card-title"><?php echo $data['h_id'];?></h1>        
							  </div>
							</div>
						</div>
					  </div>	
												
					</div>										
				</div>												
				<br><br>
				<h3>Payment Method</h3><br>				
				<div>
					<form action="#" method="POST"  class="col-lg-12" align="center">
						<label><strong>Select Paymnt Type</strong></label>
						<div class="form-group">
							<select class="form-control" name="card" required> 	 
								<option value="debit card">DEBIT CARD</option>
								<option value="credit card">CREDIT CARD</option>								
							</select>
						</div>
						<label><strong>Name on Card</strong></label>
						<input type="text" id="cname" name="cardname" placeholder="John More Doe" class="form-control" required><br>
						
						<label><strong>Card number</strong></label>						
						<input type="number"  name="number" placeholder="1111222233334444" class="form-control" required><br>
						
						<label><strong>Exp Month</strong></label>
						<input type="number"  name="month" placeholder="05" class="form-control" required><br>
						
						<label><strong>Exp Year</strong></label>
						<input type="number"  name="year" placeholder="2026" class="form-control" required><br>
						
						<label for="cvv">CVV</label><i class="fa fa-clock-o"></i>
						<input type="number"  name="cvv" placeholder="352" class="form-control">
						 
						<input type="hidden" name="wid" value="<?php echo $data['w_id'];?>">					
						<input type="hidden" name="jid" value="<?php echo $jid;?>">					
						<center><input type="submit" name="submit" class="btn btn-success" value="Pay Now"></center>					
					</form>
					
				</div>
				
			</div>
		</div>			
	</div>
	
</section>	
 
<section>
<footer>
	<?php 
		include "../layout/user_footer.php";
	?>
</footer>
</section>
</body>
</html>
<?php		
		
	if($_POST)
	{
	$wid=$_POST['wid'];
	$jid=$_POST['jid'];
		
		$query_job="UPDATE jobs SET `status`='complete',`payment_status`='approval' WHERE j_id='$jid'";
	
		$run_hire=mysqli_query($conn,$query_job);
		
		if(run_hire)
		{
			$query_hire="SELECT * FROM `jobs` WHERE `w_id`='$wid' AND `status`='complete'";
			$run_hire=mysqli_query($conn,$query_hire);
			$count=mysqli_num_rows($run_hire);
			
			$query_work="SELECT * FROM `work` WHERE `w_id`='$wid'";
			$run_work=mysqli_query($conn,$query_work);
			$row2 = mysqli_fetch_array($run_work);				
			
			$query_earning="SELECT * FROM `jobs` WHERE `j_id`='$jid'";
			$run_earning=mysqli_query($conn,$query_earning);	
			$row1 = mysqli_fetch_array($run_earning);	

			$query_admin="SELECT * FROM `admin` WHERE `a_id`='1'";
			$run_admin=mysqli_query($conn,$query_admin);	
			$row3 = mysqli_fetch_array($run_admin);
			
		 	$profit_current=((($row1['budget'])*20)/100);
			$total_profit=($row3['earning'])+$profit_current;
		 	$credit=(($row1['budget'])-$profit_current);
			$earning=$row2['earning']+$credit;
			
			$query_work="UPDATE admin SET `earning`='$total_profit'";
			$run_hire=mysqli_query($conn,$query_work);
			
			$query_work="UPDATE work SET `complete_job`='$count',`earning`='$earning' WHERE w_id='$wid'";
			$run_hire=mysqli_query($conn,$query_work);
			
			$t=time(); 
			$time=(date("d-m-Y",$t));
			$subject="congratulations Job Approved Update Earning is $earning";
			$message="Job Approved Successfully And credit $credit  And Update Earning is $earning ";			
			$query_1="INSERT INTO `notification` (`subject`, `message`, `w_id` ,`time`) VALUES ('$subject','$message','$wid','$time')";
			$run_1=mysqli_query($conn,$query_1);
			
			echo '<script type="text/javascript">alert("Payment Successfully");window.location=\'complete_job.php\';</script>';
			
		}
		
	}
?>