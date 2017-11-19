<?php
	session_start();
	unset($_SESSION["user"]);
	unset($_SESSION["uid"]);
	unset($_SESSION["firstname"]);
	unset($_SESSION["lastname"]);
	unset($_SESSION["utype"]);
	SESSION_destroy();
	echo "<script> window.location = 'login.php'; </script>";
?>
