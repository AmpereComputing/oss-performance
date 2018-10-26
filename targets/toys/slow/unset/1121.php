<?php
namespace slowunset1121;

function rmv($a, $b) {
 unset($a[$b]);
 return $a;
 }

<<__EntryPoint>>
function main_1121() {
$a = array('foo');
$b = array();
var_dump(rmv($a, $b));
}
