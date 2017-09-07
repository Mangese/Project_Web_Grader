<?php
	$conn =  mysql_connect("localhost","mangese","000000");
	if($conn != FALSE)
	{
	echo "COMPLETE</br>";
	mysql_query("use Grader;");
	mysql_query("insert into test(name) values ('mangese');");
	$result = mysql_query("select id as Id ,Name as Name from test;");
	if($result)
	{
	while($row = mysql_fetch_assoc($result))
	{
		echo $row['Id']." ".$row['Name']."</br>";
	}
	echo "Query Success";
	}
	else
	{
	echo "Query Fail";
	}
	}
	else
	{
	echo "FAIL";
	}
?>
