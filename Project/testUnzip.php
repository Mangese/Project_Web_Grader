<?php
  $baseTarget = "Problem/";
  $FileNameIn = "EGCO1111201711192"."IN.zip";
  $FileNameOut = "EGCO1111201711192"."OUT.zip";
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
  while((file_exists("$baseTarget$UnzipTargetIn$countNameIn")&&(file_exists("$baseTarget$UnzipTargetOut$countNameOut"))))
  {
  echo $countNameIn." ".$countNameOut." ";  
  exec("cat $baseTarget$UnzipTargetOut$countNameOut",$out,$re);
  print_r($out);
  $count = $count+1;
  $countNameIn = $count.".in";
  $countNameOut = $count.".out";
  }
?>
