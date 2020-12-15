<?php
	session_start();
?>
<html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/userindex.css">
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body class="jumbotron">
<?php

/*---------------------------- NAVBAR -----------------------------------*/
	include "../layout/user_navbar.php";  
?>

<section class=" container find_work">
	<div class="row">
		<div c1ass="col-lg-12">
			<h6 class="h1">Saved Jobs</h1>
		</div>
		
	</div>
</section>
	

<?php

/* ----------------------------- Footer --------------------------*/
include "../layout/user_footer.php";
?>


<!--TML code:#1B4154RGB code:R: 27 G: 65 B: 84HSV:200° 67.86% 32.94%

HTML code:#5BA83ARGB code:R: 91 G: 168 B: 58HSV:102° 65.48% 65.88%


HTML code:#FFFEFERGB code:R: 255 G: 254 B: 254HSV:0° 0.39% 100%-->

</body>
</html>