<?php
session_start();
$UID = $_SESSION['uid'];
$PN = $_POST["ProblemName"];
$page = 0;
$conn = mysql_connect("localhost","mangese","000000");
if($conn != FALSE)
{
	mysql_query("use grader;");
	$QueryName = mysql_query("select concat($UID,$PN,count(*),'.zip') as name from submit where u_id = '$UID' and h_id = '$PN';");
	while($row = mysql_fetch_assoc($QueryName))
	{
		$GenFilename = $row['name'];
	}
	$target = "File/";
	$temp = $_FILES['Uploaded_file']['name'];
	$SC = $_POST["SectionValue"];
	$tempName = $GenFilename;
	if(!move_uploaded_file($_FILES['Uploaded_file']['tmp_name'],$target.$tempName))
	{
		echo "<script> alert('error'); </script>";
	}
	$temp = $tempName;
	$file_name = $tempName;
	echo "<script> alert('$temp'); </script>";
	$UnzipTarget = "UnzipPlace/";
	$baseTarget = "File/";
	$rm = "*";
	$OutReturnValue = "File/UnzipPlace/Computer";
	exec("rm $baseTarget$UnzipTarget$rm");
	exec("unzip $baseTarget$file_name -d $baseTarget$UnzipTarget");
	exec("javac $baseTarget$UnzipTarget$rm",$outC,$reC);
	echo "<script> alert('Out Error Compile = $outC') </script>";
	echo "<script> alert('Out result Com = $reC') </script>";
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
			exec("timeout 1 java -classpath $baseTarget$UnzipTarget Computer",$outR,$reR);
			echo "<script> alert('Out error Run = $outR') </script>";
			echo "<script> alert('Out result Run = $reR') </script>";
			$count = $count+1;
			$countNameIn = $count.".in";
			$countNameOut = $count.".out";

		}
	}
}
?>
