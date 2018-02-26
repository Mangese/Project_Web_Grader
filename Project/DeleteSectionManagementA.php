<?php
$conn = mysql_connect("localhost","mangese","000000");
  if($conn != FALSE)
  {
    session_start();
    mysql_query("use grader;");
    $SID = $_REQUEST["sidDelete"];
    $result = mysql_query("select source_file as file from homework h join submit su on su.h_id = h.h_id where s_id = '$SID'; ");
    while($row = mysql_fetch_assoc($result))
    {
        $F = $row["file"];
        exec("rm File/$F ",$out,$err);
        mysql_query("delete from submit where source_file = '$F';");
        //echo " console.log('$F');";
    }
      mysql_query("delete from homework where s_id = '$SID';");
      mysql_query("delete from register where s_id = '$SID';");
      mysql_query("delete from section where s_id = '$SID';");
    echo "fillSectionManagementTb();";
  }
?>
