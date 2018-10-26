<?php
namespace slowclassconstant1614;

interface I {
 const X = 'x';
 }
class A implements I {
 }

<<__EntryPoint>>
function main_1614() {
var_dump(A::X);
var_dump(get_class_constants('A'));
}
