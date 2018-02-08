<?php
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $HID = $_REQUEST['hid'];
  $NumberOfFile = mysql_query("select count(*) as num from submit where h_id = '$HID' and status = 'P';");
  $QueryName = mysql_query("select source_file as fileName from submit where h_id = '$HID' and status = 'P';");
while($row = mysql_fetch_assoc($NumberOfFile))
{
$NumFile = $row['num'];	
}
chdir('File');
if($NumFile > 1)
{
	$countFile = 1;
	while($row = mysql_fetch_assoc($QueryName))
	{
		$FN = $row['fileName'];
		exec("echo -n '$FN' > input.txt");
		echo $FN;
		echo "</br>";
		exec("./FingerPrintGenerator < input.txt > output$countFile.txt ",$out,$re);
		print_r($out);
		echo $re;
		echo "</br>";
		$countFile = $countFile+1;
		if($countFile > 2)
		{
			exec("./Dice",$out1,$re1);
			print_r($out1);
			echo $re1;
			echo "</br>";
			$countFile = 1;
		}

	}	
}

?>
