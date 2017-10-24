<?php
	session_start();
	$UID = $_SESSION['uid'];
  $CID = $_POST["ClassID"];
	$conn = mysql_connect("localhost","mangese","000000");
	if($conn != FALSE)
	{
		mysql_query("use grader;");
		$target = "File/";
    $result = mysql_query("select concat((select classname from class where C_ID = p.C_ID),U_ID,DATE_FORMAT(now(),'%Y%m%d'),count(*)) as GenName from problem p where U_ID = $UID and C_ID = $CID;");
    while($row = mysql_fetch_assoc($result))
    {
      $GenFilename = $row['GenName'];
    }
    $PDFN = $GenFilename."PDF.pdf";
    $INN = $GenFilename."IN.in";
    $OUTN = $GenFilename."OUT.out";
		if(!move_uploaded_file($_FILES['PDFFile']['tmp_name'],$target.$PDFN))
		{
		echo "<script> alert('error1'); </script>";
		}
    if(!move_uploaded_file($_FILES['Inile']['tmp_name'],$target.$INN))
		{
		echo "<script> alert('error2'); </script>";
		}
    if(!move_uploaded_file($_FILES['OutFile']['tmp_name'],$target.$INN))
		{
		echo "<script> alert('error3'); </script>";
		}
	}
?>
