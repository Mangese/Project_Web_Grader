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
    
 

    // $message = "test alert in php";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // echo "<script type='text/javascript'>alert('$SID');</script>";
    // echo "<script type='text/javascript'>alert('$SN');</script>";
    // echo "<script type='text/javascript'>alert('$CB');</script>";
    
     $result = mysql_query(
       "select s.s_id as sid ,s.name as nameSec,s.password as password,u.firstname as createSecBy from section s left join user u on s.u_id=u.u_id where s.s_id like '%$SID%' and s.name like '%$SN%' and u.firstname like '%$CB%';"
      );
    
    while($row = mysql_fetch_assoc($result))
    {
      $SIDT = $row['sid'];
      $SNT = $row['nameSec'];
      $PWT = $row['password'];
      $CSBT = $row['createSecBy'];

      
      echo "<tr>";
      echo "<td style='width:15%'>";
      echo "$SIDT";
      echo "</td>";
      echo "<td style='width:35%'>";
      echo "$SNT";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$PWT";
      echo "</td>";
      echo "<td style='width:15%'>";
      echo "$CSBT";
      echo "</td>";
      echo "<td style='width:10%'>";
      echo "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editSection' onclick = 'editSectionManagementTb(this,$SIDT)';><i class='fa fa-edit' aria-hidden='true'></i></button>";
      echo "</td>";
      echo "<td style='width:10%'>";
      echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modalChackDeleteSM' onclick = 'deleteSectionManagement(this,$SIDT)'><i class='fa fa-trash' aria-hidden='true'></i></button>";      
      echo "</td>";
      echo "</tr>";
    }
  }
?>
