<?php
	$page = 0;
	$conn = mysql_connect("localhost","mangese","000000");
	if($conn != FALSE)
	{
		mysql_query("use grader;");
		$target = "File/";
		$temp = $_FILES['Uploaded_file']['name'];
		$tempName = preg_replace('/\s+/','',$temp);
		if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.$tempName))
		{
		echo "error";
		}
		$temp = $tempName;
		$file_name = $tempName;
		$temp = substr($temp,0,strpos($temp,"."));
		exec("gcc $target$temp.c -o $temp.exe",$out1,$re1);
		if(!$re1)
		{
			$status = "W";
			exec("timeout 1 ./$temp.exe <input.txt > $temp.txt",$out,$re);
			if($re != 124)
			{
				$array_out = file('output.txt',FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
				$array_in = file($temp.'.txt',FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
				/*$trimmed1 = array_map(function($item)
				{
					return preg_replace('/\s+/','',$item)
				},$array_in);*/
				$trimmed2 = array_map(function($item)
				{
					return preg_replace('/\s+/','',$item)
				},$array_out);
				$result = ($trimmed1 === $trimmed2);
				$result = 1;
				if($result)
				{
					$status = "Y";
					$page = 1;
				}
				else
				{
					$status = "N";
					$page = 2;
				}
			}
			else
			{
			$status = "T";
			$page = 3;
			}
			mysql_query("insert into submit value('TestUpload','5713086','Test01','$status',DATE_FORMAT(now(),'%H:%i:%s'),DATE_FORMAT(now(),'%Y:%m:%d'),'$tempNamp');");
			exec("rm $temp.txt");
			exec("rm $temp.exe");
		}
		else
		{
			exec("rm $target$file_name");
		}
		echo "<script type = 'text/javascript'>";
		if($page == 0)
		{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS2.html';";
		}
		else if($page == 1)
		{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS1.html';";
		}
		else if($page == 2)
		{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS4.html';";
		}
		else
		{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS3.html';";
		}
		echo "</script>";
	}
?>
