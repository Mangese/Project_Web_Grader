<?php
  $conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    mysql_query("set NAMES UTF8;");
    $CID = $_REQUEST["CIDSearch"];
    $CN = $_REQUEST["classNameSearch"];
 

    // $message = "test alert in php";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // echo "<script type='text/javascript'>alert('$CID');</script>";
    // echo "<script type='text/javascript'>alert('$CN');</script>";
    
    $result = mysql_query("select c_id as c_id,classname as classname from class where c_id  like '%$CID%' and classname like '%$CN%';");
    
    while($row = mysql_fetch_assoc($result))
    {
      $CIDT = $row['c_id'];
      $CNT = $row['classname'];
      
      echo "<tr>";
      echo "<td style='width:20%'>";
      echo "$CIDT";
      echo "</td>";
      echo "<td style='width:50%'>";
      echo "$CNT";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "<button type='button' class='btn btn-outline-warning btn-sm' data-toggle='modal' data-target='#editClass' onclick = 'editClassManagementTb(this,$CIDT)';><i class='fa fa-edit' aria-hidden='true' ></i></button>";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "<button type='button' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></button>";
      echo "</td>";
      echo "</tr>";
    }
  }
?>
