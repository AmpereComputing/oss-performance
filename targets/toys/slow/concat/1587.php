<?php
namespace slowconcat1587;

function test($a){
  if ($a > 0) {
    $sql = 'foo';
  }
 else {
    $sql = 'bar';
  }
  $sql .= ' baz';
  return $sql;
}

<<__EntryPoint>>
function main_1587() {
echo test(1),test(-1),"\n";
}
