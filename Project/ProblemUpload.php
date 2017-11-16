<?php
    header("content-type: text/html; charset=utf-8");

        session_start();
	$UID = $_SESSION['uid'];
  	$CID = $_POST["ClassID"];
	$PTYPE = $_POST["optradio"];
	$PNAME = $_POST["ProblemNameUp"];

$conn = mysql_connect("localhost","mangese","000000");
	if($conn != FALSE)
	{
		mysql_query("use grader;");
		mysql_query("SET NAMES UTF8");

		$target = "Problem/";
    $result = mysql_query("select concat((select classname from class where C_ID = '$CID'),'$UID',DATE_FORMAT(now(),'%Y%m%d'),count(*)) as genname from problem p where U_ID = '$UID' and C_ID = '$CID';");
    while($row = mysql_fetch_assoc($result))
    {
      $GenFilename = $row['genname'];
    }
    $PDFN = $GenFilename."PDF.pdf";
    $INN = $GenFilename."IN.zip";
    $OUTN = $GenFilename."OUT.zip";
		if(!move_uploaded_file($_FILES['PDFFile']['tmp_name'],$target.$PDFN))
		{
		}
    if(!move_uploaded_file($_FILES['InFile']['tmp_name'],$target.$INN))
		{
		}
    if(!move_uploaded_file($_FILES['OutFile']['tmp_name'],$target.$OUTN))
		{
		}
	mysql_query("insert into problem(File_name,C_ID,U_ID,REMARK,inputfile,outputfile,uploaddate,language) values ('$PDFN',$CID,$UID,'$PNAME','$INN','$OUTN',DATE_FORMAT(now(),'%Y-%m-%d'),'$PTYPE');");
	}
    echo "<script> window.location = 'TeacherUpload2.php' </script>";
?>
