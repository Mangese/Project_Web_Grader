<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $SID = $_REQUEST["sectionIDSearch"];
    $SN = $_REQUEST["sectionNameSearch"];
    $CB = $_REQUEST["createBySearch"];
    
 

    $message = "test alert in php";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>alert('$SID');</script>";
    echo "<script type='text/javascript'>alert('$SN');</script>";
    echo "<script type='text/javascript'>alert('$CB');</script>";
    
    // $result = mysql_query("select c_id as c_id,classname as classname from class where c_id  like '%$CID%' and classname like '%$CN%';");
    
    // while($row = mysql_fetch_assoc($result))
    // {
    //   $CIDT = $row['c_id'];
    //   $CNT = $row['classname'];
      
    //   echo "<tr>";
    //   echo "<td style='width:20%'>";
    //   echo "$CIDT";
    //   echo "</td>";
    //   echo "<td style='width:50%'>";
    //   echo "$CNT";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "edit";
    //   echo "</td>";
    //   echo "<td style='width:15%'>";
    //   echo "delete";
    //   echo "</td>";
    //   echo "</tr>";
    // }
  }
?>
