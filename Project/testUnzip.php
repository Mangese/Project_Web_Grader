<?php
  $baseTarget = "Problem/";
  $FileName = "EGCO1111201711192IN.zip";
  $UnzipTarget = "UnzipInputField/";
  $rm = "*";
  exec("rm $baseTarget$UnzipTarget$rm");
  exec("unzip $baseTarget$FileName -d $baseTarget$UnzipTarget");
  $count = 1;
  $countName = $count.".in";
  while(file_exists("$baseTarget$UnzipTarget$countName"))
  {
  echo $countName." ";  
  $count = $count+1;
  $countName = $count.".in";
  }
?>
