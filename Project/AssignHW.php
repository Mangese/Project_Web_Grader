<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    $PID = $_REQUEST["pid"];
    $SID = $_REQUEST["sid"];
    $DATE = $_REQUEST["date"];
    $TIME = $_REQUEST["time"];
    mysql_query("use grader;");
    mysql_query("insert into homework (P_ID,LANGUAGE,S_ID,AssignDate,AssignTime,DeadlineDate,DeadlineTime) values ($PID,(select Language from problem where p_id = '1'),$SID,now(),now(),'$DATE','$TIME');");
  }
?>
