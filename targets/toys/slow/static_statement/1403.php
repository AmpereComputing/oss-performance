<?php
namespace slowstaticstatement1403;

if (false) {
  static $static_var = +3;
}
echo $static_var . "\n";
$static_var = 4;
echo $static_var . "\n";
