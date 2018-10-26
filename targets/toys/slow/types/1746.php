<?php
namespace slowtypes1746;

function foo($m, $n) {
  $offset_change = 10;
  $offset_change -= strlen($m) - strlen($n);
  var_dump($offset_change);
}

<<__EntryPoint>>
function main_1746() {
foo('abc', 'efg');
}
