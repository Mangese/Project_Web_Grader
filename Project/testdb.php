<?php
	$conn =  mysql_connect("localhost","root","000000");
	if($conn != FALSE)
	{
	echo "COMPLETE</br>";
	}
	else
	{
	echo "FAIL";
	}
?>
