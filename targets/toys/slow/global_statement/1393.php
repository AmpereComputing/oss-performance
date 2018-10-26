<?php
namespace slowglobalstatement1393;

$x = 1;
$GLOBALS['x'] = 2;
var_dump($x);
function test() {
  global $x;
  $x = 3;
  $GLOBALS['x'] = 4;
  var_dump($x);
}
test();
