<?php
require "../dbcon.php";
 
  $jid=$_POST['jid'];
if($_POST)
{
	 $jid=$_POST['jid'];
	$project_file=$_FILES["project_file"]["name"];
	move_uploaded_file($_FILES["project_file"]["tmp_name"],"../data_image/".$_FILES["project_file"]["name"]);
	
	$query="UPDATE jobs SET `payment_status`='not_approval' ,`submit_file`='$project_file'  WHERE j_id='$jid'";
	$run=mysqli_query($conn,$query);
	if($run)
	{
		echo '<script type="text/javascript">alert("Submit Job Successfully");window.location=\'myjobs.php\';</script>';
	}
	
	
	
}

?>