<?php
header('Content-Type: text/html; charset=utf-8');
	session_start();
	$UID = $_SESSION['uid'];
  	$CID = $_POST["ClassID"];
	$PTYPE = $_POST["optradio"];
	$PNAME = $_POST["ProblemNameUp"];
$th_name =iconv("UTF-8","TIS-620",$_POST['ProblemNameUp']);
echo "<script> alert('$th_name'); </script>";
	
?>
