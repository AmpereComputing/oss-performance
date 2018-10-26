<?php
namespace slowreference1071;


<<__EntryPoint>>
function main_1071() {
$a = array();
 $b = 1;
 $a['t'] = &$b;
 $b = 2;
 var_dump($a);
}
