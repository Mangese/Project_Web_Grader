<?php
	exec('gcc File/test.c -o File/test.exe',$out,$re);
	print_r($out);
	echo $re;
?>
