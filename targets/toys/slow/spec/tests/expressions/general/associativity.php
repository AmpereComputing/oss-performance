<?php
namespace slowspectestsexpressionsgeneralassociativity;

/*
   +-------------------------------------------------------------+
   | Copyright (c) 2015 Facebook, Inc. (http://www.facebook.com) |
   +-------------------------------------------------------------+
*/

error_reporting(-1);

$a = 10; $b = 5; $c = 3;

echo '$a + $b - $c   = '.($a + $b - $c)."\n";
echo '($a + $b) - $c = '.(($a + $b) - $c)."\n";
echo '$a + ($b - $c) = '.($a + ($b - $c))."\n";
