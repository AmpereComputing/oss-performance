<?php
namespace slowhhbbcconstpropstaticness;

function a() { return 'a'; }
function b() { return 'b'; }

function foo() {
  $a = a();
  $b = b();
  return $a . $b;
}

function heh() {
  var_dump(foo());
}


<<__EntryPoint>>
function main_constprop_staticness() {
heh();
}
