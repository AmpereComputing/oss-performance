<?php
namespace slowstaticstatement1398;

$static_var = 1;
  global $static_var;
  echo $static_var . "\n";
  $static_var --;
  echo $static_var . "\n";
