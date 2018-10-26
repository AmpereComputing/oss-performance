<?php
namespace slowevalorder1529;

function test($x) {
  $a = array($a => $x[$a = 'foo']);
  return $a;
}

<<__EntryPoint>>
function main_1529() {
var_dump(test(array('foo' => 5)));
}
