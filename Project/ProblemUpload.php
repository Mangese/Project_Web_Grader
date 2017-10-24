<?php
	session_start();
	$UID = $_SESSION['uid'];
  $CID = $_POST["ClassID"];
		echo "<script> alert('$UID'); </script>";
		echo "<script> alert('$CID'); </script>";

?>
