<?php
namespace slowconstructor1720;

class A {
  function a() {
 echo "A
";
 }
  function __construct() {
 echo "cons
";
 }
}
 function test() {
 $obj = new A();
 $obj->a();
 }

 <<__EntryPoint>>
function main_1720() {
test();
}
