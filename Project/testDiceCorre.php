<?php
header('Content-Disposition: attachment; filename="default-filename.csv"');
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
			$FNF = $FArray[$i-1];
			exec("echo -n '$FNF' > input.txt");
			exec("./FingerPrintGenerator < input.txt > output1.txt ");
			$FNF = $FArray[$j-1];
			exec("echo -n '$FNF' > input.txt");
			exec("./FingerPrintGenerator < input.txt > output2.txt ");
			$out = array();
			exec("./Dice",$out,$re);
    			echo $out[0];
			if($j != count($FArray))
			{
				echo ",";
			}
			
		}
		echo "\n";
	}

}
?>
