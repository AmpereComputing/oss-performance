<?php
namespace slowstring170;

function test($s) {
  $a = array('abc' => 1, 'abcd' => 2);
  $s .= 'c';
 var_dump($a[$s]);
  $s .= 'd';
 var_dump($a[$s]);
}

<<__EntryPoint>>
function main_170() {
test('ab');
}
