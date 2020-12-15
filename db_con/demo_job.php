<?php

$conn=mysqli_connect('localhost','root','','login');

if(!$conn)
{
	echo "Connection Faild !";
}
else
{
	echo "Connection Successfullllyy";
}

?>