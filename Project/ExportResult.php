<?php
header('Content-Disposition: attachment; filename="default-filename.csv"');
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $SID = $_REQUEST['sid'];
  echo "ID,Name";
  $NumberOfFile = mysql_query("select count(*) as num from homework where s_id = '$SID';");
  while($row = mysql_fetch_assoc($NumberOfFile))
  {
  $NumFile = $row['num'];
  echo "Ex".$NumFile.",";
  echo "Full Mark For Ex".$NumFile.",";
  }
  echo "TotalPass,SumPoints\n";
?>
