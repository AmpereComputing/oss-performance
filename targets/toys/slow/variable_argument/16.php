<?php
namespace slowvariableargument16;

function test() {
   var_dump(func_get_arg(0));
  var_dump(func_get_arg(1));
  var_dump(func_get_arg(2));
  var_dump(func_get_arg(3));
}

 <<__EntryPoint>>
function main_16() {
test(2, 'ok', 0, 'test');
}