<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $UID = $_REQUEST["uidDelete"];
    $result = mysql_query("select source_file as filename from submit where u_id = $UID;");
    while($row = mysql_fetch_assoc($result))
    {
    $F = $row["filename"];
      exec("rm File/$F ");

    }
    $result = mysql_query("select s_id as sid from section where u_id = $UID;");
    while($row = mysql_fetch_assoc($result))
    {
      $SID = $row["sid"];
      $result1 = mysql_query("select source_file as filename from submit where s_id = $SID;");
        while($row1 = mysql_fetch_assoc($result1))
        {
        $F = $row1["filename"];
        exec("rm File/$F ");
        }
       $result2 = mysql_query("select file_name as f1,inputfile as f2,outputfile as f3,p_id as pid from problem where u_id = '$UID';");
       while($row = mysql_fetch_assoc($result2))
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
      mysql_query("delete from homework where s_id = '$SID';");
      mysql_query("delete from register where s_id = '$SID';");
      mysql_query("delete from submit where s_id = '$SID';");
    }
   
     mysql_query("delete from submit where u_id = '$UID';");
     mysql_query("delete from register where u_id = '$UID';");
     mysql_query("delete from user where u_id = '$UID';");
     mysql_query("delete from section where u_id = '$UID';");
     echo "fillaccountManagementTb();";

  }
?>
