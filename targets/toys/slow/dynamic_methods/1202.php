<?php
namespace slowdynamicmethods1202;

class A {
 public function test() {
 print 'in A';
}
 }
 class B extends A {
 public function test() {
 print 'in B';
}
 }

 <<__EntryPoint>>
function main_1202() {
$obj = new B();
 call_user_func_array(array($obj, 'A::test'), array());
}