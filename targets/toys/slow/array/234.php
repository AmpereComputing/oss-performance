<?php
namespace slowarray234;

class A {
 function f($a) {
 var_dump($a === null);
 }
 }

<<__EntryPoint>>
function main_234() {
$a = true;
 $a = new A();
$a->f(array());
}
