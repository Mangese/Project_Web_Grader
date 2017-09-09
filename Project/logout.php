<?php
	SESSION_start();
	unset($_SESSION["user"]);
	SESSION_destroy();
	echo "<script> window.location = 'login.html'; </script>";
?>
