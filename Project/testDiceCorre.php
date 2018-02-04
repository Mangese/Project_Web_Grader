<?php
  $conn = mysql_connect("localhost","mangese","000000");
	mysql_query("use grader;");
  $HID = $_POST["hid"];
  $QueryName = mysql_query("select source_file as fileName from submit where h_id = '$HID';");
	while($row = mysql_fetch_assoc($QueryName))
	{
		$FN = $row['fileName'];
    echo "<script> alert('$FN'); </script>";
	}
?>
