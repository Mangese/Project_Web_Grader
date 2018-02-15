<?php
// $conn = mysql_connect("localhost","mangese","000000");
//   if($conn != FALSE)
//   {
    session_start();
    
    // $SID = $_REQUEST["sidreq"];
    // $SN = $_REQUEST["sectionnameEdit"];
    $UT = $_SESSION["utype"];
    echo "alert('$UT');";
    echo "alert('inphp');";
    // echo "alert('SN '+ $SN);";
  
    // mysql_query("use grader;");
    // mysql_query("update section set name=$SN where s_id =$SID;");
    
    // }
?>
