<?php
$conn = mysql_connect("localhost","mangese","000000");
if($conn != False)
{
session_start();
mysql_query("use grader");
$PN  = $_POST["ProblemName"];
$IN  = $_POST["InputFile"];
$OUT = $_POST["OutputFile"];
$PDF = $_POST["PdfFile"];
$CID = $_POST["Class"];
$UID = $_SESSION["user"];
mysql_query("insert into problem(FILE_NAME,USER_ID,CLASS_ID,INPUTFILE,OUTPUTFILE) VALUES ('$PDF','$UID','$CID','$IN','$OUT');");
}
?>
