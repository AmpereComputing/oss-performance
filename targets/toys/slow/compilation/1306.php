<?php
namespace slowcompilation1306;

function bar($a) {
}
function foo($x) {
  $a = $x;
  echo $x;
  unset($a);
  $a = bar(1);
  bar($a++);
}
