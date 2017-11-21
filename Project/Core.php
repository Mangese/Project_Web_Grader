<?php
	session_start();
	$UID = $_SESSION['uid'];
	$PN = $_POST["ProblemName"];
	$page = 0;
	$conn = mysql_connect("localhost","mangese","000000");
	if($conn != FALSE)
	{
		mysql_query("use grader;");
		$QueryName = mysql_query("select concat($UID,$PN,count(*),'.c') as name from submit where u_id = '$UID' and h_id = '$PN';");
		while($row = mysql_fetch_assoc($QueryName))
    	{
    		$GenFilename = $row['name'];
    	}
		$target = "File/";
		$temp = $_FILES['Uploaded_file']['name'];
		$SC = $_POST["SectionValue"];
		//echo "<script> alert('$SC'); </script>";
		$tempName = $GenFilename;
		if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.$tempName))
		{
		echo "<script> alert('error'); </script>";
		}
		$temp = $tempName;
		$file_name = $tempName;
		$temp = substr($temp,0,strpos($temp,"."));
		exec("gcc $target$temp.c -o $target$temp.exe",$out1,$re1);
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
			$status = "P";
			$OutputFromSubmit = "output.txt";
			echo "<script> alert('beforeLoopInput'); </script>";
			while((file_exists("$baseTarget$UnzipTargetIn$countNameIn")&&(file_exists("$target"))))
			{
				echo "<script> alert('loop'); </script>";
				echo $countNameIn." ".$countNameOut." ";  
				exec("timeout 1 ./$target$temp.exe < $baseTarget$UnzipTargetIn$countNameIn > $target$OutputFromSubmit",$out,$re);
				if($re != 124)
				{
					$array_out = file('$OutputFromSubmit',FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
					$array_in = file($baseTarget.$UnzipTargetOut.$countNameOut,FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
					$trimmed1 = array_map(function($item)
					{
						return preg_replace('/\s+/','',$item);
					},$array_in);
					$trimmed2 = array_map(function($item)
					{
						return preg_replace('/\s+/','',$item);
					},$array_out);
					echo "test";
					print_r($trimmed1);
					echo " ";
					print_r($trimmed2);
					$result = ($trimmed1 === $trimmed2);
					if(!$result)
					{
						$status = "F";
						$page = 2;
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
			mysql_query("insert into submit value('','$UID','$PN','$status',DATE_FORMAT(now(),'%H:%i:%s'),DATE_FORMAT(now(),'%Y:%m:%d'),'$tempName');");
			exec("rm $target$temp.txt");
			exec("rm $target$temp.exe");
		}
		else
		{
			exec("rm $target$file_name");
		}
		//echo "<script type = 'text/javascript'>";
		if($page == 0)
		{
		//echo "window.location = 'STUDENT_WEB_GRADER_STATUS2.html';";
		}
		else if($page == 1)
		{
		//echo "window.location = 'STUDENT_WEB_GRADER_STATUS1.html';";
		}
		else if($page == 2)
		{
		//echo "window.location = 'STUDENT_WEB_GRADER_STATUS4.html';";
		}
		else
		{
		//echo "window.location = 'STUDENT_WEB_GRADER_STATUS3.html';";
		}
		//echo "</script>";
	}
?>
