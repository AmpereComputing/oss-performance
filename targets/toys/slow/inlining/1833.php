<?php
namespace slowinlining1833;

function g($a) {
 function t(){
}
;
 return $a ? array(1,2,3) : 'foo';
 }
function f($a) {
 return g($a);
 }
function test($a) {
  return reset(&(f($a)));
  }

<<__EntryPoint>>
function main_1833() {
var_dump(test(1));
}
