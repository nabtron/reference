<?php

// reference: http://stackoverflow.com/questions/25429051/combine-multiple-php-files-into-one

 $txt1 = file_get_contents('page-001.php');
 $txt1 .= "\n" . file_get_contents('page-002.php');
 $txt1 .= "\n" . file_get_contents('page-003.php');

 $txt1 .= "\n" . file_get_contents('page-004.php');
 $txt1 .= "\n" . file_get_contents('page-005.php');
 $txt1 .= "\n" . file_get_contents('page-006.php');

 $txt1 .= "\n" . file_get_contents('page-007.php');
 $txt1 .= "\n" . file_get_contents('page-008.php');
 $txt1 .= "\n" . file_get_contents('page-009.php');

 $txt1 .= "\n" . file_get_contents('page-010.php');
 $txt1 .= "\n" . file_get_contents('page-011.php');
 $txt1 .= "\n" . file_get_contents('page-012.php');

 $fp = fopen('newcombined.php', 'w');
 if(!$fp)
   die('Could not create / open text file for writing.');
   if(fwrite($fp, $txt1) === false)
   die('Could not write to text file.');

  echo 'Text files have been merged.';    

 ?> 
