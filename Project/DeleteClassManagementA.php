<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $CID = $_REQUEST["cidDelete"];
    $result = mysql_query("select file_name as f1,inputfile as f2,outputfile as f3,p_id as pid from problem where c_id = '$CID';");
     while($row = mysql_fetch_assoc($result))
    {
     $F1 = $row["f1"];
     $F2 = $row["f2"];
     $PID = $row["pid"];
     $F3 = $row["f3"];
     exec("rm Problem/$F1 ");
     exec("rm Problem/$F2 ");
     exec("rm Problem/$F3 ");
     mysql_query("delete from problem where p_id = '$PID';");
    }
    $result1 = mysql_query("select s_id as sid from section where c_id = '$CID';");
    while($row1 = mysql_fetch_assoc($result1))
    {
      $SID = $row1["sid"];
      $result2 = mysql_query("select source_file as file from homework h join submit su on su.h_id = h.h_id where s_id = '$SID'; ");
      while($row2 = mysql_fetch_assoc($result2))
      {
          $F = $row2["file"];
          exec("rm File/$F ",$out,$err);
          mysql_query("delete from submit where source_file = '$F';");
          //echo " console.log('$F');";
      }
      mysql_query("delete from homework where s_id = '$SID';");
      mysql_query("delete from register where s_id = '$SID';");
      mysql_query("delete from section where s_id = '$SID';");
    }
    mysql_query("delete from class where c_id = '$CID';");
    echo "fillclassManagementTb();";
  }
?>
