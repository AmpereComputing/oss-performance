<?php
namespace slowevalorder1522;

function foo($v) {
  $a = array('key' => &$v);
  return $a;
}
function goo($v) {
  return $v . 1;
}

<<__EntryPoint>>
function main_1522() {
var_dump(foo('1.0'));
var_dump(foo(foo('1.0')));
var_dump(foo(goo('1.0')));
}
