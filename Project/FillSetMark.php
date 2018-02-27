<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $UID = $_REQUEST["uidreq"];
     $HID = $_REQUEST["pidreq"];
     $TM = $_REQUEST["setMark"];
    //  echo "alert('in php');";
    // echo "alert($UID);";
    // echo "alert($PID);";
    // echo "alert('set mark sucess :'+$TM);";

     mysql_query("use grader;");
     mysql_query("update submit set TeacherMark = '$TM' where u_id = '$UID' and h_id = '$HID';");
    

  }
?>
