<?php
namespace slowobject651;

interface I {
 public function test($a);
}
class A implements I {
 public function test($a) {
 print $a;
}
}

<<__EntryPoint>>
function main_651() {
$obj = new A();
 var_dump($obj instanceof I);
 $obj->test('cool');
}