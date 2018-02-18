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
      exec("rm File/$F1 ");

    }
        mysql_query("delete from submit where u_id = '$UID';");
        mysql_query("delete from register where u_id = '$UID';");
        mysql_query("delete from user where u_id = '$UID';");
        echo "fillaccountManagementTb();";

  }
?>
