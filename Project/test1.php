<?php
	$target = "File/";
	if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.$_FILES['Uploaded_file']['name'])){
	echo "error";
	}
	$temp = $_FILES['Uploaded_file']['name'];
	$file_name = $temp;
	$temp = substr($temp,0,strpos($temp,"."));
	echo $temp;
	exec("gcc $target$temp.c -o $temp.exe",$out1,$re1);
	if(!$re1)
	{
		exec("timeout 1 ./$temp.exe > $temp.txt",$out,$re);
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
			echo "OUTPUT IS </br>";
			print_r($trimmed2);
			echo "</br>";
			echo "INPUT IS </br>";
			print_r($trimmed1);
			$result = ($trimmed1 === $trimmed2);
			echo "</br>";
			if($result)
			{
				echo "CORRECT";
			}
			else
			{
				echo "WRONG";
			}
		}
		else
		{
		echo "TIMEOUT";
		}
		exec("rm '$temp.txt'");
		exec("rm '$temp.exe'");
	}
	else
	{
		echo "COMPILE ERROR";
		exec("rm '$target$file_name' ");
	}
?>

