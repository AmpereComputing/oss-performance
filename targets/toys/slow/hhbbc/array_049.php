<?php
namespace slowhhbbcarray049;

function a() { return 1; }
function foo() {
  $x = array(a());
  $x[] += 12;
  return $x;
}
function d() {
  $y = foo();
  var_dump($y);
}

<<__EntryPoint>>
function main_array_049() {
d();
}
