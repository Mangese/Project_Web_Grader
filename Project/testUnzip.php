<?php
  $baseTarget = "Problem/";
  $FileName = "EGCO1111201711192IN.zip";
  $UnzipTarget = "UnzipInputField/";
  $rm = "*";
  exec("rm $baseTarget$UnzipTarget$rm");
  exec("unzip $baseTarget$FileName -d $baseTarget$UnzipTarget");
  $count = 1;
  $countName = count.".in";
  echo $countName;  
  while(file_exists("$countName"))
  {
  echo $countName;  
  }
?>
