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
    while($row1 = mysql_fetch_assoc($result))
    {
      $F = $row1["filename"];
      exec("rm File/$F ");
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
