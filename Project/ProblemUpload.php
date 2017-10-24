<?php
    header("content-type: txt/html; charset=utf-8");

        session_start();
	$UID = $_SESSION['uid'];
  	$CID = $_POST["ClassID"];
	$PTYPE = $_POST["optradio"];
	$PNAME = $_POST["ProblemNameUp"];
$th_name =iconv("utf-8","TIS-620",$_POST['ProblemNameUp']);
echo "<script> alert('$PNAME ลอง'); </script>";
echo "<script> alert('$th_name ลอง'); </script>";

	
?>
