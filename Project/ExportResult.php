<?php
header('Content-Disposition: attachment; filename="default-filename.csv"');
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $SID = $_REQUEST['sid'];
  echo "Student ID,Name,";
  $NumberOfFile = mysql_query("select count(*) as num from homework where s_id = '$SID' and deleteflag is null;");
  while($row = mysql_fetch_assoc($NumberOfFile))
  {
  $NumFile = $row['num'];
	  for ($x = 1; $x <= $NumFile; $x++)
	{
	  echo "Ex".$x.",";
	  echo "Full Mark For Ex".$x.",";
	  }
	  }
  echo "TotalPass,SumPoints\n";
?>
