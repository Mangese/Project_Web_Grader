<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    
    $NC = $_REQUEST["addNewClass"];
    
    $NC = "'".$NC."'";
    // echo "alert('in php');";
    echo "alert('NC '+ $NC);";
    
    
    
    //  mysql_query("use grader;");
    //  mysql_query("iNSERT INTO class (classname) VALUES ($NC);");
     
  }
?>
