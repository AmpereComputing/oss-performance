<?php
namespace slowvariableargument13;

function test($a) {
   $n = func_num_args();
   var_dump($n);
  $args = func_get_args();
  var_dump($args);
}

 <<__EntryPoint>>
function main_13() {
test(1);
 test(1, 2);
 test(1, 2, 3);
}
