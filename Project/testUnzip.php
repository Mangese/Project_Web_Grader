<?php
  $baseTarget = "Problem/";
  $FileName = "EGCO1111201711192"."IN.zip";
  $FileName = "EGCO1111201711192"."OUT.zip";
  $UnzipTargetIn = "UnzipInputField/";
  $UnzipTargetOut = "UnzipOutputField/";
  $rm = "*";
  exec("rm $baseTarget$UnzipTargetIn$rm");
  exec("rm $baseTarget$UnzipTargetOut$rm");
  exec("unzip $baseTarget$FileNameIn -d $baseTarget$UnzipTargetIn");
  exec("unzip $baseTarget$FileNameOut -d $baseTarget$UnzipTargetOut");
  $count = 1;
  $countNameIn = $count.".in";
  $countNameOut = $count.".out";
  while((file_exists("$baseTarget$UnzipTarget$countNameIn")&&(file_exists("$baseTarget$UnzipTarget$countNameOut"))))
  {
  echo $countNameIn." ".$countNameOut." ";  
  $count = $count+1;
  $countNameIn = $count.".in";
  $countNameOut = $count.".out";
  }
?>
