<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["section"];
    $UID = $_SESSION["uid"];
    $sumProblem = mysql_query("select count(*) as sumPloblem from homework where s_id = '$SID';");
    $sumStudentInSec = mysql_query("select u_id as sumStudentInSec from register where s_id = '$SID',");  
    $RowNum = 0;

    while($row = mysql_fetch_assoc($sumProblem)){
      $sumPb = $row['sumPloblem'];
      $_SESSION["sumpb"] = $sumPb;
      echo "alert('$sumPb');";
    }

    while($row = mysql_fetch_assoc($sumStudentInSec)){
      $sumStd = $row['sumStudentInSec'];
    }
   }
?>
