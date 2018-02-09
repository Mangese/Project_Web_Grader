<?php
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $HID = $_REQUEST['hid'];
  $NumberOfFile = mysql_query("select count(*) as num from submit where h_id = '$HID' and status = 'P';");
  $QueryName = mysql_query("select source_file as fileName,u_id as uid from submit where h_id = '$HID' and status = 'P';");
while($row = mysql_fetch_assoc($NumberOfFile))
{
$NumFile = $row['num'];	
}
chdir('File');
if($NumFile > 1)
{
	$countFile = 1;
	$UArray = array();
	$FArray = array();
	while($row = mysql_fetch_assoc($QueryName))
	{
		$uid = $row['uid'];
		array_push($UArray,"$uid");
		$FN = $row['fileName'];
		array_push($FArray,"$FN");
		/*exec("echo -n '$FN' > input.txt");
		exec("./FingerPrintGenerator < input.txt > output$countFile.txt ",$out,$re);
		$countFile = $countFile+1;
*/
	}	
	
	print_r($UArray);
	echo "</br>";
	echo count($UArray);
	echo "</br>";
	print_r($FArray);
	echo "</br>";
	echo count($FArray);
	echo "</br>";
	for ($i = 1; $i <= count($FArray); $i++) {
		for ($k = 1; $k < $i+1;$k++)
		{
			if($k != count($FArray))
			{
				echo ",";
			}	
		}
    		for ($j = $i+1; $j <= count($FArray); $j++) 
		{
    			echo $FArray[$i]." ".$FArray[$j];
			if($j != count($FArray))
			{
				echo ",";
			}
			
		}
		echo "</br>";
	}

}
?>
