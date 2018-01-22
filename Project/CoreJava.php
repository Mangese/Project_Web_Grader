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
	exec("rm $baseTarget$UnzipTarget$rm");
	exec("unzip $baseTarget$file_name -d $baseTarget$UnzipTarget");
}
?>
