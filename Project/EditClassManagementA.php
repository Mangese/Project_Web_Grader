<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $CID = $_REQUEST["cidreq"];
    $CN = $_REQUEST["classnameEdit"];
    
    $CID = "'".$CID."'";
    $CN = "'".$CN."'";
    
    echo "alert('CN '+ $CN);";
    
    
    
     mysql_query("use grader;");
     mysql_query("update class set classname=$CN where c_id =$CID;");
  }
?>
