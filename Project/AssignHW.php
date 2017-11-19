<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $PID = $_REQUEST["pid"];
    $SID = $_REQUEST["sid"];
    $DATE = $_REQUEST["date"];
    $TIME = $_REQUEST["time"];
    echo "alert('$PID $SID $DATE $TIME');";
    mysql_query("use grader;");
    //mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime) values (1,(select Language from problem where p_id = '1'),5,now(),now(),'2017-11-19','15:36');");
  }
?>
