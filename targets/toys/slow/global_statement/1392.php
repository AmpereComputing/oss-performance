<?php
namespace slowglobalstatement1392;

function test() {
  if (true) {
    global $a;
    $a = 10;
  }
}
test();
var_dump($a);
