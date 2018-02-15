<?php
// $conn = mysql_connect("localhost","mangese","000000");
//   if($conn != FALSE)
//   {
    // $SID = $_REQUEST["sidreq"];
    // $SN = $_REQUEST["sectionnameEdit"];
    session_start();
    $UID = $_SESSION["uid"];
    echo "alert('$UID');";
    echo "alert('inphp');";
    // echo "alert('SN '+ $SN);";
  
    // mysql_query("use grader;");
    // mysql_query("update section set name=$SN where s_id =$SID;");
    
    // }
?>
