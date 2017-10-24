<?php
header('charset=utf-8');
	session_start();
	$UID = $_SESSION['uid'];
  	$CID = $_POST["ClassID"];
	$PTYPE = $_POST["optradio"];
	$PNAME = $_POST["ProblemNameUp"];
$th_name =iconv("utf-8","ISO-8859-1//TRANSLIT",$_POST['ProblemNameUp']);
echo "<script> alert('$th_name'); </script>";
	
?>
