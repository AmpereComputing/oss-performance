<?php
namespace slowinlining1829;

function foo($e='e') {
  return '<a name="'.$e.'" id="'.$e.'"></a>';
}
function test() {
  echo foo();
}

<<__EntryPoint>>
function main_1829() {
test();
}
