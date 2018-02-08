<?php
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $HID = $_REQUEST['hid'];
  $NumberOfFile = mysql_query("select count(*) as num from submit where h_id = '$HID';");
  $QueryName = mysql_query("select source_file as fileName from submit where h_id = '$HID';");
while($row = mysql_fetch_assoc($NumberOfFile))
{
$NumFile = $row['num'];	
}
if($NumFile > 1)
{
	$countFile = 1;
	while($row = mysql_fetch_assoc($QueryName))
	{
		$FN = $row['fileName'];
		exec("./File/FingerPrintGenerator < input.txt > output$CountFile.txt ");
		$countFile = $countFile+1;
		if($countFile > 2)
		{
			$countFile = 1;
		}
	}	
}

?>
