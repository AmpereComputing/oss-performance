<?php
namespace slowhhbbcarray033;

function junk() { return 2; }
function bar() {
  $y = null;
  $x = array('z' => junk());
  unset($x['z']);
  $val = $x['z'];
  var_dump(is_null($val));
  var_dump(is_int($val));
  var_dump(is_array($x));
  var_dump($x);
}

<<__EntryPoint>>
function main_array_033() {
bar();
}
