<?php
	$target = "File/";
	if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target."testUpload.c")){
//	if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.preg_replace("/\s+/","_",$_FILES['Uploaded_file']['name']))){
	echo "error";
	}
//	$temp = preg_replace("/\s+/","_",$_FILES['Uploaded_file']['name']);
	$temp = "testUpload.c";
	$file_name = $temp;
	$temp = substr($temp,0,strpos($temp,"."));
	exec("gcc $target$temp.c -o $temp.exe",$out1,$re1);
	echo $out1;
	echo $re1;
	if(!$re1)
	{
		exec("timeout 1 ./$temp.exe < input.txt > $temp.txt",$out,$re);
		if($re != 124)
		{
			$array_out = file('output.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			$array_in = file($temp.'.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			$trimmed1 = array_map(function($item)
			{
				return preg_replace(' /\s+/','',$item);
			}, $array_in);
			$trimmed2 = array_map(function($item)
			{
				return preg_replace(' /\s+/','',$item);
			},$array_out);
			echo "<font size = '200'>";
			echo "RESULT IN TEST FILE </br>";
			print_r($trimmed2);
			echo "</br>";
			echo "<font size = '200'>";
			echo "OUTPUT FROM PROGRAM </br>";
			print_r($trimmed1);
			$result = ($trimmed1 === $trimmed2);
			echo "</br>";
			if($result)
			{
				echo "correct";
				/*
				echo "<script type = 'text/javascript'>";
				echo "window.location = 'StudentUpload.html';";
				echo "</script>";
				*/
			}
			else
			{
				echo "wrong";
				/*
				echo "<script type = 'text/javascript'>";
				echo "window.location = 'StudentUpload.html';";
				echo "</script>";
				*/
			}
		}
		else
		{
		echo "<font size= '200'>";
		echo "TIMEOUT";
		}
		exec("rm $temp.txt");
		exec("rm $temp.exe");
	}
	else
	{
		echo "<font size = '200'>";
		echo "COMPILE ERROR";
		exec("rm $target$file_name");
	}
?>

