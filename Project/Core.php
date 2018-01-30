<?php
session_start();
$UID = $_SESSION['uid'];
$PN = $_POST["ProblemName"];
$page = 0;
$conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
	$FT = substr($_FILES['Uploaded_file']['name'],-2);
	echo "<script> alert('$FT'); </script>";
	mysql_query("use grader;");
	echo "<script> alert('UID = $UID'); </script>";
	echo "<script> alert('PID = $PN'); </script>";
	$QueryName = mysql_query("select concat($UID,$PN,count(*),'.c') as name from submit where u_id = '$UID' and h_id = '$PN';");
	while($row = mysql_fetch_assoc($QueryName))
	{
		$GenFilename = $row['name'];
	}
	$target = "File/";
	$temp = $_FILES['Uploaded_file']['name'];
	$SC = $_POST["SectionValue"];
	echo "<script> alert('Filename = $temp'); </script>";
		//echo "<script> alert('$SC'); </script>";
	$tempName = $GenFilename;
	echo "<script> alert('GenFileName = $tempName'); </script>";
	if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.$tempName))
	{
		echo "<script> alert('error'); </script>";
	}
	$temp = $tempName;
	$file_name = $tempName;
	$temp = substr($temp,0,strpos($temp,"."));
	exec("g++ $target$temp.c -o $target$temp.exe",$out1,$re1);
	if(!$re1)
	{
		$testCase = mysql_query("select InputFile as input,OutputFile as output from homework h join problem p on p.p_id = h.p_id where h.h_id = '$PN';"); 
		$baseTarget = "Problem/";
		while($row = mysql_fetch_assoc($testCase))
		{
			$FileNameIn = $row['input'];
			$FileNameOut = $row['output'];
		}
		$UnzipTargetIn = "UnzipInputField/";
		$UnzipTargetOut = "UnzipOutputField/";
		$rm = "*";
		exec("rm $baseTarget$UnzipTargetIn$rm");
		exec("rm $baseTarget$UnzipTargetOut$rm");
		exec("unzip $baseTarget$FileNameIn -d $baseTarget$UnzipTargetIn");
		exec("unzip $baseTarget$FileNameOut -d $baseTarget$UnzipTargetOut");
		$count = 1;
		$countNameIn = $count.".in";
		$countNameOut = $count.".out";
		$page = 1;
		$countCorrect = 0;
		$countAll = 0;
		$status = "P";
		$OutputFromSubmit = "output.txt";
		while((file_exists("$baseTarget$UnzipTargetIn$countNameIn")&&(file_exists("$target"))))
		{
			echo $countNameIn." ".$countNameOut." ";  
			exec("timeout 1 ./$target$temp.exe < $baseTarget$UnzipTargetIn$countNameIn > $target$OutputFromSubmit",$out,$re);
			$countAll = $countAll + 1;
			if($re != 124)
			{
				$array_out = file($target.$OutputFromSubmit,FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
				$array_in = file($baseTarget.$UnzipTargetOut.$countNameOut,FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
				$trimmed1 = array_map(function($item)
				{
					return preg_replace('/\s+/','',$item);
				},$array_in);
				$trimmed2 = array_map(function($item)
				{
					return preg_replace('/\s+/','',$item);
				},$array_out);
				$result = ($trimmed1 === $trimmed2);
				if(!$result)
				{
					$status = "F";
					$page = 2;
				}
				else
				{
					$countCorrect = $countCorrect+1;	
				}
				exec("rm $target$OutputFromSubmit");
			}
			else
			{
				$status = "T";
				$page = 3;
			}
			$count = $count+1;
			$countNameIn = $count.".in";
			$countNameOut = $count.".out";
		}
		if($countAll == 0)
		{
			$status = "E";	
			$page = 4;
		}
		else
		{
			mysql_query("insert into submit value('','$UID','$PN','$status',DATE_FORMAT(now(),'%H:%i:%s'),DATE_FORMAT(now(),'%Y:%m:%d'),'$tempName','$countCorrect','$countAll','');");
		}
		exec("rm $target$temp.txt");
		exec("rm $target$temp.exe");
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
	else if($page == 4)
	{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS5.html';";
	}
	else
	{
		echo "window.location = 'STUDENT_WEB_GRADER_STATUS3.html';";
	}
	echo "</script>";
}
?>
