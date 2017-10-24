<?php
        session_start();
	$UID = $_SESSION['uid'];
  	$CID = $_POST["ClassID"];
	$PTYPE = $_POST["optradio"];
	$PNAME = $_POST["ProblemNameUp"];
$th_name =iconv("utf-8","TIS-620",$_POST['ProblemNameUp']);
echo " alert('$PNAME'); ";

	
?>
