<?php
namespace slowarraycopy258;

function f($a) {
 $a[0] = $a;
 var_dump($a);
 }

<<__EntryPoint>>
function main_258() {
f(false);
}
